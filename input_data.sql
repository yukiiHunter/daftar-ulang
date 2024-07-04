-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 04:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daftar_ulang`
--

-- --------------------------------------------------------

--
-- Table structure for table `input_data`
--

CREATE TABLE `input_data` (
  `no` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `kelamin` varchar(25) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `golongan_darah` varchar(15) NOT NULL,
  `berat_badan` varchar(10) NOT NULL,
  `tinggi_badan` varchar(255) NOT NULL,
  `lingkar_kepala` varchar(10) NOT NULL,
  `jarak_rumah` varchar(10) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `no_skhu` varchar(255) NOT NULL,
  `status_di_keluarga` varchar(20) NOT NULL,
  `anak_ke` varchar(5) NOT NULL,
  `tanggungan_keluarga` varchar(255) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nik_ayah` varchar(16) NOT NULL,
  `pekerjaan_ayah` varchar(255) NOT NULL,
  `penghasilan_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `nik_ibu` varchar(16) NOT NULL,
  `pekerjaan_ibu` varchar(255) NOT NULL,
  `penghasilan_ibu` varchar(255) NOT NULL,
  `alamat_ortu` varchar(255) NOT NULL,
  `no_telp_ortu` varchar(20) NOT NULL,
  `nama_wali` varchar(255) DEFAULT NULL,
  `nik_wali` varchar(16) DEFAULT NULL,
  `pekerjaan_wali` varchar(255) DEFAULT NULL,
  `penghasilan_wali` varchar(255) DEFAULT NULL,
  `alamat_wali` varchar(255) DEFAULT NULL,
  `no_telp_wali` varchar(20) DEFAULT NULL,
  `waktu_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `input_data`
--

INSERT INTO `input_data` (`no`, `program`, `nama_siswa`, `kelamin`, `agama`, `nis`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kota`, `telp`, `email`, `nik`, `no_kk`, `golongan_darah`, `berat_badan`, `tinggi_badan`, `lingkar_kepala`, `jarak_rumah`, `asal_sekolah`, `no_skhu`, `status_di_keluarga`, `anak_ke`, `tanggungan_keluarga`, `nama_ayah`, `nik_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `nama_ibu`, `nik_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `alamat_ortu`, `no_telp_ortu`, `nama_wali`, `nik_wali`, `pekerjaan_wali`, `penghasilan_wali`, `alamat_wali`, `no_telp_wali`, `waktu_update`) VALUES
(4, 'PPLG', 'Muhammad Daffa Atha', 'laki laki', 'Islam', '224118637', '0072169632', 'Semarang', '2007-08-24', 'zmb 99', 'Semarang', '081809720999', 'yukihiraischef@gmail.com', '3374062408070003', '3374062408070003', 'O', '60', '', '25', '8', 'MTsN 1 Semarang', '3415278', 'anak', '1', 'keluarga wkwk', 'Faried', '3374062408070003', 'Karyawan swasta', '7000000', 'Lisa', '3374062408070003', 'Ibu Rumah Tangga', '', 'zmb 99', '085640836161', '', '', '', '', NULL, NULL, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `input_data`
--
ALTER TABLE `input_data`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD UNIQUE KEY `nama_siswa` (`nama_siswa`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `nisn_2` (`nisn`),
  ADD UNIQUE KEY `no_kk` (`no_kk`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `nis_2` (`nis`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nik_2` (`nik`),
  ADD UNIQUE KEY `no_kk_2` (`no_kk`),
  ADD UNIQUE KEY `nisn_3` (`nisn`),
  ADD UNIQUE KEY `nis_3` (`nis`),
  ADD UNIQUE KEY `nik_ayah` (`nik_ayah`),
  ADD UNIQUE KEY `nik_ibu` (`nik_ibu`),
  ADD UNIQUE KEY `no_skhu` (`no_skhu`),
  ADD UNIQUE KEY `nik_wali` (`nik_wali`),
  ADD UNIQUE KEY `nik_wali_5` (`nik_wali`),
  ADD KEY `nik_wali_2` (`nik_wali`),
  ADD KEY `nik_wali_3` (`nik_wali`);
ALTER TABLE `input_data` ADD FULLTEXT KEY `nik_wali_4` (`nik_wali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `input_data`
--
ALTER TABLE `input_data`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
