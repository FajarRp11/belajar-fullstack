const mobileMenuButton = document.getElementById("mobile-menu-button");
const mobileMenu = document.getElementById("mobile-menu");
const menuIcon = document.getElementById("menu-icon");
const closeIcon = document.getElementById("close-icon");
let isMenuOpen = false;

mobileMenuButton.addEventListener("click", () => {
    isMenuOpen = !isMenuOpen;

    if (isMenuOpen) {
        mobileMenu.classList.remove("hidden");
        menuIcon.classList.add("hidden");
        closeIcon.classList.remove("hidden");
    } else {
        mobileMenu.classList.add("hidden");
        menuIcon.classList.remove("hidden");
        closeIcon.classList.add("hidden");
    }
});

document.getElementById("open-create-modal").addEventListener("click", () => {
    document.getElementById("create-modal").classList.remove("hidden");
    document.getElementById("create-modal").classList.add("flex");
});

document.getElementById("close-create-modal").addEventListener("click", () => {
    document.getElementById("create-modal").classList.remove("flex");
    document.getElementById("create-modal").classList.add("hidden");
});

document.getElementById("close-edit-modal").addEventListener("click", () => {
    document.getElementById("edit-modal").classList.remove("flex");
    document.getElementById("edit-modal").classList.add("hidden");
});
