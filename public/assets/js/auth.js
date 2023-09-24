document.addEventListener('DOMContentLoaded', function () {
    const eyeIcon = document.getElementById("eyeicon");
    const password = document.getElementById("password");

    eyeIcon.addEventListener('click', function () {
        if (password.type === "password") {
            password.type = "text";
            eyeIcon.src = "assets/img/eye-open.png";
        } else {
            password.type = "password";
            eyeIcon.src = "assets/img/eye-close.png";
        }
    });
});