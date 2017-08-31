-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 Agu 2017 pada 04.43
-- Versi Server: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lv_taiwantea`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `slug`, `title`, `created_at`, `updated_at`) VALUES
(1, 'tea-series', 'Tea Series', '2017-07-06 17:39:52', '2017-07-06 17:39:52'),
(2, 'fruit-tea-series', 'Fruit Tea Series', '2017-07-06 17:42:54', '2017-07-06 17:42:54'),
(3, 'yakult-series', 'Yakult Series', '2017-07-06 17:43:52', '2017-07-06 17:43:52'),
(4, 'chocolate-series', 'Chocolate Series', '2017-07-06 17:44:44', '2017-07-06 17:44:44'),
(5, 'coffee-series', 'Coffee Series', '2017-07-06 17:45:44', '2017-07-06 17:45:44'),
(6, 'smoothies', 'Smoothies', '2017-07-06 17:46:36', '2017-07-06 17:46:36'),
(7, 'milk-tea-series', 'Milk Tea Series', '2017-07-06 17:47:30', '2017-07-06 17:47:30'),
(8, 'rocksalt-n-cheese', 'Rocksalt \'n Cheese', '2017-07-06 17:48:40', '2017-07-06 17:48:40'),
(9, 'taiwans-snack', 'Taiwan\'s Snack', '2017-07-06 17:49:34', '2017-07-06 17:49:34'),
(10, 'taiwans-dessert', 'Taiwan\'s Dessert', '2017-07-06 17:50:33', '2017-07-06 17:50:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hot_offers`
--

