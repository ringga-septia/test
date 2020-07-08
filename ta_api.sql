-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 29 Jun 2020 pada 06.50
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
-- Database: `ta_api`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_dosen`
--

DROP TABLE IF EXISTS `absen_dosen`;
CREATE TABLE IF NOT EXISTS `absen_dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nrp_dosen` int(128) NOT NULL,
  `id_class` int(128) NOT NULL,
  `jam` varchar(128) NOT NULL,
  `tgl` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `code` int(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_mhs`
--

DROP TABLE IF EXISTS `absen_mhs`;
CREATE TABLE IF NOT EXISTS `absen_mhs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `jam` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `nim` int(11) NOT NULL,
  `prodi` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_class` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `absen_mhs`
--

INSERT INTO `absen_mhs` (`id`, `tgl`, `jam`, `nim`, `prodi`, `id_class`, `keterangan`) VALUES
(112, '2020-06-11', '15:56:11', 11, '123456', '123', 'terlambat'),
(113, '2020-06-11', '16:41:47', 22, 'taf', '11', 'terlambat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `pass`, `foto`) VALUES
(1, 'ringga@gmail.com', 'ringga', '123456', 'back6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `thn` varchar(128) NOT NULL,
  `jmlh_mhs` int(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=224 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `class`
--

INSERT INTO `class` (`id`, `name`, `thn`, `jmlh_mhs`) VALUES
(223, 'tif', '2018', 123),
(222, 'tif17', '2020', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

DROP TABLE IF EXISTS `dosen`;
CREATE TABLE IF NOT EXISTS `dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `nidn` int(128) NOT NULL,
  `nrp` int(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `email`, `pass`, `nidn`, `nrp`, `jabatan`, `keterangan`, `image`, `role`) VALUES
(1, 'ringga', 'ringgadosen@gmail.com', '$2y$10$SQQPqqjducIY9rRJI7xXVeg0RFEC04znIZ5r87oJfjxgLdmS4p/G.', 123, 123, 'dosen aktif', 'ni saye lah', 'defaul.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs`
--

DROP TABLE IF EXISTS `mhs`;
CREATE TABLE IF NOT EXISTS `mhs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `nim` int(128) NOT NULL,
  `prodi` varchar(128) NOT NULL,
  `semester` int(2) NOT NULL,
  `image` varchar(256) NOT NULL,
  `thn` int(11) NOT NULL,
  `role` int(2) NOT NULL,
  `id_class` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mhs`
--

INSERT INTO `mhs` (`id`, `email`, `name`, `pass`, `nim`, `prodi`, `semester`, `image`, `thn`, `role`, `id_class`) VALUES
(1, 'ringga@gmail.com', 'ringga doang', '$2y$10$lUX.OCtWsRJO0uMCG.gMYOWPpZlKYey4G98jLP9DK9BysN55FhIea', 111, 'Teknik Informatika', 5, 'adobe.PNG', 1, 2, 0),
(3, 'ringga@minang.com', 'ringg', '$2y$10$fbbvuGogI44lQ0ZquTgEVOwIALNbcIXc3Sa6PwwNoi/5T1O392iL.', 111, 'tif', 6, 'back6.jpg', 1, 2, 0),
(4, 'melani@gmail.com', 'melani', '$2y$10$jbpInHlR3TGASkQD0fXwluk.XAFD.k2BHjZbBcyEqpS2sHyCYFkR.', 122, 'Perbaikan & Perawatan Mesin', 6, 'defaul.png', 2018, 2, 0),
(5, 'ringgamungo97@gmail.com', 'ringga septia pribadi', '$2y$10$h21VGooSH7wzSoLJK97KeOzzAY7Q7TXyIW7631B1pE.z1KbSINily', 333, 'Perbaikan & Perawatan Mesin', 2, 'defaul.png', 2018, 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

DROP TABLE IF EXISTS `prodi`;
CREATE TABLE IF NOT EXISTS `prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prodi_mhs` varchar(128) NOT NULL,
  `thn` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `prodi_mhs`, `thn`, `status`) VALUES
(1, 'Teknik Informatika', '2017', 'aktif'),
(2, 'Perbaikan & Perawatan Mesin', '2017', 'aktif'),
(3, 'Teknik Pengolahan Sawit', '2017', 'aktif');

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_akses_menu`
--

INSERT INTO `user_akses_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(11, 1, 4),
(10, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(4, 'class'),
(3, 'mahasiswa'),
(2, 'dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_aktif`) VALUES
(1, 2, 'Absen Dosen', 'menu/sub_menu/absen_dosen', 'fa fa-fw fa-users', 1),
(2, 1, 'My Profile', 'menu/sub_menu', 'fa fa-fw fa-address-card', 1),
(9, 4, 'Class', 'menu/sub_menu/class', 'fa fa-fw fa-address-book', 1),
(3, 2, 'Data Dosen', 'menu/sub_menu/data_dosen', '	\r\nfa fa-fw fa-address-book\r\n', 1),
(6, 3, 'Absen Mahasiswa', 'menu/sub_menu/absen_mhs', 'fa fa-fw fa-address-book', 1),
(7, 3, 'Data Mahasiswa', 'menu/sub_menu/data_mhs', 'fa fa-fw fa-users', 1),
(8, 1, 'ganti password', 'menu/sub_menu/ganti_pass', 'fa fa-fw fa-key', 1),
(10, 4, 'absen_class', 'menu/sub_menu/absen_class', 'fa fa-fw fa-address-book', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
