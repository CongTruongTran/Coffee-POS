-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 08, 2023 lúc 04:49 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `forcf_pos`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `IDCTHD` int(11) NOT NULL,
  `IDHoaDon` int(11) NOT NULL,
  `IDSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`IDCTHD`, `IDHoaDon`, `IDSanPham`, `SoLuong`, `Gia`, `ThanhTien`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 1, 10000, 10000, '2023-06-10 06:08:24', '0000-00-00 00:00:00'),
(2, 1, 11, 1, 15000, 15000, '2023-06-10 06:09:26', '0000-00-00 00:00:00'),
(3, 2, 11, 1, 15000, 15000, '2023-06-10 18:28:31', '0000-00-00 00:00:00'),
(4, 2, 10, 1, 15000, 15000, '2023-06-10 18:28:51', '0000-00-00 00:00:00'),
(5, 3, 10, 1, 15000, 15000, '2023-06-10 09:02:28', '0000-00-00 00:00:00'),
(6, 4, 11, 1, 15000, 15000, '2023-06-10 09:02:28', '2023-05-26 09:02:28'),
(7, 4, 15, 1, 10000, 10000, '2023-06-10 09:17:24', '0000-00-00 00:00:00'),
(8, 4, 13, 1, 15000, 15000, '2023-06-10 09:17:24', '0000-00-00 00:00:00'),
(9, 5, 16, 1, 10000, 10000, '2023-06-10 09:18:29', '0000-00-00 00:00:00'),
(10, 6, 12, 1, 15000, 15000, '2023-06-11 09:18:29', '0000-00-00 00:00:00'),
(11, 7, 12, 1, 15000, 15000, '2023-06-11 09:19:10', '0000-00-00 00:00:00'),
(12, 8, 16, 1, 10000, 10000, '2023-06-11 09:19:11', '0000-00-00 00:00:00'),
(13, 9, 15, 1, 10000, 10000, '2023-06-11 09:20:02', '0000-00-00 00:00:00'),
(14, 10, 10, 1, 10000, 10000, '2023-06-11 09:20:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsp`
--

