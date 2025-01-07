-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 02 Nov 2024 pada 00.35
-- Versi server: 10.11.8-MariaDB-cll-lve
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u343106166_report`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisi_nama` varchar(255) DEFAULT NULL,
  `divisi_keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `divisi_nama`, `divisi_keterangan`, `created_at`, `updated_at`) VALUES
(1, 'IT', 'IT', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(2, 'HRD', 'HRD', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(3, 'Finance', 'Finance', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(4, 'Purchasing', 'Purchasing', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(5, 'Administrative', 'Administrative', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(6, 'Alat Berat', 'Alat Berat', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(7, 'Tambang', 'Tambang', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(8, 'Operational', 'Operational', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(9, 'Audit', 'Audit', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(10, 'Produksi', 'Produksi', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(11, 'Audit', 'Audit', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(12, 'WTP', 'WTP', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(13, 'Boiler', 'Boiler', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(14, 'Electric', 'Electric', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(15, 'Mechanic', 'Mechanic', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(16, 'Pabrikasi', 'Pabrikasi', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(17, 'HSE', 'HSE', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(18, 'Housekeeping', 'Housekeeping', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(19, 'Maintenance Office', 'Maintenance Office', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(20, 'Security', 'Security', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(21, 'Warehouse', 'Warehouse', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(22, 'Sipil', 'Sipil', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(23, 'Logistik', 'Logistik', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(24, 'Translator', 'Translator', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(25, 'Labolatory', 'Labolatory', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(26, 'Head Office - Jakarta', 'Head Office - Jakarta', '2024-10-25 00:24:04', '2024-10-25 00:24:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_nama` varchar(255) DEFAULT NULL,
  `file_extensi` varchar(255) DEFAULT NULL,
  `file_kode` varchar(255) DEFAULT NULL,
  `file_jenis` varchar(255) DEFAULT NULL,
  `file_status` varchar(255) DEFAULT NULL,
  `folder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `login_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `folder`
--

