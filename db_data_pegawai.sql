-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2022 pada 05.32
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_data_pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `jabatan_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`jabatan_id`, `jabatan_nama`) VALUES
(2, 'Sales & Marketing'),
(3, 'Karyawan'),
(6, 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kontrak`
--

CREATE TABLE `tbl_kontrak` (
  `kontrak_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `kontrak_masa_kerja` varchar(25) NOT NULL,
  `kontrak_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kontrak`
--

INSERT INTO `tbl_kontrak` (`kontrak_id`, `pegawai_id`, `kontrak_masa_kerja`, `kontrak_tgl`) VALUES
(2, 1, '3 Tahun', '2022-02-27'),
(6, 3, '1 Bulan', '2022-02-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_nip` varchar(20) DEFAULT NULL,
  `pegawai_photo` varchar(150) DEFAULT NULL,
  `pegawai_nama` varchar(100) DEFAULT NULL,
  `pegawai_jk` varchar(1) DEFAULT NULL,
  `pegawai_tpt_lahir` varchar(100) DEFAULT NULL,
  `pegawai_tgl_lahir` date NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `pegawai_agama` varchar(100) DEFAULT NULL,
  `pegawai_no_hp` varchar(13) DEFAULT NULL,
  `pegawai_email` varchar(100) DEFAULT NULL,
  `pegawai_tgl_masuk` date NOT NULL,
  `pegawai_status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`pegawai_id`, `pegawai_nip`, `pegawai_photo`, `pegawai_nama`, `pegawai_jk`, `pegawai_tpt_lahir`, `pegawai_tgl_lahir`, `jabatan_id`, `pegawai_agama`, `pegawai_no_hp`, `pegawai_email`, `pegawai_tgl_masuk`, `pegawai_status`) VALUES
(1, '123456789', 'avatar.png', 'Riza Ilhamsyah', 'L', 'Kuningan', '2000-10-12', 2, 'Islam', '0895396580287', 'rizailhamsyah021@gmail.com', '2022-02-26', NULL),
(2, '987654321', 'f7f79f564f6877c1909a84bfb2e6bf38.png', 'Herens Humairoh', 'P', 'Kuningan', '1998-09-17', 2, 'Islam', '085323432532', 'herenshumairoh@gmail.com', '2022-02-25', NULL),
(3, '2347632483', 'avatar.png', 'Pegawai 3', 'L', 'Kuningan', '2022-02-01', 2, 'Islam', '0874637463263', 'rizailhamsyah28@gmail.com', '2022-02-11', NULL),
(4, '22429034872', 'avatar.png', 'Pegawai 4', 'L', 'Kuningan', '2022-02-18', 2, 'Islam', '0836427362732', 'pegawai4@gmail.com', '2022-02-20', NULL),
(5, '32492835892', 'avatar.png', 'Pegawai 5', 'L', 'Kuningan', '2022-02-14', 2, 'Islam', '0846726736422', 'pegawai5@gmail.com', '2022-02-04', NULL),
(6, '234897295091', 'avatar.png', 'Pegawai 6', 'L', 'Kuningan', '2022-02-20', 2, 'Islam', '0836428472347', 'pegawai6@gmail.com', '2022-02-10', NULL),
(8, '987654321', 'avatar.png', 'Pegawai 7', 'L', 'Kuningan', '2022-02-10', 2, 'Islam', '0836428472347', 'pegawai7@gmail.com', '2022-02-11', NULL),
(18, '899435324', 'avatar.png', 'Pegawai 8', 'L', 'Kuningan', '2000-12-10', 3, 'Islam', '08932421321', 'pegawai8@gmail.com', '1970-01-01', NULL),
(19, '899435325', 'avatar.png', 'Pegawai 9', 'L', 'Kuningan', '1970-01-01', 3, 'Islam', '08932421321', 'pegawai8@gmail.com', '1970-01-01', NULL),
(20, '899435326', 'avatar.png', 'Pegawai 10', 'L', 'Kuningan', '1970-01-01', 3, 'Islam', '08932421321', 'pegawai8@gmail.com', '1970-01-01', NULL),
(21, '899435327', 'avatar.png', 'Pegawai 11', 'L', 'Kuningan', '1970-01-01', 3, 'Islam', '08932421321', 'pegawai8@gmail.com', '1970-01-01', NULL),
(22, '899435328', 'avatar.png', 'Pegawai 12', 'L', 'Kuningan', '1970-01-01', 3, 'Islam', '08932421321', 'pegawai8@gmail.com', '2022-01-02', NULL),
(23, '899435329', 'avatar.png', 'Pegawai 13', 'L', 'Kuningan', '1970-01-01', 3, 'Islam', '08932421321', 'pegawai8@gmail.com', '2022-02-02', NULL),
(24, '899435330', 'avatar.png', 'Pegawai 14', 'L', 'Kuningan', '1970-01-01', 3, 'Islam', '08932421321', 'pegawai8@gmail.com', '2022-03-02', NULL),
(25, '899435331', 'avatar.png', 'Pegawai 15', 'L', 'Kuningan', '1970-01-01', 3, 'Islam', '08932421321', 'pegawai8@gmail.com', '2022-04-02', NULL),
(26, '899435332', 'avatar.png', 'Pegawai 16', 'L', 'Kuningan', '1970-01-01', 3, 'Islam', '08932421321', 'pegawai8@gmail.com', '2022-05-02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indeks untuk tabel `tbl_kontrak`
--
ALTER TABLE `tbl_kontrak`
  ADD PRIMARY KEY (`kontrak_id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indeks untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`pegawai_id`),
  ADD KEY `jabatan_id` (`jabatan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_kontrak`
--
ALTER TABLE `tbl_kontrak`
  MODIFY `kontrak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
