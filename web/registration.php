<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshop - Register</title>
    <link rel="stylesheet" href="./css/reg_log.css">

</head>
<body>
    <div class="logo">
        <img src="./img/logo.png" alt="" width="100px" onclick="window.location.href='./index.html';">
    </div>


    <div class="content-wrapper">
        <div class="box">
            Hozz létre egy fiókot a gyors vásárláshoz, speciális kuponkódokhoz, kívánságlistákhoz és rendelési előzményekhez.
        </div>

        <div class="container">
            <h2>Regisztráció</h2>
            <form action="../php/register.php" method="POST">
                <div class="input-group">
                    <label for="surname">Család név:</label>
                    <input type="text" name="surname" id="surname" class="input-field" required>
                </div>

                <div class="input-group">
                    <label for="firstname">Kereszt név:</label>
                    <input type="text" name="firstname" id="firstname" class="input-field" required>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="input-field" required>
                </div>

                <div class="input-group">
                    <label for="phone_number">Telefonszám</label>
                    <input type="tel" name="phone_number" id="phone_number" class="input-field" required>
                </div>

                <div class="input-group">
                    <label for="password">Jelszó</label>
                    <input type="password" name="password" id="password" class="input-field" required>
                </div>

                <div class="input-group">
                    <label for="password_confirm">Jelszó megerősítés</label>
                    <input type="password" name="password_confirm" id="password_confirm" class="input-field" required>
                </div>
                
                <div id="password-show-hide" onclick="togglePasswordVisibility()"><p class="no-margin">Jelszó megjelenítése</p></div>

                <div class="requirements"><p class="no-margin" id="requirements-p">Legalább 8 karakter</p></div>
                <div class="requirements"><p class="no-margin" id="requirements-p">Legalább egy szám (0-9) és egy speciális karakter</p></div>
                <div class="add-margin"></div>
               

                

                <div class="accept-me">
                    <input type="checkbox" name="accept" id="accept">
                    <label for="accept" id="accept-label">Szeretnék hírleveleket és e-maileket kapni a Bookshop.org-tól új könyvekről, szerzőkről és akciókról.</label>
                </div>

                <p id="accept-agreement">Fiók létrehozásával elfogadod a Bookshop <a href="">Adatvédelmi Tájékoztatóját</a> és <a href="">Felhasználási Feltételeit</a>.</p>

                <?php session_start(); if (!empty($_SESSION['errors'])): ?>
                <div id="error-messages">
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                    <?php endforeach; ?>
                    <?php unset($_SESSION['errors']); ?>
                </div>
                <?php endif; ?>

                <button type="submit" class="btn">Regisztráció</button>
            </form>

            <div class="form-footer">Vagy <a href="logination.php" id="form-footer-a">Bejelentkezés meglévő vásárlóként</a></div>
        </div>
    </div>
    <script src="./js/registration.js"></script>
</body>
</html>
