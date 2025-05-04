<?php
session_start();
include 'connect.php';

class UserRegistration {
    private $conn;
    private $errors = [];

    public function __construct($conn) {
        $this->conn = $conn;
    }

    private function addError($message) {
        $this->errors[] = $message;
    }

    private function validateName($name) {
        return preg_match('/^[a-zA-ZáéíóöőúüűÁÉÍÓÖŐÚÜŰ]+$/u', $name);
    }

    private function formatPhoneNumber($phone_number) {
        $phone_number = preg_replace('/[^0-9+]/', '', $phone_number);

        if (substr($phone_number, 0, 2) === '06') {
            $phone_number = '+36' . substr($phone_number, 2);
        }

        if (substr($phone_number, 0, 3) === '+36') {
            $phone_number = '+36(' . substr($phone_number, 3, 2) . ')' . substr($phone_number, 5);
        } else {
            if (substr($phone_number, 0, 4) === '+363') {
                $phone_number = '+36(' . substr($phone_number, 3, 2) . ')' . substr($phone_number, 5);
            } else {
                $phone_number = '+36(' . substr($phone_number, 0, 2) . ')' . substr($phone_number, 2);
            }
        }

        return $phone_number;
    }

    private function validatePassword($password) {
        $pattern = '/^(?=.*[0-9])(?=.*[\W_]).{8,}$/';
        return preg_match($pattern, $password);
    }

    private function isEmailRegistered($email) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $isRegistered = $result->num_rows > 0;
        $stmt->close();
        return $isRegistered;
    }

    private function isPhoneNumberRegistered($phone_number) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE phone_number = ?");
        $stmt->bind_param("s", $phone_number);
        $stmt->execute();
        $result = $stmt->get_result();
        $isRegistered = $result->num_rows > 0;
        $stmt->close();
        return $isRegistered;
    }

    public function validateRegistration($data) {
        try {
            $surname = trim($data['surname']);
            $firstname = trim($data['firstname']);
            $email = trim($data['email']);
            $phone_number = trim($data['phone_number']);
            $password = $data['password'];
            $password_confirm = $data['password_confirm'];
            $accept_newsletter = isset($data['accept']) ? 1 : 0;
            $isadmin = isset($data['isadmin']) ? (int)$data['isadmin'] : 0;

            if (!$this->validateName($surname)) {
                $this->addError("A vezetéknév csak betűket tartalmazhat.");
            }

            if (!$this->validateName($firstname)) {
                $this->addError("A keresztnév csak betűket tartalmazhat.");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->addError("Érvénytelen email cím.");
            } else if ($this->isEmailRegistered($email)) {
                $this->addError("Ez az email cím már regisztrálva van.");
            }

            if (!$this->validatePassword($password)) {
                $this->addError("A jelszónak legalább 8 karakter hosszúnak kell lennie, tartalmaznia kell legalább egy számot és egy speciális karaktert.");
            }

            if ($password !== $password_confirm) {
                $this->addError("A két jelszó nem egyezik.");
            }

            $phone_number = $this->formatPhoneNumber($phone_number);

            if (!preg_match("/^\+36\([0-9]{2}\)[0-9]{7,8}$/", $phone_number)) {
                $this->addError("Érvénytelen telefonszám formátum.");
            } else if ($this->isPhoneNumberRegistered($phone_number)) {
                $this->addError("Ez a telefonszám már regisztrálva van.");
            }

            return [$this->errors, $surname, $firstname, $email, $password, $phone_number, $accept_newsletter, $isadmin];

        } catch (Exception $e) {
            $this->addError("Hiba történt a regisztrációs folyamat során: " . $e->getMessage());
            return [$this->errors, null, null, null, null, null, null, null];
        }
    }

    public function registerUser($surname, $firstname, $email, $password, $phone_number, $accept_newsletter, $isadmin) {
        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
            $this->conn->begin_transaction();
    
            //felhasznalo beszurasa
            $stmt = $this->conn->prepare("INSERT INTO users (surname, firstname, email, password, phone_number, accept_newsletter, isadmin) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssis", $surname, $firstname, $email, $hashed_password, $phone_number, $accept_newsletter, $isadmin);
    
            if (!$stmt->execute()) {
                throw new Exception("Hiba történt: " . $stmt->error);
            }
    
            //id lekerdezese
            $user_id = $this->conn->insert_id;
            $stmt->close();
    
            //beszuras game tablaba
            $stmt = $this->conn->prepare("INSERT INTO game (user_id, lastplayed, discount) VALUES (?, '2000-01-01 00:00:00', 0)");
            $stmt->bind_param("i", $user_id);
    
            if (!$stmt->execute()) {
                throw new Exception("Hiba történt a game tábla frissítésekor: " . $stmt->error);
            }
    
            $stmt->close();
    
            //veglegesites, commit
            $this->conn->commit();
    
            $_SESSION['success'] = 'Sikeres regisztráció! Most már bejelentkezhetsz.';
            header("Location: /bookshop/web/logination.php");
            exit;
    
        } catch (Exception $e) {
            $this->conn->rollback(); //hiba eseten visszavonjuk az adatbazisaban tortent modositast
            $this->addError($e->getMessage());
        }
    }
    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $registration = new UserRegistration($conn);

    list($errors, $surname, $firstname, $email, $password, $phone_number, $accept_newsletter, $isadmin) = $registration->validateRegistration($_POST);

    if (empty($errors)) {
        $registration->registerUser($surname, $firstname, $email, $password, $phone_number, $accept_newsletter, $isadmin);
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: /bookshop/web/registration.php");
        exit;
    }
}
?>
