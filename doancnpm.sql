-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 10, 2020 lúc 06:46 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doancnpm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'naruto', NULL, NULL),
(2, 'MARVEL', NULL, NULL),
(3, 'TRANSFORMERS', NULL, NULL),
(4, 'One Piece', NULL, NULL),
(5, 'DC Comics', NULL, NULL),
(6, 'Dragon Ball', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `members`
--

INSERT INTO `members` (`id`, `member_name`, `member_phone`, `member_address`, `created_at`, `updated_at`) VALUES
(1, 'Dang van trieu', '0969978298', 'ha noiaaa', NULL, '2020-08-03 19:53:50'),
(3, 'Nguyễn Đắc Tấn Ninh', '0962538044', 'Bắc Ninh', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_07_04_091605_create_products_table', 1),
(4, '2020_07_06_035524_create_table_categories', 1),
(5, '2020_07_14_025421_create-table-members', 1),
(6, '2020_07_14_052910_create-table-orders', 1),
(7, '2020_07_14_075721_create-table-orders_detail', 1),
(8, '2020_07_15_072118_create_table_brand', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) NOT NULL,
  `member_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `payments` int(11) NOT NULL DEFAULT 0,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `member_id`, `member_name`, `member_phone`, `member_address`, `status`, `payments`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dang van trieu', '0969978298', 'ha noi', 0, 0, 100000, NULL, '2020-08-04 04:02:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `product_quantity` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `cate_id`, `product_name`, `product_description`, `product_image`, `product_price`, `product_quantity`, `created_at`, `updated_at`) VALUES
(3, 1, 'Mô hình Figure: Akatsuki Pain', '<p>✔ Nh&acirc;n vật: Akatsuki Pain<br />\r\n✔ Anime/Manga: Naruto Shippuden<br />\r\n✔ Cao khoảng 25cm<br />\r\n✔ Nhựa PVC<br />\r\n✔ Nặng khoảng 0.5kg<br />\r\n✔ K&iacute;ch thước hộp: 23x17x29cm</p>', 'fig215-akatsuki-pain-gk-1-400x396.jpg', 640000, 50, '2020-08-03 08:12:01', '2020-08-03 08:12:01'),
(4, 1, 'Mô hình figure: Madara Uchiha', '<p>✔ Cao khoảng 32cm<br />\r\n✔ Nhựa PVC<br />\r\n✔ Nặng khoảng 1kg<br />\r\n✔ K&iacute;ch thước hộp: 26x22x36cm<br />\r\n✔ M&ocirc; h&igrave;nh tĩnh, kh&ocirc;ng cử động khớp<br />\r\n✔ Độ tuổi ph&ugrave; hợp: 15+. Dưới độ tuổi n&agrave;y phụ</p>', 'fig508-madara-uchiha-gk-1-400x400.jpg', 675000, 50, '2020-08-03 08:13:37', '2020-08-03 08:13:37'),
(5, 4, 'Mô hình figure: Portgas D. Ace', '<p>✔ Cao khoảng 16cm<br />\r\n✔ Nhựa PVC, ABS<br />\r\n✔ Nặng khoảng 1kg<br />\r\n✔ K&iacute;ch thước hộp: 30x23x35cm</p>', 'ace-mohinhdep.net-6 (1).jpg', 825000, 50, '2020-08-03 08:28:45', '2020-08-03 08:28:45'),
(6, 2, 'Spider Man Avengers Infinity War', '<ul>\r\n	<li>H&agrave;ng mới 100% fullbox</li>\r\n	<li>Đổi trả trong 3 ng&agrave;y</li>\r\n	<li>Check lỗi kĩ c&agrave;ng trước khi gửi</li>\r\n	<li>H&igrave;nh ảnh thật được chụp trực tiếp 100% tại shop</li>\r\n</ul>', 'mô-hình-iron-spider-mafex-avengers-infinity-war-bootleg-01-510x510.jpg', 555000, 50, '2020-08-03 08:31:50', '2020-08-03 08:31:50'),
(7, 4, 'Mô hình figure: Roronoa Zoro', '<p>✔ Cao khoảng 42cm<br />\r\n✔ Nhựa PVC<br />\r\n✔ Nặng khoảng 3kg.<br />\r\n✔ K&iacute;ch thước hộp: 38x32x49cm</p>', 'fig265-zoro-ngoi-mai-nha-gt-1-400x400.jpg', 1950000, 50, '2020-08-03 08:34:17', '2020-08-03 08:34:17'),
(8, 3, 'Bumblebee Wei Jiang W8601', '<ul>\r\n	<li>H&agrave;ng mới 100% fullbox</li>\r\n	<li>Đổi trả trong 3 ng&agrave;y</li>\r\n	<li>Check lỗi kĩ c&agrave;ng trước khi gửi</li>\r\n	<li>H&igrave;nh ảnh thật được chụp trực tiếp 100% tại shop</li>\r\n</ul>', 'mô-hình-bumblebee-w8601-wei-jiang-transformers-mpm03-oversize-28cm-01-510x510.jpg', 860000, 50, '2020-08-03 08:37:38', '2020-08-03 08:37:38'),
(9, 3, 'Optimus Prime Black Mamba LS-03', '<ul>\r\n	<li>H&agrave;ng mới 100% fullbox</li>\r\n	<li>Đổi trả trong 3 ng&agrave;y</li>\r\n	<li>Check lỗi kĩ c&agrave;ng trước khi gửi</li>\r\n	<li>H&igrave;nh ảnh thật được chụp trực tiếp 100% tại shop</li>\r\n</ul>', 'TB2lEL.nrorBKNjSZFjXXc_SpXa_730169050-510x510.jpg', 1235000, 50, '2020-08-03 08:39:28', '2020-08-03 08:39:28'),
(10, 6, 'Super Saiyan Son Goku', '<p>✔ Cao khoảng 27cm<br />\r\n✔ Nhựa PVC<br />\r\n✔ Nặng: 0.86kg<br />\r\n✔ K&iacute;ch thước hộp: 18x16x30.5cm</p>', 'Super-Saiyan-Son-Goku-Master-Stars-Piece-Special-Color-Ver.-FIG440-400x400.jpg', 550000, 50, '2020-08-03 08:45:38', '2020-08-03 08:45:38'),
(11, 6, 'Frieza Cooler Final', '<p>✔ Cao khoảng 26cm<br />\r\n✔ Nhựa PVC<br />\r\n✔ Nặng &hellip;<br />\r\n✔ K&iacute;ch thước hộp: 20&times;16.3&times;27.5cm</p>', 'fig375-frieza-cooler-final-form-f-2-400x400.jpg', 800000, 50, '2020-08-03 08:50:10', '2020-08-03 08:50:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_brand`
--

CREATE TABLE `table_brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `member_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `role`, `member_id`, `created_at`, `updated_at`) VALUES
(1, 'Trieudv98', 'trieudv1998@gmail.com', '$2y$10$LxUggvDO5M.yYcse73CysentKnwG8zCWj.n/Wl7l6Or65Y3q4Nnwm', '1', 1, NULL, NULL),
(3, 'Ninh', 'ninh1998@gmail.com', '$2y$10$RCMIiVBvZ8PMXBLe5jaixeTOUEnA4OzhspkFrC6k2SESLjPGN30Ua', '1', 3, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_brand`
--
ALTER TABLE `table_brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `table_brand`
--
ALTER TABLE `table_brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
