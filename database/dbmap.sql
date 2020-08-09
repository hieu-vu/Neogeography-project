-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 07:08 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmap`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbeer`
--

CREATE TABLE `addbeer` (
  `id` int(11) NOT NULL,
  `TenDiaDiem` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `ToaDo` varchar(255) NOT NULL,
  `LienHe` varchar(255) NOT NULL,
  `Web` varchar(50) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addbeer`
--

INSERT INTO `addbeer` (`id`, `TenDiaDiem`, `DiaChi`, `ToaDo`, `LienHe`, `Web`, `HinhAnh`) VALUES
(1, 'Quán Huân Béo', '33 - đường Đức Thắng - Đông Ngạc - Bắc Từ Liêm', '105.778257,21.08159444444444', '', '', 'QuanHuanBeo.png'),
(2, 'Vườn Bia Lẩu Nướng', '45 - đường Đức Thắng - Đông Ngạc - Bắc Từ Liêm', '105.778065,21.080842', '', '', 'VuonBia.png'),
(3, 'Nướng Sơn Béo ', '2 - đường Văn Hội - Đông Ngạc - Bắc Từ Liêm', '105.775681600791,21.0781584423826', '', '', ''),
(4, 'The Buffet Garden', '15 - đường Cầu Vồng - Đức Thắng - Bắc Từ Liêm', '105.775585167031,21.07780277777778', '', '', ''),
(5, 'Nướng Bắc Cạn', '1 - ngõ 1 - đường Cầu Vồng - Đức Thắng - Bắc Từ Liêm', '105.775455382711,21.0775833280904', '', '', ''),
(6, 'Reng Nướng', '22 - ngõ 1 - Văn Hội - Đức Thắng - Bắc Từ Liêm', '105.775141262157,21.0776731587515', '', '', ''),
(7, 'Fin BBQ Buffet Nướng', '34 - ngõ 1 - Văn Hội - Đức Thắng -Bắc Từ Liêm', '105.774586754776,21.0775456248983', '', '', ''),
(8, 'Chickend BBQ', '42 - ngõ 1 - Văn Hội - Đức Thắng - Bắc Từ Liêm', '105.774237198884,21.0774388367171', '', '', ''),
(9, 'Ốc Tài Chính', '40 - ngõ 1 - Văn Hội - Đức Thắng - Bắc Từ Liêm', '105.774133754359,21.0774409069886', '', '', ''),
(10, 'Lẩu Nướng Nam Định', '', '105.773956072026,21.0768828476987', '', '', ''),
(11, 'Tom Chicken', '65 - ngõ 1 - Văn Hội - Đức Thắng - Bắc Từ Liêm', '105.773632920548,21.0770147127435', '', '', ''),
(12, 'Fin House', '86 - Ngõ 1 - Văn Hội - Đức Thắng - Bắc Từ Liêm', '105.773228579115,21.076876433438', '', '', ''),
(13, 'Nhuệ Giang Beer', 'Đường Sông Nhuệ - Đông Ngạc - Bắc Từ Liêm', '105.771848003273,21.0781750497444', '', '', ''),
(14, 'Quán Bia Tùng Ngọc', '34 - Sông Nhuệ - Đông Ngạc - Bắc Từ Liêm', '105.772267634593,21.0771382831632', '', '', ''),
(15, 'Nhà Hàng Mộc Béo', '149 - Sông Nhuệ - Đông Ngạc - Bắc Từ Liêm', '105.772351411329,21.0770396600874', '', '', ''),
(16, 'Ốc Xứ Thanh', '113 - Sông Nhuệ - Đức Thắng - Bắc Từ Liêm', '105.77226217084,21.0768025390266', '', '', ''),
(17, 'Lẩu Nướng Than hoa', '129 - Lê Văn Hiến - Đức Thắng - Bắc Từ Liêm', '105.7728498,21.0747423', '', '', 'LauNuongThanHoa.png'),
(18, 'Lẩu Nướng Bay', '103 - Lê Văn Hiến - Đức Thắng - Bắc Từ Liêm', '105.7733185,21.074759', '', '', ''),
(19, 'Nướng BBQ Thái Hotpot', '101 - Lê Văn Hiến - Đức Thắng - Bắc Từ Liêm', '105.773346,21.074777', '', '', 'ThaiHotpot.png'),
(20, 'Nhà hàng Tuấn Béo', 'Tòa B7 HVTC - 58 Lê Văn Hiến', '105.7737135,21.0742474', '', '', 'NhaHangTuanBeo.png'),
(21, 'Quán Cay Đức Huệ', 'Số 11- ngõ 85 - Lê Văn Hiến - Đức Thắng', '105.773362,21.07410555555555', '', '', 'QuanCayDucHue.png'),
(22, 'Quán Cỏ', '68 - Đức Thắng - Đức Thắng - Bắc Từ Liêm', '105.777445,21.07529166666666', '', '', 'QuanCo.png'),
(23, 'Cozi lẩu nướng bia Hàn Quốc', '129 Lê Văn Hiến - Đông Ngạc', '105.777138,21.074318', '', '', 'LauNuongCozi.png'),
(24, 'Nhà hàng Tùng Lâm', 'Tổ Dân phố Viên - Cổ Nhuế 2 - Bắc Từ Liêm', '105.777305,21.07255', '', '', 'NhaHangTungLam.png'),
(25, 'Huy Lùn Quán', 'Ngã Tư ĐH Mỏ', '105.7771598686676,21.07135772221823', '', '', 'HuyLungQuan.png'),
(26, 'Đặc Sản Dê Quay', 'Ngã Tư ĐH Mỏ Địa Chất', '105.7773977764686,21.07134051765924', '', '', ''),
(27, 'Sài Gòn Hội Quán', 'Ngã Tư ĐH Mỏ', '105.7776977416647,21.07137088371514', '', '', ''),
(28, 'Thu Huyền Quán', '535 Cổ Nhuế', '105.7773366923014,21.07089751801247', '', '', ''),
(29, 'Quán Ngon Ngon', '533 Cổ Nhuế', '105.7777168381421,21.07053024009993', '', '', ''),
(30, 'Nhà Hàng Vinh Giang ', '476 Cổ Nhuế', '105.7782125375026,21.07023538032116', '', '', ''),
(31, 'Nhà Hàng Bảo Khánh ', '521 - Cổ Nhuế', '105.7775945055944,21.06974452307193', '', '', ''),
(32, 'Cô Lô Nhuê Quán', 'Ngõ 521 Cổ Nhuế', '105.7770432799719,21.06847389839063', '', '', ''),
(33, 'Bia Hơi Tuấn Ngọc', 'Khu đô thị Resco - Cổ nhuế', '105.7804635930722,21.06700438779355', '', '', ''),
(34, 'Hương Quán', '273 Cổ Nhuế', '105.7809172991291,21.06614571114675', '', '', ''),
(150, 'Test thêm điểm', 'Ở đâu không biết', '105.1234235465,21.523436346', '01234567892', 'humg.edu.vn2', 'ylw-pushpin.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `TenDiaDiem` varchar(255) NOT NULL,
  `TieuDe` varchar(250) NOT NULL,
  `NoiDung` varchar(250) NOT NULL,
  `XepHang` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `TenDiaDiem`, `TieuDe`, `NoiDung`, `XepHang`) VALUES
(17, 'Lẩu Nướng Than hoa', 'Quán ngon', 'Ngon', 5),
(2, '', 'Ổn', 'Phục vụ ổn, giá ổn', 3),
(1, '', 'Quán ngon', 'Phục vụ tốt, giá cả hợp lý', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `passwordd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `passwordd`, `email`) VALUES
('gabong', '123', ''),
('hieuvu', '123', ''),
('hieuvu2', 'h13u', 'h.h.haiduoggmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbeer`
--
ALTER TABLE `addbeer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`NoiDung`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbeer`
--
ALTER TABLE `addbeer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
