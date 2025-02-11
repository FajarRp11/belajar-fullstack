// login.js
document.addEventListener("DOMContentLoaded", async function () {
    // Handle register success message
    const registerSuccessMessage = localStorage.getItem(
        "registerSuccessMessage"
    );
    if (registerSuccessMessage) {
        const alertElement = document.getElementById("register-alert");
        alertElement.classList.remove("hidden");
        alertElement.classList.add("flex");
        document.getElementById("register-success").textContent =
            registerSuccessMessage;

        document
            .getElementById("close-alert")
            .addEventListener("click", function () {
                alertElement.classList.remove("flex");
                alertElement.classList.add("hidden");
                localStorage.removeItem("registerSuccessMessage");
            });

        setTimeout(() => {
            alertElement.classList.remove("flex");
            alertElement.classList.add("hidden");
            localStorage.removeItem("registerSuccessMessage");
        }, 3000);
    }

    // Check authentication status
    try {
        const authToken = localStorage.getItem("authToken");
        if (authToken) {
            const response = await fetch("http://belajar-api.test/api/user", {
                method: "GET",
                headers: {
                    Accept: "application/json",
                    Authorization: "Bearer " + authToken,
                },
            });

            if (response.ok) {
                const data = await response.json();
                if (data && data.id) {
                    window.location.href = window.routes.dashboard;
                    return;
                }
            }
        }
    } catch (error) {
        console.warn("Auth check error:", error);
    }

    // Handle login form submission
    document
        .querySelector("form")
        .addEventListener("submit", async function (e) {
            e.preventDefault();
            const errorMessage = document.getElementById("errorMessage");

            if (errorMessage) {
                errorMessage.classList.add("hidden");
            }

            const requestData = {
                username: document.getElementById("username").value,
                password: document.getElementById("password").value,
            };

            try {
                await fetch("http://belajar-api.test/sanctum/csrf-cookie", {
                    method: "GET",
                    credentials: "include",
                });

                const response = await fetch(
                    "http://belajar-api.test/api/login",
                    {
                        method: "POST",
                        headers: {
                            "Content-type": "application/json",
                            Accept: "application/json",
                        },
                        credentials: "include",
                        body: JSON.stringify(requestData),
                    }
                );

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(
                        data.message ||
                            `Error ${response.status}: ${response.statusText}`
                    );
                }

                if (data.status && data.data && data.data.token) {
                    localStorage.setItem("authToken", data.data.token);
                    window.location.href = window.routes.dashboard;
                } else {
                    throw new Error("Nama pengguna tidak ditemukan");
                }
            } catch (error) {
                console.error("Login error: ", error);
                if (errorMessage) {
                    errorMessage.textContent =
                        error.message || "Terjadi kesalahan saat login";
                    errorMessage.classList.remove("hidden");
                }
                const passwordField = document.getElementById("password");
                if (passwordField) {
                    passwordField.value = "";
                    passwordField.focus();
                }
            }
        });
});
