document
    .querySelector("form")
    .addEventListener("submit", async function (event) {
        event.preventDefault();

        const errorMessage = document.getElementById("errorMessage");

        if (errorMessage) {
            errorMessage.classList.add("hidden");
        }

        const registerData = {
            name: document.getElementById("name").value,
            username: document.getElementById("username").value,
            email: document.getElementById("email").value,
            password: document.getElementById("password").value,
        };

        try {
            await fetch("http://belajar-api.test/sanctum/csrf-cookie", {
                method: "GET",
                credentials: "include",
            });

            const response = await fetch(
                "http://belajar-api.test/api/register",
                {
                    method: "POST",
                    headers: {
                        "Content-type": "application/json",
                        Accept: "application/json",
                    },
                    credentials: "include",
                    body: JSON.stringify(registerData),
                }
            );

            const data = await response.json();
            console.log("Response data:", data); // Tambahkan log untuk debugging

            if (!response.ok) {
                throw new Error(
                    data.message ||
                        `Error ${response.status}: ${response.statusText}`
                );
            }

            if (response.ok) {
                localStorage.setItem(
                    "registerSuccessMessage",
                    "Registrasi berhasil"
                );
                window.location.href = window.routes.login; // Gunakan routes yang sudah didefinisikan
            }
        } catch (error) {
            console.error("Error:", error); // Tambahkan log error
            if (errorMessage) {
                errorMessage.textContent = error.message;
                errorMessage.classList.remove("hidden");
            }
        }
    });
