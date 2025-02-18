async function getPortfolio() {
    try {
        const response = await fetch(
            `http://belajar-api.test/api/portfolio/user/${username}`,
            {
                method: "GET",
                headers: {
                    Accept: "application/json",
                },
            }
        );

        if (!response.ok) {
            throw new Error("Gagal mengkases data user");
        }

        const data = await response.json();

        if (data && data.status && data.data) {
            const name = data.data.user;
            const biodata = data.data.biodata;
            const pendidikan = data.data.pendidikan;
            const pengalaman = data.data.pengalaman;
            showProfile(biodata, name);
            showEduction(pendidikan);
            showExperience(pengalaman);
        }
    } catch (error) {
        console.error("error loading data: ", error);
    }
}

function showProfile(biodata, name) {
    const biodataItem = Array.isArray(biodata) ? biodata[0] : biodata;
    const foto = biodataItem.foto;

    const fotoUrl = `http://belajar-api.test/api/images/foto/${foto}`;

    document.getElementById("name").innerText = name || "John Doe";
    document.getElementById("userImage").src = fotoUrl || defaultImage;
}

function showEduction(pendidikan) {
    const educationContainer = document.getElementById("education-container");
    educationContainer.innerHTML = "";

    pendidikan.forEach((item) => {
        const itemContainer = document.createElement("div");

        itemContainer.className = "flex flex-col md:flex-row mb-8 md:mb-12";

        itemContainer.innerHTML = `
            <div class="md:w-1/3">
                <div class="bg-gray-800/50 p-4 md:p-6 rounded-lg shadow-lg mb-4 md:mr-4 border border-blue-500/10">
                    <p class="font-bold text-blue-400">${item.tahun_masuk} - ${item.tahun_lulus}</p>
                    <p class="text-gray-400">${item.jenjang}</p>
                </div>
            </div>
            <div class="md:w-2/3">
                <div class="bg-gray-800/50 p-4 md:p-6 rounded-lg shadow-lg border border-blue-500/10">
                    <h3 class="text-xl font-bold text-gray-300 mb-2">${item.jurusan}</h3>
                    <p class="text-blue-400 mb-2">${item.nama_institusi}</p>
                    <p class="text-gray-400">${item.deskripsi}</p>
                </div>
            </div>
        `;

        educationContainer.appendChild(itemContainer);
    });
}

function showExperience(pendidikan) {
    const experienceContainer = document.getElementById("experience-container");
    experienceContainer.innerHTML = "";

    pendidikan.forEach((item) => {
        const itemContainer = document.createElement("div");

        itemContainer.className = "flex flex-col md:flex-row mb-8 md:mb-12";

        itemContainer.innerHTML = `
            <div class="md:w-1/3">
                <div class="bg-gray-800/50 p-4 rounded-lg shadow-lg mb-4 md:mr-4 border border-blue-500/10">
                    <p class="font-bold text-blue-400">${item.tahun_mulai} - ${item.tahun_berakhir}</p>
                </div>
            </div>
            <div class="md:w-2/3">
                <div class="bg-gray-800/50 p-4 rounded-lg shadow-lg border border-blue-500/10">
                    <h3 class="text-xl font-bold text-gray-300 mb-2">${item.posisi}</h3>
                    <p class="text-blue-400 mb-2">${item.nama_institusi}</p>
                    <p class="text-gray-400">${item.deskripsi}</p>
                </div>
            </div>
        `;

        experienceContainer.appendChild(itemContainer);
    });
}

document.addEventListener("DOMContentLoaded", getPortfolio);
