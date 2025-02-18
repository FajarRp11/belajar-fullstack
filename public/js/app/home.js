async function getAllUser() {
    try {
        const response = await fetch("http://belajar-api.test/api/portfolio", {
            method: "GET",
            headers: {
                Accept: "application/json",
            },
        });

        if (!response.ok) {
            throw new Error("Data not found");
        }

        const data = await response.json();

        if (data && data.status && data.data) {
            displayUsername(data.data);
        }
    } catch (error) {
        console.error(`Error loading data: ${error}`);
    }
}

function displayUsername(data) {
    const userList = document.getElementById("user-list-container");

    data.forEach((item) => {
        userList.innerHTML += `
            <a href="/portfolio/${item.username}" class="p-4 border rounded-lg bg-transparent hover:bg-white text-gray-100 hover:text-gray-900 transition-colors">
                <div class="flex items-center">
                    <span class="ml-3">${item.name}</span>
                </div>
            </a>
        `;
    });
}

document.addEventListener("DOMContentLoaded", getAllUser);
