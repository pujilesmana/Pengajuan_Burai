-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Sep 2021 pada 11.12
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

create database `suratpengajuan`;

--
-- Database: `suratpengajuan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `pengajuan_id` int(11) NOT NULL,
  `pengajuan_nama` varchar(40) NOT NULL,
  `pengajuan_nik` varchar(20) NOT NULL,
  `pengajuan_kategori` varchar(150) NOT NULL,
  `pengajuan_tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `pengajuan_file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`pengajuan_file`)),
  `pengajuan_status` int(11) NOT NULL,
  `pengajuan_surat` varchar(40) NOT NULL,
  `pengajuan_catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`pengajuan_id`, `pengajuan_nama`, `pengajuan_nik`, `pengajuan_kategori`, `pengajuan_tanggal`, `pengajuan_file`, `pengajuan_status`, `pengajuan_surat`, `pengajuan_catatan`) VALUES
(13, '31', '13', 'Surat Keterangan Beda Identitas', '2021-09-15 15:22:15', '{\"ktp\":\"35.jpg\",\"kk\":\"52.jpg\",\"ijazah\":\"43.jpg\"}', 0, '', ''),
(15, 'adas', '312', 'Surat Keterangan Penghasilan', '2021-09-15 16:12:13', '{\"ktp\":\"37.jpg\",\"kktbs\":\"45.jpg\",\"kk\":\"54.jpg\",\"jmlhpenghasilankotor\":\"313.123.131\"}', 0, '', ''),
(16, 'puji', '123151251', 'Surat Tanah Pengakuan Hak dan Surat Keterangan Tanah', '2021-09-15 16:35:21', '{\"ktp\":\"1_21.jpg\",\"kk\":\"38.jpg\",\"suratpermohonanKD\":\"46.jpg\",\"suratpermohonanKC\":\"55.jpg\",\"suratjualbeli\":\"223_222.jpg\"}', 0, '', ''),
(17, '321', '312', 'Surat Keterangan Tidak Mampu', '2021-09-17 07:57:19', '{\"ktp\":\"3.png\",\"rumah\":\"31.png\"}', 0, '', ''),
(18, 'puji', '312', 'Surat Keterangan Tidak Terdaftar Jaminan Sosial', '2021-09-17 07:57:28', '{\"ktp\":\"5.png\"}', 0, '', ''),
(19, 'dsada', '32131', 'Surat Domisili', '2021-09-17 07:57:39', '{\"ktp\":\"4.png\",\"kk\":\"7.png\"}', 0, '', ''),
(20, 'puji', '2131', 'Surat Keterangan Usaha', '2021-09-17 07:57:58', '{\"ktp\":\"6.png\",\"kk\":\"500140400450_58797.jpg\",\"usaha\":\"antar.png\"}', 0, '', ''),
(21, 'puji2', '313', 'Surat Keterangan Meninggal Dunia', '2021-09-17 07:59:27', '{\"ktp\":\"61.png\",\"tanggal_hari_kematian\":\"Selasa,23-09-2021\"}', 0, '', ''),
(22, 'pui', '231', 'Surat Pengantar Perkawinan', '2021-09-17 08:01:14', '{\"ktp\":\"32.png\",\"kk\":\"33.png\",\"kkotcl\":\"41.png\",\"kkotcp\":\"71.png\"}', 0, '', ''),
(23, 'puji', '13', 'Akta kelahiran dan KK', '2021-09-17 08:02:26', '{\"ktpayah\":\"34.png\",\"ktpibu\":\"42.png\",\"bukunikah\":\"51.png\",\"suratketeranganlahiranak\":\"62.png\",\"f107\":\"63.png\",\"f105\":\"43.png\",\"f201\":\"72.png\",\"f203\":\"64.png\",\"f204\":\"1.png\"}', 0, '', ''),
(24, 'puji', '321321', 'Akta kematian dan KK', '2021-09-17 08:02:59', '{\"ktpk\":\"35.png\",\"kk\":\"44.png\",\"skmd\":\"65.png\",\"f107\":\"52.png\",\"f101\":\"11.png\"}', 0, '', ''),
(25, '32131', '313', 'Penerbitan kartu keluarga hilang / rusak', '2021-09-17 08:03:22', '{\"ktpayah\":\"bedah_buku.jpeg\",\"ktpibu\":\"antar1.png\",\"bukunikah\":\"brosur_global.png\",\"f107\":\"brosur_global_(2).png\",\"f102\":\"cetak_belakang.png\"}', 0, '', ''),
(26, 'puji', '312', 'Kartu keluarga baru', '2021-09-17 08:06:46', '{\"ktpayah\":\"500140400450_587971.jpg\",\"ktpibu\":\"brosur_global1.png\",\"bukunikah\":\"73.png\",\"f107\":\"bedah_buku1.jpeg\",\"f105\":\"74.png\",\"f201\":\"500140400450_587972.jpg\"}', 0, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`pengajuan_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `pengajuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
