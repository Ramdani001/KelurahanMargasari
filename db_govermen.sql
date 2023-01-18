-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 18 Jan 2023 pada 11.39
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_goverment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanankematian`
--

CREATE TABLE `pelayanankematian` (
  `id` int(11) NOT NULL,
  `tanggalPengajuan` date NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tanggalKematian` date NOT NULL,
  `umur` int(255) NOT NULL,
  `tempatKematian` varchar(255) NOT NULL,
  `sebabKematian` varchar(255) NOT NULL,
  `namaPelapor` varchar(255) NOT NULL,
  `noPelayanan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `createdBy` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelayanankematian`
--

INSERT INTO `pelayanankematian` (`id`, `tanggalPengajuan`, `nik`, `tanggalKematian`, `umur`, `tempatKematian`, `sebabKematian`, `namaPelapor`, `noPelayanan`, `status`, `createdBy`, `createdAt`) VALUES
(1, '2023-01-11', '324564532345', '2023-01-09', 56, 'Di Rumah', 'Sakit', 'Ramdani', '1 KMT/2023', 'Diproses', '', '2023-01-18 10:02:04'),
(4, '2023-01-11', '32770123456', '2023-01-26', 43, 'Di Rumah', 'Kecelakaan', 'Yuni', '2 KMT/2023', 'Diajukan', '1', '2023-01-18 04:15:07'),
(5, '2023-01-18', '32770123456', '2023-01-11', 43, 'Rumah Sakit', 'Sakit Keras', 'Ramdani', '5 KMT/2023', 'Diajukan', '1', '2023-01-18 10:15:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanankk`
--

CREATE TABLE `pelayanankk` (
  `id` int(11) NOT NULL,
  `noPelayanan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `createdBy` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelayanankk`
--

INSERT INTO `pelayanankk` (`id`, `noPelayanan`, `tanggal`, `nik`, `nama`, `keterangan`, `createdBy`, `createdAt`, `status`) VALUES
(7, '1 KTP/2023  ', '2023-01-12', '32770123456', 'Maro', 'Kondisi Cover Sobek', '2', '2023-01-17 16:07:12', 'Diproses'),
(9, '8 KK/2023  ', '2023-01-17', '', 'Rizkan Ramdani', 'Cover Buku Sobek', '1', '2023-01-16 22:07:49', 'Diajukan'),
(10, '10 KK/2023  ', '2023-01-05', '', 'Rizkan Ramdani', 'Cover Buku Sobek', '1', '2023-01-16 22:08:04', 'Diajukan'),
(11, '11 KK/2023  ', '2023-01-13', '', 'Maro', 'Kondisi Cover Sobek', '1', '2023-01-16 22:09:09', 'Diajukan'),
(12, '12 KK/2023  ', '2023-01-19', '', 'Rizky', 'Cover Buku Sobek', '1', '2023-01-16 22:10:06', 'Diajukan'),
(13, '13 KK/2023  ', '2023-01-12', '32770123456', 'as', 'Cover Buku Sobek', '2', '2023-01-16 22:14:06', 'Diajukan'),
(14, '14 KK/2023  ', '2023-01-20', '32770123456', 'adasd', 'Kondisi Cover Sobek', '2', '2023-01-16 22:17:08', 'Diajukan'),
(19, '15 KK/2023  ', '2023-01-12', '32770123456', 'Rizkan Ramdani', 'Cover Buku Sobek', '1', '2023-01-18 01:35:14', 'Diajukan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayananktp`
--

CREATE TABLE `pelayananktp` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `jenisPelayanan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `noPelayanan` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pelayananktp`
--

INSERT INTO `pelayananktp` (`id`, `nik`, `jenisPelayanan`, `tanggal`, `keterangan`, `createdBy`, `createdAt`, `noPelayanan`, `status`) VALUES
(1, 'admin', 'Pembuatan Baru', '2023-01-13', 'Hilang Coy', '2', '2023-01-16 05:33:23', '1 KTP/2023', 'Diproses'),
(2, '32770123456', 'Pembuatan Baru', '2023-01-05', 'Perpanjangan KTP', '1', '2023-01-16 22:57:13', '2 KTP/2023', 'Disetujui'),
(3, '32770123456', 'Perpanjang KTP', '2023-01-07', 'Ganti Kartu KTp', '1', '2023-01-17 00:22:35', '3 KTP/2023', 'Diajukan'),
(4, '32770123456', 'Pembuatan Baru', '2023-01-11', 'Baru menginjak umur 17', '1', '2023-01-17 02:52:32', '4 KTP/2023', 'Diajukan'),
(6, '32770123456', 'Perpanjang ktp', '2023-01-04', 'AAAAA', '1', '2023-01-16 21:50:39', '6 KTP/2023', 'Diajukan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `email`, `password`, `no_telepon`) VALUES
(1, 'Rizkan Ramdani', 'makaronipedas@ymail.com', '$2y$10$quAsvVYARRAroQORZHXX5ORf/VA0YfaiegRGuE.K5WJsv1oxhg3a.', '312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userpenduduk`
--

CREATE TABLE `userpenduduk` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `noKk` varchar(255) DEFAULT NULL,
  `namaLengkap` varchar(255) DEFAULT NULL,
  `jenisKelamin` varchar(255) DEFAULT NULL,
  `golonganDarah` varchar(255) DEFAULT NULL,
  `tempatLahir` varchar(255) DEFAULT NULL,
  `tanggalLahir` date DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `statusPerkawinan` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `kewarganegaraan` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `levelUser` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `userpenduduk`
--

INSERT INTO `userpenduduk` (`id`, `nik`, `noKk`, `namaLengkap`, `jenisKelamin`, `golonganDarah`, `tempatLahir`, `tanggalLahir`, `agama`, `statusPerkawinan`, `alamat`, `telepon`, `kewarganegaraan`, `pekerjaan`, `password`, `levelUser`) VALUES
(1, '32770123456', '32770123456', 'Chelsea Islan', 'P', 'A', 'Bandung', '1999-07-07', 'Islam', 'belum kawin', 'Cikutra No.117', '081224550932', 'Indonesia', 'Aktris', 'admin123', 'user'),
(2, 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin123', 'admin'),
(3, '12345678', '88723784738', 'Michael Robert', 'L', 'O', 'Bandung', '1997-06-03', 'Katholik', 'Kawin', 'Bandung', '086756785645', 'Indonesia', 'Pengusaha', '12345678', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pelayanankematian`
--
ALTER TABLE `pelayanankematian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelayanankk`
--
ALTER TABLE `pelayanankk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelayananktp`
--
ALTER TABLE `pelayananktp`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `userpenduduk`
--
ALTER TABLE `userpenduduk`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pelayanankematian`
--
ALTER TABLE `pelayanankematian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelayanankk`
--
ALTER TABLE `pelayanankk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pelayananktp`
--
ALTER TABLE `pelayananktp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `userpenduduk`
--
ALTER TABLE `userpenduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
