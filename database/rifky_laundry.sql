-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2023 pada 15.52
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rifky_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifky_tb_detail_transaksi`
--

CREATE TABLE `rifky_tb_detail_transaksi` (
  `rifky_id_detail_transaksi` int(11) NOT NULL,
  `rifky_id_transaksi` int(11) NOT NULL,
  `rifky_id_paket` int(11) NOT NULL,
  `rifky_qty` double NOT NULL,
  `rifky_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifky_tb_member`
--

CREATE TABLE `rifky_tb_member` (
  `rifky_id_member` int(11) NOT NULL,
  `rifky_nama` varchar(100) NOT NULL,
  `rifky_alamat` text NOT NULL,
  `rifky_jenis_kelamin` enum('L','P') NOT NULL,
  `rifky_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rifky_tb_member`
--

INSERT INTO `rifky_tb_member` (`rifky_id_member`, `rifky_nama`, `rifky_alamat`, `rifky_jenis_kelamin`, `rifky_telp`) VALUES
(1, 'Asep', 'Cipageran', 'L', '0896543456'),
(2, 'euis', 'Kamarung', 'P', '08975767768');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifky_tb_outlet`
--

CREATE TABLE `rifky_tb_outlet` (
  `rifky_id_outlet` int(11) NOT NULL,
  `rifky_nama` varchar(100) NOT NULL,
  `rifky_alamat` text NOT NULL,
  `rifky_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rifky_tb_outlet`
--

INSERT INTO `rifky_tb_outlet` (`rifky_id_outlet`, `rifky_nama`, `rifky_alamat`, `rifky_telp`) VALUES
(1, 'Laundry Cimahi', 'Kamarung', '08935674234'),
(2, 'Laundry Bandung', 'Dago', '089524557789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifky_tb_paket`
--

CREATE TABLE `rifky_tb_paket` (
  `rifky_id_paket` int(11) NOT NULL,
  `rifky_id_outlet` int(11) NOT NULL,
  `rifky_jenis` enum('kiloan','selimut','bed_cover','kaos','lain') NOT NULL,
  `rifky_nama_paket` varchar(100) NOT NULL,
  `rifky_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rifky_tb_paket`
--

INSERT INTO `rifky_tb_paket` (`rifky_id_paket`, `rifky_id_outlet`, `rifky_jenis`, `rifky_nama_paket`, `rifky_harga`) VALUES
(1, 2, 'kiloan', 'Paket Kilo Murah', 6000),
(2, 2, 'selimut', 'Paket Selimut Murah', 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifky_tb_transaksi`
--

CREATE TABLE `rifky_tb_transaksi` (
  `rifky_id_transaksi` int(11) NOT NULL,
  `rifky_id_outlet` int(11) NOT NULL,
  `rifky_kode_invoice` varchar(100) NOT NULL,
  `rifky_id_member` int(11) NOT NULL,
  `rifky_tgl` datetime NOT NULL,
  `rifky_batas_waktu` datetime NOT NULL,
  `rifky_tgl_bayar` datetime NOT NULL,
  `rifky_biaya_tambahan` int(11) NOT NULL,
  `rifky_diskon` double NOT NULL,
  `rifky_pajak` int(11) NOT NULL,
  `rifky_status` enum('baru','proses','selesai','diambil') NOT NULL,
  `rifky_dibayar` enum('dibayar','belum_dibayar') NOT NULL,
  `rifky_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rifky_tb_transaksi`
--

INSERT INTO `rifky_tb_transaksi` (`rifky_id_transaksi`, `rifky_id_outlet`, `rifky_kode_invoice`, `rifky_id_member`, `rifky_tgl`, `rifky_batas_waktu`, `rifky_tgl_bayar`, `rifky_biaya_tambahan`, `rifky_diskon`, `rifky_pajak`, `rifky_status`, `rifky_dibayar`, `rifky_id_user`) VALUES
(1, 1, 'L001', 1, '2023-02-16 20:21:14', '2023-02-19 20:21:14', '2023-02-16 14:21:14', 0, 0, 0, 'baru', 'belum_dibayar', 3),
(2, 2, 'PJ0002', 2, '2023-02-19 00:00:00', '2023-02-21 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'baru', 'belum_dibayar', 1),
(3, 1, 'PJ0003', 1, '2023-02-19 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'proses', 'dibayar', 1),
(4, 1, 'PJ0004', 1, '2023-02-19 21:52:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'baru', 'dibayar', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifky_tb_users`
--

CREATE TABLE `rifky_tb_users` (
  `rifky_id_user` int(11) NOT NULL,
  `rifky_nama` varchar(100) NOT NULL,
  `rifky_username` varchar(30) NOT NULL,
  `rifky_password` text NOT NULL,
  `rifky_id_outlet` int(11) NOT NULL,
  `rifky_role` enum('admin','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rifky_tb_users`
--

INSERT INTO `rifky_tb_users` (`rifky_id_user`, `rifky_nama`, `rifky_username`, `rifky_password`, `rifky_id_outlet`, `rifky_role`) VALUES
(1, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 2, 'admin'),
(2, 'Rifky Najra Adipura', 'rifky', '202cb962ac59075b964b07152d234b70', 2, 'owner'),
(3, 'DadangBedog', 'dadang', '202cb962ac59075b964b07152d234b70', 1, 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rifky_tb_detail_transaksi`
--
ALTER TABLE `rifky_tb_detail_transaksi`
  ADD PRIMARY KEY (`rifky_id_detail_transaksi`),
  ADD KEY `rifky_id_paket` (`rifky_id_paket`);

--
-- Indeks untuk tabel `rifky_tb_member`
--
ALTER TABLE `rifky_tb_member`
  ADD PRIMARY KEY (`rifky_id_member`);

--
-- Indeks untuk tabel `rifky_tb_outlet`
--
ALTER TABLE `rifky_tb_outlet`
  ADD PRIMARY KEY (`rifky_id_outlet`);

--
-- Indeks untuk tabel `rifky_tb_paket`
--
ALTER TABLE `rifky_tb_paket`
  ADD PRIMARY KEY (`rifky_id_paket`),
  ADD KEY `rifky_id_outlet` (`rifky_id_outlet`);

--
-- Indeks untuk tabel `rifky_tb_transaksi`
--
ALTER TABLE `rifky_tb_transaksi`
  ADD PRIMARY KEY (`rifky_id_transaksi`),
  ADD KEY `rifky_id_user` (`rifky_id_user`);

--
-- Indeks untuk tabel `rifky_tb_users`
--
ALTER TABLE `rifky_tb_users`
  ADD PRIMARY KEY (`rifky_id_user`),
  ADD KEY `rifky_id_outlet` (`rifky_id_outlet`),
  ADD KEY `rifky_id_outlet_2` (`rifky_id_outlet`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rifky_tb_detail_transaksi`
--
ALTER TABLE `rifky_tb_detail_transaksi`
  MODIFY `rifky_id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rifky_tb_member`
--
ALTER TABLE `rifky_tb_member`
  MODIFY `rifky_id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rifky_tb_outlet`
--
ALTER TABLE `rifky_tb_outlet`
  MODIFY `rifky_id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `rifky_tb_paket`
--
ALTER TABLE `rifky_tb_paket`
  MODIFY `rifky_id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rifky_tb_transaksi`
--
ALTER TABLE `rifky_tb_transaksi`
  MODIFY `rifky_id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rifky_tb_users`
--
ALTER TABLE `rifky_tb_users`
  MODIFY `rifky_id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rifky_tb_paket`
--
ALTER TABLE `rifky_tb_paket`
  ADD CONSTRAINT `rifky_tb_paket_ibfk_1` FOREIGN KEY (`rifky_id_outlet`) REFERENCES `rifky_tb_outlet` (`rifky_id_outlet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rifky_tb_users`
--
ALTER TABLE `rifky_tb_users`
  ADD CONSTRAINT `rifky_tb_users_ibfk_1` FOREIGN KEY (`rifky_id_outlet`) REFERENCES `rifky_tb_outlet` (`rifky_id_outlet`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
