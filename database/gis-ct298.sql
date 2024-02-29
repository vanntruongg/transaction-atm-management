-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 01:50 PM
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
-- Database: `gis-ct298`
--

-- --------------------------------------------------------

--
-- Table structure for table `dichvu`
--

CREATE TABLE `dichvu` (
  `DV_Ma` int(11) NOT NULL,
  `DV_Ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dichvu`
--

INSERT INTO `dichvu` (`DV_Ma`, `DV_Ten`) VALUES
(1, 'Nạp tiền'),
(2, 'Rút tiền');

-- --------------------------------------------------------

--
-- Table structure for table `dichvuatm`
--

CREATE TABLE `dichvuatm` (
  `DVATM_MaDV` int(11) NOT NULL,
  `DVATM_MaATM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dichvuatm`
--

INSERT INTO `dichvuatm` (`DVATM_MaDV`, `DVATM_MaATM`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nganhang`
--

CREATE TABLE `nganhang` (
  `NH_Ma` int(11) NOT NULL,
  `NH_Ten` varchar(50) NOT NULL,
  `NH_DiaChi` varchar(100) NOT NULL,
  `NH_SDT` varchar(11) NOT NULL,
  `NH_KinhDo` float NOT NULL,
  `NH_ViDo` float NOT NULL,
  `NH_MaXP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nganhang`
--

INSERT INTO `nganhang` (`NH_Ma`, `NH_Ten`, `NH_DiaChi`, `NH_SDT`, `NH_KinhDo`, `NH_ViDo`, `NH_MaXP`) VALUES
(1, 'Agribank Chi nhánh Thành phố Cần Thơ', 'Số 3 Phan Đình Phùng, Phường Tân An, Quận Ninh Kiều, Thành phố Cần Thơ', '02923823460', 10.0357, 105.787, 6),
(2, 'Vietcombank Chi Nhánh Cần Thơ', '03-05-07 Hòa Bình, Phường Tân An, Quận Ninh Kiều, Thành Phố Cần Thơ.', '02923820445', 10.0337, 105.785, 6),
(3, 'Sacombank Chi Nhánh Cần Thơ', '95 - 97 - 99 Võ Văn Tần, Phường Tân An, Quận Ninh Kiều, Thành Phố Cần Thơ', '02923843282', 10.0325, 105.784, 6),
(4, 'BIDV CN Cần Thơ', 'Số 12 Đường Hoà Bình, Q. Ninh Kiều, Tp Cần Thơ', '02923818787', 10.0346, 105.785, 6),
(5, 'Ngân Hàng Á Châu ACB Chi Nhánh Cần Thơ', '41-41B-41C Đường 30/4, Phường An Lạc, Quận Ninh Kiều, Tp.Cần Thơ.', '02923735999', 10.0302, 105.781, 7),
(6, 'Ngân Hàng Tmcp Công Thương Việt Nam (Vietinbank)', '2QF8+9HC, Đ. 3 Tháng 2, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', '', 10.0245, 105.766, 9),
(7, 'PVcomBank Xuân Khánh', '192 Hẻm 132 Đ. 3 Tháng 2, Hưng Lợi, Ninh Kiều, Cần Thơ 94150, Việt Nam', '02923731848', 10.0202, 105.758, 8),
(8, 'ACB - PGD Xuân Khánh', '303 - 305, 8A Đ. 30 Tháng 4, Xuân Khánh, Ninh Kiều, Cần Thơ 900000, Việt Nam', '02923782777', 10.0236, 105.772, 8);

-- --------------------------------------------------------

--
-- Table structure for table `nganhangchapnhan`
--

CREATE TABLE `nganhangchapnhan` (
  `NHCN_MucPhi` float NOT NULL,
  `NHCN_MaNHCN` int(11) NOT NULL,
  `NHCN_MaNH` int(11) NOT NULL,
  `NHCN_MaDV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nganhangchapnhan`
--

INSERT INTO `nganhangchapnhan` (`NHCN_MucPhi`, `NHCN_MaNHCN`, `NHCN_MaNH`, `NHCN_MaDV`) VALUES
(10000, 8, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `phonggiaodich`
--

CREATE TABLE `phonggiaodich` (
  `PGD_Ma` int(11) NOT NULL,
  `PGD_Ten` varchar(50) NOT NULL,
  `PGD_DiaChi` varchar(100) NOT NULL,
  `PGD_SDT` varchar(11) NOT NULL,
  `PGD_KinhDo` float NOT NULL,
  `PGD_ViDo` float NOT NULL,
  `PGD_MoTa` varchar(100) DEFAULT NULL,
  `PGD_MaXP` int(11) NOT NULL,
  `PGD_MaNH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phonggiaodich`
--

INSERT INTO `phonggiaodich` (`PGD_Ma`, `PGD_Ten`, `PGD_DiaChi`, `PGD_SDT`, `PGD_KinhDo`, `PGD_ViDo`, `PGD_MoTa`, `PGD_MaXP`, `PGD_MaNH`) VALUES
(1, 'Agribank PGD số 2 - Thành phố Cần Thơ', '99, Nguyễn Thái Học, phường An Cư, quận Ninh Kiều, TP. Cần Thơ, Tân An, Ninh Kiều, Cần Thơ, Việt Nam', '02923852125', 10.0325, 105.783, '', 6, 1),
(2, 'Vietcombank PGD Hưng Lợi', '420-420A Đ. 30 Tháng 4, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', '02923782562', 10.0207, 105.769, '', 9, 2),
(3, 'ACB PGD Xuân Khánh', '5/8A 30 Tháng 4, P. Xuân Khánh, Quan Ninh Kieu, Can Tho.', '02923782777', 10.0224, 105.772, '', 8, 5),
(4, 'BIDV PGD Ninh Kiều', '107 Cách Mạng Tháng Tám - Tân An-Ninh Kiều - Cần Thơ', '02923814332', 10.0507, 105.775, '', 6, 4),
(5, 'Sacombank PGD Ninh Kiều', '168C Đ. 3 Tháng 2, Hưng Lợi, Ninh Kiều, Cần Thơ, Việt Nam', '02923740611', 10.02, 105.762, '', 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `QH_Ma` int(11) NOT NULL,
  `QH_Ten` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quanhuyen`
--

INSERT INTO `quanhuyen` (`QH_Ma`, `QH_Ten`) VALUES
(1, 'Ninh Kiều');

-- --------------------------------------------------------

--
-- Table structure for table `truatm`
--

CREATE TABLE `truatm` (
  `ATM_SoHieu` int(11) NOT NULL,
  `ATM_DiaChi` varchar(100) NOT NULL,
  `ATM_KinhDo` float NOT NULL,
  `ATM_ViDo` float NOT NULL,
  `ATM_MaNH` int(11) NOT NULL,
  `ATM_MaXP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `truatm`
--

INSERT INTO `truatm` (`ATM_SoHieu`, `ATM_DiaChi`, `ATM_KinhDo`, `ATM_ViDo`, `ATM_MaNH`, `ATM_MaXP`) VALUES
(1, '168 Đ. 3 Tháng 2, Xuân Khánh, Ninh Kiều, Cần Thơ, ', 10.0281, 105.771, 6, 8),
(2, '2QGF+8XP, Xuân Khánh, Ninh Kiều, Cần Thơ, Việt Nam', 10.0263, 105.777, 7, 8),
(3, '303 Đ. 30 Tháng 4, Xuân Khánh, Ninh Kiều, Cần Thơ,', 10.0229, 105.773, 8, 8),
(4, '2QF6+F7X, QL91B, Hưng Lợi, Ninh Kiều, Cần Thơ, Việ', 10.0246, 105.763, 6, 8),
(5, '28 Đ. Mậu Thân, An Phú, Ninh Kiều, Cần Thơ, Việt N', 10.0354, 105.774, 1, 8),
(6, 'Kho bạc Nhà nước TP, 369F Đ. Nguyễn Văn Cừ, Phường', 10.0361, 105.757, 2, 10),
(7, '315 Đ. Nguyễn Văn Linh, Phường An Khánh, Ninh Kiều', 10.0293, 105.756, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `xaphuong`
--

CREATE TABLE `xaphuong` (
  `XP_Ma` int(11) NOT NULL,
  `XP_Ten` varchar(30) NOT NULL,
  `XP_MaQH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xaphuong`
--

INSERT INTO `xaphuong` (`XP_Ma`, `XP_Ten`, `XP_MaQH`) VALUES
(1, 'Phường Cái Khế', 1),
(2, 'Phường An Hòa', 1),
(3, 'Phường Thới Bình', 1),
(4, 'Phường An Nghiệp', 1),
(5, 'Phường An Cư', 1),
(6, 'Phường Tân An', 1),
(7, 'Phường An Phú', 1),
(8, 'Phường Xuân Khánh', 1),
(9, 'Phường Hưng Lợi', 1),
(10, 'Phường An Khánh', 1),
(11, 'Phường An Bình', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`DV_Ma`);

--
-- Indexes for table `dichvuatm`
--
ALTER TABLE `dichvuatm`
  ADD KEY `DVATM_MaDV` (`DVATM_MaDV`),
  ADD KEY `DVATM_MaATM` (`DVATM_MaATM`);

--
-- Indexes for table `nganhang`
--
ALTER TABLE `nganhang`
  ADD PRIMARY KEY (`NH_Ma`),
  ADD KEY `NH_MaXP` (`NH_MaXP`);

--
-- Indexes for table `nganhangchapnhan`
--
ALTER TABLE `nganhangchapnhan`
  ADD KEY `NHCN_MaNHCN` (`NHCN_MaNHCN`),
  ADD KEY `NHCN_MaNH` (`NHCN_MaNH`),
  ADD KEY `NHCN_MaDV` (`NHCN_MaDV`);

--
-- Indexes for table `phonggiaodich`
--
ALTER TABLE `phonggiaodich`
  ADD PRIMARY KEY (`PGD_Ma`),
  ADD KEY `PGD_MaXP` (`PGD_MaXP`),
  ADD KEY `PGD_MaNH` (`PGD_MaNH`);

--
-- Indexes for table `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`QH_Ma`);

--
-- Indexes for table `truatm`
--
ALTER TABLE `truatm`
  ADD PRIMARY KEY (`ATM_SoHieu`),
  ADD KEY `ATM_MaNH` (`ATM_MaNH`),
  ADD KEY `ATM_MaXP` (`ATM_MaXP`);

--
-- Indexes for table `xaphuong`
--
ALTER TABLE `xaphuong`
  ADD PRIMARY KEY (`XP_Ma`),
  ADD KEY `XP_MaQH` (`XP_MaQH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `DV_Ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nganhang`
--
ALTER TABLE `nganhang`
  MODIFY `NH_Ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `phonggiaodich`
--
ALTER TABLE `phonggiaodich`
  MODIFY `PGD_Ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quanhuyen`
--
ALTER TABLE `quanhuyen`
  MODIFY `QH_Ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `truatm`
--
ALTER TABLE `truatm`
  MODIFY `ATM_SoHieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `xaphuong`
--
ALTER TABLE `xaphuong`
  MODIFY `XP_Ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dichvuatm`
--
ALTER TABLE `dichvuatm`
  ADD CONSTRAINT `dichvuatm_ibfk_1` FOREIGN KEY (`DVATM_MaDV`) REFERENCES `dichvu` (`DV_Ma`),
  ADD CONSTRAINT `dichvuatm_ibfk_2` FOREIGN KEY (`DVATM_MaATM`) REFERENCES `truatm` (`ATM_SoHieu`);

--
-- Constraints for table `nganhang`
--
ALTER TABLE `nganhang`
  ADD CONSTRAINT `nganhang_ibfk_1` FOREIGN KEY (`NH_MaXP`) REFERENCES `xaphuong` (`XP_Ma`);

--
-- Constraints for table `nganhangchapnhan`
--
ALTER TABLE `nganhangchapnhan`
  ADD CONSTRAINT `nganhangchapnhan_ibfk_1` FOREIGN KEY (`NHCN_MaNHCN`) REFERENCES `nganhang` (`NH_Ma`),
  ADD CONSTRAINT `nganhangchapnhan_ibfk_2` FOREIGN KEY (`NHCN_MaNH`) REFERENCES `nganhang` (`NH_Ma`),
  ADD CONSTRAINT `nganhangchapnhan_ibfk_3` FOREIGN KEY (`NHCN_MaDV`) REFERENCES `dichvu` (`DV_Ma`);

--
-- Constraints for table `phonggiaodich`
--
ALTER TABLE `phonggiaodich`
  ADD CONSTRAINT `phonggiaodich_ibfk_1` FOREIGN KEY (`PGD_MaXP`) REFERENCES `xaphuong` (`XP_Ma`),
  ADD CONSTRAINT `phonggiaodich_ibfk_2` FOREIGN KEY (`PGD_MaNH`) REFERENCES `nganhang` (`NH_Ma`);

--
-- Constraints for table `truatm`
--
ALTER TABLE `truatm`
  ADD CONSTRAINT `truatm_ibfk_1` FOREIGN KEY (`ATM_MaNH`) REFERENCES `nganhang` (`NH_Ma`),
  ADD CONSTRAINT `truatm_ibfk_2` FOREIGN KEY (`ATM_MaXP`) REFERENCES `xaphuong` (`XP_Ma`);

--
-- Constraints for table `xaphuong`
--
ALTER TABLE `xaphuong`
  ADD CONSTRAINT `xaphuong_ibfk_1` FOREIGN KEY (`XP_MaQH`) REFERENCES `quanhuyen` (`QH_Ma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
