-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 16, 2022 lúc 08:50 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bcvh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bgt_report`
--

CREATE TABLE `bgt_report` (
  `id_bgt_report` int(11) NOT NULL,
  `filename` varchar(40) CHARACTER SET utf8 NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bgt_report`
--

INSERT INTO `bgt_report` (`id_bgt_report`, `filename`, `time`) VALUES
(1, 'BGT-CNTT Tháng 2-2022.pdf', '2022-03-08'),
(2, 'BGT-CNTT Tháng 1-2022.pdf', '2022-02-08'),
(3, 'BGT-CNTT Tháng 2-2021.pdf', '2021-03-08'),
(4, 'BGT-CNTT Tháng 3-2021.pdf', '2021-04-08'),
(5, 'BGT-CNTT Tháng 4-2021.pdf', '2021-05-10'),
(6, 'BGT-CNTT Tháng 5-2021.pdf', '2021-06-08'),
(7, 'BGT-CNTT Tháng 6-2021.pdf', '2021-07-08'),
(8, 'BGT-CNTT Tháng 7-2021.pdf', '2021-08-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `problem`
--

CREATE TABLE `problem` (
  `id_problem` int(11) NOT NULL,
  `id_software` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  `problem_detail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `solution` varchar(100) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `time_start` date NOT NULL,
  `time_end` date NOT NULL,
  `status` int(1) NOT NULL COMMENT '0-deleted,1-active,2-closed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `problem`
--

INSERT INTO `problem` (`id_problem`, `id_software`, `id_user`, `problem_detail`, `solution`, `image`, `time_start`, `time_end`, `status`) VALUES
(1, 1, 3, 'Doanh thu eTicket lỗi doanh thu thị trường, sản phẩm Max3D hiển thị lỗi', 'Đối tác AMS update lại dữ liệu', 'image_2022-03-15-07-24-57_623031398f8f90-02-06-4b8fba5275d0c9ca506c1535ec716ccb57faf83f150a012a7646911915bee3fb_d26a3a8cf9240b57.png', '2022-02-08', '2022-02-08', 1),
(2, 4, 3, 'Sai số liệu BC số vé trả thưởng theo giá trị', 'Đối tác FPT cập nhật lại số liệu', 'image_2022-03-15-07-26-34_6230319adb6540-02-06-306c4e00d883b8ae16ec9baddc78b0b09db0a85cd071028881b8bd6b6b7e3323_8fa249d24ac5b8af.png', '2022-02-07', '2022-02-07', 1),
(3, 4, 3, 'Quản lý tổng hợp vé thu hồi hiển thị chưa đúng theo chi nhánh', 'Đối tác FPT hiển thị lại dữ liệu theo chi nhánh', 'image_2022-03-15-07-28-00_623031f02dda10-02-06-385c4c2ce81aba64df40069abb3307ae616e609b806d45be73d32a472f7a812b_f35f20a745db597a.png', '2022-02-11', '2022-02-11', 1),
(4, 1, 3, 'Hiển thị thiếu dữ liệu ngày 04/01/2022', 'Đối tác AMS cập nhật lại dữ liệu', 'image_2022-03-15-08-23-33_62303ef5446c70501.png', '2022-01-05', '2022-01-05', 1),
(5, 1, 3, 'Số liệu hiển thị âm', 'Đối tác AMS cập nhật lại dữ liệu', 'image_2022-03-15-08-25-14_62303f5aa08241001.png', '2022-01-10', '2022-01-10', 1),
(6, 1, 3, 'Báo cáo tháng chưa có chỉ tiêu quý 1', 'Đối tác AMS bổ sung chỉ tiêu', 'image_2022-03-15-08-27-19_62303fd71692f2401.png', '2022-01-24', '2022-01-24', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report`
--

CREATE TABLE `report` (
  `id_report` int(11) NOT NULL,
  `filename` varchar(40) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `report`
--

INSERT INTO `report` (`id_report`, `filename`, `time`) VALUES
(1, 'Tháng 1-2022.pdf', '2022-03-02'),
(3, 'Tháng 1-2021.pdf', '2021-02-02'),
(4, 'Tháng 2-2021.pdf', '2021-03-02'),
(5, 'Tháng 3-2021.pdf', '2021-04-02'),
(6, 'Tháng 4-2021.pdf', '2021-05-03'),
(7, 'Tháng 5-2021.pdf', '2021-06-02'),
(8, 'Tháng 6-2021.pdf', '2021-07-02'),
(9, 'Tháng 7-2021.pdf', '2021-08-02'),
(10, 'Tháng 8-2021.pdf', '2021-09-02'),
(11, 'Tháng 9-2021.pdf', '2021-10-04'),
(12, 'Tháng 10-2021.pdf', '2021-11-02'),
(13, 'Tháng 11-2021.pdf', '2021-12-02'),
(14, 'Tháng 12-2021.pdf', '2022-01-03'),
(15, 'Tháng 2-2022.pdf', '2022-03-16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `software`
--

CREATE TABLE `software` (
  `id_software` int(2) NOT NULL,
  `software` varchar(30) NOT NULL,
  `id_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `software`
--

INSERT INTO `software` (`id_software`, `software`, `id_user`) VALUES
(1, 'Báo cáo thông minh', 3),
(2, 'Cổng thông tin điện tử', 3),
(3, 'Hỗ trợ kinh doanh', 2),
(4, 'Quản trị tập trung ERP', 3),
(5, 'Quản trị nhân sự', 2),
(6, 'Trang thiết bị', 2),
(7, 'Văn phòng điện tử', 2),
(8, 'Hệ thống mạng, bảo mật', 5),
(9, 'Hệ thống máy chủ', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(11) NOT NULL,
  `role` int(1) NOT NULL COMMENT '1-admin,2-viewer,3-manager'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', 'Cntt@3456', 1),
(2, 'phamngocquang', '123456', 3),
(3, 'nguyenthephong', '123456', 3),
(4, 'nguyenthanhminh', '123456a@', 2),
(5, 'nguyentrongtai', 'Vietlott123', 3),
(6, 'voquangvinh', 'Cntt1234', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `year`
--

CREATE TABLE `year` (
  `id` int(11) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `year`
--

INSERT INTO `year` (`id`, `year`) VALUES
(1, '2021'),
(2, '2022');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bgt_report`
--
ALTER TABLE `bgt_report`
  ADD PRIMARY KEY (`id_bgt_report`);

--
-- Chỉ mục cho bảng `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`id_problem`);

--
-- Chỉ mục cho bảng `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id_report`);

--
-- Chỉ mục cho bảng `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id_software`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bgt_report`
--
ALTER TABLE `bgt_report`
  MODIFY `id_bgt_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `problem`
--
ALTER TABLE `problem`
  MODIFY `id_problem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `report`
--
ALTER TABLE `report`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `software`
--
ALTER TABLE `software`
  MODIFY `id_software` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `year`
--
ALTER TABLE `year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
