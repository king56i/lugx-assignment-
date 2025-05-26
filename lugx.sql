-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 07:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lugx`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id_Cmt` int(11) NOT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `Uid` int(50) NOT NULL,
  `NgayTao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_Cart` int(11) NOT NULL,
  `id_Customer` int(50) NOT NULL,
  `id_Product` int(50) NOT NULL,
  `SoLuong` int(50) NOT NULL,
  `Gia` float NOT NULL,
  `TongSoTien` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

CREATE TABLE `hang` (
  `id_Hang` int(11) NOT NULL,
  `HinhAnh` blob NOT NULL,
  `TenHang` varchar(50) NOT NULL,
  `AnHien` tinyint(2) NOT NULL,
  `MoTa` varchar(50) NOT NULL,
  `Urlhang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`id_Hang`, `HinhAnh`, `TenHang`, `AnHien`, `MoTa`, `Urlhang`) VALUES
(3, 0x756269736f66742d6c6f676f2e6a7067, 'Ubisoft', 1, 'Hãng Ubisoft', '');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `id_Loai` int(11) NOT NULL,
  `HinhAnh` blob NOT NULL,
  `TenLoai` varchar(50) NOT NULL,
  `AnHien` tinyint(2) NOT NULL,
  `MoTa` varchar(50) NOT NULL,
  `Urlloai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`id_Loai`, `HinhAnh`, `TenLoai`, `AnHien`, `MoTa`, `Urlloai`) VALUES
(9, 0x68696b696e672e706e67, 'Adventure', 0, 'Thể Loại Khám Phá', ''),
(10, 0x6374612d62672e6a7067, 'Action', 1, 'Thể Loại Hành Động', ''),
(11, 0x7468616e2d7472756e672e6a7067, 'Horror', 1, 'Thể Loại Kinh Dị', ''),
(12, 0x63617465676f726965732d30332e6a7067, 'RolePlay', 1, 'Thể Loại Nhập Vai', '');

-- --------------------------------------------------------

--
-- Table structure for table `loaitin`
--

CREATE TABLE `loaitin` (
  `idLT` int(11) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `AnHien` tinyint(4) NOT NULL,
  `MoTa` text NOT NULL,
  `idTL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_SP` int(11) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `HinhAnh` blob NOT NULL,
  `LoaiSP` int(50) NOT NULL,
  `HangSP` int(50) NOT NULL,
  `Gia` float NOT NULL,
  `MoTa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_SP`, `TenSP`, `HinhAnh`, `LoaiSP`, `HangSP`, `Gia`, `MoTa`) VALUES
(41, 'Assassins Creed', 0x62616e6e65722d696d6167652e6a7067, 10, 3, 1100000, 'Game Khám phá, Ám sát, thực hiện những nhiệm vụ đầy kịch tính!!');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `idTL` int(11) NOT NULL,
  `TenTL` varchar(50) NOT NULL,
  `AnHien` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `idTin` int(11) NOT NULL,
  `TieuDe` varchar(50) NOT NULL,
  `TomTat` varchar(255) NOT NULL,
  `HinhAnh` blob NOT NULL,
  `NgayTao` date NOT NULL,
  `Content` text NOT NULL,
  `idLT` int(11) NOT NULL,
  `AnHien` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Uid` int(11) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `group_id` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Uid`, `HoTen`, `Email`, `SoDienThoai`, `MatKhau`, `group_id`) VALUES
(1, 'Nguyễn Ngọc Hoàng', 'hoangnnpd@fpt.edu.vn', '0904354455', 'nguyenngochoang010203', 1),
(2, 'Lê Nguyễn Hoàng King', 'khoaledn56@gmail.com', '0905087440', '060c91cb8d1df23c7f7b05dcd6046c16', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_Cmt`),
  ADD KEY `nguoiBinhLuan` (`Uid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_Cart`);

--
-- Indexes for table `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`id_Hang`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`id_Loai`);

--
-- Indexes for table `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`idLT`),
  ADD KEY `theLoai` (`idTL`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_SP`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`idTL`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`idTin`),
  ADD KEY `LoaiTin` (`idLT`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_Cmt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_Cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hang`
--
ALTER TABLE `hang`
  MODIFY `id_Hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `id_Loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `idLT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_SP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `idTL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `idTin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `nguoiBinhLuan` FOREIGN KEY (`Uid`) REFERENCES `users` (`Uid`);

--
-- Constraints for table `loaitin`
--
ALTER TABLE `loaitin`
  ADD CONSTRAINT `theLoai` FOREIGN KEY (`idTL`) REFERENCES `theloai` (`idTL`);

--
-- Constraints for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `LoaiTin` FOREIGN KEY (`idLT`) REFERENCES `loaitin` (`idLT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
