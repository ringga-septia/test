-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 27 Feb 2020 pada 23.23
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_a`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

DROP TABLE IF EXISTS `absen`;
CREATE TABLE IF NOT EXISTS `absen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(128) NOT NULL,
  `prodi` varchar(11) NOT NULL,
  `tgl` varchar(128) NOT NULL,
  `jam` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id`, `nim`, `prodi`, `tgl`, `jam`, `keterangan`) VALUES
(11, 222, 'tps', '2020-02-27', '09:07:03', 'telat'),
(10, 111, 'Tif', '2020-02-27', '09:06:30', 'telat'),
(6, 123, 'Tif', '2020-02-27', '09:05:09', 'telat'),
(7, 123, 'Tif', '2020-02-27', '09:05:18', 'masuk'),
(8, 111, 'Tif', '2020-02-27', '09:05:26', 'masuk'),
(9, 111, 'Tif', '2020-02-27', '09:05:33', 'telat'),
(12, 222, 'tps', '2020-02-27', '09:07:10', 'masuk'),
(13, 333, 'tps', '2020-02-27', '09:07:17', 'masuk'),
(14, 333, 'tps', '2020-02-27', '09:07:24', 'telat'),
(15, 111, 'tps', '2020-02-27', '09:07:33', 'telat'),
(16, 222, 'tps', '2020-02-27', '09:07:38', 'telat'),
(17, 222, 'tps', '2020-02-27', '09:07:45', 'masuk'),
(18, 111, 'ppm', '2020-02-27', '09:08:11', 'masuk'),
(19, 123, 'ppm', '2020-02-27', '09:08:16', 'masuk'),
(20, 222, 'ppm', '2020-02-27', '09:08:20', 'masuk'),
(21, 333, 'ppm', '2020-02-27', '09:08:27', 'masuk'),
(22, 111, 'ppm', '2020-02-27', '09:08:36', 'telat'),
(23, 123, 'ppm', '2020-02-27', '09:08:41', 'telat'),
(24, 222, 'ppm', '2020-02-27', '09:08:45', 'telat'),
(25, 333, 'ppm', '2020-02-27', '09:08:51', 'telat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `nim` int(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `prodi` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `semester` int(4) NOT NULL,
  `is_aktif` int(1) NOT NULL,
  `role_id` int(1) NOT NULL,
  `email` varchar(128) NOT NULL,
  `thn` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nim`, `name`, `prodi`, `image`, `pass`, `semester`, `is_aktif`, `role_id`, `email`, `thn`) VALUES
(1, 11, 'ringga septia pribadi', 'tif', 'back6.jpg', '$2y$10$ynE.FMfPdxcmaL8X5sFk6.z0L5VmSRsXz7svS2r236bJnvyE193rO', 5, 1, 1, 'ringgamungo97@gmail.com', 2019),
(2, 12, 'melani', 'tif', 'defaul.png', '$2y$10$Sj4ND5eVdiSa5VfLOitZ4uqbI96wqppzWQNCvNTJXhITZy6IpHPJe', 1, 1, 2, 'melani@gmail.com', 2020),
(3, 111, 'ringga septia', 'tif', 'defaul.png', '$2y$10$c3E/VkeUlZx8Iel4g/dqT.6WEUd9y1DyIsjIaM/HcxclG3f5XIBYO', 1, 1, 2, 'ringgamungo03@gmail.com', 2016),
(4, 123, 'ringga', 'tif', 'defaul.png', '$2y$10$KaDvpuyNM69.TDqqRzLXxOf/oFCTsx5qmpIR2Rg5OQXuiieOYRsMy', 1, 1, 2, 'fadfhad@gmail.com', 2018),
(5, 122, 'bujang iman', 'tif', 'defaul.png', '$2y$10$3cqxM8Xpy3/6h/7404DraOK7GrHMTk8i34imHLRXr5kKMtVPJBjjC', 2, 1, 1, 'bujang@gmail.com', 2017),
(6, 111, 'ringga septia', 'tif', 'defaul.png', '$2y$10$aQj76gs87k3EbTOwCcJWNOdGYQ2qFJ6thF7yfAyYBYBT/NzIJU3Wu', 2, 1, 2, 'ringga@gmail.com', 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akses_menu`
--

DROP TABLE IF EXISTS `user_akses_menu`;
CREATE TABLE IF NOT EXISTS `user_akses_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_akses_menu`
--

INSERT INTO `user_akses_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'menu'),
(4, 'Data');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(2, 'user'),
(1, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

DROP TABLE IF EXISTS `user_sub_menu`;
CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_aktif` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_aktif`) VALUES
(1, 1, 'Dashboar', 'auth/admin', 'fas fa-fw fa-user-alt', 1),
(2, 2, 'My Profile', 'menu/sub_menu', 'fa fa-fw fa-address-card', 1),
(3, 4, 'Absen Saya', 'menu/sub_menu/absen_saya', 'fa fa-fw fa-address-book', 1),
(4, 3, 'Menu Managemen', 'data/menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Sub Menu Managemen', 'data/menu/submenu', 'fas fa=fw fa-folder-open', 1),
(6, 1, 'Absen Mahasiswa', 'menu/sub_menu/absen_mhs', 'fa fa-fw fa-address-book', 1),
(7, 1, 'Data Mahasiswa', 'menu/sub_menu/data_mhs', 'fa fa-fw fa-users', 1),
(8, 2, 'ganti password', 'menu/sub_menu/ganti_pass', 'fa fa-fw fa-key', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
