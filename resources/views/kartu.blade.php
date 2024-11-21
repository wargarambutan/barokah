<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Identitas</title>
</head>

<body>
    <button id="generate-pdf">Generate PDF</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        document.getElementById('generate-pdf').addEventListener('click', () => {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Warna latar belakang
            doc.setFillColor(230, 252, 245); // Hijau pucat
            doc.rect(0, 0, 210, 297, "F");

            // Tambahkan lingkaran latar
            doc.setDrawColor(85, 151, 117); // Hijau gelap
            doc.circle(70, 50, 40, "S");

            // Tambahkan logo
            const logoUrl = '{{ asset('img/logo.png') }}'; // Ganti dengan logo Anda
            const avatarUrl = '{{ asset('img/gambar (2).jpg') }}'; // Ganti dengan avatar
            const qrCodeUrl = '{{ asset('img/gambar (1).jpg') }}'; // Ganti dengan QR Code

            const img = new Image();
            img.src = logoUrl;
            img.onload = function() {
                doc.addImage(img, "PNG", 150, 10, 40, 20);

                // Tambahkan teks
                doc.setFont("helvetica", "bold");
                doc.setFontSize(18);
                doc.setTextColor(0, 85, 51);
                doc.text("NAMA ORANG", 105, 95, {
                    align: "center"
                });

                doc.setFont("helvetica", "normal");
                doc.setFontSize(14);
                doc.setTextColor(0, 128, 64);
                doc.text("Jabatannya", 105, 105, {
                    align: "center"
                });

                doc.setFontSize(12);
                doc.setTextColor(0, 0, 0);
                doc.text("No ID : A10002", 80, 120);
                doc.text("No. Tlp : 0800800", 80, 130);

                // Tambahkan QR Code
                const qrImg = new Image();
                qrImg.src = qrCodeUrl;
                qrImg.onload = function() {
                    doc.addImage(qrImg, "PNG", 80, 140, 40, 40);
                    doc.save("kartu_identitas.pdf");
                };
            };
        });
    </script>
</body>

</html>
