-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 10:49 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronic_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandID` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandID`, `catID`, `brandName`) VALUES
(2, 5, 'Dell'),
(6, 16, 'Apple Watch'),
(7, 1, 'Oppo'),
(10, 17, 'No.Brand'),
(11, 11, 'SanDisk'),
(13, 5, 'MacBook'),
(14, 5, 'Asus'),
(15, 5, 'HP'),
(16, 16, 'Garmin'),
(18, 1, 'Sam Sung'),
(19, 1, 'iPhone'),
(20, 1, 'Xiaomi'),
(26, 21, 'Sony'),
(27, 21, 'LG'),
(28, 22, 'iPad'),
(29, 22, 'Lenovo'),
(30, 16, 'DW');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartDetaiID` int(11) NOT NULL,
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quatity` int(11) NOT NULL,
  `colorID` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartDetaiID`, `cartID`, `productID`, `productName`, `price`, `quatity`, `colorID`, `cost`, `status`) VALUES
(48, 27, 52, 'Asus TUF Gaming FX506LI i5', '21200000', 1, 'Màu Đen', '21200000', 2),
(49, 28, 54, 'Laptop HP ProBook', '18550000', 1, 'Màu Xanh', '18550000', 2),
(50, 28, 53, 'Laptop HP 348 G7 i5', '15225000', 1, 'Màu Xanh', '15225000', 2),
(51, 28, 53, 'Laptop HP 348 G7 i5', '15225000', 1, 'Màu Xám', '15225000', 2),
(52, 30, 53, 'Laptop HP 348 G7 i5', '15225000', 1, 'Màu Xanh', '15225000', 2),
(53, 30, 52, 'Asus TUF Gaming FX506LI i5', '21200000', 2, 'Màu Xám', '42400000', 2),
(54, 30, 49, 'Đồng hồ thông minh Garmin Venu', '4968000', 2, 'Màu Đen', '9936000', 2),
(55, 31, 35, 'Apple Watch S6', '9720000', 1, 'Màu Bạc', '9720000', 2),
(56, 31, 43, 'Máy tính bảng iPad Pro 11', '21400000', 1, 'Màu Trắng', '21400000', 2),
(57, 31, 43, 'Máy tính bảng iPad Pro 11', '21400000', 1, 'Màu Bạc', '21400000', 2),
(58, 32, 55, 'Laptop HP Pavilion', '14445000', 1, 'Màu Tím', '14445000', 2),
(59, 32, 50, 'Laptop Dell Inspiron 7501 i7', '31320000', 1, 'Màu Đen', '31320000', 2),
(60, 33, 47, 'Đồng hồ thông minh Garmin Lily', '4770000', 2, 'Màu Xanh', '9540000', 2),
(61, 33, 58, 'OPPO Reno5', '11445000', 1, 'Màu Xanh', '11445000', 2),
(62, 34, 57, 'Samsung Galaxy S21', '21255000', 1, 'Màu Xanh', '21255000', 2),
(63, 34, 59, 'Xiaomi Redmi Note 10', '7208000', 1, 'Màu Đen', '7208000', 2),
(64, 35, 23, 'Apple MacBook Pro M1 2020', '33000000', 1, 'Màu Tím', '33000000', 2),
(65, 35, 15, 'USB OTG 31', '1050000', 1, 'Màu Đen', '1050000', 2),
(66, 36, 27, 'iPhone 11 256GB', '20520000', 1, 'Màu Đen', '20520000', 2),
(67, 36, 30, 'Xiaomi Mi 11 Lite', '7700000', 1, 'Màu Đen', '7700000', 2),
(68, 38, 16, 'Thẻ Nhớ 200GB zx1', '840000', 1, 'Màu Đen', '840000', 2),
(69, 38, 16, 'Thẻ Nhớ 200GB zx1', '840000', 1, 'Màu Bạc', '840000', 2),
(70, 38, 25, 'Asus ZenBook UX425EA i5', '22000000', 1, 'Màu Bạc', '22000000', 2),
(71, 38, 11, 'Đồng Hồ BlackS DW', '5250000', 1, 'Màu Đen', '5250000', 2),
(72, 39, 22, 'Laptop Apple MacBook Air 2017 i5', '19800000', 1, 'Màu Tím', '19800000', 2),
(73, 39, 20, 'Dell XPS 13-9 2301', '11500000', 1, 'Màu Xanh', '11500000', 2),
(74, 39, 59, 'Xiaomi Redmi Note 10', '7208000', 1, 'Màu Đen', '7208000', 2),
(75, 40, 19, 'MacBook Pro Max 2101 2030', '33000000', 1, 'Màu Đen', '33000000', 2),
(76, 40, 56, 'Điện thoại iPhone 12 Pro Max', '41730000', 1, 'Màu Xanh', '41730000', 2),
(77, 41, 26, 'iPhone 12 64GB', '23100000', 1, 'Màu Xanh', '23100000', 2),
(78, 41, 24, 'Asus VivoBook X515MA', '7150000', 1, 'Màu Xanh', '7150000', 2),
(79, 41, 39, 'Tai nghe chụp tai Bluetooth Sony', '4770000', 1, 'Màu Đen', '4770000', 2),
(80, 42, 41, 'Máy tính bảng iPad Air 4', '16895000', 1, 'Màu Xanh', '16895000', 2),
(81, 42, 40, 'Tai nghe Bluetooth True Wireless LG', '1089000', 2, 'Màu Xanh', '2178000', 2),
(82, 42, 44, 'Lenovo Tab M10 - FHD Plus', '5238000', 1, 'Màu Bạc', '5238000', 2),
(83, 44, 59, 'Xiaomi Redmi Note 10', '7208000', 2, 'Màu Đỏ', '14416000', 2),
(84, 44, 30, 'Xiaomi Mi 11 Lite', '7700000', 1, 'Màu Đen', '7700000', 2),
(85, 44, 30, 'Xiaomi Mi 11 Lite', '7700000', 1, 'Màu Đỏ', '7700000', 2),
(88, 59, 42, 'Máy tính bảng iPad Pro', '28080000', 2, 'Màu Trắng', '56160000', 2),
(89, 59, 57, 'Samsung Galaxy S21', '21255000', 1, 'Màu Đỏ', '21255000', 2),
(90, 60, 31, 'Xiaomi Mi 10T Pro 5G', '13440000', 1, 'Màu Xanh', '13440000', 2),
(91, 60, 59, 'Xiaomi Redmi Note 10', '7208000', 1, 'Màu Đen', '7208000', 2),
(92, 60, 51, 'Laptop Dell G5 15 5500 i7', '34650000', 1, 'Màu Đen', '34650000', 2),
(93, 61, 27, 'iPhone 11 256GB', '20520000', 1, 'Màu Đen', '20520000', 2),
(94, 61, 55, 'Laptop HP Pavilion', '14445000', 1, 'Màu Tím', '14445000', 2),
(95, 62, 15, 'USB OTG 31', '1050000', 1, 'Màu Đen', '1050000', 2),
(96, 62, 40, 'Tai nghe Bluetooth True Wireless LG', '1089000', 1, 'Màu Xanh', '1089000', 2),
(97, 62, 46, 'Apple Watch S5', '10165000', 1, 'Màu Đen', '10165000', 2),
(98, 63, 58, 'OPPO Reno5', '11445000', 3, 'Màu Tím', '34335000', 2),
(99, 63, 55, 'Laptop HP Pavilion', '14445000', 2, 'Màu Trắng', '28890000', 2),
(100, 64, 61, 'Samsung Galaxy Z Fold2 5G', '52500000', 1, 'Màu Tím', '52500000', 2),
(101, 64, 61, 'Samsung Galaxy Z Fold2 5G', '52500000', 1, 'Màu Hồng', '52500000', 2),
(102, 64, 60, 'Điện thoại OPPO Reno4 Pro', '11000000', 1, 'Màu Xanh', '11000000', 2),
(103, 65, 56, 'Điện thoại iPhone 12 Pro Max', '41730000', 2, 'Màu Xanh', '83460000', 2),
(104, 65, 47, 'Đồng hồ thông minh Garmin Lily', '4770000', 1, 'Màu Xanh', '4770000', 2),
(105, 65, 23, 'Apple MacBook Pro M1 2020', '33000000', 1, 'Màu Tím', '33000000', 2),
(106, 66, 51, 'Laptop Dell G5 15 5500 i7', '34650000', 1, 'Màu Đen', '34650000', 2),
(107, 66, 15, 'USB OTG 31', '1050000', 2, 'Màu Đỏ', '2100000', 2),
(108, 66, 57, 'Samsung Galaxy S21', '21255000', 2, 'Màu Xanh', '42510000', 2),
(109, 67, 59, 'Xiaomi Redmi Note 10', '7150000', 1, 'Màu Đen', '7150000', 2),
(110, 67, 59, 'Xiaomi Redmi Note 10', '7150000', 1, 'Màu Xám', '7150000', 2),
(111, 67, 58, 'OPPO Reno5', '11445000', 1, 'Màu Xanh', '11445000', 2),
(112, 67, 57, 'Samsung Galaxy S21', '21255000', 2, 'Màu Xanh', '42510000', 2),
(113, 68, 53, 'Laptop HP 348 G7 i5', '15225000', 1, 'Màu Xanh', '15225000', 1),
(114, 68, 52, 'Asus TUF Gaming FX506LI i5', '21200000', 2, 'Màu Đen', '42400000', 1),
(115, 68, 50, 'Laptop Dell Inspiron 7501 i7', '31320000', 1, 'Màu Đen', '31320000', 1),
(116, 68, 25, 'Asus ZenBook UX425EA i5', '22000000', 1, 'Màu Đen', '22000000', 1),
(117, 69, 52, 'Asus TUF Gaming FX506LI i5', '21200000', 1, 'Màu Đen', '21200000', 2),
(118, 69, 18, 'Dell GPS 1203 2021', '17600000', 1, 'Màu Tím', '17600000', 2),
(119, 69, 20, 'Dell XPS 13-9 2301', '11500000', 1, 'Màu Xanh', '11500000', 2),
(120, 69, 23, 'Apple MacBook Pro M1 2020', '33000000', 2, 'Màu Tím', '66000000', 2),
(121, 70, 63, 'Samsung Galaxy S10 Lite', '9810000', 1, 'Màu Xanh', '9810000', 2),
(122, 70, 63, 'Samsung Galaxy S10 Lite', '9810000', 1, 'Màu Bạc', '9810000', 2),
(123, 70, 62, 'OPPO A74 5G', '7920000', 1, 'Màu Tím', '7920000', 2),
(124, 70, 62, 'OPPO A74 5G', '7920000', 1, 'Màu Xám', '7920000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_list`
--

