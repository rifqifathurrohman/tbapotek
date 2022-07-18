-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 02:31 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb_apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `faktur_penjualan`
--

CREATE TABLE `faktur_penjualan` (
  `id_f_penjualan` int(4) NOT NULL,
  `id_karyawan` int(4) NOT NULL,
  `id_pelanggan` int(4) NOT NULL,
  `id_obat` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `total_bayar` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faktur_penjualan`
--

INSERT INTO `faktur_penjualan` (`id_f_penjualan`, `id_karyawan`, `id_pelanggan`, `id_obat`, `tanggal`, `jumlah`, `total_bayar`) VALUES
(1, 2, 5, 1, '2022-07-14', '6 tab', 18000),
(2, 1, 2, 1, '2022-07-03', '12 tab', 30000),
(3, 5, 3, 4, '2022-07-01', '6 tab', 21000),
(4, 3, 4, 5, '2022-07-01', '4 tab', 16000),
(5, 1, 1, 2, '2022-07-16', '10 tab', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `faktur_supplier`
--

CREATE TABLE `faktur_supplier` (
  `id_f_supplier` int(4) NOT NULL,
  `id_obat` int(4) NOT NULL,
  `id_supplier` int(4) NOT NULL,
  `id_karyawan` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `jml_obat` varchar(100) NOT NULL,
  `total_bayar` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faktur_supplier`
--

INSERT INTO `faktur_supplier` (`id_f_supplier`, `id_obat`, `id_supplier`, `id_karyawan`, `tanggal`, `jml_obat`, `total_bayar`) VALUES
(1, 1, 1, 1, '2022-06-30', '3 Box', 300000),
(2, 2, 2, 2, '2022-06-30', '2 Box', 360000),
(3, 3, 3, 3, '2022-06-29', '2 Box', 360000),
(4, 4, 4, 4, '2022-06-28', '2 Box', 400000),
(5, 5, 5, 5, '2022-06-28', '2 Box', 450000);

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `golongan_obat` varchar(100) NOT NULL,
  `kegunaan` varchar(100) NOT NULL,
  `id_golongan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`golongan_obat`, `kegunaan`, `id_golongan`) VALUES
('Analgetik / Antipiretik', 'Antidemam / Antinyeri ', 1),
('Antihistamin', 'Antialergi', 2),
('Antispasmodik', 'Relaksan atau kejang Otot', 3),
('Gastrointestinal', 'Saluran Pencernaan', 4),
('Antiemetika', 'Mual Muntah', 5),
('Antiasma', 'Antiasma', 6);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `alamat`, `notelp`) VALUES
(1, 'Resti A', 'Cikiray', 856794444),
(2, 'Rahmi F', 'Bandung', 857946431),
(3, 'M Erza', 'Mangkubumi', 857770765),
(4, 'Fira S', 'Singaparna', 857996452),
(5, 'Rena S', 'Singaparna', 827686688),
(6, 'Sinta', 'Cikunir', 85777888);

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'algies', 1, 0, 0, NULL, 0),
(2, 2, 'rifki', 2, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'uri:api/obat/apotek:get', 22, 1658111300, 'algies'),
(2, 'uri:api/obat/apotek:post', 6, 1658112194, 'algies'),
(3, 'uri:api/golongan/apotek:get', 10, 1658114802, 'algies'),
(4, 'uri:api/golongan/apotek:post', 4, 1658115642, 'algies'),
(5, 'uri:api/karyawan/apotek:get', 9, 1658121254, 'algies'),
(6, 'uri:api/pelanggan/apotek:get', 2, 1658117627, 'algies'),
(7, 'uri:api/supplier/apotek:get', 2, 1658118284, 'algies'),
(8, 'uri:api/fakturpenjualan/apotek:get', 1, 1658119695, 'algies'),
(9, 'uri:api/faktursupplier/apotek:get', 1, 1658120447, 'algies'),
(10, 'uri:api/supplier/apotek:get', 6, 1658121532, 'rifki'),
(11, 'uri:api/pelanggan/apotek:get', 5, 1658121757, 'rifki'),
(12, 'uri:api/fakturpenjualan/apotek:get', 7, 1658122129, 'rifki'),
(13, 'uri:api/karyawan/apotek:post', 3, 1658122712, 'rifki'),
(14, 'uri:api/supplier/apotek:post', 3, 1658123323, 'rifki'),
(15, 'uri:api/pelanggan/apotek:post', 8, 1658123636, 'rifki');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(4) NOT NULL,
  `id_supplier` int(4) NOT NULL,
  `id_golongan` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `harga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `id_supplier`, `id_golongan`, `nama`, `stok`, `harga`) VALUES
(1, 2, 4, 'Promag', '', 0),
(2, 2, 2, 'Cetirizine', '5 Box', 3000),
(3, 3, 3, 'Levsin', '4 Box', 3000),
(4, 4, 4, 'Dobrizol', '3 Box', 3500),
(5, 5, 5, 'Domperidon', '4 Box', 4000),
(6, 1, 1, 'Fasidol', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('perempuan','laki-laki','','') NOT NULL,
  `umur` int(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `jenis_kelamin`, `umur`, `alamat`, `notelp`) VALUES
(1, 'Rini N', 'perempuan', 21, 'Cikunir', 857946668),
(2, 'Dhanti', 'perempuan', 21, 'Bandung', 85744688),
(3, 'Hasna', 'perempuan', 20, 'Bandung', 857770765),
(4, 'Rifki', 'laki-laki', 21, 'Cimahi', 827864388),
(5, 'Algies R', 'perempuan', 20, 'Cimindi', 827686688),
(6, 'Lala', 'perempuan', 19, 'Kuningan', 826768);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `notelp`) VALUES
(1, 'PT Bio Farma', 'Bandung', 857946668),
(2, 'PT Bufa Aneka', 'Semarang', 873567779),
(3, 'PT Kimia Farma', 'Tasikmalaya', 866465771),
(4, 'PT Bison', 'Jakarta', 827864388),
(5, 'PT Pharos', 'Jakarta', 827686688),
(6, 'Kimia Farma', 'Bandung', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
  ADD PRIMARY KEY (`id_f_penjualan`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `faktur_supplier`
--
ALTER TABLE `faktur_supplier`
  ADD PRIMARY KEY (`id_f_supplier`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_golongan` (`id_golongan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
  MODIFY `id_f_penjualan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faktur_supplier`
--
ALTER TABLE `faktur_supplier`
  MODIFY `id_f_supplier` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
  ADD CONSTRAINT `faktur_penjualan_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_penjualan_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_penjualan_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faktur_supplier`
--
ALTER TABLE `faktur_supplier`
  ADD CONSTRAINT `faktur_supplier_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_supplier_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_supplier_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obat_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
