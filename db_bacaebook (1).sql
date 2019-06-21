-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2019 at 01:41 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bacaebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `penulis` varchar(50) DEFAULT NULL,
  `slug_buku` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `buku` varchar(255) DEFAULT NULL,
  `status_buku` enum('publish','draft') DEFAULT NULL,
  `jenis_buku` varchar(255) DEFAULT NULL,
  `tahun_buku` varchar(50) DEFAULT NULL,
  `tanggal_post` date DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `id_user`, `id_kategori`, `judul_buku`, `penerbit`, `penulis`, `slug_buku`, `gambar`, `buku`, `status_buku`, `jenis_buku`, `tahun_buku`, `tanggal_post`, `tanggal`) VALUES
(50, NULL, 6, 'Geriliya', 'bukuLIAT', 'bukuLIAT', '6', 'geriliya.PNG', 'Geriliya.pdf', 'publish', '6', '2016', '2019-01-01', '2019-01-01 12:26:55'),
(51, NULL, 6, 'Islam Observed', 'Phoenix Edition', 'Clifford Geertz', '6', 'islam_observed.PNG', 'Islam_observed.pdf', 'publish', '6', '1971', '2019-01-01', '2019-01-01 12:31:51'),
(52, NULL, 5, 'Perempuan di Titik Nol ', 'Yayasan Obor Indonesia', 'Amir Sutaarga(penerjemah)', '5', 'perempuan_di_titik_nol.PNG', 'Perempuan_di_titik_nol.pdf', 'publish', '5', '2003', '2019-01-01', '2019-01-12 03:52:27'),
(53, NULL, 5, 'Tenggelamnya Kapal Van der Wijck', 'Bulan Bintang', 'Hamka', '5', 'kapal_vanderwijck.PNG', 'Tenggelamnya_kapal_van_der_wijck.pdf', 'publish', '5', '1984', '2019-01-01', '2019-01-01 12:49:51'),
(54, NULL, 7, 'Macroeconomics', '-', 'N.Gregory Mankiw', '7', 'macroeconomics.PNG', 'Macroeconomics_Karangan_N__Gregory_Mankiw_(Kosngosan).pdf', 'publish', '7', '', '2019-01-01', '2019-01-01 13:00:07'),
(55, NULL, 7, 'Strategi Kewirausahaan Digital', 'MenKominFo', 'Rudiantara, dkk', '7', 'Strategi_Kewirausahaan_Digital.jpg', 'Strategi_Kewirausahaan_Digital.pdf', 'publish', '7', '2018', '2019-01-01', '2019-01-01 12:57:14'),
(56, NULL, 8, 'AngularJs Untuk Pemula', '-', 'Agung Setiawan', '8', 'angularjs.PNG', 'angularjs-untuk-pemula.pdf', 'draft', '8', '', '2019-01-01', '2019-01-01 13:19:01'),
(57, NULL, 8, 'jQuery Tutorial', '-', 'Muningmini', '8', 'jquery_tutorial.PNG', 'Belajar_JQUERY.pdf', 'publish', '8', '2011', '2019-01-01', '2019-01-01 13:05:31'),
(58, NULL, 8, 'jQuery Succinctly', 'Syncfusion Inc', 'Cody Lindley', '8', 'jquery1.PNG', 'jQuery_Succinctly1.pdf', 'publish', '8', '2012', '2019-01-01', '2019-01-01 13:07:38'),
(59, NULL, 8, 'The Second Internet', 'InfoWeapons', 'Lawrence E.Hughes', '8', 'secont_internet.PNG', 'the_second_internet.pdf', 'publish', '8', '2010', '2019-01-01', '2019-01-01 13:10:05'),
(60, NULL, 8, 'Understanding Machine Learning', 'Cambridge University', 'Shai Shalev-Shwartz & Shai Ben-David', '8', 'undestanding_machine.PNG', 'understanding-machine.pdf', 'publish', '8', '2014', '2019-01-01', '2019-01-01 13:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) DEFAULT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `tanggal`) VALUES
(5, 'sastra', 'Sastra', NULL),
(6, 'sosial', 'Sosial', NULL),
(7, 'bisnis-ekonomi', 'Bisnis & Ekonomi', NULL),
(8, 'komputer', 'Komputer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembaca`
--

CREATE TABLE `tb_pembaca` (
  `id_pembaca` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `akses_level` varchar(15) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `akses_level`, `password`, `tanggal`) VALUES
(10, 'admin', 'admin', 'admin', 7110, '2018-12-13 13:31:00'),
(12, 'user', 'user', 'user', 7110, '2019-01-01 06:34:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_pembaca`
--
ALTER TABLE `tb_pembaca`
  ADD PRIMARY KEY (`id_pembaca`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_pembaca`
--
ALTER TABLE `tb_pembaca`
  MODIFY `id_pembaca` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
