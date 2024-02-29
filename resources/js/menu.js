document.addEventListener("livewire:navigated", () => {
    const menu = document.querySelector("#menu") ?? undefined;
    const button1 = menu.children[0] ?? undefined;
    const button2 = menu.children[1] ?? undefined;
    let translateClass = "after:-translate-x-full";
    let fontBoldClass = "font-bold";
    let fontMediumClass = "font-medium";

    button1.addEventListener("click", () => {
        button2.classList.add(fontMediumClass);
        button2.classList.remove(fontBoldClass);
        button2.children[0].classList.add("bi-heart");
        button2.children[0].classList.remove("bi-heart-fill");
        if (!menu.classList.contains(translateClass)) {
            menu.classList.add(translateClass);
            button1.classList.add(fontBoldClass);
            button1.classList.remove(fontMediumClass);
            button1.children[0].classList.add("bi-folder-fill");
            button1.children[0].classList.remove("bi-folder");
        }
    });
    button2.addEventListener("click", () => {
        button1.classList.add(fontMediumClass);
        button1.classList.remove(fontBoldClass);
        button2.classList.add(fontBoldClass);
        button2.classList.remove(fontMediumClass);
        button1.children[0].classList.add("bi-folder");
        button1.children[0].classList.remove("bi-folder-fill");
        button2.children[0].classList.add("bi-heart-fill");
        button2.children[0].classList.remove("bi-heart");
        if (menu.classList.contains(translateClass)) {
            menu.classList.remove(translateClass);
        }
    });
});
