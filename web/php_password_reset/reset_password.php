
<?php

if (!isset($_GET['token'])) {
    exit("Érvénytelen token.");
}
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../css/reg_log.css">
<head>
    <meta charset="UTF-8">
    <title>Jelszó visszaállítása</title>
</head>
<body>
<div class="container">
    <h2>Jelszó visszaállítása</h2>
    <form action="update_password.php" method="POST">
        <div class="input-group">
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <label for="password">Új jelszó</label>
            <input type="password" name="password" required class="input-field">
            <button type="submit" class="btn">Jelszó frissítése</button>
        </div>
    </form>
</div>
</body>
</html>

