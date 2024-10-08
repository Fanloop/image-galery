document.addEventListener("livewire:navigated", () => {
    console.log("pindah halaman");
    const passwordField = document.querySelector("#password") ?? undefined;
    const passwordToggle =
        document.querySelector("#password-toggle") ?? undefined;

    passwordToggle.addEventListener("click", () => {
        console.log("tombol diklik");
        passwordField.type =
            passwordField.type === "text" ? "password" : "text";
        if (passwordField.type === "text") {
            passwordToggle.children[0].classList.remove("bi-eye-slash");
            passwordToggle.children[0].classList.add("bi-eye");
        } else {
            passwordToggle.children[0].classList.remove("bi-eye");
            passwordToggle.children[0].classList.add("bi-eye-slash");
        }
        console.log(passwordField.type);
    });
});
