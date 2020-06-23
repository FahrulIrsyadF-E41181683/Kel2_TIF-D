-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 05:13 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

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
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `ID_BRT` varchar(10) NOT NULL,
  `JUDUL` varchar(100) NOT NULL,
  `ID_KTR` varchar(10) NOT NULL,
  `TANGGAL` varchar(20) NOT NULL,
  `LOKASI` varchar(50) NOT NULL,
  `ISI_BERITA` varchar(1000) NOT NULL,
  `GAMBAR` varchar(100) NOT NULL,
  `ID_USR` varchar(10) NOT NULL,
  `STATUS_BRT` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`ID_BRT`, `JUDUL`, `ID_KTR`, `TANGGAL`, `LOKASI`, `ISI_BERITA`, `GAMBAR`, `ID_USR`, `STATUS_BRT`) VALUES
('BRT0000001', 'Gunung Semeru Diguncang Gempa 25 Kali Sehari, Status Waspadaa', 'KTG0000002', '04/04/17', 'Jawa Timur', ' Gunung Semeru diguncang gempa 25 dalam sehari. Pejabat Balai Besar Taman Nasional Bromo Tengger Semeru meminta warga di sekitar Gunung Semeru mewaspadai peningkatan aktivitas gunung api tersebut.Kepala Sub Bagian Data Evaluasi Pelaporan dan Humas Taman Nasional Bromo Tengger Semeru Sarif Hidayat mengatakan pengelola taman nasional intensif berkoordinasi dengan petugas Pos Pengamatan Gunung Api (PGA) Sawur berkenaan dengan antisipasi peningkatan aktivitas gunung tertinggi di Pulau Jawa itu.', 'deafault.png', 'USR0000001', 0),
('BRT0000002', 'Nekat Terobos Banjir, Pemotor di Cimahi Tewas Terseret Arus', 'KTG0000001', '2020-04-21', 'Cimahi, Jawa Barat', 'Seorang pengendara motor berinisial IW, 39, tewas setelah terseret arus banjir di Jalan Mahar Martanegara, Kota Cimahi, Jawa Barat, Selasa (21/4) pagi.\r\n\r\nKapolsek Cimahi Tengah Polres Cimahi Kompol Saidina B Mahdun mengatakan peristiwa itu terjadi sekitar pukul 06.30 WIB. Korban ditemukan sejauh 200 meter dari titik awal kejadian.', 'default.png', 'USR0000001', 1),
('BRT0000003', 'CIPTAKAN INOVASI APD KONTRIBUSI CEGAH PENYEBARAN COVID-19', 'KTG0000004', '2020-04-15', 'Jember, Jawa Timur', 'Alat pelindung diri (APD) bagi petugas medis yang menangani Coronavirus Desease (Covid-19) masih terbatas. Padahal, sebagai tenaga kesehatan (nakes) mereka merupakan garda terdepan yang menangani perawatan pasien.\r\nKondisi inilah yang mendorong mahasiswa dan dosen di Politeknik Negeri Jember (Polije) bersepakat untuk melakukan inovasi dengan teknologi dan peralatan yang ada, dengan menciptakan APD khusus bagi petugas kesehatan. Mereka memaksimalkan printer 3D untuk membuat Face Sheild atau kacamata pelindung wajah bagi mereka yang bekerja di garda terdepan baik di fasilitas kesehatan tingkat Puskesmas maupun rumah sakit serta posko pemeriksaan di perbatasan', 'default.png', 'USR0000001', 0),
('BRT0000004', 'Banjir di Cianjur, Puluhan Rumah Terendam-Jalan Protokol Ditutup', 'KTG0000001', '2020-04-21', 'Cianjur, Jawa Barat', 'Puluhan rumah di wilayah perkotaan Kabupaten Cianjur terendam banjir hingga lebih dari 50 sentimeter. Bahkan sejumlah ruas jalan protokol juga ditutup akibat banjir.\r\nBanjir terjadi di sejumlah titik, mulai Perumahan BLK Residen, BTN Joglo, Kampung Cikaret, dan Gang Banjar, dan beberapa titik lainnya di Kecamatan Cianjur.\r\n\r\nLuapan air juga menggenangi sejumlah ruas jalan protokol, di antaranya Jalan Pangeran Hidayatullah, Jalan KH Abdullah bin Nuh, dan Jalan HOS Cokroaminoto. Jalan pun sempat ditutup akibat banjir tersebut.', 'default.png', 'USR0000001', 1),
('BRT0000005', 'Dampak Hujan Deras di Boyolali, Jalan Putus hingga Jembatan Miring', 'KTG0000005', '2020-03-18', 'Boyolali, Jawa Tengah', ' Hujan deras yang mengguyur wilayah Boyolali semalam mengakibatkan tanah longsor di sejumlah lokasi. Selain itu, terjangan arus sungai yang besar mengakibatkan sebuah jembatan gantung menjadi miring.\r\nTanah longsor antara lain menimpa rumah milik Marjo Tuji, warga Dukuh Glagahombo, Desa Senden, Kecamatan Selo, Boyolali. Rumah berdinding tembok itu jebol akibat tertimpa tanah longsor dari tebing di samping rumahnya. Material longsoran pun masuk ke dalam rumah.', 'default.png', 'USR0000002', 0),
('BRT0000006', 'Dampak Hujan Deras di Boyolali, Jalan Putus hingga Jembatan Miring', 'KTG0000005', '2020-03-18', 'Boyolali, Jawa Tengah', ' Hujan deras yang mengguyur wilayah Boyolali semalam mengakibatkan tanah longsor di sejumlah lokasi. Selain itu, terjangan arus sungai yang besar mengakibatkan sebuah jembatan gantung menjadi miring.\r\nTanah longsor antara lain menimpa rumah milik Marjo Tuji, warga Dukuh Glagahombo, Desa Senden, Kecamatan Selo, Boyolali. Rumah berdinding tembok itu jebol akibat tertimpa tanah longsor dari tebing di samping rumahnya. Material longsoran pun masuk ke dalam rumah.', 'default.png', 'USR0000002', 0),
('BRT0000007', 'asdasdasd', 'KTG0000001', '0000-00-00', 'asdasdas', '<p>asdasdasd</p>\r\n', '', 'USR0000002', 0),
('BRT0000008', 'berita baru', 'KTG0000002', '05/05/2020', 'jember', '<p>awkoakwoakwoakw</p>\r\n', '', 'USR0000002', 0),
('BRT0000009', 'bee', 'KTG0000005', '05/05/2020', 'sumbersai', '<p>asdasdasdsadasd <strong>asdasdasd</strong></p>\r\n', 'deafault.png', 'USR0000002', 1),
('BRT0000011', 'GEMPI', 'KTG0000002', '05/05/2020', 'JEMBER', '<p>asdsadasdasdasdas</p>', 'deafault.png', 'USR0000002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `ID_KTR` varchar(10) NOT NULL,
  `KATEGORI` varchar(20) NOT NULL,
  `KETERANGAN` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`ID_KTR`, `KATEGORI`, `KETERANGAN`) VALUES
