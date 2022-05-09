-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 08, 2020 lúc 05:16 AM
-- Phiên bản máy phục vụ: 10.4.16-MariaDB
-- Phiên bản PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `longnvph07586_du_an_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `brand_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_image`) VALUES
(1, 'Apple', '../uploads/maxresdefault.jpg'),
(2, 'SamSung', '../uploads/galaxy-s20_highlights_kv_00.jpg'),
(3, 'VSmart', '../uploads/4515210_og.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colorproducts`
--

CREATE TABLE `colorproducts` (
  `colorProduct_id` int(11) NOT NULL,
  `colorProduct_name` varchar(255) DEFAULT NULL,
  `colorProduct_image` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `colorproducts`
--

INSERT INTO `colorproducts` (`colorProduct_id`, `colorProduct_name`, `colorProduct_image`, `product_id`) VALUES
(19, 'Bạc', '../uploads/637356760746984714_vsmart-aris-den-2.png', 2),
(20, 'Xám', '../uploads/', 8),
(21, 'Đen', '../uploads/', 8),
(22, 'Xám', '../uploads/', 9),
(23, 'Xanh Lục', '../uploads/', 9),
(24, 'Xanh Lam', '../uploads/', 9),
(25, 'Xanh Dương', '../uploads/', 10),
(26, 'Xám', '../uploads/', 10),
(27, 'Vàng', '../uploads/', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL,
  `comment_image` varchar(255) DEFAULT NULL,
  `comment_parent` int(11) DEFAULT 0,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `comment_date`, `comment_image`, `comment_parent`, `product_id`, `user_id`) VALUES
(156, 'Alo', '2020-11-30 09:37:49', '../uploads/', 0, 9, 1),
(157, '3', '2020-11-30 09:37:56', '../uploads/', 0, 9, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `infor`
--

CREATE TABLE `infor` (
  `infor_id` int(11) NOT NULL,
  `infor_logo` varchar(255) DEFAULT NULL,
  `infor_address` varchar(255) DEFAULT NULL,
  `infor_email` varchar(50) DEFAULT NULL,
  `infor_phone` varchar(15) DEFAULT NULL,
  `infor_copyright` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `infor`
--

INSERT INTO `infor` (`infor_id`, `infor_logo`, `infor_address`, `infor_email`, `infor_phone`, `infor_copyright`) VALUES
(1, '../uploads/logo.png', 'Quỳnh Lưu, Nghệ An', 'changanuong1742@gmail.com', '0978864646', 'Longnvph07586');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `memoryproducts`
--

CREATE TABLE `memoryproducts` (
  `memoryProduct_id` int(11) NOT NULL,
  `memoryProduct_name` varchar(255) DEFAULT NULL,
  `memoryProduct_price` float DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `memoryproducts`
--

INSERT INTO `memoryproducts` (`memoryProduct_id`, `memoryProduct_name`, `memoryProduct_price`, `product_id`) VALUES
(17, '128 GB', 24990000, 8),
(18, '64 GB', 5990000, 9),
(19, '128 GB', 7490000, 9),
(20, '128 GB', 33300000, 10),
(21, '512 GB', 40000000, 10),
(23, '128 GB', 5990000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_qtyProduct` int(11) DEFAULT NULL,
  `order_memoryProduct_name` varchar(50) DEFAULT NULL,
  `order_colorProduct_name` varchar(50) DEFAULT NULL,
  `order_totalProduct` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_orderStatus` varchar(255) DEFAULT 'Đang Chờ Duyệt',
  `dateBuy` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `order_qtyProduct`, `order_memoryProduct_name`, `order_colorProduct_name`, `order_totalProduct`, `user_id`, `order_orderStatus`, `dateBuy`) VALUES
(11, 8, 1, '128 GB', 'Xám', 24990000, 1, 'Đã Duyệt', '2020-12-04 10:54:16'),
(12, 8, 1, '128 GB', 'Xám', 24990000, 1, 'Đang Chờ Duyệt', '2020-12-04 10:57:26'),
(13, 2, 12, '128 GB', 'Bạc', 335880000, 1, 'Đang Chờ Duyệt', '2020-12-04 10:58:16'),
(14, 2, 12, '128 GB', 'Bạc', 335880000, 1, 'Đang Chờ Duyệt', '2020-12-04 10:59:50'),
(15, 9, 1, '64 GB', 'Xám', 7490000, 1, 'Đang Chờ Duyệt', '2020-12-04 11:04:07'),
(16, 8, 1, '128 GB', 'Xám', 24990000, 1, 'Đang Chờ Duyệt', '2020-12-04 11:04:07'),
(17, 9, 1, '64 GB', 'Xám', 7490000, 1, 'Đang Chờ Duyệt', '2020-12-04 11:06:12'),
(18, 8, 1, '128 GB', 'Xám', 24990000, 1, 'Đang Chờ Duyệt', '2020-12-04 11:06:12'),
(19, 9, 1, '64 GB', 'Xám', 7490000, 1, 'Đang Chờ Duyệt', '2020-12-07 09:08:21'),
(20, 8, 2, '128 GB', 'Xám', 49980000, 1, 'Đang Chờ Duyệt', '2020-12-07 09:08:21'),
(21, 9, 1, '64 GB', 'Xám', 7490000, 2, 'Đang Chờ Duyệt', '2020-12-07 17:04:15'),
(22, 8, 1, '128 GB', 'Xám', 24990000, 1, 'Đang Chờ Duyệt', '2020-12-08 09:27:21'),
(23, 9, 1, '64 GB', 'Xám', 7490000, 1, 'Đang Chờ Duyệt', '2020-12-08 09:27:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(1000) DEFAULT NULL,
  `product_image1` varchar(1000) DEFAULT NULL,
  `product_image2` varchar(1000) DEFAULT NULL,
  `product_image3` varchar(1000) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `product_sale` float DEFAULT NULL,
  `product_describe` text DEFAULT NULL,
  `product_countView` int(11) DEFAULT 0,
  `product_detail` text DEFAULT NULL,
  `product_amountProduct` int(11) DEFAULT NULL,
  `product_dateUpdate` datetime DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `statusProduct_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `product_sale`, `product_describe`, `product_countView`, `product_detail`, `product_amountProduct`, `product_dateUpdate`, `brand_id`, `statusProduct_id`) VALUES
(2, 'iPhone 11 Pro Max', '../uploads/637285878676226662_iphone 11 pro max (7).jpg', '../uploads/637273078874316829_iphone 11 pro max 1.jpg', '../uploads/637274646769464607_iphone-11-pro-max-14.jpg', 29990000, 27990000, '<ul>\r\n	<li>M&agrave;n h&igrave;nh6.5&quot;, Super Retina XDR, Super AMOLED, 1242 x 2688 Pixel</li>\r\n	<li>Camera sau12.0 MP, 12.0 MP, 12.0 MP</li>\r\n	<li>Camera Selfie12.0 MP</li>\r\n	<li>RAM&nbsp;4 GB</li>\r\n	<li>Bộ nhớ trong512 GB</li>\r\n	<li>CPU ModelA13 Bionic</li>\r\n	<li>GPUApple GPU 4 nh&acirc;n</li>\r\n	<li>Dung lượng pin3969 mAh</li>\r\n	<li>Thẻ sim1, 1 eSIM, 1 Nano SIM</li>\r\n	<li>Hệ điều h&agrave;nhiOS 13</li>\r\n	<li>Xuất xứTrung Quốc</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '<h3>Đ&aacute;nh gi&aacute; chi tiết iPhone 11 Pro Max 64GB</h3>\r\n\r\n<p><strong>Chiếc&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/apple-iphone\">iPhone</a>&nbsp;mạnh mẽ nhất, lớn nhất, thời lượng pin tốt nhất đ&atilde; xuất hiện.&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/iphone-11-pro-max-64gb\" target=\"_top\">iPhone 11 Pro Max</a>&nbsp;chắc chắn l&agrave; chiếc điện thoại m&agrave; ai cũng ao ước khi sở hữu những t&iacute;nh năng xuất sắc nhất, đặc biệt l&agrave; camera v&agrave; pin.</strong></p>\r\n\r\n<p><strong><img alt=\"iPhone 11 Pro Max\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-11-pro-max-4.jpg\" /></strong></p>\r\n\r\n<h3><strong>Sức mạnh h&agrave;ng đầu của Pro</strong></h3>\r\n\r\n<p>Được trang bị bộ vi xử l&yacute;&nbsp;<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/con-chip-apple-a13-bionic-tren-iphone-11-manh-co-nao-101678\">Apple A13 Bionic</a>, iPhone 11 Pro Max tự tin thể hiện đẳng cấp hiệu năng &ldquo;Pro&rdquo;. So với thế hệ trước, Apple A13 Bionic nhanh hơn 20% v&agrave; ti&ecirc;u thụ năng lượng &iacute;t hơn tới 40% cả về CPU lẫn GPU. iPhone 11 Pro Max mạnh mẽ vượt trội khi đặt cạnh bất cứ đối thủ n&agrave;o tr&ecirc;n thị trường hiện nay. Mọi t&aacute;c vụ kể cả những tựa game nặng nhất cũng đều được thể hiện trơn tru, mượt m&agrave; tr&ecirc;n iPhone 11 Pro Max 64GB.</p>\r\n\r\n<p><img alt=\"iPhone Pro hiệu năng\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iPhone-11-Pro-10.jpg\" /></p>\r\n\r\n<h3><strong>Thời lượng pin tốt nhất trong lịch sử iPhone</strong></h3>\r\n\r\n<p>Bạn đ&atilde; từng thấy iPhone Xs Max c&oacute; thời lượng pin tốt đến mức n&agrave;o, nhưng đ&oacute; chưa phải l&agrave; tất cả. iPhone 11 Pro Max l&agrave; chiếc iPhone c&oacute; thời lượng pin tốt nhất từ trước đến nay, thậm ch&iacute; c&ograve;n vượt xa khi so với iPhone Xs Max. Thời gian sử dụng của iPhone 11 Pro Max d&agrave;i hơn 5 giờ, cho ph&eacute;p bạn thoải m&aacute;i l&agrave;m tất cả những điều m&igrave;nh th&iacute;ch. Kết quả n&agrave;y c&oacute; được nhờ sự kết nối ăn khớp giữa phần cứng (bao gồm pin, chip, m&agrave;n h&igrave;nh) v&agrave; hệ điều h&agrave;nh mới. Ấn tượng hơn nữa, với sạc nhanh 18W đi k&egrave;m, bạn chỉ mất 30 ph&uacute;t sạc cho 50% pin. Lu&ocirc;n đầy đủ năng lượng v&agrave; sẵn s&agrave;ng đương đầu với mọi thử th&aacute;ch, đ&oacute; l&agrave; iPhone 11 Pro Max.</p>\r\n\r\n<p><img alt=\"iPhone Pro pin\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iPhone-11-Pro-11.jpg\" /></p>\r\n\r\n<h3><strong>T&aacute;c phẩm nghệ thuật đ&iacute;ch thực</strong></h3>\r\n\r\n<p>Kh&ocirc;ng chỉ đơn thuần l&agrave; một chiếc<a href=\"https://fptshop.com.vn/dien-thoai\">&nbsp;điện thoại</a>, iPhone 11 Pro Max l&agrave; một t&aacute;c phẩm nghệ thuật đ&iacute;ch thực. Sự kết hợp ho&agrave;n hảo giữa những vật liệu cao cấp l&agrave; khung th&eacute;p kh&ocirc;ng gỉ v&agrave; hai mặt k&iacute;nh cường lực gi&uacute;p iPhone 11 Pro Max rất sang trọng, đẳng cấp. iPhone mới đ&atilde; chuyển sang mặt lưng sơn nh&aacute;m độc đ&aacute;o, đẹp mắt hơn đồng thời kh&ocirc;ng bị b&aacute;m bẩn hay dấu v&acirc;n tay. iPhone Pro Max c&oacute; 4 m&agrave;u thời thượng l&agrave; V&agrave;ng, X&aacute;m kh&ocirc;ng gian, Bạc v&agrave; Xanh Midnight. D&ugrave; l&agrave; một chiếc điện thoại m&agrave;n h&igrave;nh lớn, nhưng sự ho&agrave;n thiện cao cấp gi&uacute;p iPhone 11 Pro Max vẫn dễ d&agrave;ng cầm nắm v&agrave; thao t&aacute;c.</p>\r\n\r\n<p><img alt=\"iPhone 11 Pro Max thiết kế\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-11-pro-max-2.jpg\" /></p>\r\n\r\n<h3><strong>K&iacute;nh cường lực si&ecirc;u cứng, chống nước ho&agrave;n hảo</strong></h3>\r\n\r\n<p>iPhone 11 Pro Max kh&ocirc;ng chỉ đẹp xuất sắc m&agrave; c&ograve;n l&agrave; một chiếc điện thoại v&ocirc; c&ugrave;ng bền vững. Được chế t&aacute;c từ khung th&eacute;p kh&ocirc;ng gỉ v&agrave; hai mặt k&iacute;nh cường lực cứng nhất thế giới smartphone, iPhone 11 Pro Max c&oacute; khả năng chống va đập cực tốt. Chất lỏng cũng kh&ocirc;ng phải l&agrave; mối nguy hại với iPhone 11 Pro Max khi với chuẩn chống nước IP68, điện thoại c&oacute; khả năng ng&acirc;m nước dưới độ s&acirc;u 4m trong thời gian tối đa 30 ph&uacute;t. Thiết kế vững chắc gi&uacute;p bạn y&ecirc;n t&acirc;m hơn khi sử dụng.</p>\r\n\r\n<p><img alt=\"iPhone 11 Pro Max độ bền\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-11-pro-max-5.jpg\" /></p>\r\n\r\n<h3><strong>Trải nghiệm m&agrave;n h&igrave;nh lớn 6,5 inch Super Retina XDR tuyệt mỹ</strong></h3>\r\n\r\n<p>iPhone 11 Pro Max l&agrave; chiếc iPhone c&oacute; m&agrave;n h&igrave;nh lớn nhất với tấm nền 6,5 inch, c&ocirc;ng nghệ&nbsp;<a href=\"https://fptshop.com.vn/tin-tuc/tin-moi-1/super-retina-xdr-la-gi-cong-nghe-man-hinh-moi-tren-iphone-11-101690\">Super Retina XDR</a>&nbsp;mới nhất. Một m&agrave;n h&igrave;nh OLED hiển thị m&agrave;u sắc sống động, độ tương phản v&agrave; độ s&aacute;ng đ&aacute;ng kinh ngạc sẽ đưa bạn đến những trải nghiệm chưa từng thấy. Khả năng hiển thị ngo&agrave;i trời ho&agrave;n hảo với độ s&aacute;ng 800 nits v&agrave; thậm ch&iacute; l&agrave; 1200 nits khi xem những nội dung c&oacute; dải nhạy s&aacute;ng rộng. D&ugrave; l&agrave; bất cứ nội dung g&igrave; th&igrave; iPhone 11 Pro Max cũng hiển thị một c&aacute;ch tuyệt vời. Ấn tượng hơn nữa, m&agrave;n h&igrave;nh n&agrave;y c&ograve;n tiết kiệm điện hơn 15%, để iPhone 11 Pro Max c&oacute; thời lượng pin kh&oacute; tin.</p>\r\n\r\n<p><img alt=\"iPhone 11 Pro Max màn hình\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-11-pro-max-6.jpg\" /></p>\r\n\r\n<h3><strong>Hệ thống 3 camera sau đẳng cấp, n&acirc;ng tầm nhiếp ảnh chuy&ecirc;n nghiệp</strong></h3>\r\n\r\n<p>Với việc trang bị hệ thống 3 camera sau chất lượng, iPhone 11 Pro Max đ&atilde; c&oacute; một bước tiến d&agrave;i về nhiếp ảnh. Chụp cảnh rộng gấp 4 lần; chụp ảnh thiếu s&aacute;ng ho&agrave;n hảo; quay video 4K 60fps chống rung v&agrave; khả năng chỉnh sửa hậu kỳ bằng những c&ocirc;ng cụ chuy&ecirc;n nghiệp, dễ sử dụng ngay tr&ecirc;n chiếc iPhone của bạn. iPhone 11 Pro Max ch&iacute;nh l&agrave; chiếc điện thoại c&oacute; camera xuất sắc bậc nhất hiện nay.</p>\r\n\r\n<p><img alt=\"iPhone 11 Pro Max camera\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-11-pro-max-3.jpg\" /></p>\r\n\r\n<h3><strong>Ph&oacute;ng to tầm mắt của bạn</strong></h3>\r\n\r\n<p>Cả thế giới sẽ được thu gọn trong camera của iPhone 11 Pro Max. Từ camera Tele, camera g&oacute;c rộng cho đến camera g&oacute;c si&ecirc;u rộng, iPhone 11 Pro Max c&oacute; thể zoom quang 4x hay chụp được những khung cảnh lớn gấp 4 lần. D&ugrave; vật thể gần hay xa, từ những sinh vật nhỏ b&eacute; cho đến những cảnh vật thi&ecirc;n nhi&ecirc;n h&ugrave;ng vĩ, iPhone 11 Pro Max đều c&oacute; thể lưu giữ lại theo c&aacute;ch ch&acirc;n thực nhất.</p>\r\n\r\n<p><img alt=\"iPhone Pro Face ID\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iPhone-11-Pro-3.jpg\" /></p>\r\n\r\n<h3><strong>Ảnh chụp thiếu s&aacute;ng tuyệt đẹp</strong></h3>\r\n\r\n<p>Thiếu s&aacute;ng kh&ocirc;ng c&ograve;n l&agrave; điều kiện c&oacute; thể l&agrave;m kh&oacute; camera iPhone 11 Pro Max nữa. Với cảm biến camera mới v&agrave; chế độ chụp đ&ecirc;m chuy&ecirc;n dụng Night Mode, iPhone 11 Pro Max c&oacute; thể thu được những &aacute;nh đ&egrave;n lung linh huyền ảo trong đ&ecirc;m tối. Bạn kh&ocirc;ng cần phải chỉnh sửa g&igrave;, iPhone sẽ tự động k&iacute;ch hoạt chế độ Night Mode khi &aacute;nh s&aacute;ng kh&ocirc;ng đủ v&agrave; mang đến kết quả tuyệt vời nhất.</p>\r\n\r\n<p><img alt=\"iPhone Pro thiếu sáng\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iPhone-11-Pro-4.jpg\" /></p>\r\n\r\n<h3><strong>Ảnh ch&acirc;n dung x&oacute;a ph&ocirc;ng &ldquo;ảo diệu&rdquo;</strong></h3>\r\n\r\n<p>iPhone 11 Pro Max chắc chắn l&agrave; chiếc điện thoại c&oacute; khả năng chụp ảnh ch&acirc;n dung x&oacute;a ph&ocirc;ng h&agrave;ng đầu hiện nay. Hệ thống 3 camera hoạt động c&ugrave;ng l&uacute;c gi&uacute;p cho những bức ảnh ch&acirc;n dung sẽ được x&oacute;a ph&ocirc;ng ch&iacute;nh x&aacute;c, ph&acirc;n t&aacute;ch chủ thể v&agrave; hậu cảnh mượt m&agrave;, hiệu ứng l&agrave;m mờ tự nhi&ecirc;n. Tr&ecirc;n iPhone 11 Pro Max, bạn c&oacute; thể x&oacute;a ph&ocirc;ng 2 người c&ugrave;ng l&uacute;c trong bức ảnh; x&oacute;a ph&ocirc;ng với đối tượng l&agrave; vật thể. Đồng thời cường độ &aacute;nh s&aacute;ng, hiệu ứng hậu cảnh cũng được điều chỉnh để c&oacute; được kết quả mỹ m&atilde;n nhất.</p>\r\n\r\n<p><img alt=\"iPhone Pro xóa phông\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iPhone-11-Pro-5.jpg\" /></p>\r\n\r\n<h3><strong>N&acirc;ng tầm ảnh chụp bằng Smart HDR</strong></h3>\r\n\r\n<p>T&iacute;nh năng Smart HDR tr&ecirc;n iPhone 11 Pro Max sẽ gi&uacute;p ảnh chụp &ldquo;chất&rdquo; hơn bao giờ hết. Thuật to&aacute;n ti&ecirc;n tiến, cảm biến cao cấp c&ugrave;ng khả năng tự học hỏi Machine Learning sẽ gi&uacute;p &aacute;nh s&aacute;ng, độ tương phản, c&acirc;n bằng trắng v&agrave; m&agrave;u sắc trở n&ecirc;n ho&agrave;n hảo. Trong một bức ảnh chụp, chủ thể v&agrave; cảnh nền sẽ được tinh chỉnh ri&ecirc;ng biệt giống như những m&aacute;y ảnh DSLR cao cấp để mang lại bức ảnh thực sự c&oacute; hồn, ch&acirc;n thực v&agrave; sống động.</p>\r\n\r\n<p><img alt=\"iPhone Pro smart hdr\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iPhone-11-Pro-6.jpg\" /></p>\r\n\r\n<h3><strong>Quay v&agrave; chỉnh sửa video chuy&ecirc;n nghiệp</strong></h3>\r\n\r\n<p>iPhone lu&ocirc;n l&agrave; thiết bị được đ&aacute;nh gi&aacute; rất cao về quay video. Nhưng với iPhone 11 Pro Max, bạn c&ograve;n bất ngờ hơn v&igrave; những g&igrave; m&agrave; chiếc điện thoại n&agrave;y mang lại. Bộ vi xử l&yacute; mạnh mẽ v&agrave; cụm 3 camera gi&uacute;p iPhone 11 Pro Max c&oacute; thể quay những đoạn video chất lượng 4K 60fps si&ecirc;u sắc n&eacute;t. Khả năng chống rung chuy&ecirc;n nghiệp, dải nhạy s&aacute;ng cực rộng, chuyển đổi g&oacute;c nh&igrave;n giữa c&aacute;c camera gi&uacute;p video trở n&ecirc;n hấp dẫn hơn bao giờ hết. Bạn c&ograve;n c&oacute; t&iacute;nh năng zoom v&agrave;o đối tượng trong khi quay, cả h&igrave;nh ảnh lẫn &acirc;m lượng đều trở n&ecirc;n lớn hơn. Kh&ocirc;ng chỉ vậy, hệ thống phần mềm bi&ecirc;n tập v&agrave; c&ocirc;ng cụ chỉnh sửa tr&ecirc;n iPhone sẽ gi&uacute;p bạn nhanh ch&oacute;ng hậu kỳ, xuất bản đoạn video ưng &yacute;.</p>\r\n\r\n<p><img alt=\"iPhone Pro video\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iPhone-11-Pro-7.jpg\" /></p>\r\n\r\n<h3><strong>Trở n&ecirc;n xinh đẹp hơn với camera selfie 12MP</strong></h3>\r\n\r\n<p>Tr&ecirc;n iPhone 11 Pro Max, camera trước đ&atilde; được n&acirc;ng cấp l&ecirc;n độ ph&acirc;n giải 12MP, mang đến ảnh chụp sắc n&eacute;t, chi tiết v&agrave; chất lượng cao hơn. Camera n&agrave;y c&ograve;n được t&iacute;ch hợp th&ecirc;m t&iacute;nh năng quay video chuyển động si&ecirc;u chậm 120 fps, mở ra một kh&aacute;i niệm mới mang t&ecirc;n slofie. Những khoảnh khắc của bạn sẽ được lưu lại độc đ&aacute;o qua c&aacute;c đoạn video si&ecirc;u chậm quay bằng ch&iacute;nh camera trước. Selfie đ&atilde; l&agrave; qu&aacute; khứ, b&acirc;y giờ l&agrave; slofie!</p>\r\n\r\n<p><img alt=\"iPhone Pro camera selfie\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iPhone-11-Pro-8.jpg\" /></p>\r\n\r\n<h3><strong>Face ID, phương thức nhận diện khu&ocirc;n mặt bảo mật nhất tr&ecirc;n smartphone</strong></h3>\r\n\r\n<p>Face ID tr&ecirc;n iPhone 11 Pro Max được cải tiến nhận diện nhanh hơn 30%, gi&uacute;p bạn mở kh&oacute;a m&aacute;y một c&aacute;ch tiện lợi v&agrave; ho&agrave;n to&agrave;n tự nhi&ecirc;n. Để m&aacute;y xa hơn, mở kh&oacute;a dưới mọi g&oacute;c độ, Face ID mới thật tuyệt vời. Kh&ocirc;ng chỉ nhanh ch&oacute;ng, dữ liệu khu&ocirc;n mặt của bạn c&ograve;n v&ocirc; c&ugrave;ng an to&agrave;n khi kh&ocirc;ng được sao lưu ở bất cứ đ&acirc;u. Ngo&agrave;i ra, th&ocirc;ng tin bản đồ v&agrave; iMessage cũng được m&atilde; h&oacute;a để kh&ocirc;ng ai c&oacute; thể lấy th&ocirc;ng tin từ bạn. Nhanh ch&oacute;ng, tiện lợi v&agrave; rất bảo mật.</p>\r\n\r\n<p><img alt=\"iPhone 11 Pro Max\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-11-pro-max-7.jpg\" /></p>\r\n', 12, NULL, 1, 1),
(8, 'Samsung Galaxy S20 Ultra', '../uploads/637170935336423061_ss-s20-ultra-xam-1.png', '../uploads/637170935336442904_ss-s20-ultra-xam-2.png', '../uploads/637171028229012085_ss-s20-ultra-xam-4.png', 29990000, 24990000, '<ul>\r\n	<li>M&agrave;n h&igrave;nh6.9&quot;, QHD+, Dynamic AMOLED 2X, 1440 x 3200 Pixel</li>\r\n	<li>Camera sau108.0 MP, 12.0 MP, 48.0 MP, 0.5 MP</li>\r\n	<li>Camera Selfie40.0 MP</li>\r\n	<li>RAM&nbsp;12 GB</li>\r\n	<li>Bộ nhớ trong128 GB</li>\r\n	<li>CPU ModelExynos 990</li>\r\n	<li>GPUARM Mali-G77 MP11</li>\r\n	<li>Dung lượng pin5000 mAh</li>\r\n	<li>Thẻ sim2, 2 Nano SIM hoặc 1 eSIM, 1 Nano SIM</li>\r\n	<li>Hệ điều h&agrave;nhAndroid 10.0</li>\r\n	<li>Xuất xứViệt Nam</li>\r\n</ul>\r\n', 0, '<h3>Đ&aacute;nh gi&aacute; chi tiết Samsung Galaxy S20 Ultra</h3>\r\n\r\n<p><strong><a href=\"https://fptshop.com.vn/dien-thoai/samsung-galaxy-s20-ultra\" target=\"_blank\">Samsung Galaxy S20 Ultra</a>&nbsp;l&agrave; chiếc điện thoại sẽ thay đổi tương lai của nhiếp ảnh&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai\">smartphone</a>. C&ugrave;ng kh&aacute;m ph&aacute; bước tiến mang t&iacute;nh lịch sử với 5 ống k&iacute;nh camera 108MP si&ecirc;u n&eacute;t, quay phim chuẩn điện ảnh 8K tr&ecirc;n S20 Ultra.</strong></p>\r\n\r\n<p><strong><img alt=\"Samsung Galaxy S20 Ultra\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s20-ultra-1.jpg\" /></strong></p>\r\n\r\n<h3><strong>Tận hưởng m&agrave;n h&igrave;nh lớn 6,9 inch chuẩn điện ảnh</strong></h3>\r\n\r\n<p>Bạn sẽ được đắm ch&igrave;m trong những thước phim sống động tr&ecirc;n m&agrave;n h&igrave;nh lớn tr&agrave;n viền 6,9 inch Infinity-O của Samsung Galaxy S20 Ultra. M&agrave;n h&igrave;nh với c&ocirc;ng nghệ Dynamic AMOLED cao cấp, hỗ trợ HDR10+ v&agrave; độ ph&acirc;n giải QuadHD+ si&ecirc;u n&eacute;t, gi&uacute;p mọi h&igrave;nh ảnh trở n&ecirc;n ch&acirc;n thực chưa từng thấy c&ugrave;ng độ tương phản, m&agrave;u sắc ấn tượng.</p>\r\n\r\n<p><img alt=\"màn hình Samsung Galaxy S20 Ultra\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s20-ultra-2.jpg\" /></p>\r\n\r\n<h3><strong>M&agrave;n h&igrave;nh 120Hz, mượt m&agrave; trong từng cử chỉ</strong></h3>\r\n\r\n<p>Samsung S20 Ultra sở hữu m&agrave;n h&igrave;nh c&oacute; tần số qu&eacute;t 120Hz, gấp đ&ocirc;i so với c&aacute;c m&agrave;n h&igrave;nh kh&aacute;c tr&ecirc;n thị trường. Nhờ tần số qu&eacute;t cao, mọi thứ sẽ phản hồi nhanh ch&oacute;ng v&agrave; mượt m&agrave; hơn. Trải nghiệm game của bạn cũng được n&acirc;ng tầm khi tốc độ khung h&igrave;nh vượt qua ngưỡng chuẩn 60fps th&ocirc;ng thường, cho sự mượt m&agrave; ho&agrave;n hảo v&agrave; thao t&aacute;c ch&iacute;nh x&aacute;c trong từng trận chiến.</p>\r\n\r\n<p><img alt=\"màn hình Samsung Galaxy S20 Ultra\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s20-ultra-3.jpg\" /></p>\r\n\r\n<h3><strong>Cao cấp v&agrave; bền vững</strong></h3>\r\n\r\n<p>Ngo&agrave;i thiết kế cao cấp, thể hiện sự đẳng cấp, sang trọng tr&ecirc;n tay bạn, Galaxy S20 Ultra c&ograve;n c&oacute; độ bền đ&aacute;ng kinh ngạc. M&aacute;y được l&agrave;m từ k&iacute;nh v&agrave; kim loại cứng c&aacute;p, bền vững hơn khi lỡ xảy ra va đập. Tr&ecirc;n hết, S20 Ultra đạt&nbsp;<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/chuan-ip68-la-gi-khac-biet-gi-so-voi-ip67-57823\">chuẩn chống nước IP68</a>, c&oacute; thể ng&acirc;m nước ở độ s&acirc;u 1,5m trong v&ograve;ng 30 ph&uacute;t, gi&uacute;p bạn an t&acirc;m trước mọi nguy cơ từ nước.</p>\r\n\r\n<p><img alt=\"chống nước Samsung Galaxy S20 Ultra\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s20-ultra-5.jpg\" /></p>\r\n\r\n<h3><strong>Camera thay đổi tương lai ng&agrave;nh nhiếp ảnh</strong></h3>\r\n\r\n<p>Samsung Galaxy S20 Ultra trang bị cụm camera chưa từng thấy tr&ecirc;n một chiếc smartphone. Điện thoại sở hữu 4 camera sau, trong đ&oacute; camera ch&iacute;nh c&oacute; độ ph&acirc;n giải l&ecirc;n tới 108MP, camera tele c&oacute; độ ph&acirc;n giải 48MP. Sự vượt trội về phần cứng mang lại cho S20 Ultra đỉnh cao trong c&ocirc;ng nghệ nhiếp ảnh, với những h&igrave;nh ảnh v&agrave; thước phim sắc n&eacute;t đ&aacute;ng kinh ngạc.</p>\r\n\r\n<p><img alt=\"camera Samsung Galaxy S20 Ultra\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s20-ultra-6.jpg\" /></p>\r\n\r\n<h3><strong>Khả năng ph&oacute;ng to ảnh đến 100 lần</strong></h3>\r\n\r\n<p>Tin được kh&ocirc;ng, bạn c&oacute; thể ph&oacute;ng to h&igrave;nh ảnh tr&ecirc;n S20 Ultra tới 100 lần m&agrave; vẫn đạt chất lượng tuyệt vời. Ống k&iacute;nh camera của Samsung Galaxy S20 Ultra vượt xa độ ph&acirc;n giải 12MP th&ocirc;ng thường khi đạt tới 108MP, kết hợp với ống k&iacute;nh Tele 48MP mang đến khả năng zoom quang học 4x, zoom lai 10x v&agrave; zoom kỹ thuật số tới 100x. Sẵn s&agrave;ng để bạn ph&aacute; vỡ mọi khoảng c&aacute;ch, đưa những vật thể ở xa v&agrave;o trong tầm mắt, cho h&igrave;nh ảnh sắc n&eacute;t v&agrave; độ chi tiết đến kh&oacute; tin.</p>\r\n\r\n<p><img alt=\"zoom ảnh Samsung Galaxy S20 Ultra\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s20-ultra-7.jpg\" /></p>\r\n\r\n<p><img alt=\"zoom ảnh Samsung Galaxy S20 Ultra\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s20-ultra-8.jpg\" /></p>\r\n\r\n<h3><strong>Th&aacute;ch thức m&agrave;n đ&ecirc;m, kiến tạo kiệt t&aacute;c</strong></h3>\r\n\r\n<p>Với hệ thống camera xuất sắc, Samsung Galaxy S20 Ultra kh&ocirc;ng hề ngại điều kiện &aacute;nh s&aacute;ng yếu. Tr&aacute;i lại, những &aacute;nh đ&egrave;n lung linh trong m&agrave;n đ&ecirc;m trở th&agrave;nh t&aacute;c phẩm nghệ thuật đ&iacute;ch thực khi được ghi lại bởi camera S20 Ultra. Chế độ Night Mode sẽ chụp nhiều tấm h&igrave;nh c&ugrave;ng l&uacute;c, gh&eacute;p ch&uacute;ng lại v&agrave; đưa ra tấm h&igrave;nh đẹp nhất với độ chi tiết cao, giảm nhiễu, độ s&aacute;ng cũng như độ tương phản tuyệt vời.</p>\r\n\r\n<p><img alt=\"chụp đêm Samsung Galaxy S20 Ultra\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s20-ultra-9.jpg\" /></p>\r\n\r\n<h3><strong>Tự tin tỏa s&aacute;ng bằng camera selffie 40MP</strong></h3>\r\n\r\n<p>Kh&ocirc;ng chỉ camera sau, camera trước của Galaxy S20 Ultra cũng c&oacute; độ ph&acirc;n giải cao nhất tr&ecirc;n thị trường hiện nay. Cảm biến l&ecirc;n tới 40MP c&ugrave;ng những c&ocirc;ng nghệ ti&ecirc;n tiến nhất, S20 Ultra sẽ gi&uacute;p bạn chụp được những bức ảnh selfie sắc n&eacute;t, nổi bật vẻ đẹp tự nhi&ecirc;n trong mọi ho&agrave;n cảnh, kể cả điều kiện thiếu s&aacute;ng.</p>\r\n\r\n<p><img alt=\"camera selfie Samsung Galaxy S20 Ultra\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s20-ultra-10.jpg\" /></p>\r\n\r\n<h3><strong>Quay phim điện ảnh 8K, bước tiến đ&iacute;ch thực trong ng&agrave;nh c&ocirc;ng nghiệp smartphone</strong></h3>\r\n\r\n<p>Hệ thống phần cứng ưu việt cho ph&eacute;p Galaxy S20 Ultra trở th&agrave;nh chiếc điện thoại đầu ti&ecirc;n c&oacute; thể quay phim chất lượng 8K, sắc n&eacute;t gấp 4 lần chuẩn 4K v&agrave; gấp 16 lần chuẩn Full HD. H&atilde;y thử tr&igrave;nh chiếu những đoạn phim si&ecirc;u n&eacute;t l&ecirc;n TV 8K hay thậm ch&iacute; l&agrave; m&agrave;n h&igrave;nh lớn như ở rạp chiếu phim, bạn sẽ thấy chất lượng đ&aacute;ng kinh ngạc m&agrave; S20 Ultra mang lại. Ngo&agrave;i ra bạn c&ograve;n c&oacute; thể cắt những tấm h&igrave;nh mang khoảnh khắc ấn tượng trong c&aacute;c đoạn video đ&oacute; để được một bức ảnh độ ph&acirc;n giải tới 33MP, r&otilde; n&eacute;t đến từng chi tiết.</p>\r\n\r\n<p><img alt=\"quay phim Samsung Galaxy S20 Ultra\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s20-ultra-11.jpg\" /></p>\r\n\r\n<h3><strong>Video si&ecirc;u chống rung, nắm giữ trọn vẹn khoảnh khắc</strong></h3>\r\n\r\n<p>Những đoạn video chuyển động nhanh đều được ghi lại tr&ecirc;n Samsung Galaxy S20 Ultra theo c&aacute;ch mượt m&agrave; nhất, h&igrave;nh ảnh kh&ocirc;ng hề bị mờ nh&ograve;e. Sự kết hợp giữa cảm biến h&igrave;nh ảnh lớn, t&iacute;nh năng si&ecirc;u chống rung bằng AI v&agrave; chống rung quang học OIS mang đến cho bạn những thước phim chất lượng, lưu giữ trọn vẹn khoảnh khắc đ&aacute;ng nhớ.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/aRK9NGk3_T8\" width=\"640\"></iframe></p>\r\n\r\n<h3><strong>Sức mạnh của tương lai</strong></h3>\r\n\r\n<p>Cấu h&igrave;nh m&agrave; Samsung Galaxy S20 Ultra trang bị mạnh mẽ đến mức ph&aacute; vỡ mọi giới hạn trước đ&acirc;y, cho bạn những trải nghiệm tuyệt vời. Bộ vi xử l&yacute; Exynos 990 sản xuất tr&ecirc;n tiến tr&igrave;nh 7nm+ đi c&ugrave;ng 12GB RAM c&oacute; sức mạnh tương đương những mẫu m&aacute;y t&iacute;nh để b&agrave;n. Bạn cũng c&oacute; thể sử dụng điện thoại như một m&aacute;y t&iacute;nh đ&iacute;ch thực qua t&iacute;nh năng Samsung Dex. Bộ nhớ l&agrave; điều m&agrave; bạn kh&ocirc;ng cần phải nghĩ đến tr&ecirc;n S20 Ultra khi m&aacute;y c&oacute; sẵn 128GB bộ nhớ trong v&agrave; c&oacute; thể hỗ trợ th&ecirc;m 1TB nữa qua khe cắm thẻ nhớ microSD. Bạn sẽ lu&ocirc;n c&oacute; đủ kh&ocirc;ng gian lưu trữ cho những dữ liệu cần thiết.</p>\r\n\r\n<p><img alt=\"cấu hình Samsung Galaxy S20 Ultra\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s20-ultra-4.jpg\" /></p>\r\n\r\n<h3><strong>Dung lượng pin 5000 mAh, tự tin hướng tới đỉnh cao</strong></h3>\r\n\r\n<p>Vi&ecirc;n pin dung lượng lớn tới 5000 mAh của Samsung Galaxy S20 Ultra sẵn s&agrave;ng cho những trải nghiệm đỉnh cao. Thỏa sức sử dụng suốt cả ng&agrave;y d&agrave;i chỉ sau một lần sạc. Hơn nữa, điện thoại c&ograve;n hỗ trợ sạc si&ecirc;u nhanh 45W; sạc kh&ocirc;ng d&acirc;y 2.0 si&ecirc;u tốc v&agrave; t&iacute;nh năng chia sẻ sạc kh&ocirc;ng d&acirc;y. Chỉ mất khoảng v&agrave;i ph&uacute;t sạc để th&ecirc;m nhiều giờ trải nghiệm, S20 Ultra thấu hiểu cuộc sống năng động của bạn.</p>\r\n\r\n<p><img alt=\"pin Samsung Galaxy S20 Ultra\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s20-ultra-12.jpg\" /></p>\r\n\r\n<h3><strong>Bảo mật ti&ecirc;n tiến</strong></h3>\r\n\r\n<p>T&iacute;ch hợp nền tảng bảo mật Samsung Knox, Galaxy S20 Ultra c&oacute; nhiều lớp bảo vệ tr&ecirc;n điện thoại để hạn chế tối đa rủi ro bị ăn cắp dữ liệu. B&ecirc;n cạnh đ&oacute;, bạn c&oacute; thể mở kh&oacute;a m&aacute;y bằng những phương thức bảo mật ti&ecirc;n tiến nhất hiện nay l&agrave; cảm biến v&acirc;n tay si&ecirc;u &acirc;m ngay tr&ecirc;n m&agrave;n h&igrave;nh hoặc nhận diện khu&ocirc;n mặt.</p>\r\n\r\n<p><img alt=\"bảo mật Samsung Galaxy S20 Ultra\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/samsung-galaxy-s20-ultra-13.jpg\" /></p>\r\n', 999, '2020-11-27 00:00:00', 1, 2),
(9, 'Vsmart Aris', '../uploads/637359470070858671_vsmart-aris-den-1.png', '../uploads/637356760746984714_vsmart-aris-den-2.png', '../uploads/637359470071238643_vsmart-aris-den-4.png', 7490000, 7490000, '<ul>\r\n	<li>M&agrave;n h&igrave;nh6.39&quot;, FHD+, AMOLED, 1080 x 2340 Pixel</li>\r\n	<li>Camera sau64.0 MP, 8.0 MP, 8.0 MP, 2.0 MP</li>\r\n	<li>Camera Selfie20.0 MP</li>\r\n	<li>RAM&nbsp;8 GB</li>\r\n	<li>Bộ nhớ trong128 GB</li>\r\n	<li>GPUAdreno 618</li>\r\n	<li>Dung lượng pin4000 mAh</li>\r\n	<li>Thẻ sim2, Nano SIM</li>\r\n	<li>Hệ điều h&agrave;nhAndroid 10.0</li>\r\n	<li>Xuất xứViệt Nam</li>\r\n</ul>\r\n', 0, '<h3>Đ&aacute;nh gi&aacute; chi tiết Vsmart Aris 8GB-128GB</h3>\r\n\r\n<p><strong>Phi&ecirc;n bản&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/vsmart-aris-8gb-128gb\" title=\"Điện thoại Vsmart Aris 8GB-128GB\" type=\"Điện thoại Vsmart Aris 8GB-128GB\">Vsmart Aris 8GB-128GB</a>&nbsp;mang đến cho người d&ugrave;ng dung lượng RAM v&agrave; bộ nhớ trong lớn hơn, bạn sẽ c&oacute; một chiếc điện thoại chạy si&ecirc;u mượt, thiết kế thời trang, camera đẳng cấp.</strong></p>\r\n\r\n<p><strong><img alt=\"Điện thoại Vsmart Aris 8GB-128GB\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/vsmart-aris-8gb-1.jpg\" title=\"Điện thoại Vsmart Aris 8GB-128GB\" /></strong></p>\r\n\r\n<h3><strong>Sức mạnh cấu h&igrave;nh h&agrave;ng đầu</strong></h3>\r\n\r\n<p>So với c&aacute;c đối thủ trong tầm gi&aacute;, Vsmart Aris c&oacute; cấu h&igrave;nh vượt trội. Sản phẩm từ&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/vsmart\" title=\"Tham khảo thêm điện thoại Vsmart chính hãng\" type=\"Tham khảo thêm điện thoại Vsmart chính hãng\">Vsmart</a>&nbsp;mang tr&ecirc;n m&igrave;nh bị bộ vi xử l&yacute; Snapdragon 730 cực mạnh từ Qualcomm, gi&uacute;p chạy tốt mọi ứng dụng, kể cả những game 3D nặng nhất hiện nay. Việc con chip sản xuất tr&ecirc;n tiến tr&igrave;nh 8nm ti&ecirc;n tiến cũng gi&uacute;p&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai\" title=\"Xem điện thoại chính hãng giá tốt nhất\" type=\"Xem điện thoại chính hãng giá tốt nhất\">điện thoại</a>&nbsp;ti&ecirc;u hao &iacute;t năng lượng hơn. Kh&ocirc;ng chỉ vậy, với phi&ecirc;n bản 8GB RAM v&agrave; 128GB bộ nhớ trong cực lớn, Vsmart Aris cho khả năng chạy đa nhiệm mượt m&agrave;, thoải m&aacute;i c&agrave;i đặt, mở nhiều ứng dụng c&ugrave;ng l&uacute;c m&agrave; kh&ocirc;ng lo hết t&agrave;i nguy&ecirc;n trong m&aacute;y.</p>\r\n\r\n<p><img alt=\"Cấu hình Vsmart Aris siêu mạnh\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/vsmart-aris-5.jpg\" /></p>\r\n\r\n<h3><strong>Bộ tứ camera sau cực đỉnh</strong></h3>\r\n\r\n<p>Thỏa m&atilde;n niềm đam m&ecirc; nhiếp ảnh của bạn với v&ocirc; v&agrave;n t&iacute;nh năng chụp ảnh tr&ecirc;n Vsmart Aris. Bạn sẽ c&oacute; tới 4 camera với 4 vai tr&ograve; ri&ecirc;ng biệt c&ugrave;ng sự kết hợp th&ocirc;ng minh để chụp ảnh chuy&ecirc;n nghiệp hơn. Camera ch&iacute;nh 64MP chịu tr&aacute;ch nhiệm chụp ảnh ch&iacute;nh; camera g&oacute;c rộng 8MP để chụp những cảnh si&ecirc;u rộng; camera Tele 8MP cho khả năng<a href=\"https://fptshop.com.vn/dien-thoai?camera=zoom-quang-hoc\" title=\"Tham khảo điện thoại có tính năng zoom quang học\" type=\"Tham khảo điện thoại có tính năng zoom quang học\">&nbsp;zoom quang</a>&nbsp;2x v&agrave; hỗ trợ chụp ảnh x&oacute;a ph&ocirc;ng; cuối c&ugrave;ng l&agrave; camera macro 2MP để chụp ảnh si&ecirc;u cận cảnh.</p>\r\n\r\n<p><img alt=\"camera sau Vsmart Aris cực đỉnh\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/vsmart-aris-8.jpg\" /></p>\r\n\r\n<h3><strong>Kh&aacute;m ph&aacute; vẻ đẹp trong đ&ecirc;m tối</strong></h3>\r\n\r\n<p>Độ ph&acirc;n giải l&ecirc;n tới 64MP gi&uacute;p Vsmart Aris c&oacute; khả năng chụp ảnh sắc n&eacute;t. Thuật to&aacute;n th&ocirc;ng minh sẽ gh&eacute;p 4 điểm ảnh l&agrave;m 1 để bức ảnh cuối c&ugrave;ng c&oacute; k&iacute;ch thước 16MP, nhưng độ s&aacute;ng v&agrave; độ chi tiết vượt trội. V&igrave; thế d&ugrave; l&agrave; trong điều kiện thiếu s&aacute;ng, Vsmart Aris vẫn mang đến những t&aacute;c phẩm ảnh chụp chất lượng d&agrave;nh cho bạn.</p>\r\n\r\n<p><img alt=\"chụp đêm Vsmart Aris sắc nét\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/vsmart-aris-7.jpg\" /></p>\r\n\r\n<h3><strong>Camera trước 20MP l&agrave;m đẹp th&ocirc;ng minh</strong></h3>\r\n\r\n<p>Kh&ocirc;ng thua k&eacute;m g&igrave; camera trước, camera sau của Vsmart Aris cũng c&oacute; độ ph&acirc;n giải cao tới 20MP, cho những bức ảnh selfie tuyệt đẹp. T&iacute;nh năng&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai?camera=hieu-ung-lam-dep\" title=\"Xem điện thoại có hiệu ứng làm đẹp thông minh\" type=\"Xem điện thoại có hiệu ứng làm đẹp thông minh\">l&agrave;m đẹp khu&ocirc;n mặt th&ocirc;ng minh</a>&nbsp;với&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai?camera=ai-camera\" title=\"Tham khảo điện thoại có camera AI\" type=\"Tham khảo điện thoại có camera AI\">camera AI</a>&nbsp;sẽ gi&uacute;p hiệu chỉnh l&agrave;n da tự nhi&ecirc;n, kh&eacute;o l&eacute;o l&agrave;m mờ nhược điểm v&agrave; t&ocirc;n vinh vẻ đẹp của ri&ecirc;ng bạn, để lu&ocirc;n tỏa s&aacute;ng trong mọi khung h&igrave;nh.</p>\r\n\r\n<p><img alt=\"camera trước Vsmart Aris làm đẹp thông minh\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/vsmart-aris-9.jpg\" /></p>\r\n\r\n<h3><strong>Chế t&aacute;c sang trọng, kiểu d&aacute;ng cao cấp</strong></h3>\r\n\r\n<p>Thiết kế của Vsmart Aris kh&ocirc;ng chỉ sang trọng, cao cấp m&agrave; c&ograve;n mang đến cảm gi&aacute;c cầm nắm, thao t&aacute;c rất thoải m&aacute;i. Được l&agrave;m từ khung kim loại cứng c&aacute;p v&agrave; mặt lưng k&iacute;nh nh&aacute;m cao cấp, Vsmart Aris đẹp tỏa s&aacute;ng ngay tr&ecirc;n tay bạn. Mặt lưng k&iacute;nh nh&aacute;m vừa cho vẻ đẹp b&oacute;ng bẩy, lại vừa kh&ocirc;ng b&aacute;m mồ h&ocirc;i, dấu v&acirc;n tay. Cảm biến v&acirc;n tay được đặt kh&eacute;o l&eacute;o tr&ecirc;n ph&iacute;m nguồn ở cạnh b&ecirc;n, gi&uacute;p bạn mở kh&oacute;a an to&agrave;n v&agrave; nhanh ch&oacute;ng chỉ sau một c&uacute; chạm.</p>\r\n\r\n<p><img alt=\"thiết kế Vsmart Aris sang trọng cao cấp\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/vsmart-aris-2.jpg\" /></p>\r\n\r\n<h3><strong>M&agrave;n h&igrave;nh Super AMOLED si&ecirc;u n&eacute;t</strong></h3>\r\n\r\n<p>Vsmart Aris trang bị m&agrave;n h&igrave;nh lớn 6,39 inch, độ ph&acirc;n giải Full HD+ sắc n&eacute;t v&agrave; c&ocirc;ng nghệ Super AMOLED cao cấp. M&aacute;y được thiết kế viền si&ecirc;u mỏng dạng giọt nước, cho hiệu ứng thị gi&aacute;c tuyệt vời. Chất lượng m&agrave;n h&igrave;nh xuất sắc cho m&agrave;u sắc sống động, độ tương phản v&agrave; chi tiết cao. Từng h&igrave;nh ảnh, bộ phim, trang web hay c&aacute;c tựa game đều được t&aacute;i hiện một c&aacute;ch tuyệt vời.</p>\r\n\r\n<p><img alt=\"màn hình Super AMOLED của Vsmart Aris\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/vsmart-aris-3.jpg\" /></p>\r\n\r\n<h3><strong>Ti&ecirc;n phong trong c&ocirc;ng nghệ bảo mật lượng tử</strong></h3>\r\n\r\n<p>Vsmart Aris l&agrave; chiếc điện thoại đi ti&ecirc;n phong với c&ocirc;ng nghệ bảo mật lượng tử. Nhờ con chip bảo mật Quantis QRNG, mọi th&ocirc;ng tin quan trọng của bạn tr&ecirc;n smartphone đều được m&atilde; h&oacute;a theo nguy&ecirc;n tắc sử dụng &aacute;nh s&aacute;ng v&agrave; vật l&yacute; lượng tử, mang đến sự an to&agrave;n tuyệt đối. Những m&atilde; số ngẫu nhi&ecirc;n tạo th&agrave;nh từ &aacute;nh s&aacute;ng v&agrave; vật l&yacute; điện tử kh&ocirc;ng thể giải m&atilde; ngược, để th&ocirc;ng tin của bạn kh&ocirc;ng thể bị x&acirc;m phạm.</p>\r\n\r\n<p><img alt=\"bảo mật Vsmart Aris đỉnh cao\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/vsmart-aris-4.jpg\" /></p>\r\n\r\n<h3><strong>Pin dung lượng lớn, hỗ trợ sạc nhanh</strong></h3>\r\n\r\n<p>Vsmart Aris sở hữu vi&ecirc;n&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai?dung-luong-pin=tu-3000-4000-mah\" title=\"Xem thêm điện thoại có pin dung lượng 4000mAh\" type=\"Xem thêm điện thoại có pin dung lượng 4000mAh\">pin dung lượng 4000mAh</a>, đủ để bạn sử dụng thoải m&aacute;i trọn vẹn cả ng&agrave;y d&agrave;i. Hơn nữa,&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai?tinh-nang-dac-biet=sac-nhanh\" title=\"Điện thoại có công nghệ sạc nhanh\" type=\"Điện thoại có công nghệ sạc nhanh\">c&ocirc;ng nghệ sạc nhanh</a>&nbsp;18W gi&uacute;p nhanh ch&oacute;ng sạc đầy năng lượng, để bạn lu&ocirc;n c&oacute; đầy đủ năng lượng, đặc biệt trong những l&uacute;c c&oacute; việc gấp cần sạc pin nhanh.</p>\r\n\r\n<p><img alt=\"pin Vsmart Aris dung lượng lớn\" src=\"https://img.fpt.shop/f_jpg/cmpr_10/https://img.fpt.shop/f_jpg/cmpr_10/https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/vsmart-aris-6.jpg\" /></p>\r\n', 999, '2020-11-27 00:00:00', 3, 1),
(10, 'iPhone 12 Pro Max', '../uploads/637382726336418025_ip-12-pro-max-xanh-1.png', '../uploads/637382726336418025_ip-12-pro-max-xanh-1 (1).png', '../uploads/637382721010154236_ip-12-pro-max-dd.png', 43990000, 43990000, '<ul>\r\n	<li>M&agrave;n h&igrave;nh6.7&quot;, Super Retina XDR, AMOLED, Đang cập nhật</li>\r\n	<li>Camera Selfie12.0 MP</li>\r\n	<li>RAM&nbsp;6 GB</li>\r\n	<li>Bộ nhớ trong512 GB</li>\r\n	<li>GPUApple GPU 4 nh&acirc;n</li>\r\n	<li>Dung lượng pin3687 mAh</li>\r\n	<li>Thẻ sim1, 1 eSIM, 1 Nano SIM</li>\r\n	<li>Hệ điều h&agrave;nhiOS 14</li>\r\n	<li>Xuất xứTrung Quốc</li>\r\n</ul>\r\n', 0, '', 9999, '2020-11-27 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slideshows`
--

CREATE TABLE `slideshows` (
  `slideShow_id` int(11) NOT NULL,
  `slideShow_image` varchar(255) DEFAULT NULL,
  `slideShow_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slideshows`
--

INSERT INTO `slideshows` (`slideShow_id`, `slideShow_image`, `slideShow_name`) VALUES
(1, '../uploads/637375371213895903_F-H1_800x300.jpg', '1'),
(2, '../uploads/hotdeal.png', '2'),
(3, '../uploads/637371570542536298_F-H1_800x300.jpg', '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statusproducts`
--

CREATE TABLE `statusproducts` (
  `statusProduct_id` int(11) NOT NULL,
  `statusProduct_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `statusproducts`
--

INSERT INTO `statusproducts` (`statusProduct_id`, `statusProduct_name`) VALUES
(1, 'Mới Về'),
(2, 'Giảm Giá');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_pass` varchar(50) DEFAULT NULL,
  `user_gender` varchar(50) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `user_avatar` varchar(255) DEFAULT NULL,
  `user_role` varchar(10) DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_gender`, `user_address`, `user_phone`, `user_avatar`, `user_role`) VALUES
(1, 'Nguyễn Long', 'changanuong1742@gmail.com', 'chanvkl205', 'Nam', 'Quỳnh Lưu, Nghệ An', '0978864646', '../uploads/unnamed.jpg', 'admin'),
(2, 'Nguyễn Hằng', 'changanuong1742ok@gmail.com', 'chanvkl205', 'Nữ', 'Quỳnh Lưu, Nghệ An', '0978864545', '../uploads/Pirlo-Rolando-AP-570-850-1636-1606221348.jpg', 'member');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `colorproducts`
--
ALTER TABLE `colorproducts`
  ADD PRIMARY KEY (`colorProduct_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `infor`
--
ALTER TABLE `infor`
  ADD PRIMARY KEY (`infor_id`);

--
-- Chỉ mục cho bảng `memoryproducts`
--
ALTER TABLE `memoryproducts`
  ADD PRIMARY KEY (`memoryProduct_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_products_brand_id` (`brand_id`),
  ADD KEY `FK_products_statusProduct_id` (`statusProduct_id`);

--
-- Chỉ mục cho bảng `slideshows`
--
ALTER TABLE `slideshows`
  ADD PRIMARY KEY (`slideShow_id`);

--
-- Chỉ mục cho bảng `statusproducts`
--
ALTER TABLE `statusproducts`
  ADD PRIMARY KEY (`statusProduct_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `colorproducts`
--
ALTER TABLE `colorproducts`
  MODIFY `colorProduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT cho bảng `infor`
--
ALTER TABLE `infor`
  MODIFY `infor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `memoryproducts`
--
ALTER TABLE `memoryproducts`
  MODIFY `memoryProduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `slideShow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `statusproducts`
--
ALTER TABLE `statusproducts`
  MODIFY `statusProduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `colorproducts`
--
ALTER TABLE `colorproducts`
  ADD CONSTRAINT `colorproducts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `memoryproducts`
--
ALTER TABLE `memoryproducts`
  ADD CONSTRAINT `memoryproducts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `FK_products_statusProduct_id` FOREIGN KEY (`statusProduct_id`) REFERENCES `statusproducts` (`statusProduct_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
