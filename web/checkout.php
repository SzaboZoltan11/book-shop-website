<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshop - Vásárlás</title>
    <link rel="stylesheet" href="./css/reg_log.css">
</head>
<body>
    <div class="logo">
        <img src="./img/logo.png" alt="Bookshop logo" width="100px" onclick="window.location.href='./index.html';">
    </div>
    
    <div class="container">
        <h2>Vásárlási adatok</h2>

        <?php
            if (isset($_SESSION['success'])) {
                echo "<p style='color: green;'>" . $_SESSION['success'] . "</p>";
                unset($_SESSION['success']); 
            }
        ?>

        <form action="../php/order_process.php" method="POST" onsubmit="
            window.localStorage.setItem('cartItems', JSON.stringify([]))
        ">
            <div class="input-group">
                <label for="address">Szállítási cím</label>
                <input type="text" name="address" id="address" class="input-field" required>
            </div>

            <div class="input-group">
                <label for="postal_code">Irányítószám</label>
                <input type="text" name="postal_code" id="postal_code" class="input-field" required>
            </div>

            <div class="input-group">
                <label for="city">Város</label>
                <input type="text" name="city" id="city" class="input-field" required>
            </div>

            <div class="input-group">
                <label for="payment">Fizetési mód</label>
                <select name="payment" id="payment" class="input-field" required>
                    <option value="">Válassz...</option>
                    <option value="utanvet">Utánvét</option>
                    <!--
                    <option value="bankkartya">Bankkártya</option>
                    <option value="paypal">PayPal</option>
                    -->
                </select>
            </div>

            <input type="hidden" name="cart" id="input_cart">
            <script>
                const inputCart = document.getElementById('input_cart')
                inputCart.value = window.localStorage.getItem('cartItems')
            </script>

            <?php
                if (isset($_SESSION['error'])) {
                    echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
                    unset($_SESSION['error']); 
                }
            ?>
            
            <button type="submit" class="btn">Megrendelés leadása</button>
        </form>

        <div class="form-footer">
            <p id="footer-p"><a href="./index.html" id="footer-a">Vissza a főoldalra</a></p>
        </div>
    </div>

    <script src="./js/registration.js"></script>
</body>
</html>
