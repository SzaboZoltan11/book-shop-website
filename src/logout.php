<?php

class SessionManager {

    public function destroySession() {
        try {
            session_start();

            $_SESSION = [];
            session_destroy();
        } catch (Exception $e) {
            error_log("Session törlés sikertelen: " . $e->getMessage());
            throw new Exception("Session törlés sikertelen.");
        }
    }

    public function deleteCookie($cookieName) {
        try {
            if (isset($_COOKIE[$cookieName])) {
                setcookie($cookieName, '', time() - 3600, "/", "", false, true);
            }
        } catch (Exception $e) {
            error_log("Cookie törlés sikertelen: " . $e->getMessage());
            throw new Exception("Cookie törlés sikertelen.");
        }
    }

    public function redirect($url) {
        try {
            header("Location: " . $url);
            exit();
        } catch (Exception $e) {
            error_log("Visszairányítás sikertelen: " . $e->getMessage());
            throw new Exception("Visszairányítás sikertelen.");
        }
    }
}

//Logika
try {
    $sessionManager = new SessionManager();
    
    $sessionManager->destroySession();
    $sessionManager->deleteCookie('token');
    
    // Redirect with a query parameter to notify JS about logout
    $sessionManager->redirect('../web/index.php?sessionEnded=true');
} catch (Exception $e) {
    echo "Hiba történt: " . $e->getMessage();
}
?>
