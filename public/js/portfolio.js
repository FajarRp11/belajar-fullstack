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
        console.log(data);

        if (data && data.status && data.data) {
            // displayPortfolio(data.data);
            const biodata = data.data.biodata;
            const pendidikan = data.data.pendidikan;
            const pengalaman = data.data.pengalaman;
            console.log("biodata: ", biodata);
            console.log("pendidikan: ", pendidikan);
            console.log("pengalaman: ", pengalaman);
        }
    } catch (error) {
        console.error("error loading data: ", error);
    }
}

document.addEventListener("DOMContentLoaded", getPortfolio);
