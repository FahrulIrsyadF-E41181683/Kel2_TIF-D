-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2020 at 05:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bpbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `ID_ADM` varchar(10) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `ALAMAT` varchar(50) NOT NULL,
  `NOMER` varchar(13) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `GAMBAR` varchar(50) NOT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `ID_BRT` varchar(10) NOT NULL,
  `JUDUL` varchar(50) NOT NULL,
  `ID_KTR` varchar(10) NOT NULL,
  `KATEGORI` int(11) NOT NULL,
  `TANGGAL` date NOT NULL,
  `LOKASI` varchar(50) NOT NULL,
  `ISI_BERITA` varchar(500) NOT NULL,
  `GAMBAR` varchar(50) NOT NULL,
  `ID_ADM` varchar(10) NOT NULL,
  `NAMA` varchar(20) NOT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `ID_KTR` varchar(10) NOT NULL,
  `KATEGORI` varchar(20) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `ID_KMR` varchar(10) NOT NULL,
  `ID_USR` varchar(10) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `ID_BRT` varchar(10) NOT NULL,
  `JUDUL` varchar(50) NOT NULL,
  `KOMENTAR` varchar(100) NOT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `ID_LPR` varchar(10) NOT NULL,
  `ID_USR` varchar(10) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `LOKASI` varchar(100) NOT NULL,
  `SUBJEK` varchar(100) NOT NULL,
  `LAPORAN` varchar(500) NOT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `ID_USR` varchar(10) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `ALAMAT` varchar(50) NOT NULL,
  `NOMER` varchar(13) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `GAMBAR` varchar(50) NOT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`ID_ADM`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`ID_BRT`),
  ADD KEY `ID_KTR` (`ID_KTR`),
  ADD KEY `ID_ADM` (`ID_ADM`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`ID_KTR`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`ID_KMR`),
  ADD KEY `ID_USR` (`ID_USR`),
  ADD KEY `ID_BRT` (`ID_BRT`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`ID_LPR`),
  ADD KEY `ID_USR` (`ID_USR`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`ID_USR`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD CONSTRAINT `tb_berita_ibfk_1` FOREIGN KEY (`ID_KTR`) REFERENCES `tb_kategori` (`ID_KTR`),
  ADD CONSTRAINT `tb_berita_ibfk_2` FOREIGN KEY (`ID_ADM`) REFERENCES `tb_admin` (`ID_ADM`);

--
-- Constraints for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD CONSTRAINT `tb_komentar_ibfk_1` FOREIGN KEY (`ID_USR`) REFERENCES `tb_user` (`ID_USR`),
  ADD CONSTRAINT `tb_komentar_ibfk_2` FOREIGN KEY (`ID_BRT`) REFERENCES `tb_berita` (`ID_BRT`);

--
-- Constraints for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD CONSTRAINT `tb_laporan_ibfk_1` FOREIGN KEY (`ID_USR`) REFERENCES `tb_user` (`ID_USR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
