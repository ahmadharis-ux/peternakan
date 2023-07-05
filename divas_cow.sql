-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2023 at 12:57 PM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `divas_cow`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_perusahaans`
--

CREATE TABLE `data_perusahaans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_perusahaans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debits`
--

CREATE TABLE `debits` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kas` bigint UNSIGNED NOT NULL,
  `id_jurnal` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `id_pihak_kedua` bigint UNSIGNED NOT NULL,
  `nominal` int UNSIGNED NOT NULL DEFAULT '0',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunas` tinyint(1) NOT NULL DEFAULT '0',
  `tenggat` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemakaian_pakans`
--

CREATE TABLE `detail_pemakaian_pakans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pemakaian_pakan` bigint UNSIGNED NOT NULL,
  `id_stok_pakan` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED DEFAULT NULL,
  `subtotal` int UNSIGNED NOT NULL,
  `qty` int UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian_pakans`
--

CREATE TABLE `detail_pembelian_pakans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pembelian_pakan` bigint UNSIGNED NOT NULL,
  `id_pakan` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED DEFAULT NULL,
  `id_satuan_pakan` bigint UNSIGNED NOT NULL,
  `harga` int UNSIGNED NOT NULL DEFAULT '0',
  `qty` int UNSIGNED NOT NULL DEFAULT '0',
  `subtotal` int UNSIGNED NOT NULL DEFAULT '0',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian_sapis`
--

CREATE TABLE `detail_pembelian_sapis` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pembelian_sapi` bigint UNSIGNED NOT NULL,
  `id_jenis_sapi` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED DEFAULT NULL,
  `eartag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('jantan','betina') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int UNSIGNED NOT NULL DEFAULT '0',
  `harga` bigint UNSIGNED NOT NULL DEFAULT '0',
  `kiloan` tinyint(1) NOT NULL DEFAULT '0',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan_sapis`
--

CREATE TABLE `detail_penjualan_sapis` (
  `id` bigint UNSIGNED NOT NULL,
  `id_penjualan_sapi` bigint UNSIGNED NOT NULL,
  `id_sapi` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED DEFAULT NULL,
  `bobot` int UNSIGNED NOT NULL DEFAULT '0',
  `harga` bigint UNSIGNED NOT NULL DEFAULT '0',
  `kiloan` tinyint(1) NOT NULL DEFAULT '0',
  `tanggal_pengambilan` datetime DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fakturs`
--

CREATE TABLE `fakturs` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_faktur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `id_pihak_kedua` bigint UNSIGNED NOT NULL,
  `id_kredit` bigint UNSIGNED DEFAULT NULL,
  `id_debit` bigint UNSIGNED DEFAULT NULL,
  `subjek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sapis`
--

CREATE TABLE `jenis_sapis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_sapis`
--

