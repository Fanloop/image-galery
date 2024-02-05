(function () {
    function togglePasswordVisibility(passwordInput, passwordToggle) {
        passwordInput.type =
            passwordInput.type === "text" ? "password" : "text";
        let imgElement = document.querySelector("#password-toggle");
        if (imgElement) {
            if (passwordInput.type === "text") {
                imgElement.src =
                    "/assets/icon/visibility_FILL0_wght400_GRAD0_opsz24.svg";
            } else {
                imgElement.src =
                    "/assets/icon/visibility_off_FILL0_wght400_GRAD0_opsz24.svg";
            }
        }
    }

    function setupToggleEventListeners() {
        let password = document.querySelector("#password input");
        let passwordToggle = document.querySelector("#password-toggle");

        if (password && passwordToggle) {
            passwordToggle.removeEventListener("click", () =>
                togglePasswordVisibility(password, passwordToggle)
            );

            passwordToggle.addEventListener("click", () =>
                togglePasswordVisibility(password, passwordToggle)
            );
        }
    }

    setupToggleEventListeners();

    document.body.addEventListener("htmx:afterSwap", () => {
        setupToggleEventListeners();
    });
})();
