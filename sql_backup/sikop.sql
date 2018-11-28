-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2018 at 02:44 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikop`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_bukubesar`
--

CREATE TABLE `data_bukubesar` (
  `id_buku` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `fk_nama_akun` varchar(100) NOT NULL,
  `jml_debit` int(15) NOT NULL,
  `jml_kredit` int(15) NOT NULL,
  `jml_saldo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_bukubesar`
--

INSERT INTO `data_bukubesar` (`id_buku`, `tanggal`, `fk_nama_akun`, `jml_debit`, `jml_kredit`, `jml_saldo`) VALUES
(359, '2018-09-01', 'Beban Operasional', 100000, 0, 0),
(360, '2018-09-01', 'Kas', 0, 100000, 0),
(361, '2018-09-02', 'Kas', 350000, 0, 0),
(362, '2018-09-02', 'Harga Pokok Penjualan', 250000, 0, 0),
(363, '2018-09-02', 'Persediaan', 0, 250000, 0),
(364, '2018-09-02', '- Penjualan Seragam', 0, 350000, 0),
(365, '2018-09-05', 'Kas', 400000, 0, 0),
(366, '2018-09-05', 'Harga Pokok Penjualan', 300000, 0, 0),
(367, '2018-09-05', 'Persediaan', 0, 300000, 0),
(368, '2018-09-05', '- Penjualan Seragam', 0, 400000, 0),
(369, NULL, 'SHU', 100000, 0, 0),
(370, NULL, 'Iktisar Laba Rugi', 0, 100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_chartofaccount`
--

CREATE TABLE `data_chartofaccount` (
  `id_akun` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `saldo_awal` int(15) NOT NULL,
  `saldo` int(15) NOT NULL,
  `saldo_akhir` int(15) NOT NULL,
  `kategori` varchar(5) NOT NULL,
  `phu` varchar(5) NOT NULL,
  `laporan_neraca` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_chartofaccount`
--

INSERT INTO `data_chartofaccount` (`id_akun`, `kode`, `nama_akun`, `keterangan`, `saldo_awal`, `saldo`, `saldo_akhir`, `kategori`, `phu`, `laporan_neraca`) VALUES
(1, '1.01.01', 'Kas', 'Akun', 30000000, 30650000, 30650000, '1', '', '1'),
(2, '1.01.02', 'Bank', 'Akun', 0, 0, 0, '1', '', '1'),
(3, '', 'Piutang', 'Akun', 0, 0, 0, '1', '0', '1'),
(4, '', 'Persediaan', 'Akun', 9575000, 9025000, 9025000, '1', '', '1'),
(5, '', 'Peralatan', 'Akun', 0, 0, 0, '1', '', '1'),
(6, '', 'Penyusutan Peralatan', 'Akun', 0, 0, 0, '1', '', '1'),
(7, '', 'Utang Dagang', 'Akun', 0, 0, 0, '1', '', '2'),
(8, '', 'Simpanan Pokok', 'Akun', 30000000, 30000000, 0, '2', '', '3'),
(9, '', 'Simpanan Sukarela', 'Akun', 9575000, 9575000, 0, '2', '', '3'),
(10, '', 'Pendapatan Sewa', 'Akun', 0, 0, 0, '2', '', '3'),
(12, '', 'Pendapatan Usaha', 'Akun', 0, 0, 0, '2', '', ''),
(13, '', '- Penjualan ATK', 'Akun', 0, 0, 0, '2', '1', ''),
(14, '', '- Penjualan Seragam', 'Akun', 0, 750000, 750000, '2', '1', ''),
(15, '', '- Penjualan Makanan', 'Akun', 0, 0, 0, '2', '1', ''),
(16, '', 'Beban Operasional', 'Akun', 0, 100000, 100000, '1', '3', ''),
(17, '', 'Beban Gaji', 'Akun', 0, 0, 0, '1', '3', ''),
(19, '', 'Beban Lain-lain', 'Akun', 0, 0, 0, '1', '3', ''),
(20, '', 'Harga Pokok Penjualan', 'Akun', 0, 550000, 550000, '1', '2', ''),
(23, '', 'SHU', 'Akun', 0, 100000, 100000, '3', '', '3'),
(27, '', 'Iktisar Laba Rugi', 'Akun', 0, 100000, 100000, '1', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `data_jurnal`
--

CREATE TABLE `data_jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `transaksi` varchar(100) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `akun_debit` varchar(100) NOT NULL,
  `akun_kredit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jurnal`
--

INSERT INTO `data_jurnal` (`id_jurnal`, `tanggal`, `transaksi`, `jumlah`, `akun_debit`, `akun_kredit`) VALUES
(154, '2018-09-01', 'Membayar Listrik', 100000, 'Beban Operasional', 'Kas'),
(155, '2018-09-02', 'Baju Koko', 350000, 'Kas', '- Penjualan Seragam'),
(156, '2018-09-02', 'Baju Koko', 250000, 'Harga Pokok Penjualan', 'Persediaan'),
(157, '2018-09-05', 'Baju Olahraga', 400000, 'Kas', '- Penjualan Seragam'),
(158, '2018-09-05', 'Baju Olahraga', 300000, 'Harga Pokok Penjualan', 'Persediaan'),
(159, '2018-09-07', 'Mengupdate SHU', 100000, 'SHU', 'Iktisar Laba Rugi');

-- --------------------------------------------------------

--
-- Table structure for table `data_koperasi`
--

CREATE TABLE `data_koperasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kuantitas` int(32) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `harga_beli` int(15) NOT NULL,
  `harga_jual` int(15) NOT NULL,
  `harga_pokok` int(15) NOT NULL,
  `supplier` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_koperasi`
--

INSERT INTO `data_koperasi` (`id`, `nama`, `tanggal`, `kuantitas`, `jenis_barang`, `harga_beli`, `harga_jual`, `harga_pokok`, `supplier`) VALUES
(101, 'Bulpen', '2018-09-05 10:36:49', 200, 'Alat Tulis', 1000, 0, 1000, 'ATK'),
(102, 'Pinsil 2B', '2018-08-24 10:41:14', 200, 'Alat Tulis', 2000, 0, 2000, 'ATK'),
(103, 'Buku Tulis', '2018-09-06 23:34:30', 100, 'Alat Tulis', 2500, 4000, 2500, 'ATK'),
(104, 'Baju Batik', '2018-09-06 23:34:32', 50, 'Seragam', 50000, 70000, 50000, 'SRG'),
(105, 'Baju Olahraga', '2018-09-06 23:39:26', 45, 'Seragam', 60000, 80000, 60000, 'SRG'),
(106, 'Baju Koko', '2018-09-06 23:38:20', 40, 'Seragam', 50000, 70000, 50000, 'SRG'),
(107, 'Aqua Botol', '2018-09-06 23:34:40', 300, 'Makanan', 1500, 4000, 1500, 'MKN'),
(108, 'Sari Roti', '2018-09-05 10:38:24', 50, 'Makanan', 3000, 0, 3000, 'MKN'),
(109, 'Pokari Sweat', '2018-09-05 10:38:46', 50, 'Makanan', 2500, 0, 2500, 'MKN');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', 'admin', '1'),
(2, 'User', 'test@yahoo.com', 'test123', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_bukubesar`
--
ALTER TABLE `data_bukubesar`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `fk_nama_akun` (`fk_nama_akun`);

--
-- Indexes for table `data_chartofaccount`
--
ALTER TABLE `data_chartofaccount`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `nama_akun` (`nama_akun`);

--
-- Indexes for table `data_jurnal`
--
ALTER TABLE `data_jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `akun_debit` (`akun_debit`),
  ADD KEY `akun_kredit` (`akun_kredit`);

--
-- Indexes for table `data_koperasi`
--
ALTER TABLE `data_koperasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis` (`jenis_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_bukubesar`
--
ALTER TABLE `data_bukubesar`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `data_chartofaccount`
--
ALTER TABLE `data_chartofaccount`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `data_jurnal`
--
ALTER TABLE `data_jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `data_koperasi`
--
ALTER TABLE `data_koperasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_bukubesar`
--
ALTER TABLE `data_bukubesar`
  ADD CONSTRAINT `data_bukubesar_ibfk_3` FOREIGN KEY (`fk_nama_akun`) REFERENCES `data_chartofaccount` (`nama_akun`);

--
-- Constraints for table `data_jurnal`
--
ALTER TABLE `data_jurnal`
  ADD CONSTRAINT `data_jurnal_ibfk_1` FOREIGN KEY (`akun_debit`) REFERENCES `data_chartofaccount` (`nama_akun`),
  ADD CONSTRAINT `data_jurnal_ibfk_2` FOREIGN KEY (`akun_kredit`) REFERENCES `data_chartofaccount` (`nama_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
