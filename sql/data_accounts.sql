-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 23, 2022 at 04:04 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `idDonHang` int(11) NOT NULL AUTO_INCREMENT,
  `idCustomer` int(20) NOT NULL,
  `ngaytao` timestamp NOT NULL,
  `thanhTien` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDonHang`),
  KEY `idCustomer` (`idCustomer`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`idDonHang`, `idCustomer`, `ngaytao`, `thanhTien`) VALUES
(6, 10, '2022-03-20 16:37:10', 350000),
(7, 10, '2022-03-20 16:52:03', 320000),
(8, 10, '2022-03-20 16:55:59', 770000),
(9, 20, '2022-03-22 13:36:47', 150000),
(10, 10, '2022-03-22 17:36:08', 350000),
(11, 23, '2022-03-23 15:08:43', 1120000),
(12, 23, '2022-03-23 15:29:27', 1350000),
(13, 32, '2022-03-23 15:40:17', 150000);

--
-- Triggers `donhang`
--
DROP TRIGGER IF EXISTS `themNgayTao`;
DELIMITER $$
CREATE TRIGGER `themNgayTao` BEFORE INSERT ON `donhang` FOR EACH ROW begin
	set new.ngaytao = now();
   end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `donhang_chitiet`
--

DROP TABLE IF EXISTS `donhang_chitiet`;
CREATE TABLE IF NOT EXISTS `donhang_chitiet` (
  `idDonHang` int(11) NOT NULL,
  `idQuanAo` int(20) NOT NULL,
  `soLuong` int(11) DEFAULT NULL,
  KEY `idDonHang` (`idDonHang`),
  KEY `idQuanAo` (`idQuanAo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donhang_chitiet`
--

INSERT INTO `donhang_chitiet` (`idDonHang`, `idQuanAo`, `soLuong`) VALUES
(6, 6, 1),
(7, 4, 1),
(8, 12, 1),
(8, 7, 1),
(9, 10, 1),
(10, 6, 1),
(11, 5, 1),
(11, 6, 1),
(11, 7, 1),
(12, 10, 9),
(13, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

DROP TABLE IF EXISTS `giohang`;
CREATE TABLE IF NOT EXISTS `giohang` (
  `idCustomer` varchar(20) NOT NULL,
  `idQuanAo` varchar(20) NOT NULL,
  `soLuong` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCustomer`,`idQuanAo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`idCustomer`, `idQuanAo`, `soLuong`) VALUES
('12', '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quanao`
--

