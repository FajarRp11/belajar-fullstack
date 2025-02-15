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
