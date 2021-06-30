-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Apr 2021 pada 09.08
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` char(10) NOT NULL,
  `skill_competence` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `skill_competence`) VALUES
(2021151001, 'X', 'Akuntansi dan Keuangan Lembaga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_history`
--

CREATE TABLE `log_history` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `login` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_history`
--

INSERT INTO `log_history` (`log_id`, `user_id`, `status`, `login`, `logout`) VALUES
(4, 2021151001, 'Login', '2021-04-06 00:58:12', '2021-04-06 00:58:12'),
(5, 2021151001, 'Logout', '2021-04-06 02:09:47', '2021-04-06 02:24:52'),
(6, 2021151001, 'Logout', '2021-04-06 02:27:35', '2021-04-06 02:34:43'),
(7, 2021151001, 'Logout', '2021-04-06 02:34:52', '2021-04-06 02:37:38'),
(8, 2021151001, 'Logout', '2021-04-06 02:38:18', '2021-04-06 02:43:31'),
(9, 2021151001, 'Logout', '2021-04-06 02:43:36', '2021-04-06 04:04:14'),
(10, 2021151001, 'Logout', '2021-04-06 04:07:23', '2021-04-06 06:00:04'),
(11, 1008196402, 'Logout', '2021-04-06 06:00:09', '2021-04-06 06:00:16'),
(12, 2021151001, 'Logout', '2021-04-06 06:01:35', '2021-04-06 06:30:37'),
(13, 2021151001, 'Logout', '2021-04-06 06:30:45', '2021-04-06 06:31:49'),
(14, 2021151001, 'Logout', '2021-04-06 06:32:24', '2021-04-06 06:37:10'),
(15, 2021151001, 'Logout', '2021-04-06 06:38:33', '2021-04-06 07:06:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `name_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`menu_id`, `name_menu`) VALUES
(1, 'Admin'),
(2, 'Operator'),
(3, 'CRUD Data'),
(4, 'Transaksi'),
(5, 'Laporan'),
(6, 'Pengaturan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `month`
--

CREATE TABLE `month` (
  `month_id` int(11) NOT NULL,
  `month` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `month`
--

INSERT INTO `month` (`month_id`, `month`) VALUES
(1, 'Juli'),
(2, 'Agustus'),
(3, 'September'),
(4, 'Oktober'),
(5, 'November'),
(6, 'Desember'),
(7, 'Januari'),
(8, 'Februari'),
(9, 'Maret'),
(10, 'April'),
(11, 'Mei'),
(12, 'Juni');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `name_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `name_role`) VALUES
(1, 'Admin'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `spp_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`spp_id`, `year`, `nominal`) VALUES
(10, 2018, 175000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `nisn` char(15) NOT NULL,
  `nis` char(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `mobile_phone` varchar(15) NOT NULL,
  `image_files` varchar(255) NOT NULL,
  `spp_id` int(11) NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `student`
--

INSERT INTO `student` (`student_id`, `nisn`, `nis`, `full_name`, `class_id`, `address`, `mobile_phone`, `image_files`, `spp_id`, `total`) VALUES
(103202101, '0000000000', '181910551', 'Dendy Juliano J', 2021151001, 'Jln. Mana', '081111111111', 'assets/images/student/0000000000.jpg', 10, 2100000),
(103202102, '0035992116', '181910554', 'sdsadsad', 2021151001, 'dassad', '9776764357345', 'assets/images/student/00359921161.jpg', 10, 2100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_menu`
--

CREATE TABLE `sub_menu` (
  `sub_menu_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_menu`
--

INSERT INTO `sub_menu` (`sub_menu_id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'main/admin', 'fa fa-dashboard', 'Y'),
(2, 2, 'Dashboard', 'main/operator', 'fa fa-dashboard', 'Y'),
(3, 3, 'Petugas', 'menu/user', 'fa fa-user', 'Y'),
(4, 3, 'Siswa', 'menu/student', 'fa fa-user', 'Y'),
(5, 3, 'Kelas', 'menu/classs', 'fa fa-bank', 'Y'),
(6, 3, 'SPP', 'menu/spp', 'fa fa-money', 'Y'),
(7, 4, 'Entri Transaksi', 'menu/transaction', 'fa fa-plus', 'Y'),
(8, 4, 'History Transaksi', 'menu/history', 'fa fa-history', 'Y'),
(9, 5, 'Generate Laporan', 'menu/report', 'fa fa-book', 'Y'),
(10, 6, 'Ubah Password', 'menu/settings/password', 'fa fa-key', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nisn` char(15) NOT NULL,
  `payment_date` date NOT NULL,
  `month_paid` varchar(8) NOT NULL,
  `year_paid` varchar(4) NOT NULL,
  `spp_id` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `user_id`, `nisn`, `payment_date`, `month_paid`, `year_paid`, `spp_id`, `amount_paid`) VALUES
(9, 2021151001, '0000000000', '2021-04-06', '1', '2018', 10, 175000),
(10, 2021151001, '0000000000', '2021-04-06', '1', '2018', 10, 175000),
(11, 2021151001, '0000000000', '2021-04-06', '1', '2018', 10, 175000),
(12, 2021151001, '0000000000', '2021-04-06', '1', '2018', 10, 175000),
(13, 2021151001, '0000000000', '2021-04-06', '1', '2018', 10, 175000),
(14, 2021151001, '0000000000', '2021-04-06', '1', '2018', 10, 175000),
(15, 2021151001, '0000000000', '2021-04-06', '1', '2018', 10, 175000),
(16, 2021151001, '0000000000', '2021-04-06', '1', '2018', 10, 175000),
(17, 2021151001, '0000000000', '2021-04-06', '1', '2018', 10, 175000),
(18, 2021151001, '0000000000', '2021-04-06', '1', '2018', 10, 175000),
(19, 2021151001, '0000000000', '2021-04-06', '1', '2018', 10, 175000),
(20, 2021151001, '0000000000', '2021-04-06', '1', '2018', 10, 175000),
(21, 2021151001, '0035992116', '2021-04-06', '1', '2018', 10, 175000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `image_files` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `attempt` int(1) NOT NULL,
  `is_active` enum('Y','N') NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `full_name`, `image_files`, `role_id`, `attempt`, `is_active`, `create_at`, `update_at`) VALUES
(1008196402, 'daffafa', '$2y$10$KRc17u5XcmUQ2R5i9BIdNuMAuVlFOXVNUvZbM0gW6.Or4wdHrRbQW', 'Daffa Fadhil A', 'assets/images/profile/1008196402.jpg', 2, 0, 'Y', '2021-04-06 02:46:05', '2021-04-06 06:39:57'),
(2021151001, 'admin', '$2y$10$RJp/oNhC47EVjSoEtUyJeeg50yKryZ35UvZcqPE5drp0r4s9vQp06', 'Garly Nugraha', 'assets/images/profile/1008196401.jpg', 1, 0, 'Y', '2021-04-06 00:57:40', '2021-04-06 06:01:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access`
--

CREATE TABLE `user_access` (
  `user_access_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access`
--

INSERT INTO `user_access` (`user_access_id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 4),
(6, 1, 5),
(7, 1, 6),
(8, 2, 6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indeks untuk tabel `log_history`
--
ALTER TABLE `log_history`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`month_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`spp_id`);

--
-- Indeks untuk tabel `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `spp_id` (`spp_id`);

--
-- Indeks untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`sub_menu_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`user_access_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2021151052;

--
-- AUTO_INCREMENT untuk tabel `log_history`
--
ALTER TABLE `log_history`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `month`
--
ALTER TABLE `month`
  MODIFY `month_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `spp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `sub_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user_access`
--
ALTER TABLE `user_access`
  MODIFY `user_access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `log_history`
--
ALTER TABLE `log_history`
  ADD CONSTRAINT `log_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`spp_id`) REFERENCES `spp` (`spp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD CONSTRAINT `sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access`
--
ALTER TABLE `user_access`
  ADD CONSTRAINT `user_access_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
