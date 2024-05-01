-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 09:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopmatkinh_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatlieusp`
--

CREATE TABLE `chatlieusp` (
  `ma` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `chatlieusp`
--

INSERT INTO `chatlieusp` (`ma`, `ten`) VALUES
(1, 'Nhựa'),
(2, 'Nhựa dẻo'),
(3, 'Nhựa xenlulo'),
(4, 'Thép không rỉ'),
(5, 'Titan'),
(6, 'Kim loại');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `maHD` int(11) NOT NULL,
  `maSP` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`maSP`)),
  `soluong` int(2) NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doituongsd`
--

CREATE TABLE `doituongsd` (
  `ma` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `doituongsd`
--

INSERT INTO `doituongsd` (`ma`, `ten`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Kids'),
(4, 'Unisex | Kids'),
(5, 'Unisex'),
(6, 'asdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `maHD` int(11) NOT NULL,
  `ngayxuatHD` date NOT NULL,
  `maKH` int(11) NOT NULL,
  `maNV` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `trangthai` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`maHD`, `ngayxuatHD`, `maKH`, `maNV`, `thanhtien`, `trangthai`) VALUES
(2, '2024-04-10', 1, 1, 500000, 2),
(3, '2024-04-30', 3, 1, 500000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kieudang`
--

CREATE TABLE `kieudang` (
  `ma` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kieudang`
--

INSERT INTO `kieudang` (`ma`, `ten`) VALUES
(1, 'Vuông/chữ nhật'),
(2, 'Bầu dục'),
(3, 'Tròn'),
(4, 'Wellington'),
(5, 'Boston'),
(6, 'Blowline'),
(8, 'Đa giác');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `action` varchar(50) NOT NULL,
  `can_access` tinyint(1) DEFAULT NULL,
  `action_trim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `action`, `can_access`, `action_trim`) VALUES
(11, 1, 'Sản Phẩm', 1, 'sanpham'),
(12, 2, 'Sản Phẩm', 1, 'sanpham'),
(13, 1, 'Chất liệu', 1, 'chatlieu'),
(14, 2, 'Chất liệu', 0, 'chatlieu'),
(15, 1, 'Đối tượng sử dụng', 1, 'doituongsudung'),
(16, 2, 'Đối tượng sử dụng', 0, 'doituongsudung'),
(17, 1, 'Kiểu dáng', 1, 'kieudang'),
(18, 2, 'Kiểu dáng', 0, 'kieudang'),
(19, 1, 'User', 1, 'user'),
(20, 2, 'User', 0, 'user'),
(21, 1, 'Hóa đơn', 1, 'hoadon'),
(22, 2, 'Hóa đơn', 1, 'hoadon'),
(23, 1, 'Thống kê', 1, 'thongke'),
(24, 2, 'Thống kê', 0, 'thongke');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ma` int(5) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ma`, `role`) VALUES
(0, 'Admin'),
(1, 'Quản lý'),
(2, 'Nhân viên'),
(3, 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int(11) NOT NULL,
  `tenSP` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `makieudang` int(11) NOT NULL,
  `madoituongsd` int(11) NOT NULL,
  `machatlieu` int(11) NOT NULL,
  `img_src` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `tenSP`, `soluong`, `dongia`, `makieudang`, `madoituongsd`, `machatlieu`, `img_src`) VALUES
(7, 'AIR FIT\r\nAF2012N-4S\r\n', 100, 2580000, 4, 1, 2, 'AF2012N-4S'),
(8, 'AIR FIT\r\nAF2011N-4S', 100, 2580000, 1, 1, 2, 'AF2011N-4S'),
(9, 'AIR Ultem\r\nAU8010N-3A', 100, 2580000, 8, 5, 2, 'AU8010N-3A'),
(10, 'AIR Ultem\r\nAU8008N-3A', 100, 2580000, 1, 5, 2, 'AU8008N-3A'),
(11, 'Senichisaku\r\nSENICHI37', 100, 4480000, 5, 1, 3, 'SENICHI37'),
(12, 'Senichisaku\r\nSENICHI35', 120, 4480000, 4, 1, 3, 'SENICHI35'),
(13, 'eco²xy\r\nECO2029N-4S', 120, 2580000, 8, 4, 2, 'ECO2029N-4S'),
(14, 'eco²xy\r\nECO2028N-4S', 110, 2580000, 8, 4, 2, 'ECO2028N-4S'),
(15, 'eco²xy\r\nECO2027N-4S', 100, 2580000, 5, 4, 2, 'ECO2027N-4S'),
(16, 'eco²xy\r\nECO2026N-4S', 100, 2580000, 4, 4, 2, 'ECO2026N-4S'),
(17, 'K.moriyama\r\nKM1151T-3A', 100, 2980000, 1, 1, 5, 'KM1151T-3A'),
(18, 'K.moriyama\r\nKM1150T-3A', 100, 2980000, 1, 1, 5, 'KM1150T-3A'),
(19, '+NICHE\r\nNC3027C-3A', 100, 2580000, 5, 5, 4, 'NC3027C-3A'),
(20, '+NICHE\r\nNC3026C-3A', 100, 2580000, 8, 5, 4, 'NC3026C-3A'),
(21, 'AIR Ultem\r\nAU2101E-3A', 100, 2580000, 4, 5, 2, 'AU2101E-3A'),
(22, 'AIR Ultem\r\nAU2100E-3A', 100, 2580000, 1, 5, 2, 'AU2100E-3A'),
(23, 'FUWA CELLU\r\nFC2032T-3A', 100, 1580000, 4, 2, 2, 'FC2032T-3A'),
(24, 'FUWA CELLU\r\nFC2031T-3A', 100, 1580000, 1, 2, 2, 'FC2031T-3A'),
(25, 'AIR FIT\r\nAF1035G-3A', 100, 2580000, 8, 1, 4, 'AF1035G-3A'),
(26, 'AIR FIT\r\nAF1034G-3A', 120, 2580000, 4, 1, 4, 'AF1034G-3A'),
(27, 'SHINGO AIBA × OWNDAYS\r\nAS2003Z-3S', 100, 4980000, 8, 5, 1, 'AS2003Z-3S'),
(28, 'SHINGO AIBA × OWNDAYS\r\nAS2001Z-3S', 130, 4980000, 5, 5, 1, 'AS2001Z-3S'),
(39, 'SHINGO AIBA × OWNDAYS\r\nAS1001Z-3S', 130, 4980000, 8, 5, 5, 'AS1001Z-3S'),
(40, 'K.moriyama\r\nKM1149G-3A', 100, 2580000, 1, 1, 4, 'KM1149G-3A'),
(41, 'K.moriyama\r\nKM1148G-3A', 100, 2580000, 1, 1, 5, 'KM1148G-3A'),
(42, 'John Dillinger\r\nJD2053B-3A', 100, 2780000, 4, 5, 4, 'JD2053B-3A'),
(43, 'John Dillinger\r\nJD2052B-3A', 100, 2580000, 5, 5, 4, 'JD2052B-3A'),
(44, 'John Dillinger\r\nJD1043B-3A', 120, 2580000, 5, 5, 4, 'JD1043B-3A'),
(45, 'John Dillinger\r\nJD1042B-3A', 100, 2580000, 8, 5, 4, 'JD1042B-3A'),
(46, 'Graph Belle\r\nGB2040B-3A', 130, 4980000, 4, 2, 1, 'GB2040B-3A'),
(47, 'Graph Belle\r\nGB1040B-3A', 100, 2580000, 8, 2, 4, 'GB1040B-3A'),
(48, 'Graph Belle\r\nGB1039B-3A', 100, 2580000, 5, 2, 4, 'GB1039B-3A'),
(113, 'Based\r\nBA1007-G', 100, 2780000, 2, 1, 5, 'BA1007-G'),
(114, 'FUWA CELLU\r\nFC2029A-3S', 100, 1980000, 2, 2, 2, 'FC2029A-3S'),
(115, 'OWNDAYS\r\nOR1050T-1A', 100, 1580000, 2, 5, 4, 'OR1050T-1A'),
(116, 'FUWA CELLU\r\nFC2021S-0A', 100, 1980000, 2, 2, 2, 'FC2021S-0A'),
(117, 'Junni\r\nJU2029K-0S', 100, 2580000, 2, 3, 2, 'JU2029K-0S'),
(118, 'Memory Metal\r\nMM1007B-0S', 100, 2780000, 2, 5, 5, 'MM1007B-0S'),
(119, 'FUWA CELLU\r\nFC2020S-0S', 100, 1980000, 2, 2, 2, 'FC2020S-0S'),
(120, 'Junni\r\nJU1018N-9A', 100, 2580000, 2, 3, 2, 'JU1018N-9A'),
(121, 'OWNDAYS\r\nOR1039T-9S', 100, 1580000, 2, 5, 6, 'OR1039T-9S'),
(122, 'John Dillinger\r\nJD1020G-9S', 100, 2580000, 2, 5, 6, 'JD1020G-9S'),
(123, 'OWNDAYS\r\nCL1005T-8A', 100, 2780000, 2, 5, 5, 'CL1005T-8A'),
(124, 'OWNDAYS\r\nOR2043S-8S', 100, 980000, 2, 5, 2, 'OR2043S-8S'),
(125, 'Graph Belle\r\nOT1056', 100, 2780000, 2, 2, 5, 'OT1056'),
(126, 'AIR FIT\r\nOT1044', 100, 2780000, 2, 1, 5, 'OT1044'),
(127, 'OWNDAYS\r\nOS1002', 100, 1580000, 2, 5, 6, 'OS1002'),
(128, 'AIR FIT\r\nOB1019', 100, 2980000, 2, 1, 5, 'OB1019'),
(129, 'Graph Belle\r\nOB1013', 100, 2780000, 2, 2, 5, 'OB1013'),
(130, 'Senichisaku\r\nSENICHI31', 100, 3980000, 3, 1, 3, 'SENICHI31'),
(131, 'AIR Ultem\r\nAU2087W-1S', 100, 2980000, 3, 5, 2, 'AU2087W-1S'),
(132, 'Graph Belle\r\nGB1031B-1S', 100, 2780000, 3, 2, 5, 'GB1031B-1S'),
(133, 'eco²xy\r\nECO2017K-0A', 100, 2580000, 3, 4, 2, 'ECO2017K-0A'),
(134, 'AIR Ultem\r\nAU2083T-0S', 100, 2780000, 3, 5, 2, 'AU2083T-0S'),
(135, 'AIR Ultem\r\nAU2073K-0S', 120, 2580000, 3, 5, 2, 'AU2073K-0S'),
(136, 'Memory Metal\r\nMM1002B-0S', 100, 2780000, 3, 5, 5, 'MM1002B-0S'),
(137, 'John Dillinger\r\nJD1027B-9A', 100, 2780000, 3, 5, 1, 'JD1027B-9A'),
(138, 'John Dillinger\r\nJD1026K-9A', 100, 2780000, 3, 5, 4, 'JD1026K-9A'),
(139, 'John Dillinger\r\nJD1025K-9A', 100, 2780000, 3, 5, 4, 'JD1025K-9A'),
(140, 'OWNDAYS PC\r\nPC2005N-9A', 130, 980000, 3, 4, 2, 'PC2005N-9A'),
(141, 'OWNDAYS SNAP\r\nSNP1004T-9A', 100, 2780000, 3, 5, 6, 'SNP1004T-9A'),
(142, 'John Dillinger\r\nJD1022T-9S', 120, 2980000, 3, 5, 4, 'JD1022T-9S'),
(143, 'Graph Belle\r\nGB2017G-8A', 100, 2580000, 3, 2, 4, 'GB2017G-8A'),
(144, 'Graph Belle\r\nGB1019G-8A', 100, 2580000, 3, 2, 4, 'GB1019G-8A'),
(145, 'OWNDAYS\r\nSW2002J-8A', 100, 2780000, 3, 5, 1, 'SW2002J-8A'),
(146, 'lillybell\r\nLB2002J-8A', 100, 2580000, 3, 2, 1, 'LB2002J-8A'),
(147, 'lillybell\r\nLB1003G-8A', 100, 2580000, 3, 2, 6, 'LB1003G-8A'),
(148, 'John Dillinger\r\nJD1012K-8A', 100, 2580000, 3, 5, 4, 'JD1012K-8A'),
(149, 'AIR FIT\r\nAF1017-G', 100, 2580000, 3, 1, 5, 'AF1017-G'),
(150, 'Graph Belle\r\nGB2039J-2A', 100, 2780000, 6, 2, 1, 'GB2039J-2A'),
(151, 'John Dillinger\r\nJD2045J-1A', 100, 2580000, 6, 5, 1, 'JD2045J-1A'),
(152, 'Senichisaku\r\nSENICHI25', 100, 3980000, 6, 1, 3, 'SENICHI25'),
(153, 'Based\r\nBA1030G-0S', 100, 2780000, 6, 1, 5, 'BA1030G-0S'),
(154, 'John Dillinger\r\nJD2038B-9A', 100, 2780000, 6, 5, 4, 'JD2038B-9A'),
(155, '+NICHE\r\nNC3001J-8S', 120, 2580000, 6, 5, 6, 'NC3001J-8S'),
(156, 'Graph Belle\r\nGB2016-G', 100, 2580000, 6, 2, 1, 'GB2016-G'),
(157, 'John Dillinger\r\nJD2014-J', 100, 2780000, 6, 5, 1, 'JD2014-J'),
(158, 'AIR Ultem\r\nAU8009N-3A', 100, 2580000, 1, 5, 2, 'AU8009N-3A'),
(159, 'OWNDAYS\r\nOWSP2001L-3S', 100, 1150000, 1, 5, 2, 'OWSP2001L-3S'),
(160, 'Senichisaku\r\nSENICHI27', 100, 4580000, 1, 1, 3, 'SENICHI27'),
(161, 'Based\r\nBA1033G-2S', 100, 2580000, 1, 1, 5, 'BA1033G-2S'),
(162, 'eco²xy\r\nECO2015K-0S', 100, 2580000, 5, 3, 2, 'ECO2015K-0S'),
(163, 'eco²xy\r\nECO2016K-0S', 100, 2580000, 1, 3, 2, 'ECO2016K-0S'),
(164, 'Junni\r\nJU1016K-9S', 100, 2580000, 1, 3, 6, 'JU1016K-9S'),
(165, 'Junni\r\nJU2023G-8A', 100, 2580000, 1, 3, 1, 'JU2023G-8A'),
(166, 'Junni\r\nJU2011', 100, 2580000, 1, 3, 2, 'JU2011'),
(167, 'Junni\r\nJU2012', 100, 2580000, 2, 3, 1, 'JU2012'),
(168, 'Junni\r\nJU1011', 100, 2580000, 1, 3, 6, 'JU1011'),
(169, 'Junni\r\nJU2020-K', 100, 2280000, 4, 3, 2, 'JU2020-K'),
(170, 'Junni\r\nJU1015G-8A', 100, 2540000, 3, 3, 6, 'JU1015G-8A');

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE `trangthai` (
  `ma` int(2) NOT NULL,
  `trangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`ma`, `trangthai`) VALUES
(1, 'Chưa xử lý'),
(2, 'Đã xử lý');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sodienthoai` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `hovaten` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `role_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `password`, `sodienthoai`, `email`, `username`, `hovaten`, `diachi`, `role_id`) VALUES
(2, 'admin', '0123456789', 'admin@gmail.com', 'admin', 'admin', '0 admin', 0),
(3, 'quanly', '0123456789', 'quanly@gmail.com', 'quanly', 'quanly', 'quanly', 1),
(4, 'nhanvien', '0123456789', 'nhanvien@gmail.com', 'nhanvien', 'nhanvien', 'nhanvien', 2),
(6, '123', '0123456789', 'av@gmail.com', 'kh', 'khach', 'asd', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatlieusp`
--
ALTER TABLE `chatlieusp`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD KEY `maHD` (`maHD`);

--
-- Indexes for table `doituongsd`
--
ALTER TABLE `doituongsd`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHD`),
  ADD KEY `trangthai` (`trangthai`);

--
-- Indexes for table `kieudang`
--
ALTER TABLE `kieudang`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`),
  ADD KEY `madoituongsd` (`madoituongsd`),
  ADD KEY `makieudang` (`makieudang`),
  ADD KEY `machatlieu` (`machatlieu`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `vaitro` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatlieusp`
--
ALTER TABLE `chatlieusp`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doituongsd`
--
ALTER TABLE `doituongsd`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kieudang`
--
ALTER TABLE `kieudang`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ma` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`maHD`) REFERENCES `hoadon` (`maHD`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`trangthai`) REFERENCES `trangthai` (`ma`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`ma`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`madoituongsd`) REFERENCES `doituongsd` (`ma`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`makieudang`) REFERENCES `kieudang` (`ma`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`machatlieu`) REFERENCES `chatlieusp` (`ma`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `vaitro` FOREIGN KEY (`role_id`) REFERENCES `roles` (`ma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
