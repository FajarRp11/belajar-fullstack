document.addEventListener("DOMContentLoaded", () => {
    const sidebarToggle = document.getElementById("sidebarToggle");
    const sidebar = document.getElementById("sidebar");
    let isSidebarOpen = false;

    sidebarToggle.addEventListener("click", () => {
        isSidebarOpen = !isSidebarOpen;
        if (isSidebarOpen) {
            sidebar.classList.remove("-translate-x-full");
            sidebar.classList.add("translate-x-0");
        } else {
            sidebar.classList.remove("translate-x-0");
            sidebar.classList.add("-translate-x-full");
        }
    });

    // Close sidebar when clicking outside on mobile
    document.addEventListener("click", (e) => {
        if (window.innerWidth < 1024) {
            // lg breakpoint
            if (
                !sidebar.contains(e.target) &&
                !sidebarToggle.contains(e.target) &&
                isSidebarOpen
            ) {
                isSidebarOpen = false;
                sidebar.classList.remove("translate-x-0");
                sidebar.classList.add("-translate-x-full");
            }
        }
    });

    document.getElementById("close-sidebar").addEventListener("click", () => {
        isSidebarOpen = false;
        sidebar.classList.remove("translate-x-0");
        sidebar.classList.add("-translate-x-full");
    });

    // Handle window resize
    window.addEventListener("resize", () => {
        if (window.innerWidth >= 1024) {
            // lg breakpoint
            sidebar.classList.remove("-translate-x-full");
            sidebar.classList.add("translate-x-0");
        } else {
            if (!isSidebarOpen) {
                sidebar.classList.remove("translate-x-0");
                sidebar.classList.add("-translate-x-full");
            }
        }
    });
});