CREATE TABLE `folder` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `folder_nama` varchar(255) DEFAULT NULL,
  `folder_keterangan` varchar(255) DEFAULT NULL,
  `folder_kode` varchar(255) DEFAULT NULL,
  `folder_status` varchar(255) DEFAULT NULL,
  `divisi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `laporan_rencana_kerja` text DEFAULT NULL,
  `laporan_jumlah_hari` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`laporan_jumlah_hari`)),
  `laporan_presentasi_pencapaian` int(11) DEFAULT NULL,
  `laporan_keterangan` varchar(255) DEFAULT NULL,
  `laporan_status` varchar(255) DEFAULT NULL,
  `divisi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `login_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `laporan_rencana_kerja`, `laporan_jumlah_hari`, `laporan_presentasi_pencapaian`, `laporan_keterangan`, `laporan_status`, `divisi_id`, `login_id`, `periode_id`, `created_at`, `updated_at`) VALUES
(39, 'Pencocokan daftar makan di kantin (antara Housekeeping dan HRD)', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 80, 'Kegiatan Rutin Setiap Hari', 'PENDING', 2, 37, 11, '2024-11-01 11:33:54', '2024-10-28 11:33:54'),
(40, 'Pengaturan jadwal supir untuk rutinitas penjemputan dan pengantaran', '\"[false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true]\"', 80, 'Rutinitas tiap hari', 'PENDING', 2, 37, 11, '2024-11-01 08:22:07', '2024-10-28 08:22:07'),
(42, 'Laporan Absensi TKA bulan Oktober 2024', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 80, 'Rutinitas Awal Bulan', 'PENDING', 2, 37, 11, '2024-11-01 08:00:55', '2024-10-28 08:00:55'),
(44, 'Pembuatan Database APD', NULL, 80, 'Rutinitas Tiap Hari', 'PENDING', 2, 37, 11, '2024-11-01 08:08:14', '2024-10-28 08:08:14'),
(45, 'Pembuatan Database Deposit Pengambilan APD', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 80, 'Rutinitas tiap hari', 'PENDING', 2, 37, 11, '2024-11-01 08:08:53', '2024-10-28 08:08:53'),
(46, 'Upah Helper Geologist Periode 16 - 31  Oktober 2024', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 80, 'Laporan Rutin Awal Bulan', 'PENDING', 2, 37, 11, '2024-11-01 08:39:16', '2024-10-28 08:39:16'),
(47, 'Laporan Tagihan Makan Kantin Daffa  Periode 16-31 Oktober', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 80, 'Rutin Awal Bulan', 'PENDING', 2, 37, 11, '2024-11-01 08:40:45', '2024-10-28 08:40:45'),
(48, 'Laporan Absensi dan Upah Choirin Periode 16-31 Oktober 2024', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 80, 'Rutin Awal Bulan', 'PENDING', 2, 37, 11, '2024-11-01 08:51:30', '2024-10-28 08:51:30'),
(49, 'Laporan Data TKI Harian Bulan November 2024', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 60, 'Rutin Awal Bulan', 'PENDING', 2, 37, 11, '2024-11-01 08:42:37', '2024-10-28 08:42:37'),
(50, 'Laporan Insentif dan Lembur bulan November 2024', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 60, 'Rutin Awal Bulan', 'PENDING', 2, 37, 11, '2024-11-01 08:43:16', '2024-10-28 08:43:16'),
(51, 'Pendaftaran BPJS Kes dan BPJS Ketenagakerjaan Karyawam', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 50, 'Rutin Awal Bulan', 'PENDING', 2, 37, 11, '2024-11-01 08:44:29', '2024-10-28 08:44:29'),
(52, 'Setting HT HYT PD-568 Untuk Produksi', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-28 09:04:20', '2024-10-31 01:43:27'),
(53, 'Reboot Camera CCTV Parkiran 2 Unit Cam#1 dan Cam#2', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-28 09:05:09', '2024-10-31 01:43:42'),
(54, 'Packing Modem LNS 2 (80) untuk dikirim ke Jakarta (Kantor Pusat)', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-28 09:05:48', '2024-10-31 01:44:17'),
(55, 'Fixing Bug pada Komponen Navbar dan Finishing Upload Database pada Aplikasi Management Report', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-28 09:06:33', '2024-10-31 01:44:32'),
(56, 'Perbaikan Bug pada Navigasi Daftar Divisi pada Komponen Navbar untuk Aplikasi Management Report', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-26 09:07:20', '2024-10-31 01:44:44'),
(57, 'Finishing Database untuk Data Produk dan Upload hasil Bug Fixing pada Website Indoasphalt.com', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-27 09:08:26', '2024-10-31 01:44:59'),
(58, 'Mengubah Struktur Database untuk pembuatan Tabel Produk pada Website Indoasphalt.com', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-25 09:08:58', '2024-10-31 01:45:15'),
(59, 'Finishing dan Proses Pembuatan Komponen Modal \"Ubah Data\" pada Halaman Index Laporan untuk menambahkan fungsi mengubah Laporan yang telah diupload di Aplikasi Management Report', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-23 09:11:29', '2024-10-31 01:45:40'),
(60, 'Membantu Setting dan Konfigurasi HT Baofeng Tipe UV-82 Milik Pribadi dari Pak Wiji (Produksi)', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-21 09:14:09', '2024-10-31 01:45:58'),
(61, 'Ganti Mouse Komputer Timbangan yang telah Rusak, diganti dengan Mouse Baru', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-21 09:14:53', '2024-10-31 01:47:30'),
(62, 'Menyelesaikan Tampilan \"Homepage\" dari Website Indoasphalt.com', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-21 09:15:55', '2024-10-31 01:47:55'),
(63, 'Lanjut memindahkan Access Point Wifi dari Panel dibawah Tower Jaringan Baru ke dalam Ruang Kerja Pak Sudarman di Control Room Lt.1', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-22 05:05:49', '2024-10-31 05:05:49'),
(64, 'Perbaikan Halaman Login yang error ketika User salah mengetik Password pada Aplikasi Management Report', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-22 09:25:39', '2024-10-31 01:48:45'),
(65, '- Laporan Invoice BPJS Ketenagakerjaan dan BPJS Kesehatan Periode November 2024', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 80, 'Rutin Awal Bulan', 'PENDING', 2, 37, 11, '2024-11-04 00:40:16', '2024-10-30 00:40:16'),
(66, '- Laporan Insentif PKL Bulan November 2024', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 80, 'Rutin Awal Bulan', 'PENDING', 2, 37, 11, '2024-11-04 00:41:12', '2024-10-30 00:41:12'),
(67, '- Upah Helper Geologist Periode 1-15 November 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 80, 'Laporan Rutin', 'PENDING', 2, 37, 11, '2024-11-16 00:42:38', '2024-10-30 00:42:38'),
(68, '- Laporan Tagihan Makan Kantin Daffa Periode 1-15 November 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 80, 'Laporan Rutin', 'PENDING', 2, 37, 11, '2024-11-16 00:43:28', '2024-10-30 00:43:28'),
(69, '- Laporan Absensi dan Upah Choirin Periode 1-15 November 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 50, 'Laporan Rutin', 'PENDING', 2, 37, 11, '2024-11-16 00:44:33', '2024-10-30 00:44:33'),
(70, 'Cut Off Gaji Bulan Oktober 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 80, 'Laporan Rutin', 'PENDING', 2, 37, 11, '2024-11-18 00:45:40', '2024-10-30 00:45:40'),
(71, 'Cut Off Gaji Harian Bulan Oktober 2024', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 80, 'Laporan Rutin', 'PENDING', 2, 37, 11, '2024-11-18 00:46:32', '2024-10-30 00:46:32'),
(72, 'Pengecekan Proses Klaim BPJS Ketenagakerjaan', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 80, 'Laporan Rutin Awal Bulan', 'PENDING', 2, 37, 11, '2024-11-04 00:47:32', '2024-10-30 00:47:32'),
(73, 'Pembuatan Database Karyawan Sakit, Ijin, Alpa dan Cuti', '\"[false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 80, 'Laporan Rutin', 'PENDING', 2, 37, 11, '2024-11-11 00:48:34', '2024-10-30 00:48:34'),
(74, 'Sosialisasi  Pemotongan Deposit Seragam Indoasphalt', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 50, 'Laporan Rutin', 'PENDING', 2, 37, 11, '2024-11-15 00:49:34', '2024-10-30 00:49:34'),
(75, 'Pengajuan Riksa Uji : Crusher, Hydrant, Instalasi Pemadam Kebakaran, 1 Unit Excavator, I Unit Fotklift, Crane, 2 Unit Loader, Bachoe Loader, Instalasi Listrik Office dan Instalasi Listrik di Pabrik.', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 75, 'Laporan Rutin', 'PENDING', 2, 37, 11, '2024-11-18 00:51:18', '2024-10-30 00:51:18'),
(76, 'Reset Counter Pemakaian Bulanan Kuota User, Mangle, Interfaces dan Queues-Tree pada Jaringan MikroTik Ecoasphalt', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-01 04:50:15', '2024-10-31 04:50:15'),
(80, 'Konfigurasi CCTV untuk area Timbangan telah dilakukan, dengan alokasi IP address: 164', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-01 05:45:05', '2024-10-31 01:52:10'),
(81, 'Konfigurasi CCTV untuk area 301 telah dilakukan, dengan alokasi IP address: 198', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-01 05:45:32', '2024-10-31 01:52:31'),
(82, 'Pengecekkan Rutin CCTV Area Office dan Pabrik', '\"[false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true]\"', 100, 'Rutin setiap hari', 'SETUJU', 1, 41, 10, '2024-10-01 06:01:41', '2024-10-31 01:52:53'),
(83, 'Pembangunan Awal Website INDOASPHALT.com', '\"[false,true,true,true,true,false,false,true,true,false,true,true,true,true,true,false,true,true,true,true,false,false,true,true,false,false,false,true,true,true,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-01 05:48:06', '2024-10-31 01:55:06'),
(84, 'Pemesanan dan Pemasangan Paket Berlangganan JWR+12 Mess MGR dengan ID PELANGGAN: 511912188 / 0266018946 | 30-09-2023 habis tempo, aktivasi ulang MNC Vision Rp 199.000 + admin Rp 5.000', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-01 05:48:39', '2024-10-31 01:55:43'),
(85, 'Pemasangan CCTV telah selesai dilakukan dengan konfigurasi IP address: 164 di area Timbangan', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-01 04:52:34', '2024-10-31 04:52:34'),
(86, 'Penerapan silicone sealant pada unit CCTV lama telah diperiksa dan dilakukan penanganan sesuai kebutuhan', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-01 04:53:01', '2024-10-31 04:53:01'),
(87, 'Pengecekan dan Perbaikan terhadap monitor CCTV di Pos Induk yang mengalami blank. Ditemukan bahwa Aplikasi SmartPSS melakukan reload otomatis, serta pengaturan pengguna (user) mengalami reset', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-01 04:53:36', '2024-10-31 04:53:36'),
(88, 'Adaptor monitor ASUS pada Komputer Asus milik Fathur terdeteksi mengalami kerusakan dan memerlukan penggantian', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-01 05:51:17', '2024-10-31 02:17:28'),
(89, 'Setting konfigurasi VPN PPTP & L2TP Laptop Pak Handry by Remote Anydesk', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-01 05:51:36', '2024-10-31 02:10:43'),
(90, 'Koneksi ping ke Jakarta terputus. Setelah ditelusuri, penyebabnya adalah router yang direstart oleh Pak Charles karena koneksi internet di Jakarta mengalami ketidakstabilan, dengan kondisi mati-hidup berulang kali.', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-01 05:51:53', '2024-10-31 02:11:09'),
(91, 'Telah dilakukan pengujian terhadap semua channel TV lokal setelah proses aktivasi ulang. Semua channel telah berhasil dibuka kembali dan berfungsi dengan baik.', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-01 05:52:12', '2024-10-31 02:11:31'),
(92, 'NVR pabrik mengalami gangguan (down). Setelah dilakukan pengecekan terhadap radiolink dari office ke Control Room menggunakan perintah CMD, hasilnya menunjukkan koneksi baik. Ternyata masalah terletak pada kabel LAN yang terhubung ke switch, sehingga dilakukan penggantian port. Setelah pergantian, sistem kembali normal, namun ditemukan satu port switch mengalami kerusakan.', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-01 05:52:51', '2024-10-31 02:12:03'),
(93, 'Dokumentasi Potret Foto dan Video Tamu dari Kementerian PUPR 10 Orang', '\"[false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-02 05:53:52', '2024-10-31 02:12:25'),
(94, 'Persiapan sound system dan mikrofon untuk keperluan meeting direksi dengan karyawan Pukul 19.00 WITA telah dilakukan.', '\"[false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-02 04:54:09', '2024-10-31 04:54:09'),
(95, 'Membuat dan Merancang Layout untuk Rencana Topologi jaringan baru menggunakan Starlink untuk dua lokasi, yaitu office dan pabrik. Kedua lokasi menggunakan dua router MikroTik yang terkoneksi langsung dengan jalur utama ke Jakarta. (Project Kedepan)', '\"[false,false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-02 05:55:10', '2024-10-31 02:14:58'),
(96, 'Telah dibangun topologi radiolink aktual untuk dibandingkan dengan topologi radiolink perencanaan. Topologi ini bertujuan mengubah jalur koneksi antara office dan pabrik, dan akan diajukan kepada Pak Kendro untuk pertimbangan lebih lanjut.', '\"[false,false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-02 05:55:25', '2024-10-31 02:19:46'),
(97, 'Telah melakukan panggilan kepada Pak Charles atas permintaan Pak Kendro untuk menanyakan lokasi pembelian perangkat Starlink beserta harga perangkat kerasnya', '\"[false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-02 05:55:45', '2024-10-31 02:21:55'),
(98, 'Membuat Rancangan Design untuk Rencana Pemindahan Radiolink dari Workshop ke Samping Control Room telah selesai dibuat dan disetujui oleh Pak Kendro.', '\"[false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-02 05:56:36', '2024-10-31 02:22:21'),
(99, 'Pemindahan Modem Starlink dari jaringan internet LNS bonding ke Jaringan Router KPA. Hujan sangat deras, jaringan mengalami down, hujan reda jaringan dikembalikan lagi ke mode bonding LNS.', '\"[false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-02 04:54:31', '2024-10-31 04:54:31'),
(100, 'Telah mengaktifkan akun pengguna Tamu untuk keperluan Kementerian PUPR. Setelah selesai, akun tersebut dinonaktifkan kembali.', '\"[false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-02 05:57:04', '2024-10-31 02:28:07'),
(101, 'Telah memberikan bantuan kepada Pak Umar terkait kendala dalam menggunakan aplikasi Skype untuk melakukan rapat', '\"[false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-02 05:57:18', '2024-10-31 02:28:25'),
(102, 'Pemasangan CCTV dengan IP address 198 di area 201 telah selesai. Kabel LAN juga telah dicek dan dipastikan dalam kondisi sangat baik', '\"[false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-03 04:55:07', '2024-10-31 04:55:07'),
(103, 'Access Point tidak memancarkan internet. Setelah dilakukan tes kabel menggunakan LAN tester, ditemukan bahwa kabel Orange dan Putih-Orange mengirim paket data terputus. Dilakukan crimping ulang, dan AP berfungsi kembali dengan baik.', '\"[false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-03 05:58:11', '2024-10-31 02:32:20'),
(104, 'Telah memberikan pelayanan terhadap laptop pribadi Bu Hikmah yang mengeluhkan laptopnya lambat.', '\"[false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-03 05:58:24', '2024-10-31 02:32:49'),
(105, 'Telah menerima telepon dari Pak Handri mengenai keluhan sistem Qube di kantor Jakarta yang beberapa kali mengalami gangguan (down). Setelah akan dilakukan remote ke site Jakarta, sistem kembali normal.', '\"[false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-03 05:58:37', '2024-10-31 02:33:28'),
(106, 'Mengurus perijinan forklift beserta operatornya untuk membantu pekerjaan di ketinggian terkait pemasangan CCTV di area 201.', '\"[false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-03 04:55:26', '2024-10-31 04:55:26'),
(107, 'Membuat User Hotspot baru atas nama : Suedi, Muhadi dan Zulhaidir (Pabrikasi)', '\"[false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-03 04:55:49', '2024-10-31 04:55:49'),
(108, 'Training Komputer Excel Leader Baru Lokal Produksi (Pak Fathur & Pak Ode Amyn)', '\"[false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-03 06:00:37', '2024-10-31 02:39:19'),
(109, 'Telah menerima telepon dari Pak Kendro mengenai perencanaan pembuatan tower jaringan radiolink di samping gedung DCS. Beliau menginformasikan adanya rencana pembangunan delapan tangki di sekitar kolam penampungan air dekat timbangan. Diminta agar rencana tersebut ditinjau ulang untuk memastikan bahwa tower yang akan dibangun tidak terhalang oleh tangki-tangki tersebut, sehingga jalur frekuensi tetap optimal.', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-04 06:04:14', '2024-10-31 02:39:52'),
(110, 'Permintaan Form Request Order Barang ke Administrasi Umum untuk Pemesanan Pembelian Konektor Penyambung LAN RJ-45 sebanyak 5 Pcs sesuai Permintaan dari Pak Jimmy, untuk Pemindahan Access Point dan Radiolink di Gerbang Utama ke Tiang Lampu di Area yang sama sekaligus Permintaan Order Konektor RJ-45 sebanyak 2 Pack.', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-04 06:07:56', '2024-10-31 02:40:29'),
(111, 'Pembongkaran dan Pelepasan Panel serta Kabel Jaringan di Panel Area 304, dikarenakan adanya pengerjaan pemindahan Limbah', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'CCTV serta Radiolink sementara tidak aktif karena di cabutnya semua port pada Switch didalam Panel', 'SETUJU', 1, 41, 10, '2024-10-04 06:09:48', '2024-10-31 02:40:50'),
(112, 'Membahas Perencanaan terkait Pembuatan Tower Jaringan baru di samping DCS bersama Pak Erta (Arsitek Sipil)', '\"[false,false,false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'Pembahasan terkait Tinggi Tangki dan Gedung Stockpile tidak terhalang dari Jarak Pandang diatas Tower serta Perancangan Rencana Design pada Tower Jaringan tersebut.', 'SETUJU', 1, 41, 10, '2024-10-04 06:12:37', '2024-10-31 02:41:22'),
(113, 'Monitoring CCTV, melakukan Rebooting pada Device CCTV yang tidak melakukan Response balik ketika di Ping', '\"[false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-05 06:13:34', '2024-10-31 02:41:57'),
(114, 'Informasi dari Pak Yuli (Kepala Bagian HK) Meminta Bantuan untuk Melakukan Pengecekkan CCTV, Playback Area Mess Karyawan pada Cam#4 Kamar No. 201 atas nama Firman Gustaman (KAI). Paket baju laundry telah hilang selama 5 hari sejak tanggal 2 Oktober 2024. Setelah ditelusuri oleh anggota Housekeeping (HK), tidak ditemukan catatan terkait laundry atas nama Firman Gustaman pada tanggal tersebut. Selain itu, catatan dari pihak laundry juga tidak menunjukkan adanya baju atas nama tersebut', '\"[false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'sudah di temukan,  paket laundry di konfirmasi Pak Yuli ada di ruangan penghitungan Laundry', 'SETUJU', 1, 41, 10, '2024-10-07 06:16:17', '2024-10-31 02:42:42'),
(115, 'Telah diterima informasi dari Pak Hendri (Logistik) untuk memeriksa CCTV dan kabel LAN di area tersebut. Ditemukan bahwa tiang lampu tempat CCTV dan radiolink dalam kondisi miring setelah tertabrak forklift, dengan operator forklift adalah Pak Hendri sendiri. Setelah dilakukan pemeriksaan, kondisi CCTV, panel box, dan kabel dipastikan aman, namun tiang lampu mengalami kemiringan dan terdapat satu baut yang hilang', '\"[false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-07 06:16:34', '2024-10-31 02:43:40'),
(116, 'Melakukan Riset terkait Penjual Paket Starlink Unlimited yang dapat di Beli Mati', '\"[false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-07 06:17:24', '2024-10-31 02:48:07'),
(117, 'Melakukan Meeting untuk Pembahasan terkait Struktur Organisasi Baru.', '\"[false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai dengan Struktur Organisasi yang baru.', 'SETUJU', 1, 41, 10, '2024-10-07 06:18:14', '2024-10-31 02:54:42'),
(118, 'Melakukan Pengecekan Tiang Selling Triangle RPX', '\"[false,false,false,false,false,false,false,false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai dengan melakukan pengukuran ulang disekitar tiang RPX', 'SETUJU', 1, 41, 10, '2024-10-08 06:19:13', '2024-10-31 02:54:15'),
(119, 'Traffic tinggi mengakibatkan jaringan melambat, telah di lakukan torch LAN dan didapat ada 2 kamera dengan kapasitas receive dan transmit yang tinggi. Sudah di reboot', '\"[false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-08 06:19:33', '2024-10-31 02:53:46'),
(120, 'Pembuatan dan Perancangan Awal aplikasi Management Report untuk Optimalisasi Pelaporan.', '\"[false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'membuat rancangan awal serta melakukan konfigurasi awal pada sistem aplikasi.', 'SETUJU', 1, 41, 10, '2024-10-08 06:21:09', '2024-10-31 02:53:15'),
(121, 'Telah melakukan panggilan dengan Pak Hendrik dari IT Suncity untuk menanyakan perihal paket data Starlink. Pak Hendrik menjelaskan bahwa Suncity memiliki satu perangkat Starlink yang saat ini tidak terpakai karena modem Starlink kurang optimal di perkotaan dan tidak mendukung penggunaan IP Publik dengan baik. Starlink menawarkan dua jenis layanan data: prioritas dan reguler. Suncity saat ini menggunakan layanan prioritas 40GB dengan layanan reguler unlimited. Beliau juga menyarankan untuk membeli langsung melalui website resmi Starlink agar dashboard bisa disetting sendiri, dibandingkan membeli dari reseller yang membatasi akses pengaturan.', '\"[false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-08 06:21:24', '2024-10-31 02:52:48'),
(122, 'Pak Tri meminta bantuan untuk memberikan akses Wi-Fi kepada vendor mekanik alat berat Loader Sany, yang datang hari ini dari Kendari untuk melakukan servis loader. Konfirmasi sudah dilakukan dengan Bapak Laode Amyn.', '\"[false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-08 06:21:49', '2024-10-31 02:51:48'),
(123, 'Mendapat informasi dari Pak Charles bahwa sewa Starlink LNS diperpanjang lagi selama 6 bulan. Selain itu, mendapat perintah dari Pak Kendro agar proyek pembangunan menara Starlink di DCS dipercepat. Informasi tersebut telah saya forward ke Pak Laode Amyn.', '\"[false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-08 06:22:16', '2024-10-31 02:51:04'),
(124, 'Melakukan Koordinasi terkait Pembangunan Tower Jaringan Baru bersama Pak Suminta', '\"[false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'Konfirmasi penentuan Titik pemasangan Bim Suku Besi yang akan menjadi Fondasi Menara Radiolink di samping gedung DCS.', 'SETUJU', 1, 41, 10, '2024-10-08 06:23:49', '2024-10-31 02:50:31'),
(125, 'Pak edi menanyakan mengenai, proyek menara radiolink di cat warna abu-abu dan meminta konfirmasi kerangka yang dibuat apakah sudah benar atau belum, sudah saya konfirmasi', '\"[false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-09 04:56:19', '2024-10-31 04:56:19'),
(126, 'Menemui pak suminta mengkonfirmasi proses menara sudah sampai mana, setelah di lokasi menara sudah 60% jadi. Kurang pagar pengaman, tangga dan proses pengecatan', '\"[false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-09 04:56:37', '2024-10-31 04:56:37'),
(127, 'Permintaan Pemasangan Unit UPS baru untuk Pak Erta (Arsitek Sipil)', '\"[false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 50, 'UPS sedang di perbaiki', 'SETUJU', 1, 41, 10, '2024-10-09 04:57:03', '2024-10-31 04:57:03'),
(128, 'Ukur lebar dan tinggi menara tower antena G6 di bukit, per 5 tahun sekali ganti kawat seling dan mengajukan saran untuk di lakukan pengecoran', '\"[false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-09 04:57:22', '2024-10-31 04:57:22'),
(129, 'Melakukan Presentasi terkait Progress pengerjaan Aplikasi Management Report ke Pak Andi (HRD)', '\"[false,false,false,false,false,false,false,false,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'Lanjut membangun Database untuk aplikasi.', 'SETUJU', 1, 41, 10, '2024-10-09 06:28:45', '2024-10-31 03:05:59'),
(130, 'Menemui Pak Sarfin di Area 304 dikonfirmasi pak sarfin memastikan lama pengerjaan limbah tidak dapat di prediksi untuk waktu selesai karena ditambah akan diteruskan ke proyek tangki 8. telah dikonfirmasi kepada Pak Amin dan Pak Andi terkait Non-aktif nya CCTV sementara waktu.', '\"[false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'CCTV dan Radiolink area 304 dan 305 P.Asphalt tidak dapat di aktifkan untuk beberapa waktu', 'SETUJU', 1, 41, 10, '2024-10-09 04:57:53', '2024-10-31 04:57:53'),
(131, 'Kamera CCTV di Area Timbangan Cam#1 dan Cam#4 mengalami RTO, dilakukan pengecekkan ke Lokasi.', '\"[false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'CCTV Cam#1 mengalami kerusakan pada Bagian Internal CCTV dan CCTV Cam#4 dilakukan Pembersihkan karena ada nya embun yang masuk.', 'SETUJU', 1, 41, 10, '2024-10-10 06:34:39', '2024-10-31 03:10:56'),
(132, 'Ambil HT HYT PD568 UL913 IS UHF 400-470MHz di Gudang untuk di tes perfomanya', '\"[false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false]\"', 100, 'Pengembalian HT Tersebut pada tanggal 27 Oktober', 'SETUJU', 1, 41, 10, '2024-10-10 06:35:23', '2024-10-31 03:11:40'),
(133, 'Penyelesaian Rangkaian Database serta membuat fungsi Update dan Delete untuk Tabel Laporan.', '\"[false,false,false,false,false,false,false,false,false,false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'Pengerjaan Progress Aplikasi Manajemen Report', 'SETUJU', 1, 41, 10, '2024-10-10 06:36:59', '2024-10-31 03:12:19'),
(134, 'Pak Wahyu (IT) telah melakukan pengecekan progress pembuatan tower di  bagian pabrikasi Pak Suminta', '\"[false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-10 06:37:34', '2024-10-31 03:12:56'),
(135, 'Evakuasi dua unit UPS di area 304 dan 305 P.Aspal telah dilakukan karena adanya pemindahan limbah dan proyek pembangunan tangki 8', '\"[false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-10 06:37:49', '2024-10-31 03:13:22'),
(136, 'Melakukan Riset terkait Rencana Pemesanan HT Untuk Produksi, pencarian spesifik pada standar Migas dan direkomendasikan untuk Menggunakan Motorola Seri XiR, Model terkhusus pada versi P6600i dan P6620i dilengkapi dengan fitur yang sesuai dengan kebutuhan industri, termasuk tahan debu dan air dengan sertifikasi IP67, serta memenuhi standar militer MIL-STD 810 untuk ketahanan terhadap kondisi ekstrim.', '\"[false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'Rekomendasi telah diberikan kepada Pak Amin.', 'SETUJU', 1, 41, 10, '2024-10-11 04:58:48', '2024-10-31 04:58:48'),
(137, 'Melakukan Riset serta mempelajari Frekuensi HT yang optimal terkhusus pada TX dan RX nya yang performa nya stabil.', '\"[false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-11 06:41:31', '2024-10-31 03:16:04'),
(138, 'Menyusun rencana pemindahan box panel CCTV 304 dari tiang lampu gerbang ke area pompa J2.', '\"[false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'telah dikonfirmasi Pak Andi', 'SETUJU', 1, 41, 10, '2024-10-11 04:59:26', '2024-10-31 04:59:26'),
(139, 'Informasi dari Pak Edi (Translator), bahwa menara Tower Jaringan yang baru telah selesai dan akan di Bangun pada hari Minggu jam 07.00 WITA.', '\"[false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-12 06:43:40', '2024-10-31 03:17:15'),
(140, 'Konfirmasi penyelesaian Tower Jaringan Baru ke Pak Suminta serta Pak Didik terkait pemasangan pembangunan Tower di Area samping DCS.', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-13 06:44:53', '2024-10-31 03:17:49'),
(141, 'Menginformasikan penundaan pemasangan kepada Pak Andi Translator agar diteruskan kepada TKA', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-13 06:45:14', '2024-10-31 03:18:23'),
(151, 'Penggaraman RO kantin & cleaning flowmeter', '\"[false,true,false,true,false,false,true,false,false,true,false,false,false,true,false,false,true,false,false,true,false,false,true,false,false,true,false,false,true,false,false,true]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-01 13:15:09', '2024-10-30 13:15:09'),
(152, 'Pemasangan preasur pompa 2', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-01 12:57:18', '2024-10-30 12:57:18'),
(153, 'Perbaikan toilet kamar 02 & 03 mes manager', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-01 12:57:28', '2024-10-30 12:57:28'),
(154, 'Perbaikan wastafel toilet umum mes manager', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-01 12:57:44', '2024-10-30 12:57:44'),
(155, 'Perbaikan pompa boster kantin', '\"[false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-01 12:57:57', '2024-10-30 12:57:57'),
(156, 'Pemasangan U-bolt pipa area jembatan', '\"[false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-02 12:57:01', '2024-10-30 12:57:01'),
(157, 'Cleaning lampu lalat', '\"[false,false,true,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-02 13:38:02', '2024-10-30 13:38:02'),
(158, 'Perbaikan AC ruang makan DCS', '\"[false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-02 13:03:21', '2024-10-30 13:03:21'),
(159, 'Penggantian pompa boster kantin', '\"[false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-02 13:08:50', '2024-10-30 13:08:50'),
(160, 'Pengecatan pipa air area jembatan sampai mesin pompa sungai', '\"[false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-03 13:10:42', '2024-10-30 13:10:42'),
(161, 'Perbaikan lampu lalat', '\"[false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-03 13:12:24', '2024-10-30 13:12:24'),
(162, 'Perbaikan wastafel kantin cina', '\"[false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-03 13:13:04', '2024-10-30 13:13:04'),
(163, 'Perbaikan handshower toilet kamar no.06 & toilet umum mes manager', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-04 13:16:53', '2024-10-30 13:16:53'),
(164, 'Penggantian filter RO mes karyawan', '\"[false,false,false,false,true,false,false,true,false,false,false,false,true,false,false,false,false,false,false,false,true,false,false,true,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-04 13:19:31', '2024-10-30 13:19:31'),
(165, 'Penggaraman RO mes karyawan & cleaning flowmeter', '\"[false,false,false,false,true,false,false,true,false,false,true,false,false,false,true,false,false,false,true,false,false,false,false,true,false,false,false,true,false,false,false,true]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-04 13:21:47', '2024-10-30 13:21:47'),
(166, 'Perbaikan closet toilet umum mes karyawan', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-04 13:22:29', '2024-10-30 13:22:29'),
(167, 'penyiraman jalan area pabrik', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-04 13:23:35', '2024-10-30 13:23:35'),
(168, 'Perbaikan AC standing office', '\"[false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-04 13:24:07', '2024-10-30 13:24:07'),
(169, 'Perbaikan jalur pipa air jembatan', '\"[false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-05 13:26:51', '2024-10-30 13:26:51'),
(170, 'Perbaikan orinal mes karyawan 1 unit', '\"[false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-05 13:27:31', '2024-10-30 13:27:31'),
(171, 'Perbaikan kelistrikan kantin (ganti MCB) & Perbaikan kabel kulkas daffa', '\"[false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-06 13:28:33', '2024-10-30 13:28:33'),
(172, 'Perbaikan pemanas nasi kantin cina', '\"[false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-06 13:30:13', '2024-10-30 13:30:13'),
(173, 'Cleaning saluran air & bak control kantin', '\"[false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-06 13:31:41', '2024-10-30 13:31:41');
INSERT INTO `laporan` (`id`, `laporan_rencana_kerja`, `laporan_jumlah_hari`, `laporan_presentasi_pencapaian`, `laporan_keterangan`, `laporan_status`, `divisi_id`, `login_id`, `periode_id`, `created_at`, `updated_at`) VALUES
(174, 'Perbaikan pintu kamar mandi kantin 1 unit (Pemasangan kunci slot)', '\"[false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-06 13:32:43', '2024-10-30 13:32:43'),
(175, 'Cleaning mesin RO mes karyawan & ganti filter 1 pcs', '\"[false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-07 13:36:22', '2024-10-30 13:36:22'),
(176, 'Cleaning mesin RO kantin & penggantian filter 1 pcs', '\"[false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-07 13:37:07', '2024-10-30 13:37:07'),
(177, 'Plassing saluran air kamar no.06 mes manager', '\"[false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-07 13:38:57', '2024-10-30 13:38:57'),
(178, 'Pemotongan dan pemasangan pipa air untuk area depan wokshop alat berat', '\"[false,false,false,false,false,false,false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-07 13:40:06', '2024-10-30 13:40:06'),
(179, 'Perbaikan closet mes karyawan 2 unit', '\"[false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-07 13:40:39', '2024-10-30 13:40:39'),
(180, 'Senai pipa air untuk pemasangan depan workshop alat berat', '\"[false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-08 13:41:45', '2024-10-30 13:41:45'),
(181, 'Perbaikan AC lab bawah', '\"[false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-08 13:42:12', '2024-10-30 13:42:12'),
(182, 'Pembuatan laporan bulan september 2024', '\"[false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-08 13:43:06', '2024-10-30 13:43:06'),
(183, 'Perbaikan closet kantin', '\"[false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'PENDING', 19, 42, 10, '2024-10-08 13:44:17', '2024-10-30 13:44:17'),
(184, 'Memantau proyek pemasangan menara tower jaringan.', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-14 15:36:36', '2024-10-31 03:18:45'),
(185, 'Menambah jalur selebar 60-80 cm di samping menara tower jaringan dan koordinasi dengan Pak Frans permintaan penambahan Plat untuk jalur  jalan samping menara lebar 60-80 cm', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'progress lanjutan Koordinasi dengan Pak Ujang permintaan PHL untuk pengecatan jalur  jalan tambahan', 'SETUJU', 1, 41, 10, '2024-10-14 15:37:46', '2024-10-31 03:19:20'),
(186, 'Koordinasi dengan Pak Rukman terkait permintaan penarikan kabel  power ke atas menara dan pemindahan power dari tiang lampu 304 ke area pompa J2', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-14 15:38:20', '2024-10-31 03:19:58'),
(187, 'Mengirim laporan invoice Zoom meeting periode 13 Oktober - 13  November 2024 atas permintaan Pak Handry', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-14 15:38:46', '2024-10-31 03:20:31'),
(188, 'Monitor CCTV di pos induk mati pada 2 lokasi (Gate 1 #cam2 dan Pos 2  gerbang) telah dikondisikan', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-14 15:39:09', '2024-10-31 03:21:06'),
(189, 'Pembuatan Interfaces untuk Halaman Index Laporan pada Aplikasi Manajemen Report', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-14 15:39:45', '2024-10-31 03:21:33'),
(190, 'Playback CCTV Stockpile untuk insiden truk terbalik Pukul 7.44 WITA', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-14 05:00:05', '2024-10-31 05:00:05'),
(191, 'Pemasangan 2 Kabel Belden UTP Cat 6 dan crimping Connector RJ-45 untuk Jalur Radiolink dan Jalur extensi tambahan untuk penggunaan Radio Tambahan pada Tower Baru', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-15 05:00:52', '2024-10-31 05:00:52'),
(192, 'Setting share folder HSE di laptop Pak Anang atas permintaan Pak Jarot, Bookmark Login Hotspot di laptop Pak Anang dan memenuhi permintaan Pak Sudarman terkait rekaman insiden truk sebelum terbalik dan di saat berdiri kembali serta melakukan Koordinasi dengan Pak Frans/Pak Suminta/Pak Didik perihal pembuatan support/dudukan box panel di area pompa jitu', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-15 15:42:17', '2024-10-31 03:31:38'),
(193, 'Pendampingan & Dokumentasi pihak kalibrasi timbangan serta Pembukaan akses user Tamu untuk kebutuhan Tamu dari Kalibrasi', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-15 15:42:54', '2024-10-31 03:32:09'),
(194, 'Mengurus perijinan/permit pekerjaan berbahaya dan ketinggian di kantor HSE dan melanjutkan permintaan email perusahaan atas nama Anang Nugroho ke Pak Laode Amyn', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-15 05:01:13', '2024-10-31 05:01:13'),
(195, 'Muncul tampilan notife error \"Maximum User Sudah Tercapai (10 User),Menutup Aplikasi!\" di aplikasi Qube Sistem Admin Gudang atas nama Bu Hesti,  sudah di forward ke Pak Handry HO Jakarta', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'Dilakukan Update 1 folder Qube System User Hesti atas permintaan Pak Handry', 'SETUJU', 1, 41, 10, '2024-10-15 05:01:42', '2024-10-31 05:01:42'),
(196, 'Pembongkaran box panel di area 304 dan Pencopotan 2 unit CCTV, 1 radiolink client, dan kabel LAN 4 line dan akan dipindah ke Area Pompa J2', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'Koordinasi dengan Pak Ruqman terkait pelaksanaan penarikan kabel power dari panel induk 24 jam di area pompa J2 sepanjang 10 meter menuju box panel', 'SETUJU', 1, 41, 10, '2024-10-16 05:02:44', '2024-10-31 05:02:44'),
(197, 'Pemasangan box panel di area pompa J2, Penarikan kabel power oleh tim elektrik (Pak Heriyana dan Pak Safrin) untuk kebutuhan CCTV dan radiolink client dan Penarikan kabel LAN CCTV 304 #cam1 dan #cam2 dipindahkan ke area  pompa J2', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-16 15:44:59', '2024-10-31 03:38:57'),
(198, 'Pembongkaran box panel radio repeater destilasi dan pencabutan  power oleh tim elektrik', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-16 15:45:16', '2024-10-31 03:42:56'),
(199, 'Pengambilan kabel listrik NYM 3 x 2,5 di gudang untuk power listrik panel menara radiolink repeater', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-16 05:03:00', '2024-10-31 05:03:00'),
(200, 'Pak Anang meminta penambahan setting share folder Pak Jarot di laptopnya', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-16 15:45:57', '2024-10-31 03:45:15'),
(201, 'Mendapat informasi kepada Pak Rukman bahwa penarikan kabel  menara dipending karena tim elektrik sedang dikejar untuk penyelesaian power di RO Pabrik.', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-16 15:46:19', '2024-10-31 03:46:21'),
(202, 'Playback rekaman CCTV area packaging terkait insiden kecelakaan karyawan yang kakinya terkena aspal panas,  atas permintaan Pak Jarot', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-16 05:03:29', '2024-10-31 05:03:29'),
(203, 'CCTV Timbangan 2 unit mati dikarenakan ada kerusakan pada Internal CCTV serta pengecekkan CCTV Mati pada area Workshop', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'CCTV Workshop 1 unit mati (Kamera lama)', 'SETUJU', 1, 41, 10, '2024-10-17 15:47:34', '2024-10-31 03:48:08'),
(204, 'Reboot CCTV Pabrik#cam2 serta melakukan bantuan terkait pencarian software HT Motorola CP210 punya pribadi Pak Aan', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-17 15:48:16', '2024-10-31 03:48:39'),
(205, 'Pantau Penarikan Kabel Listrik dari panel di bawah Destilasi sampai  dengan atas menara Jaringan (Pak Heriyana, Pak Amin & Pak Tio dari Electric) dan melakukan pembongkaran Kabel Listrik Jaringan dari Destilasi Lantai 3 sampai dasar', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-18 05:03:48', '2024-10-31 05:03:48'),
(206, 'Penarikan Kabel LAN dari  ControlRoom Lt.2 sampai bagian atas menara serta pemasangan box panel, UPS & Switch Hub', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-18 05:04:29', '2024-10-31 05:04:29'),
(207, 'Mempersiapkan Perlengkapan dan Zoom Meeting Konsultan', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-18 05:04:52', '2024-10-31 05:04:52'),
(208, 'Connect Kabel listrik dipanel induk destilasi (Pak Heriyana & Pak Abi)', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-18 15:50:35', '2024-10-31 03:52:36'),
(209, 'Bug Fixing dan Testing Fitur halaman Index Laporan serta menambahkan Fungsi Update Data Persiapan untuk testing data Uji pada Aplikasi Management Report', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-19 15:51:37', '2024-10-31 03:53:14'),
(210, 'Membantu Setting HT Pribadi milik Pak Wiji, HT BAOFENG Tipe UV-82 dan dilanjut dengan mengerjakan Bug Fixing pada Aplikasi Manajemen Report terkait Proses update Laporan pada Modal Aplikasi Management Report', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-21 15:52:33', '2024-10-31 04:03:33'),
(211, 'Memindahkan Access Point WiFi dari panel di bawah Tower Jaringan  ke dalam Ruangan Pak Sudarman di ControlRoom Lt.1', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false]\"', 60, 'Belum selesai', 'SETUJU', 1, 41, 10, '2024-10-21 05:05:25', '2024-10-31 05:05:25'),
(212, 'Bug Fixing Aplikasi Manajemen Report (Perbaikan error pada halaman   login ketika salah memasukkan pasword)', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,false,false,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-21 15:53:28', '2024-10-31 04:13:00'),
(213, 'Pengecekan Sudut Pandang lurus antar Radio Office dan Pabrik  memastikan tidak ada halangan dan Melanjutkan Pembangunan Web Indoasphalt', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-23 15:54:06', '2024-10-31 04:14:14'),
(214, 'Lepas Radiolink Repeater Client di Tiang Workshop serta Pasang Radiolink Repeater Client di Menara Jaringan DCS, Connect to Switch Server ControlRoom, Tes Perfoma dengan Speedtest.com dan Tes Ping 8.8.8.8 dan detik.com dan Periksa keadaan Kabel LAN Radio Pabrik dan Office', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-24 05:06:27', '2024-10-31 05:06:27'),
(215, 'Atur Rotasi kemiringan Radiolink Repeater Office to Pabrik dilanjut dengan Tes speed sebelum dan sesudah jaringan di (Lab, Gudang, ControlRoom Lt.1dan ControlRoom Lt.2)', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-24 05:06:45', '2024-10-31 05:06:45'),
(216, 'Tes panggilan dari pabrik ke luar (Yogyakarta & Makassar) suara jernih tanpa putus setelah melakukan pengecekkan bandwith dari radio repeater pabrik ke office', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-24 05:07:05', '2024-10-31 05:07:05'),
(217, 'Dapat laporan bahwa pak sudarman ketika telepone dengan direksi di Jakarta masih sering putus-putus, dilanjut dengan Konfirmasi titik ketika menerima telepone, titik berada di area Mixer.', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false]\"', 100, 'Cek ke lokasi Mixer, Area dengan sinyal yang lemah karena jauh dari Access Point dan banyak tangki besi yang menghalangi', 'SETUJU', 1, 41, 10, '2024-10-25 05:07:37', '2024-10-31 05:07:37'),
(218, 'Bantu TKA a.n Sunhe lupa akun Masuk dashboard Orbit, Bantu Setting HT Pribadi Punya Pak Sofiyan serta Setting Ruang Meeting untuk Rapat dengan Jakarta', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-25 15:57:45', '2024-10-31 04:27:40'),
(219, 'Pemindahan 2 Unit CCTV 304, UPS, Switch Hub dan Radiolink Repeater ke Pompa J2, Penarikan Kabel 3 Line langsung connect.', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-29 05:08:17', '2024-10-31 05:08:17'),
(220, 'Pasang Radio Repeater di Tower Jaringan DCS mengarah ke Pompa J2 1 Unit, Connect Switch Hub dan UPS.', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false]\"', 100, 'selesai, sekaligus membantu Pak Anang untuk Download Video dari Youtube untuk Tutorial Pemasangan Tali Helm Safety.', 'SETUJU', 1, 41, 10, '2024-10-29 05:08:41', '2024-10-31 05:08:41'),
(221, 'Melakukan Koordinasi bersama divisi Electrical & Instrumen, diinfokan bahwa ada agenda Pencabutan semua tiang listrik satu jalur samping kolam area 305, CCTV 3 Unit, Switch Hub, UPS dan Radiolink Repeater di Bongkar.', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false]\"', 100, 'sementara CCTV 305 P.Asphalt akan dimatikan dalam beberapa waktu yang belum dapat ditentukan, terkait pembangunan Area untuk Packaging baru pada area tersebut.', 'SETUJU', 1, 41, 10, '2024-10-29 05:10:03', '2024-10-31 05:10:03'),
(222, 'Melakukan Perbaikan sekaligus Cleaning Catridge Tinta dari Printer di Control Room Lt.2', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false]\"', 100, 'Hasil print kurang baik, dilakukan pengecekkan langsung dan di bersihkan sehingga dapat kembali jernih hasil printnya.', 'SETUJU', 1, 41, 10, '2024-10-29 00:26:46', '2024-10-31 04:30:59'),
(223, 'Pengembalian HT HYT PD-568 yang sebelumnya di pinjam untuk keperluan pengetesan konfigurasi.', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false]\"', 100, 'telah diterima oleh pak Rizaldin (Warehouse).', 'SETUJU', 1, 41, 10, '2024-10-29 00:27:51', '2024-10-31 04:31:32'),
(224, 'Melakukan Reboot CCTV di beberapa Area : Gudang Gas, Tiang Pabrik cam#2, Crusher Cam#1 dan Cam#5, Stockpile baru Cam#1', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false]\"', 100, 'setelah di Reboot, kamera berjalan dengan normal kembali.', 'SETUJU', 1, 41, 10, '2024-10-29 00:29:15', '2024-10-31 04:32:06'),
(225, 'Dokumentasi Foto dan Video untuk kebutuhan Dokumentasi Proses Packaging di 305, Pengambilan Foto Karung Asphalt baru Indoasphalt PG-70 dan PG-76', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-30 05:11:00', '2024-10-31 05:11:00'),
(226, 'Radio dan CCTV Area 304 Mati', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false]\"', 100, 'UPS rusak, banyak terdapat semut merah. Ganti UPS. Selesai', 'SETUJU', 1, 41, 10, '2024-10-30 05:11:23', '2024-10-31 05:11:23'),
(227, 'Ganti Battery Aki UPS Sebanyak 4 Unit untuk 2 UPS.', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-30 05:10:25', '2024-10-31 05:10:25'),
(228, 'Running dan Penyelesaian Konfigurasi HT Merk WLN Milik pribadi Pak Sofyan (Produksi)', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false]\"', 100, 'selesai', 'SETUJU', 1, 41, 10, '2024-10-30 00:37:49', '2024-10-31 04:38:25'),
(232, 'Reset Counter Pemakaian Bulanan Kuota User, Mangle, Interfaces dan Queues-Tree pada Jaringan MikroTik Ecoasphalt', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 0, 'progress', 'PENDING', 1, 41, 11, '2024-11-01 02:31:12', '2024-10-31 02:31:12'),
(233, 'Dokumentasi Foto dan Video untuk Tamu dari Kementrian Perindustrian.', '\"[false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 0, 'progress', 'PENDING', 1, 41, 11, '2024-11-01 02:30:59', '2024-10-31 02:30:59'),
(234, 'Pengecekkan Rutin CCTV Area Office dan Pabrik', '\"[false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,false]\"', 100, 'selesai', 'PENDING', 1, 41, 11, '2024-11-01 02:32:52', '2024-10-31 02:32:52'),
(235, 'Pengerjaan Penarikan Kabel sambungan baru di Area Gerbang 1 (Gerbang Depan) terkait pemindahan Posisi Radiolink Repeater dan Access Point ke Titik Lain di area tersebut.', '\"[false,false,false,false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 0, 'digunakan 2 konektor sambungan untuk tipe RJ-45', 'PENDING', 1, 41, 11, '2024-11-04 04:51:21', '2024-10-31 04:51:21'),
(248, 'Topik hangat yang menjadi konsen di safety', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-01 03:44:20', '2024-10-31 03:44:20'),
(249, 'Pembuatan rambu safety area kerja pabrik dan area lainnya', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-01 03:44:50', '2024-10-31 03:44:50'),
(250, 'Penanganan karyawan yang sakit ketika bekerja sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-01 03:45:06', '2024-10-31 03:45:06'),
(251, 'Penanganan karyawan yang mengalami kecelakaan kerja ketika bekerja sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-01 03:45:20', '2024-10-31 03:45:20'),
(252, 'Pengawasan dan penerbitan ijin kerja kertinggian sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-01 03:46:24', '2024-10-31 03:46:24'),
(253, 'Pengawasan dan penerbitan ijin kerja panas sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-01 03:46:56', '2024-10-31 03:46:56'),
(254, 'Pengawasan dan penerbitan ijin kerja Lifting Crane sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-01 03:47:45', '2024-10-31 03:47:45'),
(255, 'Pengawasan dan penerbitan ijin kerja Ruang Terbatas sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-01 03:48:11', '2024-10-31 03:48:11'),
(256, 'Pengawasan dan penerbitan ijin kerja Galian Tanah sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-01 03:48:47', '2024-10-31 03:48:47'),
(257, 'Pengawasan dan penerbitan ijin kerja Konstruksi sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-01 03:50:21', '2024-10-31 03:50:21'),
(258, 'Training safety induction sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-01 03:51:42', '2024-10-31 03:51:42'),
(259, 'Penyusunan matery training', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-01 03:54:15', '2024-10-31 03:54:15'),
(260, 'Penyusunan Rintek dan Pertek untuk Lingkungan', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-01 03:55:03', '2024-10-31 03:55:03'),
(261, 'Penyiraman area jalan yang berdebu', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-01 03:57:52', '2024-10-31 03:57:52'),
(262, 'Pemindahan Radiolink Repeater di Area Gudang dan Workshop ke Menara Tower Jaringan Baru.', '\"[false,false,false,false,false,false,false,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 0, '1 Unit Radiolink dari Gudang, 2 Unit Radiolink di Workshop.', 'PENDING', 1, 41, 11, '2024-11-07 04:53:22', '2024-10-31 04:53:22'),
(263, 'Pengaturan Konfigurasi Ulang pada Radiolink Repeater Area Tiang Hydrant', '\"[false,false,false,false,false,false,false,true,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 0, 'Pergantian Channel dan IP sesuai kebutuhan untuk penyambungan jalur baru pada Jaringan.', 'PENDING', 1, 41, 11, '2024-11-07 04:53:38', '2024-10-31 04:53:38'),
(264, 'Pengecekkan dan Inspeksi Data dari Aplikasi Timbangan.', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 100, 'progress', 'PENDING', 1, 41, 11, '2024-11-18 04:54:54', '2024-10-31 04:54:54'),
(265, 'Ganti Radio Ubiquiti PBE-5AC-620 Power Beam di Control Room yang mengarah pada Tiang Lampu depan Workshop.', '\"[false,false,false,false,false,false,false,false,false,false,false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 0, 'diganti dengan 2 Unit Radiolink.', 'PENDING', 1, 41, 11, '2024-11-11 04:56:29', '2024-10-31 04:56:29'),
(266, 'Konfigurasi 2 Unit Radio baru untuk menggantikan Radio yang ada di Control Room yang mengarah ke Tiang Lampu Workshop.', '\"[false,false,false,false,false,false,false,false,false,false,false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 0, 'Konfigurasi Radio NSMS NanoStation MS.', 'PENDING', 1, 41, 11, '2024-11-11 04:57:30', '2024-10-31 04:57:30'),
(267, 'Penarikan Kabel Belden LAN RJ-45 untuk Access Point di Area Mixer, Konfigurasi Access Point dan Connect ke Switch Hub yang ada di Server NVR pada Control Room Lt.2', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true,false,false]\"', 0, 'progress', 'PENDING', 1, 41, 11, '2024-11-28 04:59:25', '2024-10-31 04:59:25'),
(268, 'Pembuatan Pembaharuan Topologi Jaringan Pabrik dan Office.', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 0, 'menunggu pergantian Radio pada Control Room ke Workshop', 'PENDING', 1, 41, 10, '2024-10-14 05:00:11', '2024-10-31 05:00:11'),
(269, 'Topik hangat yang menjadi konsen di safety', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-09 05:14:45', '2024-10-31 05:14:45'),
(270, 'Pembuatan rambu safety area kerja pabrik dan area lainnya', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-09 05:15:47', '2024-10-31 05:15:47'),
(271, 'Penanganan karyawan yang sakit ketika bekerja sebanyak', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-09 05:16:07', '2024-10-31 05:16:07'),
(272, 'Penanganan karyawan yang mengalami kecelakaan kerja ketika bekerja sebanyak', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-09 05:16:32', '2024-10-31 05:16:33'),
(273, 'Pengawasan dan penerbitan ijin kerja kertinggian sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-09 05:16:54', '2024-10-31 05:16:54'),
(274, 'Pengawasan dan penerbitan ijin kerja panas sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-09 05:17:19', '2024-10-31 05:17:19'),
(275, 'Pengawasan dan penerbitan ijin kerja Lifting Crane sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-09 05:18:18', '2024-10-31 05:18:18'),
(276, 'Pengawasan dan penerbitan ijin kerja Ruang Terbatas sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-09 05:20:09', '2024-10-31 05:20:09'),
(277, 'Pengawasan dan penerbitan ijin kerja Galian Tanah sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-09 05:22:41', '2024-10-31 05:22:41'),
(278, 'Pengawasan dan penerbitan ijin kerja Konstruksi sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-09 05:23:03', '2024-10-31 05:23:03'),
(279, 'Training safety induction sebanyak', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-09 05:29:19', '2024-10-31 05:29:19'),
(280, 'Penyusunan materi training', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-09 05:29:47', '2024-10-31 05:29:47'),
(281, 'Penyusunan Rintek dan Pertek untuk Lingkungan', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-09 05:30:46', '2024-10-31 05:30:46'),
(282, 'Penyiraman area jalan pabrik yang berdebu', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-09 05:33:19', '2024-10-31 05:33:19'),
(283, 'Penyusunan Laporan Triwulan P2K3', NULL, 0, 'Laporan Triwulan', 'PENDING', 17, 39, 11, '2024-11-09 05:34:23', '2024-10-31 05:34:23'),
(284, 'Topik hangat yang menjadi konsen di safety', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-16 05:35:05', '2024-10-31 05:35:05'),
(285, 'Pembuatan rambu safety area kerja pabrik dan area lainnya', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-16 05:36:18', '2024-10-31 05:36:18'),
(286, 'Penanganan karyawan yang sakit ketika bekerja sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-16 05:36:35', '2024-10-31 05:36:35'),
(287, 'Penanganan karyawan yang mengalami kecelakaan kerja ketika bekerja sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-16 05:36:52', '2024-10-31 05:36:52'),
(288, 'Pengawasan dan penerbitan ijin kerja Ketinggian sebanyak', '\"[false]\"', 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-16 08:43:14', '2024-10-31 08:43:14'),
(289, 'Pengawasan dan penerbitan ijin kerja Panas sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-16 05:41:47', '2024-10-31 05:41:47'),
(290, 'Pengawasan dan penerbitan ijin kerja Lifting Crane sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-16 05:42:27', '2024-10-31 05:42:27'),
(291, 'Pengawasan dan penerbitan ijin kerja Ruang Terbatas sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-16 05:42:52', '2024-10-31 05:42:52'),
(292, 'Pengawasan dan penerbitan ijin kerja Galian Tanah sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-16 05:43:21', '2024-10-31 05:43:21'),
(306, 'Pengawasan dan penerbitan ijin kerja Konstruksi sebanyak', '\"[false]\"', 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-16 08:21:36', '2024-10-31 08:21:36'),
(307, 'Training safety induction', '\"[false]\"', 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-16 08:22:36', '2024-10-31 08:22:36'),
(308, 'Penyusunan matery training', '\"[false]\"', 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-16 08:23:05', '2024-10-31 08:23:05'),
(309, 'Penyusunan Rintek dan Pertek untuk Lingkungan', '\"[false]\"', 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-16 08:23:26', '2024-10-31 08:23:26'),
(310, 'Penyiraman area jalan pabrik yang berdebu', '\"[false]\"', 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-16 08:23:54', '2024-10-31 08:23:54'),
(313, 'Perbaikan dan Penambahan Item Fitur untuk Aplikasi Manajemen Report terkhusus untuk Divisi Produksi, adanya permintaan penambahan form item baru untuk di isi saat pembuatan laporan.', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,true]\"', 60, 'Bug Fixing dan Penambahan Item Fitur Awal.', 'SETUJU', 1, 41, 10, '2024-10-31 07:52:15', '2024-10-31 07:53:34'),
(318, 'Topik hangat yang menjadi konsen di safety', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:29:13', '2024-10-31 08:29:13'),
(319, 'Pembuatan rambu safety area kerja pabrik dan area lainnya', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:30:07', '2024-10-31 08:30:07'),
(320, 'Penanganan karyawan yang sakit ketika bekerja sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:30:38', '2024-10-31 08:30:38'),
(321, 'Penanganan karyawan yang mengalami kecelakaan kerja ketika bekerja sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:30:53', '2024-10-31 08:30:53'),
(322, 'Pengawasan dan penerbitan ijin kerja Ketinggian sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:31:16', '2024-10-31 08:31:16'),
(323, 'Pengawasan dan penerbitan ijin kerja Panas sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:33:14', '2024-10-31 08:33:14'),
(324, 'Pengawasan dan penerbitan ijin kerja Lifting Crane sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:34:02', '2024-10-31 08:34:02'),
(325, 'Pengawasan dan penerbitan ijin kerja Ruang Terbatas sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:34:24', '2024-10-31 08:34:24'),
(326, 'Pengawasan dan penerbitan ijin kerja Galian Tanah sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:35:14', '2024-10-31 08:35:14'),
(327, 'Pengawasan dan penerbitan ijin kerja Konstruksi sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:36:19', '2024-10-31 08:36:19'),
(328, 'Training safety induction sebanyak', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:36:44', '2024-10-31 08:36:44'),
(329, 'Penyusunan matery training', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:37:06', '2024-10-31 08:37:06'),
(330, 'Penyusunan Rintek dan Pertek untuk Lingkungan', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:37:28', '2024-10-31 08:37:28'),
(331, 'Penyiraman area jalan pabrik yang berdebu', NULL, 0, 'Pekerjaan Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:37:52', '2024-10-31 08:37:52'),
(332, 'Penyusunan jadwal kerja bulan Desember', NULL, 0, 'Rutin', 'PENDING', 17, 39, 11, '2024-11-23 08:38:33', '2024-10-31 08:38:33'),
(333, 'Perbaikan CCTV di Area 305', '\"[false,true,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 50, 'menunggu order cctv baru', 'PENDING', 1, 41, 11, '2024-11-01 08:39:26', '2024-10-31 08:39:26'),
(334, 'Training penggunaan APAR dan Basic Fire Fighting', NULL, 0, 'Setiap 6 Bulan', 'PENDING', 17, 39, 11, '2024-11-16 09:03:10', '2024-10-31 09:03:10'),
(335, 'Training pengenalan Hazard untuk Karyawan Baru dan PHL', '\"[false]\"', 0, 'Rutin 2 Mingguan', 'PENDING', 17, 39, 11, '2024-11-01 12:38:46', '2024-10-31 12:38:46'),
(337, 'Training pengenalan Hazard untuk Karyawan Baru dan PHL', '\"[false]\"', 0, 'Rutin 2 Mingguan', 'PENDING', 17, 39, 11, '2024-11-16 12:39:11', '2024-10-31 12:39:11'),
(338, 'Safety Talk untuk Maintenance Team', '\"[false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 0, 'Rutin Mingguan (Selasa)', 'PENDING', 17, 39, 11, '2024-11-01 09:18:36', '2024-10-31 09:18:36'),
(339, 'Safety Talk untuk Maintenance Team', '\"[false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false]\"', 0, 'Rutin Mingguan (Selasa)', 'PENDING', 17, 39, 11, '2024-11-09 09:15:35', '2024-10-31 09:15:35'),
(340, 'Safety Talk untuk Maintenance Team', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false,false,false,false,false,false,false,false]\"', 0, 'Rutin Mingguan (Selasa)', 'PENDING', 17, 39, 11, '2024-11-16 09:16:06', '2024-10-31 09:16:06'),
(341, 'Safety Talk untuk Maintenance Team', '\"[false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,true,false,false,false,false,false]\"', 0, 'Rutin Mingguan (Selasa)', 'PENDING', 17, 39, 11, '2024-11-23 09:16:27', '2024-10-31 09:16:27'),
(342, 'Perencanaan WPM', '\"[false]\"', 0, 'untuk semua karyawan', 'PENDING', 17, 38, 11, '2024-11-25 12:40:02', '2024-10-31 12:40:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login_nama` varchar(255) DEFAULT NULL,
  `login_username` varchar(255) DEFAULT NULL,
  `login_password` varchar(255) DEFAULT NULL,
  `login_no_karyawan` varchar(255) DEFAULT NULL,
  `login_email` varchar(255) DEFAULT NULL,
  `login_telepon` varchar(255) DEFAULT NULL,
  `login_token` text DEFAULT NULL,
  `login_level` varchar(255) DEFAULT NULL,
  `login_jabatan` varchar(255) DEFAULT NULL,
  `login_status` varchar(255) DEFAULT NULL,
  `divisi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `login_nama`, `login_username`, `login_password`, `login_no_karyawan`, `login_email`, `login_telepon`, `login_token`, `login_level`, `login_jabatan`, `login_status`, `divisi_id`, `created_at`, `updated_at`) VALUES
(4, 'Kantor Pusat Jakarta', 'kantorpusat', '$2y$12$f6DUJnseKwM7orJcY5iKp.1TI5ZL7DC68LXzt/rdA4UDKQT9/gonS', '448', 'kantorpusat@ecoasphalt.com', '08339393939', '$2y$12$vsVikwrNuRIqWtMbMsq7ReQCrSKnO0CsqbXQe67jgh4RpbM/RwZPu', 'ho', 'Staff Kantor Pusat', 'verified', 26, '2024-10-25 00:24:10', '2024-10-25 00:24:10'),
(5, 'Sudarman', 'KPA00128', '$2y$12$R3z9aPW31Bj2N2VX4G4oKOm5wwZGqiPSAtG5kt7hlvsroToHZNIIq', 'KPA00128', NULL, NULL, '$2y$12$9eEqfgbwRP1NU2IpKzADOuWYe60Hz0V0ojpBgTXOSDc67ZHh/CouK', 'pj', 'Manager Pabrik', 'verified', 10, '2024-10-25 00:24:11', '2024-10-25 00:24:11'),
(6, 'Ujang Jaenudin', 'KPA00153', '$2y$12$4iBmPI2n3tlOqc.JXsrGfuPDmv7bKMArzae2VEK.bp149Mq.f8siK', 'KPA00153', NULL, NULL, '$2y$12$7hi96hNVCeJxVj/xFSdpH.52zS6/F.PMlc.brRxWmOPWcar0N6Hta', 'sp', 'Super Attedant I', 'verified', 10, '2024-10-25 00:24:12', '2024-10-25 00:24:12'),
(7, 'Anang Nugroho', 'KPA00132', '$2y$12$BREpDDf7reqZkfvZWxvZpu2UsD42FEOWk.qiGu4Msf9PiRbnk745C', 'KPA00132', NULL, NULL, '$2y$12$EscYAZEYESzoZfb/NN76NeLE1Hj/BgQTs/Zi.lF7.0EI5u/Fy96hu', 'sp', 'SPV Daily', 'verified', 10, '2024-10-25 00:24:14', '2024-10-25 00:24:14'),
(8, 'Akhmad Maftukhin', 'KPA00154', '$2y$12$wN4SvrdTBQaxVDnZ8HBG2.kQA4xDzr/LUcqpP7PL.DNpP3GyPgOAa', 'KPA00154', NULL, NULL, '$2y$12$Q7yjN/cRUk90YMlgwIkWpOt3/wAggkimiCbT4KG9InwwObYmevkQ2', 'sp', 'SPV Grub A', 'verified', 10, '2024-10-25 00:24:15', '2024-10-25 00:24:15'),
(9, 'Muh.Habib Muhanny', 'KPA00165', '$2y$12$e8rPqg7HZI4N5p8O9Ml0s.osZeCY/F/KsRjgSiCsH2WtPINH4N0MS', 'KPA00165', NULL, NULL, '$2y$12$3aNgCmB5LPfPwFeoa0Q0puWNlAhmegPtPsWTmO0q6E9Uq8JlxtNGy', 'sp', 'SPV Grub B', 'verified', 10, '2024-10-25 00:24:16', '2024-10-25 00:24:16'),
(10, 'Tan Ayong', 'KPA00358', '$2y$12$ISzY4EqrPvEXhRBAo8SAQORfubAjh4txxGcX9V73rqs3vbCEWzOd6', 'KPA00358', NULL, NULL, '$2y$12$AH4eCOZM/74X1.h6RmUiO.0epoWYAZkalZ6jJcJTcmBstlMVaE1uK', 'sp', 'SPV Grub C', 'verified', 10, '2024-10-25 00:24:17', '2024-10-25 00:24:17'),
(11, 'Vacancy', 'KPA99999', '$2y$12$r4TR457kDN..LenJXiTbMuJ6Etmv9Hxzxo3Oxjhrmgjuo3dRfyfoO', 'KPA99999', NULL, NULL, '$2y$12$vsMhCLgusp.Omdz0UXdZBe93gLwTjzJhld8tWf3uth3BB29Sx63dO', 'sp', 'Super Attedant II', 'verified', 10, '2024-10-25 00:24:18', '2024-10-25 00:24:18'),
(12, 'Hikmayani', 'KPA01122', '$2y$12$nl6Dl.NWLJXLxeZ2k8XSXeJ5U9GGwvMBar0LlCP1i0tAxOQuAmF3m', 'KPA01122', NULL, NULL, '$2y$12$oklAxr.y0W2m1mS0vkUpA.HChX/sgYWKfyB.S5h6XLBoyf7yk9NLq', 'pj', 'Head Laboratory', 'verified', 25, '2024-10-25 00:24:19', '2024-10-25 00:24:19'),
(13, 'Fajarudin', 'KPA00077', '$2y$12$TRKvxVfr8juKUBJ74y8hreSyf17cQSe5S2cBMDBuQScX4/ddrNuOO', 'KPA00077', NULL, NULL, '$2y$12$QDSJB2.8hZ5D57lgplKi7uvA03QQUrDiwQ37Xa43KqgQhsICnpXwu', 'sp', 'Leader Grub A', 'verified', 25, '2024-10-25 00:24:20', '2024-10-25 00:24:20'),
(14, 'Lm.Raif Alfaizhar F.', 'KPA00185', '$2y$12$SKN4ZZPQy9mbdwYT4/hLyOreVPu8yP4bAw4p0qqsiSTPAba9/3I0y', 'KPA00185', NULL, NULL, '$2y$12$wSC1SJ1QhVnvWpbW5HluZO2V1sp9GaL1QAkQL0SRibI2LtAMlezIG', 'sp', 'Leader Grub B', 'verified', 25, '2024-10-25 00:24:22', '2024-10-25 00:24:22'),
(15, 'Agung Atmajaya', 'KPA00227', '$2y$12$7hwp9V.L6BAWdjrPQ6AEHOz3DyQaWOV4CxwtODsjjkI/QQ4sWrguW', 'KPA00227', NULL, NULL, '$2y$12$mMLiaAUFVn/Y3hC0odnQyOAq3SkIOydR1OBrx8WOQiQu3vFaGtSPe', 'sp', 'Leader Grub C', 'verified', 25, '2024-10-25 00:24:23', '2024-10-25 00:24:23'),
(16, 'Haryudi', 'KPA00213', '$2y$12$mPhl6cU886j2BUSVqwJhduP1s3RTp25Mrod9Ci/Gu11CluEdUZxfG', 'KPA00213', NULL, NULL, '$2y$12$axw0ROTFRKQ1lcNWhliFRe89h./NEB.ZG78M/ywaj18e4Wy8rOaOS', 'pj', 'Head Utillity', 'verified', 12, '2024-10-25 00:24:24', '2024-10-25 00:24:24'),
(17, 'Michael Doni T.H', 'KPA00022', '$2y$12$p45cWUUzkhWr0jJBprzTou.58IuJX.IWGDTYrzFPetaXVxoTnY0am', 'KPA00022', NULL, NULL, '$2y$12$UdndLnZZkYPwDPs908m6ruIzl3/UKvBHb0aOK4LPiYmzz4uQsHKG.', 'sp', 'Head Boiler', 'verified', 13, '2024-10-25 00:24:25', '2024-10-25 00:24:25'),
(18, 'La Tondi', 'KPA00157', '$2y$12$EppOJ/8U1Ct9wWVtEPh2u.BNmA5A4aU40UDsJwz18yBxVuN3queam', 'KPA00157', NULL, NULL, '$2y$12$PQBTjoqmTfY26hoxm1Oso.zMR3/tdqwzzUJwO7FeYnsZJco6XDDcK', 'sp', 'Leader Grub A', 'verified', 13, '2024-10-25 00:24:26', '2024-10-25 00:24:26'),
(19, 'La Dino', 'KPA00166', '$2y$12$n0nIz0Ich10jkv40RSglsOOEB6F/t3SVxT9qBkW8/YYmsaM2KNog2', 'KPA00166', NULL, NULL, '$2y$12$.dcXr5LY4ul3oXq.ioxVme6Nim0UFn7ERBc58CtSxr8rIp.EFKIEi', 'sp', 'Leader Grub B', 'verified', 13, '2024-10-25 00:24:27', '2024-10-25 00:24:27'),
(20, 'Agus Fatmanto', 'KPA00203', '$2y$12$is.SRYAzILKSq63WPVcK7OiG/H81JXH1e4H0usGmLHdlE/c/vD/FS', 'KPA00203', NULL, NULL, '$2y$12$SJqALSOqCEgZwVHaFQl3nOejAtJEDMsQxNCjQRrv24nRL0f1GZYKq', 'sp', 'Leader Grub C', 'verified', 13, '2024-10-25 00:24:28', '2024-10-25 00:24:28'),
(21, 'Fahrosiudin', 'KPA00342', '$2y$12$6YsQEs5sM1v4FGGP3VS13e9WWSYgCQPpp90uIPYb6hYNRNFDM7tEu', 'KPA00342', NULL, NULL, '$2y$12$stTU./utnbkm/BqNEzcQUetYuwhjuPJHcxgMIPB4txuO61sXzujaq', 'sp', 'Leader Grub D', 'verified', 13, '2024-10-25 00:24:30', '2024-10-25 00:24:30'),
(22, 'Rukman', 'KPA00125', '$2y$12$YDypsBgb6DmgTDNU7O6.3.BRT7xtwMccpnLNLcal5uhE1H2qAl.ye', 'KPA00125', NULL, NULL, '$2y$12$WKHvhJBqkHotIbwiO.XxmukKf0lIlIUkXgFp9r4wP/ryzBo5MCt3y', 'pj', 'Head Electic & Instrument', 'verified', 14, '2024-10-25 00:24:31', '2024-10-25 00:24:31'),
(23, 'Frans Denny Manurung', 'KPA00023', '$2y$12$R4d4qyPlVnbHaNH9XlSEnuyd2rMB2tJg0PM7CaKD2QZfMpp0h1LDy', 'KPA00023', NULL, NULL, '$2y$12$eOSg64GeBWbyG1ve4clfzujY.JrROz12ytmcAeNtx4gRSw7MVsqy6', 'pj', 'Head Mekanik & Pabrikasi', 'verified', 15, '2024-10-25 00:24:32', '2024-10-25 00:24:32'),
(24, 'Suminta', 'KPA00064', '$2y$12$Eu0vs6DX1X9FM1euzlKH0uKkOsyeZ66HwzkV8Cdy.S9h8raCXPgl6', 'KPA00064', NULL, NULL, '$2y$12$YmCSewEGjo2XaLP4eoIXcus5SeR3WJ6mpIwsT9iNBSTK/p1dC0uc.', 'sp', 'Supervisor Pabrikasi', 'verified', 16, '2024-10-25 00:24:33', '2024-10-25 00:24:33'),
(25, 'Jimmy Khustin Chandra', 'KPA00005', '$2y$12$/obznzkeA2SIq7dP4C9ZkON3DzESP8nyCkB9M8pjKJ.ESog8dsaum', 'KPA00005', NULL, NULL, '$2y$12$deFlyRKTY9zikLQu/P.lxe0Xv17rBikirEVjic6LpLEeqowIOj6Wq', 'pj', 'PJ Gudang & Admin', 'verified', 8, '2024-10-25 00:24:34', '2024-10-25 00:24:34'),
(26, 'Suharni', 'KPA00238', '$2y$12$YXRhPuLAF.2HVwjzFgiP4eunSLtjgWSTn72C8vfsdtsWDM9dh.51G', 'KPA00238', NULL, NULL, '$2y$12$N8k.Z2KiG/GNIVjMhMkBq.W8.L.aPwAWWHogO50IrnjuzGBmu4.hi', 'sp', 'Admin Umum', 'verified', 5, '2024-10-25 00:24:35', '2024-10-25 00:24:35'),
(27, 'Irma Wati', 'KPA00243', '$2y$12$KAeyWhaPhVY/Yv0E8aX.I.mPePTw9WujUvlZG/NX0haSpW5T115lW', 'KPA00243', NULL, NULL, '$2y$12$t/Cv5PVjkf6inaaW77J4f.a9jXq7qu.QknMAonSlDExVtBVguCc4u', 'sp', 'Finance', 'verified', 3, '2024-10-25 00:24:36', '2024-10-25 00:24:36'),
(28, 'Sarfin Ardi', 'KPA00220', '$2y$12$Sc0ND7Q/DBrGy5Xjtap7geiyNa1rHpjcysbNAq1full13b7XyztCS', 'KPA00220', NULL, NULL, '$2y$12$wHuWp.cbqnEybYYdH5JqMedA2GzO81zGFAqaMQcRqJy2UyROzoVt.', 'sp', 'Quality Control Bahan Baku/Timbangan', 'verified', 7, '2024-10-25 00:24:37', '2024-10-25 00:24:37'),
(29, 'Andri Sepriadi', 'KPA00054', '$2y$12$ZHeiQqYTDpg8LvoVdTq/0eUHhijN6s/b8mpdiILiYFUmXYCd7YMia', 'KPA00054', NULL, NULL, '$2y$12$O4V.feODbany1YqKFNcaEuZXO48Kqt05AUWbe9IV2vwP6MQakZ0dG', 'pj', 'Head Purchasing', 'verified', 4, '2024-10-25 00:24:38', '2024-10-25 00:24:38'),
(30, 'Basuki', 'KPA00012', '$2y$12$Ngx4vnbQIzQ5a992csKwBOlKOUdnonDECeaNX3WdkL8YI4krqVowO', 'KPA00012', NULL, NULL, '$2y$12$7a0E.YU3KW5GDYkFVbbswOSuGU/C/2UnIMKEv/BV.0TExcO4ox2oy', 'pj', 'Kepala Gudang', 'verified', 21, '2024-10-25 00:24:39', '2024-10-25 00:24:39'),
(31, 'Tri Hartanto', 'KPA00053', '$2y$12$/X0HJkdA75ZZv4zDhnwSn.TvZTLOL0Cv11cMscEvvbEHNlh/1MRWu', 'KPA00053', NULL, NULL, '$2y$12$fSA2JXoRcGch7s/.ku9HgOH7/YwBpWENgm2BWpjc75X3qB0nYcCf6', 'pj', 'Kepala Workshop dan Alat Berat', 'verified', 6, '2024-10-25 00:24:41', '2024-10-25 00:24:41'),
(32, 'Rosmawati', 'KPA00322', '$2y$12$RcU5pmTymrrZclZ5UoXXk.6e7mKkhUscmZghta/UTHSafPUDy4s4e', 'KPA00322', NULL, NULL, '$2y$12$vKgOTBrT0szBKemSt.1B2uZIipYraYCdSAtU6b6CnhDOPsByrVTb.', 'sp', 'Translator', 'verified', 24, '2024-10-25 00:24:42', '2024-10-25 00:24:42'),
(33, 'Erta Hermawan', 'KPA00190', '$2y$12$yRlt3u4MdGvNpPAqHwdHHuqQ0MeeFTjUimkrW/KaY5uOm8Xep2K9C', 'KPA00190', NULL, NULL, '$2y$12$VS9YT0lFnlMd.fis50xwJeqz/CQ/61jYKTXT2ddBoWz7oaiGJpBqO', 'pj', 'Arsitek Sipil', 'verified', 22, '2024-10-25 00:24:44', '2024-10-25 00:24:44'),
(34, 'Hendri Ahmad Z.', 'KPA00388', '$2y$12$3KX7tCgrDt.sDQBe/uMPVeG3OQ0KZ6CO8fq0jqb.rjMDi09QY77Fi', 'KPA00388', NULL, NULL, '$2y$12$OmljPhqPU3piVpbQaEDN0ep4LdZ4QyJDwU8ihy3GL.o0MXpCYzQB6', 'sp', 'Logistik', 'verified', 23, '2024-10-25 00:24:45', '2024-10-25 00:24:45'),
(35, 'Andi S.Ginting', 'KPA00152', '$2y$12$4/kACHCm0/H3pZT/f7zC5.zIS2qYJTOmGVEymyIaTIPIqkjHkyqOm', 'KPA00152', NULL, NULL, '$2y$12$XgBASpfwpuv.pu4A5mmtbOxHWgSZUzP72P30SQer904qtG7HMN/NW', 'pj', 'Human Capital & GA', 'verified', 2, '2024-10-25 00:24:46', '2024-10-25 00:24:46'),
(36, 'La Ode Amyn Nadjin', 'KPA00007', '$2y$12$rqGuNKxu5.cmNf2R122fDOfJ492oZFNg67PKgMYrNM9jm2nmA4hU.', 'KPA00007', NULL, NULL, '$2y$12$yzy1pemdmhaA2D4ZCmFWw.0tuR3667uM/EmlI04LwH/kmu7HJwWUC', 'sp', 'HRD', 'verified', 2, '2024-10-25 00:24:47', '2024-10-25 00:24:47'),
(37, 'Sri Titi Wahyu Ningsi', 'KPA00135', '$2y$12$6nHjWq2b3LvZZQpnMl75auLPTZa86p0BA8Q0jtIgyLmFGvbFXwX8W', 'KPA00135', NULL, NULL, '$2y$12$xJM0hXopx1GMmVFtsFurCewq.WvUycdPPzw53snzBEPFolkI7PmBW', 'sp', 'HRD', 'verified', 2, '2024-10-25 00:24:49', '2024-10-25 00:24:49'),
(38, 'Jarot Priyono', 'KPA00126', '$2y$12$8mStU1MVltIiqYHcTbLg4e1vtn2A4ULeUzVhV/q0d6rNRo4s08jIu', 'KPA00126', NULL, NULL, '$2y$12$a.B3/nznSv.8HrHsDtftwOGcbFWZNBO3Zra/X3/NgbpHECHMjmjF2', 'pj', 'Manager HSE', 'verified', 17, '2024-10-25 00:24:50', '2024-10-25 00:24:50'),
(39, 'Trisnawati Rawu', 'KPA00008', '$2y$12$PtOioMOj85yuliYM.FRMLeiv0g5DRI4wLmfeMA3021V2Etdb3Khni', 'KPA00008', NULL, NULL, '$2y$12$fUQZ1gGGesbmv9YlHrs9qOXNq768bUkj26dxKj/Ra1UeyihZkAcD6', 'sp', 'HSE', 'verified', 17, '2024-10-25 00:24:51', '2024-10-25 00:24:51'),
(40, 'Wahyu Nur Susilo', 'KPA00122', '$2y$12$WVbk8VMpvqn7ccNvhDr.n.Sl.6OgnkN2l8xWo.3c5hpJHzIlxwyUG', 'KPA00122', NULL, NULL, '$2y$12$hvApcFjxA.KOSL6AmF0jKOOdg3ZTNZWFLjjRzadDp8ChuPafgU0b.', 'pj', 'Manager IT', 'verified', 1, '2024-10-25 00:24:52', '2024-10-31 05:18:40'),
(41, 'Muh.Fathurrahman', 'KPA00324', '$2y$12$I0y8wJnboTE/5bJhq43qEeT/5vj5EHxNmHKPsge3.Lj7Ga0fOwoPy', 'KPA00324', NULL, NULL, '$2y$12$YsRUIKYlrUEvx0MDI/2WOegiEMuPIW1G6IEzEg94sbzRKhT.Gcv/G', 'sp', 'IT', 'verified', 1, '2024-10-25 00:24:53', '2024-10-30 05:40:16'),
(42, 'Sutrisno', 'KPA00017', '$2y$12$YUo4aSMh.JDh.e6JGOArC.NakR9xWDbYNLQ8j8nGfHRaBoPwpsA0e', 'KPA00017', NULL, NULL, '$2y$12$gS.7KmBPHeYIHM7CLP9w.ejznGMGBKAOa2IzM9rWZPLxUk8/Z3OWC', 'pj', 'Maintenance Office', 'verified', 19, '2024-10-25 00:24:55', '2024-10-25 00:24:55'),
(43, 'Yuli Supamrih', 'KPA00025', '$2y$12$4anxxDyGbIRtYHM5LxKJUOldYC6m3vfg0pZpJjo7pEwFiJl238r.a', 'KPA00025', NULL, NULL, '$2y$12$20l0U9rUNXp9zplhInU1bOu/w5wu.Tl8b9571yCAyNI3BjzicxaA2', 'pj', 'Head Housekeeping', 'verified', 18, '2024-10-25 00:24:56', '2024-10-25 00:24:56'),
(44, 'Buntoro', 'KPA00034', '$2y$12$P//L1okIOTf5kTXsaXkk3ucNfscx84dUMG7kJjqboJjIOd171DtSy', 'KPA00034', NULL, NULL, '$2y$12$aeVszHx/jL8KFF9OCwwu1e3Le5ZN1LEf3p4Wrp1I9ms6Y5/ZaxKVe', 'pj', 'Head Security', 'verified', 20, '2024-10-25 00:24:57', '2024-10-25 00:24:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_27_024630_create_divisis_table', 1),
(5, '2024_09_27_024648_create_logins_table', 1),
(6, '2024_10_09_004902_create_periodes_table', 1),
(7, '2024_10_09_004913_create_laporans_table', 1),
(8, '2024_10_18_093558_create_folders_table', 1),
(9, '2024_10_18_093602_create_files_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode_bulan_int` int(11) DEFAULT NULL,
  `periode_tahun` varchar(255) DEFAULT NULL,
  `periode_bulan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id`, `periode_bulan_int`, `periode_tahun`, `periode_bulan`, `created_at`, `updated_at`) VALUES