INSERT INTO `jenis_sapis` (`id`, `nama`, `id_author`, `created_at`, `updated_at`) VALUES
(1, 'Limosin', 1, NULL, NULL),
(2, 'Madura', 3, NULL, NULL),
(3, 'dermen', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurnals`
--

CREATE TABLE `jurnals` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kode_jurnal` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurnals`
--

INSERT INTO `jurnals` (`id`, `nama`, `id_kode_jurnal`, `id_author`, `created_at`, `updated_at`) VALUES
(1, 'Hutang', 1, 2, '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(2, 'Piutang', 1, 2, '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(3, 'Pakan', 3, 2, '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(4, 'Gaji', 2, 2, '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(5, 'Tabungan', 3, 2, '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(6, 'Prive', 3, 3, '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(7, 'Amd', 1, 1, '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(8, 'Operasional', 3, 1, '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(9, 'Servis Mobil', 2, 2, '2023-06-27 11:35:35', '2023-06-27 11:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id` bigint UNSIGNED NOT NULL,
  `is_kredit` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kode_jurnals`
--

CREATE TABLE `kode_jurnals` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kode_jurnals`
--

INSERT INTO `kode_jurnals` (`id`, `kode`, `keterangan`, `id_author`, `created_at`, `updated_at`) VALUES
(1, 'AB', NULL, 1, NULL, NULL),
(2, 'CD', NULL, 2, NULL, NULL),
(3, 'EF', NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kredits`
--

CREATE TABLE `kredits` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kas` bigint UNSIGNED NOT NULL,
  `id_jurnal` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `id_pihak_kedua` bigint UNSIGNED NOT NULL,
  `nominal` int UNSIGNED NOT NULL DEFAULT '0',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adm` int UNSIGNED NOT NULL DEFAULT '0',
  `lunas` tinyint(1) NOT NULL DEFAULT '0',
  `tenggat` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `markup_sapis`
--

CREATE TABLE `markup_sapis` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pemakaian_pakan` bigint UNSIGNED NOT NULL,
  `id_sapi` bigint UNSIGNED NOT NULL,
  `markup` int UNSIGNED NOT NULL,
  `markup_pembulatan` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masuk_tabungans`
--

CREATE TABLE `masuk_tabungans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `nominal` int UNSIGNED NOT NULL DEFAULT '0',
  `id_rekening` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_02_13_014151_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_05_10_135643_create_rekening_table', 1),
(8, '2023_05_10_140946_create_masuk_tabungan_table', 1),
(9, '2023_05_10_143615_create_jenis_sapi_table', 1),
(10, '2023_05_10_145524_create_sapi_table', 1),
(11, '2023_05_10_151031_create_table_kas', 1),
(12, '2023_05_10_151032_create_riwayat_bobot_sapi_table', 1),
(13, '2023_05_10_172540_create_kode_jurnal_table', 1),
(14, '2023_05_10_172644_create_jurnal_table', 1),
(15, '2023_05_10_172938_create_debit_table', 1),
(16, '2023_05_10_173656_create_kredit_table', 1),
(17, '2023_05_11_053707_create_penjualan_sapi_table', 1),
(18, '2023_05_11_053830_create_detail_penjualan_sapi', 1),
(19, '2023_05_11_054253_create_pembelian_sapi_table', 1),
(20, '2023_05_11_054522_create_detail_pembelian_sapi_table', 1),
(21, '2023_05_11_060223_create_operasional_pembelian_sapi_table', 1),
(22, '2023_05_11_060911_create_data_perusahaan_table', 1),
(23, '2023_05_11_071016_create_pakan_table', 1),
(24, '2023_05_11_071334_create_satuan_pakan_table', 1),
(25, '2023_05_11_071453_create_stok_pakans_table', 1),
(26, '2023_05_11_072922_create_pembelian_pakan_table', 1),
(27, '2023_05_11_073052_create_operasional_pembelian_pakan', 1),
(28, '2023_05_11_073452_create_detail_pembelian_pakan', 1),
(29, '2023_05_11_074418_create_pemakaian_pakan', 1),
(30, '2023_05_11_084042_create_detail_pemakaian_pakan', 1),
(31, '2023_05_11_084740_create_transaksi_kredit_table', 1),
(32, '2023_05_11_085103_create_transaksi_debit_table', 1),
(33, '2023_05_20_085130_create_operasional_penjualan_sapi_table', 1),
(34, '2023_05_28_145249_create_markup_sapis_table', 1),
(35, '2023_06_14_070310_create_fakturs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operasional_pembelian_pakans`
--

CREATE TABLE `operasional_pembelian_pakans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pembelian_pakan` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED DEFAULT NULL,
  `harga` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operasional_pembelian_sapis`
--

CREATE TABLE `operasional_pembelian_sapis` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pembelian_sapi` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED DEFAULT NULL,
  `harga` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operasional_penjualan_sapis`
--

CREATE TABLE `operasional_penjualan_sapis` (
  `id` bigint UNSIGNED NOT NULL,
  `id_penjualan_sapi` bigint UNSIGNED NOT NULL,
  `harga` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pakans`
--

CREATE TABLE `pakans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pakans`
--

INSERT INTO `pakans` (`id`, `nama`, `id_author`, `created_at`, `updated_at`) VALUES
(1, 'Ampas bir', 1, NULL, NULL),
(2, 'Jerami', 1, NULL, NULL),
(3, 'Kanibal', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemakaian_pakans`
--

CREATE TABLE `pemakaian_pakans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `id_pekerja` bigint UNSIGNED NOT NULL,
  `total_pengeluaran` int UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_pakans`
--

CREATE TABLE `pembelian_pakans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `id_kredit` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_sapis`
--

CREATE TABLE `pembelian_sapis` (
  `id` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `id_kredit` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_sapis`
--

CREATE TABLE `penjualan_sapis` (
  `id` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `id_debit` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekenings`
--

CREATE TABLE `rekenings` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_rekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED DEFAULT NULL,
  `atas_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` bigint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekenings`
--

INSERT INTO `rekenings` (`id`, `nomor_rekening`, `id_user`, `id_author`, `atas_nama`, `bank`, `saldo`, `created_at`, `updated_at`) VALUES
(1, '323353235', 2, NULL, 'Aiman Witjaksono', 'BCA', 100000000, '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(2, '67890', 3, NULL, 'Andi Odang', 'BRI', 100000000, '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(3, '---', 3, NULL, 'CASH', '---', 100000000, '2023-06-27 11:35:35', '2023-06-27 11:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_bobot_sapis`
--

CREATE TABLE `riwayat_bobot_sapis` (
  `id` bigint UNSIGNED NOT NULL,
  `id_jenis_sapi` bigint UNSIGNED NOT NULL,
  `bobot` smallint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Owner', '2023-06-27 11:35:30', '2023-06-27 11:35:30'),
(2, 'Admin', '2023-06-27 11:35:31', '2023-06-27 11:35:31'),
(3, 'Accounting', '2023-06-27 11:35:31', '2023-06-27 11:35:31'),
(4, 'Supplier pakan', '2023-06-27 11:35:31', '2023-06-27 11:35:31'),
(5, 'Supplier sapi', '2023-06-27 11:35:31', '2023-06-27 11:35:31'),
(6, 'Customer', '2023-06-27 11:35:31', '2023-06-27 11:35:31'),
(7, 'Pekerja', '2023-06-27 11:35:31', '2023-06-27 11:35:31'),
(8, 'User', '2023-06-27 11:35:31', '2023-06-27 11:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `sapis`
--

CREATE TABLE `sapis` (
  `id` bigint UNSIGNED NOT NULL,
  `id_jenis_sapi` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED DEFAULT NULL,
  `eartag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_pokok` int UNSIGNED NOT NULL,
  `bobot` smallint UNSIGNED NOT NULL,
  `harga_kiloan` int UNSIGNED DEFAULT NULL,
  `harga_ekor` int UNSIGNED DEFAULT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ADA','DIBELI','SOLD') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ADA',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('jantan','betina') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sapis`
--

INSERT INTO `sapis` (`id`, `id_jenis_sapi`, `id_author`, `eartag`, `harga_pokok`, `bobot`, `harga_kiloan`, `harga_ekor`, `kondisi`, `status`, `keterangan`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '7af', 1891, 321, NULL, NULL, 'Sehat', 'ADA', NULL, 'jantan', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(2, 2, NULL, '8f1', 3329, 343, NULL, NULL, 'Sehat', 'ADA', NULL, 'jantan', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(3, 1, NULL, 'b0a', 3547, 366, NULL, NULL, 'Mati', 'ADA', NULL, 'betina', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(4, 3, NULL, '759', 3589, 379, NULL, NULL, 'Gila', 'ADA', NULL, 'betina', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(5, 2, NULL, '4a6', 2344, 395, NULL, NULL, 'Hidup', 'ADA', NULL, 'betina', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(6, 2, NULL, '0c4', 4446, 300, NULL, NULL, 'Mati', 'ADA', NULL, 'betina', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(7, 3, NULL, '67e', 2069, 301, NULL, NULL, 'Mati', 'ADA', NULL, 'betina', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(8, 1, NULL, 'b8c', 3781, 399, NULL, NULL, 'Gila', 'ADA', NULL, 'betina', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(9, 3, NULL, '1ef', 2510, 376, NULL, NULL, 'Hidup', 'ADA', NULL, 'jantan', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(10, 2, NULL, '93b', 3829, 399, NULL, NULL, 'Gila', 'ADA', NULL, 'jantan', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(11, 3, NULL, '838', 3216, 319, NULL, NULL, 'Sehat', 'ADA', NULL, 'betina', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(12, 3, NULL, 'aa3', 2224, 361, NULL, NULL, 'Mati', 'ADA', NULL, 'jantan', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(13, 3, NULL, 'a4d', 1770, 398, NULL, NULL, 'Sehat', 'ADA', NULL, 'betina', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(14, 2, NULL, 'e8d', 4566, 338, NULL, NULL, 'Gila', 'ADA', NULL, 'betina', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(15, 3, NULL, 'b64', 1031, 326, NULL, NULL, 'Hidup', 'ADA', NULL, 'betina', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(16, 3, NULL, 'd93', 2944, 368, NULL, NULL, 'Gila', 'ADA', NULL, 'jantan', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(17, 1, NULL, 'f3d', 3813, 385, NULL, NULL, 'Sehat', 'ADA', NULL, 'betina', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(18, 2, NULL, 'a02', 3110, 330, NULL, NULL, 'Sehat', 'ADA', NULL, 'jantan', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(19, 1, NULL, '295', 4713, 366, NULL, NULL, 'Gila', 'ADA', NULL, 'betina', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(20, 1, NULL, '531', 4110, 332, NULL, NULL, 'Mati', 'ADA', NULL, 'betina', '2023-06-27 11:35:35', '2023-06-27 11:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `satuan_pakans`
--

CREATE TABLE `satuan_pakans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_author` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan_pakans`
--

INSERT INTO `satuan_pakans` (`id`, `nama`, `id_author`, `created_at`, `updated_at`) VALUES
(1, 'kg', NULL, NULL, NULL),
(2, 'ikat', NULL, NULL, NULL),
(3, 'karung', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stok_pakans`
--

CREATE TABLE `stok_pakans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pakan` bigint UNSIGNED NOT NULL,
  `id_satuan_pakan` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED DEFAULT NULL,
  `harga` int UNSIGNED NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_debits`
--

CREATE TABLE `transaksi_debits` (
  `id` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `id_pihak_kedua` bigint UNSIGNED NOT NULL,
  `id_debit` bigint UNSIGNED NOT NULL,
  `id_rekening` bigint UNSIGNED NOT NULL,
  `nominal` int UNSIGNED NOT NULL DEFAULT '0',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_kredits`
--

CREATE TABLE `transaksi_kredits` (
  `id` bigint UNSIGNED NOT NULL,
  `id_author` bigint UNSIGNED NOT NULL,
  `id_pihak_kedua` bigint UNSIGNED NOT NULL,
  `id_kredit` bigint UNSIGNED NOT NULL,
  `id_rekening` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal` int UNSIGNED NOT NULL DEFAULT '0',
  `adm` int UNSIGNED DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_depan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` bigint UNSIGNED NOT NULL DEFAULT '8',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ttd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_depan`, `nama_belakang`, `id_role`, `email`, `password`, `alamat`, `telepon`, `foto_ttd`, `foto_profil`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'admin', 2, 'admin@gmail.com', '$2y$10$ZQi8zciQ49vUdeRGpDgsye1TEZlYsCvd2Sc2oFvDqjrxXDWyY4x.S', NULL, NULL, NULL, NULL, '2023-06-27 11:35:31', 'Adn9Hb0XXV', '2023-06-27 11:35:31', '2023-06-27 11:35:31'),
(2, 'test', 'owner', 1, 'owner@gmail.com', '$2y$10$ta0iVDSH24bmUIDlLglrQO4QS6.ZW.Wy5Ya2FSMqUQVTO.ySFHEf2', NULL, NULL, NULL, NULL, '2023-06-27 11:35:31', 'alb67w6DzL', '2023-06-27 11:35:31', '2023-06-27 11:35:31'),
(3, 'test', 'accounting', 3, 'accounting@gmail.com', '$2y$10$K5SsP9678GQEABSDbwYZ7.GD6wxAJVe.frdNgitLGU9/ZApH/zLyC', NULL, NULL, 'public/foto_ttd/UfWy9xE62D6OAyIb4BAJ3Qvl0Muy8h8qZsIVek8F.jpg', 'public/foto_profil/IpZmg4fj7kVs7JMaMGCrjmg5FGHUCUUjwKCyMRrP.jpg', '2023-06-27 11:35:31', '1puAF5UgzP8qG2ijyYT2FSDYyflElDHRqLWRahN5Op8opXwnMyoqPCU7MNXI', '2023-06-27 11:35:31', '2023-06-28 12:42:48'),
(4, 'Virman', 'Safitri', 2, 'usamah.cager@example.org', '$2y$10$er/4xCTJ05jtvGQmsrSmNO44qSy6/NHIYix4fpKe7iz0AgfaTLXe.', NULL, '(+62) 718 3551 635', NULL, NULL, '2023-06-27 11:35:31', 'ZodBCPytZ0', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(5, 'Anita', 'Haryanti', 8, 'oagustina@example.net', '$2y$10$SWQwAqJYRqWgOvuM5o.vYeRbOW9fzWIJLNb2AUWq3j00wc9XtnPea', NULL, '0486 4338 0267', NULL, NULL, '2023-06-27 11:35:31', 'jHARZWBUZg', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(6, 'Tantri', 'Purwanti', 5, 'fpangestu@example.org', '$2y$10$kZI8aK1FtpFH/FAj4kj.vedfDJkUCYgENquL1vemPl3CbRlf/xcwS', NULL, '0938 6948 2978', NULL, NULL, '2023-06-27 11:35:31', 'Ei3WeMAl2D', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(7, 'Ira', 'Saptono', 2, 'bjanuar@example.org', '$2y$10$LN5fTW7X08.RbXYyvxIVk.J2pTjHBAVw/KMy5knslvsUE8d1r1exm', NULL, '(+62) 502 8437 2011', NULL, NULL, '2023-06-27 11:35:31', 'Qlt1giXiwj', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(8, 'Maimunah', 'Wulandari', 4, 'saragih.sabar@example.org', '$2y$10$o754snOUHBYOKuYykFL4OOF7f3SKNuYuPewCiidJ0SXNs1NXXIJ2C', NULL, '(+62) 304 6587 8290', NULL, NULL, '2023-06-27 11:35:31', '5RSJAQogBC', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(9, 'Caraka', 'Lailasari', 6, 'yosef.wulandari@example.org', '$2y$10$nk4fKXhnfP8rcez5dJefIuRCzTb6gj2ZOf4yJjc8XHO9FkHAv/aDq', NULL, '(+62) 723 3919 8147', NULL, NULL, '2023-06-27 11:35:31', 'gz9A8f1iNj', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(10, 'Fitriani', 'Setiawan', 4, 'adikara15@example.net', '$2y$10$p7nVByXz0ZfKHCKf1hBSK.ugmI.5tH44ucty3YecFFtcqmm0yrhKu', NULL, '(+62) 840 402 409', NULL, NULL, '2023-06-27 11:35:31', 'zJNyl6rNig', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(11, 'Ian', 'Mardhiyah', 2, 'jsihombing@example.org', '$2y$10$YdDonl4Ah/GTOD0lAmV1suYidEUisofTpGSwvAsS36usXUAFxWxFa', NULL, '0960 3173 388', NULL, NULL, '2023-06-27 11:35:31', 'WsAg9qctCn', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(12, 'Kasiyah', 'Widiastuti', 6, 'lazuardi.patricia@example.net', '$2y$10$SPpVgYs/EKrgTqmI5r2EC.2HYrr2VJeKO9E30LmoWqIAGJuImySQm', NULL, '(+62) 326 7136 6741', NULL, NULL, '2023-06-27 11:35:31', 'pDfhF72zkf', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(13, 'Jaswadi', 'Nasyidah', 1, 'oman.sitompul@example.org', '$2y$10$MH6ZSvpnH6z4/.cl.EktCOMVpya8RH4zgbzozS7JjGBZ/AwB8duNe', NULL, '0658 1036 4838', NULL, NULL, '2023-06-27 11:35:32', '5Losh2pron', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(14, 'Paulin', 'Safitri', 4, 'suryono.cinta@example.com', '$2y$10$xaGrZ1SaCP4bLNeMjkY4Kuh5gRtwHzDOWbQ3zsUUKpbQwF5G50eoq', NULL, '(+62) 472 7370 761', NULL, NULL, '2023-06-27 11:35:32', 'vPxUMnB1JV', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(15, 'Kuncara', 'Mandasari', 8, 'atmaja.halimah@example.net', '$2y$10$chgODzdALdsFnp1.roczCOpG8tplphoxiM4EaPLwchdghChkqpKcK', NULL, '(+62) 399 8993 216', NULL, NULL, '2023-06-27 11:35:32', 'I5LpDaCegg', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(16, 'Wulan', 'Wahyuni', 4, 'salwa.saefullah@example.net', '$2y$10$0r8lCssNRF/GlgOgweFiKuBiTvMlWJhZws2GV5Gm13icIzB/jhdYO', NULL, '021 2604 117', NULL, NULL, '2023-06-27 11:35:32', 'pUhJc5LqfI', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(17, 'Bakda', 'Saputra', 8, 'maryati.muni@example.net', '$2y$10$q/ulURD4b3stJHwXuCC5veK7a.6rMFWF.P4t0GrkQG49Sfj3JoXry', NULL, '(+62) 226 6282 9200', NULL, NULL, '2023-06-27 11:35:32', '3rMB2rjS1T', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(18, 'Sabrina', 'Sudiati', 4, 'mustofa.emong@example.org', '$2y$10$s09CDuTiJ8rcC3DZWmNAFO61MiQAgRM3YmCP85gR8W3Qp1YlCotA6', NULL, '0826 5135 9794', NULL, NULL, '2023-06-27 11:35:32', 'WqTJ7pouwF', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(19, 'Langgeng', 'Agustina', 5, 'manah74@example.com', '$2y$10$W25i0NZHPxaVkFbexSbuQ.4gO7MLg47r7aJXN/81tMZmyMTsXieTS', NULL, '(+62) 690 6370 8775', NULL, NULL, '2023-06-27 11:35:32', 'ewH8WCQw1c', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(20, 'Rahmi', 'Saragih', 6, 'slaksmiwati@example.net', '$2y$10$ALzkRWFYzWqLW7cvb2CHU.kj61z20yn8GxIYTkQ8TGXgc7mK/Kavq', NULL, '(+62) 936 5866 5426', NULL, NULL, '2023-06-27 11:35:32', 'pDVP6tt5Kn', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(21, 'Michelle', 'Manullang', 8, 'simbolon.purwa@example.net', '$2y$10$9B9S3Z48u7cjjgn1YRLIMe400gMiRjG/3ycd14JIgcvEZTSrh0Oia', NULL, '0357 5543 927', NULL, NULL, '2023-06-27 11:35:32', 'lKbQM2eEMi', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(22, 'Kawaca', 'Widiastuti', 2, 'kemba01@example.com', '$2y$10$K8ObQ9EBdGCaC5JFIWK5JepkZCeeyT/Y1O3KuDVsrUTu9d.Va2TAe', NULL, '(+62) 921 5409 0276', NULL, NULL, '2023-06-27 11:35:32', '8w6iYXRBwZ', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(23, 'Kamal', 'Wijayanti', 1, 'aisyah.sirait@example.net', '$2y$10$65ORdYYZ5sOXW/1Ly6QAdOcGHH9GrCpymUP2ahEUFo46uRWVqRaYa', NULL, '0851 4869 215', NULL, NULL, '2023-06-27 11:35:32', 'fKcdVMLd4z', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(24, 'customer', '1', 6, 'customer1@gmail.com', '$2y$10$tNWOloJG1uqx17w2mnsXVeUfflgzDLyRWaLtSlBQAilfTEh/zN7UW', NULL, NULL, NULL, NULL, '2023-06-27 11:35:32', 'UBoGQGqk9J', '2023-06-27 11:35:32', '2023-06-27 11:35:32'),
(25, 'customer', '2', 6, 'customer2@gmail.com', '$2y$10$XHIB7OemvCmQr4.q/bQ2tujB6Pu7kpQVBNwaCMXqbpjZm86NP1CxC', NULL, NULL, NULL, NULL, '2023-06-27 11:35:32', 'BIbw4HhyqV', '2023-06-27 11:35:33', '2023-06-27 11:35:33'),
(26, 'customer', '3', 6, 'customer3@gmail.com', '$2y$10$tAz0zm/Zu2xYbRhg5GuVIeXLf53sB88i0ONKflRSPSmVvL3yjQ3Bu', NULL, NULL, NULL, NULL, '2023-06-27 11:35:33', 'mUpqVzSesU', '2023-06-27 11:35:33', '2023-06-27 11:35:33'),
(27, 'customer', '4', 6, 'customer4@gmail.com', '$2y$10$NQy2eAjykzq66WrLR3H3AOQFcItdIPDyWsv7QhLBww99WMDFb/T7.', NULL, NULL, NULL, NULL, '2023-06-27 11:35:33', 'bWFDPeSTDD', '2023-06-27 11:35:33', '2023-06-27 11:35:33'),
(28, 'customer', '5', 6, 'customer5@gmail.com', '$2y$10$Nyl1I8.D/AJiyrIDC6Lhhuh8geTfSvyLgiCoVTsXMPIYnISV8xMGy', NULL, NULL, NULL, NULL, '2023-06-27 11:35:33', 'EqLGxAznrr', '2023-06-27 11:35:33', '2023-06-27 11:35:33'),
(29, 'customer', '6', 6, 'customer6@gmail.com', '$2y$10$EcKytzu7E3ttUagvGNwRg.CdJk08ByaWoVhL0ZgA2/R3aFBj5r/Ki', NULL, NULL, NULL, NULL, '2023-06-27 11:35:33', '89efqA84Ne', '2023-06-27 11:35:33', '2023-06-27 11:35:33'),
(30, 'customer', '7', 6, 'customer7@gmail.com', '$2y$10$.IhKS2bo5t1JGqgeFBNBp.PG4qcB2EEkQOsEzNCaxQxOy9LuSeaAC', NULL, NULL, NULL, NULL, '2023-06-27 11:35:33', 'fq8scqdolX', '2023-06-27 11:35:33', '2023-06-27 11:35:33'),
(31, 'customer', '8', 6, 'customer8@gmail.com', '$2y$10$2SoT9qP00C1muMHqxaTFOuk7JVBTrR8MZKo7s55UhoBV.O.m1PoZW', NULL, NULL, NULL, NULL, '2023-06-27 11:35:33', 'HmrTv4kHmP', '2023-06-27 11:35:33', '2023-06-27 11:35:33'),
(32, 'customer', '9', 6, 'customer9@gmail.com', '$2y$10$0MOSW2Ki2SCncYYcvxY1AeaB7i7xHMGbXzA2oeIbbGQEglgA3Yl3e', NULL, NULL, NULL, NULL, '2023-06-27 11:35:33', 'qQ5RATzAUo', '2023-06-27 11:35:33', '2023-06-27 11:35:33'),
(33, 'customer', '10', 6, 'customer10@gmail.com', '$2y$10$KEeFvXRBJSURAyH23ZowIu6XOIe571pdC.J659KsfZ315nHlq.spS', NULL, NULL, NULL, NULL, '2023-06-27 11:35:33', 'hM3yKW4rY4', '2023-06-27 11:35:33', '2023-06-27 11:35:33'),
(34, 'customer', '11', 6, 'customer11@gmail.com', '$2y$10$vynz.M7bhMdc3Dw94kaqLeWxGTKPxdHe2LdkOGPT1BOOgR96RI47q', NULL, NULL, NULL, NULL, '2023-06-27 11:35:33', 'JTgE78F91l', '2023-06-27 11:35:33', '2023-06-27 11:35:33'),
(35, 'customer', '12', 6, 'customer12@gmail.com', '$2y$10$RHNOfD36xATNWhdB4bKmfOg3SQWvpY8vuNHYK5l3.pBjfZDpRKljK', NULL, NULL, NULL, NULL, '2023-06-27 11:35:33', 'OJSfRrTWff', '2023-06-27 11:35:33', '2023-06-27 11:35:33'),
(36, 'customer', '13', 6, 'customer13@gmail.com', '$2y$10$wprgenUnpvptXCqdMBr10u9bBtvkNtBIMOLl5SSyPt9ChSDPqcbgi', NULL, NULL, NULL, NULL, '2023-06-27 11:35:33', 'nNou5g2l60', '2023-06-27 11:35:34', '2023-06-27 11:35:34'),
(37, 'customer', '14', 6, 'customer14@gmail.com', '$2y$10$E2Ewf7P8OoI8FKcj1jrJ7uw.Ym/P3oCL.sD6isHd9HZHA.i3a2PXa', NULL, NULL, NULL, NULL, '2023-06-27 11:35:34', 'ZctrmMbOUL', '2023-06-27 11:35:34', '2023-06-27 11:35:34'),
(38, 'customer', '15', 6, 'customer15@gmail.com', '$2y$10$zbw1HzMP3XdkNz5DMyCehOSQAB0pfvauUGvlrsatxXTeBohp7G9Ey', NULL, NULL, NULL, NULL, '2023-06-27 11:35:34', 'vzPWu6i6zU', '2023-06-27 11:35:34', '2023-06-27 11:35:34'),
(39, 'customer', '16', 6, 'customer16@gmail.com', '$2y$10$t.a8a0OszI6Zdw7KxP/1d.zO1DbaeIstsJtN6S6aiCyek9WBvHpdq', NULL, NULL, NULL, NULL, '2023-06-27 11:35:34', 'nGB44YiOk9', '2023-06-27 11:35:34', '2023-06-27 11:35:34'),
(40, 'customer', '17', 6, 'customer17@gmail.com', '$2y$10$C397xO8DTfuVhBZidwMGCOxv0EU6Z170ZXTac3jnQUVv9bqOpv/Ym', NULL, NULL, NULL, NULL, '2023-06-27 11:35:34', 'kOGYYkGNjT', '2023-06-27 11:35:34', '2023-06-27 11:35:34'),
(41, 'customer', '18', 6, 'customer18@gmail.com', '$2y$10$c31M5.jAomcSRubRcsxACeO3XguzIhxLoCL8sXd1PwzJimFZ/.vRS', NULL, NULL, NULL, NULL, '2023-06-27 11:35:34', 'TLohENDcRW', '2023-06-27 11:35:34', '2023-06-27 11:35:34'),
(42, 'customer', '19', 6, 'customer19@gmail.com', '$2y$10$VfA3SHyrlY4.id3CyVGSHuno1dEaRcwrpcKM0zi4prVNZsYtdroOm', NULL, NULL, NULL, NULL, '2023-06-27 11:35:34', '79GtAcexwS', '2023-06-27 11:35:34', '2023-06-27 11:35:34'),
(43, 'customer', '20', 6, 'customer20@gmail.com', '$2y$10$85o/B4RhxJ39DbtPsWkVreFEXf9qz5Nc7PtIgb5dYgBGxS3alo45G', NULL, NULL, NULL, NULL, '2023-06-27 11:35:34', 'kfbDlZptLZ', '2023-06-27 11:35:34', '2023-06-27 11:35:34'),
(44, 'ssapi', '1', 5, 'supplier_sapi1@gmail.com', '$2y$10$W.TcnEbwkZElO6tBS1UwW.EMtoRnoQkjLcnBUzokuq6PwT6/a214y', NULL, NULL, NULL, NULL, '2023-06-27 11:35:34', 'U31ZjeuStF', '2023-06-27 11:35:34', '2023-06-27 11:35:34'),
(45, 'ssapi', '2', 5, 'supplier_sapi2@gmail.com', '$2y$10$VM7PfwBaquV8bqQa73DmauBSDV4skR5qqTRNeBlaFtF3UGJkNn4VG', NULL, NULL, NULL, NULL, '2023-06-27 11:35:34', 'Fly0b76Wcj', '2023-06-27 11:35:34', '2023-06-27 11:35:34'),
(46, 'ssapi', '3', 5, 'supplier_sapi3@gmail.com', '$2y$10$eXZaNVM8eyVOquu8m.jGN.32VTfSu9XiMmmfc9ygHOndhQOBsaYMS', NULL, NULL, NULL, NULL, '2023-06-27 11:35:34', 'zcQGVCGbJE', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(47, 'ssapi', '4', 5, 'supplier_sapi4@gmail.com', '$2y$10$RKABxTS18ypazXkM9S0VV.gRvlUTx56NGWi1tLaCNdngP5GH/NBXO', NULL, NULL, NULL, NULL, '2023-06-27 11:35:35', 'iZnmx1oMFB', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(48, 'ssapi', '5', 5, 'supplier_sapi5@gmail.com', '$2y$10$8.xa6MtKbhWIV7wXUKVtIu69TiDkq5mTG4fxBQJ1CGPqQCxAD0.yS', NULL, NULL, NULL, NULL, '2023-06-27 11:35:35', 'd68U2phvUq', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(49, 'spakan', '1', 4, 'supplier_pakan1@gmail.com', '$2y$10$Znw1vtZ862Y/Z/swOp0TzerapH6q/YQq/SPsa.IjSejm57EWzg0Fm', NULL, NULL, NULL, NULL, '2023-06-27 11:35:35', 'To4nY1Za7E', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(50, 'spakan', '2', 4, 'supplier_pakan2@gmail.com', '$2y$10$9v7WcXSwN1vTwvkaOrPZd.tYmCn6EXpav9/G0c9MwA4fBgB.vUX4C', NULL, NULL, NULL, NULL, '2023-06-27 11:35:35', 'C3QDG3d7aK', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(51, 'spakan', '3', 4, 'supplier_pakan3@gmail.com', '$2y$10$kVlXd1mgpzYEmRHQnr74heYvP3vc3xLIrfVDQSg3iCY7l23mOW1S6', NULL, NULL, NULL, NULL, '2023-06-27 11:35:35', 'JIZedFChuU', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(52, 'spakan', '4', 4, 'supplier_pakan4@gmail.com', '$2y$10$fx7oBtKJKT8MclkNLB5Nh.91NAliFOWGWgNDnqZT3ny6U99yPxpBW', NULL, NULL, NULL, NULL, '2023-06-27 11:35:35', 'AKX0kdxjVP', '2023-06-27 11:35:35', '2023-06-27 11:35:35'),
(53, 'spakan', '5', 4, 'supplier_pakan5@gmail.com', '$2y$10$C6CGX9BYMXRyBj.mK8nv1Oyu0tFVUtwNDEIlUNSJ3/rzjNvmUU0MW', NULL, NULL, NULL, NULL, '2023-06-27 11:35:35', 'ist5d78mXx', '2023-06-27 11:35:35', '2023-06-27 11:35:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_perusahaans`
--
ALTER TABLE `data_perusahaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debits`
--
ALTER TABLE `debits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `debits_id_kas_foreign` (`id_kas`),
  ADD KEY `debits_id_jurnal_foreign` (`id_jurnal`),
  ADD KEY `debits_id_author_foreign` (`id_author`),
  ADD KEY `debits_id_pihak_kedua_foreign` (`id_pihak_kedua`);

--
-- Indexes for table `detail_pemakaian_pakans`
--
ALTER TABLE `detail_pemakaian_pakans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pemakaian_pakans_id_pemakaian_pakan_foreign` (`id_pemakaian_pakan`),
  ADD KEY `detail_pemakaian_pakans_id_stok_pakan_foreign` (`id_stok_pakan`),
  ADD KEY `detail_pemakaian_pakans_id_author_foreign` (`id_author`);

--
-- Indexes for table `detail_pembelian_pakans`
--
ALTER TABLE `detail_pembelian_pakans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pembelian_pakans_id_pembelian_pakan_foreign` (`id_pembelian_pakan`),
  ADD KEY `detail_pembelian_pakans_id_pakan_foreign` (`id_pakan`),
  ADD KEY `detail_pembelian_pakans_id_author_foreign` (`id_author`),
  ADD KEY `detail_pembelian_pakans_id_satuan_pakan_foreign` (`id_satuan_pakan`);

--
-- Indexes for table `detail_pembelian_sapis`
--
ALTER TABLE `detail_pembelian_sapis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pembelian_sapis_id_pembelian_sapi_foreign` (`id_pembelian_sapi`),
  ADD KEY `detail_pembelian_sapis_id_jenis_sapi_foreign` (`id_jenis_sapi`),
  ADD KEY `detail_pembelian_sapis_id_author_foreign` (`id_author`);

--
-- Indexes for table `detail_penjualan_sapis`
--
ALTER TABLE `detail_penjualan_sapis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_penjualan_sapis_id_penjualan_sapi_foreign` (`id_penjualan_sapi`),
  ADD KEY `detail_penjualan_sapis_id_sapi_foreign` (`id_sapi`),
  ADD KEY `detail_penjualan_sapis_id_author_foreign` (`id_author`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fakturs`
--
ALTER TABLE `fakturs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakturs_id_author_foreign` (`id_author`),
  ADD KEY `fakturs_id_pihak_kedua_foreign` (`id_pihak_kedua`),
  ADD KEY `fakturs_id_kredit_foreign` (`id_kredit`),
  ADD KEY `fakturs_id_debit_foreign` (`id_debit`);

--
-- Indexes for table `jenis_sapis`
--
ALTER TABLE `jenis_sapis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_sapis_id_author_foreign` (`id_author`);

--
-- Indexes for table `jurnals`
--
ALTER TABLE `jurnals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnals_id_author_foreign` (`id_author`),
  ADD KEY `jurnals_id_kode_jurnal_foreign` (`id_kode_jurnal`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode_jurnals`
--
ALTER TABLE `kode_jurnals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_jurnals_kode_unique` (`kode`),
  ADD KEY `kode_jurnals_id_author_foreign` (`id_author`);

--
-- Indexes for table `kredits`
--
ALTER TABLE `kredits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kredits_id_kas_foreign` (`id_kas`),
  ADD KEY `kredits_id_jurnal_foreign` (`id_jurnal`),
  ADD KEY `kredits_id_author_foreign` (`id_author`),
  ADD KEY `kredits_id_pihak_kedua_foreign` (`id_pihak_kedua`);

--
-- Indexes for table `markup_sapis`
--
ALTER TABLE `markup_sapis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `markup_sapis_id_pemakaian_pakan_foreign` (`id_pemakaian_pakan`),
  ADD KEY `markup_sapis_id_sapi_foreign` (`id_sapi`);

--
-- Indexes for table `masuk_tabungans`
--
ALTER TABLE `masuk_tabungans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masuk_tabungans_id_author_foreign` (`id_author`),
  ADD KEY `masuk_tabungans_id_rekening_foreign` (`id_rekening`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operasional_pembelian_pakans`
--
ALTER TABLE `operasional_pembelian_pakans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operasional_pembelian_pakans_id_pembelian_pakan_foreign` (`id_pembelian_pakan`),
  ADD KEY `operasional_pembelian_pakans_id_author_foreign` (`id_author`);

--
-- Indexes for table `operasional_pembelian_sapis`
--
ALTER TABLE `operasional_pembelian_sapis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operasional_pembelian_sapis_id_pembelian_sapi_foreign` (`id_pembelian_sapi`),
  ADD KEY `operasional_pembelian_sapis_id_author_foreign` (`id_author`);

--
-- Indexes for table `operasional_penjualan_sapis`
--
ALTER TABLE `operasional_penjualan_sapis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operasional_penjualan_sapis_id_penjualan_sapi_foreign` (`id_penjualan_sapi`);

--
-- Indexes for table `pakans`
--
ALTER TABLE `pakans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pakans_id_author_foreign` (`id_author`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pemakaian_pakans`
--
ALTER TABLE `pemakaian_pakans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemakaian_pakans_id_author_foreign` (`id_author`),
  ADD KEY `pemakaian_pakans_id_pekerja_foreign` (`id_pekerja`);

--
-- Indexes for table `pembelian_pakans`
--
ALTER TABLE `pembelian_pakans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_pakans_id_author_foreign` (`id_author`),
  ADD KEY `pembelian_pakans_id_kredit_foreign` (`id_kredit`);

--
-- Indexes for table `pembelian_sapis`
--
ALTER TABLE `pembelian_sapis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_sapis_id_author_foreign` (`id_author`),
  ADD KEY `pembelian_sapis_id_kredit_foreign` (`id_kredit`);

--
-- Indexes for table `penjualan_sapis`
--
ALTER TABLE `penjualan_sapis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_sapis_id_author_foreign` (`id_author`),
  ADD KEY `penjualan_sapis_id_debit_foreign` (`id_debit`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rekenings`
--
ALTER TABLE `rekenings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rekenings_nomor_rekening_unique` (`nomor_rekening`),
  ADD KEY `rekenings_id_user_foreign` (`id_user`),
  ADD KEY `rekenings_id_author_foreign` (`id_author`);

--
-- Indexes for table `riwayat_bobot_sapis`
--
ALTER TABLE `riwayat_bobot_sapis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_bobot_sapis_id_author_foreign` (`id_author`),
  ADD KEY `riwayat_bobot_sapis_id_jenis_sapi_foreign` (`id_jenis_sapi`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sapis`
--
ALTER TABLE `sapis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sapis_id_jenis_sapi_foreign` (`id_jenis_sapi`),
  ADD KEY `sapis_id_author_foreign` (`id_author`);

--
-- Indexes for table `satuan_pakans`
--
ALTER TABLE `satuan_pakans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `satuan_pakans_id_author_foreign` (`id_author`);

--
-- Indexes for table `stok_pakans`
--
ALTER TABLE `stok_pakans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stok_pakans_id_satuan_pakan_foreign` (`id_satuan_pakan`),
  ADD KEY `stok_pakans_id_pakan_foreign` (`id_pakan`),
  ADD KEY `stok_pakans_id_author_foreign` (`id_author`);

--
-- Indexes for table `transaksi_debits`
--
ALTER TABLE `transaksi_debits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_debits_id_author_foreign` (`id_author`),
  ADD KEY `transaksi_debits_id_pihak_kedua_foreign` (`id_pihak_kedua`),
  ADD KEY `transaksi_debits_id_debit_foreign` (`id_debit`),
  ADD KEY `transaksi_debits_id_rekening_foreign` (`id_rekening`);

--
-- Indexes for table `transaksi_kredits`
--
ALTER TABLE `transaksi_kredits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_kredits_id_author_foreign` (`id_author`),
  ADD KEY `transaksi_kredits_id_pihak_kedua_foreign` (`id_pihak_kedua`),
  ADD KEY `transaksi_kredits_id_kredit_foreign` (`id_kredit`),
  ADD KEY `transaksi_kredits_id_rekening_foreign` (`id_rekening`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_perusahaans`
--
ALTER TABLE `data_perusahaans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debits`
--
ALTER TABLE `debits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pemakaian_pakans`
--
ALTER TABLE `detail_pemakaian_pakans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pembelian_pakans`
--
ALTER TABLE `detail_pembelian_pakans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pembelian_sapis`
--
ALTER TABLE `detail_pembelian_sapis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_penjualan_sapis`
--
ALTER TABLE `detail_penjualan_sapis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fakturs`
--
ALTER TABLE `fakturs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_sapis`
--
ALTER TABLE `jenis_sapis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurnals`
--
ALTER TABLE `jurnals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kode_jurnals`
--
ALTER TABLE `kode_jurnals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kredits`
--
ALTER TABLE `kredits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `markup_sapis`
--
ALTER TABLE `markup_sapis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masuk_tabungans`
--
ALTER TABLE `masuk_tabungans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `operasional_pembelian_pakans`
--
ALTER TABLE `operasional_pembelian_pakans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operasional_pembelian_sapis`
--
ALTER TABLE `operasional_pembelian_sapis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operasional_penjualan_sapis`
--
ALTER TABLE `operasional_penjualan_sapis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakans`
--
ALTER TABLE `pakans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemakaian_pakans`
--
ALTER TABLE `pemakaian_pakans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian_pakans`
--
ALTER TABLE `pembelian_pakans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian_sapis`
--
ALTER TABLE `pembelian_sapis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan_sapis`
--
ALTER TABLE `penjualan_sapis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekenings`
--
ALTER TABLE `rekenings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `riwayat_bobot_sapis`
--
ALTER TABLE `riwayat_bobot_sapis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sapis`
--
ALTER TABLE `sapis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `satuan_pakans`
--
ALTER TABLE `satuan_pakans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stok_pakans`
--
ALTER TABLE `stok_pakans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_debits`
--
ALTER TABLE `transaksi_debits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_kredits`
--
ALTER TABLE `transaksi_kredits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `debits`
--
ALTER TABLE `debits`
  ADD CONSTRAINT `debits_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `debits_id_jurnal_foreign` FOREIGN KEY (`id_jurnal`) REFERENCES `jurnals` (`id`),
  ADD CONSTRAINT `debits_id_kas_foreign` FOREIGN KEY (`id_kas`) REFERENCES `kas` (`id`),
  ADD CONSTRAINT `debits_id_pihak_kedua_foreign` FOREIGN KEY (`id_pihak_kedua`) REFERENCES `users` (`id`);

--
-- Constraints for table `detail_pemakaian_pakans`
--
ALTER TABLE `detail_pemakaian_pakans`
  ADD CONSTRAINT `detail_pemakaian_pakans_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `detail_pemakaian_pakans_id_pemakaian_pakan_foreign` FOREIGN KEY (`id_pemakaian_pakan`) REFERENCES `pemakaian_pakans` (`id`),
  ADD CONSTRAINT `detail_pemakaian_pakans_id_stok_pakan_foreign` FOREIGN KEY (`id_stok_pakan`) REFERENCES `stok_pakans` (`id`);

--
-- Constraints for table `detail_pembelian_pakans`
--
ALTER TABLE `detail_pembelian_pakans`
  ADD CONSTRAINT `detail_pembelian_pakans_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `detail_pembelian_pakans_id_pakan_foreign` FOREIGN KEY (`id_pakan`) REFERENCES `pakans` (`id`),
  ADD CONSTRAINT `detail_pembelian_pakans_id_pembelian_pakan_foreign` FOREIGN KEY (`id_pembelian_pakan`) REFERENCES `pembelian_pakans` (`id`),
  ADD CONSTRAINT `detail_pembelian_pakans_id_satuan_pakan_foreign` FOREIGN KEY (`id_satuan_pakan`) REFERENCES `satuan_pakans` (`id`);

--
-- Constraints for table `detail_pembelian_sapis`
--
ALTER TABLE `detail_pembelian_sapis`
  ADD CONSTRAINT `detail_pembelian_sapis_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `detail_pembelian_sapis_id_jenis_sapi_foreign` FOREIGN KEY (`id_jenis_sapi`) REFERENCES `jenis_sapis` (`id`),
  ADD CONSTRAINT `detail_pembelian_sapis_id_pembelian_sapi_foreign` FOREIGN KEY (`id_pembelian_sapi`) REFERENCES `pembelian_sapis` (`id`);

--
-- Constraints for table `detail_penjualan_sapis`
--
ALTER TABLE `detail_penjualan_sapis`
  ADD CONSTRAINT `detail_penjualan_sapis_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `detail_penjualan_sapis_id_penjualan_sapi_foreign` FOREIGN KEY (`id_penjualan_sapi`) REFERENCES `penjualan_sapis` (`id`),
  ADD CONSTRAINT `detail_penjualan_sapis_id_sapi_foreign` FOREIGN KEY (`id_sapi`) REFERENCES `sapis` (`id`);

--
-- Constraints for table `fakturs`
--
ALTER TABLE `fakturs`
  ADD CONSTRAINT `fakturs_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fakturs_id_debit_foreign` FOREIGN KEY (`id_debit`) REFERENCES `debits` (`id`),
  ADD CONSTRAINT `fakturs_id_kredit_foreign` FOREIGN KEY (`id_kredit`) REFERENCES `kredits` (`id`),
  ADD CONSTRAINT `fakturs_id_pihak_kedua_foreign` FOREIGN KEY (`id_pihak_kedua`) REFERENCES `users` (`id`);

--
-- Constraints for table `jenis_sapis`
--
ALTER TABLE `jenis_sapis`
  ADD CONSTRAINT `jenis_sapis_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`);

--
-- Constraints for table `jurnals`
--
ALTER TABLE `jurnals`
  ADD CONSTRAINT `jurnals_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `jurnals_id_kode_jurnal_foreign` FOREIGN KEY (`id_kode_jurnal`) REFERENCES `kode_jurnals` (`id`);

--
-- Constraints for table `kode_jurnals`
--
ALTER TABLE `kode_jurnals`
  ADD CONSTRAINT `kode_jurnals_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`);

--
-- Constraints for table `kredits`
--
ALTER TABLE `kredits`
  ADD CONSTRAINT `kredits_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `kredits_id_jurnal_foreign` FOREIGN KEY (`id_jurnal`) REFERENCES `jurnals` (`id`),
  ADD CONSTRAINT `kredits_id_kas_foreign` FOREIGN KEY (`id_kas`) REFERENCES `kas` (`id`),
  ADD CONSTRAINT `kredits_id_pihak_kedua_foreign` FOREIGN KEY (`id_pihak_kedua`) REFERENCES `users` (`id`);

--
-- Constraints for table `markup_sapis`
--
ALTER TABLE `markup_sapis`
  ADD CONSTRAINT `markup_sapis_id_pemakaian_pakan_foreign` FOREIGN KEY (`id_pemakaian_pakan`) REFERENCES `pemakaian_pakans` (`id`),
  ADD CONSTRAINT `markup_sapis_id_sapi_foreign` FOREIGN KEY (`id_sapi`) REFERENCES `sapis` (`id`);

--
-- Constraints for table `masuk_tabungans`
--
ALTER TABLE `masuk_tabungans`
  ADD CONSTRAINT `masuk_tabungans_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `masuk_tabungans_id_rekening_foreign` FOREIGN KEY (`id_rekening`) REFERENCES `rekenings` (`id`);

--
-- Constraints for table `operasional_pembelian_pakans`
--
ALTER TABLE `operasional_pembelian_pakans`
  ADD CONSTRAINT `operasional_pembelian_pakans_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `operasional_pembelian_pakans_id_pembelian_pakan_foreign` FOREIGN KEY (`id_pembelian_pakan`) REFERENCES `pembelian_pakans` (`id`);

--
-- Constraints for table `operasional_pembelian_sapis`
--
ALTER TABLE `operasional_pembelian_sapis`
  ADD CONSTRAINT `operasional_pembelian_sapis_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `operasional_pembelian_sapis_id_pembelian_sapi_foreign` FOREIGN KEY (`id_pembelian_sapi`) REFERENCES `pembelian_sapis` (`id`);

--
-- Constraints for table `operasional_penjualan_sapis`
--
ALTER TABLE `operasional_penjualan_sapis`
  ADD CONSTRAINT `operasional_penjualan_sapis_id_penjualan_sapi_foreign` FOREIGN KEY (`id_penjualan_sapi`) REFERENCES `penjualan_sapis` (`id`);

--
-- Constraints for table `pakans`
--
ALTER TABLE `pakans`
  ADD CONSTRAINT `pakans_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`);

--
-- Constraints for table `pemakaian_pakans`
--
ALTER TABLE `pemakaian_pakans`
  ADD CONSTRAINT `pemakaian_pakans_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pemakaian_pakans_id_pekerja_foreign` FOREIGN KEY (`id_pekerja`) REFERENCES `users` (`id`);

--
-- Constraints for table `pembelian_pakans`
--
ALTER TABLE `pembelian_pakans`
  ADD CONSTRAINT `pembelian_pakans_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pembelian_pakans_id_kredit_foreign` FOREIGN KEY (`id_kredit`) REFERENCES `kredits` (`id`);

--
-- Constraints for table `pembelian_sapis`
--
ALTER TABLE `pembelian_sapis`
  ADD CONSTRAINT `pembelian_sapis_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pembelian_sapis_id_kredit_foreign` FOREIGN KEY (`id_kredit`) REFERENCES `kredits` (`id`);

--
-- Constraints for table `penjualan_sapis`
--
ALTER TABLE `penjualan_sapis`
  ADD CONSTRAINT `penjualan_sapis_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `penjualan_sapis_id_debit_foreign` FOREIGN KEY (`id_debit`) REFERENCES `debits` (`id`);

--
-- Constraints for table `rekenings`
--
ALTER TABLE `rekenings`
  ADD CONSTRAINT `rekenings_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rekenings_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `riwayat_bobot_sapis`
--
ALTER TABLE `riwayat_bobot_sapis`
  ADD CONSTRAINT `riwayat_bobot_sapis_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `riwayat_bobot_sapis_id_jenis_sapi_foreign` FOREIGN KEY (`id_jenis_sapi`) REFERENCES `jenis_sapis` (`id`);

--
-- Constraints for table `sapis`
--
ALTER TABLE `sapis`
  ADD CONSTRAINT `sapis_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sapis_id_jenis_sapi_foreign` FOREIGN KEY (`id_jenis_sapi`) REFERENCES `jenis_sapis` (`id`);

--
-- Constraints for table `satuan_pakans`
--
ALTER TABLE `satuan_pakans`
  ADD CONSTRAINT `satuan_pakans_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`);

--
-- Constraints for table `stok_pakans`
--
ALTER TABLE `stok_pakans`
  ADD CONSTRAINT `stok_pakans_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `stok_pakans_id_pakan_foreign` FOREIGN KEY (`id_pakan`) REFERENCES `pakans` (`id`),
  ADD CONSTRAINT `stok_pakans_id_satuan_pakan_foreign` FOREIGN KEY (`id_satuan_pakan`) REFERENCES `satuan_pakans` (`id`);

--
-- Constraints for table `transaksi_debits`
--
ALTER TABLE `transaksi_debits`
  ADD CONSTRAINT `transaksi_debits_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaksi_debits_id_debit_foreign` FOREIGN KEY (`id_debit`) REFERENCES `debits` (`id`),
  ADD CONSTRAINT `transaksi_debits_id_pihak_kedua_foreign` FOREIGN KEY (`id_pihak_kedua`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaksi_debits_id_rekening_foreign` FOREIGN KEY (`id_rekening`) REFERENCES `rekenings` (`id`);

--
-- Constraints for table `transaksi_kredits`
--
ALTER TABLE `transaksi_kredits`
  ADD CONSTRAINT `transaksi_kredits_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaksi_kredits_id_kredit_foreign` FOREIGN KEY (`id_kredit`) REFERENCES `kredits` (`id`),
  ADD CONSTRAINT `transaksi_kredits_id_pihak_kedua_foreign` FOREIGN KEY (`id_pihak_kedua`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaksi_kredits_id_rekening_foreign` FOREIGN KEY (`id_rekening`) REFERENCES `rekenings` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
