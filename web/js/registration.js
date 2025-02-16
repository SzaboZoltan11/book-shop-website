function togglePasswordVisibility() {
    const passwordField = document.getElementById('password');
    const passwordConfirmField = document.getElementById('password_confirm');
    const toggleText = document.getElementById('password-show-hide');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        passwordConfirmField.type = 'text';
        toggleText.innerText = 'Jelszó elrejtése';
    } else {
        passwordField.type = 'password';
        passwordConfirmField.type = 'password';
        toggleText.innerText = 'Jelszó megjelenítése';
    }
}
