-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2020 lúc 05:46 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cnpm_voucher`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT 0,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `image`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(20, 'Ẩm thực', 'am-thuc', NULL, NULL, 1, 1, '2020-11-27 09:37:20', '2020-11-27 10:36:24'),
(21, 'Spa & làm đẹp', 'spa-lam-dep', NULL, NULL, 0, 1, '2020-11-27 09:37:46', '2020-11-27 10:36:23'),
(22, 'Giải trí & thể thao', 'giai-tri-the-thao', NULL, NULL, 0, 1, '2020-11-27 09:37:57', '2020-11-28 13:28:35'),
(23, 'Buffet', 'buffet', NULL, NULL, 1, 1, '2020-11-27 09:38:20', '2020-11-27 16:13:11'),
(24, 'Vé sự kiện', 've-su-kien', NULL, NULL, 0, 1, '2020-11-27 09:38:33', '2020-11-27 10:36:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT 0,
  `image` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `quantity` int(20) DEFAULT 0,
  `head` int(11) DEFAULT 0,
  `how_to_use` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `remarkable_thing` text DEFAULT NULL,
  `hot` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `image`, `category_id`, `content`, `quantity`, `head`, `how_to_use`, `location`, `remarkable_thing`, `hot`, `created_at`, `updated_at`) VALUES
(16, 'La Vela Saigon Hotel 5* - Buffet Trưa Hải Sản Tôm Hùm, Cua, Ghẹ, Quầy Lẩu Nhật, Sushi, Dimsum, 100 M', 'la-vela-saigon-hotel-5---buffet-trua-hai-san-tom-hum-cua-ghe-quay-lau-nhat-sushi-dimsum-100-mon-truy', 450000, 29, 'asdfa.jpg', 20, 'Là một trong những địa chỉ buffet hàng đầu tại Sài Gòn, Nhà hàng Mermaid thuộc La Vela Saigon Hotel 5* luôn là sự lựa chọn đáng tin cậy của đông đảo người yêu ẩm thực. Chất lượng luôn được thể hiện qua thực đơn buffet vô cùng phong phú, thường xuyên được thay đổi, món ăn có hương vị hấp dẫn, cùng cách trình bày không kém phần công phu, tỉ mỉ. Lần này, mời bạn cùng đến với Mermaid Restaurant, thưởng thức ngay tiệc Buffet trưa hải sản tôm hùm, cua, ghẹ, lẩu Nhật, sushi, dimsum và 100 món 3 miền đặc sắc, miễn phí nước uống, tráng miệng. Cơ hội trải nghiệm nghệ thuật ẩm thực đỉnh cao trong một không gian vô cùng sang trọng và đẳng cấp đang chờ đợi bạn!', 100, 0, '- Thời hạn sử dụng voucher: từ 01/11/2020 đến 02/01/2021.\r\n\r\n- Địa chỉ sử dụng voucher: Mermaid Restaurant - Tầng 25, La Vela Saigon Hotel 5* - 280 Nam Kỳ Khởi Nghĩa, Phường 8, Quận 3, Tp.HCM. ĐT: 028 3622 2280.\r\n\r\n- Áp dụng cho: Buffet trưa hải sản tôm hùm, cua, ghẹ, lẩu Nhật, sushi, dimsum và 100 món 3 miền đặc sắc - Free soft drink, tráng miệng. Tham khảo menu tại đây.\r\n\r\n- Thời gian phục vụ: 11h30 - 14h tất cả các ngày trong tuần. Không áp dụng lễ.\r\n\r\n- Sử dụng 01 voucher/ 01 người lớn/ 01 tôm hùm nướng phô mai (không bù tiền).\r\n\r\n- Đối với trẻ em:\r\n\r\n+ Dưới 1m: miễn phí (mỗi người lớn chỉ đi kèm một trẻ em)\r\n\r\n+ Từ 1m đến 1.4m: Tính trực tiếp 50% vé người lớn tại nhà hàng\r\n\r\n+ Trên 1.4m: Tính 01 voucher như người lớn\r\n\r\n- Áp dụng cho dùng tại chỗ. Đã bao gồm 10% VAT và 5% phí phục vụ. Nhà hàng chịu trách nhiệm xuất hóa đơn khi khách hàng yêu cầu.\r\n\r\n- Khách hàng vui lòng đặt chỗ trước khi đến. Trường hợp không đặt chỗ trước, nhà hàng xin phép được cáo lỗi nếu không còn chỗ trống.\r\n\r\n- Không áp dụng đồng thời với các chương trình khuyến mãi khác.\r\n\r\n- Phiếu không có giá trị quy đổi thành tiền mặt, không trả lại tiền thừa.\r\n\r\n- Thanh toán online nhận ngay voucher điện tử.\r\n\r\n- Thanh toán trả sau nhận voucher giấy miễn phí cho đơn hàng từ 150.000vnđ trở lên, đơn hàng dưới 150.000vnđ thu phí giao hàng 9.000vnđ.', 'La Vela Saigon Hotel 5* - 280 Nam Kỳ Khởi Nghĩa, Phường 8, Quận 3, Tp.HCM', '- Tọa lạc tại trung tâm Thành phố Hồ Chí Minh, Khách sạn La Vela Saigon 5* với 280 phòng nghỉ sang trọng và đẳng cấp, dịch vụ hoàn hảo, là địa chỉ lưu trú tuyệt vời cho du khách. \r\n\r\n- Mermaid Restaurant nằm tại tầng 25 của Khách sạn La Vela Saigon, nơi để bạn thưởng thức những bữa tiệc buffet thượng hạng. \r\n\r\n- Không gian rộng lớn, thiết kế đầy sáng tạo, vừa hiện đại, vừa sang trọng và tinh tế, phù hợp cho những bữa ăn gia đình ấm cúng, hẹn hò lãng mạn hoặc tổ chức tiệc chiêu đãi...\r\n\r\n- Nhà hàng sở hữu view 360 độ toàn Sài Gòn và hồ bơi vô cực đẹp nhất Việt Nam. Đây cũng là địa điểm check in “xịn xò” tại La Vela Saigon Hotel.\r\n\r\n- Thực đơn buffet trưa với các loại hải sản cao cấp như: Tôm hùm đút lò (nướng phô mai) 01 khách/ 01 con, Cua, Ghẹ chế biến sẵn với các loại sốt (thay đổi hằng ngày) (Ghẹ cháy tỏi, Cua Bắc Mỹ sốt me), lẩu Nhật, sushi, dimsum và 100 món 3 miền đặc sắc.\r\n\r\n- Miễn phí nước uống, tráng miệng.\r\n\r\n- Món nước thay đổi phong phú, đa dạng.\r\n\r\n- Đội ngũ đầu bếp tại Mermaid Restaurant có nhiều năm kinh nghiệm, trong đó có sự góp mặt của siêu đầu bếp Việt hàng đầu thế giới.\r\n\r\n- Để mang đến những món ăn đẳng cấp thế giới, Mermaid Restaurant luôn đặt ra cho mình những nguyên tắc lựa chọn nguồn nguyên liệu tươi – ngon – sạch, được nhập khẩu từ các nhà cung cấp uy tín.\r\n\r\n- Tham khảo menu tại đây.', 0, NULL, NULL),
(17, 'Hệ Thống King BBQ Buffet – Vua Nướng Hàn Quốc', 'he-thong-king-bbq-buffet-vua-nuong-han-quoc', 318000, 15, '361724-he-thong-king-bbq-buffet-vua-nuong-han-quoc.jpg', 23, 'Hệ Thống King BBQ Buffet – Vua Nướng Hàn Quốc. Voucher 318,000 VNĐ, Còn 270,000 VNĐ, Giảm 15%. Chỉ Có Tại Hotdeal.vn!', 200, 0, '- Thời hạn sử dụng voucher: đến 30/12/2020.\r\n\r\n- Địa điểm sử dụng voucher: Hệ Thống King BBQ Buffet:\r\n\r\n+ 92 Hòa Bình, Phường Phú Trung, Quận 11, TP.HCM. Điện thoại: 028 7301 8768.\r\n\r\n+ Lotte Pico - 2F2 Tầng 2, Lotte Mart Tân Bình, Số 20 đường Cộng Hòa, Phường 4, Quận Tân Bình, TP.HCM. Điện thoại: 028 7301 0339.\r\n\r\n+ Lotte Mart Q.11 - 1F-01, Lotte Mart Phú Thọ, 968 Đường 3/2, Phường 15, Quận 11, TP.HCM. Điện thoại: 028 7307 1779.\r\n\r\n+ Big C An Lạc - 1231 QL1A, Khu phố 5, Quận Bình Tân, TP.HCM. Điện thoại: 028 7302 4568.\r\n\r\n- 01 voucher áp dụng cho 01 phần buffet giá 289.000đ (chưa bao gồm VAT) (tương đương 318.000đ đã VAT).\r\n\r\n- Tham khảo menu: http://kingbbq.com.vn/thuc-don/\r\n\r\n- Thời gian áp dụng: 10h-22h từ T2-T6, 10h-16h từ T7-CN (không áp dụng 24, 25/12/2020).\r\n\r\n- Không áp dụng đồng thời các chương trình khuyến mãi khác, ưu đãi thẻ (thẻ thành viên, thẻ nhân viên, thẻ ngân hàng...).\r\n\r\n- Chính sách trẻ em:\r\n\r\n+ Dưới 1m: miễn phí (01 người lớn kèm 01 trẻ em)\r\n\r\n+ Từ 1m – dưới 1.3m: phụ thu 30% giá vé người lớn, thu trực tiếp tại nhà hàng theo giá tại nhà hàng 289.000 (chưa bao gồm VAT)\r\n\r\n+ Từ 1,3m trở lên: tính như vé người lớn\r\n\r\n- 01 khách hàng được mua nhiều phiếu. Sử dụng 01 phiếu/người.\r\n\r\n- Khách hàng chỉ bù thêm 66.000 để dùng buffet giá cao hơn.\r\n\r\n- Khách hàng chỉ bù thêm 99.000 để dùng buffet giá cao hơn + refill nước ngọt không giới hạn.\r\n\r\n- Không áp dụng cho mua mang về.\r\n\r\n- Giá trên đã bao gồm 10% VAT. Nhà hàng King BBQ chịu trách nhiệm xuất hóa đơn tài chính khi khách hàng yêu cầu (theo đúng số tiền khách hàng mua trên voucher).\r\n\r\n- Voucher phải còn nguyên vẹn, không bị rách hoặc tẩy xóa. Voucher hợp lệ là voucher có tem chống hàng giả và mã code 2D.\r\n\r\n- Khách hàng vui lòng liên hệ trước khi đến.\r\n\r\n- Khách đi nhóm từ 10 người trở lên, vui lòng đặt chỗ trước 24h để nhà hàng sắp xếp chỗ. Trường hợp khách hàng không đặt bàn trước, nhà hàng King BBQ xin cáo lỗi khách hàng và hẹn khách hàng vào thời điểm khác để phục vụ nếu nhà hàng không còn bàn trống.\r\n\r\n- Thanh toán online nhận ngay voucher điện tử.\r\n\r\n- Thanh toán trả sau nhận voucher giấy miễn phí cho đơn hàng từ 150.000vnđ trở lên, đơn hàng dưới 150.000vnđ thu phí giao hàng 9.000vnđ.', 'Lotte Pico - 2F2 Tầng 2, Lotte Mart Tân Bình, số 20 đường Cộng Hòa, Phường 4, Q.Tân Bình', '- Sở hữu 53 nhà hàng trên cả nước, King BBQ – Vua Nướng Hàn Quốc là địa chỉ lý tưởng để bạn thưởng thức hơn hơn 200 món Hàn đúng điệu được tẩm ướp và chế biến từ công thức bí truyền Hàn Quốc.\r\n\r\n- Đến với tiệc buffet tại King BBQ, thực khách sẽ được trải nghiệm đầy đủ và trọn vẹn thế giới ẩm thực tinh tế, đầy màu sắc của xứ sở kim chi thông qua hơn 100 món ăn được làm từ những nguyên liệu tươi ngon và an toàn với công thức chế biến độc quyền. Điểm đặc biệt nhất là bạn sẽ được thưởng thức vô số các món nướng mang phong cách Hàn đúng điệu.\r\n\r\n- Nguyên liệu hảo hạng, được chế biến từ thịt bò Mỹ, heo, gà, hải sản tươi ngon.\r\n\r\n- Bí quyết của King BBQ – Vua Nướng Hàn Quốc nằm ở nước sốt tẩm ướp thịt được chế biến từ nguyên liệu hoàn toàn tự nhiên, theo công thức bí truyền, do bếp trưởng Hàn Quốc hơn 40 năm kinh nghiệm nghiên cứu và chế biến.\r\n\r\n- Món ăn được nướng trên hệ thống bếp than không khói hiện đại, các món nướng vừa lưu giữ vị ngọt thơm của các món thịt mà không hại cho sức khỏe.\r\n\r\n- Không gian nhà hàng King BBQ – Vua Nướng Hàn Quốc được thiết kế sang trọng, hiện đại, thích hợp để tụ họp gia đình, bạn bè hay đồng nghiệp thân quen.\r\n\r\n- Cung cách phục vụ chu đáo, chuyên nghiệp, mức giá hợp lý.\r\n\r\n- Tham khảo menu: http://kingbbq.com.vn/thuc-don/', 0, NULL, NULL),
(18, 'Hệ Thống Grill & Cheer - Buffet Thịt Nướng, Hải Sản, Lẩu Hàn - Nhật', 'he-thong-grill-cheer---buffet-thit-nuong-hai-san-lau-han---nhat', 164000, 21, '361987-he-thong-grill-cheer-buffet-thit-nuong-hai-san-lau-han-nhat.jpg', 23, 'Ẩm thực nướng – lẩu theo phong cách Hàn – Nhật đã du nhập vào Việt Nam từ rất nhiều năm nay và đã nhận được nhiều sự yêu thích của đông đảo các tầng lớp thực khách. Phong cách ẩm thực này được ưa chuộng không chỉ bởi hương vị các món ăn đặc sắc mà còn do đậm đà tính bản xứ, hiện đại, đưa người ăn đến với những trải nghiệm mới mẻ. Bạn cũng sẽ dễ dàng nhận thấy sự phổ biến của các nhà hàng nướng – lẩu theo phong cách Hàn – Nhật với mật độ dày đặc trên phố hiện nay. Và một trong những nơi để lại ấn tượng nhất cho thực khách chính là Grill & Cheer Buffet.', 2000, 0, '- Thời hạn sử dụng voucher: từ 17/11/2020 đến 26/02/2021. \r\n\r\n- Địa điểm sử dụng: Hệ thống Grill & Cheer Buffet\r\n\r\n1. Grill & Cheer Sense City - Giga Mall: Lầu 3 – 10, Giga Mall, Số 242 Đường Phạm Văn Đồng, Quận Thủ Đức. ĐT: (028) 3636 3338.\r\n\r\n2. Grill & Cheer Vincom Quận 9: L4-19, Vincom Plaza Lê Văn Việt, Số 50 Lê Văn Việt, Quận 9. ĐT: (028) 3730 5373.\r\n\r\n3. Grill & Cheer An Giang: 224 Trần Hưng Đạo, Khóm Bình Long 3, Mỹ Bình, TP. Long Xuyên. Điện thoại: (029) 6395 9698.\r\n\r\n4. Grill & Cheer Vincom Cần Thơ: L4 – 12+13, Vincom Plaza Xuân Khánh, Số 209, Đường 30/4, Xuân Khánh, Quận Ninh Kiều. Điện thoại: (029) 2373 2233.\r\n\r\n5. Grill & Cheer Bình Dương: Tầng trệt, Khu dân cư Biconsi Phú Hòa, Đường D1, Phường Phú Hòa, TP. Thủ Dầu Một, Bình Dương. Điện thoại: (0274) 2234 568.\r\n\r\n- Áp dụng cho: Buffet thịt nướng và lẩu Hàn - Nhật trưa/ tối tại Hệ thống Grill & Cheer Buffet:\r\n\r\n+ Menu buffet 208,000 VND (đã bao gồm VAT) giảm còn 164,000 VND.\r\n\r\n+ Menu buffet 296,000 VND (đã bao gồm VAT) giảm còn 230,000 VND.\r\n\r\n+ Menu buffet 351,000 VND (đã bao gồm VAT) giảm còn 274,000 VND.\r\n\r\n- Tham khảo menu tại đây: món chính, món khác.\r\n\r\n- Ưu đãi cho nhóm từ 4 khách trở lên sử dụng menu 319.000đ: tặng mỗi khách 1 ly nước ngọt.\r\n\r\n- Thời gian áp dụng: từ 10h - 22h từ thứ 2 đến thứ 6.\r\n\r\n- Không áp dụng cho thứ 7, Chủ nhật và các ngày lễ: 20/11, 24/12, 31/12, 01/01/2021 & 12/02/2021 - 21/02/2021 tức: Tết âm lịch (từ mùng 1 đến mùng 10 Tết).  \r\n\r\n- Sử dụng 01 voucher/01 người.\r\n\r\n- Không giới hạn số lượng voucher/hóa đơn.\r\n\r\n- Đối với trẻ em:\r\n\r\n+ Dưới 1m: miễn phí\r\n\r\n+ Cao từ 1m – dưới 1,3m: giảm giá 50% trên giá buffet\r\n\r\n+ Từ 1,3m trở lên: tính như vé người lớn\r\n\r\n- Giá trên đã bao gồm 10% VAT. Grill & Cheer Buffet chịu trách nhiệm xuất hóa đơn tài chính khi khách hàng yêu cầu (theo giá bán voucher).\r\n\r\n- Không áp dụng cho mua mang về.\r\n\r\n- Một khách hàng được mua nhiều phiếu.\r\n\r\n- Vui lòng liên hệ đặt bàn 02 ngày trước khi đến theo số điện thoại: 028 3730 5373. Nếu nhà hàng đã kín chỗ hoặc khách hàng không đặt chỗ trước, Grill & Cheer Buffet xin cáo lỗi khách hàng và hẹn khách hàng vào thời điểm khác để phục vụ.\r\n\r\n- Thanh toán online nhận ngay voucher điện tử.\r\n\r\n- Thanh toán trả sau nhận voucher giấy miễn phí cho đơn hàng từ 150.000vnđ trở lên, đơn hàng dưới 150.000vnđ thu phí giao hàng 9.000vnđ.', '1. Grill & Cheer Sense City - Giga Mall: Lầu 3 – 10, Giga Mall, Số 242 Đường Phạm Văn Đồng, Quận Thủ Đức. ĐT: (028) 3636 3338.\r\n\r\n2. Grill & Cheer Vincom Quận 9: L4-19, Vincom Plaza Lê Văn Việt, Số 50 Lê Văn Việt, Quận 9. ĐT: (028) 3730 5373.\r\n\r\n3. Grill & Cheer An Giang: 224 Trần Hưng Đạo, Khóm Bình Long 3, Mỹ Bình, TP. Long Xuyên. Điện thoại: (029) 6395 9698.\r\n\r\n4. Grill & Cheer Vincom Cần Thơ: L4 – 12+13, Vincom Plaza Xuân Khánh, Số 209, Đường 30/4, Xuân Khánh, Quận Ninh Kiều. Điện thoại: (029) 2373 2233.\r\n\r\n5. Grill & Cheer Bình Dương: Tầng trệt, Khu dân cư Biconsi Phú Hòa, Đường D1, Phường Phú Hòa, TP. Thủ Dầu Một, Bình Dương. Điện thoại: (0274) 2234 568.', '- Hệ thống Buffet Grill & Cheer hiện có nhiều chi nhánh tại các tỉnh thành, chuyên phục vụ Buffet nướng và lẩu phong cách Hàn – Nhật, thu hút đông đảo thực khách bởi các món ăn ngon cùng không gian sang trọng, ấn tượng.\r\n\r\n- Thực đơn đa dạng với 03 menu khác nhau, giúp thực khách thoải mái lựa chọn, gồm các món thịt nướng như sườn bò Úc đặc biệt, dẻ sườn bò Mỹ, cổ bò Mỹ, lưỡi bò, ba chỉ bò Mỹ, vai cừu Úc, bắp bò Úc, ba chỉ heo, nầm heo, nạc dăm, đùi gà,... không chỉ tươi, xắt lát đúng kỹ thuật mà còn được tẩm ướp với nhiều loại sốt đặc biệt như sốt Grill & Cheer độc quyền tại nhà hàng, sốt Thô Chông, sốt Quang Yang, sốt Obathan, sốt Teriyaki, sốt muối, sốt chao,..\r\n\r\n- Bên cạnh thực đơn món nướng, Grill & Cheer còn phục vụ thực khách các loại lẩu thật ngon miệng như lẩu kim chi cay, lẩu Shabu bò bổ dưỡng, lẩu Shabu hải sản đậm đà. Và tất nhiên, mỗi món lẩu sẽ đi kèm các loại thịt, hải sản, rau và nấm tươi ngon để tạo nên hương thơm và mùi vị thơm ngon khó cưỡng.\r\n\r\n- Buffet line được bày trí bắt mắt với các loại sushi, gỏi cuốn, salad, cơm chiên, quầy tráng miệng với trái cây, chè, kem sẽ tạo nên sự vẹn tròn cho bữa ăn của bạn.\r\n\r\n- Nhà hàng sử dụng than không khói, mang tới không gian lý tưởng, sạch sẽ và không bám mùi.\r\n\r\n- Không gian được bày trí sang trọng, ấn tượng với nhiều khu vực để thực khách lựa chọn. Nội thất, dụng cụ ăn uống & các line buffet được sắp đặt gọn gàng, khéo léo, sạch sẽ.\r\n\r\n- Đầu bếp nhà hàng là người đã có kinh nghiệm lâu năm trong việc chế biến các món ăn Hàn, Nhật.\r\n\r\n- Nhân viên nhà hàng được đào tạo bài bản, phục vụ chuyên nghiệp, luôn niềm nở hướng dẫn tận tình để khách lựa chọn món ngon.\r\n\r\n- Voucher áp dụng cho: Buffet thịt nướng và lẩu Hàn - Nhật trưa/ tối tại Hệ thống Grill & Cheer Buffet:\r\n\r\n+ Menu buffet 208,000 VND (đã bao gồm VAT) giảm còn 164,000 VND.\r\n\r\n+ Menu buffet 296,000 VND (đã bao gồm VAT) giảm còn 230,000 VND.\r\n\r\n+ Menu buffet 351,000 VND (đã bao gồm VAT) giảm còn 274,000 VND.\r\n\r\n- Ưu đãi cho nhóm từ 4 khách trở lên sử dụng menu 319.000đ: tặng mỗi khách 1 ly nước ngọt.\r\n\r\n- Tham khảo menu tại đây: món chính, món khác.', 0, NULL, NULL),
(19, 'Buffet Trưa Lẩu Hong Kong Cao Cấp - Bò Mỹ, Hải Sản Tại LaMe Hotpot', 'buffet-trua-lau-hong-kong-cao-cap---bo-my-hai-san-tai-lame-hotpot', 299000, 40, '361981-buffet-trua-lau-hong-kong-cao-cap-bo-my-hai-san-tai-lame-hotpot.jpg', 23, 'Bạn yêu thích các món lẩu, đặc biệt là lẩu Trung Hoa? Bạn muốn tìm một không gian để thưởng thức những bữa ăn ấm cúng cùng gia đình, bạn bè? Nhà hàng LaMe Hotpot với chương trình Buffet Lẩu Bò Mỹ, Hải Sản Cao Cấp, thực đơn đa dạng cùng hương vị đặc sắc cho bạn thỏa sức khám và trải nghiệm những món ăn tinh túy nhất.', 3000, 0, '- Thời hạn sử dụng voucher: từ 12/11/2020 đến 08/02/2021.\r\n\r\n- Địa điểm sử dụng voucher: Nhà hàng LaMe Hotpot - 545 Phan Văn Trị, Phường 5, Quận Gò Vấp (đối diện siêu thị Emart Gò Vấp). Hotline: 028 6682 6926.\r\n\r\n- Fanpage: https://www.facebook.com/lamehotpot/\r\n\r\n- Áp dụng cho Buffet lẩu trưa bò Mỹ, hải sản cao cấp chuẩn vị Hong Kong.\r\n\r\n- Thời gian áp dụng: 11h - 15h từ thứ 2 đến thứ 6.\r\n\r\n- Trừ Lễ: 24/12, 31/12, 01/01/2021.\r\n\r\n- Sử dụng 01 voucher/01 người/01 lần sử dụng.\r\n\r\n- Chính sách cho trẻ em:\r\n\r\n+ Dưới 1m: miễn phí\r\n\r\n+ Từ 1m đến dưới 1,3m: tính 70% giá vé (thanh toán tại nhà hàng)\r\n\r\n+ Từ 1,3m trở lên: tính như người lớn\r\n\r\n- Nhà hàng nhận phục vụ tối thiểu 2 người trở lên.\r\n\r\n- Không áp dụng mang về.\r\n\r\n- Giá voucher chưa bao gồm 10% VAT, nhà hàng luôn tính VAT khi ra hóa đơn.\r\n\r\n- Khách hàng vui lòng đặt chỗ trước khi đến để được phục vụ tốt nhất qua hotline: 028 6682 6926. Nhà hàng không bảo đảm chỗ ngồi cho khách nếu không đặt chỗ.\r\n\r\n- Khách hàng vui lòng xuất trình voucher trước khi sử dụng & gọi thức ăn vừa đủ, nếu thừa LaMe Hotpot sẽ phụ thu 100,000đ/người.\r\n\r\n- Không áp dụng đồng thời với các chương trình khuyến mãi khác.\r\n\r\n- Thanh toán online nhận ngay voucher điện tử.\r\n\r\n- Thanh toán trả sau nhận voucher giấy miễn phí cho đơn hàng từ 150.000vnđ trở lên, đơn hàng dưới 150.000vnđ thu phí giao hàng 9.000vnđ.', '545 Phan Văn Trị, P.5, Gò Vấp', '- Nhà hàng LaMe Hotpot chuyên về các món lẩu Trung Hoa đặc sắc, khác biệt, mang đến cho quý khách những trải nghiệm về lẩu hoàn toàn mới lạ.\r\n\r\n- Menu phong phú với 6 vị nước lẩu khác nhau: Lẩu Tứ Xuyên, Lẩu Thái, Lẩu Collagen, Lẩu Satay, Lẩu cà chua, Lẩu cải chua.\r\n\r\n- Nước lẩu đậm đà, hấp dẫn, phù hợp với cả những thực khách khó tính nhất, thực khách ăn chay.\r\n\r\n- Menu nhúng đa dạng với hơn 55 loại, gồm các loại bò thượng hạng, hải sản cao cấp, rau nấm tươi xanh…\r\n\r\n- Mì tươi handmade được làm từ bột và các rau củ tự nhiên, không hóa chất bảo quản, đảm bảo cho sức khỏe.\r\n\r\n- Quầy gia vị sốt với hơn 26 loại gia vị, tha hồ mix theo cách riêng của quý khách.\r\n\r\n- Không gian nhà hàng mang đậm phong cách Trung Hoa, sang trọng, thoáng mát.', 0, NULL, NULL),
(20, 'Combo Lẩu Thập Cẩm Tôm Càng + Hàu Cho 2-3 Người Tại Lẩu Tôm Càng Xiên', 'combo-lau-thap-cam-tom-cang-hau-cho-2-3-nguoi-tai-lau-tom-cang-xien', 239000, 29, '361892-combo-lau-thap-cam-tom-cang-hau-cho-2-3-nguoi-tai-lau-tom-cang-xien.jpg', 20, 'Là một trong những quán ăn tiên phong về lẩu tôm càng tại Sài Gòn, Lẩu Tôm Càng Xiên tự tin mang đến cho thực khách những vị nước lẩu độc đáo cùng chất lượng tôm, hải sản luôn đảm bảo tươi sống. Trải qua hơn 6 năm phục vụ và ghi dấu ấn trong lòng nhiều người, đến nay, Lẩu Tôm Càng Xiên đã có 6 chi nhánh ở khắp các quận, trở thành điểm đến quen thuộc của nhiều thực khách. Lần này, Hotdeal mời bạn đến với Lẩu Tôm Càng Xiên chi nhánh 33 Trần Văn Quang, quận Tân Bình và thưởng thức combo lẩu thập cẩm tôm và hàu cho 2-3 người, giá ưu đãi chỉ 169.000 đồng.\r\n\r\n ', 3000, 0, '- Thời hạn sử dụng voucher: từ 06/11/2020 đến 06/02/2021.\r\n\r\n- Địa điểm sử dụng voucher: Lẩu Tôm Càng Xiên - 33 Trần Văn Quang, Phường 10, Quận Tân Bình. ĐT: 0354505999 – 0354505777.\r\n\r\n- Website: lautomcangxien.vn\r\n\r\n- Áp dụng cho Combo Lẩu thập cẩm tôm + hàu cho 2- 3 người tại Lẩu Tôm Càng Xiên.\r\n\r\nCombo gồm:\r\n\r\n+ Lẩu thập cẩm gồm: tôm càng, bò, mực giá trị 159.000 VNĐ\r\n\r\n+ 10 con hàu\r\n\r\n- Giờ áp dụng: 10h - 23h từ thứ 2 - Chủ nhật, áp dụng lễ.\r\n\r\n- Sử dụng 01 voucher/combo.\r\n\r\n- Áp dụng ăn tại chỗ. Không áp dụng mang về.\r\n\r\n- Một khách hàng được mua nhiều phiếu.\r\n\r\n- Không áp dụng đồng thời với các chương trình khuyến mãi khác.\r\n\r\n- Khách hàng vui lòng liên hệ trước khi đến. Trong trường hợp khách hàng không đặt bàn trước, nhà hàng Lẩu Tôm Càng Xiên xin cáo lỗi khách hàng và hẹn khách hàng vào thời điểm khác để phục vụ nếu nhà hàng không còn bàn trống. Hotline: 0354505999 – 0354505777.\r\n\r\n- Phiếu không có giá trị quy đổi thành tiền mặt, không trả lại tiền thừa.\r\n\r\n- Thanh toán online nhận ngay voucher điện tử.\r\n\r\n- Thanh toán trả sau nhận voucher giấy miễn phí cho đơn hàng từ 150.000vnđ trở lên, đơn hàng dưới 150.000vnđ thu phí giao hàng 9.000vnđ.', '33 Trần Văn Quang, phường 10, quận Tân Bình', '- Lẩu Tôm Càng Xiên chuyên phục vụ các món ăn chế biến từ tôm càng.\r\n\r\n- Với 6 chi nhánh ở khắp các quận, Lẩu Tôm Càng Xiên tự tin mang đến cho thực khách những vị nước lẩu độc đáo cùng chất lượng tôm, hải sản luôn đảm bảo tươi sống.\r\n\r\n- Voucher áp dụng cho Combo Lẩu thập cẩm tôm + hàu cho 2 - 3 người tại Lẩu Tôm Càng Xiên. Combo gồm:\r\n\r\n+ Lẩu thập cẩm gồm: tôm càng, bò, mực giá trị 159.000 VNĐ\r\n\r\n+ 10 con hàu\r\n\r\n- Lẩu thập cẩm với nước dùng chua cay rất kích thích vị giác, nguyên liệu nhúng lẩu gồm tôm càng tươi sống vớt từ hồ của quán, thịt bò, mực tạo nên hương vị vô cùng hấp dẫn.\r\n\r\n- Nước lẩu chế biến từ 100% rau quả tươi, không sử dụng bột lẩu hay hương vị nhân tạo nào khác, đảm bảo sức khỏe cho quý khách.\r\n\r\n- Không gian thoáng mát, bàn ghế rộng rãi, thoải mái khi dùng bữa.\r\n\r\n- Phong cách phục vụ chu đáo, nhiệt tình.', 0, NULL, NULL),
(21, 'Set Menu Món Âu Dành Cho 02 Người Tại The Olive Steak House', 'set-menu-mon-au-danh-cho-02-nguoi-tai-the-olive-steak-house', 799000, 49, '362056-set-menu-mon-au-danh-cho-02-nguoi-tai-the-olive-steak-house.jpg', 20, 'Set Menu Món Âu Dành Cho 02 Người Tại The Olive Steak House', 3000, 0, '- Thời hạn sử dụng voucher: từ 23/11/2020 đến 23/02/2021.\r\n\r\n- Địa điểm sử dụng voucher: The Olive Steakhouse - 102/7 Cống Quỳnh, Phường Phạm Ngũ Lão, Quận 1. Hotline: 090 941 7199.\r\n\r\n- Facebook: https://www.facebook.com/TheOliveSteakHouse\r\n\r\n- Khách hàng chọn 01 trong 02 menu sau:\r\n\r\nMENU 01:\r\n\r\n* 02 món khai vị (starter) gồm:\r\n\r\n+ 01 phần Mỳ Mamma Meatballs\r\n\r\n+ 01 phần Mỳ Ý tôm sú sốt Alfredo\r\n\r\n* Món chính (main course) gồm:\r\n\r\n+ 02 phần Steak Ribeye thăn vai bò Úc (Định lượng: 200 gram/ phần)\r\n\r\n* Tráng miệng gồm:\r\n\r\n+ 02 phần tráng miệng Panna Cotta/ Tiramisu\r\n\r\nMENU 02:\r\n\r\n* 02 món khai vị (starter) gồm:\r\n\r\n+ 01 phần Tôm sú sốt Sriracha chua ngọt\r\n\r\n+ 01 phần Mỳ Ý cua sốt kem và cà chua\r\n\r\n* Món chính (main course) gồm:\r\n\r\n+ 02 phần Steak Ribeye thăn vai bò Úc (Định lượng: 200 gram/ phần)\r\n\r\n* Tráng miệng gồm:\r\n\r\n+ 02 phần tráng miệng Panna Cotta/ Tiramisu\r\n\r\n- Thời gian áp dụng: 11h30 - 22h từ thứ 3 - Chủ nhật, không áp dụng lễ tết.\r\n\r\n- Break time: 15h - 17h.\r\n\r\n- Giá set menu chưa bao gồm 5% phí dịch vụ, quý khách vui lòng thanh toán thêm 5% sau khi sử dụng dịch vụ\r\n\r\n- Sử dụng 01 voucher/01 menu (không bù tiền).\r\n\r\n- Áp dụng tại chỗ, không áp dụng mua mang về.\r\n\r\n- Khách hàng liên hệ Hotline: 090 941 7199 để đặt chỗ trước khi đến (Trong trường hợp khách hàng không gọi đặt bàn trước hoặc đã kín chỗ, nhà hàng xin cáo lỗi và hẹn phục vụ khách hàng vào thời điểm khác).\r\n\r\n- Thanh toán online nhận ngay voucher điện tử.\r\n\r\n- Thanh toán trả sau nhận voucher giấy miễn phí cho đơn hàng từ 150.000vnđ trở lên, đơn hàng dưới 150.000vnđ thu phí giao hàng 9.000vnđ.', 'The Olive Steakhouse Cống Quỳnh: 102/7 Cống Quỳnh, Phường Phạm Ngũ Lão, Quận 1.', '- Nhà hàng The Olive Steakhouse nằm ngay trung tâm Quận 1, thuận tiện cho việc đi lại.\r\n\r\n- Đến Olive Steakhouse, thực khách sẽ được thưởng thức những bữa ăn thịnh soạn theo phong cách Âu với mức giá phải chăng, xứng tầm chất lượng.\r\n\r\n- Thực đơn đa dạng, bao gồm: các món soup, salad, mỳ Ý, BBQ,... và đặc biệt là các món beefsteak tuyệt hảo như Tenderloin, Ribeye, Striploin, Oyster Blade ăn kèm với 1 trong 5 loại sốt đặc biệt của nhà hàng: sốt tiêu, sốt phô mai, sốt kem nấm, mù tạt, rượu vang.\r\n\r\n- Món beefsteak tại Olive Steakhouse được chế biến từ thịt bò Úc nhập khẩu chất lượng cao.\r\n\r\n- Đội ngũ đầu bếp của nhà hàng có nhiều năm kinh nghiệm trong việc nấu các món Âu và có trải nghiệm sâu rộng với nền ẩm thực phương Tây.\r\n\r\n- Không gian sang trọng, cổ điển, lãng mạn, độc đáo không kém phần hiện đại tại Olive Steak House khiến cho thực khách có cảm giác như đang tận hưởng bữa ăn trong một góc nhỏ trời Tây giữa lòng Sài Gòn.', 0, NULL, NULL),
(22, 'Hệ Thống Buzza Pizza - Pizza Tự Chọn Cho 02 Người Giá rẻ', 'he-thong-buzza-pizza---pizza-tu-chon-cho-02-nguoi-gia-re', 180000, 50, '362046-he-thong-buzza-pizza-pizza-tu-chon-cho-02-nguoi.jpg', 20, 'Pizza là món ăn trứ danh của ẩm thực Ý, được thực khách khắp nơi trên thế giới ưa chuộng. Tại TPHCM, Buzza Pizza – nhà hàng chuyên phục vụ món Ý chắc chắn sẽ khiến các tín đồ Pizza có thể thỏa mãn cơn thèm của mình với thực đơn Pizza đa dạng, hương vị cực ngon và giá cả rất phải chăng.', 3000, 0, '- Thời hạn sử dụng voucher: từ 23/11/2020 đến hết 13/03/2021.\r\n\r\n- Địa chỉ sử dụng voucher: Hệ thống 02 chi nhánh Buzza Pizza. Hotline: 1900 98 98 07 (từ 9h - 18h).\r\n\r\n1/ Buzza Pizza Gò Vấp: Emart Gò Vấp, 366 Phan Văn Trị, Phường 5, Quận Gò Vấp.\r\n\r\n2/ Buzza Pizza Quận 7: 51-53 Nguyễn Thị Thập, Phường Tân Hưng, Quận 7.\r\n\r\n- Website:  http://buzzapizza.vn/\r\n\r\n- Voucher áp dụng cho Pizza truyền thống tự chọn size 30cm 01 trong 04 loại sau:\r\n\r\n1. Gorgonzola Pizza - Pizza sốt kem phủ phô mai Gorgonzola dùng kèm mật ong\r\n\r\n2. Diavola Pizza - Pizza phô mai sốt cà nhân xúc xích xông khói\r\n\r\n3. Chicken BBQ Pizza - Pizza phô mai sốt BBQ nhân thịt gà\r\n\r\n4. Margherita Pizza - Pizza phô mai sốt cà\r\n\r\n- Thời gian phục vụ: 10h30 - 22h từ thứ 2 đến thứ 6. Không áp dụng thứ 7, chủ nhật & lễ (20/11, 24/12, 25/12, 30/12, 1/1, 14/2).\r\n\r\n- Lịch nghỉ Tết: từ 04/02/2020 đến hết 21/02/2021.\r\n\r\n- Sử dụng 01 voucher/ 01 pizza. Tối đa 02 voucher/ bàn/ bill.\r\n\r\n- Giá trên chưa bao gồm 10% VAT. Nhà hàng luôn phụ thu 10% VAT khi ra bill.\r\n\r\n- Áp dụng tại chỗ. Không áp dụng mang về.\r\n\r\n- Khách hàng vui lòng không sử dụng đồ ăn thức uống từ bên ngoài vào nhà hàng.\r\n\r\n- Khách hàng vui lòng liên hệ đặt chỗ trước khi đến để đảm bảo còn chỗ. Nhà hàng xin cáo lỗi & hẹn phục vụ vào thời điểm khác nếu khách hàng không đặt chỗ trước hoặc nhà hàng không còn chỗ trống.\r\n\r\n- Không áp dụng đồng thời với các chương trình khuyến mãi khác.\r\n\r\n- Phiếu không có giá trị quy đổi thành tiền mặt, không trả lại tiền thừa.\r\n\r\n- Thanh toán online nhận ngay voucher điện tử.', 'Buzza Pizza quận 7: Tầng 1, 51 - 53 Nguyễn Thị Thập, P. Tân Hưng, Quận 7,TP. HCM', '- Buzza Pizza là nhà hàng Ý phục vụ nhiều món ngon hợp khẩu vị cả thực khách Việt và thực khách nước ngoài như: Pizza, Pasta, Steak, Texas BBQ, Korean Grill, Salad, thức uống...\r\n\r\n- Không gian phong cách Tây Âu sang trọng, tựa như thiên đường nước Ý thu nhỏ, cho thực khách cảm giác như đang thưởng thức món Âu giữa trời Tây.\r\n\r\n- Đầu bếp nước ngoài và Việt Nam chuyên về ẩm thực Âu.\r\n\r\n- Nguyên liệu cao cấp hoàn toàn nhập khẩu. Tất cả các nguyên liệu, quy trình ủ bột, làm bánh, lò nướng, phương thức chế biến đều mang đậm phong cách Ý.\r\n\r\n- Tất cả các nguyên liệu, quy trình ủ bột, làm bánh, lò nướng, phương thức chế biến đều mang đậm phong cách Ý.\r\n\r\n- Voucher áp dụng cho Pizza truyền thống tự chọn size 30cm 01 trong 04 loại sau:\r\n\r\n1. Gorgonzola Pizza - Pizza sốt kem phủ phô mai Gorgonzola dùng kèm mật ong\r\n\r\n2. Diavola Pizza - Pizza phô mai sốt cà nhân xúc xích xông khói\r\n\r\n3. Chicken BBQ Pizza - Pizza phô mai sốt BBQ nhân thịt gà\r\n\r\n4. Margherita Pizza - Pizza phô mai sốt cà', 0, NULL, '2020-11-28 13:52:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