DROP TABLE IF EXISTS `quanao`;
CREATE TABLE IF NOT EXISTS `quanao` (
  `idQuanAo` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(100) NOT NULL,
  `tonKho` int(11) NOT NULL,
  `price` int(11) DEFAULT '0',
  `img` text NOT NULL,
  `daBan` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idQuanAo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quanao`
--

INSERT INTO `quanao` (`idQuanAo`, `ten`, `tonKho`, `price`, `img`, `daBan`) VALUES
(3, 'T-SHIRT AUTHENTIC CARROT', 488, 290000, 'T-shirt-Authentic-Carrot-510x638.jpg', 8),
(4, 'T-SHIRT ANGRY POPPY WHITE', 492, 320000, 'tee-angry-poppy-white_a-510x638.jpg', 7),
(5, 'HOODIE ZIP SLY GREEN', 469, 450000, 'Hd-zip-SLY-Green-510x638.jpg', 17),
(6, 'JOGGER SLY BLACK', 480, 350000, 'Jogger-SLY-Black-510x638.jpg', 12),
(7, 'LONGTEE S TAN', 495, 320000, 'Longtee-S-tan-510x638.jpg', 4),
(8, 'T-SHIRT ANGRY POPPY BLACK', 654, 320000, 'tee-angry-poppy-black_b-510x638.jpg', 0),
(9, 'T-SHIRT SIMPLE SUNNY GREEN', 801, 320000, 't-shirt-simple-Blue_1-510x638.jpg', 1),
(10, 'BEANIE S TAN', 334, 150000, 'Beanie-S-Tan-510x638.jpg', 13),
(11, 'SWEATER ALLSTAR BLACK', 424, 420000, 'sweater-allstar-black-510x638.jpg', 0),
(12, 'HOODIE ZIP SLY NEON', 1344, 450000, 'Hd-zip-SLY-Neon-510x638.jpg', 1),
(13, 'POLO SIMPLE WHITE', 353, 290000, 'polo-Simple-White-510x638.jpg', 0),
(14, 'JACKET WRINKLED NYLON GREY', 583, 420000, 'jacket_wrinkler-nylon_grey_1.jpg', 0),
(15, 'áo sugoi dekai', 2, 670000, 'io.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(100) NOT NULL,
  `passwd` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `permission` int(11) NOT NULL DEFAULT '0',
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `passwd`, `phone`, `permission`, `name`, `address`, `id`) VALUES
('ngocanhdfg1234@gmail', '123456', '0123456', 0, 'Ngọc Anh', NULL, 1),
('admin@gmail.com', 'admin', '0162544345', 1, 'admin', NULL, 2),
('ngocanhdfg123@gmail.', '123456', '0934567898', 0, 'Bò Hết Sữa', NULL, 3),
('nd@gmail.com', '1', '1', 0, 'ngocduc', 'thai binh', 4),
('nahn@vip.com', '123', '0123456543', 0, 'nahn910', NULL, 5),
('h@gamil.com', '123', '045678873', 0, 'hui', NULL, 6),
('n@n.com', '2', '2', 0, 'ngoc', NULL, 7),
('n@gm.com', '123', '2', 0, 'Ngọc Anh', NULL, 8),
('d@ww.com', '09', '8589', 0, 'Ngọc Anh', NULL, 9),
('n@gmail.com', '123456', '09876567', 0, 'Ngọc Anh', 'Ha Noi 2', 10),
('er@g.com', '6532243', '968867489', 0, 'dfh', NULL, 11),
('d@w.com', '123456', '123456789', 0, 'df', 'hanoi', 12),
('h@gmail.com', 'lkjhg', '1234567', 0, 'ngoch', NULL, 13),
('u@f.com', '123456', '098765678', 0, 'ngpo', NULL, 14),
('d@w.22com', '123`', '123', 0, 'Ngọc Anh', NULL, 15),
('mo@f.com', '1234', '12345', 0, 'Ngọc Anh', NULL, 16),
('mv@gmail.com', '123', '123', 0, '', NULL, 17),
('hjk@hjk.com', '45678', '67890567', 0, 'Ngọc Anh', NULL, 19),
('ui@gmail.com', '1234', '0967854321', 0, 'Ngọc Anh', 'Hà Nội', 20),
('nguyenngocduc0802@gm', 'duc08022001', '0868186485', 0, 'Nguyễn Ngọc Đức', 'hô chi minh', 21),
('duc@gmail.com', '1', '123123', 0, 'nguyen ngoc duc', 'Hà Nội', 23),
('nduc0802@gmail.co', 'Ã¢123', '123', 0, 'a', NULL, 24),
('ng@gmail.com', '44', '', 0, 'aaaa', NULL, 25),
('a@gmail.com', 'aa', '1235', 0, 'ng', NULL, 26),
('asss@gmail.com', '123', '12334', 0, 'aa', NULL, 27),
('adsd@gmail.com', '1231', '1111111', 0, '111', NULL, 28),
('honda@gmail.comhonda', 'honda', '98687099870', 0, 'honda Civic', NULL, 31),
('C3#@gmail.com', '123456', '094867582', 0, 'Chevorlet C3', 'Hà Nội', 32);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`idCustomer`) REFERENCES `users` (`id`);

--
-- Constraints for table `donhang_chitiet`
--
ALTER TABLE `donhang_chitiet`
  ADD CONSTRAINT `donhang_chitiet_ibfk_1` FOREIGN KEY (`idDonHang`) REFERENCES `donhang` (`idDonHang`),
  ADD CONSTRAINT `donhang_chitiet_ibfk_2` FOREIGN KEY (`idQuanAo`) REFERENCES `quanao` (`idQuanAo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