('KTG0000001', 'Banjir', 'Banjir adalah peristiwa bencana alam yang terjadi ketika aliran air yang berlebihan merendam daratan'),
('KTG0000002', 'Gempa Bumi', 'Gempa bumi adalah getaran yang terjadi di permukaan bumi yang disebabkan oleh pergerakan kerak bumi'),
('KTG0000003', 'Puting Beliung', 'Puting beliung adalah angin yang berputar dengan kecepatan lebih dari 63 km/jam yang bergerak secara garis lurus'),
('KTG0000004', 'Lain-lain', 'Bencana non alam yang terjadi di Indonesia'),
('KTG0000005', 'Tanah Longsor', 'Tanah longsor merupakan gerakan massa tanah dan batuan, menuruni lereng akibat terganggunya kestabilan tanah dan batu penyusun lereng.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `ID_KMR` varchar(10) NOT NULL,
  `ID_USR` varchar(10) NOT NULL,
  `ID_BRT` varchar(10) NOT NULL,
  `KOMENTAR` varchar(100) NOT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`ID_KMR`, `ID_USR`, `ID_BRT`, `KOMENTAR`, `STATUS`) VALUES
('KMR0000001', 'USR0000005', 'BRT0000003', 'Itu merupakan inovasi yang sangat berguna', 1),
('KMR0000002', 'USR0000003', 'BRT0000003', 'Bangga jadi mahasiswa POLIJE hehe', 1),
('KMR0000003', 'USR0000004', 'BRT0000004', 'Semoga banjir segera surut', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `ID_LPR` varchar(10) NOT NULL,
  `ID_USR` varchar(10) DEFAULT NULL,
  `ID_KTR` varchar(10) NOT NULL,
  `NAMA_PELAPOR` varchar(20) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `ALAMAT` varchar(50) NOT NULL,
  `LOKASI` varchar(100) NOT NULL,
  `GAMBAR` varchar(100) NOT NULL,
  `DESKRIPSI` varchar(500) NOT NULL,
  `LEVEL_BENCANA` enum('Normal','Waspada','Siaga','Awas') DEFAULT NULL,
  `TANGGAL` varchar(50) NOT NULL,
  `STATUS` int(1) NOT NULL,
  `IS_READ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_laporan`
--

INSERT INTO `tb_laporan` (`ID_LPR`, `ID_USR`, `ID_KTR`, `NAMA_PELAPOR`, `EMAIL`, `ALAMAT`, `LOKASI`, `GAMBAR`, `DESKRIPSI`, `LEVEL_BENCANA`, `TANGGAL`, `STATUS`, `IS_READ`) VALUES
('LPR0000002', NULL, 'KTG0000001', 'Mas Ocym', 'bukanemail@gmail.com', 'Jember', 'sumbersari', 'banjir-bandang-tutup-akses-jalan-pintu-tol-cilegon-barat.jpg', 'Banjir euy', NULL, '05/19/2020', 0, 1),
('LPR0000003', NULL, 'KTG0000002', 'Beras Setra Famos', 'fahrulirsyad@gmail.com', 'Jember', 'sumbersari', 'gempa.jpeg', 'Gempi euy', NULL, '05/31/2020', 0, 0);

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
  `NIK` varchar(17) DEFAULT NULL,
  `FOTO_KTP` varchar(50) DEFAULT NULL,
  `FOTO_ORG` varchar(50) DEFAULT NULL,
  `STATUS` int(1) NOT NULL,
  `ROLE` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`ID_USR`, `USERNAME`, `PASSWORD`, `NAMA`, `ALAMAT`, `NOMER`, `EMAIL`, `GAMBAR`, `NIK`, `FOTO_KTP`, `FOTO_ORG`, `STATUS`, `ROLE`) VALUES