CREATE TABLE `danhmucsp` (
  `IDDanhMucSP` int(11) NOT NULL,
  `TenDMSP` varchar(255) NOT NULL,
  `MoTa` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmucsp`
--

INSERT INTO `danhmucsp` (`IDDanhMucSP`, `TenDMSP`, `MoTa`, `created_at`, `updated_at`) VALUES
(1, 'Cà phê', 'những loại thức uống được làm từ cà phê nguyên chất giúp tỉnh táo  cho 1 ngày dài năng động', NULL, NULL),
(2, 'Nước uống có ga', 'các loại nước giải khát có ga', NULL, NULL),
(3, 'Đồ ăn vặt', 'những loại thức ăn nhẹ có thể ăn cùng khi uống cà phê,', NULL, NULL),
(4, 'Nước ép trái cây', 'những loại nước  uống được làm từ những trái cây tự nhiên tươi ngon nhất', NULL, NULL),
(8, 'Trà', 'các loại trà được làm từ các loại trái cây tự nhiên', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `IDHoaDon` int(11) NOT NULL,
  `IDNhanVien` int(11) NOT NULL,
  `TongTien` int(11) DEFAULT NULL,
  `TienNhan` int(11) DEFAULT NULL,
  `TienThua` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`IDHoaDon`, `IDNhanVien`, `TongTien`, `TienNhan`, `TienThua`, `created_at`, `updated_at`) VALUES
(1, 8, 25000, 50000, 25000, '2023-06-10 06:06:41', '0000-00-00 00:00:00'),
(2, 9, 30000, 30000, 0, '2023-06-10 18:28:09', '0000-00-00 00:00:00'),
(3, 8, 15000, NULL, NULL, '2023-06-10 09:00:36', '0000-00-00 00:00:00'),
(4, 8, 45000, NULL, NULL, '2023-06-10 09:00:36', '0000-00-00 00:00:00'),
(5, 8, 10000, NULL, NULL, '2023-06-10 09:01:07', '0000-00-00 00:00:00'),
(6, 8, 15000, NULL, NULL, '2023-06-11 09:01:07', '0000-00-00 00:00:00'),
(7, 9, 15000, NULL, NULL, '2023-06-11 09:01:26', '0000-00-00 00:00:00'),
(8, 9, 10000, NULL, NULL, '2023-06-11 09:01:26', '0000-00-00 00:00:00'),
(9, 9, 10000, NULL, NULL, '2023-06-11 09:01:48', '2023-05-26 09:01:48'),
(10, 9, 10000, NULL, NULL, '2023-06-11 09:01:50', '2023-05-26 09:01:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khohang`
--

CREATE TABLE `khohang` (
  `IDKhoHang` int(11) NOT NULL,
  `TenHang` varchar(100) NOT NULL,
  `SoLuongCon` int(11) NOT NULL,
  `DonViTinh` varchar(50) DEFAULT NULL,
  `IDNhaCC` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khohang`
--

INSERT INTO `khohang` (`IDKhoHang`, `TenHang`, `SoLuongCon`, `DonViTinh`, `IDNhaCC`, `created_at`, `updated_at`) VALUES
(1, 'Cà phê bột', 3, 'Bịch', 2, '2023-05-27 17:24:22', '2023-06-07 15:35:02'),
(2, 'sữa tươi không đường', 1, 'Thùng', 2, '2023-05-27 23:15:30', '2023-05-27 17:25:33'),
(3, 'ghế', 100, 'Cái', 1, '2023-05-28 18:26:02', '2023-05-29 16:49:52'),
(4, 'Bàn', 13, 'Cái', 1, '2023-05-28 18:26:02', '2023-05-29 17:34:56'),
(5, 'Ly', 120, 'Cái', 5, '2023-05-28 18:26:54', '2023-06-02 10:30:35'),
(6, 'Ống hút', 20, 'Bịch', 5, '2023-05-28 18:26:54', '2023-05-28 18:26:54'),
(7, 'Máy xay cà phê', 3, 'Cái', 4, '2023-05-28 18:28:22', '2023-06-02 10:31:02'),
(8, 'Máy ép nước cam', 1, 'Cái', 4, '2023-05-28 18:28:22', '2023-05-28 18:28:22'),
(9, 'miếng lót ly', 100, 'cái', 5, NULL, '2023-05-29 16:17:06'),
(10, 'cà phê xay', 2, 'bịch', 2, '2023-06-07 15:36:40', '2023-06-07 15:38:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsunhaphang`
--

CREATE TABLE `lichsunhaphang` (
  `IDLichSuNH` int(11) NOT NULL,
  `IDKhoHang` int(11) NOT NULL,
  `IDNhanVien` int(11) NOT NULL,
  `SoLuongNhap` int(11) NOT NULL,
  `Gia` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL,
  `TinhTrang` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lichsunhaphang`
--

INSERT INTO `lichsunhaphang` (`IDLichSuNH`, `IDKhoHang`, `IDNhanVien`, `SoLuongNhap`, `Gia`, `ThanhTien`, `TinhTrang`, `created_at`, `updated_at`) VALUES
(3, 2, 8, 1, 10000, 10000, NULL, '2023-05-29 18:22:46', '2023-05-29 18:22:46'),
(4, 1, 8, 1, 15000, 15000, NULL, '2023-05-29 18:22:47', '2023-05-29 18:22:47'),
(5, 4, 8, 1, 200000, 200000, NULL, '2023-05-29 17:17:20', '2023-05-29 17:17:20'),
(6, 4, 8, 2, 200000, 400000, NULL, '2023-05-29 17:34:56', '2023-05-29 17:34:56'),
(7, 5, 8, 20, 20000, 400000, 'chưa thanh toán', '2023-06-02 10:30:35', '2023-06-02 10:30:35'),
(8, 7, 8, 1, 500000, 500000, 'đã thanh toán', '2023-06-02 10:31:02', '2023-06-02 10:31:02'),
(9, 10, 8, 2, 200000, 400000, 'đã thanh toán', '2023-06-07 15:38:49', '2023-06-07 15:38:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `IDNhaCC` int(11) NOT NULL,
  `TenNhaCC` varchar(100) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SĐTh` int(10) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`IDNhaCC`, `TenNhaCC`, `DiaChi`, `SĐTh`, `Email`) VALUES
(1, 'Công Ty Bàn Ghế ABC', 'Quảng Nam', 97234273, 'ctybanghe@gmail.com'),
(2, 'Công ty cà phê Trung Nguyên', 'Nguyễn Văn Linh, Đà Nẵng', 42341255, 'cafetrungnguyen@gmail.com'),
(4, 'Công ty vật liệu pha chế SB Center', 'Đà nẵng', 234773242, 'sbcenter@gmail.com'),
(5, 'Siêu Thị Dụng Cụ Roaster', 'Đà nẵng', 123712832, 'roaster@gmail.com'),
(6, 'Công ty hương liệu tổng hợp select', 'Đà nẵng', 234792342, 'select@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `IDNhanVien` int(11) NOT NULL,
  `IDThongTinNV` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `IDQuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`IDNhanVien`, `IDThongTinNV`, `email`, `password`, `IDQuyen`) VALUES
(8, 12, 'admin@gmail.com', '$2y$10$0kAMlv19hP9zeZ90eNF0nORSD5nCVLVw.M7xxNFS3ZLGvoi6v0A6i', 1),
(9, 14, 'truong@gmail.com', '$2y$10$Pd.7aBL1ruhcBmym8uZ6HuJGeqibgcAvjI3WIsZ0hSTkdlCMDd/Xm', 2),
(10, 15, 'anh@gmail.com', '$2y$10$QvupW08TgUWfxzq5SpHveepCr2JgjyqpKvgrVqCyQNF4wlNdrlmVG', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `IDQuyen` int(11) NOT NULL,
  `TenQuyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`IDQuyen`, `TenQuyen`) VALUES
(1, 'Admin'),
(2, 'Nhân Viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `IDSanPham` int(11) NOT NULL,
  `TenSP` varchar(100) NOT NULL,
  `Gia` int(11) NOT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `DonViTinh` varchar(50) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `IDDanhMucSP` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`IDSanPham`, `TenSP`, `Gia`, `HinhAnh`, `DonViTinh`, `MoTa`, `IDDanhMucSP`, `created_at`, `updated_at`) VALUES
(9, 'CoCa-CoLa', 10000, 'coca.jpg', 'Chai', 'các loại nước giải khát có ga', 2, NULL, NULL),
(10, 'nước ép dưa hấu', 15000, 'nedh.jpg', 'Ly', 'nước ép dưa hấu thơm ngon', 4, NULL, NULL),
(11, 'nước ép dứa', 15000, 'ned.jpg', 'Ly', 'ước ép dưa hấu thơm ngon', 4, NULL, NULL),
(12, 'cà phê đen', 10000, 'cfDen.jpg', 'Ly', 'cà phê đen', 1, NULL, NULL),
(13, 'cà phê trứng', 20000, 'cfTrung.jpeg', 'Ly', 'cà phê trứng', 1, NULL, NULL),
(14, 'bánh Flan', 10000, 'banhFlan.jpg', 'Đĩa', 'bánh ăn kèm', 3, NULL, NULL),
(15, 'Bánh Cupcake', 10000, 'Cupcake.jpg', 'Đĩa', 'bánh ăn kèm', 3, NULL, NULL),
(16, 'Trà chanh', 15000, 'traChanh.jpeg', 'Ly', 'trà thiên nhiên', 8, NULL, NULL),
(21, 'Bánh Cookie', 5000, 'Banhcookie.jpg', 'Cái', 'bánh ăn kèm', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinnv`
--

CREATE TABLE `thongtinnv` (
  `IDThongTinNV` int(11) NOT NULL,
  `TenNV` varchar(100) NOT NULL,
  `SĐTh` int(10) NOT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `GioiTinh` varchar(10) DEFAULT NULL,
  `ChucVu` varchar(50) NOT NULL,
  `HinhAnh` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongtinnv`
--

INSERT INTO `thongtinnv` (`IDThongTinNV`, `TenNV`, `SĐTh`, `DiaChi`, `GioiTinh`, `ChucVu`, `HinhAnh`, `created_at`, `updated_at`) VALUES
(12, 'admin', 23423423, 'Thanh Binh, Đà Nẵng', 'Nam', 'Quản lí', 'admin.png', '2023-05-20 15:45:00', '2023-06-07 16:32:03'),
(14, 'Truong', 866700150, 'Quảng Nam', 'Nam', 'Nhân viên', 'avata.jpg', '2023-05-21 00:45:00', '2023-06-05 16:01:55'),
(15, 'Anh', 234237846, 'Quảng Nam', 'Nam', 'Nhân viên', 'a7de431308aacdf494bb.jpg', '2023-06-02 00:59:00', '2023-06-01 18:00:19');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`IDCTHD`),
  ADD KEY `IDHoaDon` (`IDHoaDon`),
  ADD KEY `IDSanPham` (`IDSanPham`);

--
-- Chỉ mục cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD PRIMARY KEY (`IDDanhMucSP`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`IDHoaDon`),
  ADD KEY `IDNhanVien` (`IDNhanVien`);

--
-- Chỉ mục cho bảng `khohang`
--
ALTER TABLE `khohang`
  ADD PRIMARY KEY (`IDKhoHang`),
  ADD KEY `IDNhaCC` (`IDNhaCC`);

--
-- Chỉ mục cho bảng `lichsunhaphang`
--
ALTER TABLE `lichsunhaphang`
  ADD PRIMARY KEY (`IDLichSuNH`),
  ADD KEY `IDKhoHang` (`IDKhoHang`),
  ADD KEY `IDNhanVien` (`IDNhanVien`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`IDNhaCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`IDNhanVien`),
  ADD KEY `IDThongTinNV` (`IDThongTinNV`),
  ADD KEY `IDQuyen` (`IDQuyen`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`IDQuyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`IDSanPham`),
  ADD KEY `IDDanhMucSP` (`IDDanhMucSP`);

--
-- Chỉ mục cho bảng `thongtinnv`
--
ALTER TABLE `thongtinnv`
  ADD PRIMARY KEY (`IDThongTinNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `IDCTHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  MODIFY `IDDanhMucSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `IDHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `khohang`
--
ALTER TABLE `khohang`
  MODIFY `IDKhoHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `lichsunhaphang`
--
ALTER TABLE `lichsunhaphang`
  MODIFY `IDLichSuNH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `IDNhaCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `IDNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `IDQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `IDSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `thongtinnv`
--
ALTER TABLE `thongtinnv`
  MODIFY `IDThongTinNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`IDHoaDon`) REFERENCES `hoadon` (`IDHoaDon`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`IDSanPham`) REFERENCES `sanpham` (`IDSanPham`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_3` FOREIGN KEY (`IDNhanVien`) REFERENCES `nhanvien` (`IDNhanVien`);

--
-- Các ràng buộc cho bảng `khohang`
--
ALTER TABLE `khohang`
  ADD CONSTRAINT `khohang_ibfk_1` FOREIGN KEY (`IDNhaCC`) REFERENCES `nhacungcap` (`IDNhaCC`);

--
-- Các ràng buộc cho bảng `lichsunhaphang`
--
ALTER TABLE `lichsunhaphang`
  ADD CONSTRAINT `lichsunhaphang_ibfk_1` FOREIGN KEY (`IDKhoHang`) REFERENCES `khohang` (`IDKhoHang`),
  ADD CONSTRAINT `lichsunhaphang_ibfk_2` FOREIGN KEY (`IDNhanVien`) REFERENCES `nhanvien` (`IDNhanVien`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`IDThongTinNV`) REFERENCES `thongtinnv` (`IDThongTinNV`),
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`IDQuyen`) REFERENCES `quyen` (`IDQuyen`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`IDDanhMucSP`) REFERENCES `danhmucsp` (`IDDanhMucSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
