-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220619.196dad2777
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2022 pada 17.14
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fp_mrp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_barang`
--

CREATE TABLE `dta_barang` (
  `kd_barang` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `stock_awal` int(15) NOT NULL,
  `stock_terjual` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_barang`
--

INSERT INTO `dta_barang` (`kd_barang`, `nama`, `jumlah`, `harga`, `satuan`, `kondisi`, `stock_awal`, `stock_terjual`) VALUES
('KDR-0001', 'Resin', 107, 30000, 'Unit', 'Ready Stock', 110, 0),
('KDR-0002', 'Minyak', 0, 25, 'Unit', 'Ready Stock', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_distributor`
--

CREATE TABLE `dta_distributor` (
  `id_distributor` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `fax` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_distributor`
--

INSERT INTO `dta_distributor` (`id_distributor`, `nama`, `nomor`, `fax`, `email`, `website`, `alamat`) VALUES
('IDDIS-0001', 'Depo bangunan', '085843120517', '41111', 'depo@gmail.com', 'depo.com', 'Wew');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_supplier`
--

CREATE TABLE `dta_supplier` (
  `id_supplier` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `fax` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_supplier`
--

INSERT INTO `dta_supplier` (`id_supplier`, `nama`, `nomor`, `fax`, `email`, `website`, `alamat`) VALUES
('IDSUP-0001', 'PT. Kencana Inti Pasar', '098765466536', '1111', 'kencanainti@gmail.com', 'kencanainti.com', 'Sidoajro'),
('IDSUP-0002', 'PT. Mulya Adhi ParaWita', '367498232102', '1414', 'mulyadhi@gmail.com', 'mulyadhi.com', 'Jakarta'),
('IDSUP-0003', 'PT. Mulya Jadi ', '098763747362', '1515', 'mulyajadi @gmail.com', 'mulyajadi.com', 'Jawa Timur'),
('IDSUP-0004', 'PT. MMM', '098754676541', '1515', 'mmm@gmail.com', 'mmm.com', 'Jawa Timur'),
('IDSUP-0005', 'PT. Omya Indonesia', '085843150512', '61111', 'omyaindo@gmail.com', 'omyaindo.com', 'Jawa Timur'),
('IDSUP-0006', 'PT. Adiguna Eka Sejahtera', '085846152051', '446123', 'adiguna@gmail.com', 'adiguna.com', 'Jawa Timur'),
('IDSUP-0007', 'PT. Indo Asia Tirta Manunggal', '085846152052', '41111', 'indoasia@gmail.com', 'indoasia.com', 'Jawa Timur'),
('IDSUP-0008', 'PT. Mata Pelangi Chemindo', '085846152051', '41111', 'matpelangi@gmail.com', 'pelangi.com', 'Jawa Timur'),
('IDSUP-0009', 'PT. Pardic Jaya Chemicals', '085846152051', '41111', 'jayachemical@gmail.com', 'jayachemical.com', 'Jawa Timur'),
('IDSUP-0010', 'PT. Inti Pelangi Drumasindo', '085846152051', '41111', 'drumasindo@gmail.com', 'drumasindo.com', 'Jawa Timur'),
('IDSUP-0011', 'PT. Galic Bima Mapa', '085846152051', '41111', 'bimaapa@gmail.com', 'bimaapa.com', 'Jawa Timur'),
('IDSUP-0012', 'PT. Eternal Mandiri Adi Sentosa', '085846152051', '41111', 'eternal@gmail.com', 'eternal.com', 'Jawa Timur'),
('IDSUP-0013', 'PT. Hade Sejati Pratama', '085846152051', '41111', 'hadesejati@gmail.com', 'hadesejati.com', 'Jawa Timur'),
('IDSUP-0014', 'PT. Tunas Sumber Ide Kreasi Kimia', '085846152051', '41111', 'tunas@gmail.com', 'tunas.com', 'Jawa Timur'),
('IDSUP-0015', 'CV. Anugrah Jaya Abadi', '085846152051', '41111', 'anugrah@gmail.com', 'anugrah.com', 'Jawa Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_trnsaksi_brng_keluar`
--

CREATE TABLE `dta_trnsaksi_brng_keluar` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_distributor` varchar(20) NOT NULL,
  `nmasup` varchar(50) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `nmabar` varchar(50) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `total` int(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_trnsaksi_brng_keluar`
--

INSERT INTO `dta_trnsaksi_brng_keluar` (`id_transaksi`, `id_distributor`, `nmasup`, `kd_barang`, `nmabar`, `jumlah`, `harga`, `total`, `status`, `waktu`) VALUES
('TRSBK-0001', 'IDSUP-0001', 'Pt. Maju Mundur', 'KDR-0003', 'VCD Player / DVD Player', 12, 5000000, 60000000, 'On-Process', '2018-06-28 11.21.11'),
('TRSBK-0002', 'IDSUP-0001', 'Pt. Maju Mundur', 'KDR-0001', 'Kulkas', 10, 3500000, 35000000, 'On-Process', '2018-06-28 15.08.23'),
('TRSBK-0003', 'IDSUP-0002', 'PT. Mulya Adhi ParaWita', 'KDR-0001', 'test', 1, 30000, 30000, 'On-Process', '2022-12-28 20.00.22'),
('TRSBK-0004', 'IDDIS-0001', 'Depo bangunan', 'KDR-0001', 'test', 1, 30000, 30000, 'Delivered', '2022-12-28 20.02.19');

--
-- Trigger `dta_trnsaksi_brng_keluar`
--
DELIMITER $$
CREATE TRIGGER `kurangjumlahbarang` AFTER INSERT ON `dta_trnsaksi_brng_keluar` FOR EACH ROW begin
update dta_barang set jumlah = jumlah-new.jumlah, stock_terjual = stock_terjual+new.jumlah where kd_barang = new.kd_barang;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_trnsaksi_brng_masuk`
--

CREATE TABLE `dta_trnsaksi_brng_masuk` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_supplier` varchar(20) NOT NULL,
  `nmasup` varchar(50) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `nmabar` varchar(50) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `total` int(15) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_trnsaksi_brng_masuk`
--

INSERT INTO `dta_trnsaksi_brng_masuk` (`id_transaksi`, `id_supplier`, `nmasup`, `kd_barang`, `nmabar`, `jumlah`, `harga`, `total`, `waktu`) VALUES
('TRSBM-0001', 'IDSUP-0001', 'Pt. Maju Mundur', 'KDR-0009', 'Komputer', 25, 5999000, 149975000, '2018-06-28 10.32.03'),
('TRSBM-0002', 'IDSUP-0001', 'Pt. Maju Mundur', 'KDR-0005', 'Mesin Cuci', 50, 4000000, 200000000, '2018-06-28 10.32.32'),
('TRSBM-0003', 'IDSUP-0004', 'Pt. Indah Sekali', 'KDR-0003', 'VCD Player / DVD Player', 55, 5000000, 275000000, '2018-06-28 10.33.01'),
('TRSBM-0004', 'IDSUP-0003', 'Pt. Bintang Prima', 'KDR-0001', 'Kulkas', 25, 3500000, 87500000, '2018-06-28 15.07.57'),
('TRSBM-0005', 'IDSUP-0004', 'Pt. Indah Sekali', 'KDR-0002', 'Televisi (TV)', 25, 4500000, 112500000, '2018-06-28 19.34.36'),
('TRSBM-0006', 'IDSUP-0002', 'PT. Mulya Adhi ParaWita', 'KDR-0001', 'test', 10, 30000, 300000, '2022-12-28 19.59.49');

--
-- Trigger `dta_trnsaksi_brng_masuk`
--
DELIMITER $$
CREATE TRIGGER `tambahjumlahbarang` AFTER INSERT ON `dta_trnsaksi_brng_masuk` FOR EACH ROW begin
update dta_barang set jumlah = jumlah+new.jumlah, stock_awal = stock_awal+new.jumlah where kd_barang = new.kd_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masuk`
--

CREATE TABLE `masuk` (
  `id` int(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masuk`
--

INSERT INTO `masuk` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dta_barang`
--
ALTER TABLE `dta_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indeks untuk tabel `dta_distributor`
--
ALTER TABLE `dta_distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indeks untuk tabel `dta_supplier`
--
ALTER TABLE `dta_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `dta_trnsaksi_brng_keluar`
--
ALTER TABLE `dta_trnsaksi_brng_keluar`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `dta_trnsaksi_brng_masuk`
--
ALTER TABLE `dta_trnsaksi_brng_masuk`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



