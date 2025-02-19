
<?php

if (!isset($_GET['token'])) {
    exit("Érvénytelen token.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jelszó visszaállítása</title>
</head>
<body>
    <h2>Jelszó visszaállítása</h2>
    <form action="update_password.php" method="POST">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <label for="password">Új jelszó</label>
        <input type="password" name="password" required>
        <button type="submit">Jelszó frissítése</button>
    </form>
</body>
</html>

