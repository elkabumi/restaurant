-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Mar 2015 pada 11.21
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buildings`
--

INSERT INTO `buildings` (`building_id`, `building_name`) VALUES
(1, 'Ruang 1'),
(2, 'Ruang 2'),
(3, 'Ruang 3'),
(4, 'Ruang 4'),
(5, 'Room 5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`menu_id` int(11) NOT NULL,
  `menu_type_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_img` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_type_id`, `menu_name`, `menu_price`, `menu_img`) VALUES
(1, 1, 'Soto Kudus ', 8000, 'sotokudus.jpg'),
(2, 1, 'Pecel ', 10000, 'kolomkita-detik-com.jpg'),
(3, 1, 'Ayam Bakar', 15000, 'ayam-bakar-bandung.jpg'),
(4, 1, 'Ayam Kremes', 15000, 'ayamkremes.jpg'),
(5, 1, 'Tahu Gimbal', 11000, 'tahugimbalcvr.jpg'),
(6, 1, 'Mie goreng Jogja', 14000, 'bakmi-akup.jpg'),
(8, 1, 'Pisang', 20000, 's6.jpg'),
(9, 1, 'Sate', 15000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_types`
--

CREATE TABLE IF NOT EXISTS `menu_types` (
`menu_type_id` int(11) NOT NULL,
  `menu_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_types`
--

INSERT INTO `menu_types` (`menu_type_id`, `menu_type_name`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tables`
--

INSERT INTO `tables` (`table_id`, `building_id`, `table_name`, `data_x`, `data_y`) VALUES
(1, 1, 'Meja 1', 494, 489),
(2, 1, 'Meja 2', 363, 492),
(3, 1, 'Meja 3', 836, 209),
(4, 1, 'Meja 4', 831, 498),
(5, 2, 'Meja 5', 141, 119),
(6, 2, 'Meja 6', 144, 231),
(7, 2, 'Meja 7', 275, 118),
(8, 2, 'Meja 8', 276, 231),
(9, 1, 'Meja 9', 189, 198),
(10, 1, 'Meja New', 193, 338),
(11, 4, 'Meja 4-1', 593, 175),
(12, 5, 'Table 1', 549, 205),
(13, 5, 'table 5 baru', 683, 205),
(14, 2, 'Meja 9', 411, 232),
(15, 1, 'Meja 7', 836, 341),
(16, 1, 'meja 11', 458, 179);

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
  `transaction_total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `table_id`, `transaction_date`, `transaction_total`) VALUES
(36, 4, '2015-02-23 12:02:21', 46000),
(37, 2, '2015-02-23 12:02:12', 40000),
(38, 1, '2015-02-23 12:02:43', 33000),
(39, 14, '2015-02-24 08:02:30', 83000),
(40, 4, '2015-02-24 08:02:12', 29000),
(41, 10, '2015-02-24 08:02:49', 108000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions_tmp`
--

CREATE TABLE IF NOT EXISTS `transactions_tmp` (
`transaction_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transactions_tmp`
--

INSERT INTO `transactions_tmp` (`transaction_id`, `table_id`, `transaction_date`, `transaction_total`) VALUES
(4, 1, '2015-02-23 02:02:05', 48000),
(5, 3, '2015-02-23 02:02:53', 23000),
(6, 15, '2015-02-23 02:02:27', 73000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE IF NOT EXISTS `transaction_details` (
`transaction_detail_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `transaction_detail_price` int(11) NOT NULL,
  `transaction_detail_qty` int(11) NOT NULL,
  `transaction_detail_total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaction_details`
--

INSERT INTO `transaction_details` (`transaction_detail_id`, `transaction_id`, `menu_id`, `transaction_detail_price`, `transaction_detail_qty`, `transaction_detail_total`) VALUES
(103, 36, 5, 11000, 1, 11000),
(104, 36, 8, 20000, 1, 20000),
(105, 36, 9, 15000, 1, 15000),
(106, 37, 4, 15000, 1, 15000),
(107, 37, 5, 11000, 1, 11000),
(108, 37, 6, 14000, 1, 14000),
(109, 38, 1, 8000, 1, 8000),
(110, 38, 2, 10000, 1, 10000),
(111, 38, 3, 15000, 1, 15000),
(112, 39, 1, 8000, 1, 8000),
(113, 39, 2, 10000, 1, 10000),
(114, 39, 3, 15000, 1, 15000),
(115, 39, 4, 15000, 1, 15000),
(116, 39, 8, 20000, 1, 20000),
(117, 39, 9, 15000, 1, 15000),
(118, 40, 6, 14000, 1, 14000),
(119, 40, 9, 15000, 1, 15000),
(120, 41, 1, 8000, 1, 8000),
(121, 41, 2, 10000, 1, 10000),
(122, 41, 3, 15000, 1, 15000),
(123, 41, 4, 15000, 1, 15000),
(124, 41, 5, 11000, 1, 11000),
(125, 41, 6, 14000, 1, 14000),
(126, 41, 8, 20000, 1, 20000),
(127, 41, 9, 15000, 1, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_tmp_details`
--

CREATE TABLE IF NOT EXISTS `transaction_tmp_details` (
`transaction_detail_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `transaction_detail_price` int(11) NOT NULL,
  `transaction_detail_qty` int(11) NOT NULL,
  `transaction_detail_total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaction_tmp_details`
--

INSERT INTO `transaction_tmp_details` (`transaction_detail_id`, `transaction_id`, `menu_id`, `transaction_detail_price`, `transaction_detail_qty`, `transaction_detail_total`) VALUES
(16, 4, 1, 8000, 1, 8000),
(17, 4, 2, 10000, 1, 10000),
(18, 4, 3, 15000, 1, 15000),
(19, 4, 4, 15000, 1, 15000),
(20, 5, 1, 8000, 1, 8000),
(21, 5, 9, 15000, 1, 15000),
(22, 6, 1, 8000, 1, 8000),
(23, 6, 2, 10000, 1, 10000),
(24, 6, 3, 15000, 1, 15000),
(25, 6, 4, 15000, 1, 15000),
(26, 6, 5, 11000, 1, 11000),
(27, 6, 6, 14000, 1, 14000);

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
MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `menu_types`
--
ALTER TABLE `menu_types`
MODIFY `menu_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `table_items`
--
ALTER TABLE `table_items`
MODIFY `table_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `transactions_tmp`
--
ALTER TABLE `transactions_tmp`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
MODIFY `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `transaction_tmp_details`
--
ALTER TABLE `transaction_tmp_details`
MODIFY `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
