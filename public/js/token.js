async function checkAuth() {
    // event.preventDefault();
    try {
        const authToken = localStorage.getItem("authToken");

        if (!authToken) {
            throw new Error("Token tidak ditemukan");
        }

        const response = await fetch("http://belajar-api.test/api/user", {
            method: "GET",
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + authToken,
            },
        });

        if (!response.ok) {
            throw new Error("User tidak terautentikasi");
        }

        const data = await response.json();
        console.log("User sudah login: ", data);

        if (data && data.id) {
            window.location.href = window.routes.dashboard;
        }
    } catch (error) {
        console.warn("User belum login:", error);
        if (window.location.pathname !== window.routes.login) {
            window.location.href = window.routes.login;
        }
    }
}

document.addEventListener("DOMContentLoaded", checkAuth);
