(function () {
    function togglePasswordVisibility(passwordInput, passwordToggle) {
        passwordInput.type =
            passwordInput.type === "text" ? "password" : "text";
        passwordToggle.classList.toggle("fa-eye");
        passwordToggle.classList.toggle("fa-eye-slash");
    }

    let password = document.querySelector("#password input");
    let passwordToggle = document.querySelector("#password-toggle");

    passwordToggle.addEventListener("click", () =>
        togglePasswordVisibility(password, passwordToggle)
    );

    document.body.addEventListener("htmx:afterSwap", () => {
        let updatedPassword = document.querySelector("#password input");
        let updatedPasswordToggle = document.querySelector("#password-toggle");
        updatedPasswordToggle.addEventListener("click", () =>
            togglePasswordVisibility(updatedPassword, updatedPasswordToggle)
        );
    });
})();
s;