(1, 1, '2024', 'Januari', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(2, 2, '2024', 'Februari', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(3, 3, '2024', 'Maret', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(4, 4, '2024', 'April', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(5, 5, '2024', 'Mei', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(6, 6, '2024', 'Juni', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(7, 7, '2024', 'Juli', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(8, 8, '2024', 'Agustus', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(9, 9, '2024', 'September', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(10, 10, '2024', 'Oktober', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(11, 11, '2024', 'November', '2024-10-25 00:24:04', '2024-10-25 00:24:04'),
(12, 12, '2024', 'Desember', '2024-10-25 00:24:04', '2024-10-25 00:24:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_folder_id_foreign` (`folder_id`),
  ADD KEY `file_login_id_foreign` (`login_id`);

--
-- Indeks untuk tabel `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folder_divisi_id_foreign` (`divisi_id`),
  ADD KEY `folder_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_divisi_id_foreign` (`divisi_id`),
  ADD KEY `laporan_login_id_foreign` (`login_id`),
  ADD KEY `laporan_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_login_username_unique` (`login_username`),
  ADD UNIQUE KEY `login_login_email_unique` (`login_email`),
  ADD KEY `login_divisi_id_foreign` (`divisi_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `folder`
--
ALTER TABLE `folder`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_folder_id_foreign` FOREIGN KEY (`folder_id`) REFERENCES `folder` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `file_login_id_foreign` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `folder`
--
ALTER TABLE `folder`
  ADD CONSTRAINT `folder_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `folder_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_login_id_foreign` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
