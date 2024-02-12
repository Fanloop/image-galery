document.addEventListener("DOMContentLoaded", () => {
    let dropdowns = document.querySelectorAll(".dropdown") ?? undefined;

    dropdowns.forEach(function (dropdown) {
        dropdown.addEventListener("click", function () {
            let activeDropdown = dropdown.children[1];
            let icon = dropdown.children[0].children[0];

            if (activeDropdown.classList.contains("hidden")) {
                dropdowns.forEach(function (dropdowns) {
                    let otherDropdown = dropdowns.children[1];
                    let icon = dropdowns.children[0].children[0];
                    if (!otherDropdown.classList.contains("hidden")) {
                        otherDropdown.classList.add("hidden");
                        icon.setAttribute("name", "folder");
                    }
                });
                activeDropdown.classList.remove("hidden");
                icon.setAttribute("name", "folder-open");
            } else {
                activeDropdown.classList.add("hidden");
                if (icon.getAttribute("name") === "folder-open") {
                    icon.setAttribute("name", "folder");
                }
            }
        });
    });

    document.addEventListener("click", function (event) {
        if (!event.target.closest(".dropdown")) {
            dropdowns.forEach(function (dropdown) {
                let hide = dropdown.children[1];
                let icon = dropdown.children[0].children[0];
                if (!hide.classList.contains("hidden")) {
                    hide.classList.add("hidden");
                    icon.setAttribute("name", "folder");
                }
            });
        }
    });
});
