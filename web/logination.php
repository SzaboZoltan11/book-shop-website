
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshop - Login</title>
    <link rel="stylesheet" href="./css/reg_log.css">
</head>
<body>
    <div class="logo">
        <img src="./img/logo.png" alt="" width="100px" onclick="window.location.href='./index.html';">
    </div>
    
    <div class="container">
        <h2>Bejelentkezés</h2>
        <form action="../php/login.php" method="POST">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="input-field" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>" required>
            </div>
            
            <div class="input-group">
                <label for="password">Jelszó</label>
                <input type="password" name="password" id="password" class="input-field" value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>" required>
            </div>

            <div id="password-show-hide" onclick="togglePasswordVisibility()"><p class="no-margin">Jelszó megjelenítése</p></div>

            <div class="remember-me">
                <input type="checkbox" name="remember" id="remember" <?php echo isset($_COOKIE['email']) ? 'checked' : ''; ?>>
                <label for="remember">Emlékezz rám</label>
            </div>

            <p id="accept-agreement">Fiók létrehozásával elfogadod a Bookshop <a href="">Adatvédelmi Tájékoztatóját</a> és <a href="">Felhasználási Feltételeit</a>.</p>
            <?php
                if (isset($_SESSION['error'])) {
                    echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
                    unset($_SESSION['error']); 
                }
            ?>
            <button type="submit" class="btn">Bejelentkezés</button>
        </form>

        <div class="form-footer">
            <p id="footer-p">Nincs még fiókod? <a href="registration.php" id="footer-a">Regisztrálj itt</a></p>
            <p><a href="php_password_reset/forgot_password.php" id="footer-a">Elfelejtetted a jelszavad?</a></p>
        </div>
    </div>

    <script src="./js/registration.js"></script>


</body>
</html>
