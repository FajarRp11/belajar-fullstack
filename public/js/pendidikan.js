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

document.addEventListener("DOMContentLoaded", loadEducation);

// Hapus event listener lama
document.addEventListener("DOMContentLoaded", function () {
    // Event delegation untuk tombol delete
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("delete-btn")) {
            const id = e.target.dataset.id;
            console.log("Delete clicked for ID:", id); // Debug
            openDeleteModal(id);
        }
    });

    // Load initial data
    loadEducation();
});

function openDeleteModal(id) {
    console.log("Opening modal for ID:", id); // Debug
    const modal = document.getElementById("delete-modal");
    modal.classList.remove("hidden");
    modal.classList.add("flex");
    modal.dataset.educationId = id;
}

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
