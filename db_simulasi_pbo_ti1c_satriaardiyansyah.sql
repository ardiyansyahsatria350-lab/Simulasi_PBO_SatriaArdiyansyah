-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 03:06 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti1c_satriaardiyansyah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(100) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Budi Santoso', 'SMA Negeri 1 Pemalang', '85.50', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', 'SMA Negeri 2 Pemalang', '80.00', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Cabang', NULL, NULL, NULL, NULL),
(3, 'Andi Darmawan', 'SMK Negeri 1 Pemalang', '78.50', '250000.00', 'Reguler', 'Teknik Komputer', 'Kampus Utama', NULL, NULL, NULL, NULL),
(4, 'Dewi Lestari', 'SMA Negeri 3 Pemalang', '88.00', '250000.00', 'Reguler', 'Manajemen Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eko Prasetyo', 'SMK Negeri 2 Pemalang', '75.00', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Cabang', NULL, NULL, NULL, NULL),
(6, 'Rina Nose', 'SMA Negeri 1 Tegal', '82.50', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Fajar Nugroho', 'SMA Negeri 2 Tegal', '79.00', '250000.00', 'Reguler', 'Teknik Komputer', 'Kampus Cabang', NULL, NULL, NULL, NULL),
(8, 'Ayu Safitri', 'SMA Negeri 1 Pekalongan', '92.00', '250000.00', 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Reza Rahadian', 'SMA Negeri 1 Semarang', '95.50', '250000.00', 'Prestasi', NULL, NULL, 'Olimpiade Komputer', 'Internasional', NULL, NULL),
(10, 'Chelsea Islan', 'SMA Negeri 2 Semarang', '90.00', '250000.00', 'Prestasi', NULL, NULL, 'Lomba Debat Bahasa Inggris', 'Provinsi', NULL, NULL),
(11, 'Iqbaal Ramadhan', 'SMA Negeri 3 Semarang', '89.50', '250000.00', 'Prestasi', NULL, NULL, 'Kejuaraan Pencak Silat', 'Nasional', NULL, NULL),
(12, 'Maudy Ayunda', 'SMA Negeri 1 Magelang', '96.00', '250000.00', 'Prestasi', NULL, NULL, 'Olimpiade Fisika', 'Internasional', NULL, NULL),
(13, 'Nicholas Saputra', 'SMA Negeri 2 Magelang', '91.00', '250000.00', 'Prestasi', NULL, NULL, 'Lomba Cipta Puisi', 'Nasional', NULL, NULL),
(14, 'Dian Sastrowardoyo', 'SMA Negeri 1 Solo', '93.50', '250000.00', 'Prestasi', NULL, NULL, 'Lomba Karya Tulis Ilmiah', 'Provinsi', NULL, NULL),
(15, 'Ahmad Dhani', 'SMA Negeri 1 Surabaya', '86.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KEMENKEU-01', 'Kementerian Keuangan'),
(16, 'Ari Lasso', 'SMA Negeri 2 Surabaya', '84.50', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-BPS-02', 'Badan Pusat Statistik'),
(17, 'Once Mekel', 'SMA Negeri 1 Malang', '87.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KEMENKUMHAM-03', 'Kemenkumham'),
(18, 'Judika', 'SMA Negeri 2 Malang', '83.50', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KEMENHUB-04', 'Kementerian Perhubungan'),
(19, 'Afgan', 'SMA Negeri 1 Bandung', '88.50', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-BMKG-05', 'BMKG'),
(20, 'Tulus', 'SMA Negeri 2 Bandung', '85.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-BPN-06', 'Badan Pertanahan Nasional');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
