-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 06:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubirit`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idbuku` int(10) NOT NULL,
  `cover` varchar(20) NOT NULL DEFAULT 'default.jpg',
  `judul` varchar(50) NOT NULL,
  `halaman` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `summary` varchar(500) DEFAULT NULL,
  `genrebuku` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idbuku`, `cover`, `judul`, `halaman`, `tahun`, `penulis`, `penerbit`, `summary`, `genrebuku`) VALUES
(1, 'b001.jpg', 'Hujan', 320, 2016, 'Tere Liye', 'Gramedia', 'Novel ini menceritakan tentang Esok dan Lail sebagai salah satu tokoh utama, keduanya dipertemukan setelah gunung meletus pada tahun 2042. Efek letusan gunung yang dahsyat membuat seisi bumi menyisihkan manusia dan tersisa sekitar 10% manusia.', '4'),
(18, 'defaultbook.jpg', 'Api Asmara', 231, 2019, 'Tere Liye', 'Gramedia', '', '1'),
(19, 'defaultbook.jpg', 'Api Asmara', 231, 2019, 'Tere Liye', 'Gramedia', 'aku', '1'),
(20, 'defaultbook.jpg', 'Api Asmara', 231, 2019, 'Tere Liye', 'Gramedia', 'jsaskjdskjc kdsj', '1'),
(28, 'defaultbook.jpg', 'Api Asmara', 321, 2020, 'Tere Liye', 'Gramedia', 'jnvjksnvksndkf', '1');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `idgenre` varchar(4) NOT NULL,
  `namagenre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`idgenre`, `namagenre`) VALUES
('1', 'History'),
('2', 'Adventure'),
('3', 'Fantasy'),
('4', 'Science-Fiction'),
('5', 'Humor'),
('6', 'Horror'),
('7', 'Romance'),
('8', 'Thriller'),
('9', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `reqid` int(11) NOT NULL,
  `reqdate` date NOT NULL DEFAULT curdate(),
  `reqjudul` varchar(30) NOT NULL,
  `reqpenulis` varchar(50) NOT NULL,
  `reqpenerbit` varchar(20) NOT NULL,
  `reqhalaman` int(11) NOT NULL,
  `reqtahun` int(11) NOT NULL,
  `reqsummary` varchar(500) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `userid` int(3) NOT NULL,
  `idgenre` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`reqid`, `reqdate`, `reqjudul`, `reqpenulis`, `reqpenerbit`, `reqhalaman`, `reqtahun`, `reqsummary`, `status`, `userid`, `idgenre`) VALUES
(1, '2022-06-11', 'Pulang', 'Tere Liye', 'Republika', 400, 0, 'Novel ini menceritakan kisah seorang anak laki-laki bernama Bujang yang tinggal di dasar rimba Sumatra bersama Samad dan Midah, kedua orang tuanya. Hidupnya sederhana, sama seperti anak kecil pada umumnya. Hingga kedatangan rombongan Tauke Besar untuk berburu menjadi awal perubahan hidupnya.', 'Approved', 1, '2'),
(7, '0000-00-00', 'Api Tauhid', 'Tere Liye', 'Gramedia', 10, 0, '', 'Approved', 2, '1'),
(9, '0000-00-00', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 529, 0, '', 'Waiting', 1, '1'),
(10, '2022-06-21', 'Api Tauhid', 'Tere Liye', 'Gramedia', 120, 2019, '', 'Waiting', 1, '3'),
(11, '2022-06-21', 'Jembatan Horor', 'Nikmatus S', 'Euthenia', 160, 2015, '', 'Rejected', 0, '2'),
(12, '2022-06-21', 'Jembatan Horor', 'Nikmatus S', 'Euthenia', 160, 2015, '', 'Approved', 0, '6');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idRole` varchar(5) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idRole`, `role`) VALUES
('role1', 'Admin'),
('role2', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `idrole` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `email`, `password`, `fname`, `lname`, `nohp`, `foto`, `idrole`) VALUES
(1, 'khaira.isyara@students.esqbs.ac.id', '$2y$10$zdAD0uMnLEPpwDgEYzNmo.aCrvVUVhi1DvGRIZrOxAiMo9dIyiR2K', 'Khaira', 'Isyara', '081291519404', '', 'role1'),
(2, 'mohamad.reyhand.f@students.esqbs.ac.id', '$2y$10$gcuI12Au.d/ODtENrKZ3zubcpwfoD3vtRN5lvPr0a54KYxbm4Yl9K', 'Reyhand', 'Fatturrahman', '08121234567', NULL, 'role1'),
(3, 'chiekal.mulia@students.esqbs.ac.id', '$2y$10$gcuI12Au.d/ODtENrKZ3zubcpwfoD3vtRN5lvPr0a54KYxbm4Yl9K', 'Chiekal', 'Mulia', '02147483647', NULL, 'role2'),
(14, 'kiranasaffura@gmail.com', '$2y$10$kEqYMlBnzRJrFtfNd2OZQO/9ZC0Wghzut0Fl0VRZ5/ibU7s3qnExy', 'Kirana', 'S', '081291519404', '', 'role2'),
(17, 'kiranasaffura@gmail.com', '$2y$10$9hBfDh1/kZ.DAby.4DFzUuqiFdWk8usFyMp9zwOqX7Ki2io1z1jkK', 'Kirana', 'Saffura', '08129287181', '', 'role1'),
(18, 'kiranasaffura@gmail.com', '$2y$10$H//1nGoM4FndHb4Oj6Y8bOzVppPDUWxVzWNR74eWouPHzoN48/plS', 'Kirana', 'Saffura', '082737376384', '', 'role1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`),
  ADD KEY `C_genre` (`genrebuku`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`idgenre`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`reqid`),
  ADD KEY `idgenre` (`idgenre`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `idrole` (`idrole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `idbuku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `reqid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `C_genre` FOREIGN KEY (`genrebuku`) REFERENCES `genre` (`idgenre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `idgenre` FOREIGN KEY (`idgenre`) REFERENCES `genre` (`idgenre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `role` (`idRole`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
