-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2024 at 12:52 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` bigint UNSIGNED NOT NULL,
  `divisi_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divisi_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `divisi_nama`, `divisi_keterangan`, `created_at`, `updated_at`) VALUES
(1, 'IT', 'IT', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(2, 'HRD', 'HRD', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(3, 'Finance', 'Finance', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(4, 'Purchasing', 'Purchasing', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(5, 'Admin Umum', 'Admin Umum', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(6, 'Alat Berat', 'Alat Berat', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(7, 'Pengawas Tambang', 'Pengawas Tambang', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(8, 'Operational', 'Operational', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(9, 'Audit', 'Audit', '2024-10-13 04:55:07', '2024-10-13 04:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` bigint UNSIGNED NOT NULL,
  `laporan_rencana_kerja` text COLLATE utf8mb4_unicode_ci,
  `laporan_jumlah_hari` json DEFAULT NULL,
  `laporan_presentasi_pencapaian` int DEFAULT NULL,
  `laporan_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divisi_id` bigint UNSIGNED DEFAULT NULL,
  `login_id` bigint UNSIGNED DEFAULT NULL,
  `periode_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `laporan_rencana_kerja`, `laporan_jumlah_hari`, `laporan_presentasi_pencapaian`, `laporan_keterangan`, `divisi_id`, `login_id`, `periode_id`, `created_at`, `updated_at`) VALUES
(1, 'Penginputan Jadwal Kerja Bulan September 2024', '\"[false,true,true,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-01 05:02:33', '2024-10-13 05:02:33'),
(2, 'Pencocokan Daftar makan Kantin (Antara Housekeeping dengan HRD)', '\"[false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true]\"', 100, 'rutin setiap hari', 2, 4, 10, '2024-10-02 05:03:32', '2024-10-13 05:03:32'),
(3, 'banyak peserta yang tidak aktif', '\"[false,false,true,true,true,true,true,false,false,true,true,true,true,true,false,false,false,true,true,true,true,true,false,true,true,true,true,true,false,false,true,true]\"', 50, 'Pelatihan kursus komputer', 2, 4, 10, '2024-10-03 05:04:57', '2024-10-13 05:04:57'),
(8, 'Laporan Rutin Awal Bulan :', NULL, NULL, NULL, 2, 4, 10, '2024-10-03 05:22:55', '2024-10-13 05:22:55'),
(9, '- Upah Helper Geologist periode 16-31 Agustus 2024', '\"[false,false,true,true,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai sampai pencaiaran upah', 2, 4, 10, '2024-10-04 05:24:00', '2024-10-13 05:24:00'),
(10, '- Laporan Tagihan Makan Kantin Daffa periode 16-31 Agustus 2024', '\"[false,false,true,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai sampai pencairan dana', 2, 4, 10, '2024-10-04 05:24:58', '2024-10-13 05:24:58'),
(11, '- Laporan absensi dan upah muttaqin periode 16-31 Agustus 2024', '\"[false,false,true,true,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai sampai pencaiaran upah', 2, 4, 10, '2024-10-05 05:25:59', '2024-10-13 05:25:59'),
(12, '- Laporan data TKI Harian Bulan Agustus 2024', '\"[false,false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-05 17:00:00', '2024-10-13 05:26:36'),
(13, 'Laporan insentif dan lembur bulan Agustus 2024', '\"[false,false,false,false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-07 12:48:13', '2024-10-13 05:27:33'),
(14, 'Laporan Invoice BPJS Ketenagakerjaan dan Kesehatan September 2024', '\"[false,false,false,false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-07 05:28:53', '2024-10-13 05:28:53'),
(15, 'Laporan Insentif PKL Bulan Agustus 2024', '\"[false,false,false,false,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-07 05:29:34', '2024-10-13 05:29:34'),
(16, 'Pendaftaran BPJS Kesehatan', '\"[false,false,false,false,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', NULL, NULL, 2, 4, 10, '2024-10-07 05:31:03', '2024-10-13 05:31:03'),
(17, 'Tan Ayong', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false]\"', 70, 'anak berusia 21 Tahun harus dipisahkan dari tanggungan orang tua', 2, 4, 10, '2024-10-07 05:31:51', '2024-10-13 05:31:51'),
(18, 'Heriyana', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-07 05:32:06', '2024-10-13 05:32:06'),
(19, 'Rajali', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-08 05:32:20', '2024-10-13 05:32:20'),
(20, 'Pengajuan upah packing dan loading aspal dari kolam ke gudang tgl 9 - 16 september 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,true,false,false,false,false,false]\"', 100, 'selesai sampai pencairan upah', 2, 4, 10, '2024-10-13 05:33:36', '2024-10-13 05:33:36'),
(21, 'Laporan Insentif dan Lembur bulan Agustus 2024', '\"[false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', NULL, NULL, 2, 4, 10, '2024-10-13 05:34:31', '2024-10-13 05:34:31'),
(22, 'Klaim pertanggungan di BPJS Ketenagakerjaan :', NULL, NULL, NULL, 2, 4, 10, '2024-10-13 05:35:07', '2024-10-13 05:35:07'),
(23, '- Parisman (pengajuan pembayaran tidak masuk bekerja)', '\"[false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true]\"', 70, 'belum update informasi dari bpjs setelah surat klaim di ajukan', 2, 4, 10, '2024-10-13 05:36:10', '2024-10-13 05:36:10'),
(24, 'Gali Yulianto (pengajuan Klaim pembayaran tidak masuk bekerja)', '\"[false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true]\"', 60, 'Surat Keterangan tidak masuk bekerja sudah ada', 2, 4, 10, '2024-10-13 05:37:13', '2024-10-13 05:37:13'),
(25, 'Penerimaan kunjungan dari Polda Sultra terkait sertifikat Diklat Security', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-13 05:37:47', '2024-10-13 05:37:47'),
(26, 'Laporan Rutin :', NULL, NULL, NULL, 2, 4, 10, '2024-10-16 05:38:08', '2024-10-13 05:38:08'),
(27, '- Upah Helper Geologist periode 1-15 September 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-16 05:39:03', '2024-10-13 05:39:03'),
(28, 'Laporan Tagihan Makan Kantin Daffa periode 1-15 September 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-16 05:39:42', '2024-10-13 05:39:42'),
(29, '- Laporan absensi dan upah muttaqin periode 1-15 Oktober 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,false,false,false,false,false,false,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-16 05:40:21', '2024-10-13 05:40:21'),
(30, 'cut off gaji bulan Oktober 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,true,true,true,true,true,false]\"', 100, 'selesai', 2, 4, 10, '2024-10-16 05:41:10', '2024-10-13 05:41:10'),
(31, 'Interview Karyawan baru untuk posisi Junior Operator Vacuum Filter', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,true]\"', 100, 'selesai', 2, 4, 10, '2024-10-16 05:41:51', '2024-10-13 05:41:51'),
(32, 'Interview Karyawan baru untuk posisi Junior Operator Vacuum Filter', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,true,true,true,true,true]\"', 100, 'selesai', 2, 4, 10, '2024-10-24 05:42:42', '2024-10-13 05:42:42'),
(33, 'Interview KAryawan baru 4 orang Fitter dan 2 orang Welder', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true]\"', 100, 'selesai', 2, 4, 10, '2024-10-24 05:43:12', '2024-10-13 05:43:12'),
(34, 'Administrasi Karyawan baru untuk posisi 15 orang Junior Operator, 1 Orang Gudang, 1 orang Welder dan 2 orang Fitter', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true]\"', 100, 'selesai', 2, 4, 10, '2024-10-24 05:44:00', '2024-10-13 05:44:00'),
(35, 'Update pengajuan pengurusan Kitas 8 Orang TKA', '\"[false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true]\"', 80, 'Proses pembayaran PNBP', 2, 4, 10, '2024-10-24 05:44:57', '2024-10-13 05:44:57'),
(36, 'Persiapan Dokumen Klaim Biaya Perawatan atas Kecelakaan kerja an. La Ode Asman', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,true,true]\"', 60, 'Pengajuan Klaim ke BPJS', 2, 4, 10, '2024-10-24 05:45:45', '2024-10-13 05:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` bigint UNSIGNED NOT NULL,
  `login_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_no_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_token` text COLLATE utf8mb4_unicode_ci,
  `login_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divisi_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `login_nama`, `login_username`, `login_password`, `login_no_karyawan`, `login_email`, `login_telepon`, `login_token`, `login_level`, `login_status`, `divisi_id`, `created_at`, `updated_at`) VALUES
(1, 'FathurWalkers', 'fathurwalkers', '$2y$12$NQuOgiNEDr2kBWY3IbENHOicDiL1hkdnBX0ADLkKZwE2dksYiKNmq', '448', 'fathurwalkers44@gmail.com', '085342072185', '$2y$12$4Ku7idouXuyC4kUKo2hZleSTsCf5TwsNpwyNR5rSOZcoKsyRK/vjG', 'admin', 'verified', 1, '2024-10-13 04:55:08', '2024-10-13 04:55:08'),
(2, 'Administrator', 'admin', '$2y$12$eMSBSDKNFm3bqzI5y1fDUeJMXB/8ERkt9sR4IzW7buiHNZP1ukiHG', '448', 'admin@ecoasphalt.com', '08339393939', '$2y$12$FNmyQYNKcKwceJe8N3y3y./V8Yy9g7D5m/IXfeIc3PnGGagFilZQu', 'admin', 'verified', 1, '2024-10-13 04:55:09', '2024-10-13 04:55:09'),
(3, 'Wahyu Nur Susilo', 'wahyu', '$2y$12$8BICbGb86syAmY6Yn.9rwummDuvaPx3bCIYsFQAVPO5c5NMY9KZpq', '448', 'wahyuns@ecoasphalt.com', '08339393939', '$2y$12$lGEkKPMDOT4aOr70msv9LeKH2zQjyrHYdI.Mm5XZgd2k6Vm8PWg9O', 'admin', 'verified', 1, '2024-10-13 04:55:10', '2024-10-13 04:55:10'),
(4, 'HRD Test', 'hrdtest', '$2y$12$yt5nwhQ7hWRYTSkRdLEM1OOiY/7OG0dVHnj4JQ8QEqlnjMDvmjhl6', '448', 'hrdtest@ecoasphalt.com', '08339393939', '$2y$12$K4uUSGVB.OnV.eR4SRszyeYAVvG8QrB06L/F6LZ..3oALJQY3pwvu', 'admin', 'verified', 2, '2024-10-13 04:55:11', '2024-10-13 04:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_27_024630_create_divisis_table', 1),
(5, '2024_09_27_024648_create_logins_table', 1),
(6, '2024_10_09_004902_create_periodes_table', 1),
(7, '2024_10_09_004913_create_laporans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id` bigint UNSIGNED NOT NULL,
  `periode_bulan_int` int DEFAULT NULL,
  `periode_tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode_bulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `periode_bulan_int`, `periode_tahun`, `periode_bulan`, `created_at`, `updated_at`) VALUES
(1, 1, '2024', 'Januari', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(2, 2, '2024', 'Februari', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(3, 3, '2024', 'Maret', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(4, 4, '2024', 'April', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(5, 5, '2024', 'Mei', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(6, 6, '2024', 'Juni', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(7, 7, '2024', 'Juli', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(8, 8, '2024', 'Agustus', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(9, 9, '2024', 'September', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(10, 10, '2024', 'Oktober', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(11, 11, '2024', 'November', '2024-10-13 04:55:07', '2024-10-13 04:55:07'),
(12, 12, '2024', 'Desember', '2024-10-13 04:55:07', '2024-10-13 04:55:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_divisi_id_foreign` (`divisi_id`),
  ADD KEY `laporan_login_id_foreign` (`login_id`),
  ADD KEY `laporan_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_login_username_unique` (`login_username`),
  ADD UNIQUE KEY `login_login_email_unique` (`login_email`),
  ADD KEY `login_divisi_id_foreign` (`divisi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_login_id_foreign` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
