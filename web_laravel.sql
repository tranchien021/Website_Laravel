-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 29, 2021 lúc 09:24 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(255) NOT NULL,
  `name` varchar(900) NOT NULL,
  `content` varchar(9000) NOT NULL,
  `img` varchar(900) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `name`, `content`, `img`, `time`) VALUES
(0, 'Góc bất ngờ, viền benzel trên Note 9 dày hơn Note 8', 'Trong một tweet mới, Ice Universe cho thấy Samsung đã thực sự “cải lùi” thiết kế một bước đáng ngạc nhiên từ Note 8 với Galaxy Note 9: viền benzel.\r\nVâng, Samsung thực sự đi ngược lại xu hướng khi trang bị Galaxy Note 9 với viền bezel bên dày hơn Galaxy Note 8. Nó cũng dày hơn đáng kể so với Galaxy S9 và Galaxy S9 + mà công ty phát hành vào tháng 2.\r\nThật thú vị, sự thay đổi này Samsung đã giấu trong hình ảnh quảng bá Note 9. Với việc sử dụng hình nền tối màu trùng lặp với mặt trước thì Samsung đã khéo léo ẩn đi viền benzel trên chiếc flagship.', 'blog1.jpg', '2021-06-12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
(2, 'Chien', 'tranchien021@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0349521656', NULL, NULL),
(3, 'Chien', 'tranchien021@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0349521656', NULL, NULL),
(4, 'Chien', 'tranchien021@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0349521656', NULL, NULL),
(5, 'Chien', 'minhchien21@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0349521656', '2021-08-28 23:39:05', '2021-08-28 23:39:05'),
(6, 'Chien', 'minhchien212@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '0349521656', '2021-08-29 00:22:27', '2021-08-29 00:22:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_07_28_062608_create_sessions_table', 1),
(7, '2021_08_16_030954_customer', 1),
(8, '2021_08_16_040713_shipping', 1),
(31, '2021_08_18_075730_demo', 2),
(35, '2021_08_17_074301_payment', 3),
(36, '2021_08_17_074346_order', 3),
(37, '2021_08_17_074405_order_detail', 3),
(41, '2021_08_18_081812_users', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 2, 7, 1, '72,297,500.00', 'Đang chờ xử lý', NULL, NULL),
(2, 2, 8, 2, '35,392,500.00', 'Đang chờ xử lý', NULL, NULL),
(3, 2, 10, 3, '224,273,500.00', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sale_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sale_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'IPhone 11 | VN ', '29250000', 1, NULL, NULL),
(2, 1, 2, 'Iphone 12 ProMax', '30500000', 1, NULL, NULL),
(3, 2, 1, 'IPhone 11 | VN ', '29250000', 1, NULL, NULL),
(4, 3, 1, 'IPhone 11 | VN ', '29250000', 6, NULL, NULL),
(5, 3, 3, 'Samsunng Galaxy A72', '9850000', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '2', 'Đang chờ xử lý ', NULL, NULL),
(2, '1', 'Đang chờ xử lý ', NULL, NULL),
(3, '2', 'Đang chờ xử lý ', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` varchar(900) NOT NULL,
  `img` varchar(900) NOT NULL,
  `name` varchar(900) NOT NULL,
  `address` varchar(900) NOT NULL,
  `date` date NOT NULL,
  `theloai` varchar(900) NOT NULL,
  `price` int(255) NOT NULL COMMENT '3000',
  `content` varchar(9000) NOT NULL,
  `id` int(255) NOT NULL,
  `tinhtrang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `img`, `name`, `address`, `date`, `theloai`, `price`, `content`, `id`, `tinhtrang`) VALUES
('IP', 'product1.jpg', 'IPhone 11 | VN ', 'Dak Song   ', '2021-06-09', 'NB', 29250000, 'San Pham chat luong cao  ', 1, NULL),
('IP', 'product1.jpg', 'Iphone 12 ProMax', 'Dak Song', '2021-06-24', 'GT', 30500000, 'San Pham Chất Lượng Hàng Đầu', 2, NULL),
('SS', 'product3.jpg', 'Samsunng Galaxy A72', 'TP HO CHi MINH', '2021-06-10', 'NB', 9850000, 'Chat Luong cuc ky cao', 3, NULL),
('SS', 'product4.jpg', 'Samsunng Galaxy A71', 'TP Hồ Chí Minh', '2021-06-09', 'NB', 7700000, 'Sản phẩm đẹp', 4, NULL),
('NK', 'product5.jpg', 'Nokia 2.4', '1', '0000-00-00', 'NB', 2100000, '1', 5, NULL),
('NK', 'product6.jpg', 'Nokia Xr20', '2', '2021-03-03', 'NB', 9890000, '2', 6, NULL),
('RM', 'product7.jpg', 'Realme 7 Pro', '3', '0000-00-00', 'NB', 7590000, '3', 7, NULL),
('RM', 'product8.jpg', 'Realme X9 5G', '4', '0000-00-00', 'NB', 10590000, '4', 8, NULL),
('XM', 'product9.jpg', 'Xiaomi Mi 11 5G 128GB', '5', '0000-00-00', 'GT', 15790000, '5', 9, NULL),
('XM', 'product10.jpg', 'Xiaomi Redmi 9 4G', '6', '0000-00-00', 'GT', 16750000, '6', 10, NULL),
('VV', 'product11.jpg', 'Vivo X60 Pro 5G', '7', '0000-00-00', 'GT', 14950000, '7', 11, '1'),
('VV', 'product12.jpg', 'Vivo X52 Pro 4G', '8', '0000-00-00', 'GT', 7100000, '8', 12, '1'),
('VS', 'product13.jpg', 'Vsmart Star 4', '9', '0000-00-00', 'GT', 1740000, '9', 13, '1'),
('VS', 'product14.jpg', 'Vsmart Star 5', '12', '0000-00-00', 'GT', 1990000, '12', 14, '1'),
('HW', 'product15.jpg', 'Huawei P40', '11', '0000-00-00', 'GT', 8900000, '111', 15, '1'),
('HW', 'product16.jpg', 'Huawei Y6p', '2', '0000-00-00', 'GT', 5900000, '3', 16, '1'),
('IP', '1629947739-Product.jpg', 'ASUS ROG Phone 5', '1', '2021-08-06', 'NB', 22900000, '1', 17, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cbHaHhrGjfCpCzKMIpgCShRWD09jZBkmuyBRuQNR', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMjZ5SXpwUzR3dGhIVVBLUkJ2VHRzcFMwVFN2ZHQxek9BdXl4RUF3cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9MRUFSTl9QSFAvTGFyYXZlbC9NeVByb2plY3QvcHVibGljL2FkbWluL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJzdGF0ZSI7czo0MDoiT3lzY0g0b2lrTWhBRVh3WnJ2TXRwWUFnWXNhMmZrWmJBa3ZSdTNvZyI7czoxMjoiQWNjb3VudF9OYW1lIjtOO3M6MTA6IkFjY291bnRfSWQiO047fQ==', 1630160579),
('FQ7R82M3cMa26vAgNnYMJSrEh4o7XRzDAze8Iaot', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo1OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1NjoiaHR0cDovL2xvY2FsaG9zdDo4MDgwL0xFQVJOX1BIUC9MYXJhdmVsL015UHJvamVjdC9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoibnk0cDJiTHdLZjNXR0EzWmgwUEcwQlE0Mnd0Z2M0aGpwQk9RV2ZFViI7czoxMToiY3VzdG9tZXJfaWQiO047czoxMzoiY3VzdG9tZXJfbmFtZSI7czo1OiJDaGllbiI7fQ==', 1630221803),
('hT3TOxN16GeRMOVQREgMda9KmG3PjVfjIAaqwCk4', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGw4U3lnVzBHelNkS2lqSEQ2a1hYZ2JtZzZxZndRd0JSWVpjOUUwciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9MRUFSTl9QSFAvTGFyYXZlbC9NeVByb2plY3QvcHVibGljL2xvZ2luX2NoZWNrb3V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1630208357),
('KCGJnsMN2lcXnv1w7vjlYN9NKV03SSmyjSO2mRf4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0JDUURQVm16SmF6TEQ5ME56VEJKSHduT0JuT3VBVEtNNFEwb0twZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzU6Imh0dHA6Ly9taW5oY2hpZW4uY29tOjgwODAvTEVBUk5fUEhQL0xhcmF2ZWwvTXlQcm9qZWN0L3B1YmxpYy9sb2dpbl9jaGVja291dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1630207509),
('SI5LEOZueXziNtZP0Odue7GWEiq8Eqc2thkgJiJy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXIyTGpqN3dKa0tTcUJZNFlaNXByZnFNT3lPamh1bk5JZkhXV2U0SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbl9jaGVja291dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1630208127),
('Ww1lFzt6kM5q6GjL0zqcrXUQljtvt6k3Ctziv6Mq', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZ1FqYXVFU0RCSjdGZW9hZTFVbVhQWWV5RzdMRmxPbTJ3WFczeXdMNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9MRUFSTl9QSFAvTGFyYXZlbC9NeVByb2plY3QvcHVibGljL2FkbWluL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJzdGF0ZSI7czo0MDoiQldUbDVwUVdtNXlNUERDdEJwbXlSc3hISjNhRHR0MUdCbkpUQUZLZCI7czoxMjoiQWNjb3VudF9OYW1lIjtzOjE0OiJDaGnhur9uIFRy4bqnbiI7czoxMDoiQWNjb3VudF9JZCI7aToyMjt9', 1630161624);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_notes` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_email`, `created_at`, `updated_at`, `shipping_notes`) VALUES
(5, 'Chien', 'Dak Song Dak Song', '0349521656', 'tranchien021@gmail.com', NULL, NULL, 'Can than'),
(6, 'Chien', 'Dak Song Dak Song', '0349521656', 'tranchien021@gmail.com', NULL, NULL, 'Can than'),
(7, 'Chien', 'Dak Song Dak Song', '0349521656', 'tranchien021@gmail.com', NULL, NULL, 'carefull all item whern you pick me'),
(8, 'Chien', 'Thuan Thanh Dak Song Dak Nong', '0349521656', 'minhchien2105@gmai.com', NULL, NULL, 'Can than vi hang de vo'),
(9, 'Chien', 'Dak Song Dak Song', '0349521656', 'tranchien021@gmail.com', NULL, NULL, 'qqqq'),
(10, 'Chien', 'Thuan Thanh Dak Song Dak Nong', '0349521656', 'tranchien021@gmail.com', NULL, NULL, 'Cẩn thận khi giao hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_social`
--

CREATE TABLE `table_social` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `table_social`
--

INSERT INTO `table_social` (`user_id`, `provider_user_id`, `provider`, `user`) VALUES
(23, '3106374602928594', 'facebook', 22),
(24, '106549812776318699768', 'GOOGLE', 23),
(25, '113638728203321687628', 'GOOGLE', 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(255) NOT NULL,
  `Tên` varchar(900) NOT NULL,
  `theloai` varchar(900) NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `Tên`, `theloai`, `meta_desc`, `meta_keywords`) VALUES
(1, 'IPhone', 'IP', 'Hiện đại ', 'Iphone 13'),
(2, 'SamSung', 'SS', 'Mới Nhất ', 'Điện thoại Sam Sung'),
(3, 'Nokia', 'NK', 'Hiện đại và mới nhất ', 'Điện thoại Nokia '),
(4, 'RealMi', 'RM', 'Hiện đại và mới nhất ', 'Điện thoại RealMi'),
(5, 'XiaoMe', 'XM', 'Hiện đại và mới nhất ', 'Điện thoại'),
(6, 'ASUS', 'AS', 'Hiện đại và mới nhất ', 'Điện thoại'),
(7, 'VSmart', 'VS', 'Hiện đại và mới nhất ', 'Điện thoại'),
(8, 'Huawei', 'HW', 'Hiện đại và mới nhất ', 'Điện thoại'),
(9, 'ViVo', 'VV', 'Hiện đại và mới nhất ', 'Điện thoại'),
(11, 'Phone New', 'PN', 'Hiện đại và mới nhất ', 'Điện thoại'),
(15, 'Phone New', 'PN', 'Phone new là sản phẩm mới ra mắt của công ty công nghệ Minh Chiến', 'Phone new mới ra mắt , Điện thoại Phone new');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `useName` varchar(900) NOT NULL,
  `passWord` varchar(900) NOT NULL,
  `level` int(255) NOT NULL,
  `email` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `useName`, `passWord`, `level`, `email`) VALUES
(1, 'minhchien ', '1', 1, ' tranchien021@gmail.com'),
(2, '18520530', '1', 1, ''),
(4, '2', '2', 0, '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Chien', 'tranchien022@gmail.com', '1', '1', '2021-08-18 06:34:07', '2021-08-28 01:14:47'),
(22, 'Chiến Trần', 'tranchien021@gmail.com', '', '0', '2021-08-28 07:26:30', '2021-08-28 07:26:30'),
(23, 'admin admin', 'projectdoan21@gmail.com', '', '0', '2021-08-28 07:26:51', '2021-08-28 07:26:51');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `table_social`
--
ALTER TABLE `table_social`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `table_social`
--
ALTER TABLE `table_social`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
