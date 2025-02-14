async function loadExperience() {
    try {
        const authToken = localStorage.getItem("authToken");

        if (!authToken) {
            window.location.href = login;
            throw new Error("Token tidak ditemukan");
        }
        const response = await fetch(
            "http://belajar-api.test/api/pengalaman/user",
            {
                method: "GET",
                headers: {
                    Accept: "application/json",
                    Authorization: "Bearer " + authToken,
                },
            }
        );

        if (!response.ok) {
            throw new Error("Gagal mengakses data pengalaman");
        }

        const data = await response.json();

        if (data && data.status && data.data) {
            displayTable(data.data);
        } else {
            throw new Error("Data tidak ditemukan");
        }
    } catch (error) {
        console.error("Error loading experience data: ", error);
    }
}

function displayTable(data) {
    const experienceList = document.getElementById("experience-list");
    experienceList.innerHTML = "";

    data.forEach((item) => {
        const row = document.createElement("tr");
        row.className =
            "odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200";

        row.innerHTML = `
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                ${item.nama_institusi}
            </th>
            <td class="px-6 py-4">${item.posisi}</td>
            <td class="px-6 py-4">${item.tahun_mulai}</td>
            <td class="px-6 py-4">${item.tahun_berakhir}</td>
            <td class="px-6 py-4">${item.deskripsi || "No Desciption"}</td>
            <td class="px-6 py-4 flex items-center gap-4">
                <button onclick="openEditModal('${
                    item.id
                }')" data-modal-target="edit-modal" data-modal-toggle="edit-modal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="button">Edit</button>
                <button onclick="openDeleteModal('${
                    item.id
                }')" data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="font-medium text-red-600 dark:text-red-500 hover:underline" type="button">Delete</button>
            </td>
        `;

        experienceList.appendChild(row);
    });
}

async function submitForm(event) {
    event.preventDefault();

    const authToken = localStorage.getItem("authToken");

    const newExperience = {
        nama_institusi: document.getElementById("create_nama_institusi").value,
        posisi: document.getElementById("create_posisi").value,
        tahun_mulai: document.getElementById("create_tahun_mulai").value,
        tahun_berakhir: document.getElementById("create_tahun_berakhir").value,
        deskripsi: document.getElementById("create_deskripsi").value || "",
    };

    try {
        const response = await fetch(
            "http://belajar-api.test/api/pengalaman/store",
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + authToken,
                },
                body: JSON.stringify(newExperience),
            }
        );

        if (!response.ok) {
            throw new Error("Gagal menambah data pengalaman");
        }

        alert("Data berhasil pendidikan berhasil ditambahkan");
        document.getElementById("create-modal").classList.add("hidden");
        document.getElementById("create-modal").classList.remove("flex");

        event.target.reset();

        loadExperience();
    } catch (error) {
        console.error("Error saving experince data: ", error);
        alert("Gagal menyimpan data: " + error.message);
    }
}

async function openEditModal(id) {
    try {
        const token = localStorage.getItem("authToken");
        if (!token) {
            window.location.href = login;
            return;
        }

        const response = await fetch(
            `http://belajar-api.test/api/pengalaman/edit/${id}`,
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
            throw new Error(`Gagal mengambil data: ${response.status}`);
        }

        const data = await response.json();
        console.log("Received data:", data);

        const modal = document.getElementById("edit-modal");
        modal.classList.remove("hidden");
        modal.classList.add("flex");

        if (data && data.data) {
            document.getElementById("nama_institusi").value =
                data.data.nama_institusi || "";
            document.getElementById("posisi").value = data.data.posisi || "";
            document.getElementById("tahun_mulai").value =
                data.data.tahun_mulai || "";
            document.getElementById("tahun_berakhir").value =
                data.data.tahun_berakhir || "";
            document.getElementById("deskripsi").value =
                data.data.deskripsi || "";
        }

        const form = modal.querySelector("form");
        form.dataset.educationId = id;

        // Hapus event listener lama jika ada
        form.removeEventListener("submit", handleSubmit);
        // Tambah event listener baru
        form.addEventListener("submit", handleSubmit);
    } catch (error) {
        const modal = document.getElementById("edit-modal");
        console.error("Detailed error in openEditModal:", error);
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }
}

// Handle edit form submit
async function updateExperience(id, updateData) {
    try {
        const token = localStorage.getItem("authToken");
        const response = await fetch(
            `http://belajar-api.test/api/pengalaman/update/${id}`,
            {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + token,
                },
                body: JSON.stringify(updateData),
            }
        );

        if (!response.ok) {
            throw new Error("Gagal update data");
        }

        alert("Data berhasil diperbarui");
        loadExperience();
    } catch (error) {
        console.error("Error update education data: ", error);
        alert("Gagal update data");
    }
}

async function handleSubmit(event) {
    event.preventDefault();

    const id = event.target.dataset.educationId;
    const updateData = {
        nama_institusi: document.getElementById("nama_institusi").value,
        posisi: document.getElementById("posisi").value,
        tahun_mulai: document.getElementById("tahun_mulai").value,
        tahun_berakhir: document.getElementById("tahun_berakhir").value,
        deskripsi: document.getElementById("deskripsi").value,
    };

    await updateExperience(id, updateData);

    // Tutup modal setelah update berhasil
    const modal = document.getElementById("edit-modal");
    modal.classList.add("hidden");
    modal.classList.remove("flex");
}
document.addEventListener("DOMContentLoaded", loadExperience);
