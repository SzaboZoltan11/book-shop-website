
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../css/reg_log.css">
<head>
    <meta charset="UTF-8">
    <title>Elfelejtett jelszó</title>
</head>
<body>
<div class="container">
    <h2>Elfelejtett jelszó</h2>
    <form action="send_reset_email.php" method="POST">
        <div class="input-group">
        <label for="email">Email</label>
        <input type="email" name="email" required class="input-field">
        <button type="submit" class="btn">Jelszó visszaállítása</button>
        </div>
    </form>
</div>
</body>
</html>
