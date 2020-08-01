-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2020 pada 14.16
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal+`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nm_bank` varchar(50) NOT NULL,
  `no_rekening` int(11) NOT NULL,
  `image_bank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nm_bank`, `no_rekening`, `image_bank`) VALUES
(1, 'BRI', 1222331, 'bri.png'),
(2, 'BCA', 21313128, 'bca.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `kd_booking` varchar(6) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_booking` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `total_jam` int(11) NOT NULL,
  `harga` double NOT NULL,
  `kd_lapangan` char(5) NOT NULL,
  `status_main` varchar(50) NOT NULL,
  `kd_invoice` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_histori`
--

CREATE TABLE `booking_histori` (
  `id_histori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kd_invoice` varchar(12) NOT NULL,
  `kd_lapangan` char(5) NOT NULL,
  `tgl_booking` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `total_jam` int(11) NOT NULL,
  `harga` double NOT NULL,
  `total_bayar` double NOT NULL,
  `tgl_input` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking_histori`
--

INSERT INTO `booking_histori` (`id_histori`, `id_user`, `kd_invoice`, `kd_lapangan`, `tgl_booking`, `jam_mulai`, `jam_selesai`, `total_jam`, `harga`, `total_bayar`, `tgl_input`, `status`) VALUES
(46, 98, 'INV-2020001', 'LAP3', '2020-07-01', '20:00:00', '21:00:00', 1, 125000, 125000, '2020-07-02 01:05:36', 'Booking Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `competition`
--

CREATE TABLE `competition` (
  `id_competition` int(11) NOT NULL,
  `competition` varchar(50) NOT NULL,
  `id_season` int(11) NOT NULL,
  `tgl_input_competition` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `competition`
--

INSERT INTO `competition` (`id_competition`, `competition`, `id_season`, `tgl_input_competition`) VALUES
(2, 'Liga Presiden', 3, '2020-06-09 01:31:32'),
(3, 'Piala world', 3, '2020-06-25 01:03:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_contact`
--

CREATE TABLE `info_contact` (
  `id_contact` int(11) NOT NULL,
  `telepon` char(12) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `info_contact`
--

INSERT INTO `info_contact` (`id_contact`, `telepon`, `lokasi`, `website`, `email`) VALUES
(1, '089658037746', 'Bogor Barat', 'www.futsal+.com', 'info@futsal+.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `kd_invoice` varchar(12) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_bayar` double NOT NULL,
  `uang_muka` double NOT NULL,
  `sisa_bayar` double NOT NULL,
  `id_bank` int(11) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `batas_pembayaran` datetime NOT NULL,
  `status_pembayaran` int(1) NOT NULL,
  `bukti_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`kd_invoice`, `id_user`, `total_bayar`, `uang_muka`, `sisa_bayar`, `id_bank`, `tanggal_pemesanan`, `batas_pembayaran`, `status_pembayaran`, `bukti_pembayaran`) VALUES
('INV-2020001', 98, 125000, 63000, 62000, 2, '2020-07-01 23:52:09', '2020-07-02 04:52:09', 1, 'lapangan_417.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `kd_lapangan` char(5) NOT NULL,
  `nm_lapangan` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`kd_lapangan`, `nm_lapangan`, `image`, `keterangan`) VALUES
('LAP1', 'lapangan 1', 'lapangan_35.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ss'),
('LAP2', 'lapangan 2', 'lapangan_43.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. '),
('LAP3', 'Lapangan 3', 'lapangan114.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. '),
('LAP4', 'Lapangan 4', 'lapangan_61.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. '),
('LAP5', 'Lapangan 5', 'lapangan213.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. '),
('LAP6', 'Lapangan 6', 'lapangan5111.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` char(50) NOT NULL,
  `is_main_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`, `url`, `icon`, `is_main_menu`) VALUES
(0, 'Booking Histori', 'admin/booking/bookingHistori', 'icon-outbox menu-icon', 6),
(1, 'Dashboard', 'admin/dashboard', 'icon-box menu-icon', 0),
(2, 'Lapangan', 'admin/lapangan', 'icon-disc menu-icon', 0),
(3, 'News', 'admin/news', ' icon-layout menu-icon', 0),
(4, 'Testimoni', 'admin/testimoni', 'icon-pie-graph menu-icon', 0),
(5, 'Member', 'admin/member', ' icon-head menu-icon', 0),
(6, 'Booking', '#Booking', ' icon-target menu-icon', 0),
(7, 'Daftar Booking', 'admin/booking', '', 6),
(8, 'Invoice', 'admin/invoice', ' icon-archive menu-icon', 6),
(9, 'Slider', 'admin/slider', ' icon-play menu-icon', 0),
(10, 'Competition', '#Competition', 'icon-loader menu-icon', 0),
(11, 'Team', 'admin/team', '', 10),
(16, 'Data Competition', 'admin/competition', '', 10),
(17, 'Season', 'admin/season', '', 10),
(18, 'Pertandingan', 'admin/pertandingan', '', 10),
(19, 'Info Contact', 'admin/contact', 'icon-contract menu-icon', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `keterangan` text NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `judul`, `keterangan`, `image`) VALUES
(1, 'Mencegah Covid-19 Futsal+ HanyaBuka di Hari Weekend', 'hahaha', '3.jpg'),
(5, 'Mencega pengeluaran biaya lebih di hari Weekend Futsal+ Solusi nya', 'acassa', '5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi_system`
--

CREATE TABLE `notifikasi_system` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `pesan` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi_system`
--

INSERT INTO `notifikasi_system` (`id`, `id_user`, `type`, `pesan`, `status`, `tanggal`) VALUES
(82, 98, 'Booking', 'LAP3', 'read', '2020-07-01 23:52:09'),
(85, 98, 'Pembayaran', 'Selesai', 'read', '2020-07-02 00:58:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertandingan`
--

CREATE TABLE `pertandingan` (
  `id_pertandingan` int(11) NOT NULL,
  `competition` varchar(50) NOT NULL,
  `tgl_main` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `home` int(50) NOT NULL,
  `away` int(50) NOT NULL,
  `lapangan` char(5) NOT NULL,
  `tgl_input_pertandingan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pertandingan`
--

INSERT INTO `pertandingan` (`id_pertandingan`, `competition`, `tgl_main`, `jam_mulai`, `jam_selesai`, `home`, `away`, `lapangan`, `tgl_input_pertandingan`) VALUES
(8, 'Piala world', '2020-06-12', '15:00:00', '16:00:00', 1, 5, 'LAP2', '2020-06-11 23:44:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profit`
--

CREATE TABLE `profit` (
  `id_profit` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penghasilan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profit`
--

INSERT INTO `profit` (`id_profit`, `tahun`, `penghasilan`) VALUES
(17, 2019, 1625000),
(20, 2020, 3381000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `season`
--

CREATE TABLE `season` (
  `id_season` int(11) NOT NULL,
  `season` char(4) NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `season`
--

INSERT INTO `season` (`id_season`, `season`, `tgl_input`) VALUES
(3, '2020', '2020-06-09 01:05:06'),
(4, '2021', '2020-06-24 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `slider`) VALUES
(1, 'Temukan Lapangan  <span>Impianmu</span> '),
(3, 'Simple Way To <span>Play</span> Your Beloved Sport');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `nm_team` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`id_team`, `logo`, `nm_team`, `tgl_input`) VALUES
(1, '9.png', 'Mahmud', '2020-06-06 07:18:00'),
(5, '10.png', 'wkwkkww', '2020-06-07 00:40:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_ulasan` date NOT NULL,
  `ulasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_user`, `tanggal_ulasan`, `ulasan`) VALUES
(2, 15, '2020-05-19', 'Pokoknya sangat menyenangkan'),
(4, 8, '2020-05-12', 'Lapangan nya ga ada yang mengecewakan. bagus,rapi dan  luas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `tanggal_buat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`id`, `email`, `token`, `tanggal_buat`) VALUES
(7, 'asjksa@gmail.com', 'sKrwVx/5WI69zBMxEkGURU8Q01gDSKvLXXodmff0r4o=', 0),
(9, 'sdsadsa@gmail.com', '5oJrb6djIR7hvJRLcn3chYq3ORNg5i0kSHfKr3TzCw8=', 0),
(30, 'asdsadsadaadsa', 'hpkf7Y5EuNKeqy8bKy/7IYUDfIcUtb+DG6na88wTvDw=', 0),
(31, 'bradleydelta371@gmail.com', 'E9IowOLhzol92H9CZATtH7jxdv9s068QcAxt+MXRxKM=', 0),
(32, 'wadasda', '1DDNkSVnO5pSyPoqi59JqJhfxpUwslo2+O/G5+g9e1Q=', 0),
(36, 'asdasdadasda', '7kdJEH29A/pnhbi785Xgzyge2uqzLotE6wjlcvgviFI=', 0),
(58, 'bradleydelta371@gmail.com', 'RQ8818gyjucjGPo43/3htfgygVq6oc057RtMB+rUbu4=', 1589716566),
(62, 'ramli37115@gmail.com', 'YoGk6GtOu4iSFmv93kXtdUFxDiklSWLR2ixBOxBKp+I=', 1590581494),
(63, 'ramli37115@gmail.com', 'CZFDvMccKAMTK7C+aAQ6La+YtXLSR0VxpvN1gvdhUvM=', 1590581607),
(64, 'ramli37115@gmail.com', '2oK9iWEt+oxku+bH2+WUDHDEiATeeZo85/TZl3txSpc=', 1590582207),
(65, 'ramli37115@gmail.com', 'bCZE9hQMwsfrB6GXjUABcM8rC9YQbWdtkQCuaIR5JSg=', 1590593905),
(66, 'ramli37115@gmail.com', 'xNNu3mbzwbT8hJzpyG9gjP7T0gKWSF1+LKXZxdWR6zU=', 1590594028),
(70, '', 'gIrj+SOQ5Cb7kje2RSGLpQnIPO091IidKz6/PAYWxfk=', 1590792067),
(71, '', '7Qkj5x0EcEyUF098OHzJtzUxYo88WulucwkEkGmuGGU=', 1590792075),
(72, 'bradleydelta371@gmail.com', 'O5iHqrp8hjez8dTo8K4VAjzg2Uv0lQfiecy9nUGd3Ws=', 1590792534),
(73, 'bradleydelta371@gmail.com', 'lih+ijLiVHoEhD0AfcFVspzRmGx2AcKhfSdoK7wQh7Y=', 1590792898),
(74, 'bradleydelta371@gmail.com', 'y7sxb+TpnF/xu9oJ+7f0vqgKV3oPUGlUGSwP0csxQ/o=', 1590793557),
(75, 'bradleydelta371@gmail.com', 'MeEMob3qL3bz0BW2X2Nfa8U2xqpXXqO3/d5yxs+j0OE=', 1590793773),
(76, 'bradleydelta371@gmail.com', 'rCXiXbX7g9JX3zEe0zZKTxIwV7I3frdV11AFVIiPPKw=', 1590794227),
(77, 'bradleydelta371@gmail.com', '+UibRUT4onCONDEFHbVcnd9iMEJcPXvCYh4iZBLXoPY=', 1590794374),
(84, 'muhama12180408@gmail.com', 'wZOKQKevNImHRaDFzYv4w8SCml1Lqwl0kcP7iTWiDpI=', 1592969933),
(88, 'muhama12180408@bsi.ac.id', 'wscrH1COY1HYc9LP+LypMw8njDhB2BxegLVS7gKE00g=', 1593107980),
(89, 'leondwiputra15@gmail.com', 'wXq0R+WeHn3SrBW6yUhTWxwV4S9dqB345DKzW+yRzjE=', 1593346154),
(90, 'ridwan@gmail.com', 'D8gm9uQDDzrJwWz/emJAHqc0W3nUwM6LTCLQZ14vKSA=', 1593662061);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_buat` date NOT NULL,
  `gender` enum('pria','wanita') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `telepon` char(12) NOT NULL,
  `alamat` text NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `role_id`, `is_active`, `tanggal_buat`, `gender`, `tanggal_lahir`, `telepon`, `alamat`, `image`) VALUES
(8, 'ramli obor', 'ramli37115@gmail.com', '$2y$10$gQeEE1C3R3hhbERlO9NchOzpgt9CKWG6hpO7QRd8OroH/Yc9sHhNa', 2, 1, '0000-00-00', 'pria', '1998-04-08', '089658037756', 'Kp Bojong Menteng', '2014-12-24_09_44_06.jpg'),
(15, 'Muhamad Ridwan', 'bradleydelta371@gmail.com', '$2y$10$X.rZS/iBxphAaBWXf/5oTuRxvi5ye.dejbYa3FcWQV4P3hOWuySzO', 1, 1, '0000-00-00', 'pria', '1998-03-15', '089658037752', 'Kp dampit baru no.78 ', 'IMG_20151225_152435.jpg'),
(98, 'Muhamad Ridwan', 'muhama12180408@bsi.ac.id', '$2y$10$QGxhfEhIKM2IuRzkzsccXe9FAoZkaLv4u8Zu/9URz6qNLU1Ayh73.', 2, 1, '2020-06-26', 'pria', '1998-03-15', '089658037746', 'kpdampit baru', 'ridwan.JPG'),
(102, 'vina', 'vinanurul1727@gmail.com', '$2y$10$pXgNvPzUuc8FTHAn6XknX.Vn3veuMJd5bok6y8EZYXDLwgTZag5mm', 2, 1, '2020-07-02', NULL, NULL, '', '', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`kd_booking`),
  ADD KEY `kd_invoice` (`kd_invoice`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_lapangan` (`kd_lapangan`);

--
-- Indeks untuk tabel `booking_histori`
--
ALTER TABLE `booking_histori`
  ADD PRIMARY KEY (`id_histori`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_lapangan` (`kd_lapangan`),
  ADD KEY `kd_invoice` (`kd_invoice`);

--
-- Indeks untuk tabel `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id_competition`),
  ADD KEY `id_season` (`id_season`);

--
-- Indeks untuk tabel `info_contact`
--
ALTER TABLE `info_contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`kd_invoice`),
  ADD KEY `id_bank` (`id_bank`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`kd_lapangan`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi_system`
--
ALTER TABLE `notifikasi_system`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`id_pertandingan`),
  ADD KEY `home` (`home`),
  ADD KEY `away` (`away`),
  ADD KEY `lapangan` (`lapangan`);

--
-- Indeks untuk tabel `profit`
--
ALTER TABLE `profit`
  ADD PRIMARY KEY (`id_profit`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id_season`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `booking_histori`
--
ALTER TABLE `booking_histori`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `competition`
--
ALTER TABLE `competition`
  MODIFY `id_competition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `info_contact`
--
ALTER TABLE `info_contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `notifikasi_system`
--
ALTER TABLE `notifikasi_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `pertandingan`
--
ALTER TABLE `pertandingan`
  MODIFY `id_pertandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `profit`
--
ALTER TABLE `profit`
  MODIFY `id_profit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `season`
--
ALTER TABLE `season`
  MODIFY `id_season` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`kd_invoice`) REFERENCES `invoice` (`kd_invoice`),
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `booking_histori`
--
ALTER TABLE `booking_histori`
  ADD CONSTRAINT `booking_histori_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `competition`
--
ALTER TABLE `competition`
  ADD CONSTRAINT `competition_ibfk_1` FOREIGN KEY (`id_season`) REFERENCES `season` (`id_season`);

--
-- Ketidakleluasaan untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD CONSTRAINT `pertandingan_ibfk_3` FOREIGN KEY (`lapangan`) REFERENCES `lapangan` (`kd_lapangan`);

--
-- Ketidakleluasaan untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
