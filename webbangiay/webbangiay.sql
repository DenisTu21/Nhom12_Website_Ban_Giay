-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 11:21 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbangiay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(5, 'nguyenvanphap', '123456'),
(7, 'phamngocanhvu', '123456'),
(8, 'tuvanquang', '123456'),
(9, 'phamducphuongminh', '123456'),
(10, 'buithanhnhan', '123456'),
(11, 'phamtranthienphuc', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `order_id`, `product_id`, `num`, `price`) VALUES
(1, 1, 2, 1, 1980000),
(2, 2, 2, 1, 1980000),
(4, 4, 13, 2, 3350000);

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hãng giày VANS', '2021-07-04 13:10:51', '2021-07-04 08:10:51'),
(2, 'Hãng giày CONVERSE', '2021-07-04 08:10:51', '2021-07-04 08:10:51'),
(3, 'Hãng giày NIKE', '2021-07-04 08:11:32', '2021-07-04 08:11:32'),
(6, 'Hãng giày ADIDAS', '2021-07-06 05:42:29', '2021-07-06 05:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `fullname`, `phone_number`, `email`, `address`, `order_date`) VALUES
(1, 'Tu Van Quang', '0707658572', 'tuquang250821@gmail.com', '134 Duy Tân, Phường 15, Quận Phú Nhuận, TPHCM', '2021-07-10 08:20:26'),
(2, 'Tu Van An', '0909039795', 'tuvanan2508@gmail.com', '134 Duy Tân, Phường 15, Quận Phú Nhuận, TPHCM', '2021-07-10 12:38:20'),
(3, 'Từ Văn Quang', '0707658572', 'tuquang250821@gmail.com', '134 Duy Tân, Phường 15, Quận Phú Nhuận, TPHCM', '2021-07-10 13:24:02'),
(4, 'tvquang', '0707658572', 'tuquang250821@gmail.com', '134 Duy Tân, Phường 15, Quận Phú Nhuận, TPHCM', '2021-07-10 13:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `TenSanPham` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ID_DanhMuc` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `gia` float NOT NULL,
  `Mota` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Hinhanh` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `TenSanPham`, `ID_DanhMuc`, `created_at`, `updated_at`, `gia`, `Mota`, `Hinhanh`) VALUES
(1, 'Giày Converse Chuck Taylor ', 1, '2021-07-04 08:26:34', '2021-07-07 03:17:45', 1750000, 'THÔNG TIN SẢN PHẨM Thương hiệu Converse Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam ...', 'https://i.pinimg.com/236x/5e/d1/44/5ed144f5b4d09620ea97c0e721234c7b.jpg'),
(2, 'Giày Vans Old Skool Skate', 1, '2021-07-04 08:26:34', '2021-07-07 03:24:45', 1980000, 'THÔNG TIN SẢN PHẨM Thương hiệu Vans Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam ...', 'https://i.pinimg.com/236x/79/d5/f7/79d5f75a62b966c44204038918ce43d7.jpg'),
(5, 'Giày Converse Chuck Taylor', 1, '2021-07-06 19:42:23', '2021-07-07 03:57:45', 1620000, 'THÔNG TIN SẢN PHẨM Thương hiệu Converse Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam ...', 'https://i.pinimg.com/236x/bd/54/c7/bd54c7cc71220d561ccb5cc70919de0a.jpg'),
(6, 'Giày Vans Authentic ', 1, '2021-07-06 19:20:25', '2021-07-07 10:59:07', 1575000, 'THÔNG TIN SẢN PHẨM Thương hiệu Vans Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn...', 'https://i.pinimg.com/236x/23/72/57/237257d757da75b96dc639d696d826cd.jpg'),
(7, 'Giày Vans Check Bess NI', 1, '2021-07-06 19:14:26', '2021-07-07 03:47:45', 1710000, 'Vans Check Bess Ni với thiết kế khỏe khoắn, sự thoải mái của lót Ultra Cush cùng màu sắc trẻ trung mang lại cho khách hàng sự lựa chọn tuyệt vời', 'https://i.pinimg.com/236x/06/3e/29/063e29d9e2c069a8309b7cf0d4ec1e18.jpg'),
(8, 'Giày Vans Sk8 - Hi Label', 1, '2021-07-06 19:01:27', '2021-07-07 10:13:08', 1845000, 'Vans Sk8 - Hi Label Mix có thiết kế tương tự mẫu slip-on cổ điển, với đặc trưng là phần mũ giày được làm bằng vải canvas chắc chắn cùng một nhãn in Vans, vành đệm và đế giày cao su quen thuộc.', 'https://i.pinimg.com/236x/15/0c/5a/150c5ad8fc9447f530ad02d85fc1d58e.jpg'),
(9, 'Giày Vans Old Skool', 1, '2021-07-06 19:36:28', '2021-07-07 10:37:08', 1575000, 'Oldskool xanh navy là 1 trong các sản phẩm bán chạy, không thể thiếu của tín đồ Vans.', 'https://i.pinimg.com/236x/c9/52/00/c9520086037c87667398915aabcf16e5.jpg'),
(11, 'Giày Converse Run Star', 1, '2021-07-06 19:47:37', '2021-07-07 03:29:46', 2250000, 'Nhân dịp ngày sinh của cố nghệ sĩ Keith Haring với những đóng góp to lớn trong bộ môn Pop Art với Graffiti - cũng là nguồn cảm hứng cho nhiều sản phẩm thời trang, mới đây, ông lớn Converse Keith Haring lại tiếp tục mang đến một BST đầy ý nghĩa để vinh danh những giá trị mà nghệ sĩ đường phố này đã mang lại cho chúng ta.', 'https://i.pinimg.com/236x/28/ec/9f/28ec9ff83012d28bd328759d5cb0f541.jpg'),
(12, 'Giày Vans Authentic', 1, '2021-07-07 03:44:47', '2021-07-07 10:51:08', 1675000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/c6/8f/77/c68f77c8b80749ae87de4b62cf054f2b.jpg'),
(13, 'Giày Vans Authetic ', 1, '2021-07-07 03:31:48', '2021-07-07 10:28:10', 1675000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/ad/44/54/ad4454dd7f9814a9d7be67bf1f324789.jpg'),
(14, 'Giày Vans Check Bess NI', 1, '2021-07-07 03:08:49', '2021-07-07 03:08:49', 1700000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/f0/7d/35/f07d35fd859144ef497d5330e74fb355.jpg'),
(15, 'Giày Adidas Stan Smith ', 6, '2021-07-07 03:57:49', '2021-07-07 10:05:09', 1900000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/28/f3/80/28f380dc0ab0809ac8cc0e8c94c4da70.jpg'),
(16, 'Giày Adidas Stan Smith ', 6, '2021-07-07 03:39:50', '2021-07-07 10:30:09', 1850000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/1c/b2/0d/1cb20dad17c05768ed94685a4a4e1ec3.jpg'),
(17, 'Giày Adidas Stan Smith ', 6, '2021-07-07 03:14:51', '2021-07-07 10:41:10', 1800000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/e0/7b/dd/e07bdd2144c2c6676de194718563acd7.jpg'),
(18, 'Giày Jordan 1 Bred', 3, '2021-07-07 03:09:52', '2021-07-07 03:09:52', 4200000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/74/88/17/748817a9e70a4cb248295a3a5012185f.jpg'),
(19, 'Giày Jordan 1 Panda', 3, '2021-07-07 03:46:52', '2021-07-07 03:46:52', 4550000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/dd/e0/e0/dde0e0093f9ad72f5e046934acc1f5e0.jpg'),
(20, 'Giày Jordan 1 Slip White', 3, '2021-07-07 03:30:53', '2021-07-07 03:30:53', 4350000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/08/b4/11/08b411f44fd6eb5471da3fed3ca8cdd7.jpg'),
(21, 'Giày Converse Low White', 2, '2021-07-07 03:05:54', '2021-07-07 03:05:54', 1800000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/7a/a2/08/7aa208bb80a2fe8aba3aad762381f62b.jpg'),
(22, 'Giày Converse Low Cream', 2, '2021-07-07 03:42:54', '2021-07-07 03:42:54', 1750000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/07/3d/1e/073d1eb4e1675ac0df0945485f074d0c.jpg'),
(23, 'Giày Converse Low Black', 2, '2021-07-07 03:15:55', '2021-07-07 03:15:55', 1650000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/c3/70/9f/c3709f5ddc5b6bf91c247d7dec08c5f1.jpg'),
(24, 'Giày Converse High White', 2, '2021-07-07 03:48:55', '2021-07-07 03:48:55', 1750000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/ed/c9/23/edc9233343a8f48aba5ee6423c3b0bb8.jpg'),
(25, 'Giày Converse High Red', 2, '2021-07-07 03:23:56', '2021-07-07 03:23:56', 1750000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/a6/b2/bd/a6b2bdc77ffe33ebbaeeb711e026951a.jpg'),
(26, 'Giày Converse High Black', 2, '2021-07-07 03:54:56', '2021-07-07 03:54:56', 1850000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/72/15/52/72155207f57a065933d4a1430b59a737.jpg'),
(27, 'Giày Converse Low Red', 2, '2021-07-07 03:25:57', '2021-07-07 03:25:57', 1650000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/9a/0c/66/9a0c666ec9e410e21d00629afe2f1105.jpg'),
(28, 'Giày Converse Low Blue', 2, '2021-07-07 03:03:58', '2021-07-07 03:03:58', 1650000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/6a/9b/e9/6a9be975a703e8ee253a41720181657c.jpg'),
(29, 'Giày Air Force One', 3, '2021-07-07 03:41:58', '2021-07-07 10:04:11', 2350000, 'Được kế thừa những chi tiết của những đôi Chuck 70 đình đám. Giày Converse Chuck 70 Popped Colour cũng được làm từ chất liệu vải Canvas nhưng kỹ thuật dệt hoàn hảo khiến mặt giày đẹp như một bức tranh vừa bắt mắt vừa tạo ra sự ôm sát cho đôi chân người dùng. ', 'https://i.pinimg.com/236x/12/5a/a6/125aa671c0a436171173f5d775b0131c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tinh`
--

CREATE TABLE `tinh` (
  `TenTinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `noidung` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `tieude` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaydang` datetime DEFAULT NULL,
  `thumnail` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`id`, `noidung`, `tieude`, `ngaydang`, `thumnail`) VALUES
(1, 'Nhớ cú leak vừa rồi từ nơi sản sinh ra các sản phẩm.....', 'Converse sẽ mang Goft le Fleur Chuck 70 về Việt...', '2021-07-11 09:22:50', 'https://i.pinimg.com/236x/e3/f2/79/e3f279e5ac595e231ac0b1cae5f5073d.jpg'),
(2, 'Phải tới ngày 27 tới, BST này mới chính thức ra mắt nhưng giờ nó...', 'Xinh nhất những ngày này là những mẫu giày của.....', '2021-07-11 10:55:02', 'https://i.pinimg.com/236x/bb/7c/d6/bb7cd6dfeafb552ae92d1baae0aae384.jpg'),
(3, 'Trước thách thức của Kaylee và Brian, giới trẻ Việt Nam ...', 'Fashionnista Việt đua nhau sống \"ngược\" theo trào lưu....', '2021-07-11 10:27:03', 'https://i.pinimg.com/236x/e3/ba/ab/e3baab35f76c699b76d2d05bf3166b6e.jpg'),
(4, 'Không phụ lòng của các fan, Commdes Play....', 'Commedes Garcons Play x Converse nhá hàng ...', '2021-07-11 10:54:03', 'https://i.pinimg.com/236x/88/43/7c/88437c1e0ab5048c568c92903ddad3d5.jpg'),
(5, 'Nếu bạn để ý, đế giày converse sẽ có một lớp nỉ cao su...', 'Đế giày converse có thiết kế rất đặc biệt, nhưng lí do...', '2021-07-11 10:17:04', 'https://i.pinimg.com/236x/7e/9f/b2/7e9fb21a63ce951547a9e9c8ebe49cf9.jpg'),
(6, 'Có lẻ bức hình cô nhóc xinh xắn cùng đôi converse trắng đã..', 'Hội thần kinh giày xôn xao với hình ảnh 18 ngàn lượt like...', '2021-07-11 10:43:04', 'https://i.pinimg.com/236x/30/13/03/30130305519b00f530469fd5f68e15ea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usser`
--

CREATE TABLE `usser` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usser`
--

INSERT INTO `usser` (`ID`, `username`, `password`, `Email`) VALUES
(4, 'tvquang', '01685130990quang', 'tuvanan2508@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinh`
--
ALTER TABLE `tinh`
  ADD PRIMARY KEY (`TenTinh`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usser`
--
ALTER TABLE `usser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usser`
--
ALTER TABLE `usser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
