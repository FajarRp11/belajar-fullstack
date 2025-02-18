const mobileMenuButton = document.getElementById("mobile-menu-button");
const mobileMenu = document.getElementById("mobile-menu");
const menuIcon = document.getElementById("menu-icon");
const closeIcon = document.getElementById("close-icon");
let isMenuOpen = false;

window.addEventListener("scroll", function () {
    const nav = document.getElementById("nav");
    let scrollPosition = window.scrollY;

    if (scrollPosition >= 60) {
        nav.classList.add("bg-gray-800/10");
        nav.classList.add("backdrop-blur-lg");
    } else {
        if (window.screen.width < 768) {
            nav.classList.add("bg-gray-800/10");
            nav.classList.add("backdrop-blur-lg");
        } else {
            nav.classList.remove("bg-gray-800/10");
            nav.classList.remove("backdrop-blur-lg");
        }
    }
});

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
