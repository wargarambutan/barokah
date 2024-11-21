<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Karyawan {{ ucfirst($status) }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        .container {
            width: 90%;
            margin: 10px auto 20px auto;
            /* Atur margin top lebih kecil */
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }


        .table-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .footer {
            text-align: right;
            margin-top: 40px;
        }

        .signature {
            text-align: right;

        }

        #posisi {
            margin-right: 20px;
        }

        #name {
            margin-right: 40px;
        }


        /* Membuat teks di samping logo */
        .logo-text {
            text-align: center;
        }

        /* Styling untuk judul h2 dan paragraf */
        .logo-text h2 {
            margin: 0;
        }

        .logo-text p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo-text">
            <h2>Laporan Rekapitulasi Rekrutmen Karyawan</h2>
            <h2>PT. Link Data Sumber Barokah</h2>
            <h2>{{ \Carbon\Carbon::create()->month($bulan)->format('F') }} {{ $tahun }}</h2>
            <p>Bates Timur, Ellak Daya, Kec. Lenteng, Kabupaten Sumenep, Jawa Timur</p>
        </div>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th style="width: 5%;">NO.</th>
                    <th style="width: 25%;">Nama</th>
                    <th style="width: 25%;">Posisi yang dilamar</th>
                    <th style="width: 30%;">Email</th>
                    <th style="width: 20%;">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($karyawan as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->nama_lengkap }}</td>
                        <td>{{ $data->posisi_yang_dilamar }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data karyawan untuk bulan dan tahun yang
                            dipilih.</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-end"><strong>Total Karyawan {{ $karyawan->count() }}</strong></td>
                </tr>
            </tfoot>

        </table>
    </div>


    <!-- Footer dengan tanda tangan -->
    <div class="footer">
        <p>Sumenep,
            {{ \Carbon\Carbon::create()->month(now()->month)->day(now()->day)->year(now()->year)->format('d F Y') }}
        </p>
    </div>
    <div class="signature">
        <p id="posisi">Penanggung Jawab</p>
        <br><br><br><br>
        <p id="name">{{ auth()->user()->name }}</p>
    </div>
</body>

</html>
