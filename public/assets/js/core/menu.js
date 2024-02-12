document.addEventListener("DOMContentLoaded", () => {
    const menu = document.querySelector("#menu") ?? undefined;
    const gallery = document.querySelector("#gallery") ?? undefined;
    const button1 = menu.children[0] ?? undefined;
    const button2 = menu.children[1] ?? undefined;
    let translateClass = "after:-translate-x-full";
    let hiddenClass = "hidden";
    let fontBoldClass = "font-bold";
    let fontMediumClass = "font-medium";

    button1.addEventListener("click", () => {
        button2.classList.add(fontMediumClass);
        button2.classList.remove(fontBoldClass);
        button2.children[0].classList.add(hiddenClass);
        button2.children[1].classList.remove(hiddenClass);
        if (!menu.classList.contains(translateClass)) {
            menu.classList.add(translateClass);
            button1.classList.add(fontBoldClass);
            button1.classList.remove(fontMediumClass);
            button1.children[0].classList.add(hiddenClass);
            button1.children[1].classList.remove(hiddenClass);
        }
    });
    button2.addEventListener("click", () => {
        button1.classList.remove(fontBoldClass);
        button1.classList.add(fontMediumClass);
        button2.classList.remove(fontMediumClass);
        button2.classList.add(fontBoldClass);
        button1.children[0].classList.remove(hiddenClass);
        button1.children[1].classList.add(hiddenClass);
        button2.children[0].classList.remove(hiddenClass);
        button2.children[1].classList.add(hiddenClass);
        if (menu.classList.contains(translateClass)) {
            menu.classList.remove(translateClass);
        }
    });
});
