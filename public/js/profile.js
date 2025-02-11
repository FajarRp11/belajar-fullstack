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

function updateProfil(data) {
    document.getElementById("name").textContent =
        data.name || "Nama tidak tersedia";
    document.getElementById("profileImage").src = data.foto || profileImage;
    document.getElementById("tanggal_lahir").textContent =
        data.tanggal_lahir || "Tanggal lahir tidak tersedia";
    document.getElementById("email").textContent =
        data.email || "Email tidak tersedia";
    document.getElementById("phone").textContent =
        data.nomor_hp || "Nomor Hp tidak tersedia";
    document.getElementById("gender").textContent =
        data.gender || "Gender tidak tersedia";
}

document.addEventListener("DOMContentLoaded", loadUserData);
