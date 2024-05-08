-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 08, 2024 lúc 06:36 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `xuatnhap`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethdb`
--

CREATE TABLE `chitiethdb` (
  `MaCTHDB` int(11) NOT NULL,
  `MaHDB` int(11) NOT NULL,
  `MaHang` varchar(5) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiamGia` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethdb`
--

INSERT INTO `chitiethdb` (`MaCTHDB`, `MaHDB`, `MaHang`, `SoLuong`, `GiamGia`) VALUES
(1, 1, 'DT01', 20, 0.00),
(2, 2, 'DT02', 30, 0.00),
(3, 3, 'DT03', 20, 0.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietpdh`
--

CREATE TABLE `chitietpdh` (
  `MaCTPDH` int(11) NOT NULL,
  `MaPhieuDatH` int(11) NOT NULL,
  `MaHang` varchar(5) NOT NULL,
  `SoLuongHangDat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietpdh`
--

INSERT INTO `chitietpdh` (`MaCTPDH`, `MaPhieuDatH`, `MaHang`, `SoLuongHangDat`) VALUES
(1, 1, 'DT01', 20),
(2, 2, 'DT02', 30),
(3, 3, 'DT03', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietpdoih`
--

CREATE TABLE `chitietpdoih` (
  `MaCTPDoiH` int(11) NOT NULL,
  `MaHang` varchar(5) NOT NULL,
  `MaPhieuDoiH` int(11) NOT NULL,
  `SoLuongDoi` int(11) NOT NULL,
  `LyDoDoi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietpdoih`
--

INSERT INTO `chitietpdoih` (`MaCTPDoiH`, `MaHang`, `MaPhieuDoiH`, `SoLuongDoi`, `LyDoDoi`) VALUES
(1, 'DT01', 1, 1, 'Hàng lỗi'),
(2, 'DT02', 2, 10, 'Hàng xấu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieukkh`
--

CREATE TABLE `chitietphieukkh` (
  `MaCTPKKH` int(11) NOT NULL,
  `MaPhieuKKH` int(11) NOT NULL,
  `MaHang` varchar(5) NOT NULL,
  `SoLuongTon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietphieukkh`
--

INSERT INTO `chitietphieukkh` (`MaCTPKKH`, `MaPhieuKKH`, `MaHang`, `SoLuongTon`) VALUES
(1, 1, 'DT01', 80),
(2, 2, 'DT02', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietpnh`
--

CREATE TABLE `chitietpnh` (
  `MaCTPNH` int(11) NOT NULL,
  `MaPhieuNhapH` int(11) NOT NULL,
  `MaHang` varchar(5) NOT NULL,
  `SoLuongNhap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietpnh`
--

INSERT INTO `chitietpnh` (`MaCTPNH`, `MaPhieuNhapH`, `MaHang`, `SoLuongNhap`) VALUES
(1, 1, 'DT01', 2),
(2, 2, 'DT02', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietpxh`
--

CREATE TABLE `chitietpxh` (
  `MaCTPXH` int(11) NOT NULL,
  `MaPhieuXuatH` int(11) NOT NULL,
  `MaHang` varchar(5) NOT NULL,
  `SoLuongXuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietpxh`
--

INSERT INTO `chitietpxh` (`MaCTPXH`, `MaPhieuXuatH`, `MaHang`, `SoLuongXuat`) VALUES
(1, 1, 'DT01', 2),
(2, 2, 'DT02', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietpycgbh`
--

CREATE TABLE `chitietpycgbh` (
  `MaCTPYCGBH` int(11) NOT NULL,
  `MaPhieuYCGBH` int(11) NOT NULL,
  `MaHang` varchar(5) NOT NULL,
  `SoLuongThieu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietpycgbh`
--

INSERT INTO `chitietpycgbh` (`MaCTPYCGBH`, `MaPhieuYCGBH`, `MaHang`, `SoLuongThieu`) VALUES
(1, 2, 'DT02', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietpycxh`
--

CREATE TABLE `chitietpycxh` (
  `MaCTPYCXH` int(11) NOT NULL,
  `MaPhieuYCXH` int(11) NOT NULL,
  `MaHang` varchar(5) NOT NULL,
  `SoLuongXuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietpycxh`
--

INSERT INTO `chitietpycxh` (`MaCTPYCXH`, `MaPhieuYCXH`, `MaHang`, `SoLuongXuat`) VALUES
(1, 1, 'DT01', 20),
(2, 2, 'DT02', 30),
(3, 3, 'DT03', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MaHang` varchar(5) NOT NULL,
  `TenHang` varchar(50) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGiaNhap` decimal(10,2) NOT NULL,
  `DonGiaBan` decimal(10,2) NOT NULL,
  `DVT` varchar(10) NOT NULL,
  `NgaySanXuat` date NOT NULL,
  `HanSuDung` date NOT NULL,
  `MoTa` varchar(50) DEFAULT NULL,
  `GhiChu` varchar(50) DEFAULT NULL,
  `MaLoaiHang` varchar(5) NOT NULL,
  `MaNCC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MaHang`, `TenHang`, `SoLuong`, `DonGiaNhap`, `DonGiaBan`, `DVT`, `NgaySanXuat`, `HanSuDung`, `MoTa`, `GhiChu`, `MaLoaiHang`, `MaNCC`) VALUES
('DT01', 'Bộ module Bluetooth HC-05', 80, 63000.00, 70000.00, 'Bộ', '2024-02-01', '2026-02-01', 'Bộ module Bluetooth HC-05', 'Hàng đang hot', 'DT', 2),
('DT02', 'Arduino Uno', 30, 180000.00, 200000.00, 'Cái', '2023-11-01', '2025-11-01', 'Board Arduino Uno R3', 'Hàng chính hãng', 'DT', 2),
('DT03', 'Bộ cảm biến nhiệt độ và độ ẩm DHT11', 50, 45000.00, 50000.00, 'Bộ', '2023-12-01', '2025-12-01', 'Bộ cảm biến nhiệt độ và độ ẩm', 'Hàng cần kiểm tra', 'DT', 5),
('DT04', 'Motor Servo SG90', 100, 27000.00, 30000.00, 'Cái', '2024-01-01', '2026-01-01', 'Motor Servo SG90', 'Hàng mới nhập', 'DT', 5),
('DT05', 'LED RGB', 200, 4500.00, 5000.00, 'Cái', '2023-11-15', '2025-11-15', 'LED RGB 5mm', 'Hàng phụ kiện', 'DT', 2),
('NLS01', 'Gạo lứt', 100, 45000.00, 50000.00, 'Kg', '2023-01-01', '2024-01-01', 'Gạo lứt hữu cơ', 'Hàng mới', 'NLS', 1),
('NLS02', 'Nước ép trái cây', 150, 18000.00, 20000.00, 'Chai', '2024-03-01', '2024-04-01', 'Nước ép trái cây tươi', 'Hàng mới về', 'NLS', 1),
('NLS03', 'Cà phê rang xay', 80, 108000.00, 120000.00, 'Bịch', '2023-12-15', '2024-12-15', 'Cà phê Arabica rang xay', 'Hàng cao cấp', 'NLS', 4),
('NLS04', 'Rau muống', 200, 18000.00, 20000.00, 'Kg', '2024-01-15', '2024-02-15', 'Rau muống sạch', 'Hàng nhập mới', 'NLS', 1),
('NLS05', 'Mật ong', 50, 135000.00, 150000.00, 'Lọ', '2023-12-01', '2024-12-01', 'Mật ong tự nhiên', 'Hàng khuyến mãi', 'NLS', 1),
('NLS06', 'Sữa bò', 150, 22500.00, 25000.00, 'Lít', '2024-02-01', '2024-03-01', 'Sữa bò tươi', 'Hàng hết hạn sử dụng gần', 'NLS', 1),
('TPR01', 'Rượu vang đỏ', 20, 270000.00, 300000.00, 'Chai', '2022-01-01', '2027-01-01', 'Rượu vang đỏ ngon', 'Hàng nhập khẩu', 'TPR', 3),
('TPR02', 'Bia Tiger', 100, 22500.00, 25000.00, 'Thùng', '2023-05-01', '2025-05-01', 'Bia Tiger 330ml', 'Hàng đặc biệt', 'TPR', 3),
('TPR03', 'Mì tôm Hảo Hảo', 200, 4500.00, 5000.00, 'Gói', '2023-06-01', '2025-06-01', 'Mì tôm Hảo Hảo 75g', 'Hàng bình dân', 'TPR', 3),
('TPR04', 'Trái cây mix', 80, 72000.00, 80000.00, 'Kg', '2024-02-15', '2024-03-15', 'Trái cây tươi ngon', 'Hàng đặc biệt', 'TPR', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hdb`
--

CREATE TABLE `hdb` (
  `MaHDB` int(11) NOT NULL,
  `MaNV` varchar(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `NgayMua` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hdb`
--

INSERT INTO `hdb` (`MaHDB`, `MaNV`, `MaKH`, `NgayMua`) VALUES
(1, 'NV08', 1, '2023-09-10'),
(2, 'NV09', 2, '2024-03-10'),
(3, 'NV10', 3, '2024-04-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `DiaChi`, `SDT`, `Email`) VALUES
(1, 'Nguyễn Thị An', 'Hà Nội', '0987654321', 'nguyenthian@gmail.com'),
(2, 'Trần Văn Bình', 'Hồ Chí Minh', '0901234567', 'tranvanbinh@gmail.com'),
(3, 'Lê Thị Mai', 'Đà Nẵng', '0978123456', 'lethimai@gmail.com'),
(4, 'Phạm Đức Long', 'Hải Phòng', '0967123456', 'phamduclong@gmail.com'),
(5, 'Vũ Thị Hương', 'Cần Thơ', '0918123456', 'vuthihuong@gmail.com'),
(6, 'Đinh Văn Dương', 'Hà Nội', '0988123456', 'dinhvanduong@gmail.com'),
(7, 'Hoàng Thị Ngọc', 'Hồ Chí Minh', '0909123456', 'hoangthingoc@gmail.com'),
(8, 'Nguyễn Văn Tuấn', 'Đà Nẵng', '0976123456', 'nguyenvantuan@gmail.com'),
(9, 'Trần Thị Lan', 'Hải Phòng', '0966123456', 'tranthilan@gmail.com'),
(10, 'Lê Văn Hải', 'Cần Thơ', '0916123456', 'levanhai@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihang`
--

CREATE TABLE `loaihang` (
  `MaLoaiHang` varchar(5) NOT NULL,
  `TenLoaiHang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihang`
--

INSERT INTO `loaihang` (`MaLoaiHang`, `TenLoaiHang`) VALUES
('DT', 'Linh kiện điện tử'),
('NLS', 'Nông Lâm Sản'),
('TPR', 'Thực phẩm- rượu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `DiaChi`, `SDT`, `Email`) VALUES
(1, 'Công ty Nông Lâm Sản Đình Phong', '123 Đường Hoàng Văn Thụ, TP. Hồ Chí Minh', '0123456789', 'info@nonglamsanphattrien.com'),
(2, 'Công ty Linh Kiện Điện Tử Sáng Tạo', '456 Đường Lê Lợi, TP. Hà Nội', '0987654321', 'contact@linhkiendientusangtao.com'),
(3, 'Công ty Thực Phẩm và Rượu Vang Tươi Vàng', '789 Đường Nguyễn Huệ, TP. Đà Nẵng', '0369852147', 'sales@thucphamruouvangoi.com'),
(4, 'Công ty Cung Cấp Nguồn Lực Hạng Nhất', '789 Đường Lê Duẩn, TP. Hồ Chí Minh', '0123456789', 'info@ccnlhn.com'),
(5, 'Công ty Đầu Tư và Phát Triển Công Nghệ AC', '456 Đường Bà Triệu, TP. Hà Nội', '0987654321', 'contact@dautuvaphattriencongnghe.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `IDNhanvien` varchar(11) NOT NULL,
  `TenNV` varchar(50) NOT NULL,
  `GioiTinh` varchar(10) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `NgayVaoLam` date NOT NULL,
  `Matkhau` varchar(50) NOT NULL,
  `Chucvu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`IDNhanvien`, `TenNV`, `GioiTinh`, `NgaySinh`, `DiaChi`, `SDT`, `Email`, `NgayVaoLam`, `Matkhau`, `Chucvu`) VALUES
('NV01', 'Nguyễn Văn Anh', 'Nam', '1990-05-15', 'Hà Nội', '0987654321', 'nguyenvananh@gmail.com', '2020-01-10', 'password1', 'Nhân viên kinh doanh'),
('NV02', 'Trần Thị Bình Minh', 'Nữ', '1995-09-20', 'Hồ Chí Minh', '0901234567', 'tranbinhminh@gmail.com', '2019-12-05', 'password2', 'Nhân viên kho'),
('NV03', 'Lê Thị Thu Hà', 'Nữ', '1993-07-12', 'Đà Nẵng', '0978123456', 'lethuthaha@gmail.com', '2020-03-22', 'password3', 'Quản lí kho'),
('NV04', 'Phạm Văn Bình', 'Nam', '1988-04-02', 'Hải Phòng', '0967123456', 'phamvanbinh@gmail.com', '2020-02-15', 'password4', 'Nhân viên kinh doanh'),
('NV05', 'Vũ Thị Mai', 'Nữ', '1991-10-25', 'Cần Thơ', '0918123456', 'vuthimai@gmail.com', '2021-01-30', 'password5', 'Vận chuyển'),
('NV06', 'Đinh Văn Hùng', 'Nam', '1994-03-08', 'Hà Nội', '0988123456', 'dinhvanhung@gmail.com', '2020-06-18', 'password6', 'Nhân viên kinh doanh'),
('NV07', 'Hoàng Thị Hồng', 'Nữ', '1996-12-17', 'Hồ Chí Minh', '0909123456', 'hoangthihong@gmail.com', '2019-11-20', 'password7', 'Vận chuyển'),
('NV08', 'Nguyễn Văn Long', 'Nam', '1987-08-29', 'Đà Nẵng', '0976123456', 'nguyenvanlong@gmail.com', '2018-10-10', 'password8', 'Nhân viên kho'),
('NV09', 'Trần Thị Ngọc', 'Nữ', '1992-06-14', 'Hải Phòng', '0966123456', 'tranthinngoc@gmail.com', '2021-03-05', 'password9', 'Nhân viên kho'),
('NV10', 'Lê Văn Đức', 'Nam', '1998-01-03', 'Cần Thơ', '0916123456', 'levanduc@gmail.com', '2019-07-15', 'password10', 'Nhân viên kho');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudathang`
--

CREATE TABLE `phieudathang` (
  `MaPhieuDatH` int(11) NOT NULL,
  `MaNV` varchar(11) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `NgayLapPhieu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudathang`
--

INSERT INTO `phieudathang` (`MaPhieuDatH`, `MaNV`, `MaNCC`, `NgayLapPhieu`) VALUES
(1, 'NV08', 1, '2023-10-10'),
(2, 'NV09', 2, '2024-02-10'),
(3, 'NV10', 3, '2024-03-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudoihang`
--

CREATE TABLE `phieudoihang` (
  `MaPhieuDoiH` int(11) NOT NULL,
  `MaNV` varchar(11) NOT NULL,
  `MaHDB` int(11) NOT NULL,
  `Tinhtrang` varchar(20) NOT NULL,
  `NgayLapPhieu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudoihang`
--

INSERT INTO `phieudoihang` (`MaPhieuDoiH`, `MaNV`, `MaHDB`, `Tinhtrang`, `NgayLapPhieu`) VALUES
(1, 'NV08', 1, 'Chưa xử lí', '2023-09-20'),
(2, 'NV09', 2, 'Chưa xử lí', '2024-03-20'),
(3, 'NV10', 3, 'Chưa xử lí', '2024-04-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieukiemkehang`
--

CREATE TABLE `phieukiemkehang` (
  `MaPhieuKKH` int(11) NOT NULL,
  `MaNV` varchar(11) NOT NULL,
  `NgayLapPhieu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieukiemkehang`
--

INSERT INTO `phieukiemkehang` (`MaPhieuKKH`, `MaNV`, `NgayLapPhieu`) VALUES
(1, 'NV08', '2024-03-05'),
(2, 'NV09', '2024-04-05'),
(3, 'NV10', '2024-04-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuathang`
--

CREATE TABLE `phieuxuathang` (
  `MaPhieuXuatH` int(11) NOT NULL,
  `MaNV` varchar(11) NOT NULL,
  `MaPhieuYCXH` int(11) NOT NULL,
  `NgayLapPhieu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuxuathang`
--

INSERT INTO `phieuxuathang` (`MaPhieuXuatH`, `MaNV`, `MaPhieuYCXH`, `NgayLapPhieu`) VALUES
(1, 'NV08', 1, '2024-03-25'),
(2, 'NV09', 2, '2024-04-25'),
(3, 'NV10', 3, '2024-05-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuyeucaugiaobuhang`
--

CREATE TABLE `phieuyeucaugiaobuhang` (
  `MaPhieuYCGBH` int(11) NOT NULL,
  `MaPhieuDatH` int(11) NOT NULL,
  `MaNV` varchar(11) NOT NULL,
  `ThoiGianGiao` date NOT NULL,
  `DiaDiemGiao` varchar(50) NOT NULL,
  `NgayLapPhieu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuyeucaugiaobuhang`
--

INSERT INTO `phieuyeucaugiaobuhang` (`MaPhieuYCGBH`, `MaPhieuDatH`, `MaNV`, `ThoiGianGiao`, `DiaDiemGiao`, `NgayLapPhieu`) VALUES
(1, 1, 'NV01', '2024-03-27', 'Nam Định', '2023-10-26'),
(2, 2, 'NV04', '2024-04-27', 'Hà Nội', '2024-02-28'),
(3, 3, 'NV06', '2024-05-04', 'Hà Nội', '2024-03-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuyeucauxuathang`
--

CREATE TABLE `phieuyeucauxuathang` (
  `MaPhieuYCXH` int(11) NOT NULL,
  `MaNV` varchar(11) NOT NULL,
  `NgayLapPhieu` date NOT NULL,
  `MaHDB` int(11) NOT NULL,
  `Tinhtrang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuyeucauxuathang`
--

INSERT INTO `phieuyeucauxuathang` (`MaPhieuYCXH`, `MaNV`, `NgayLapPhieu`, `MaHDB`, `Tinhtrang`) VALUES
(1, 'NV08', '2024-03-20', 1, 'Chưa xử lí'),
(2, 'NV09', '2024-04-20', 2, 'Chưa xử lí'),
(3, 'NV10', '2024-04-30', 3, 'Chưa xử lí');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pnh`
--

CREATE TABLE `pnh` (
  `MaPhieuNhapH` int(11) NOT NULL,
  `MaNV` varchar(11) NOT NULL,
  `MaPhieuDatH` int(11) NOT NULL,
  `NgayLapPhieu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pnh`
--

INSERT INTO `pnh` (`MaPhieuNhapH`, `MaNV`, `MaPhieuDatH`, `NgayLapPhieu`) VALUES
(1, 'NV03', 1, '2023-10-15'),
(2, 'NV03', 2, '2024-02-16'),
(3, 'NV03', 3, '2024-03-16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethdb`
--
ALTER TABLE `chitiethdb`
  ADD PRIMARY KEY (`MaCTHDB`),
  ADD KEY `MaHDB` (`MaHDB`),
  ADD KEY `MaHang` (`MaHang`);

--
-- Chỉ mục cho bảng `chitietpdh`
--
ALTER TABLE `chitietpdh`
  ADD PRIMARY KEY (`MaCTPDH`),
  ADD KEY `MaPhieuDatH` (`MaPhieuDatH`),
  ADD KEY `MaHang` (`MaHang`);

--
-- Chỉ mục cho bảng `chitietpdoih`
--
ALTER TABLE `chitietpdoih`
  ADD PRIMARY KEY (`MaCTPDoiH`),
  ADD KEY `MaPhieuDoiH` (`MaPhieuDoiH`),
  ADD KEY `MaHang` (`MaHang`);

--
-- Chỉ mục cho bảng `chitietphieukkh`
--
ALTER TABLE `chitietphieukkh`
  ADD PRIMARY KEY (`MaCTPKKH`),
  ADD KEY `MaPhieuKKH` (`MaPhieuKKH`),
  ADD KEY `MaHang` (`MaHang`);

--
-- Chỉ mục cho bảng `chitietpnh`
--
ALTER TABLE `chitietpnh`
  ADD PRIMARY KEY (`MaCTPNH`),
  ADD KEY `MaPhieuNhapH` (`MaPhieuNhapH`),
  ADD KEY `MaHang` (`MaHang`);

--
-- Chỉ mục cho bảng `chitietpxh`
--
ALTER TABLE `chitietpxh`
  ADD PRIMARY KEY (`MaCTPXH`),
  ADD KEY `MaPhieuXuatH` (`MaPhieuXuatH`),
  ADD KEY `MaHang` (`MaHang`);

--
-- Chỉ mục cho bảng `chitietpycgbh`
--
ALTER TABLE `chitietpycgbh`
  ADD PRIMARY KEY (`MaCTPYCGBH`),
  ADD KEY `MaPhieuYCGBH` (`MaPhieuYCGBH`),
  ADD KEY `MaHang` (`MaHang`);

--
-- Chỉ mục cho bảng `chitietpycxh`
--
ALTER TABLE `chitietpycxh`
  ADD PRIMARY KEY (`MaCTPYCXH`),
  ADD KEY `MaPhieuYCXH` (`MaPhieuYCXH`),
  ADD KEY `MaHang` (`MaHang`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MaHang`),
  ADD KEY `fk_maloaihang` (`MaLoaiHang`),
  ADD KEY `fk_mancc` (`MaNCC`);

--
-- Chỉ mục cho bảng `hdb`
--
ALTER TABLE `hdb`
  ADD PRIMARY KEY (`MaHDB`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MaKH` (`MaKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`IDNhanvien`);

--
-- Chỉ mục cho bảng `phieudathang`
--
ALTER TABLE `phieudathang`
  ADD PRIMARY KEY (`MaPhieuDatH`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MaNCC` (`MaNCC`);

--
-- Chỉ mục cho bảng `phieudoihang`
--
ALTER TABLE `phieudoihang`
  ADD PRIMARY KEY (`MaPhieuDoiH`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MaHDB` (`MaHDB`);

--
-- Chỉ mục cho bảng `phieukiemkehang`
--
ALTER TABLE `phieukiemkehang`
  ADD PRIMARY KEY (`MaPhieuKKH`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Chỉ mục cho bảng `phieuxuathang`
--
ALTER TABLE `phieuxuathang`
  ADD PRIMARY KEY (`MaPhieuXuatH`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MaPhieuYCXH` (`MaPhieuYCXH`);

--
-- Chỉ mục cho bảng `phieuyeucaugiaobuhang`
--
ALTER TABLE `phieuyeucaugiaobuhang`
  ADD PRIMARY KEY (`MaPhieuYCGBH`),
  ADD KEY `MaPhieuDatH` (`MaPhieuDatH`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Chỉ mục cho bảng `phieuyeucauxuathang`
--
ALTER TABLE `phieuyeucauxuathang`
  ADD PRIMARY KEY (`MaPhieuYCXH`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `FK_MaHDB_PhieuYeuCauXuatHang` (`MaHDB`);

--
-- Chỉ mục cho bảng `pnh`
--
ALTER TABLE `pnh`
  ADD PRIMARY KEY (`MaPhieuNhapH`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MaPhieuDatH` (`MaPhieuDatH`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethdb`
--
ALTER TABLE `chitiethdb`
  MODIFY `MaCTHDB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chitietpdh`
--
ALTER TABLE `chitietpdh`
  MODIFY `MaCTPDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chitietphieukkh`
--
ALTER TABLE `chitietphieukkh`
  MODIFY `MaCTPKKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chitietpnh`
--
ALTER TABLE `chitietpnh`
  MODIFY `MaCTPNH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chitietpycgbh`
--
ALTER TABLE `chitietpycgbh`
  MODIFY `MaCTPYCGBH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chitietpycxh`
--
ALTER TABLE `chitietpycxh`
  MODIFY `MaCTPYCXH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hdb`
--
ALTER TABLE `hdb`
  MODIFY `MaHDB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phieudathang`
--
ALTER TABLE `phieudathang`
  MODIFY `MaPhieuDatH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `phieukiemkehang`
--
ALTER TABLE `phieukiemkehang`
  MODIFY `MaPhieuKKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `phieuyeucaugiaobuhang`
--
ALTER TABLE `phieuyeucaugiaobuhang`
  MODIFY `MaPhieuYCGBH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `phieuyeucauxuathang`
--
ALTER TABLE `phieuyeucauxuathang`
  MODIFY `MaPhieuYCXH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `pnh`
--
ALTER TABLE `pnh`
  MODIFY `MaPhieuNhapH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethdb`
--
ALTER TABLE `chitiethdb`
  ADD CONSTRAINT `chitiethdb_ibfk_1` FOREIGN KEY (`MaHDB`) REFERENCES `hdb` (`MaHDB`),
  ADD CONSTRAINT `chitiethdb_ibfk_2` FOREIGN KEY (`MaHang`) REFERENCES `hanghoa` (`MaHang`);

--
-- Các ràng buộc cho bảng `chitietpdh`
--
ALTER TABLE `chitietpdh`
  ADD CONSTRAINT `chitietpdh_ibfk_1` FOREIGN KEY (`MaPhieuDatH`) REFERENCES `phieudathang` (`MaPhieuDatH`),
  ADD CONSTRAINT `chitietpdh_ibfk_2` FOREIGN KEY (`MaHang`) REFERENCES `hanghoa` (`MaHang`);

--
-- Các ràng buộc cho bảng `chitietpdoih`
--
ALTER TABLE `chitietpdoih`
  ADD CONSTRAINT `chitietpdoih_ibfk_1` FOREIGN KEY (`MaPhieuDoiH`) REFERENCES `phieudoihang` (`MaPhieuDoiH`),
  ADD CONSTRAINT `chitietpdoih_ibfk_2` FOREIGN KEY (`MaHang`) REFERENCES `hanghoa` (`MaHang`);

--
-- Các ràng buộc cho bảng `chitietphieukkh`
--
ALTER TABLE `chitietphieukkh`
  ADD CONSTRAINT `chitietphieukkh_ibfk_1` FOREIGN KEY (`MaPhieuKKH`) REFERENCES `phieukiemkehang` (`MaPhieuKKH`),
  ADD CONSTRAINT `chitietphieukkh_ibfk_2` FOREIGN KEY (`MaHang`) REFERENCES `hanghoa` (`MaHang`);

--
-- Các ràng buộc cho bảng `chitietpnh`
--
ALTER TABLE `chitietpnh`
  ADD CONSTRAINT `chitietpnh_ibfk_1` FOREIGN KEY (`MaPhieuNhapH`) REFERENCES `pnh` (`MaPhieuNhapH`),
  ADD CONSTRAINT `chitietpnh_ibfk_2` FOREIGN KEY (`MaHang`) REFERENCES `hanghoa` (`MaHang`);

--
-- Các ràng buộc cho bảng `chitietpxh`
--
ALTER TABLE `chitietpxh`
  ADD CONSTRAINT `chitietpxh_ibfk_1` FOREIGN KEY (`MaPhieuXuatH`) REFERENCES `phieuxuathang` (`MaPhieuXuatH`),
  ADD CONSTRAINT `chitietpxh_ibfk_2` FOREIGN KEY (`MaHang`) REFERENCES `hanghoa` (`MaHang`);

--
-- Các ràng buộc cho bảng `chitietpycgbh`
--
ALTER TABLE `chitietpycgbh`
  ADD CONSTRAINT `chitietpycgbh_ibfk_1` FOREIGN KEY (`MaPhieuYCGBH`) REFERENCES `phieuyeucaugiaobuhang` (`MaPhieuYCGBH`),
  ADD CONSTRAINT `chitietpycgbh_ibfk_2` FOREIGN KEY (`MaHang`) REFERENCES `hanghoa` (`MaHang`);

--
-- Các ràng buộc cho bảng `chitietpycxh`
--
ALTER TABLE `chitietpycxh`
  ADD CONSTRAINT `chitietpycxh_ibfk_1` FOREIGN KEY (`MaPhieuYCXH`) REFERENCES `phieuyeucauxuathang` (`MaPhieuYCXH`),
  ADD CONSTRAINT `chitietpycxh_ibfk_2` FOREIGN KEY (`MaHang`) REFERENCES `hanghoa` (`MaHang`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `fk_maloaihang` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihang` (`MaLoaiHang`),
  ADD CONSTRAINT `fk_mancc` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`);

--
-- Các ràng buộc cho bảng `hdb`
--
ALTER TABLE `hdb`
  ADD CONSTRAINT `b` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`IDNhanvien`),
  ADD CONSTRAINT `hdb_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`);

--
-- Các ràng buộc cho bảng `phieudathang`
--
ALTER TABLE `phieudathang`
  ADD CONSTRAINT `phieudathang_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`IDNhanvien`),
  ADD CONSTRAINT `phieudathang_ibfk_2` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`);

--
-- Các ràng buộc cho bảng `phieudoihang`
--
ALTER TABLE `phieudoihang`
  ADD CONSTRAINT `phieudoihang_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`IDNhanvien`),
  ADD CONSTRAINT `phieudoihang_ibfk_2` FOREIGN KEY (`MaHDB`) REFERENCES `hdb` (`MaHDB`);

--
-- Các ràng buộc cho bảng `phieukiemkehang`
--
ALTER TABLE `phieukiemkehang`
  ADD CONSTRAINT `phieukiemkehang_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`IDNhanvien`);

--
-- Các ràng buộc cho bảng `phieuxuathang`
--
ALTER TABLE `phieuxuathang`
  ADD CONSTRAINT `phieuxuathang_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`IDNhanvien`),
  ADD CONSTRAINT `phieuxuathang_ibfk_2` FOREIGN KEY (`MaPhieuYCXH`) REFERENCES `phieuyeucauxuathang` (`MaPhieuYCXH`);

--
-- Các ràng buộc cho bảng `phieuyeucaugiaobuhang`
--
ALTER TABLE `phieuyeucaugiaobuhang`
  ADD CONSTRAINT `phieuyeucaugiaobuhang_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`IDNhanvien`),
  ADD CONSTRAINT `phieuyeucaugiaobuhang_ibfk_2` FOREIGN KEY (`MaPhieuDatH`) REFERENCES `phieudathang` (`MaPhieuDatH`);

--
-- Các ràng buộc cho bảng `phieuyeucauxuathang`
--
ALTER TABLE `phieuyeucauxuathang`
  ADD CONSTRAINT `fk` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`IDNhanvien`),
  ADD CONSTRAINT `phieuyeucauxuathang_ibfk_1` FOREIGN KEY (`MaHDB`) REFERENCES `hdb` (`MaHDB`);

--
-- Các ràng buộc cho bảng `pnh`
--
ALTER TABLE `pnh`
  ADD CONSTRAINT `pnh_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`IDNhanvien`),
  ADD CONSTRAINT `pnh_ibfk_2` FOREIGN KEY (`MaPhieuDatH`) REFERENCES `phieudathang` (`MaPhieuDatH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
