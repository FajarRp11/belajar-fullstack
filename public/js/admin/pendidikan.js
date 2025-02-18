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
                }')" data-modal-target="edit-modal" data-modal-toggle="edit-modal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </button>
                <button onclick="openDeleteModal('${
                    item.id
                }')" class="font-medium text-red-600 dark:text-red-500 hover:underline" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>
            </td>
        `;

        educationList.appendChild(row);
    });
}

document.getElementById("open-create-modal").addEventListener("click", () => {
    document.getElementById("create-modal").classList.remove("hidden");
    document.getElementById("create-modal").classList.add("flex");
});

document.getElementById("close-create-modal").addEventListener("click", () => {
    document.getElementById("create-modal").classList.remove("flex");
    document.getElementById("create-modal").classList.add("hidden");
});

async function submitForm(event) {
    event.preventDefault();

    const token = localStorage.getItem("authToken");

    const newEducation = {
        nama_institusi: document.getElementById("create_nama_institusi").value,
        jurusan: document.getElementById("create_jurusan").value,
        tahun_masuk: document.getElementById("create_tahun_masuk").value,
        tahun_lulus: document.getElementById("create_tahun_lulus").value,
    };

    try {
        const response = await fetch(
            "http://belajar-api.test/api/riwayat-pendidikan/store",
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + token,
                },
                body: JSON.stringify(newEducation),
            }
        );

        const responseData = await response.json();
        console.log("Response:", responseData); // Untuk debugging

        if (!response.ok) {
            throw new Error("Gagal menambah data pendidikan");
        }

        alert("Data berhasil pendidikan berhasil ditambahkan");
        document.getElementById("create-modal").classList.remove("flex");
        document.getElementById("create-modal").classList.add("hidden");

        event.target.reset();

        loadEducation();
    } catch (error) {
        console.error("Error saving education data: ", error);
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
            document.getElementById("jurusan").value = data.data.jurusan || "";
            document.getElementById("tahun_masuk").value =
                data.data.tahun_masuk || "";
            document.getElementById("tahun_lulus").value =
                data.data.tahun_lulus || "";
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

document.getElementById("close-edit-modal").addEventListener("click", () => {
    document.getElementById("edit-modal").classList.remove("flex");
    document.getElementById("edit-modal").classList.add("hidden");
});

// Handle edit form submit
async function updateEducation(id, updateData) {
    try {
        const token = localStorage.getItem("authToken");
        const response = await fetch(
            `http://belajar-api.test/api/riwayat-pendidikan/update/${id}`,
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
        loadEducation();
    } catch (error) {
        console.error("Error update education data: ", error);
        alert("Gagal update data");
    }
}

// Handler untuk form submit
async function handleSubmit(event) {
    event.preventDefault();

    const id = event.target.dataset.educationId;
    const updateData = {
        nama_institusi: document.getElementById("nama_institusi").value,
        jurusan: document.getElementById("jurusan").value,
        tahun_masuk: document.getElementById("tahun_masuk").value,
        tahun_lulus: document.getElementById("tahun_lulus").value,
    };

    await updateEducation(id, updateData);

    // Tutup modal setelah update berhasil
    const modal = document.getElementById("edit-modal");
    modal.classList.add("hidden");
    modal.classList.remove("flex");
}

const deleteModal = document.getElementById("delete-modal");
function openDeleteModal(id) {
    deleteModal.classList.remove("hidden");
    deleteModal.classList.add("flex");
    deleteModal.dataset.educationId = id;
}

function closeDeleteModal() {
    deleteModal.classList.remove("flex");
    deleteModal.classList.add("hidden");
    delete deleteModal.dataset.educationId;
}

document
    .getElementById("delete-modal-hide")
    .addEventListener("click", closeDeleteModal);

document
    .getElementById("cancel-delete")
    .addEventListener("click", closeDeleteModal);

// Event listener untuk tombol confirm delete
document
    .getElementById("confirm-delete")
    .addEventListener("click", async function () {
        try {
            const modal = document.getElementById("delete-modal");
            const id = modal.dataset.educationId;
            console.log("Deleting ID:", id); // Debug

            const authToken = localStorage.getItem("authToken");

            // Disable tombol saat proses
            this.disabled = true;

            const response = await fetch(
                `http://belajar-api.test/api/riwayat-pendidikan/delete/${id}`,
                {
                    method: "DELETE",
                    headers: {
                        Authorization: "Bearer " + authToken,
                        Accept: "application/json",
                    },
                }
            );

            const data = await response.json();
            console.log("Response:", data); // Debug

            if (!response.ok) {
                throw new Error(
                    data.message || "Terjadi kesalahan saat menghapus data"
                );
            }

            await loadEducation();
            alert("Berhasil menghapus data pendidikan");
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        } catch (error) {
            console.error("Error:", error);
            alert(error.message);
        } finally {
            // Enable kembali tombol
            this.disabled = false;
        }
    });

document.addEventListener("DOMContentLoaded", loadEducation);
