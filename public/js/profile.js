async function loadUserData() {
    try {
        const token = localStorage.getItem("authToken");

        if (!token) {
            window.location.href = login;

            throw new Error("Token tidak ditemukan");
        }

        // jika data belum diambil, ambil data dari API
        const response = await fetch(
            "http://belajar-api.test/api/biodata/user",
            {
                method: "GET",
                headers: {
                    Accept: "application/json",
                    Authorization: "Bearer " + token,
                },
            }
        );

        if (!response.ok) {
            throw new Error("Gagal mengakses data pengguna");
        }

        const data = await response.json();

        if (data && data.status && data.data) {
            updateProfil(data.data);
        } else {
            throw new Error("Data pengguna tidak ditemukan");
        }
    } catch (error) {
        throw new Error("Error loading education data: ", error);
    }
}

function formatDate(dateString) {
    if (!dateString) return "Tanggal lahir tidak tersedia";

    const date = new Date(dateString);

    // Cek apakah tanggal valid
    if (isNaN(date.getTime())) return "Format tanggal tidak valid";

    // Ambil tanggal, bulan, dan tahun
    const day = String(date.getDate()).padStart(2, "0");
    const month = String(date.getMonth() + 1).padStart(2, "0"); // +1 karena bulan dimulai dari 0
    const year = date.getFullYear();

    return `${day}-${month}-${year}`;
}

function updateProfil(data) {
    document.getElementById("name").textContent =
        data.name || "Nama tidak tersedia";
    document.getElementById("profileImage").src = data.foto || profileImage;
    document.getElementById("tanggal_lahir").textContent =
        formatDate(data.tanggal_lahir) || "Tanggal lahir tidak tersedia";
    document.getElementById("email").textContent =
        data.email || "Email tidak tersedia";
    document.getElementById("phone").textContent =
        data.nomor_hp || "Nomor Hp tidak tersedia";
    document.getElementById("gender").textContent =
        data.gender || "Gender tidak tersedia";
}

document.addEventListener("DOMContentLoaded", loadUserData);