('USR0000001', 'fahrul', 'fahrul', 'Fahrul Irsyad', 'Banyuwangi', '082233233455', 'example@gmail.com', 'default.png', '', '', NULL, 1, 1),
('USR0000002', 'dion', 'dion', 'Hafiz Aldion', 'Jember', '082344566788', 'contoh@gmail.com', 'default.png', '', '', NULL, 1, 1),
('USR0000003', 'salma', 'salma', 'Salma Farhani', 'Gumuk Mas', '082233444485', 'salma@gmail.com', 'default.png', '', '', NULL, 1, 0),
('USR0000004', 'rendy', 'rendy', 'Rendy Wisnu', 'Jember', '082333928384', 'rendy@gmail.com', 'default.png', '', '', NULL, 1, 0),
('USR0000005', 'myco', 'myco', 'Myco Jihan', 'Jember', '081223312584', 'myco@gmail.com', 'default.png', '', '', NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`ID_BRT`),
  ADD KEY `ID_KTR` (`ID_KTR`),
  ADD KEY `tb_berita_ibfk_2` (`ID_USR`);

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
  ADD KEY `ID_USR` (`ID_USR`),
  ADD KEY `ID_KTR` (`ID_KTR`);

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
  ADD CONSTRAINT `tb_berita_ibfk_2` FOREIGN KEY (`ID_USR`) REFERENCES `tb_user` (`ID_USR`);

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
  ADD CONSTRAINT `tb_laporan_ibfk_1` FOREIGN KEY (`ID_USR`) REFERENCES `tb_user` (`ID_USR`),
  ADD CONSTRAINT `tb_laporan_ibfk_2` FOREIGN KEY (`ID_KTR`) REFERENCES `tb_kategori` (`ID_KTR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