CREATE TABLE `tbl_cart_list` (
  `cartID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `cost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart_list`
--

INSERT INTO `tbl_cart_list` (`cartID`, `memberID`, `date`, `cost`) VALUES
(27, 2, '2020-10-22 14:52:09', '21215000'),
(28, 2, '2020-11-04 14:52:30', '49015000'),
(30, 2, '2020-11-28 14:55:23', '67576000'),
(31, 2, '2020-12-08 14:56:17', '52535000'),
(32, 2, '2020-12-30 14:58:09', '45780000'),
(33, 2, '2021-01-08 14:59:14', '21000000'),
(34, 2, '2021-01-29 14:59:52', '28478000'),
(35, 2, '2021-02-05 15:00:57', '34065000'),
(36, 2, '2021-02-28 15:01:59', '28235000'),
(38, 2, '2021-03-26 15:03:26', '28945000'),
(39, 2, '2021-03-30 15:05:04', '38523000'),
(40, 2, '2021-04-08 15:10:46', '74745000'),
(41, 2, '2021-04-27 15:11:36', '35035000'),
(44, 2, '2021-03-18 15:19:13', '29831000'),
(59, 2, '2021-02-10 07:47:23', '77430000'),
(60, 2, '2021-02-16 09:11:27', '55313000'),
(61, 2, '2021-05-07 09:12:29', '34980000'),
(62, 2, '2021-05-07 09:16:26', '12319000'),
(63, 2, '2021-04-16 08:36:08', '63240000'),
(64, 2, '2021-05-01 09:27:55', '116015000'),
(65, 2, '2021-05-11 09:38:04', '121245000'),
(66, 2, '2021-05-11 09:39:53', '79275000'),
(67, 2, '2021-05-11 09:50:03', '68270000'),
(68, 2, '2021-05-01 11:45:06', '110960000'),
(69, 2, '2021-05-11 11:46:03', '116315000'),
(70, 2, '2021-05-11 12:17:51', '35475000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catID`, `catName`) VALUES
(1, 'Điện Thoại'),
(5, 'Laptop'),
(11, 'Thiết Bị Lưu Trữ'),
(16, 'Đồng Hồ Thông Minh'),
(17, 'Tất Cả Sản Phẩm'),
(21, 'Thiết Bị Âm Thanh'),
(22, 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `discountID` int(11) NOT NULL,
  `discountName` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `catID` int(11) NOT NULL,
  `percent` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_discount`
--

INSERT INTO `tbl_discount` (`discountID`, `discountName`, `content`, `catID`, `percent`, `img`) VALUES
(1, 'Giảm giá đồng hồ 2020', '<p>Giảm gi&aacute; 2% tất cả c&aacute;c mặt h&agrave;ng đồng hồ th&ocirc;ng minh1</p>', 16, 10, 'sale1D.png'),
(2, 'Giảm giá Điện Thoại 2020', '<p>giảm 1% tất cả c&aacute;c sản phẩm&nbsp;</p>', 1, 15, 'air.jfif'),
(3, 'Giảm giá Bộ Nhớ 2020', '<p>giảm 3%</p>', 11, 30, 'quâtngriengban.png'),
(4, 'Giảm giá LapTop 2020', '<p>1% tất cả c&aacute;c sản phẩm</p>', 5, 30, 'renhat.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `levelID` int(11) NOT NULL,
  `levelName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`levelID`, `levelName`) VALUES
