const { jsPDF } = window.jspdf;

const PRIMARY_COLOR = "#2b706f";
const SECONDARY_COLOR = "#28aa72";

async function getDataUrl(url, dWidth, dHeight) {
    return new Promise((resolve) => {
        const image = new Image();
        image.onload = function () {
            const canvas = document.createElement("canvas");
            canvas.width = dWidth;
            canvas.height = dHeight;

            const ctx = canvas.getContext("2d");

            // Menggambar gambar dengan sudut melengkung
            const radius = dWidth * 0.1; // Gunakan proporsi dari lebar gambar untuk radius
            ctx.beginPath();
            ctx.moveTo(radius, 0);
            ctx.lineTo(dWidth - radius, 0);
            ctx.quadraticCurveTo(dWidth, 0, dWidth, radius);
            ctx.lineTo(dWidth, dHeight - radius);
            ctx.quadraticCurveTo(dWidth, dHeight, dWidth - radius, dHeight);
            ctx.lineTo(radius, dHeight);
            ctx.quadraticCurveTo(0, dHeight, 0, dHeight - radius);
            ctx.lineTo(0, radius);
            ctx.quadraticCurveTo(0, 0, radius, 0);
            ctx.closePath();
            ctx.clip(); // Membatasi area gambar ke dalam bentuk persegi dengan sudut melengkung

            ctx.drawImage(this, 0, 0, dWidth, dHeight);

            resolve(canvas.toDataURL("image/png"));
        };
        image.onerror = function () {
            resolve(EMPTY_IMAGE);
        };
        image.src = url;
    });
}

function getQrCodeUri(text) {
    const qrContainer = document.createElement("div");
    new QRCode(qrContainer, text);
    return qrContainer.querySelector("canvas").toDataURL("image/png");
}

async function generateIdCard() {
    const doc = new jsPDF({
        orientation: "portrait",
        unit: "in", // Menggunakan inci
        format: [2.13, 3.37], // Ukuran ID card dalam inci
    });

    doc.addFileToVFS("Poppins-Bold", POPPINS_BOLD);
    doc.addFont("Poppins-Bold", "Poppins", "bold");
    doc.addFileToVFS("Poppins-Medium", POPPINS_MEDIUM);
    doc.addFont("Poppins-Medium", "Poppins", "medium");

    // Menambahkan gambar background (opsional)
    const backgroundImageUrl = "/admin/img/bgpl.png";
    const backgroundImageWidth = 2.13;
    const backgroundImageHeight = 3.38;

    const background = new Image();
    background.src = backgroundImageUrl;

    background.onload = async function () {
        // Menambahkan gambar background
        doc.addImage(
            background,
            "JPEG",
            0,
            0,
            backgroundImageWidth,
            backgroundImageHeight
        );

        doc.setFillColor(PRIMARY_COLOR);

        // // Menggambar persegi dengan sudut melengkung
        // doc.roundedRect(0.61, 0.8, 0.9, 0.9, 0.1, 0.1, "F");

        const profileUri = await getDataUrl("/admin/img/kosong.jpg", 400, 400);

        // Menggambar border terlebih dahulu
        doc.setLineWidth(0.05); // Set ketebalan garis border
        doc.setDrawColor(PRIMARY_COLOR); // Warna border (hitam)
        doc.roundedRect(0.61, 0.8, 0.9, 0.9, 0.08, 0.08, "S"); // Menggambar persegi dengan sudut melengkung

        // Menambahkan gambar profile di atas border
        doc.addImage(profileUri, "JPG", 0.61, 0.8, 0.9, 0.9, "", "S", 0.08);

        // Nama dan Posisi
        doc.setFont("Poppins", "bold");
        doc.setFontSize(9);
        doc.setTextColor(PRIMARY_COLOR);
        doc.text(pelangganData.Nama, 1.06525, 1.92, null, null, "center");
        doc.setFont("Poppins", "medium");
        doc.setFontSize(8);
        doc.setTextColor(SECONDARY_COLOR);
        doc.text("Pelanggan", 1.06525, 2.025, null, null, "center");

        // Info
        doc.setFontSize(5.5);
        doc.setTextColor("#000");
        doc.text("No. ID", 0.7, 2.3, null, null, "center");
        doc.text(":", 0.958, 2.3, null, null, "center");
        doc.text(pelangganData.NUP_Id, 1.32, 2.3, null, null, "center");
        doc.text("No. Telp", 0.745, 2.4, null, null, "center");
        doc.text(":", 0.958, 2.4, null, null, "center");
        doc.text(pelangganData.No_WA, 1.3, 2.4, null, null, "center");

        // doc.setFillColor("#000");
        // doc.rect(0.833, 2.68, 0.5, 0.5, "F");
        const qrCodeUri = getQrCodeUri(pelangganData.NUP_Id);
        doc.addImage(qrCodeUri, 0.833, 2.68, 0.505, 0.505);

        // Menampilkan PDF dalam iframe
        document
            .getElementById("idcard-preview")
            .setAttribute("src", URL.createObjectURL(doc.output("blob")));
    };
}
