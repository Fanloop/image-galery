window.addEventListener("load", () => {
    const bio = document.querySelector("#bio") ?? undefined;
    const bioParent = bio.parentElement ?? undefined;
    const moreHide = document.querySelector("#more-hide") ?? undefined;
    let height = bio.clientHeight;

    if (height > 50) {
        moreHide.classList.remove("hidden");
    }
    moreHide.addEventListener("click", () => {
        if (moreHide.textContent === "more...") {
            bioParent.classList.remove("h-12");
            moreHide.textContent = "hide";
        } else {
            bioParent.classList.add("h-12");
            moreHide.textContent = "more...";
        }
    });
});