(1, 'Admin'),
(2, 'Quản Trị Viên'),
(3, 'Nhân Viên');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `memberID` int(11) NOT NULL,
  `memberName` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`memberID`, `memberName`, `user`, `pass`, `phone`, `email`, `diachi`, `img`) VALUES
(1, 'Nguyên Đẹp Trai', '1', '12345678', '0123456789', '1@gmail.com', '1111asdasd', 'avt_login.jpg'),
(2, 'Nguyên Khá ĐZ', '2', '12345678', '0853633360', '1@gmail.com', '1', 'avt_None.png'),
(12, 'John Christ', 'abc', '12345678', '0123456789', 'asdad@gmal.com', 'asfafs', '360-600x600.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privilege`
--

CREATE TABLE `tbl_privilege` (
  `priID` int(11) NOT NULL,
  `priGrID` int(11) NOT NULL,
  `priName` varchar(255) NOT NULL,
  `url_match` varchar(255) NOT NULL,
  `view` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_privilege`
--

INSERT INTO `tbl_privilege` (`priID`, `priGrID`, `priName`, `url_match`, `view`) VALUES
(1, 1, 'Xem Thể Loại', 'catlist.php', 1),
(2, 1, 'Thêm Thể Loai', 'catadd.php', 1),
(3, 1, 'Sửa Thể Loại', 'catedit.php?catid=', 0),
(4, 1, 'Xóa Thể Loại', '?delidCat=', 0),
(5, 2, 'Xem Thương hiệu', 'brandlist.php', 1),
(6, 2, 'Thêm Thương Hiệu', 'brandadd.php', 1),
(7, 2, 'Sửa Thương Hiệu', 'brandedit.php?brandid=', 0),
(8, 2, 'Xóa Thương Hiệu', '?delidBrand=', 0),
(9, 3, 'Xem Sản Phẩm', 'productlist.php', 1),
(10, 3, 'Thêm Sản Phẩm', 'productadd.php', 1),
(11, 3, 'Sửa Sản Phẩn', 'productedit.php?productid=', 0),
(12, 3, 'Xóa Sản Phẩm', '?delidProduct=', 0),
(13, 3, 'Cập Nhật Sản Phẩm', 'productUpdate.php?productid=', 0),
(14, 4, 'Xem Thành Viên', 'memberlist.php', 1),
(15, 4, 'Thêm Thành Viên', 'memberadd.php', 1),
(16, 4, 'Cập Nhật', 'memberedit.php?memberid=', 0),
(17, 4, 'Xóa Thành Viên', '?delidMember=', 0),
(18, 5, 'Xem Màu', 'colorList.php', 1),
(19, 5, 'Thêm Màu', 'colorAdd.php', 1),
(20, 5, 'Sửa Màu', 'coloredit.php?colorid=', 0),
(23, 5, 'Xóa Màu', '?delidColor=', 0),
(25, 6, 'Xem Chương Trình', 'discountlist.php', 1),
(26, 6, 'Thêm Chương Trinh', 'discountadd.php', 1),
(27, 6, 'Sửa Chương Trinh', 'discountedit.php?discountid=', 0),
(28, 6, 'Xóa Chương Trình', '?delidDiscount=', 0),
(29, 7, 'Xem Đơn Hàng', 'oderlist.php', 1),
(30, 7, 'Xác Nhận Đơn', 'odernow', 0),
(31, 8, 'Xem Thống Kê', 'statistic.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privilege_group`
--

CREATE TABLE `tbl_privilege_group` (
  `priGrID` int(11) NOT NULL,
  `priGrName` varchar(255) NOT NULL,
  `levelID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_privilege_group`
--

INSERT INTO `tbl_privilege_group` (`priGrID`, `priGrName`, `levelID`) VALUES
(1, 'Thể Loại', 1),
(2, 'Thương Hiệu', 1),
(3, 'Sản Phẩm', 1),
(4, 'Phân Quyền', 1),
(5, 'color', 1),
(6, 'Giảm Giá', 1),
(7, 'Đơn Hàng', 1),
(8, 'Thống Kê', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `price` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productID`, `productName`, `catID`, `brandID`, `price`, `description`, `img`, `cost`, `supplier`, `interest`) VALUES
(1, 'iphone 11 pro max', 1, 1, '30000000', '<p>Gi&aacute; Mắc Qu&aacute;</p>', 'Iphone2.jpg', '33000000', 'TP.Hồ Chí Mình', '10'),
(11, 'Đồng Hồ BlackS DW', 16, 30, '5000000', '<p>gia mac qua</p>', 'product-8.jpg', '5250000', 'TP.Hồ Chí Mình', '5'),
(14, 'Oppo A15s 2022', 1, 7, '40000000', '<p>gia mac qua</p>', 'oppo-a15s-2_2.jpg', '42000000', 'TP.Hồ Chí Mình', '5'),
(15, 'USB OTG 31', 11, 10, '1000000', '<p>gia mac</p>', 'usb-otg-31-128gb-type-c-sandisk-sdddc3-den-ava-600x600.jpg', '1050000', 'TP.Hồ Chí Mình', '5'),
(16, 'Thẻ Nhớ 200GB zx1', 11, 11, '800000', '<p>gi&aacute; mắc qu&aacute;&nbsp;</p>', 'the-nho-microsd-200gb-class10uhs1-fix1-600x600-1-180x120.jpg', '840000', 'TP.Hà Nội', '5'),
(17, 'Dell XPS 21-01 2022', 5, 2, '50000000', '<p>gias mac qua</p>', 'dell-xps-13-9310-i5-70231343-154421-024415-600x600.jpg', '55000000', 'TP.Hồ Chí Mình', '10'),
(18, 'Dell GPS 1203 2021', 5, 2, '16000000', '<p>gi&aacute; mắc qu&aacute;</p>', '2-600x600.jpg', '17600000', 'TP.Hồ Chí Mình', '10'),
(19, 'MacBook Pro Max 2101 2030', 5, 13, '30000000', '<p>gi&aacute; mắc qu&aacute;</p>', 'mt2.jpeg', '33000000', 'TP.Hà Nội', '10'),
(20, 'Dell XPS 13-9 2301', 5, 2, '10000000', '<p>gias mac qua</p>', 'dell-xps-13-9310-i5-70231343-1-180x125.jpg', '11500000', 'TP.Hà Nội', '15'),
(22, 'Laptop Apple MacBook Air 2017 i5', 5, 13, '18000000', '<p>Gi&aacute; mắc qu&aacute;</p>', 'apple-macbook-air-mqd32sa-a-i5-5350u-bac-2-org.jpg', '19800000', 'TP HCM', '10'),
(23, 'Apple MacBook Pro M1 2020', 5, 13, '30000000', '<p>Gi&aacute; đăt qu&aacute;</p>', 'space-1-org.jpg', '33000000', 'TP HCM', '10'),
(24, 'Asus VivoBook X515MA', 5, 14, '6500000', '<p>Gi&aacute; mắc qu&aacute;</p>', 'asus-vivobook-x515ma-n4020-br111t-2-org.jpg', '7150000', 'TP HCM', '10'),
(25, 'Asus ZenBook UX425EA i5', 5, 14, '20000000', '<p>Gi&aacute; mắc qu&aacute;</p>', 'asus-zenbook-ux425ea-i5-bm069t-2-org.jpg', '22000000', 'TP HCM', '10'),
(26, 'iPhone 12 64GB', 1, 19, '21000000', '<p>Gi&aacute; mắc qu&aacute;</p>', 'iphone-12-xanh-duong-new-600x600.jpg', '23100000', 'TP HCM', '10'),
(27, 'iPhone 11 256GB', 1, 19, '19000000', '<p>Gi&aacute; đắt qu&aacute;</p>', 'iphone-11-den-600x600.jpg', '20520000', 'TP HCM', '8'),
(28, 'Samsung Galaxy A32', 1, 18, '6000000', '<p>Gi&aacute; mắc qu&aacute;</p>', 'samsung-galaxy-a32-4g-thumb-xanh-600x600-600x600.jpg', '6540000', 'TP HCM', '9'),
(29, 'Samsung Galaxy Note 20 Ultra 5G', 1, 18, '21000000', '<p>Gi&aacute; đắt</p>', 'samsunggalaxynote20ultratrangnew-600x600-600x600.jpg', '23100000', 'TP HCM', '10'),
(30, 'Xiaomi Mi 11 Lite', 1, 20, '7000000', '<p>Gi&aacute; ok</p>', 'xiaomi-mi-11-lite-4g-blue-600x600.jpg', '7700000', 'TP HCM', '10'),
(31, 'Xiaomi Mi 10T Pro 5G', 1, 20, '12000000', '<p>Gi&aacute; đắt</p>', 'xiaomi-mi-10t-pro-den-600x600.jpg', '13440000', 'TP HCM', '12'),
(35, 'Apple Watch S6', 16, 6, '9000000', '<p>Gi&aacute; mắc</p>', 'apple-watch-s6-40mm-vien-nhom-day-cao-su-hong-cont-1-org.jpg', '9720000', 'TP HCM', '8'),
(39, 'Tai nghe chụp tai Bluetooth Sony', 21, 26, '4500000', '<p>Gi&aacute; đắt qu&aacute;</p>', 'tai-nghe-chup-tai-bluetooth-sony-wh-1000xm4-avatar-1-600x600.jpg', '4770000', 'TP HCM', '6'),
(40, 'Tai nghe Bluetooth True Wireless LG', 21, 27, '990000', '<p>Gi&aacute; si&ecirc;u rẻ</p>', 'bluetooth-tws-lg-tone-free-hbs-fn4-trang-thumb-600x600.jpg', '1089000', 'TP HCM', '10'),
(41, 'Máy tính bảng iPad Air 4', 22, 28, '15500000', '<p>Gi&aacute; đắt</p>', 'ipad-air-4-wifi-64gb-2020-xanhduong-600x600-600x600.jpg', '16895000', 'TP HCM', '9'),
(42, 'Máy tính bảng iPad Pro', 22, 28, '26000000', '<p>Gi&aacute; đắt</p>', 'ipad-pro-12-9-inch-wifi-128gb-2020-bac-600x600-1-600x600.jpg', '28080000', 'TP HCM', '8'),
(43, 'Máy tính bảng iPad Pro 11', 22, 28, '20000000', '<p>Gi&aacute; vừa phải</p>', 'ipad-pro-11-inch-2020-bac-600x600-1-600x600.jpg', '21400000', 'TP HCM', '7'),
(44, 'Lenovo Tab M10 - FHD Plus', 22, 29, '4850000', '<p>Gi&aacute; rẻ</p>', 'tab-m10-fhd-plus-600-600x600.jpg', '5238000', 'TP HCM', '8'),
(45, 'Máy tính bảng Lenovo Tab M8', 22, 29, '3100000', '<p>Gi&aacute; si&ecirc;u rẻ</p>', 'lenovo-tab-a22-xam-600x600.jpg', '3410000', 'TP HCM', '10'),
(46, 'Apple Watch S5', 16, 6, '9500000', '<p>Gi&aacute; mắc qu&aacute;</p>', 'apple-watch-s5-44mm-vien-nhom-day-cao-su-10-600x600.jpg', '10165000', 'TP HCM', '7'),
(47, 'Đồng hồ thông minh Garmin Lily', 16, 16, '4500000', '<p>Gi&aacute; vừa phải</p>', 'ava-600x600.jpg', '4770000', 'TP HCM', '6'),
(49, 'Đồng hồ thông minh Garmin Venu', 16, 16, '4600000', '<p>Gi&aacute; rẻ</p>', 'garmin-venu-sq-day-silicone-104720-084758-600x600.jpg', '4968000', 'TP HCM', '8'),
(50, 'Laptop Dell Inspiron 7501 i7', 5, 2, '29000000', '<p>Gi&aacute; mắc qu&aacute;</p>', 'dell-inspiron-7501-i7-x3mry1-600x600.jpg', '31320000', 'TP HCM', '8'),
(51, 'Laptop Dell G5 15 5500 i7', 5, 2, '33000000', '<p>Gi&aacute; chua qu&aacute;</p>', 'dell-g5-15-5500-i7-70228123-094621-024632-600x600.jpg', '34650000', 'TP HCM', '5'),
(52, 'Asus TUF Gaming FX506LI i5', 5, 14, '20000000', '<p>Gi&aacute; mắc</p>', 'TUF2-600x400.jpg', '21200000', 'TP HCM', '6'),
(53, 'Laptop HP 348 G7 i5', 5, 15, '14500000', '<p>Gi&aacute; mắc</p>', 'hp-348-g7-i5-9ph06pa-kg2-1-218439-600x600.jpg', '15225000', 'TP HCM', '5'),
(54, 'Laptop HP ProBook', 5, 15, '17500000', '<p>Gi&aacute; vừa</p>', 'hp-probook-445-g7-r5-1a1a6pa-020020-090026-600x600.jpg', '18550000', 'USA', '6'),
(55, 'Laptop HP Pavilion', 5, 15, '13500000', '<p>Gi&aacute; mắc</p>', '360-600x600.jpg', '14445000', 'USA', '7'),
(56, 'Điện thoại iPhone 12 Pro Max', 1, 19, '39000000', '<p>gi&aacute; ch&aacute;t qu&aacute;</p>', 'iphone-12-pro-max-vang-new-600x600-600x600.jpg', '41730000', 'USA', '7'),
(57, 'Samsung Galaxy S21', 1, 18, '19500000', '<p>Gi&aacute; vừa phải</p>', 'samsung-galaxy-s21-tim-600x600.jpg', '21255000', 'Korea', '9'),
(58, 'OPPO Reno5', 1, 7, '10900000', '<p>Gi&aacute; mắc</p>', 'oppo-reno5-5g-thumb-600x600.jpg', '11445000', 'TP HCM', '5'),
(59, 'Xiaomi Redmi Note 10', 1, 20, '6500000', '<p>Gi&aacute; vừa phải</p>', 'xiaomi-redmi-note-10-pro-thumb-xam-600x600-600x600.jpg', '7150000', 'TP HCM', '10'),
(60, 'Điện thoại OPPO Reno4 Pro', 1, 7, '10000000', '<p>Gi&aacute; mắc qu&aacute;</p>', 'oppo-reno4-pro-trang-600x600.jpg', '11000000', 'Hà Nội', '10'),
(61, 'Samsung Galaxy Z Fold2 5G', 1, 18, '50000000', '<p>Mới nhất nha cả nh&agrave;</p>', 'samsung-galaxy-z-fold-2-vang-600x600-600x600.jpg', '52500000', 'TP HCM', '5'),
(62, 'OPPO A74 5G', 1, 7, '7200000', '<p>Hang moi ve</p>', 'oppo-a74-5g-silver-01-600x600.jpg', '7920000', 'TP HCM', '10'),
(63, 'Samsung Galaxy S10 Lite', 1, 18, '9000000', '<p>Gia vua phai</p>', 'samsung-galaxy-s10-lite-xanhduong-600x600.jpg', '9810000', 'TP HCM', '9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_color`
--

CREATE TABLE `tbl_product_color` (
  `colorID` int(11) NOT NULL,
  `colorName` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_color`
--

INSERT INTO `tbl_product_color` (`colorID`, `colorName`, `description`) VALUES
(1, 'Màu Đen', ''),
(2, 'Màu Xanh', 'Rêu'),
(3, 'Màu Tím', 'Đen'),
(4, 'Màu Bạc', ''),
(5, 'Màu Đỏ', ''),
(6, 'Màu Vàng', ''),
(8, 'Màu Trắng', ''),
(10, 'Màu Hồng', ''),
(11, 'Màu Xám', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_img`
--

CREATE TABLE `tbl_product_img` (
  `imgID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_img`
--

INSERT INTO `tbl_product_img` (`imgID`, `productID`, `img`) VALUES
(12, 1, 'Iphone2.jpg'),
(13, 1, 'iphone3.jpg'),
(15, 1, 'iPhone11ProMax.jpg'),
(20, 19, '2-600x600.jpg'),
(21, 19, 'dell-inspiron-7400-i5-n4i5206w-4-org.jpg'),
(22, 19, 'dell-inspiron-7400-i5-n4i5206w-9-180x125.jpg'),
(23, 19, 'dell-inspiron-7400-i5-n4i5206w-14-180x125.jpg'),
(24, 18, 'dell-inspiron-7400-i5-n4i5206w-4-org.jpg'),
(25, 18, 'dell-inspiron-7400-i5-n4i5206w-9-180x125.jpg'),
(26, 18, 'dell-inspiron-7400-i5-n4i5206w-14-180x125.jpg'),
(27, 17, 'dell-xps-13-9310-i5-70231343-2-180x125.jpg'),
(28, 17, 'dell-xps-13-9310-i5-70231343-8-180x125.jpg'),
(29, 17, 'dell-xps-13-9310-i5-70231343-154421-024415-600x600.jpg'),
(30, 20, 'dell-xps-13-9310-i5-70231343-1-180x125.jpg'),
(31, 20, 'dell-xps-13-9310-i5-70231343-2-180x125.jpg'),
(32, 20, 'dell-xps-13-9310-i5-70231343-8-180x125.jpg'),
(33, 20, 'dell-xps-13-9310-i5-70231343-154421-024415-600x600.jpg'),
(34, 22, 'apple-macbook-air-mqd32sa-a-i5-5350u-bac-3-org.jpg'),
(35, 22, 'apple-macbook-air-mqd32sa-a-i5-5350u-bac-4-org.jpg'),
(36, 22, 'apple-macbook-air-mqd32sa-a-i5-5350u-bac-9-org.jpg'),
(37, 23, 'space-2-org.jpg'),
(38, 23, 'space-3-org.jpg'),
(39, 23, 'space-5-org.jpg'),
(40, 24, 'asus-vivobook-x515ma-n4020-br111t-3-org.jpg'),
(41, 24, 'asus-vivobook-x515ma-n4020-br111t-4-org.jpg'),
(42, 24, 'asus-vivobook-x515ma-n4020-br111t-8-org.jpg'),
(43, 25, 'asus-zenbook-ux425ea-i5-bm069t-3-org.jpg'),
(44, 25, 'asus-zenbook-ux425ea-i5-bm069t-4-org.jpg'),
(45, 25, 'asus-zenbook-ux425ea-i5-bm069t-8-org.jpg'),
(46, 26, 'iphone-12-xanh-duong-1-1-org.jpg'),
(47, 26, 'iphone-12-xanh-duong-5-1-org.jpg'),
(48, 26, 'iphone-12-xanh-duong-6-org.jpg'),
(49, 27, 'iphone-11-256gb-den-6-org.jpg'),
(50, 27, 'iphone-11-den-1-1-org.jpg'),
(51, 27, 'iphone-11-den-5-org.jpg'),
(52, 28, 'samsung-galaxy-a32-4g-tim-1-org.jpg'),
(53, 28, 'samsung-galaxy-a32-4g-tim-4-org.jpg'),
(54, 28, 'samsung-galaxy-a32-4g-tim-8-org.jpg'),
(55, 29, 'samsung-galaxy-note-20-ultra-5g-trang-1-org.jpg'),
(56, 29, 'samsung-galaxy-note-20-ultra-5g-trang-4-org.jpg'),
(57, 29, 'samsung-galaxy-note-20-ultra-5g-trang-7-org.jpg'),
(58, 30, 'xiaomi-mi-11-lite-4g-xanh-duong-1-org.jpg'),
(59, 30, 'xiaomi-mi-11-lite-4g-xanh-duong-4-org.jpg'),
(60, 30, 'xiaomi-mi-11-lite-4g-xanh-duong-6-org.jpg'),
(61, 31, 'xiaomi-mi-10t-pro-1-org.jpg'),
(62, 31, 'xiaomi-mi-10t-pro-5-org.jpg'),
(63, 31, 'xiaomi-mi-10t-pro-7-org.jpg'),
(64, 32, 'ipad-air-4-rose-gold-1020x680-org.jpg'),
(65, 32, 'ipad-air-4-silver-1020x680-org.jpg'),
(66, 33, 'ipad-pro-12-9-inch-wifi-128gb-2020-1020x680-org.jpg'),
(67, 34, 'lenovo-tab-m10-fhd-plus-1-1-org.jpg'),
(68, 34, 'lenovo-tab-m10-fhd-plus-4-1-org.jpg'),
(69, 35, 'apple-watch-s6-40mm-vien-nhom-day-cao-su-hong-cont-2-org.jpg'),
(70, 36, 'garmin-lily-day-silicone-trang-3-org.jpg'),
(71, 37, 'tai-nghe-chup-tai-bluetooth-sony-wh-1000xm4-bac-1-org.jpg'),
(72, 38, 'tai-nghe-bluetooth-tws-beats-powerbeats-pro-avatar-1-1-600x600.jpg'),
(74, 39, 'tai-nghe-chup-tai-bluetooth-sony-wh-1000xm4-avatar-1-600x600.jpg'),
(75, 39, 'tai-nghe-chup-tai-bluetooth-sony-wh-1000xm4-bac-1-org.jpg'),
(76, 40, 'bluetooth-tws-lg-tone-free-hbs-fn4-trang-thumb-600x600.jpg'),
(77, 40, 'tai-nghe-bluetooth-true-wireless-lg-hbs-fn4-trang-13-org-org.jpg'),
(78, 35, 'apple-watch-s6-40mm-vien-nhom-day-cao-su-hong-cont-1-org.jpg'),
(82, 41, 'ipad-air-4-wifi-64gb-2020-xanhduong-600x600-600x600.jpg'),
(84, 42, 'ipad-pro-12-9-inch-wifi-128gb-2020-bac-600x600-1-600x600.jpg'),
(85, 29, 'samsunggalaxynote20ultratrangnew-600x600-600x600.jpg'),
(86, 31, 'xiaomi-mi-10t-pro-den-600x600.jpg'),
(87, 30, 'xiaomi-mi-11-lite-4g-blue-600x600.jpg'),
(88, 28, 'samsung-galaxy-a32-4g-thumb-xanh-600x600-600x600.jpg'),
(91, 43, 'ipad-pro-11-inch-2020-bac-600x600-1-600x600.jpg'),
(92, 43, 'ipad-pro-11-inch-2020-bac-1020x680-org.jpg'),
(93, 42, 'ipad-pro-12-9-inch-wifi-128gb-2020-1020x680-org.jpg'),
(94, 41, 'ipad-air-4-rose-gold-1020x680-org.jpg'),
(95, 41, 'ipad-air-4-silver-1020x680-org.jpg'),
(96, 44, 'lenovo-tab-m10-fhd-plus-1-1-org.jpg'),
(97, 44, 'lenovo-tab-m10-fhd-plus-4-1-org.jpg'),
(98, 44, 'tab-m10-fhd-plus-600-600x600.jpg'),
(99, 45, 'lenovo-tab-a22-xam-600x600.jpg'),
(100, 45, 'lenovo-tab-m8-4-org.jpg'),
(101, 14, 'oppo-a15s-2_2.jpg'),
(102, 14, 'oppo-a15s-xanh-4-org.jpg'),
(103, 14, 'oppo-a15s-xanh-5-org.jpg'),
(104, 15, 'usb-otg-31-64gb-sandisk-sdddc3-den-5-1-org.jpg'),
(105, 16, 'thenho_sandisk.jpg'),
(106, 22, 'apple-macbook-air-mqd32sa-a-i5-5350u-bac-2-org.jpg'),
(107, 23, 'space-1-org.jpg'),
(108, 24, 'asus-vivobook-x515ma-n4020-br111t-2-org.jpg'),
(109, 25, 'asus-zenbook-ux425ea-i5-bm069t-2-org.jpg'),
(110, 27, 'iphone-11-den-600x600.jpg'),
(111, 11, 'dongho_DW.jpg'),
(112, 11, 'product-8.jpg'),
(113, 46, 'apple-watch-s5-44mm-vien-nhom-day-cao-su-4-org.jpg'),
(114, 46, 'apple-watch-s5-44mm-vien-nhom-day-cao-su-10-600x600.jpg'),
(115, 47, 'ava-600x600.jpg'),
(116, 47, 'garmin-lily-day-silicone-trang-2-org.jpg'),
(117, 47, 'garmin-lily-day-silicone-trang-3-org.jpg'),
(118, 47, 'garmin-lily-day-silicone-trang-6-org.jpg'),
(121, 49, 'garmin-venu-sq-day-silicone-104720-084758-600x600.jpg'),
(122, 49, 'sq-1-org.jpg'),
(123, 50, 'dell-inspiron-7501-i7-x3mry1-1-org.jpeg'),
(124, 50, 'dell-inspiron-7501-i7-x3mry1-4-org.jpeg'),
(125, 50, 'dell-inspiron-7501-i7-x3mry1-600x600.jpg'),
(126, 51, 'dell-g5-15-5500-i7-70228123-2-org.jpg'),
(127, 51, 'dell-g5-15-5500-i7-70228123-7-org.jpg'),
(128, 51, 'dell-g5-15-5500-i7-70228123-094621-024632-600x600.jpg'),
(129, 52, 'asus-tuf-gaming-fx506li-i5-hn039t-1-org.jpg'),
(130, 52, 'asus-tuf-gaming-fx506li-i5-hn039t-2-org.jpg'),
(131, 52, 'dell-g5-15-5500-i7-70228123-094621-024632-600x600.jpg'),
(132, 53, 'hp-348-g7-i5-9ph06pa-2-org.jpg'),
(133, 53, 'hp-348-g7-i5-9ph06pa-4-org.jpg'),
(134, 53, 'hp-348-g7-i5-9ph06pa-kg2-1-218439-600x600.jpg'),
(135, 54, 'hp-probook-445-g7-r5-1a1a6pa-020020-090026-600x600.jpg'),
(136, 54, 'hp-probook-445-g7-r5-1a1a6pa-3-org.jpg'),
(137, 55, '360-600x600.jpg'),
(138, 55, 'hp-pavilion-x360-dw1016tu-i3-2h3q0pa-3-org.jpg'),
(139, 55, 'hp-pavilion-x360-dw1016tu-i3-2h3q0pa-13-org.jpg'),
(140, 56, 'iphone-12-pro-max-512gb-1-org.jpg'),
(141, 56, 'iphone-12-pro-max-512gb-4-org.jpg'),
(142, 56, 'iphone-12-pro-max-vang-new-600x600-600x600.jpg'),
(143, 26, 'iphone-12-xanh-duong-new-600x600.jpg'),
(144, 57, 'samsung-galaxy-s21-tim-1-org.jpg'),
(145, 57, 'samsung-galaxy-s21-tim-6-org.jpg'),
(146, 57, 'samsung-galaxy-s21-tim-600x600.jpg'),
(147, 58, 'oppo-a15s-xanh-4-org.jpg'),
(148, 58, 'oppo-a15s-xanh-5-org.jpg'),
(149, 58, 'oppo-reno5-5g-bac-1-org.jpg'),
(150, 59, 'xiaomi-redmi-note-10-pro-thumb-xam-600x600-600x600.jpg'),
(151, 59, 'xiaomi-redmi-note-10-pro-xam-4-org.jpg'),
(152, 60, 'oppo-reno4-pro-trang-600x600.jpg'),
(153, 60, 'oppo-reno4-pro-trang-1-org.jpg'),
(154, 60, 'oppo-reno4-pro-trang-5-org.jpg'),
(155, 61, 'samsung-galaxy-z-fold-2-vang-600x600-600x600.jpg'),
(156, 61, 'samsung-galaxy-z-fold2-5g-dac-biet-vang-dong-2-org.jpg'),
(157, 61, 'samsung-galaxy-z-fold2-5g-dac-biet-vang-dong-7-org.jpg'),
(158, 62, 'oppo-a74-5g-silver-01-600x600.jpg'),
(159, 62, 'oppo-a74-5g-bac-4-org.jpg'),
(160, 63, 'samsung-galaxy-s10-lite-xanh-4-org.jpg'),
(161, 63, 'samsung-galaxy-s10-lite-xanhduong-600x600.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pro_color_details`
--

CREATE TABLE `tbl_pro_color_details` (
  `proColorID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `colorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pro_color_details`
--

INSERT INTO `tbl_pro_color_details` (`proColorID`, `productID`, `colorID`) VALUES
(15, 19, 6),
(16, 19, 4),
(17, 19, 1),
(83, 18, 6),
(84, 18, 4),
(85, 18, 3),
(93, 17, 6),
(94, 17, 1),
(95, 17, 4),
(96, 17, 3),
(100, 20, 2),
(101, 20, 4),
(102, 20, 3),
(116, 32, 5),
(117, 32, 3),
(118, 32, 2),
(119, 33, 4),
(120, 33, 1),
(121, 34, 4),
(123, 36, 4),
(124, 37, 4),
(125, 37, 1),
(126, 38, 2),
(127, 38, 1),
(130, 39, 4),
(131, 39, 1),
(132, 40, 4),
(133, 40, 2),
(143, 35, 10),
(144, 35, 4),
(145, 1, 11),
(146, 1, 10),
(147, 1, 8),
(148, 1, 4),
(149, 29, 8),
(150, 29, 2),
(151, 31, 11),
(152, 31, 4),
(153, 31, 2),
(156, 30, 5),
(157, 30, 2),
(158, 30, 1),
(159, 28, 10),
(160, 28, 2),
(170, 43, 11),
(171, 43, 8),
(172, 43, 4),
(173, 42, 8),
(174, 42, 4),
(175, 41, 10),
(176, 41, 4),
(177, 41, 2),
(178, 44, 11),
(179, 44, 8),
(180, 44, 4),
(181, 45, 11),
(182, 45, 4),
(183, 14, 5),
(184, 14, 2),
(185, 15, 5),
(186, 15, 1),
(187, 16, 4),
(188, 16, 3),
(189, 16, 1),
(190, 22, 10),
(191, 22, 8),
(192, 22, 4),
(193, 22, 3),
(194, 23, 8),
(195, 23, 5),
(196, 23, 4),
(197, 23, 3),
(198, 24, 8),
(199, 24, 4),
(200, 24, 3),
(201, 24, 2),
(202, 25, 11),
(203, 25, 4),
(204, 25, 2),
(205, 25, 1),
(206, 27, 10),
(207, 27, 5),
(208, 27, 1),
(213, 11, 11),
(214, 11, 10),
(215, 11, 3),
(216, 11, 1),
(217, 46, 11),
(218, 46, 4),
(219, 46, 1),
(220, 47, 10),
(221, 47, 8),
(222, 47, 2),
(225, 49, 11),
(226, 49, 1),
(227, 50, 10),
(228, 50, 8),
(229, 50, 4),
(230, 50, 1),
(231, 51, 11),
(232, 51, 2),
(233, 51, 1),
(234, 52, 11),
(235, 52, 5),
(236, 52, 1),
(237, 53, 11),
(238, 53, 4),
(239, 53, 2),
(243, 54, 11),
(244, 54, 8),
(245, 54, 2),
(246, 55, 8),
(247, 55, 5),
(248, 55, 3),
(249, 56, 11),
(250, 56, 10),
(251, 56, 8),
(252, 56, 2),
(253, 26, 10),
(254, 26, 8),
(255, 26, 3),
(256, 26, 2),
(257, 57, 5),
(258, 57, 4),
(259, 57, 2),
(260, 58, 10),
(261, 58, 3),
(262, 58, 2),
(263, 59, 11),
(264, 59, 5),
(265, 59, 1),
(274, 60, 11),
(275, 60, 8),
(276, 60, 5),
(277, 60, 2),
(284, 61, 10),
(285, 61, 5),
(286, 61, 3),
(290, 62, 11),
(291, 62, 8),
(292, 62, 3),
(296, 63, 5),
(297, 63, 4),
(298, 63, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `statusID` int(11) NOT NULL,
  `statusName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPhone` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`adminID`, `adminName`, `adminEmail`, `adminPhone`, `adminUser`, `adminPass`, `level`, `img`) VALUES
(1, 'Nguyên Vương', 'nguyendocac1@gmail.com', '0853633360', 'admin', '202cb962ac59075b964b07152d234b70', 1, 'samsungGalaxyNote20.jpg'),
(10, 'Nguyên Đẹp Trai', '1@gmail.com', '0123456789', 'viewer', '25d55ad283aa400af464c76d713c07ad', 3, 'iPhone11ProMax.jpg'),
(13, 'Nguyên Khá ĐZ', 'nguyendocac1@gmail.com', '0853633360', 'view', '25d55ad283aa400af464c76d713c07ad', 3, 'PC_cô đơn.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_privilege`
--

CREATE TABLE `tbl_user_privilege` (
  `user_priID` int(11) NOT NULL,
  `priID` int(11) NOT NULL,
  `levelID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_privilege`
--

INSERT INTO `tbl_user_privilege` (`user_priID`, `priID`, `levelID`) VALUES
(955, 2, 3),
(956, 4, 3),
(957, 5, 3),
(958, 6, 3),
(959, 8, 3),
(960, 9, 3),
(961, 10, 3),
(962, 11, 3),
(963, 12, 3),
(964, 13, 3),
(965, 14, 3),
(966, 15, 3),
(967, 16, 3),
(968, 17, 3),
(969, 18, 3),
(970, 19, 3),
(971, 20, 3),
(972, 23, 3),
(1125, 1, 1),
(1126, 2, 1),
(1127, 3, 1),
(1128, 4, 1),
(1129, 5, 1),
(1130, 6, 1),
(1131, 7, 1),
(1132, 8, 1),
(1133, 9, 1),
(1134, 10, 1),
(1135, 11, 1),
(1136, 12, 1),
(1137, 13, 1),
(1138, 14, 1),
(1139, 15, 1),
(1140, 16, 1),
(1141, 17, 1),
(1142, 18, 1),
(1143, 19, 1),
(1144, 20, 1),
(1145, 23, 1),
(1146, 25, 1),
(1147, 26, 1),
(1148, 27, 1),
(1149, 28, 1),
(1150, 29, 1),
(1151, 30, 1),
(1152, 31, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartDetaiID`);

--
-- Indexes for table `tbl_cart_list`
--
ALTER TABLE `tbl_cart_list`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`discountID`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`levelID`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `tbl_privilege`
--
ALTER TABLE `tbl_privilege`
  ADD PRIMARY KEY (`priID`),
  ADD KEY `tbl_privilege_ibfk_1` (`priGrID`);

--
-- Indexes for table `tbl_privilege_group`
--
ALTER TABLE `tbl_privilege_group`
  ADD PRIMARY KEY (`priGrID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `tbl_product_color`
--
ALTER TABLE `tbl_product_color`
  ADD PRIMARY KEY (`colorID`);

--
-- Indexes for table `tbl_product_img`
--
ALTER TABLE `tbl_product_img`
  ADD PRIMARY KEY (`imgID`);

--
-- Indexes for table `tbl_pro_color_details`
--
ALTER TABLE `tbl_pro_color_details`
  ADD PRIMARY KEY (`proColorID`),
  ADD KEY `colorID` (`colorID`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tbl_user_privilege`
--
ALTER TABLE `tbl_user_privilege`
  ADD PRIMARY KEY (`user_priID`),
  ADD KEY `tbl_user_privilege_ibfk_3` (`levelID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartDetaiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `tbl_cart_list`
--
ALTER TABLE `tbl_cart_list`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `discountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `levelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_privilege`
--
ALTER TABLE `tbl_privilege`
  MODIFY `priID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_privilege_group`
--
ALTER TABLE `tbl_privilege_group`
  MODIFY `priGrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_product_color`
--
ALTER TABLE `tbl_product_color`
  MODIFY `colorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_product_img`
--
ALTER TABLE `tbl_product_img`
  MODIFY `imgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `tbl_pro_color_details`
--
ALTER TABLE `tbl_pro_color_details`
  MODIFY `proColorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user_privilege`
--
ALTER TABLE `tbl_user_privilege`
  MODIFY `user_priID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1153;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_privilege`
--
ALTER TABLE `tbl_privilege`
  ADD CONSTRAINT `tbl_privilege_ibfk_1` FOREIGN KEY (`priGrID`) REFERENCES `tbl_privilege_group` (`priGrID`);

--
-- Constraints for table `tbl_pro_color_details`
--
ALTER TABLE `tbl_pro_color_details`
  ADD CONSTRAINT `tbl_pro_color_details_ibfk_1` FOREIGN KEY (`colorID`) REFERENCES `tbl_product_color` (`colorID`);

--
-- Constraints for table `tbl_user_privilege`
--
ALTER TABLE `tbl_user_privilege`
  ADD CONSTRAINT `tbl_user_privilege_ibfk_3` FOREIGN KEY (`levelID`) REFERENCES `tbl_level` (`levelID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