CREATE TABLE `hot_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `hot_offers`
--

INSERT INTO `hot_offers` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'images/1/hot_offers/300x300.png', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `category_id`, `slug`, `name`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'jasmine-tea', 'Jasmine Tea', '/images/1/hot_offers/kolat_full.jpg', 8000, '2017-07-06 17:42:17', '2017-07-06 17:42:17'),
(2, 1, 'black-tea', 'Black Tea', '/images/1/hot_offers/kolat_full.jpg', 8000, '2017-07-06 17:42:41', '2017-07-06 17:42:41'),
(3, 2, 'green-apple-tea', 'Green Apple Tea', '/images/1/hot_offers/kolat_full.jpg', 14000, '2017-07-06 17:43:20', '2017-07-06 17:43:20'),
(4, 2, 'kiwi-tea', 'Kiwi Tea', '/images/1/hot_offers/kolat_full.jpg', 14000, '2017-07-06 17:43:36', '2017-07-06 17:43:36'),
(5, 3, 'green-apple-yakult', 'Green Apple Yakult', '/images/1/hot_offers/kolat_full.jpg', 17000, '2017-07-06 17:44:15', '2017-07-06 17:44:15'),
(6, 3, 'kiwi-yakult', 'Kiwi Yakult', '/images/1/hot_offers/kolat_full.jpg', 17000, '2017-07-06 17:44:32', '2017-07-06 17:44:32'),
(7, 4, 'choco-latto', 'Choco Latto', '/images/1/hot_offers/kolat_full.jpg', 18000, '2017-07-06 17:45:10', '2017-07-06 17:45:10'),
(8, 4, 'belgian-chocolate', 'Belgian Chocolate', '/images/1/hot_offers/kolat_full.jpg', 19000, '2017-07-06 17:45:32', '2017-07-06 17:45:32'),
(9, 5, 'ice-latte', 'Ice Latte', '/images/1/hot_offers/kolat_full.jpg', 15000, '2017-07-06 17:46:02', '2017-07-06 17:46:02'),
(10, 5, 'cappucino-latte', 'Cappucino Latte', '/images/1/hot_offers/kolat_full.jpg', 17000, '2017-07-06 17:46:24', '2017-07-06 17:46:24'),
(11, 6, 'red-velvet-smoothies', 'Red Velvet Smoothies', '/images/1/hot_offers/kolat_full.jpg', 23000, '2017-07-06 17:46:59', '2017-07-06 17:46:59'),
(12, 6, 'chocolate-smoothies', 'Chocolate Smoothies', '/images/1/hot_offers/kolat_full.jpg', 23000, '2017-07-06 17:47:18', '2017-07-06 17:47:18'),
(13, 7, 'red-velvet-milk-tea', 'Red Velvet Milk Tea', '/images/1/hot_offers/300x300.png', 19000, '2017-07-06 17:47:52', '2017-07-06 17:47:52'),
(14, 7, 'original-classic-milk-tea', 'Original Classic Milk Tea', '/images/1/hot_offers/300x300.png', 16000, '2017-07-06 17:48:17', '2017-07-06 17:48:17'),
(15, 8, 'red-velvet-latte', 'Red Velvet Latte', '/images/1/hot_offers/300x300.png', 24000, '2017-07-06 17:49:01', '2017-07-06 17:49:01'),
(16, 8, 'cocoa-mousse', 'Cocoa Mousse', '/images/1/hot_offers/300x300.png', 24000, '2017-07-06 17:49:20', '2017-07-06 17:49:20'),
(17, 9, '7-star-crispy-chicken', '7-Star Crispy Chicken', '/images/1/hot_offers/300x300.png', 25000, '2017-07-06 17:50:00', '2017-07-06 17:50:00'),
(18, 9, 'wedges-potato', 'Wedges Potato', '/images/1/hot_offers/300x300.png', 17000, '2017-07-06 17:50:22', '2017-07-06 17:50:22'),
(19, 10, 'taiwan-ice', 'Taiwan Ice', '/images/1/hot_offers/300x300.png', 27000, '2017-07-06 17:50:51', '2017-07-06 17:50:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_05_102725_create_hot_offers_table', 1),
(4, '2017_06_05_102931_create_categories_table', 1),
(5, '2017_06_05_103025_create_items_table', 1),
(6, '2017_06_05_103355_create_toppings_table', 1),
(7, '2017_06_05_103740_create_orders_table', 1),
(8, '2017_06_05_105235_create_order_details_table', 1),
(9, '2017_06_05_105409_create_order_detail_tops_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` enum('or','cm','cl','od') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `invoice`, `name`, `phone`, `address`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, '0000001', 'Customer', '0899', 'Jl. Asshole', 22000, 'od', '2017-07-15 08:17:06', '2017-07-15 08:19:41'),
(2, '0000002', 'Customer', '0899', 'Jl. Asshole', 22000, 'cm', '2017-07-15 08:18:01', '2017-08-26 21:38:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-07-15 08:17:06', '2017-07-15 08:17:06'),
(2, 1, 2, '2017-07-15 08:17:06', '2017-07-15 08:17:06'),
(3, 2, 3, '2017-07-15 08:18:01', '2017-07-15 08:18:01'),
(4, 2, 4, '2017-07-15 08:18:01', '2017-07-15 08:18:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail_tops`
--

CREATE TABLE `order_detail_tops` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_detail_id` int(10) UNSIGNED NOT NULL,
  `topping_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `order_detail_tops`
--

INSERT INTO `order_detail_tops` (`id`, `order_detail_id`, `topping_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2017-07-15 08:17:06', '2017-07-15 08:17:06'),
(2, 1, 3, '2017-07-15 08:17:06', '2017-07-15 08:17:06'),
(3, 2, 3, '2017-07-15 08:17:06', '2017-07-15 08:17:06'),
(4, 2, 4, '2017-07-15 08:17:06', '2017-07-15 08:17:06'),
(5, 3, 2, '2017-07-15 08:18:01', '2017-07-15 08:18:01'),
(6, 3, 3, '2017-07-15 08:18:01', '2017-07-15 08:18:01'),
(7, 4, 3, '2017-07-15 08:18:01', '2017-07-15 08:18:01'),
(8, 4, 4, '2017-07-15 08:18:01', '2017-07-15 08:18:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toppings`
--

CREATE TABLE `toppings` (
  `id` int(10) UNSIGNED NOT NULL,
  `topcat_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `toppings`
--

INSERT INTO `toppings` (`id`, `topcat_id`, `slug`, `name`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'bubble', 'Bubble', '/images/1/hot_offers/300x300.png', 3000, '2017-07-06 17:52:17', '2017-07-06 17:52:17'),
(2, 1, 'mini-bubble', 'Mini Bubble', '/images/1/hot_offers/300x300.png', 3000, '2017-07-06 17:52:49', '2017-07-06 17:52:49'),
(3, 2, 'bbq', 'BBQ', '/images/1/hot_offers/300x300.png', 0, '2017-07-06 17:53:11', '2017-07-06 17:53:11'),
(4, 2, 'seaweed', 'Seaweed', '/images/1/hot_offers/300x300.png', 0, '2017-07-06 17:53:28', '2017-07-06 17:53:28'),
(5, 3, 'bubble-dessert', 'Bubble (Dessert)', '/images/1/hot_offers/300x300.png', 0, '2017-07-06 17:54:15', '2017-07-06 17:54:15'),
(6, 3, 'mini-bubble-dessert', 'Mini Bubble (Dessert)', '/images/1/hot_offers/300x300.png', 0, '2017-07-06 17:54:31', '2017-07-06 17:54:31'),
(7, 4, 'vanilla-ice-cream', 'Vanilla Ice Cream', '/images/1/hot_offers/300x300.png', 5000, '2017-07-06 17:55:39', '2017-07-06 17:55:39'),
(8, 4, 'green-tea-ice-cream', 'Green Tea Ice Cream', '/images/1/hot_offers/300x300.png', 5000, '2017-07-06 17:56:05', '2017-07-06 17:56:05'),
(9, 5, 'vanilla-ice-cream-dessert', 'Vanilla Ice Cream (Dessert)', '/images/1/hot_offers/300x300.png', 0, '2017-07-06 17:56:47', '2017-07-06 17:56:47'),
(10, 5, 'green-tea-ice-cream-dessert', 'Green Tea Ice Cream (Dessert)', '/images/1/hot_offers/300x300.png', 0, '2017-07-06 17:57:07', '2017-07-06 17:57:07'),
(11, 6, 'half-sugar-50', 'Half Sugar (50%)', '/images/1/hot_offers/300x300.png', 0, '2017-07-06 17:57:48', '2017-07-06 17:57:48'),
(12, 6, 'normal-sugar-100', 'Normal Sugar (100%)', '/images/1/hot_offers/300x300.png', 0, '2017-07-06 17:58:07', '2017-07-06 17:58:07'),
(13, 7, 'half-ice-50', 'Half Ice (50%)', '/images/1/hot_offers/300x300.png', 0, '2017-07-06 17:58:39', '2017-07-06 17:58:39'),
(14, 7, 'normal-ice-100', 'Normal Ice (100%)', '/images/1/hot_offers/300x300.png', 0, '2017-07-06 17:58:55', '2017-07-06 17:58:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `topping_categories`
--

CREATE TABLE `topping_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `topping_categories`
--

INSERT INTO `topping_categories` (`id`, `slug`, `title`, `created_at`, `updated_at`) VALUES
(1, 'drink', 'Drink', '2017-07-06 17:51:35', '2017-07-06 17:51:35'),
(2, 'food', 'Food', '2017-07-06 17:52:58', '2017-07-06 17:52:58'),
(3, 'dessert', 'Dessert', '2017-07-06 17:53:40', '2017-07-06 17:53:40'),
(4, 'ice-cream', 'Ice Cream', '2017-07-06 17:55:13', '2017-07-06 17:55:13'),
(5, 'ice-cream-dessert', 'Ice Cream (Dessert)', '2017-07-06 17:56:27', '2017-07-06 17:56:27'),
(6, 'sugar', 'Sugar', '2017-07-06 17:57:16', '2017-07-06 17:57:16'),
(7, 'ice', 'Ice', '2017-07-06 17:58:15', '2017-07-06 17:58:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@mail.com', '$2y$10$16e.Oxw4i06kRYv0oeAQS.oAjgS.8INP7YBt0Ug85XmVmfc47XVde', 'admin', '4f0cO6raU3wWNf22G7DSvGhK9ltv3Zz0PsJ9aktGVFUQeMAaLpxpQihHXLBQ', NULL, NULL),
(2, 'Manager', 'manager@mail.com', '$2y$10$KzoTTZmJOecPC3a8L5QT1eSd0zBlYsfW8zQcN6NFzIcOsICosGNhG', 'manager', NULL, NULL, NULL),
(3, 'Supervisor', 'supervisor@mail.com', '$2y$10$bliGYIMivqx9XT8ghP910OtH9glylouyhK7z/rdMjgV9jWcvm7r6W', 'supervisor', 'LrhEw26ZqsolhHe0fpTkCkDxC0Yw7FnLJbejjMmlWkAw5HoUlYUID5h5h4WA', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `hot_offers`
--
ALTER TABLE `hot_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_slug_unique` (`slug`),
  ADD KEY `items_category_id_index` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_index` (`order_id`),
  ADD KEY `order_details_item_id_index` (`item_id`);

--
-- Indexes for table `order_detail_tops`
--
ALTER TABLE `order_detail_tops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_tops_order_detail_id_index` (`order_detail_id`),
  ADD KEY `order_detail_tops_topping_id_index` (`topping_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `toppings`
--
ALTER TABLE `toppings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topcat_id` (`topcat_id`);

--
-- Indexes for table `topping_categories`
--
ALTER TABLE `topping_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `topping_categories_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `hot_offers`
--
ALTER TABLE `hot_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_detail_tops`
--
ALTER TABLE `order_detail_tops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `toppings`
--
ALTER TABLE `toppings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `topping_categories`
--
ALTER TABLE `topping_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_detail_tops`
--
ALTER TABLE `order_detail_tops`
  ADD CONSTRAINT `order_detail_tops_order_detail_id_foreign` FOREIGN KEY (`order_detail_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_tops_topping_id_foreign` FOREIGN KEY (`topping_id`) REFERENCES `toppings` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `toppings`
--
ALTER TABLE `toppings`
  ADD CONSTRAINT `toppings_ibfk_1` FOREIGN KEY (`topcat_id`) REFERENCES `topping_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
