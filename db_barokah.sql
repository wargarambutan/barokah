-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Nov 2024 pada 08.48
-- Versi server: 8.0.40
-- Versi PHP: 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barokah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `id_karyawan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` enum('Admin','Developer','Teknisi') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_wa` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_bpjs` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_npwp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pas_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_bpjs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_npwp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sk_karyawan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `registrasi` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluhan`
--

CREATE TABLE `keluhan` (
  `id` bigint NOT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Selesai','Dalam Proses') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int NOT NULL,
  `nama_konfigurasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` enum('Buka','Tutup') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Buka',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `nama_konfigurasi`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 'status_pendaftaran', 'Buka', '2024-11-10 07:41:41', '2024-11-16 08:51:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_11_05_075508_create_karyawan_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('rahmanholilur11@gmail.com', '$2y$12$oQE7jImLZOAXNxz.exbtoO4htD6p4/GhXLg7hu3O1piax7SjgjUJK', '2024-11-17 02:44:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('pria','wanita') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_terakhir` enum('SD','SMP','SMA/SMK','D1','D2','D3','S1','S2','S3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_institusi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lulus` year DEFAULT NULL,
  `posisi_terakhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_perusahaan_terakhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama_bekerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_pekerjaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `posisi_yang_dilamar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keahlian_khusus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_karyawan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unggah_cv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ijazah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sertifikat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` enum('Menunggu Verifikasi','Diterima','Ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat_lengkap`, `nomor_telepon`, `email`, `nomor_ktp`, `foto_ktp`, `pendidikan_terakhir`, `jurusan`, `nama_institusi`, `tahun_lulus`, `posisi_terakhir`, `nama_perusahaan_terakhir`, `lama_bekerja`, `deskripsi_pekerjaan`, `posisi_yang_dilamar`, `keahlian_khusus`, `foto_karyawan`, `unggah_cv`, `ijazah`, `sertifikat`, `created_at`, `status`, `updated_at`) VALUES
