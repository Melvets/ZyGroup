-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2023 at 02:31 AM
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
-- Database: `zygroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telp` bigint NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `date_create` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `gambar`, `nama`, `jenis_kelamin`, `kota`, `tanggal_lahir`, `telp`, `jabatan`, `date_create`) VALUES
(1, 'mel.jpg', 'Camela Devs', 'Perempuan', 'Semarang', '2005-12-24', 6285236596684, 'Member', '2023-08-02'),
(2, 'wal.jpg', 'Syawal Ananda Syahputra Bayhakie', 'Laki-Laki', 'Bogor', '2002-12-07', 6285156694379, 'Owner', '2023-08-02'),
(3, 'csefswcewfsf', 'asxsac', 'sfdcs', 'sfcsf', '2023-08-04', 234234, 'fesaf', NULL),
(4, ' dvsd z', 'szczds', 'zdxv  v', 'szdcvzd c', '2023-08-08', 8687, 'awcsaw', NULL),
(5, 'csafeasczf', 'ascvefcvz', 'zsv czxsvc', 'kzjshckfjsac', '2023-08-11', 798782, 'QDq', NULL),
(6, 'zcsafccz', 'adxxa', 'wadsa', 'Sdsadwx', '2023-08-09', 22, 'asfszcfw', NULL),
(7, 'ham.jpg', 'Ilham', 'Laki-Laki', 'Jepara', '2023-08-13', 2432423, 'Babu', NULL),
(8, '64cb9b1cdf1e6.jpg', 'Bebek', 'Perempuan', 'Indonesia', '2023-08-21', 8593852523, 'Member', NULL),
(9, '64cb9bd090d31.jpg', 'kzcjlzdjsck', 'sjcnzs', 'kzsacnjzs', '2023-08-16', 38279287, 'sjnfcjsenfcj', NULL),
(10, '64cb9c5a967a3.jpg', 'aku', 'znsjzbabdj', 'SBAdjknS', '2023-08-11', 25335, 'gyhuh', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
