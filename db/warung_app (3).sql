-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Mar 2015 pada 12.35
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `warung_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buildings`
--

CREATE TABLE IF NOT EXISTS `buildings` (
`building_id` int(11) NOT NULL,
  `building_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buildings`
--

INSERT INTO `buildings` (`building_id`, `building_name`) VALUES
(1, 'Ruang 1'),
(2, 'Ruang 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`menu_id` int(11) NOT NULL,
  `menu_type_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_original_price` int(11) NOT NULL,
  `menu_margin_price` int(11) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_img` text NOT NULL,
  `partner_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_type_id`, `menu_name`, `menu_original_price`, `menu_margin_price`, `menu_price`, `menu_img`, `partner_id`) VALUES
(1, 1, 'Soto Kudus ', 9500, 0, 9500, 'sotokudus.jpg', 1),
(2, 1, 'Lontong Pecel ', 10000, 0, 10000, 'kolomkita-detik-com.jpg', 1),
(3, 1, 'Ayam Bakar', 16000, 1000, 17000, 'ayam-bakar-bandung.jpg', 2),
(4, 1, 'Ayam Kremes', 17000, 0, 17000, 'ayamkremes.jpg', 2),
(5, 1, 'Tahu Gimbal', 14000, 0, 14000, 'tahugimbalcvr.jpg', 1),
(6, 1, 'Mie Goreng Jogja', 15000, 1000, 16000, 'bakmi-akup.jpg', 3),
(12, 1, 'Mie Godhog Jogja', 16000, 0, 16000, '', 3),
(13, 1, 'Lentog Kudus', 9000, 0, 9000, '', 1),
(14, 2, 'Sate Paru', 4500, 0, 4500, '', 1),
(15, 2, 'Sate Pindang Telur Puyuh', 4000, 0, 4000, '', 1),
(16, 2, 'Perkedel', 4000, 0, 4000, '', 1),
(17, 2, 'Tahu Bacem', 4000, 0, 4000, '', 1),
(18, 2, 'Tempe bacem', 4000, 0, 4000, '', 1),
(19, 2, 'Limpa Goreng', 7500, 0, 7500, '', 1),
(20, 2, 'Telor Asin', 4500, 0, 4500, '', 1),
(21, 4, 'Sinom & Beras Kencur', 7000, 0, 7000, '', 1),
(22, 4, 'Es Dawet', 8000, 0, 8000, '', 1),
(23, 4, 'Es Tape Ketan Hitam', 7000, 0, 7000, '', 1),
(24, 4, 'Es Teler', 11000, 0, 11000, '', 2),
(25, 4, 'Teh Tarik', 8000, 0, 8000, '', 1),
(26, 4, 'Es Cao', 5000, 0, 5000, '', 1),
(27, 4, 'Es Kolak 8', 8000, 0, 8000, '', 1),
(28, 5, 'Jus Strawberry', 10000, 0, 10000, '', 1),
(29, 5, 'Jus Melon', 10000, 0, 10000, '', 1),
(30, 5, 'Jus Wortel', 10000, 0, 10000, '', 1),
(31, 5, 'Jus Sirsak', 10000, 0, 10000, '', 1),
(32, 5, 'Jus Jambu Merah', 10000, 0, 10000, '', 1),
(33, 5, 'Jus Tomat', 10000, 0, 10000, '', 1),
(34, 5, 'Jus Timun', 10000, 0, 10000, '', 1),
(35, 5, 'Jus Jeruk', 10000, 0, 10000, '', 1),
(36, 5, 'Jus Alpukat ', 12000, 0, 12000, '', 1),
(37, 5, 'Mix Jus', 13000, 0, 13000, '', 1),
(38, 6, 'Teh Manis Hangat', 4000, 0, 4000, '', 1),
(39, 6, 'Teh Tawar Hangat', 4000, 0, 4000, '', 1),
(40, 6, 'Es Teh', 4000, 0, 4000, '', 1),
(41, 3, 'Pisang Goreng Salju', 7000, 0, 7000, '', 1),
(42, 3, 'Tahu Kritis (Krispi Petis)', 7000, 0, 7000, '', 1),
(43, 6, 'Es Teh Tawar', 4000, 0, 4000, '', 1),
(44, 6, 'Es Teh Tarik', 8000, 0, 8000, '', 1),
(45, 6, 'Es Lemon Tea', 6000, 0, 6000, '', 1),
(46, 7, 'Kopi Hitam', 7000, 0, 7000, '', 1),
(47, 7, 'Kopi Susu', 8000, 0, 8000, '', 1),
(48, 7, 'Kopi Tarik', 8000, 0, 8000, '', 1),
(49, 8, 'Teh Botol', 4500, 0, 4500, '', 1),
(50, 8, 'Fruit Tea', 4500, 0, 4500, '', 1),
(51, 8, 'Fanta', 5000, 0, 5000, '', 1),
(52, 8, 'Sprite', 5000, 0, 5000, '', 1),
(53, 8, 'Coca-cola', 5000, 0, 5000, '', 1),
(54, 8, 'Air Mineral Besar', 4000, 0, 4000, '', 1),
(55, 8, 'Air Mineral Kecil', 3000, 0, 3000, '', 1),
(56, 9, 'Jeruk Manis', 6000, 0, 6000, '', 1),
(57, 9, 'Jeruk Nipis', 6000, 0, 6000, '', 1),
(58, 9, 'Es Sirup', 4000, 0, 4000, '', 1),
(59, 9, 'Es Sirup Susu', 6000, 0, 6000, '', 1),
(60, 9, 'Mega Mendung', 10000, 0, 10000, '', 1),
(61, 9, 'Fanta Susu', 10000, 0, 10000, '', 1),
(62, 3, 'cheese stick keju 1', 17000, 0, 17000, '', 1),
(63, 3, 'cheese stick keju 2', 15000, 0, 15000, '', 1),
(64, 3, 'Blinjo manis', 14000, 4000, 18000, '', 2),
(65, 3, 'Sutelo 1', 9000, 0, 9000, '', 1),
(66, 3, 'Sutelo 2', 7500, 0, 7500, '', 1),
(67, 3, 'Pisang mr kepok', 13000, 0, 13000, '', 1),
(68, 3, 'Kerupuk pedas', 6500, 0, 6500, '', 1),
(69, 3, 'Peyek', 4000, 0, 4000, '', 1),
(70, 3, 'Blinjo asin', 4000, 0, 4000, '', 1),
(71, 3, 'Rambak', 5000, 0, 5000, '', 1),
(72, 3, 'Kacang', 2000, 0, 2000, '', 1),
(73, 3, 'Brem Madiun', 5500, 3000, 8500, '', 5),
(74, 3, 'Kacang Oven Uwenak', 9500, 2500, 12000, '', 5),
(75, 3, 'Yangko Mulya', 18000, 2000, 20000, '', 5),
(76, 3, 'Kentang Rimbaku', 19000, 3000, 22000, '', 5),
(77, 3, 'Sale Pisang Barlin', 14000, 3000, 17000, '', 5),
(78, 3, 'Almond Crispy', 48500, 6500, 55000, '', 5),
(79, 3, 'Kue Blinjo Wisata Rasa', 23000, 4500, 27500, '', 5),
(80, 3, 'Ender-Ender', 16000, 3000, 19000, '', 5),
(81, 3, 'Lili Peanut', 14000, 3000, 17000, '', 5),
(82, 3, 'Kue Bolu Oky', 10500, 3500, 14000, '', 5),
(83, 3, 'Bipang Premium', 12500, 3500, 16000, '', 5),
(84, 3, 'Kacang Atom', 16000, 3000, 19000, '', 5),
(85, 3, 'Bugelen Pro', 14500, 2500, 17000, '', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_types`
--

CREATE TABLE IF NOT EXISTS `menu_types` (
`menu_type_id` int(11) NOT NULL,
  `menu_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_types`
--

INSERT INTO `menu_types` (`menu_type_id`, `menu_type_name`) VALUES
(1, 'Makanan Utama'),
(2, 'Menu Pelengkap'),
(3, 'Camilan'),
(4, 'Minuman Utama'),
(5, 'Aneka Jus'),
(6, 'Teh'),
(7, 'Kopi'),
(8, 'Soft Drink'),
(9, 'Minuman Lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
`partner_id` int(11) NOT NULL,
  `partner_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `partners`
--

INSERT INTO `partners` (`partner_id`, `partner_name`) VALUES
(1, 'Ariadi'),
(2, 'Deni Jibrak'),
(3, 'Bu Irfan'),
(4, 'Fikri Abas'),
(5, 'Snack');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
`table_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `data_x` int(11) NOT NULL,
  `data_y` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tables`
--

INSERT INTO `tables` (`table_id`, `building_id`, `table_name`, `data_x`, `data_y`) VALUES
(0, 0, 'Bungkus', 0, 0),
(1, 1, 'Meja 1', 136, 175),
(2, 1, 'Meja 2', 135, 289),
(3, 1, 'Meja 3', 135, 408),
(4, 1, 'Meja 4', 399, 174),
(5, 2, 'Meja 5', 545, 232),
(6, 2, 'Meja 6', 144, 231),
(7, 2, 'Meja 7', 275, 118),
(8, 2, 'Meja 8', 276, 231),
(9, 1, 'Meja 9', 404, 417),
(10, 1, 'Meja 5', 732, 178),
(14, 2, 'Meja 9', 411, 232),
(15, 1, 'Meja 7', 1133, 184),
(16, 1, 'meja 8', 403, 296),
(17, 1, 'Meja 6', 733, 302);

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_items`
--

CREATE TABLE IF NOT EXISTS `table_items` (
`table_item_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_qty` int(11) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_total_price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `table_items`
--

INSERT INTO `table_items` (`table_item_id`, `table_id`, `menu_id`, `menu_qty`, `menu_price`, `menu_total_price`) VALUES
(1, 1, 1, 2, 4000, 8000),
(2, 1, 2, 1, 12000, 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
`transaction_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_total` int(11) NOT NULL,
  `transaction_payment` int(11) NOT NULL,
  `transaction_change` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions_tmp`
--

CREATE TABLE IF NOT EXISTS `transactions_tmp` (
`transaction_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE IF NOT EXISTS `transaction_details` (
`transaction_detail_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `transaction_detail_original_price` int(11) NOT NULL,
  `transaction_detail_margin_price` int(11) NOT NULL,
  `transaction_detail_price` int(11) NOT NULL,
  `transaction_detail_qty` int(11) NOT NULL,
  `transaction_detail_total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_tmp_details`
--

CREATE TABLE IF NOT EXISTS `transaction_tmp_details` (
`transaction_detail_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `transaction_detail_original_price` int(11) NOT NULL,
  `transaction_detail_margin_price` int(11) NOT NULL,
  `transaction_detail_price` int(11) NOT NULL,
  `transaction_detail_qty` int(11) NOT NULL,
  `transaction_detail_total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `user_login` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_code` varchar(100) DEFAULT NULL,
  `user_phone` varchar(100) DEFAULT NULL,
  `user_img` text NOT NULL,
  `user_active_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_type_id`, `user_login`, `user_password`, `user_name`, `user_code`, `user_phone`, `user_img`, `user_active_status`) VALUES
(11, 1, 'melon', '3a2cf27458c9aa3e358f8fc0f002bff6', 'melon', 'A0001', '03125435432', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
 ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_types`
--
ALTER TABLE `menu_types`
 ADD PRIMARY KEY (`menu_type_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
 ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
 ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `table_items`
--
ALTER TABLE `table_items`
 ADD PRIMARY KEY (`table_item_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transactions_tmp`
--
ALTER TABLE `transactions_tmp`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
 ADD PRIMARY KEY (`transaction_detail_id`);

--
-- Indexes for table `transaction_tmp_details`
--
ALTER TABLE `transaction_tmp_details`
 ADD PRIMARY KEY (`transaction_detail_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `menu_types`
--
ALTER TABLE `menu_types`
MODIFY `menu_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
MODIFY `partner_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `table_items`
--
ALTER TABLE `table_items`
MODIFY `table_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `transactions_tmp`
--
ALTER TABLE `transactions_tmp`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
MODIFY `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=230;
--
-- AUTO_INCREMENT for table `transaction_tmp_details`
--
ALTER TABLE `transaction_tmp_details`
MODIFY `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