(14, 'Holil Prasetyo', 'Sumenep', '2001-09-09', 'pria', 'Dusun Dedder', '087771165435', 'rahmanholilur11@gmail.com', '3529070909010005', 'uploads/foto_ktp/xu0F4QqHcN1iE5bFKnU3YASoBSYNBSYMJeHfhUYW.jpg', 'S1', 'ilmu komputer', 'Uniersitas Annuqayah', '2024', '-', '-', '-', '-', 'Teknisi', 'Komputer dan Jaringan', 'uploads/foto_pendaftaran/YFH2211TUnw0J8zNHND4e1u7O3x3s89KE3liwafW.jpg', 'uploads/cv/2k07oWNUYd4la2dEJy2ymCdtsZvATy0ggnToymq4.pdf', 'uploads/ijazah/fzl6xzAklhwX8T16urom64Pfnxg1sOcscilZq90K.jpg', 'uploads/sertifikat/JKn2pccldAVwgzqsXcW1gRYHtaL1kLAYgcozsYwE.jpg', '2024-11-06 23:09:44', 'Ditolak', '2024-11-08 02:03:28'),
(17, 'Andi Pratama', 'Sumenep', '2002-12-05', 'pria', 'Poreh Lenteng Sumenep', '087771165435', 'holilprasetyo9@gmail.com', '3529065371937643', 'uploads/foto_ktp/uzKcb1UgS2Am7ZmIiDxGma6Zc3RGIUUmjyfOJs51.jpg', 'S1', 'Teknik Sipil', 'Universitas Wiraraja', '2024', 'Resepsionis Hotel', 'Hotel Wijaya Kusuma', '2 Tahun', 'Melayani Lebih dari 2000 pelangan dalam 1 bulan', 'Admin', 'Mampu Mengoperasikan Komputer', 'uploads/foto_pendaftaran/5ry6T8zdQynmAo2mOQwG82BIokKWV1az9YdZa8g3.jpg', 'uploads/cv/o6aMgJ6I3BV9WUBgFMPDnsPvmCJCHNtHBIksg9iS.pdf', 'uploads/ijazah/WBYAexIfB6suxsPG584n306zGQGj8av9o3VhqzkF.jpg', 'uploads/sertifikat/DqdRHkx9dlNVYk8ZUnmeFg6kffhOzudcmmXMWxr1.jpg', '2024-11-09 00:41:27', 'Diterima', '2024-11-09 00:53:53'),
(18, 'Andi Herlambang', 'Tangerang', '2001-09-09', 'pria', 'Dusun Dedder', '087771165435', 'holilurrahman0909@gmail.com', '3529070909010006', 'uploads/foto_ktp/v1VHFM0Mg9Y853lUeepEq3zF7Gd2YYpbJY45G93U.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teknisi', 'Komputer dan Jaringan', 'uploads/foto_karyawan/jbjd8dicVMf2NElPxHCFNJdhX0Sf7Z0H90Geflox.jpg', 'uploads/cv/8ybZ9ZKsYPSzrkCcaRSpK7TfC21O6eJcUasfITPo.pdf', NULL, NULL, '2024-11-16 02:35:50', 'Diterima', '2024-11-16 03:10:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `psb_barokah`
--

CREATE TABLE `psb_barokah` (
  `id` int NOT NULL,
  `Timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Email_Address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Koordinat_ONT` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NUP_Id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PPPoE` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NIK` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tempat_Lahir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tanggal_Lahir` date DEFAULT NULL,
  `Kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Dusun` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RT_RW` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Kel_Desa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Kecamatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Kabupaten_Kota` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Paket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tapak_Depan_Rumah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Foto_KTP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `No_WA` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Tenaga_Ahli` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `psb_barokah`
--

INSERT INTO `psb_barokah` (`id`, `Timestamp`, `Email_Address`, `Koordinat_ONT`, `NUP_Id`, `Nama`, `PPPoE`, `NIK`, `Tempat_Lahir`, `Tanggal_Lahir`, `Kelamin`, `Dusun`, `RT_RW`, `Kel_Desa`, `Kecamatan`, `Kabupaten_Kota`, `Paket`, `Tapak_Depan_Rumah`, `Foto_KTP`, `No_WA`, `Keterangan`, `Tenaga_Ahli`) VALUES
(1, '2024-05-26 17:00:00', 'encunk.78@gmail.com', '-7.033960,113.823440', '150_552_00001', 'RUKIYATI', 'Bugem_Rukiyati', '3529074112870002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12 Mbps - Rp. 165.000', 'public/tapak_depan_rumah/1_9598f9f42e652cf.jpeg', 'public/ktp/1_9598f9f42e652cfg.jpeg', '087742202604', 'PSB', NULL),
(2, '2024-05-27 17:00:00', 'kahirmochlish@gmail.com', '-7.019424,113.790180', '150_552_00002', 'Royhan Maulidi', 'JambuTbk_Royhan_M', '3529070408980002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12 Mbps - Rp. 165.000', 'public/tapak_depan_rumah/2_9598f9f42e652cf.jpeg', 'public/ktp/2_9598f9f42e652cfg.jpeg', '082337857660', 'PSB', NULL),
(3, '2024-05-27 17:00:00', 'kahirmochlish@gmail.com', '-7.028370,113.811406', '150_552_00003', 'Mohammad Ilyas, S.Pd.I', 'SendirKrj_Moh_Ilyas', '3529072811780001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12 Mbps - Rp. 165.000', 'public/tapak_depan_rumah/3_9598f9f42e652cf.jpeg', 'public/ktp/3_9598f9f42e652cfg.jpeg', '085236731669', 'PSB', NULL),
(4, '2024-05-28 17:00:00', 'kalleabid@gmail.com', '-7.020447,113.781580', '150_552_00004', 'KHAIRUDDIN', 'tamezi', '3529071201770002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '50 Mbps', 'public/tapak_depan_rumah/4_9598f9f42e652cf.jpeg', 'public/ktp/4_9598f9f42e652cfg.jpeg', '082301950939', 'Pelanggan lama', 'Ainul Haq'),
(5, '2024-05-28 17:00:00', 'kalleabid@gmail.com', '-7.020345,113.782845', '150_552_00005', 'SAFRAJI', 'Elda_Raji_Jazilah', '3529070908820002', 'Sumenep', '1982-08-09', 'L', 'Dusun Batas Timur', '009/008', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 100.000', 'public/tapak_depan_rumah/5_9598f9f42e652cf.jpeg', 'public/ktp/5_9598f9f42e652cfg.jpeg', '082337942228', 'Pelanggan lama', 'Ainul Haq'),
(6, '2024-05-28 17:00:00', 'kalleabid@gmail.com', '-7.020424,113.782713', '150_552_00006', 'JUFRIYADI', 'Elda_Jufriyadi_KonRaji', '3529071704860003', 'Sumenep', '1980-08-17', 'L', 'Dusun Batas Timur', '009/004', 'Ellak Daya', 'Lenteng', 'Sumenep', '12 Mbps - Rp. 165.000', 'public/tapak_depan_rumah/6_9598f9f42e652cf.jpeg', 'public/ktp/6_9598f9f42e652cfg.jpeg', '082332361121', 'Pelanggan lama', 'Ainul Haq'),
(7, '2024-05-29 17:00:00', 'kalleabid@gmail.com', '-7.016787,113.787639', '150_552_00007', 'MANSYUR', 'HW-Mansur', '3529070304770003', 'Sumenep', '1977-04-03', 'L', 'Dusun Batas Timur', '007/004', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 100.000', 'public/tapak_depan_rumah/7_9598f9f42e652cf.jpeg', 'public/ktp/7_9598f9f42e652cfg.jpeg', '085213055485', 'Pelanggan lama', 'Ainul Haq'),
(8, '2024-05-29 17:00:00', 'encunk.78@gmail.com', '-7.040656,113.791424', '150_552_00008', 'ST QOMARIYAH', 'PorehGtg_ST_Qomariyah', '3529074607920002', 'Sumenep', '1992-07-06', 'P', 'Dusun Gutoguh', '005/002', 'Poreh', 'Lenteng', 'Sumenep', '12 Mbps - Rp. 165.000', 'public/tapak_depan_rumah/8_9598f9f42e652cf.jpeg', 'public/ktp/8_9598f9f42e652cfg.jpeg', '085257241713', 'PSB', 'Encong'),
(9, '2024-05-29 17:00:00', 'andaroen.78@gmail.com', '-7.041523,113.790929', '150_552_00009', 'Pusidin', 'PorehGTG_Pusidiin', '3529070506620004', 'Sumenep', '1962-06-05', 'L', 'Dusun Gutogu', '005/002', 'Poreh', 'Lenteng', 'Sumenep', '12 Mbps - Rp. 165.000', 'public/tapak_depan_rumah/9_9598f9f42e652cf.jpeg', 'public/ktp/9_9598f9f42e652cfg.jpeg', '085942951981', 'Pelanggan lama', 'Encong'),
(10, '2024-05-30 17:00:00', 'kahirmochlish@gmail.com', '-7.040188,113.782791', '150_552_00010', 'Sitti Na\'emah', 'PorehDLM_Sitti_Naemah', '3529076206930005', 'Sumenep', '1993-06-22', 'P', 'Dusun Daleman', '002/003', 'Poreh', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/10_9598f9f42e652cf.jpeg', 'public/ktp/10_9598f9f42e652cfg.jpeg', '087841258937', 'PSB', 'Mukhlis Khir'),
(11, '2024-05-30 17:00:00', 'kalleabid@gmail.com', '-7.021206,113.787238', '150_552_00011', 'SIRRI HAMSIYAH', 'ZTE-Sirri_Hamsiyah', '3529076508790001', 'Sumenep', '1979-08-25', 'P', 'DUSUN BATES TIMUR', '005/006', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 130.000', 'public/tapak_depan_rumah/11_9598f9f42e652cf.jpeg', 'public/ktp/11_9598f9f42e652cfg.jpeg', '085330839983', 'Pelanggan lama', 'Ainul Haq'),
(12, '2024-02-05 17:00:00', 'kahirmochlish@gmail.com', '-7.036574,113.808914', '150_552_00012', 'Wakid, S.Pd.I', 'MeddelanTG_Wakid', '3529071908900006', 'Sumenep', '1990-08-19', 'L', 'Dusun Meddelan Tengah', '004/004', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/12_9598f9f42e652cf.jpeg', 'public/ktp/12_9598f9f42e652cfg.jpeg', '085334325732', 'PSB', 'Mukhlis Khir'),
(13, '2024-03-05 17:00:00', 'kahirmochlish@gmail.com', '-7.036079,113.808594', '150_552_00013', 'Amir Hamzah', 'MeddelanTG_Amir_Hamzah', '3529070908681155', 'Sumenep', '1968-08-09', 'L', 'Dusun Meddelan Tengah', '015/004', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/13_9598f9f42e652cf.jpeg', 'public/ktp/13_9598f9f42e652cfg.jpeg', '081803252644', 'PSB', 'Mukhlis Khir'),
(14, '2024-05-05 17:00:00', 'andaroen.78@gmail.com', '779197', '150_552_00014', 'Jumiati', 'LentengJT_Jumiati', '3529075206650006', 'Sumenep', '1965-06-12', 'P', 'Jepun Timur', '002/002', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/14_9598f9f42e652cf.jpeg', 'public/ktp/14_9598f9f42e652cfg.jpeg', '081916276494', 'PSB', 'Encong'),
(15, '2024-06-05 17:00:00', 'andaroen.78@gmail.com', '780353', '150_552_00015', 'Kholid Zubaidi', 'EldaBB_Kholid_Zubaidi', '3,52907E+12', 'Sumenep', '1991-11-09', 'L', 'Bates Barat', '017/008', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/15_9598f9f42e652cf.jpeg', 'public/ktp/15_9598f9f42e652cfg.jpeg', '085960144747', 'PSB', 'Encong'),
(16, '2024-07-05 17:00:00', 'kahirmochlish@gmail.com', '-7,0074308, 113,7993576', '150_552_00016', 'Abdul Gani', 'Biltom_Abdul_Gani', '3529071202920006', 'Sumenep', '1992-02-12', 'L', 'Billa Tompok', '014/005', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/16_9598f9f42e652cf.jpeg', 'public/ktp/16_9598f9f42e652cfg.jpeg', '087832041233', 'PSB', 'Mukhlis Khir'),
(17, '2024-07-05 17:00:00', 'kahirmochlish@gmail.com', '-7,0353971, 113,7963508', '150_552_00017', 'Moh. Lutfi', 'Tonggal_Moh_Lutfi', '3529072611890001', 'Sumenep', '1989-11-26', 'L', 'Tonggal', '001/001', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/17_9598f9f42e652cf.jpeg', 'public/ktp/17_9598f9f42e652cfg.jpeg', '085935063616', 'PSB', 'Mukhlis Khir'),
(18, '2024-08-05 17:00:00', 'imamqurtubiroby@gmail.com', '-7.033276,113.782338', '150_552_00018', 'NURIL ANWAR', 'Sarperreng_Nuril_Anwar', '3529070210970003', 'Sumenep', '1997-10-13', 'L', 'SARPERENG SELATAN', '004/004', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/18_9598f9f42e652cf.jpeg', 'public/ktp/18_9598f9f42e652cfg.jpeg', '081908079463', 'Pelanggan lama', 'Roby'),
(19, '2024-08-05 17:00:00', 'kahirmochlish@gmail.com', '-7,0342260, 113,7828950', '150_552_00019', 'Endang Susilowati Ningsih ', 'Sarperreng_Endang_S_N', '3529075509760002', 'Pamekasan', '1976-09-15', 'P', 'Sarperreng Selatan ', '004/004', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/19_9598f9f42e652cf.jpeg', 'public/ktp/19_9598f9f42e652cfg.jpeg', '081334841925', 'Pelanggan lama', 'Mukhlis Khir'),
(20, '2024-09-05 17:00:00', 'andaroen.78@gmail.com', '-7.036958,113.787318', '150_552_00020', 'Kholifatur Rosidi', 'Poreh_Holip', '3529070711860001', 'Sumenep', '1986-11-07', 'L', 'Dusun Jepun Timur', '003/002', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Voucher/Bridge', 'public/tapak_depan_rumah/20_9598f9f42e652cf.jpeg', 'public/ktp/20_9598f9f42e652cfg.jpeg', '087882650545', 'Pelanggan lama', 'Encong'),
(21, '2024-10-05 17:00:00', 'imamqurtubiroby@gmail.com', '-7.036476,113.808188', '150_552_00021', 'TAMAM HURI,S.Pdi', 'MeddelanTG_Tamam_Huri', '3529071501770002', 'Sumenep', '1977-01-15', 'L', 'Meddelan Tengah', '003/004', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/21_9598f9f42e652cf.jpeg', 'public/ktp/21_9598f9f42e652cfg.jpeg', '085259515593', 'PSB', 'Roby'),
(22, '2024-10-05 17:00:00', 'madihadra@gmail.com', 'https://maps.app.goo.gl/utUWkbSSZG3n22Vt7?g_st=aw', '150_552_00022', 'ACHMAD ZHEN SUYITNO', 'Meddelan_Ach_Zhen_Suyitno', '3529072912020006', 'Sumenep', '2002-12-29', 'L', 'MEDDELAN BARAT', '011/003', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 235.000', 'public/tapak_depan_rumah/22_9598f9f42e652cf.jpeg', 'public/ktp/22_9598f9f42e652cfg.jpeg', '087777067991', 'Pelanggan lama', 'Ainul Haq'),
(23, '2024-10-05 17:00:00', 'andaroen.78@gmail.com', '-6.993916,113.793705', '150_552_00023', 'Moh Riska', 'Balang_Moh_Riska', '3529151212020006', 'Sumenep', '2002-12-12', 'L', 'Balang', '010/002', 'Pakondang', 'Rubaru', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/23_9598f9f42e652cf.jpeg', 'public/ktp/23_9598f9f42e652cfg.jpeg', '082141182524', 'PSB', 'Encong'),
(24, '2024-11-05 17:00:00', 'kahirmochlish@gmail.com', '-6.992716,113.793353', '150_552_00024', 'Suryadi', 'Balang_Suryadi', '8203052410801001', 'Sumenep', '1980-10-24', 'L', 'Pakondang tengah', '010/002', 'Pakondang', 'Rubaru', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/24_9598f9f42e652cf.jpeg', 'public/ktp/24_9598f9f42e652cfg.jpeg', '087830485035', 'Pelanggan lama', 'Mukhlis Khir'),
(25, '2024-11-05 17:00:00', 'kahirmochlish@gmail.com', '-7,0408642, 113,7935074', '150_552_00025', 'ALWANI', 'Poreh_Alwani', '3529074107680403', 'Sumenep', '1968-07-01', 'P', 'Poreh tengah', '006/002', 'Poreh', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/25_9598f9f42e652cf.jpeg', 'public/ktp/25_9598f9f42e652cfg.jpeg', '081990018944', 'Pelanggan lama', 'Mukhlis Khir'),
(26, '2024-06-14 17:00:00', 'andaroen.78@gmail.com', '-6.992739,113.793142', '150_552_00026', 'Yaumul Marhamah', 'EldaBB_yaumul_Marhamah', '3529076105930003', 'Sumenep', '1993-05-21', 'P', 'Bates barat', '016/008', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/26_9598f9f42e652cf.jpeg', 'public/ktp/26_9598f9f42e652cfg.jpeg', '087777382136', 'PSB', 'Encong'),
(27, '2024-06-15 17:00:00', 'andaroen.78@gmail.com', '-7.080035,113.745135', '150_552_00027', 'Rosiki', 'Moncek_Rosiki', '3529071605990003', 'Sumenep', '2000-12-28', 'L', 'Dusun cangkreng', '004/003', 'Moncek Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/27_9598f9f42e652cf.jpeg', 'public/ktp/27_9598f9f42e652cfg.jpeg', '087860525699', 'PSB', 'Encong'),
(28, '2024-06-17 17:00:00', 'andaroen.78@gmail.com', '-7.038751,113.780916', '150_552_00028', 'Agustina', 'LentengJT_Agustina', '3529076108860002', 'Sumenep', '1986-08-21', 'P', 'Jepun timur', '003/002', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/28_9598f9f42e652cf.jpeg', 'public/ktp/28_9598f9f42e652cfg.jpeg', '085257443471', 'PSB', 'Encong'),
(29, '2024-06-17 17:00:00', 'kahirmochlish@gmail.com', '-7.038945,113.780204', '150_552_00029', 'Rumzil Laily', 'LentengJT_Rumzil_Laily', '3,51325E+14', 'Sumenep', '1994-06-10', 'P', 'Jepun Timur', '003/002', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/29_9598f9f42e652cf.jpeg', 'public/ktp/29_9598f9f42e652cfg.jpeg', '081779567677', 'PSB', 'Mukhlis Khir'),
(30, '2024-06-19 17:00:00', 'madihadra@gmail.com', '-7.040267,113.799482', '150_552_00030', 'Ach abrori', 'CangkrengPCG_Ach_Abrori', '3529070907790001', 'Sumenep', '1979-07-09', 'L', 'Pocang', '003/004', 'Cangkreng', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/30_9598f9f42e652cf.jpeg', 'public/ktp/30_9598f9f42e652cfg.jpeg', '081807055232', 'PSB', 'Encong'),
(31, '2024-06-19 17:00:00', 'imamqurtubiroby@gmail.com', '-6.993619,113.794688', '150_552_00031', 'SYAMSURI', 'Balang_Syamsuri', '3529153006780031', 'Sumenep', '1978-06-30', 'L', 'DUSUN PAKONDANG TENGAH', '010/002', 'Pakondang', 'Rubaru', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/31_9598f9f42e652cf.jpeg', 'public/ktp/31_9598f9f42e652cfg.jpeg', '082229652239', 'PSB', 'Roby'),
(32, '2024-06-19 17:00:00', 'madihadra@gmail.com', '-7.023.344,11', '150_552_00032', 'Parosi', 'EldaBKK_parosi', '3529072005910001', 'Sumenep', '1991-05-20', 'L', 'Bukakak', '002/001', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Voucher/Bridge', 'public/tapak_depan_rumah/32_9598f9f42e652cf.jpeg', 'public/ktp/32_9598f9f42e652cfg.jpeg', '085939346404', 'PSB', 'Encong'),
(33, '2024-06-20 17:00:00', 'imamqurtubiroby@gmail.com', '-6.994636,113.793796', '150_552_00033', 'Syaiful rahman', 'Balang_Syaiful_Rahman ', '3529151505000002', 'Sumenep', '2000-05-15', 'L', 'Dusun pakondang tengah', '009/002', 'Pakondang', 'Rubaru', 'Sumenep', 'Voucher/Bridge', 'public/tapak_depan_rumah/33_9598f9f42e652cf.jpeg', 'public/ktp/33_9598f9f42e652cfg.jpeg', '0823-3497-8159', 'PSB', 'Roby'),
(34, '2024-06-20 17:00:00', 'imamqurtubiroby@gmail.com', '-6.993466,113.794996', '150_552_00034', 'Mulyadi', 'Balang_Mulyadi', '3529151002860002', 'Sumenep', '1986-02-10', 'L', 'Dusun pakondang tengah', '010/002', 'Pakondang', 'Rubaru', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/34_9598f9f42e652cf.jpeg', 'public/ktp/34_9598f9f42e652cfg.jpeg', '087861719824', 'PSB', 'Roby'),
(35, '2024-06-20 17:00:00', 'kahirmochlish@gmail.com', '-6.994598,113.793379', '150_552_00035', 'Farihatul Jannah', 'Balang_Farihatul_Jannah', '3529156808050002', 'Sumenep', '2003-08-28', 'P', 'Pakondang tengah', '010/002', 'Pakondang', 'Rubaru', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/35_9598f9f42e652cf.jpeg', 'public/ktp/35_9598f9f42e652cfg.jpeg', '082132135790', 'PSB', 'Mukhlis Khir'),
(36, '2024-06-21 17:00:00', 'andaroen.78@gmail.com', '-7.026350,113.782506', '150_552_00036', 'Safira Wulan septi', 'Longgere_Safira_Wulan_S', '3529075609970004', 'Sumenep', '1997-09-16', 'P', 'Duko timr', '001/001', 'Ellak Laok', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/36_9598f9f42e652cf.jpeg', 'public/ktp/36_9598f9f42e652cfg.jpeg', '087868754912', 'Pelanggan lama', 'Encong'),
(37, '2024-06-21 17:00:00', 'imamqurtubiroby@gmail.com', '-7.018825,113.804198', '150_552_00037', 'FAHRUR ROZI', 'Bandungan_Fahrur_Rozi', '3529073012930008', 'Sumenep', '1992-12-04', 'L', 'Dusun Bandungan', '003/002', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/37_9598f9f42e652cf.jpeg', 'public/ktp/37_9598f9f42e652cfg.jpeg', '0817624151', 'PSB', 'Roby'),
(38, '2024-06-21 17:00:00', 'kahirmochlish@gmail.com', '-7.018447,113.806337', '150_552_00038', 'Sofi Alfiyana', 'Bandungan_Sofi_Alfiyana', '3529075211910003', 'Sumenep', '1991-11-12', 'P', 'Bandungan', '004/002', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/38_9598f9f42e652cf.jpeg', 'public/ktp/38_9598f9f42e652cfg.jpeg', '087850095344', 'PSB', 'Mukhlis Khir'),
(39, '2024-06-21 17:00:00', 'andaroen.78@gmail.com', '-7.033186,113.823327', '150_552_00039', 'Sofiah', 'Bugem_Sofiah', '3529075206000003', 'Sumenep', '1999-12-12', 'P', 'Bugem', '008/003', 'Sendir', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/39_9598f9f42e652cf.jpeg', 'public/ktp/39_9598f9f42e652cfg.jpeg', '087759133306', 'PSB', 'Encong'),
(40, '2024-06-21 17:00:00', 'imamqurtubiroby@gmail.com', '-7.018034,113.805279', '150_552_00040', 'Hamdani Priyatno', 'Bandungan_Hamdani_Priyatno', '3529072012770002', 'Sumenep', '1977-12-20', 'L', 'Dusun Bandungan', '004/002', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/40_9598f9f42e652cf.jpeg', 'public/ktp/40_9598f9f42e652cfg.jpeg', '081939773319', 'PSB', 'Roby'),
(41, '2024-06-21 17:00:00', 'imamqurtubiroby@gmail.com', '-7.018677,113.803873', '150_552_00041', 'Moh Anwar', 'Bandungan_Moh_Anwar', '3529260905990001', 'Sumenep', '1999-05-09', 'L', 'Dusun Bandungan', '003/002', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/41_9598f9f42e652cf.jpeg', 'public/ktp/41_9598f9f42e652cfg.jpeg', '081335209198', 'PSB', 'Roby'),
(42, '2024-06-21 17:00:00', 'andaroen.78@gmail.com', '-7.032874,113.823415', '150_552_00042', 'Fitriatuz zakiyah', 'Bugem_Fitriyatuz_Zakiyah', '3529074612020004', 'Sumenep', '2002-12-06', 'P', 'Bugem', '008/003', 'Sendir', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/42_9598f9f42e652cf.jpeg', 'public/ktp/42_9598f9f42e652cfg.jpeg', '085707080886', 'PSB', 'Encong'),
(43, '2024-06-22 17:00:00', 'andaroen.78@gmail.com', '-7.023377,113.811283', '150_552_00043', 'Moh alfarizi', 'GelugurKRJ_Moh_Alfarizi', '3529260104990004', 'Sumenep', '1999-04-01', 'L', 'Karojah', '003/001', 'Gelugur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/43_9598f9f42e652cf.jpeg', 'public/ktp/43_9598f9f42e652cfg.jpeg', '087866817874', 'PSB', 'Encong'),
(44, '2024-06-22 17:00:00', 'andaroen.78@gmail.com', '-7.024129,113.811414', '150_552_00044', 'Kholifatur aini', 'GlugurKRJ_Kholifatur_Aini', '3529264805930001', 'Sumenep', '1993-05-08', 'P', 'Karojah', '002/001', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/44_9598f9f42e652cf.jpeg', 'public/ktp/44_9598f9f42e652cfg.jpeg', '081808964606', 'PSB', 'Encong'),
(45, '2024-06-22 17:00:00', 'andaroen.78@gmail.com', '-7.013283,113.771778', '150_552_00045', 'Moh fayat', 'EldaBB_Moh_Hayat', '3529070808940007', 'Sumenep', '1994-08-08', 'L', 'Bates barat', '015/007', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/45_9598f9f42e652cf.jpeg', 'public/ktp/45_9598f9f42e652cfg.jpeg', '082228252477', 'PSB', 'Encong'),
(46, '2024-06-22 17:00:00', 'kahirmochlish@gmail.com', '-7.022857,113.787634', '150_552_00046', 'Jamilatul Muflihah', 'EldaBT_Jamilatul_Muflihah', '3529075112920006', 'Sumenep', '1992-12-11', 'P', 'Bates Timur', '005/003', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/46_9598f9f42e652cf.jpeg', 'public/ktp/46_9598f9f42e652cfg.jpeg', '081330495256', 'PSB', 'Mukhlis Khir'),
(47, '2024-06-22 17:00:00', 'kahirmochlish@gmail.com', '-7,0078980, 113,7989445', '150_552_00047', 'Karto', 'Biltom_Karto', '3529071606710004', 'Sumenep', '1971-06-16', 'L', 'Billa Tompok', '014/005', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/47_9598f9f42e652cf.jpeg', 'public/ktp/47_9598f9f42e652cfg.jpeg', '087832041233', 'PSB', 'Mukhlis Khir'),
(48, '2024-06-24 17:00:00', 'imamqurtubiroby@gmail.com', '-7.036840,113.801563', '150_552_00048', 'Anwar', 'CangkrengPCG_Anwari ', '3529071002830003', 'Sumenep', '1983-02-10', 'L', 'Dusun Pocang', '008/003', 'Cangkreng', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/48_9598f9f42e652cf.jpeg', 'public/ktp/48_9598f9f42e652cfg.jpeg', '087886330414', 'PSB', 'Roby'),
(49, '2024-06-24 17:00:00', 'imamqurtubiroby@gmail.com', '-7.037095,113.801658', '150_552_00049', 'Fathor Rahman, S.H.I', 'CangkrengPCG_Fathor_Rahman', '3528121101870004', 'Pamekasan', '1985-12-05', 'L', 'Dusun Pocang', '008/003', 'Cangkreng', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/49_9598f9f42e652cf.jpeg', 'public/ktp/49_9598f9f42e652cfg.jpeg', '082301652953', 'PSB', 'Roby'),
(50, '2024-06-25 17:00:00', 'kahirmochlish@gmail.com', '-7,022987.113,809047', '150_552_00050', 'Dita Octaviana', 'Pocang_Dita_Octaviana', '3529264710010001', 'Sumenep', '2001-10-07', 'P', 'Karojah', '003/001', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/50_9598f9f42e652cf.jpeg', 'public/ktp/50_9598f9f42e652cfg.jpeg', '087860027329', 'PSB', 'Mukhlis Khir'),
(51, '2024-06-25 17:00:00', 'kahirmochlish@gmail.com', '-7.002987,113.809047', '150_552_00051', 'Dwi Prasetiawati', 'Karojah_Dwi_Prasetiawati', '3529024812970003', 'Sumenep', '1997-12-08', 'P', 'Karojah', '003/001', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/51_9598f9f42e652cf.jpeg', 'public/ktp/51_9598f9f42e652cfg.jpeg', '087860027329', 'PSB', 'Mukhlis Khir'),
(52, '2024-06-27 17:00:00', 'imamqurtubiroby@gmail.com', '-7.012242,113.764238', '150_552_00052', 'Wafiqur rahman', 'EldaKT_Wafiqur_Rahman', '3529070501861158', 'Sumenep', '1986-01-05', 'L', 'Kombung timur', '013/006', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Voucher/Bridge', 'public/tapak_depan_rumah/52_9598f9f42e652cf.jpeg', 'public/ktp/52_9598f9f42e652cfg.jpeg', '081807332402', 'PSB', 'Roby'),
(53, '2024-06-27 17:00:00', 'imamqurtubiroby@gmail.com', '-7.013140,113.764468', '150_552_00053', 'ABD Warits', 'EldaKT_Abd_Warits', '3529072608940001', 'Sumenep', '1994-08-26', 'L', 'Kombung Timur', '013/004', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rumahan dan voucher', 'public/tapak_depan_rumah/53_9598f9f42e652cf.jpeg', 'public/ktp/53_9598f9f42e652cfg.jpeg', '081916028000', 'PSB', 'Roby'),
(54, '2024-06-27 17:00:00', 'imamqurtubiroby@gmail.com', '-7.004620,113.804346', '150_552_00054', 'Khalili Nawi', 'GelugurKRK_Khalili_Nawi ', '3529070602891155', 'Sumenep', '1989-02-06', 'L', 'Kombung barat', '022/010', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/54_9598f9f42e652cf.jpeg', 'public/ktp/54_9598f9f42e652cfg.jpeg', '087850875982', 'PSB', 'Roby'),
(55, '2024-06-27 17:00:00', 'kalleabid@gmail.com', '-7.013646,113.809895', '150_552_00055', 'MASTINI', 'GelugurTGH_Mastini', '352926461080001', 'Sumenep', '1983-10-06', 'P', 'Gelugur Tengah', '003/002', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/55_9598f9f42e652cf.jpeg', 'public/ktp/55_9598f9f42e652cfg.jpeg', '083851775953', 'PSB', 'Mukhlis Khir'),
(56, '2024-06-28 17:00:00', 'andaroen.78@gmail.com', '-7.014113,113.808275', '150_552_00056', 'Agus Riadi', 'GelugurTGH_Agus_Riadi', '3529042106900004', 'Sumenep', '1990-06-21', 'L', 'Bandungan', '005/002', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/56_9598f9f42e652cf.jpeg', 'public/ktp/56_9598f9f42e652cfg.jpeg', '087788312014', 'PSB', 'Mukhlis Khir'),
(57, '2024-06-28 17:00:00', 'andaroen.78@gmail.com', '-7.013747,113.766367', '150_552_00057', 'Hasan Basri', 'EldaKT_Hasan_Basri', '3529070508871155', 'Sumenep', '1987-08-05', 'L', 'Kombung Timur', '013/006', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/57_9598f9f42e652cf.jpeg', 'public/ktp/57_9598f9f42e652cfg.jpeg', '085931101868', 'PSB', 'Mukhlis Khir'),
(58, '2024-06-29 17:00:00', 'andaroen.78@gmail.com', '-7.016380,113.777688', '150_552_00058', 'Ach suyono', 'EldaBB_Ach_Suyono', '3529070507851157', 'Sumenep', '1985-07-05', 'L', 'Bates barat', '017/008', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/58_9598f9f42e652cf.jpeg', 'public/ktp/58_9598f9f42e652cfg.jpeg', '082330905739', 'PSB', 'Encong'),
(59, '2024-06-29 17:00:00', 'madihadra@gmail.com', '-7.019493,113.778726', '150_552_00059', 'Taufiqurahman', 'EldaBB_Taufiqurrahman', '3529071407980001', 'Sumenep', '1998-07-14', 'L', 'Bates barat', '016/008', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/59_9598f9f42e652cf.jpeg', 'public/ktp/59_9598f9f42e652cfg.jpeg', '081717279418', 'PSB', 'Ahmadi'),
(60, '2024-06-29 17:00:00', 'andaroen.78@gmail.com', '-7.032888,113.779853', '150_552_00060', 'Siti maryam', 'EdaBT_Siti_Maryam', '3529074907870002', 'Sumenep', '1987-07-09', 'P', 'Bates timur', '007/004', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/60_9598f9f42e652cf.jpeg', 'public/ktp/60_9598f9f42e652cfg.jpeg', '087786560433', 'PSB', 'Encong'),
(61, '2024-01-06 17:00:00', 'andaroen.78@gmail.com', '-7.038971,113.782768', '150_552_00061', 'Mortada', 'LentengJT_Mortada', ': 3529072408700003', 'Sumenep', '1970-08-24', 'L', 'Jepun timur', '003/002', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/61_9598f9f42e652cf.jpeg', 'public/ktp/61_9598f9f42e652cfg.jpeg', '+62 823-3099-8509', 'PSB', 'Encong'),
(62, '2024-01-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.036258,113.807669', '150_552_00062', 'Farihatul Munawarah', 'MeddelanTG_Farihatul_M', '35290763001000005', 'Sumenep', '2000-01-23', 'P', 'Meddelan tengah', '014/004', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/62_9598f9f42e652cf.jpeg', 'public/ktp/62_9598f9f42e652cfg.jpeg', '082332624409', 'PSB', 'Roby'),
(63, '2024-01-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.036258,113.807669', '150_552_00063', 'ABD Mukit', 'MeddelanTG_Abd_Mukit', '3529071211960004', 'Sumenep', '1996-11-12', 'L', 'Meddelan Tengah', '014/004', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/63_9598f9f42e652cf.jpeg', 'public/ktp/63_9598f9f42e652cfg.jpeg', '08532748751', 'PSB', 'Roby'),
(64, '2024-01-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.037235,113.807680', '150_552_00064', 'Sugianto ', 'MeddelanTG_Sugianto', '3529071502760010', 'Sumenep', '1976-02-15', 'L', 'Meddelan Tengah', '013/004', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/64_9598f9f42e652cf.jpeg', 'public/ktp/64_9598f9f42e652cfg.jpeg', '087705735132', 'PSB', 'Roby'),
(65, '2024-01-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.037931,113.812703', '150_552_00065', 'Sri Qomariyah', 'MeddelanTM_Sri_Qomariyah', '3529075510930005', 'Sumenep', '1993-10-15', 'P', 'Meddelan Timur', '017/005', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/65_9598f9f42e652cf.jpeg', 'public/ktp/65_9598f9f42e652cfg.jpeg', '085232084631', 'PSB', 'Roby'),
(66, '2024-01-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.038708,113.813561', '150_552_00066', 'Sunaryo', 'MeddelanTM_Sunaryo', '3529071412720003', 'Sumenep', '1972-12-14', 'L', 'Meddelan Timur', '010/011', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/66_9598f9f42e652cf.jpeg', 'public/ktp/66_9598f9f42e652cfg.jpeg', '083115611205', 'PSB', 'Roby'),
(67, '2024-01-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.024500, 113.809583', '150_552_00067', 'Fathorrahman', 'GelugurKRJ_Fathorrahman', '3529262805560001', 'Sumenep', '1956-05-28', 'L', 'Dusun karojah', '002/001', 'Gelugur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/67_9598f9f42e652cf.jpeg', 'public/ktp/67_9598f9f42e652cfg.jpeg', '+62 877-4652-5146', 'PSB', 'Roby'),
(68, '2024-02-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.036280,113.813863', '150_552_00068', 'Tohari', 'MeddelanTM_Tohari', '3529070901900003', 'Sumenep', '1990-01-09', 'L', 'Meddelan Timur', '020/005', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/68_9598f9f42e652cf.jpeg', 'public/ktp/68_9598f9f42e652cfg.jpeg', '087713118902', 'PSB', 'Roby'),
(69, '2024-02-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.022300,113.811495', '150_552_00069', 'Nurjannah', 'GelugurKRJ_Nurjannah', '3529264509760003', 'Sumenep', '1976-09-05', 'P', 'Dusun Karojah', '003/001', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/69_9598f9f42e652cf.jpeg', 'public/ktp/69_9598f9f42e652cfg.jpeg', '085967054455', 'PSB', 'Roby'),
(70, '2024-03-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.028150,113.785397', '150_552_00070', 'Alamiyatun sa\'diyah', 'SarperengUT_Alamiyatun_S', '3529074107700244', 'Sumenep', '1970-07-01', 'P', 'Sarperreng Utara', '001/007', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/70_9598f9f42e652cf.jpeg', 'public/ktp/70_9598f9f42e652cfg.jpeg', '087762768922', 'PSB', 'Roby'),
(71, '2024-03-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.024474,113.803029', '150_552_00071', 'Rosidah', 'DaramestaLS_Rosidah ', '3529105707830002', 'Sumenep', '1983-07-17', 'P', 'Torbang timur', '002/002', 'Torbang', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/71_9598f9f42e652cf.jpeg', 'public/ktp/71_9598f9f42e652cfg.jpeg', '081703030402', 'PSB', 'Roby'),
(72, '2024-05-06 17:00:00', 'andaroen.78@gmail.com', '-7.034376,113.777975', '150_552_00072', 'Mustamin spdi', 'LentengJT_Mustamin', '3529151412900001', 'Sumenep', '1990-12-14', 'L', 'Jepun timur', '002/001', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/72_9598f9f42e652cf.jpeg', 'public/ktp/72_9598f9f42e652cfg.jpeg', '082338502509', 'PSB', 'Encong'),
(73, '2024-05-06 17:00:00', 'andaroen.78@gmail.com', '-7.012698,113.777723', '150_552_00073', 'Khalifah', 'EldaBT_khalifah', '3529074507880002', 'Sumenep', '1988-07-05', 'P', 'Dusun Bates timur', '008/004', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/73_9598f9f42e652cf.jpeg', 'public/ktp/73_9598f9f42e652cfg.jpeg', '082337878199', 'PSB', 'Encong'),
(74, '2024-06-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.025173,113.790652', '150_552_00074', 'Zainol Fatah', 'JambuTBK_Zainol_Fatah', '3529071112890002', 'Sumenep', '1989-12-11', 'L', 'Dusun Tambak', '001/001', 'Jambu', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/74_9598f9f42e652cf.jpeg', 'public/ktp/74_9598f9f42e652cfg.jpeg', '087846801466', 'PSB', 'Roby'),
(75, '2024-06-06 17:00:00', 'andaroen.78@gmail.com', '-7.038250,113.790260', '150_552_00075', 'Nurfaizah', 'LentengJT_Nur_Faizah', '3524074106850008', 'Sumenep', '1985-06-01', 'P', 'Jepun timur', '004/002', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/75_9598f9f42e652cf.jpeg', 'public/ktp/75_9598f9f42e652cfg.jpeg', '082324511658', 'PSB', 'Encong'),
(76, '2024-06-06 17:00:00', 'andaroen.78@gmail.com', '-7.004558,113.807778', '150_552_00076', 'Sofiatun najahah', 'GeugurKRK_Sofiatun_Najahah', '35292667008000002', 'Sumenep', '2000-08-27', 'P', 'Karongkong', '003/003', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/76_9598f9f42e652cf.jpeg', 'public/ktp/76_9598f9f42e652cfg.jpeg', '081931230335', 'PSB', 'Encong'),
(77, '2024-06-06 17:00:00', 'andaroen.78@gmail.com', '-7.003926,113.808458', '150_552_00077', 'Hosnan', 'GelugurKRK_Hosnan', '3529152304000001', 'Sumenep', '2000-04-23', 'L', 'Karongkong', '003/003', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/77_9598f9f42e652cf.jpeg', 'public/ktp/77_9598f9f42e652cfg.jpeg', '081334263523', 'PSB', 'Encong'),
(78, '2024-06-06 17:00:00', 'andaroen.78@gmail.com', '-7.000976,113.793040', '150_552_00078', 'Imam muhlis', 'GelugurKRK_Imam_Muhlis', '3529262109850001', 'Sumenep', '1985-09-21', 'L', 'Karongkong', '002/003', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/78_9598f9f42e652cf.jpeg', 'public/ktp/78_9598f9f42e652cfg.jpeg', '085784831899', 'PSB', 'Encong'),
(79, '2024-06-06 17:00:00', 'andaroen.78@gmail.com', '-7.003928,113.808533', '150_552_00079', 'Hasbiatul hasanah', 'GelugurKRK_Hasbiatul_Hasanah', '3529094906940003', 'Sumenep', '1994-06-09', 'P', 'Karongkong', '001/003', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/79_9598f9f42e652cf.jpeg', 'public/ktp/79_9598f9f42e652cfg.jpeg', '087888308261', 'PSB', 'Encong'),
(80, '2024-07-06 17:00:00', 'andaroen.78@gmail.com', '-7.034023,113.782555', '150_552_00080', 'Anisuciati', 'SarperenkSL_Anisuciyati', '3529076708870004', 'Sumenep', '1987-08-27', 'P', 'Sarperreng selatan', '004/004', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/80_9598f9f42e652cf.jpeg', 'public/ktp/80_9598f9f42e652cfg.jpeg', '85947667906', 'PSB', 'Encong'),
(81, '2024-08-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.027383,113.764638', '150_552_00081', 'Benny Arifandi', 'SamondungUT_Benny_Arifandi ', '3529071407030005', 'Sumenep', '2003-07-14', 'L', 'Samondung utara', '001/009', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/81_9598f9f42e652cf.jpeg', 'public/ktp/81_9598f9f42e652cfg.jpeg', '087750082002', 'PSB', 'Roby'),
(82, '2024-08-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.037216,113.799619', '150_552_00082', 'Kadir', 'CangkrengPCG_Kadir ', '3529070506770006', 'Sumenep', '1977-06-05', 'L', 'Dusun pocang', '010/004', 'Cangkreng', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/82_9598f9f42e652cf.jpeg', 'public/ktp/82_9598f9f42e652cfg.jpeg', '082234131661', 'PSB', 'Roby'),
(83, '2024-08-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.036875,113.799576', '150_552_00083', 'Ida Royani', 'CangkrengPCG_Ida_Royani', '3529075605820003', 'Sumenep', '1982-05-16', 'P', 'Dusun pocang', '010/004', 'Cangkreng', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/83_9598f9f42e652cf.jpeg', 'public/ktp/83_9598f9f42e652cfg.jpeg', '087769466410', 'PSB', 'Roby'),
(84, '2024-08-06 17:00:00', 'andaroen.78@gmail.com', '-7.017078,113.775905', '150_552_00084', 'Ainoer Rifka annisak', 'EldaBB_Ainoer_Rifka_Annisak', '3529075403000002', 'Sumenep', '2000-03-14', 'P', 'Bates barat', '016/008', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/84_9598f9f42e652cf.jpeg', 'public/ktp/84_9598f9f42e652cfg.jpeg', '087703132431', 'PSB', 'Encong'),
(85, '2024-09-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.013586,113.779558', '150_552_00085', 'Alfinatus sabila', 'EldaBB_Alfinatus_Sabila', '3529076709020005', 'Sumenep', '2002-09-27', 'P', 'Bates Barat', '017/008', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/85_9598f9f42e652cf.jpeg', 'public/ktp/85_9598f9f42e652cfg.jpeg', '087817587730', 'PSB', 'Roby'),
(86, '2024-09-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.015583, 113.785639', '150_552_00086', 'Ach wardan', 'EldaTRB_Ach_Wardan', '3529070102930003', 'Sumenep', '1993-02-01', 'L', 'Ellak daya Bates timur', '011/003', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/86_9598f9f42e652cf.jpeg', 'public/ktp/86_9598f9f42e652cfg.jpeg', '+62 853-3461-8847', 'PSB', 'Roby'),
(87, '2024-09-06 17:00:00', 'andaroen.78@gmail.com', '-7.038628,113.780561', '150_552_00087', 'Jufriadi', 'LentengJP_Jufriadi', '3529071207720006', 'Sumenep', '1972-07-12', 'L', 'Jepun timur', '003/002', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/87_9598f9f42e652cf.jpeg', 'public/ktp/87_9598f9f42e652cfg.jpeg', '081939413040', 'PSB', 'Encong'),
(88, '2024-10-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.023571,113.810258', '150_552_00088', 'Mas\'odah', 'GelugurKRJ_Masodah', '3529266211900001', 'Sumenep', '1990-11-22', 'P', 'Dusun Karojah', '003/001', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/88_9598f9f42e652cf.jpeg', 'public/ktp/88_9598f9f42e652cfg.jpeg', '087750935022', 'PSB', 'Roby'),
(89, '2024-10-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.022167, 113.808556', '150_552_00089', 'Nur Azizah', 'GelugurTG_Nur_Azizah', '3529136005980002', 'Sumenep', '1998-05-20', 'P', 'Gelugur Tengah', '001/002', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/89_9598f9f42e652cf.jpeg', 'public/ktp/89_9598f9f42e652cfg.jpeg', '087842224604', 'PSB', 'Roby'),
(90, '2024-10-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.000626,113.808781', '150_552_00090', 'Mohammad riski', 'MatanairKRK_Moh_Riski', '3529130607870004', 'Sumenep', '1981-06-05', 'L', 'Karongkong', '008/001', 'Gelugur', 'Rubaru', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/90_9598f9f42e652cf.jpeg', 'public/ktp/90_9598f9f42e652cfg.jpeg', '087829147751', 'PSB', 'Roby'),
(91, '2024-11-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.038637,113.780105', '150_552_00091', 'AH shadiq', 'LentengJT_Ah_Shadiq', '3529071604850002', 'Sumenep', '1985-04-16', 'L', 'Jepun timur', '003/002', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/91_9598f9f42e652cf.jpeg', 'public/ktp/91_9598f9f42e652cfg.jpeg', '087769085224', 'PSB', 'Roby'),
(92, '2024-11-06 17:00:00', 'imamqurtubiroby@gmail.com', '-7.036667, 113.800944', '150_552_00092', 'Khoirul', 'CangkrengPCG_Hoirul', '6201022202100006', 'Kotawaringin Barat', '2000-02-22', 'L', 'Dusun pocang', '007/003', 'Cangkreng', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/92_9598f9f42e652cf.jpeg', 'public/ktp/92_9598f9f42e652cfg.jpeg', '085751887224', 'PSB', 'Roby'),
(93, '2024-11-06 17:00:00', 'andaroen.78@gmail.com', '-7.036450,113.807043', '150_552_00093', 'Mahmud nuruddin', 'MeddelanTG_Mahmud_Nuruddin ', '3671040306680002', 'Sumenep', '1968-06-03', 'L', 'Meddelen tengah', '014/004', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/93_9598f9f42e652cf.jpeg', 'public/ktp/93_9598f9f42e652cfg.jpeg', '085929903532', 'PSB', 'Encong'),
(94, '2024-11-06 17:00:00', 'andaroen.78@gmail.com', '-7.036853,113.807735', '150_552_00094', 'Tola\'ani', 'MeddelanTG_Tolaani', '3529074703750007', 'Sumenep', '1975-03-07', 'P', 'Meddelan tengah', '014/004', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/94_9598f9f42e652cf.jpeg', 'public/ktp/94_9598f9f42e652cfg.jpeg', '081990018705', 'PSB', 'Encong'),
(95, '2024-12-06 17:00:00', 'andaroen.78@gmail.com', '-7.001153,113.797  682', '150_552_00095', 'Sahaluddin', 'Biltom_Sahaluddin', '3529151207970002', 'Sumenep', '1997-07-12', 'L', 'Bilatompok', '015/005', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/95_9598f9f42e652cf.jpeg', 'public/ktp/95_9598f9f42e652cfg.jpeg', '087758913184', 'PSB', 'Encong'),
(96, '2024-12-06 17:00:00', 'andaroen.78@gmail.com', '-7.036167, 113.807556', '150_552_00096', 'Sulistiananingsih,S.Pd', 'MeddelanTG_Sulistiananingsih', '3529076604850003', 'Sumenep', '1985-04-26', 'P', 'Meddelan Tengah', '014/004', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/96_9598f9f42e652cf.jpeg', 'public/ktp/96_9598f9f42e652cfg.jpeg', '08175177747', 'PSB', 'Encong'),
(97, '2024-07-12 17:00:00', 'imamqurtubiroby@gmail.com', '-7.017991,113.767836', '150_552_00097', 'Siti Nuraini', 'EldaKT_Siti_Nuraini', '3529165004910002', 'Sumenep', '1991-04-10', 'P', 'Kombung timur', '011/005', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/97_9598f9f42e652cf.jpeg', 'public/ktp/97_9598f9f42e652cfg.jpeg', '081918059919', 'PSB', 'Roby'),
(98, '2024-07-12 17:00:00', 'imamqurtubiroby@gmail.com', '-7.017981,113.767345', '150_552_00098', 'Aimmatul marhamah', 'ElokDK_Aimmatul_Marhamah', '3529075606040003', 'Sumenep', '2004-06-16', 'P', 'Duko Barat', '006/002', 'Ellak Laok', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/98_9598f9f42e652cf.jpeg', 'public/ktp/98_9598f9f42e652cfg.jpeg', '083830198989', 'PSB', 'Roby'),
(99, '2024-07-12 17:00:00', 'imamqurtubiroby@gmail.com', '-7.028662,113.781068', '150_552_00099', 'Imam drajad S,Pd', 'SarperengUT_Imam_Drajad', '3529260101900004', 'Sumenep', '1990-01-01', 'L', 'Sarperreng utara', '006-002', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/99_9598f9f42e652cf.jpeg', 'public/ktp/99_9598f9f42e652cfg.jpeg', '081931000008', 'PSB', 'Roby'),
(100, '2024-07-13 17:00:00', 'madihadra@gmail.com', '-7.022107,113.782783', '150_552_00100', 'Mastuki', 'EldaBKK_Mastuki', '3529071403990005', 'Sumenep', '1999-03-14', 'L', 'Bates timur', '009/004', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/100_9598f9f42e652cf.jpeg', 'public/ktp/100_9598f9f42e652cfg.jpeg', '085231342011', 'PSB', 'Ahmadi'),
(101, '2024-07-13 17:00:00', 'imamqurtubiroby@gmail.com', '-7.023361,113.783792', '150_552_00101', 'Nur Azizah', 'EldaBKK_Nur_Azizah ', '3529074307850005', 'Sumenep', '1985-07-03', 'P', 'Bukakak', '002/001', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/101_9598f9f42e652cf.jpeg', 'public/ktp/101_9598f9f42e652cfg.jpeg', '+62 831-4284-3817', 'PSB', 'Roby'),
(102, '2024-07-13 17:00:00', 'imamqurtubiroby@gmail.com', '-7.022258,113.786522', '150_552_00102', 'Adi Anwar', 'EldaBT_Adi_Anwar', '3529070503800005', 'Sumenep', '1980-03-05', 'L', 'Bates timur', '005/003', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/102_9598f9f42e652cf.jpeg', 'public/ktp/102_9598f9f42e652cfg.jpeg', '085232810767', 'PSB', 'Roby'),
(103, '2024-07-14 17:00:00', 'imamqurtubiroby@gmail.com', '-7.012535,113.773786', '150_552_00103', 'Juhairiyatussa\'adah', 'EldaBB_Juhairiyatus_Saadah', '3529076410980002', 'Sumenep', '1998-10-24', 'P', 'Bates Barat', '015/007', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/103_9598f9f42e652cf.jpeg', 'public/ktp/103_9598f9f42e652cfg.jpeg', '087872616324', 'PSB', 'Roby'),
(104, '2024-07-14 17:00:00', 'imamqurtubiroby@gmail.com', '-7.032407,113.767210', '150_552_00104', 'Fathor', 'LentengJB_Fathor', '3529180909970006', 'Sumenep', '1997-09-09', 'L', 'Jepun barat', '001/011', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/104_9598f9f42e652cf.jpeg', 'public/ktp/104_9598f9f42e652cfg.jpeg', '087761764622', 'PSB', 'Roby'),
(105, '2024-07-15 17:00:00', 'andaroen.78@gmail.com', '-7.018899,113.776 ', '150_552_00105', 'Ariena mufrihah', 'EldaBKK_Ariena_Mufrihah', '3529075709040001', 'Sumenep', '2004-09-17', 'P', 'Bukakak', '004/002', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/105_9598f9f42e652cf.jpeg', 'public/ktp/105_9598f9f42e652cfg.jpeg', '085812745701', 'PSB', 'Encong'),
(106, '2024-07-15 17:00:00', 'imamqurtubiroby@gmail.com', '-7.021208,113.763152', '150_552_00106', 'Ridha maulana', 'SamondungUT_Ridha_Maulana', '3529071512050007', 'Sumenep', '2005-12-15', 'L', 'Samondung', '003/010', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/106_9598f9f42e652cf.jpeg', 'public/ktp/106_9598f9f42e652cfg.jpeg', '083170241930', 'PSB', 'Roby'),
(107, '2024-07-18 17:00:00', 'imamqurtubiroby@gmail.com', '-7.033599,113.779036', '150_552_00107', 'Imam safi\'i', 'Lenteng_Koramil', '5104036612810002', 'Banyuwangi', '1981-12-16', 'L', 'Lenteng Timur', '002/002', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 300.000', 'public/tapak_depan_rumah/107_9598f9f42e652cf.jpeg', 'public/ktp/107_9598f9f42e652cfg.jpeg', '085236710588', 'PSB', 'Roby'),
(108, '2024-07-18 17:00:00', 'andaroen.78@gmail.com', '-7.018039,113.80  5278', '150_552_00108', 'MOH AMIR  ', 'Bandungan_Moh_Amir', '3529071202730003', 'Sumenep', '1973-02-12', 'L', 'Bendungan', '004/003', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/108_9598f9f42e652cf.jpeg', 'public/ktp/108_9598f9f42e652cfg.jpeg', '087885223771', 'PSB', 'Encong'),
(109, '2024-07-18 17:00:00', 'imamqurtubiroby@gmail.com', '-7.036187,113.800558', '150_552_00109', 'Agus Hariyanto', 'CangkrengPCG_Agus_Hariyanto ', '3529072511770001', 'Sumenep', '1977-11-25', 'L', 'Pocang', '009/003', 'Cangkreng', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/109_9598f9f42e652cf.jpeg', 'public/ktp/109_9598f9f42e652cfg.jpeg', '+62 852-5744-3756', 'PSB', 'Roby'),
(110, '2024-07-18 17:00:00', 'imamqurtubiroby@gmail.com', '-7.03605, 113.80053', '150_552_00110', 'Arifatus Sa\'diyah', 'CangkrengPCG_Arifatus_Sadiyah', '3529075510920001', 'Sumenep', '1992-10-15', 'P', 'Pocang', '009/003', 'Cangkreng', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/110_9598f9f42e652cf.jpeg', 'public/ktp/110_9598f9f42e652cfg.jpeg', '081779548826', 'PSB', 'Roby'),
(111, '2024-07-19 17:00:00', 'imamqurtubiroby@gmail.com', '-7.015958,113.771244', '150_552_00111', 'Sanima', 'EldaKT_Sanima', '3529074511780003', 'Sumenep', '2019-11-05', 'P', 'Kombung timur', '011/005', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/111_9598f9f42e652cf.jpeg', 'public/ktp/111_9598f9f42e652cfg.jpeg', '085961555298', 'PSB', 'Roby'),
(112, '2024-07-20 17:00:00', 'andaroen.78@gmail.com', '-7.040627,113.80  X  5915', '150_552_00112', 'Guntur Muda Putra Ali Akbar', 'MetdellanBRT_Guntur_Muda_AA', '3529070508010003', 'Sumenep', '2001-08-05', 'L', 'Meddelan barat', '011/003', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/112_9598f9f42e652cf.jpeg', 'public/ktp/112_9598f9f42e652cfg.jpeg', '087863275459', 'PSB', 'Encong'),
(113, '2024-07-20 17:00:00', 'andaroen.78@gmail.com', '-7.014092,113.80  X  8443', '150_552_00113', 'Moh Amir', 'GelugurKRK_Moh_Amir', '3529260404840001', 'Sumenep', '1984-04-04', 'L', 'Karongkong', '001/003', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/113_9598f9f42e652cf.jpeg', 'public/ktp/113_9598f9f42e652cfg.jpeg', '087787385396', 'PSB', 'Encong'),
(114, '2024-07-20 17:00:00', 'andaroen.78@gmail.com', '-7.013631,113.809  X  199', '150_552_00114', 'Nawati', 'GelugurTGH_Nawati', '3529266709800001', 'Sumenep', '1980-09-27', 'P', 'Gelugur tengah', '003/002', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/114_9598f9f42e652cf.jpeg', 'public/ktp/114_9598f9f42e652cfg.jpeg', '085961555318', 'PSB', 'Encong'),
(115, '2024-07-21 17:00:00', 'imamqurtubiroby@gmail.com', '-7.037692,113.804482', '150_552_00115', 'Septia Devi Kirana', 'MeddelanBRT_Septia_Devi_K', '3529016909960002', 'Sumenep', '1996-09-29', 'P', 'Jl pahlawan ll 2', '002/001', 'Meddelan', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/115_9598f9f42e652cf.jpeg', 'public/ktp/115_9598f9f42e652cfg.jpeg', '085236921301', 'PSB', 'Roby'),
(116, '2024-07-21 17:00:00', 'imamqurtubiroby@gmail.com', '-7.037692,113.804482', '150_552_00116', 'Achmadi', 'MeddelanBR_Achmadi', '3529070907820002', 'Sumenep', '1982-07-09', 'L', 'Meddelan Barat', '010/002', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/116_9598f9f42e652cf.jpeg', 'public/ktp/116_9598f9f42e652cfg.jpeg', '087742381014', 'PSB', 'Roby'),
(117, '2024-07-21 17:00:00', 'imamqurtubiroby@gmail.com', '-7.035902,113.810941', '150_552_00117', 'Safi\'uddin', 'MeddelanTM_Safiuddin', '3529070804760001', 'Sumenep', '1997-04-08', 'L', 'Meddelan Timur', '017/005', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/117_9598f9f42e652cf.jpeg', 'public/ktp/117_9598f9f42e652cfg.jpeg', '085954256288', 'PSB', 'Roby'),
(118, '2024-07-21 17:00:00', 'imamqurtubiroby@gmail.com', '-7.028851,113.811376', '150_552_00118', 'Uswatun Hasanah', 'BugemKRJ_Uswatun_Hasanah', '3529074101850009', 'Sumenep', '1985-01-01', 'P', 'Pugem', '010/003', 'Sendir', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/118_9598f9f42e652cf.jpeg', 'public/ktp/118_9598f9f42e652cfg.jpeg', '+62 853-3437-9968', 'PSB', 'Roby'),
(119, '2024-07-21 17:00:00', 'imamqurtubiroby@gmail.com', '-7.024192,113.777098', '150_552_00119', 'Nuril Fahrisi', 'ElokDT_Nuril_Fahrisi', '3529072812940001', 'Sumenep', '1994-12-28', 'L', 'Duko Timur', '002/001', 'Ellak Laok', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/119_9598f9f42e652cf.jpeg', 'public/ktp/119_9598f9f42e652cfg.jpeg', '081996262866', 'PSB', 'Roby'),
(120, '2024-07-22 17:00:00', 'imamqurtubiroby@gmail.com', '-7.019390,113.787329', '150_552_00120', 'Dimas Nur Yuliansyah', 'EldaBT_Dimas_Nur_Yuliansyah', '3529071295040006', 'Sumenep', '2004-05-12', 'L', 'Bates timur', '006/003', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/120_9598f9f42e652cf.jpeg', 'public/ktp/120_9598f9f42e652cfg.jpeg', '+62 812-1737-6380', 'PSB', 'Roby'),
(121, '2024-07-22 17:00:00', 'imamqurtubiroby@gmail.com', '-7.01936, 113.79025', '150_552_00121', 'Siti Aisyah', 'JambuTBK_Siti-Aisyah', '3529075103920005', 'Sumenep', '1992-03-11', 'P', 'Dusun Tambak', '003/001', 'Jambu', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/121_9598f9f42e652cf.jpeg', 'public/ktp/121_9598f9f42e652cfg.jpeg', '085947667117', 'PSB', 'Roby'),
(122, '2024-07-23 17:00:00', 'imamqurtubiroby@gmail.com', '-7.019139,113.776876', '150_552_00122', 'Mahbub rusyadi', 'EldaBKK_Mahbub_Rusyadi', '3529071707040001', 'Sumenep', '2004-07-17', 'L', 'Bukakak', '004/002', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/122_9598f9f42e652cf.jpeg', 'public/ktp/122_9598f9f42e652cfg.jpeg', '082337457456', 'PSB', 'Roby'),
(123, '2024-07-23 17:00:00', 'imamqurtubiroby@gmail.com', '-7.019139,113.776876', '150_552_00123', 'Saniyatun', 'EldaBKK_Saniyatun', '3529075604870003', 'Sumenep', '1987-04-16', 'P', 'Bukakak', '004/002', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/123_9598f9f42e652cf.jpeg', 'public/ktp/123_9598f9f42e652cfg.jpeg', '085934825450', 'PSB', 'Roby'),
(124, '2024-07-24 17:00:00', 'andaroen.78@gmail.com', '-7.018023,113.767  260', '150_552_00124', 'Fawaizur rahman', 'EldaKB_Faizur_Rahman', '3529072203990004', 'Sumenep', '1999-03-22', 'L', 'Kombung barat', '024/010', 'Ellak Daya', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/124_9598f9f42e652cf.jpeg', 'public/ktp/124_9598f9f42e652cfg.jpeg', '087884537208', 'PSB', 'Encong'),
(125, '2024-07-25 17:00:00', 'imamqurtubiroby@gmail.com', '-7.039122,113.785366', '150_552_00125', 'Moh Faruk', 'LentengJT_Moh_Faruk', '3529072705870002', 'Sumenep', '1987-05-27', 'L', 'Jepun timur', '004/002', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/125_9598f9f42e652cf.jpeg', 'public/ktp/125_9598f9f42e652cfg.jpeg', '082143334480', 'PSB', 'Roby'),
(126, '2024-07-25 17:00:00', 'andaroen.78@gmail.com', '-7.033736,113.782001', '150_552_00126', 'Titin Suhartini', 'LentengSL_Titin_Suhartini', '3529076004980006', 'Sumenep', '1998-04-20', 'P', 'Sarpereng selatan', '004/004', 'Lenteng Timur', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/126_9598f9f42e652cf.jpeg', 'public/ktp/126_9598f9f42e652cfg.jpeg', '+62 818-0708-7689', 'PSB', 'Encong'),
(127, '2024-07-26 17:00:00', 'imamqurtubiroby@gmail.com', '-7.012851,113.780333', '150_552_00127', 'Moh Radlu', 'Biltom_Moh_Radlu', '3529072603740003', 'Sumenep', '1974-03-26', 'L', 'Bilatompok', '017/006', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/127_9598f9f42e652cf.jpeg', 'public/ktp/127_9598f9f42e652cfg.jpeg', '+62 822-2826-3482', 'PSB', 'Roby'),
(128, '2024-07-27 17:00:00', 'imamqurtubiroby@gmail.com', '-6.997053,113.793596', '150_552_00128', 'Hosnan', 'Biltom_Hosnan', '3529070903880006', 'Sumenep', '1988-04-09', 'L', 'Bilatompok', '017/006', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/128_9598f9f42e652cf.jpeg', 'public/ktp/128_9598f9f42e652cfg.jpeg', '+62 812-3327-8121', 'PSB', 'Roby');
INSERT INTO `psb_barokah` (`id`, `Timestamp`, `Email_Address`, `Koordinat_ONT`, `NUP_Id`, `Nama`, `PPPoE`, `NIK`, `Tempat_Lahir`, `Tanggal_Lahir`, `Kelamin`, `Dusun`, `RT_RW`, `Kel_Desa`, `Kecamatan`, `Kabupaten_Kota`, `Paket`, `Tapak_Depan_Rumah`, `Foto_KTP`, `No_WA`, `Keterangan`, `Tenaga_Ahli`) VALUES
(129, '2024-07-27 17:00:00', 'andaroen.78@gmail.com', '-7.038810,113.787  X  428', '150_552_00129', 'Dony Arifansyah', 'Poreh_GTG_Dony_Arifansyah', '3529011907830008', 'Sumenep', '1983-07-19', 'L', 'Gutoguh', '004/004', 'Poreh', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/129_9598f9f42e652cf.jpeg', 'public/ktp/129_9598f9f42e652cfg.jpeg', '087727251488', 'PSB', 'Encong'),
(130, '2024-01-07 17:00:00', 'imamqurtubiroby@gmail.com', '-7.003943,113.801856', '150_552_00130', 'Rahman', 'Biltom_Rahman', '3529073012800014', 'Sumenep', '1980-12-30', 'L', 'Bilatompok', '015/005', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/130_9598f9f42e652cf.jpeg', 'public/ktp/130_9598f9f42e652cfg.jpeg', '087779392738', 'PSB', 'Roby'),
(131, '2024-02-07 17:00:00', 'imamqurtubiroby@gmail.com', '-7.024713,113.796849', '150_552_00131', 'Adisti Olivia Wibawa', 'DaramestaLS_Adisti_Olivia_W', '3529074606040001', 'Sumenep', '2004-06-06', 'P', 'Laok Songai', '006/004', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 300.000', 'public/tapak_depan_rumah/131_9598f9f42e652cf.jpeg', 'public/ktp/131_9598f9f42e652cfg.jpeg', '081939615438', 'PSB', 'Roby'),
(132, '2024-03-07 17:00:00', 'imamqurtubiroby@gmail.com', '-6.995463,113.792786', '150_552_00132', 'M.Naufal Jayyidi Mukti', 'Balang_M_Naufal_Jayyidi_M ', '3529150306030001', 'Sumenep', '2003-06-03', 'L', 'Pakondang tengah', '009/002', 'Pakondang', 'Rubaru', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/132_9598f9f42e652cf.jpeg', 'public/ktp/132_9598f9f42e652cfg.jpeg', '+62 821-3938-1124', 'PSB', 'Roby'),
(133, '2024-03-07 17:00:00', 'imamqurtubiroby@gmail.com', '-7.021155,113.790353', '150_552_00133', 'Triyana Fajariah', 'JambuTBK_Triyana_Fajariah ', '3529074411770003', 'Sumenep', '1977-11-04', 'P', 'Tambak', '003/001', 'Jambu', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/133_9598f9f42e652cf.jpeg', 'public/ktp/133_9598f9f42e652cfg.jpeg', '085331464480', 'PSB', 'Roby'),
(134, '2024-06-07 17:00:00', 'imamqurtubiroby@gmail.com', '-7.003778,113.804991', '150_552_00134', 'A.Ubaidillah', 'Gelugur_A_Ubaidillah', '3529261911040001', 'Sumenep', '2004-11-19', 'L', 'Gelugur', '002/003', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/134_9598f9f42e652cf.jpeg', 'public/ktp/134_9598f9f42e652cfg.jpeg', '082335627175', 'PSB', 'Roby'),
(135, '2024-07-07 17:00:00', 'andaroen.78@gmail.com', '-7.040776,113.79  X  3905', '150_552_00135', 'SUBAIDAH', 'PorehTGH_Subaidah', '3529074202770002', 'Sumenep', '1977-02-02', 'P', 'Pore tengah', '006/002', 'Poreh', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/135_9598f9f42e652cf.jpeg', 'public/ktp/135_9598f9f42e652cfg.jpeg', '+62 878-4898-7103', 'PSB', 'Encong'),
(136, '2024-10-07 17:00:00', 'imamqurtubiroby@gmail.com', '-7.004270,113.802815', '150_552_00136', 'Suryani', 'Biltom_Suryani', '3529075010870004', 'Sumenep', '1987-10-10', 'P', 'Bilatompok', '015/006', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/136_9598f9f42e652cf.jpeg', 'public/ktp/136_9598f9f42e652cfg.jpeg', '+62818-0733-9396', 'PSB', 'Roby'),
(137, '2024-11-07 17:00:00', 'imamqurtubiroby@gmail.com', '-7.037623,113.776848', '150_552_00137', 'Halimatus Sa\'diyah', 'Bandungan_Halimatussadiyah', '3529074107800216', 'Sumenep', '1980-07-01', 'P', 'Bandungan', '005/002', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/137_9598f9f42e652cf.jpeg', 'public/ktp/137_9598f9f42e652cfg.jpeg', '087852957820', 'PSB', 'Roby'),
(138, '2024-12-07 17:00:00', 'imamqurtubiroby@gmail.com', '-7.000918,113.796238', '150_552_00138', 'Suyitno', 'Biltom_Suyitno', '352907201190001', 'Sumenep', '1993-11-20', 'L', 'Bilatompok', '017/06', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/138_9598f9f42e652cf.jpeg', 'public/ktp/138_9598f9f42e652cfg.jpeg', '087870364375', 'PSB', 'Roby'),
(139, '2024-08-13 17:00:00', 'imamqurtubiroby@gmail.com', '-7.030826,113.819026', '150_552_00139', 'Budisantoso', 'Bugem_Budi_Santoso ', '3512131209960002', 'Situbondo', '1996-09-12', 'L', 'Bugem', '003/007', 'Gelugur', 'Batuan', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/139_9598f9f42e652cf.jpeg', 'public/ktp/139_9598f9f42e652cfg.jpeg', '+62 823-3661-0782', 'PSB', 'Roby'),
(140, '2024-08-14 17:00:00', 'alanazureee98@gmail.com', 'Ruslan', '150_552_00140', 'ASRINI', 'Ruslan', '3529264906830001', 'Sumenep', '1983-06-09', 'P', 'Bilatompok', '015/005', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/140_9598f9f42e652cf.jpeg', 'public/ktp/140_9598f9f42e652cfg.jpeg', '081346355789', 'PSB', 'Ainul Haq'),
(141, '2024-08-14 17:00:00', 'alanazureee98@gmail.com', '-7,0039457, 113,7968001', '150_552_00141', 'Hajar', 'Biltom_Hajar', '3529071208940002', 'Sumenep', '1994-08-12', 'L', 'Bilatompok', '016/006', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/141_9598f9f42e652cf.jpeg', 'public/ktp/141_9598f9f42e652cfg.jpeg', '081999230948', 'PSB', 'Ruslan'),
(142, '2024-08-15 17:00:00', 'imamqurtubiroby@gmail.com', '-7.019266,113.759628', '150_552_00142', 'Mukhlis', 'Bindung_Mukhlis', '3529071103860003', 'Sumenep', '1986-03-11', 'L', 'Bindung ll', '002/012', 'Lenteng Barat', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/142_9598f9f42e652cf.jpeg', 'public/ktp/142_9598f9f42e652cfg.jpeg', '08385858942', 'PSB', 'Roby'),
(143, '2024-08-16 17:00:00', 'imamqurtubiroby@gmail.com', '-7.020448,113.757288', '150_552_00143', 'Aminatul Fitriyah', 'Bindung_Aminatul_Fitriyah', '3529075011010003', 'Sumenep', '2001-11-10', 'P', 'Bindung ll', '002/002', 'Lenteng Barat', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/143_9598f9f42e652cf.jpeg', 'public/ktp/143_9598f9f42e652cfg.jpeg', '+62 831-1761-1013', 'PSB', 'Roby'),
(144, '2024-08-19 17:00:00', 'imamqurtubiroby@gmail.com', '-7.000085,113.807318', '150_552_00144', 'Mursit', 'MatanairKRK_Mursit', '3529150107940090', 'Sumenep', '1994-07-01', 'L', 'Karongkong', '008/001', 'Gelugur', 'Rubaru', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/144_9598f9f42e652cf.jpeg', 'public/ktp/144_9598f9f42e652cfg.jpeg', '+62 877-3909-8226', 'PSB', 'Roby'),
(145, '2024-08-23 17:00:00', 'imamqurtubiroby@gmail.com', '-7.036282,113.805773', '150_552_00145', 'Sumadi', 'MeddelanBRT-Sumadi', '3529070510811155', 'Sumenep', '1981-10-05', 'L', 'Meddelan barat', '012/003', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/145_9598f9f42e652cf.jpeg', 'public/ktp/145_9598f9f42e652cfg.jpeg', '085939288689', 'PSB', 'Roby'),
(146, '2024-08-24 17:00:00', 'imamqurtubiroby@gmail.com', '-7.042720,113.816688', '150_552_00146', 'Farida', 'SendirTM-Farida', '3529075804830005', 'Sumenep', '1984-09-06', 'P', 'Sendir timur', '005/002', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/146_9598f9f42e652cf.jpeg', 'public/ktp/146_9598f9f42e652cfg.jpeg', '082301502694', 'PSB', 'Roby'),
(147, '2024-08-25 17:00:00', 'imamqurtubiroby@gmail.com', '-6.997099,113.790700', '150_552_00147', 'Nur Faiqoh', 'Balang_Nur_Faiqoh', '3529156511990006', 'Sumenep', '1999-11-25', 'P', 'Pakondang tengah', '009/002', 'Pakondang', 'Rubaru', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/147_9598f9f42e652cf.jpeg', 'public/ktp/147_9598f9f42e652cfg.jpeg', '+62 819-0666-5297', 'PSB', 'Roby'),
(148, '2024-02-08 17:00:00', 'madihadra@gmail.com', '-7.004513,113.797574', '150_552_00148', 'Sadik', 'Biltom_Sadik', '3529070808790001', 'Sumenep', '1979-08-08', 'L', 'Bilatompok', '016/006', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/148_9598f9f42e652cf.jpeg', 'public/ktp/148_9598f9f42e652cfg.jpeg', '+62 819-0807-9451', 'PSB', 'Ahmadi'),
(149, '2024-06-08 17:00:00', 'imamqurtubiroby@gmail.com', '-7.014940,113.787258', '150_552_00149', 'Moh Imam Ahmad', 'PorehDLM_Moh_Imam_Ahmad', '3529071204890006', 'Sumenep', '1999-04-12', 'L', 'Poreh daleman', '009/003', 'Poreh', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/149_9598f9f42e652cf.jpeg', 'public/ktp/149_9598f9f42e652cfg.jpeg', '+62 823-3802-5390', 'PSB', 'Roby'),
(150, '2024-11-08 17:00:00', 'alanazureee98@gmail.com', '-7.003607,113.797270', '150_552_00150', 'Samiyatun', 'Biltom_Samiyatun', '3529074802880001', 'Sumenep', '1988-02-08', 'P', 'Bilatompok', '016-006', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/150_9598f9f42e652cf.jpeg', 'public/ktp/150_9598f9f42e652cfg.jpeg', '081807888766', 'PSB', 'Ruslan'),
(155, '2024-11-09 17:00:00', 'imamqurtubiroby@gmail.com', '-7.003792,113.793993', '150_552_00155', 'Rudi Hardianto', 'Biltom_Rudi_Hardiyanto', '3529060107900078', 'Sumenep', '1990-10-05', 'L', 'Billatompok', '017/006', 'Daramista', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/155_9598f9f42e652cf.jpeg', 'public/ktp/155_9598f9f42e652cfg.jpeg', '081908613441', 'PSB', 'Roby'),
(156, '2024-04-10 17:00:00', 'encunk.78@gmail.com', '  -7.038849,113.804659', '150_552_00156', 'Mahfudah', 'MeddelanBRT_Mahfudah', '3529074606950004', 'Sumenep', '1995-06-06', 'P', 'Metdelan barat', 'Rt11/rw003', 'Meddelan', 'Lenteng', 'Sumenep', 'Rp. 165.000', 'public/tapak_depan_rumah/156_9598f9f42e652cf.jpeg', 'public/ktp/156_9598f9f42e652cfg.jpeg', '087842258715', 'PSB', 'Encong'),
(163, '2024-11-20 06:44:41', 'yeyen@gmail.com', '-7.0221247, 113.7930203', '150_552_00157', 'Andi', 'Bugem_Rukiyati', '3529070909010005', 'Sumenep', '2001-09-09', 'L', 'Dedder', '004/002', 'Cangkreng', 'Lenteng', 'Sumenep', 'Rp. 100.000', 'public/tapak_depan_rumah/kZ0czfRy1hVLGreI8w3kT4UqBamldbHSWeW95vCH.jpg', 'public/ktp/XF4W78ZLf4pxq680AVEUlCges1aJdevFeczIWQ5a.jpg', '087771165435', 'Data Belum Diisi', 'Ainul Haq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('super_admin','admin','teknisi') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Holilurrahman', 'rahmanholilur11@gmail.com', '$2y$10$ZfPowfHkd1tx0bf/e/1LOuapeAkX/MQtgcTTGEG5i6zEYEYEyYZae', 'admin', '2IFmuIZ9pRy5F03dEZoA93NqMgyrYzuKKZHPnqxshXXC3eLRnApcZIeEZRAM', NULL, '2024-11-08 09:18:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `psb_barokah`
--
ALTER TABLE `psb_barokah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `psb_barokah`
--
ALTER TABLE `psb_barokah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
