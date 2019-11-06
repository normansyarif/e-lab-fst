-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 06, 2019 at 02:13 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elabfstu_elab`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id`, `kode`, `nama`, `id_kategori`, `created_at`, `updated_at`) VALUES
(1, 'A001', 'Gelas Piala 2000 ml', 1, '2019-10-08 15:47:17', '2019-10-08 15:47:17'),
(2, 'A002', 'Gelas Piala 1000 ml', 1, '2019-10-08 15:48:57', '2019-10-08 15:48:57'),
(3, 'A003', 'Gelas Piala 800 ml', 1, '2019-10-08 15:49:21', '2019-10-08 15:49:21'),
(4, 'A004', 'Gelas Piala 500 ml', 1, '2019-10-08 15:49:40', '2019-10-08 15:49:40'),
(5, 'A005', 'Gelas Ukur 500 ml', 1, '2019-10-08 15:49:59', '2019-10-08 15:49:59'),
(6, 'A006', 'Gelas Ukur 50 ml', 1, '2019-10-08 15:50:15', '2019-10-08 15:50:15'),
(7, 'A007', 'Gelas Ukur 10 ml', 1, '2019-10-08 15:50:35', '2019-10-08 15:50:35'),
(8, 'A008', 'Erlenmeyer 500 ml (A)', 1, '2019-10-08 15:50:54', '2019-10-08 15:51:06'),
(9, 'A009', 'Erlenmeyer 100 ml', 1, '2019-10-08 15:51:45', '2019-10-08 15:51:45'),
(10, 'A010', 'Bunsen 100 ml', 1, '2019-10-08 15:52:06', '2019-10-08 15:52:06'),
(11, 'A010', 'Sentrifuga', 1, '2019-10-08 15:52:28', '2019-10-08 15:52:28'),
(12, 'A012', 'Labu Didih alas bulat', 1, '2019-10-08 15:52:45', '2019-10-08 15:52:45'),
(13, 'A013', 'Kaca Arloji 7,5 cm', 1, '2019-10-08 15:53:13', '2019-10-08 15:53:13'),
(14, 'A014', 'Botol kok ttp kaca', 1, '2019-10-08 15:53:28', '2019-10-08 15:53:28'),
(15, 'A016', 'Labu Florent', 1, '2019-10-08 15:53:48', '2019-10-08 15:53:48'),
(16, 'A017', 'Penjepit Tabung reaksi', 1, '2019-10-08 15:54:03', '2019-10-08 15:54:03'),
(17, 'A018', 'Tabung Racun api', 1, '2019-10-08 15:54:15', '2019-10-08 15:54:15'),
(18, 'A019', 'Soxlet Tanpa labu', 1, '2019-10-08 15:54:30', '2019-10-08 15:54:30'),
(19, 'A020', 'Desikator', 1, '2019-10-08 15:54:45', '2019-10-08 15:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `alat_keluar`
--

CREATE TABLE `alat_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dari` int(11) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alat_masuk`
--

CREATE TABLE `alat_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alat_masuk`
--

INSERT INTO `alat_masuk` (`id`, `id_user`, `id_alat`, `jumlah`, `tanggal_masuk`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 2, '2019-10-10', '2019-10-10 08:12:18', '2019-10-10 08:12:18'),
(2, 4, 1, 3, '2019-10-10', '2019-10-10 08:13:37', '2019-10-10 08:13:37'),
(3, 3, 1, 2, '2019-10-10', '2019-10-10 08:44:45', '2019-10-10 08:44:45'),
(4, 3, 1, 3, '2019-10-10', '2019-10-10 08:45:33', '2019-10-10 08:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formula` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_molekul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `kode`, `nama`, `formula`, `berat_molekul`, `id_jenis`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'B001', 'Amm. Nitrat', 'NH4NO3', '80.04', 1, '-', '2019-10-08 15:56:08', '2019-10-08 15:56:08'),
(2, 'B002', 'Amm. Acetat', 'CH3COONH4', '77.08', 1, '-', '2019-10-08 15:57:05', '2019-10-08 15:57:05'),
(3, 'B003', 'Amm. Oxalat', '(COONH4)2H2O', '142.11', 1, '-', '2019-10-08 15:58:55', '2019-10-08 15:58:55'),
(4, 'B004', 'Alumunium', 'Al', '26.98', 1, '-', '2019-10-08 15:59:25', '2019-10-08 15:59:25'),
(5, 'B005', 'Alumunium Hydroksida', 'Al(OH)3', '78.00', 1, '-', '2019-10-08 15:59:54', '2019-10-08 15:59:54'),
(6, 'B006', 'Antimon (III)', 'SB2O3', '291.50', 5, '-', '2019-10-08 16:00:25', '2019-10-08 16:01:02'),
(7, 'B007', 'Ammonium Flourid', 'NH4F', '37.04', 5, '-', '2019-10-08 16:00:55', '2019-10-08 16:00:55'),
(8, 'B008', 'Arsen (III) Oxid', 'As2O3', '197.04', 5, '-', '2019-10-08 16:01:32', '2019-10-08 16:01:32'),
(9, 'b009', 'Calsium Carbonat', 'CaCO2', '100.09', 5, '-', '2019-10-08 16:01:59', '2019-10-08 16:01:59'),
(10, 'B010', 'Creatin (Monohydrat)', 'C4H6N3O4H20', '149.15', 3, '-', '2019-10-08 16:02:42', '2019-10-08 16:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_keluar`
--

CREATE TABLE `bahan_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dari` int(11) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bahan_masuk`
--

CREATE TABLE `bahan_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan_masuk`
--

INSERT INTO `bahan_masuk` (`id`, `id_user`, `id_bahan`, `jumlah`, `tanggal_masuk`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 30, '2019-10-10 00:00:00', '2019-10-10 08:45:02', '2019-10-10 08:45:02'),
(2, 3, 1, 30, '2019-10-17 00:00:00', '2019-10-10 08:46:50', '2019-10-10 08:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE `distribusi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_asal` int(11) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `total_jumlah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `surat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distribusi`
--

INSERT INTO `distribusi` (`id`, `id_asal`, `id_tujuan`, `total_jumlah`, `status`, `created_at`, `updated_at`, `surat`) VALUES
(2, 3, 5, '1 alat, 1 bahan', 2, '2019-10-10 09:03:27', '2019-10-10 09:03:50', 'surat (3)_1570698230.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `distribusi_alat`
--

CREATE TABLE `distribusi_alat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_distribusi` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distribusi_alat`
--

INSERT INTO `distribusi_alat` (`id`, `id_distribusi`, `id_alat`, `jumlah`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 3, '2019-10-10 09:03:27', '2019-10-10 09:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `distribusi_bahan`
--

CREATE TABLE `distribusi_bahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_distribusi` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distribusi_bahan`
--

INSERT INTO `distribusi_bahan` (`id`, `id_distribusi`, `id_bahan`, `jumlah`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 3, '2019-10-10 09:03:27', '2019-10-10 09:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Zat padat', NULL, '2019-10-04 03:30:29'),
(2, 'Zat cair', NULL, '2019-10-04 03:30:23'),
(3, 'Biokimia', '2019-10-04 03:30:36', '2019-10-04 03:30:36'),
(4, 'Indikator', '2019-10-04 03:30:47', '2019-10-04 03:30:47'),
(5, 'Bahan beracun (toxid)', '2019-10-04 03:31:01', '2019-10-04 03:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Kategori 1 (gelas)', NULL, '2019-10-04 03:24:45'),
(2, 'Kategori 2 (instrumen)', NULL, '2019-10-04 03:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` int(11) NOT NULL,
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `tipe`, `kode`, `nama`, `lokasi`, `deskripsi`, `created_at`, `updated_at`) VALUES
(0, 0, 'DEKAN', 'Dekanat', '-', '-', NULL, NULL),
(1, 3, 'GOD', 'Administrator', '-', '-', NULL, NULL),
(3, 1, 'G01', 'Gudang Kimia', '-', '-', NULL, '2019-10-10 05:51:29'),
(4, 1, 'G02', 'Gudang Farmasi', '-', '-', NULL, NULL),
(5, 2, 'L01', 'Lab. Lingkungan & Geokimia', '-', '-', '2019-08-09 01:56:07', '2019-08-09 01:56:07'),
(6, 2, 'L02', 'Lab. Rekayasa & Material 1', '-', '-', '2019-08-09 01:59:42', '2019-08-09 01:59:42'),
(7, 2, 'L03', 'Lab. Rekayasa & Material 2', '-', '-', '2019-08-09 03:51:13', '2019-08-09 03:51:13'),
(9, 2, 'L04', 'Lab. Argoindustri & Tanaman Obat', '-', '-', '2019-10-08 06:02:52', '2019-10-08 06:02:52'),
(10, 2, 'L05', 'Lab. Bioteknologi & Rekayasa 1', '-', '-', NULL, NULL),
(11, 2, 'L06', 'Lab. Bioteknologi & Rekayasa 2', '-', '-', NULL, NULL),
(12, 2, 'L08', 'Lab. TA & Penelitian', '-', '-', NULL, NULL),
(13, 2, 'L08', 'Lab. OPTIK', '-', '-', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_09_003614_rename_email_to_user_number', 2),
(4, '2019_08_09_003821_add_role_to_users', 2),
(5, '2019_08_09_083448_create_alat_table', 3),
(6, '2019_08_09_083503_create_bahan_table', 3),
(7, '2019_08_09_083541_create_stok_bahan_table', 3),
(8, '2019_08_09_083550_create_stok_alat_table', 3),
(9, '2019_08_09_083716_create_lokasi_table', 3),
(10, '2019_08_09_083754_create_jenis_table', 3),
(11, '2019_08_09_083805_create_kategori_table', 3),
(12, '2019_08_09_084341_add_owner_to_lokasi', 4),
(13, '2019_08_09_085056_add_type_to_lokasi', 5),
(14, '2019_08_09_103331_add_lokasi_to_stok_alat', 6),
(15, '2019_08_09_103340_add_lokasi_to_stok_bahan', 6),
(16, '2019_08_09_104745_remove_type_in_lokasi', 7),
(17, '2019_08_09_105206_create_gudang_table', 8),
(18, '2019_08_09_105554_add_lokasi_to_gudang', 9),
(19, '2019_09_02_114529_create_alat_masuk_table', 10),
(20, '2019_09_02_140232_create_bahan_masuk_table', 11),
(21, '2019_09_02_154905_create_distribusi_table', 12),
(22, '2019_09_02_163805_add_surat_to_distribusi', 13),
(23, '2019_09_02_163930_add_surat_kosong_to_distribusi', 14),
(24, '2019_09_02_164027_remove_surat_kosong_from_distribusi', 15),
(25, '2019_09_02_165109_create_distribusi_alat', 16),
(26, '2019_09_02_165121_create_distribusi_bahan', 16),
(27, '2019_09_03_080740_create_pengajuan_table', 17),
(28, '2019_09_03_080753_create_pengajuan_bahan_table', 17),
(29, '2019_09_03_080801_create_pengajuan_alat_table', 17),
(30, '2019_09_03_090840_add_pesan_to_distribusi', 18),
(31, '2019_09_03_093216_add_pesan_to_pengajuan', 19),
(32, '2019_09_03_093357_remove_pesan_from_distribusi', 19),
(33, '2019_09_04_080907_create_alat_keluar_table', 20),
(34, '2019_09_04_080918_create_bahan_keluar_table', 20),
(35, '2019_10_08_123955_create_role_table', 21),
(36, '2019_10_08_153650_create_stok_alat_baik_table', 22),
(37, '2019_10_08_153657_create_stok_alat_buruk_table', 22),
(38, '2019_10_08_153707_create_stok_bahan_baik_table', 22),
(39, '2019_10_08_153713_create_stok_bahan_buruk_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengaju` int(11) NOT NULL,
  `id_teraju` int(11) NOT NULL,
  `jenis_ajuan` tinyint(4) NOT NULL,
  `jumlah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `surat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pesan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `id_pengaju`, `id_teraju`, `jenis_ajuan`, `jumlah`, `status`, `surat`, `created_at`, `updated_at`, `pesan`) VALUES
(3, 3, 0, 1, '1 alat, 1 bahan', 5, NULL, '2019-10-10 08:10:17', '2019-10-10 08:10:17', 'Pengajuan diteruskan ke dekanat.'),
(5, 5, 3, 1, '0 alat, 1 bahan', 5, 'surat (3)_1570698526.pdf', '2019-10-10 09:08:38', '2019-10-10 09:08:46', 'Item diambil dari '),
(6, 5, 3, 1, '1 alat, 0 bahan', 6, NULL, '2019-10-10 09:08:38', '2019-10-10 09:08:38', 'tidak punya'),
(7, 5, 3, 1, '1 alat, 0 bahan', 1, NULL, '2019-10-10 10:28:46', '2019-10-10 10:28:46', 'Menunggu konfirmasi gudang');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_alat`
--

CREATE TABLE `pengajuan_alat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan_alat`
--

INSERT INTO `pengajuan_alat` (`id`, `id_pengajuan`, `id_alat`, `jumlah`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 10, '2019-10-10 08:10:17', '2019-10-10 08:10:17'),
(5, 6, 1, 6, '2019-10-10 09:08:38', '2019-10-10 09:08:38'),
(6, 7, 1, 4, '2019-10-10 10:28:46', '2019-10-10 10:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_bahan`
--

CREATE TABLE `pengajuan_bahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan_bahan`
--

INSERT INTO `pengajuan_bahan` (`id`, `id_pengajuan`, `id_bahan`, `jumlah`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 5, '2019-10-10 08:10:17', '2019-10-10 08:10:17'),
(5, 5, 1, 10, '2019-10-10 09:08:38', '2019-10-10 09:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  `jabatan` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `user_id`, `lokasi_id`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, '2019-10-10 05:36:10', '0000-00-00 00:00:00'),
(3, 1, 3, 2, '2019-10-10 05:36:10', '0000-00-00 00:00:00'),
(4, 2, 4, 2, '2019-10-10 05:36:10', '0000-00-00 00:00:00'),
(5, 3, 5, 2, '2019-10-10 05:36:10', '0000-00-00 00:00:00'),
(6, 5, 6, 2, '2019-10-10 05:36:10', '0000-00-00 00:00:00'),
(7, 6, 7, 2, '2019-10-10 05:36:10', '0000-00-00 00:00:00'),
(8, 7, 9, 2, '2019-10-10 05:36:10', '0000-00-00 00:00:00'),
(9, 8, 10, 2, '2019-10-10 05:36:10', '0000-00-00 00:00:00'),
(10, 9, 11, 2, '2019-10-10 05:36:10', '0000-00-00 00:00:00'),
(11, 10, 12, 2, '2019-10-10 05:36:10', '0000-00-00 00:00:00'),
(13, 11, 13, 2, '2019-10-10 05:37:04', '2019-10-10 05:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `stok_alat`
--

CREATE TABLE `stok_alat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `buruk` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lokasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok_alat`
--

INSERT INTO `stok_alat` (`id`, `id_pemilik`, `id_alat`, `baik`, `buruk`, `stok`, `created_at`, `updated_at`, `lokasi`) VALUES
(6, 3, 1, 5, 2, 7, '2019-10-10 08:24:02', '2019-10-10 09:03:50', NULL),
(7, 3, 3, 5, 2, 7, '2019-10-10 08:24:21', '2019-10-10 08:24:21', NULL),
(8, 4, 5, 20, 3, 23, '2019-10-10 08:32:23', '2019-10-10 08:32:23', NULL),
(9, 4, 7, 12, 0, 12, '2019-10-10 08:32:33', '2019-10-10 08:32:33', NULL),
(10, 5, 1, 3, 0, 3, '2019-10-10 09:03:50', '2019-10-10 09:03:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stok_alat_baik`
--

CREATE TABLE `stok_alat_baik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stok_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok_alat_baik`
--

INSERT INTO `stok_alat_baik` (`id`, `stok_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(6, 6, 1, '2019-10-10 08:24:02', '2019-10-10 08:24:02'),
(7, 7, 3, '2019-10-10 08:24:21', '2019-10-10 08:24:21'),
(8, 8, 11, '2019-10-10 08:32:23', '2019-10-10 08:32:23'),
(9, 9, 6, '2019-10-10 08:32:33', '2019-10-10 08:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `stok_alat_buruk`
--

CREATE TABLE `stok_alat_buruk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stok_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok_alat_buruk`
--

INSERT INTO `stok_alat_buruk` (`id`, `stok_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(5, 6, 2, '2019-10-10 08:24:02', '2019-10-10 08:24:02'),
(6, 7, 4, '2019-10-10 08:24:21', '2019-10-10 08:24:21'),
(7, 8, 12, '2019-10-10 08:32:23', '2019-10-10 08:32:23'),
(8, 9, 6, '2019-10-10 08:32:33', '2019-10-10 08:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `stok_bahan`
--

CREATE TABLE `stok_bahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `buruk` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lokasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok_bahan`
--

INSERT INTO `stok_bahan` (`id`, `id_pemilik`, `id_bahan`, `baik`, `buruk`, `stok`, `created_at`, `updated_at`, `lokasi`) VALUES
(3, 3, 1, 33, 6, 29, '2019-10-10 08:08:26', '2019-10-10 09:08:46', NULL),
(4, 5, 1, 3, 0, 13, '2019-10-10 09:03:50', '2019-10-10 09:08:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stok_bahan_baik`
--

CREATE TABLE `stok_bahan_baik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stok_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok_bahan_baik`
--

INSERT INTO `stok_bahan_baik` (`id`, `stok_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(2, 3, 35, '2019-10-10 08:08:26', '2019-10-10 08:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `stok_bahan_buruk`
--

CREATE TABLE `stok_bahan_buruk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stok_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok_bahan_buruk`
--

INSERT INTO `stok_bahan_buruk` (`id`, `stok_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(2, 3, 5, '2019-10-10 08:08:26', '2019-10-10 08:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','2','3','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_password_update` datetime DEFAULT NULL,
  `harus_ganti_password` int(11) DEFAULT NULL,
  `token_reset_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_api_token` datetime DEFAULT NULL,
  `telegram_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_no`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `usertype`, `status`, `last_password_update`, `harus_ganti_password`, `token_reset_password`, `api_token`, `expire_api_token`, `telegram_id`) VALUES
(1, 'IR. S B SAMAD', '11', NULL, '$2y$10$Yi8vPM.zcGIP2/U087Qhl.F0QOFdhASFlvRlm6SeuhrA/NVnw.Nvy', NULL, '2019-08-08 17:27:27', '2019-10-08 15:42:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'KUSAIRI', '12', NULL, '$2y$10$Yi8vPM.zcGIP2/U087Qhl.F0QOFdhASFlvRlm6SeuhrA/NVnw.Nvy', NULL, '2019-08-08 18:17:33', '2019-10-08 15:42:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'TRI SARTIKA AYU, S.Pd', '21', NULL, '$2y$10$Yi8vPM.zcGIP2/U087Qhl.F0QOFdhASFlvRlm6SeuhrA/NVnw.Nvy', NULL, '2019-08-08 18:18:31', '2019-10-08 15:42:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Ir. VINY SUWITA, M.Sc.', '00', NULL, '$2y$10$Yi8vPM.zcGIP2/U087Qhl.F0QOFdhASFlvRlm6SeuhrA/NVnw.Nvy', NULL, NULL, '2019-10-08 15:42:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Dr. Ir. IRIANTO, M.P.', '22', NULL, '$2y$10$Yi8vPM.zcGIP2/U087Qhl.F0QOFdhASFlvRlm6SeuhrA/NVnw.Nvy', NULL, '2019-09-24 09:58:23', '2019-10-08 15:41:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Ir. MUKHSIN, M.P.', '23', NULL, '$2y$10$Yi8vPM.zcGIP2/U087Qhl.F0QOFdhASFlvRlm6SeuhrA/NVnw.Nvy', NULL, '2019-10-08 06:10:50', '2019-10-08 15:42:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'IR. PERMEDY', '24', NULL, '$2y$10$Yi8vPM.zcGIP2/U087Qhl.F0QOFdhASFlvRlm6SeuhrA/NVnw.Nvy', NULL, '2019-10-08 15:41:58', '2019-10-08 15:42:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'DRS. SJAHRIL ZAWIR', '25', NULL, '$2y$10$Yi8vPM.zcGIP2/U087Qhl.F0QOFdhASFlvRlm6SeuhrA/NVnw.Nvy', NULL, '2019-10-08 15:43:34', '2019-10-08 15:43:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Ir INDRA SULAKSANA, M.Si', '26', NULL, '$2y$10$Yi8vPM.zcGIP2/U087Qhl.F0QOFdhASFlvRlm6SeuhrA/NVnw.Nvy', NULL, '2019-10-08 15:43:45', '2019-10-08 15:43:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Dr. Ir. ELIYANTI, M.Si.', '27', NULL, '$2y$10$Yi8vPM.zcGIP2/U087Qhl.F0QOFdhASFlvRlm6SeuhrA/NVnw.Nvy', NULL, '2019-10-08 15:44:02', '2019-10-08 15:44:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Ir. NITA CHRYSANTI SAMAD', '28', NULL, '$2y$10$Yi8vPM.zcGIP2/U087Qhl.F0QOFdhASFlvRlm6SeuhrA/NVnw.Nvy', NULL, '2019-10-08 15:44:11', '2019-10-08 15:44:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alat_keluar`
--
ALTER TABLE `alat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alat_masuk`
--
ALTER TABLE `alat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahan_keluar`
--
ALTER TABLE `bahan_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahan_masuk`
--
ALTER TABLE `bahan_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribusi_alat`
--
ALTER TABLE `distribusi_alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribusi_bahan`
--
ALTER TABLE `distribusi_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_alat`
--
ALTER TABLE `pengajuan_alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_bahan`
--
ALTER TABLE `pengajuan_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_alat`
--
ALTER TABLE `stok_alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_alat_baik`
--
ALTER TABLE `stok_alat_baik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_alat_buruk`
--
ALTER TABLE `stok_alat_buruk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_bahan`
--
ALTER TABLE `stok_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_bahan_baik`
--
ALTER TABLE `stok_bahan_baik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_bahan_buruk`
--
ALTER TABLE `stok_bahan_buruk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`user_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `alat_keluar`
--
ALTER TABLE `alat_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alat_masuk`
--
ALTER TABLE `alat_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bahan_keluar`
--
ALTER TABLE `bahan_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bahan_masuk`
--
ALTER TABLE `bahan_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distribusi_alat`
--
ALTER TABLE `distribusi_alat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distribusi_bahan`
--
ALTER TABLE `distribusi_bahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengajuan_alat`
--
ALTER TABLE `pengajuan_alat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengajuan_bahan`
--
ALTER TABLE `pengajuan_bahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stok_alat`
--
ALTER TABLE `stok_alat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stok_alat_baik`
--
ALTER TABLE `stok_alat_baik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stok_alat_buruk`
--
ALTER TABLE `stok_alat_buruk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stok_bahan`
--
ALTER TABLE `stok_bahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stok_bahan_baik`
--
ALTER TABLE `stok_bahan_baik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stok_bahan_buruk`
--
ALTER TABLE `stok_bahan_buruk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
