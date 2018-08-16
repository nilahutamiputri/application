-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2017 at 02:42 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newmoobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'rental', 'rental123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_sewa` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `noktp` varchar(50) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `warna` varchar(40) NOT NULL,
  `harga` int(10) NOT NULL,
  `platno` varchar(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_sewa`, `nama`, `noktp`, `jenis`, `warna`, `harga`, `platno`, `tgl_masuk`, `tgl_selesai`, `status`) VALUES
(1, 'Nilhut', '012223', 'All New Avanza', 'Coklat', 800000, 'AB-2354-AS', '2017-05-24', '2017-05-25', 'OK'),
(2, 'Alvinditya Saputra', '021182', 'Avanza', 'Silver', 2000000, 'AB-1212-BD', '2017-05-22', '2017-05-25', 'OK'),
(3, 'Nila Hutami', '84574', 'Avanza', 'Hitam', 1500000, 'AB-3432-SS', '2017-05-22', '2017-05-24', 'OK'),
(4, 'susi', '123456', 'Cayla', 'Merah', 800000, 'AB-4839-BD', '2017-05-25', '2017-05-26', 'OK'),
(5, 'Nilhut', '012223', 'All New Avanza', 'Coklat', 800000, 'AB-2354-AS', '2017-05-24', '2017-05-25', ''),
(6, 'fahri', '3455', 'Xenia', 'Hijau', 1600000, 'AB-5443-GG', '2017-05-25', '2017-05-28', 'OK'),
(7, 'Ari Safitri', '1123456', 'APV', 'Silver', 1200000, 'AB-6643-HU', '2017-05-29', '2017-05-31', 'OK'),
(8, 'lala', '098765', 'Cayla', 'Merah', 1200000, 'AB-4839-BD', '2017-05-29', '2017-05-31', 'OK'),
(9, 'Adhi Saifuddin', '1234567', 'Cayla', 'Merah', 800000, 'AB-4839-BD', '2017-06-05', '2017-06-06', 'OK'),
(10, 'Lisa', '01012234', 'Xenia', 'Hijau', 1200000, 'AB-5443-GG', '2017-06-13', '2017-06-15', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `platno` varchar(10) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `harga` int(10) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`platno`, `jenis`, `harga`, `nama_file`, `warna`) VALUES
('AB-1212-BD', 'Avanza', 500000, '1.jpg', 'Silver'),
('AB-2354-AS', 'All New Avanza', 400000, '3.jpg', 'Coklat'),
('AB-3432-SS', 'Avanza', 500000, '2.jpg', 'Hitam'),
('AB-4563-RR', 'Honda', 300000, '6.jpg', 'Putih'),
('AB-4839-BD', 'Cayla', 400000, '7.jpg', 'Merah'),
('AB-5443-GG', 'Xenia', 400000, '4.jpg', 'Hijau'),
('AB-6643-HU', 'APV', 400000, '5.jpg', 'Silver');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `noktp` varchar(50) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `warna` varchar(40) NOT NULL,
  `harga` int(10) NOT NULL,
  `platno` varchar(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `nama`, `noktp`, `jenis`, `warna`, `harga`, `platno`, `tgl_masuk`, `tgl_selesai`) VALUES
(1, 'Nila', '7455', 'Avanza', 'Silver', 1000000, 'AB-1212-BD', '2017-05-15', '2017-06-04'),
(2, 'alifa', '776543', 'All New Avanza', 'Coklat', 1600000, 'AB-2354-AS', '2017-05-15', '2017-06-06'),
(3, 'Nayla', '1144567', 'All New Avanza', 'Coklat', 800000, 'AB-2354-AS', '2017-05-22', '2017-06-04'),
(4, 'Alvinditya Saputra', '021182', 'Avanza', 'Silver', 2000000, 'AB-1212-BD', '2017-05-22', '2017-05-25'),
(5, 'fahri', '3455', 'Xenia', 'Hijau', 1600000, 'AB-5443-GG', '2017-05-25', '2017-05-28'),
(6, 'Nila Hutami', '84574', 'Avanza', 'Hitam', 1500000, 'AB-3432-SS', '2017-05-22', '2017-05-24'),
(7, 'Ari Safitri', '1123456', 'APV', 'Silver', 1200000, 'AB-6643-HU', '2017-05-29', '2017-05-31'),
(8, 'lala', '098765', 'Cayla', 'Merah', 1200000, 'AB-4839-BD', '2017-05-29', '2017-05-31'),
(9, 'Nilhut', '012223', 'All New Avanza', 'Coklat', 800000, 'AB-2354-AS', '2017-05-24', '2017-05-25'),
(10, 'Nilhut', '012223', 'All New Avanza', 'Coklat', 800000, 'AB-2354-AS', '2017-05-24', '2017-05-25'),
(11, 'Adhi Saifuddin', '1234567', 'Cayla', 'Merah', 800000, 'AB-4839-BD', '2017-06-05', '2017-06-07'),
(12, 'susi', '123456', 'Cayla', 'Merah', 800000, 'AB-4839-BD', '2017-05-25', '2017-05-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`platno`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_sewa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
