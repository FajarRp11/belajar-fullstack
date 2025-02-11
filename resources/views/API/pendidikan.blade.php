<script>
async function loadEducation() {
    try {
        const token = localStorage.getItem("authToken");

        if (!token) {
            window.location.href = login;
            throw new Error("Token tidak ditemukan");
        }

        // jika data belum diambil, ambil data dari API
        const response = await fetch(
            "http://belajar-api.test/api/riwayat-pendidikan/user",
            {
                method: "GET",
                headers: {
                    Accept: "application/json",
                    Authorization: "Bearer " + token,
                },
            }
        );

        if (!response.ok) {
            throw new Error("Gagal mengakses data pendidikan");
        }

        const data = await response.json();

        if (data && data.status && data.data) {
            displayTable(data.data);
        } else {
            throw new Error("Data tidak ditemukan");
        }
    } catch (error) {
        console.error("Error loading education data: ", error);
    }
}

function displayTable(data) {
    const educationList = document.getElementById("education-list");
    educationList.innerHTML = ""; // Kosongkan dulu

    data.forEach((item) => {
        const row = document.createElement("tr");
        row.className =
            "odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200";

        row.innerHTML = `
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                ${item.nama_institusi}
            </th>
            <td class="px-6 py-4">
                ${item.jurusan}
            </td>
            <td class="px-6 py-4">
                ${item.tahun_masuk}
            </td>
            <td class="px-6 py-4">
                ${item.tahun_lulus ?? "No data"}
            </td>
            <td class="px-6 py-4 flex items-center gap-4">
                <button onclick="openEditModal('${
                    item.id
                }')" data-modal-target="edit-modal" data-modal-toggle="edit-modal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="button">Edit</button>
                <button onclick="openDeleteModal('${
                    item.id
                }')" data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="font-medium text-red-600 dark:text-red-500 hover:underline" type="button">Delete</button>
            </td>
        `;

        educationList.appendChild(row);
    });
}

async function openEditModal(id) {
    try {
        const modal = document.getElementById("edit-modal");
        const form = modal.querySelector("form");
        form.dataset.educationId = id;
        
        const token = localStorage.getItem("authToken");
        if (!token) {
            window.location.href = login;
            return;
        }

        // Show modal first
        modal.classList.remove("hidden");
        modal.classList.add("flex");

        // Log the URL and token (remove sensitive parts for security)
        console.log("Requesting URL:", `http://belajar-api.test/api/riwayat-pendidikan/edit/${id}`);
        console.log("Token exists:", !!token);

        const response = await fetch(
            `http://belajar-api.test/api/riwayat-pendidikan/edit/${id}`,
            {
                method: "GET",
                headers: {
                    Accept: "application/json",
                    Authorization: "Bearer " + token,
                },
            }
        );

        // Add these debug lines
        console.log("Response status:", response.status);
        console.log("Response ok:", response.ok);

        if (!response.ok) {
            const errorData = await response.text();
            console.log("Error response:", errorData);
            throw new Error(`Gagal mengambil data: ${response.status} ${errorData}`);
        }

        const data = await response.json();
        console.log("Received data:", data);

        if (data && data.data) {
            document.getElementById("nama_institusi").value = data.data.nama_institusi || '';
            document.getElementById("jurusan").value = data.data.jurusan || '';
            document.getElementById("tahun_masuk").value = data.data.tahun_masuk || '';
            document.getElementById("tahun_lulus").value = data.data.tahun_lulus || '';
        }
    } catch (error) {
        const modal = document.getElementById("edit-modal");
        console.error("Detailed error in openEditModal:", error);
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }
}

function openDeleteModal(id) {
    const modal = document.getElementById("delete-modal");
    modal.classList.remove("hidden");
    modal.classList.add("flex");
    modal.dataset.educationId = id;
}

// Handle close modal buttons
document.querySelectorAll("[data-modal-hide]").forEach((button) => {
    button.addEventListener("click", () => {
        const modalId = button.getAttribute("data-modal-hide");
        const modal = document.getElementById(modalId);
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    });
});

// Handle edit form submit
document
    .querySelector("#edit-modal form")
    .addEventListener("submit", function (e) {
        e.preventDefault();
        const id = this.dataset.educationId;

        const formData = {
            nama_institusi: this.querySelector('input[name="nama_institusi"]')
                .value,
            jurusan: this.querySelector('input[name="jurusan"]').value,
            tahun_masuk: this.querySelector('input[name="tahun_masuk"]').value,
            tahun_lulus: this.querySelector('input[name="tahun_lulus"]').value,
        };

        fetch(`http://belajar-api.test/api/riwayat-pendidikan/${id}`, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                Authorization: "Bearer " + localStorage.getItem("authToken"),
            },
            body: JSON.stringify(formData),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status) {
                    document
                        .getElementById("edit-modal")
                        .classList.add("hidden");
                    document
                        .getElementById("edit-modal")
                        .classList.remove("flex");
                    loadEducation();
                }
            });
    });

// Handle delete confirmation
document
    .querySelector("#delete-modal button.bg-red-600")
    .addEventListener("click", function () {
        const modal = document.getElementById("delete-modal");
        const id = modal.dataset.educationId;

        fetch(`http://belajar-api.test/api/riwayat-pendidikan/${id}`, {
            method: "DELETE",
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + localStorage.getItem("authToken"),
            },
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status) {
                    modal.classList.add("hidden");
                    modal.classList.remove("flex");
                    loadEducation();
                }
            });
    });

document.addEventListener("DOMContentLoaded", loadEducation);


document.addEventListener("DOMContentLoaded", loadEducation);

</script>