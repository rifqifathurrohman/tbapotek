-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2022 at 11:47 AM
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
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `golongan_obat` varchar(100) NOT NULL,
  `kegunaan` varchar(100) NOT NULL,
  `id_golongan` int(4) NOT NULL,
  `rakpenyimpanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`golongan_obat`, `kegunaan`, `id_golongan`, `rakpenyimpanan`) VALUES
('Analgetik / Antipiretik', 'Antidemam / Antinyeri ', 101, 'Obat_012'),
('Antihistamin', 'Antialergi', 102, 'Obat_015'),
('Antispasmodik', 'Relaksan atau kejang Otot', 103, 'Obat_017'),
('Gastrointestinal', 'Saluran Pencernaan', 104, 'Obat_013'),
('Antiemetika', 'Mual Muntah', 105, 'Obat_016'),
('Antiasma', 'Antiasma', 465, 'Obat_030');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(4) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` int(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `alamat`, `notelp`, `username`, `password`) VALUES
(201, 'Resti A', 'Cikiray', 856794444, 'resti', 'resti'),
(202, 'Rahmi F', 'Bandung', 857946431, 'rahmi', 'rahmi'),
(203, 'M Erza', 'Mangkubumi', 857770765, 'erza', 'rahmi'),
(204, 'Fira S', 'Singaparna', 857996452, 'fira', 'fira'),
(205, 'Rena S', 'Singaparna', 827686688, 'rena', 'rena'),
(206, 'Sherli', 'Tasikmalaya ', 857999090, 'sherli', 'Sherli123');

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
(2, 2, 'rifki', 2, 0, 0, NULL, 0),
(3, 0, 'tes', 0, 0, 0, NULL, 0),
(4, 0, 'KEY243', 0, 0, 0, NULL, 0),
(5, 0, 'KEY531', 0, 0, 0, NULL, 0),
(6, 0, 'KEY706', 0, 0, 0, NULL, 0),
(7, 0, 'KEY392', 0, 0, 0, NULL, 0),
(8, 0, 'KEY491', 0, 0, 0, NULL, 0),
(9, 0, 'KEY166', 0, 0, 0, NULL, 0),
(10, 0, 'KEY276', 0, 0, 0, NULL, 0),
(11, 0, 'KEY768', 0, 0, 0, NULL, 0);

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
(1, 'uri:api/obat/apotek:get', 19, 1659430432, 'algies'),
(2, 'uri:api/obat/apotek:post', 5, 1659415436, 'algies'),
(3, 'uri:api/golongan/apotek:get', 2, 1659431465, 'algies'),
(4, 'uri:api/golongan/apotek:post', 1, 1659370839, 'algies'),
(5, 'uri:api/karyawan/apotek:get', 2, 1659371246, 'algies'),
(6, 'uri:api/pelanggan/apotek:get', 2, 1658117627, 'algies'),
(7, 'uri:api/supplier/apotek:get', 1, 1659372279, 'algies'),
(8, 'uri:api/fakturpenjualan/apotek:get', 1, 1658119695, 'algies'),
(9, 'uri:api/faktursupplier/apotek:get', 3, 1658199518, 'algies'),
(10, 'uri:api/supplier/apotek:get', 1, 1659372268, 'rifki'),
(11, 'uri:api/pelanggan/apotek:get', 25, 1659137663, 'rifki'),
(12, 'uri:api/fakturpenjualan/apotek:get', 3, 1658285727, 'rifki'),
(13, 'uri:api/karyawan/apotek:post', 2, 1659371849, 'rifki'),
(14, 'uri:api/supplier/apotek:post', 1, 1659372597, 'rifki'),
(15, 'uri:api/pelanggan/apotek:post', 8, 1658123636, 'rifki'),
(16, 'uri:api/fakturpenjualan/apotek:post', 3, 1658199444, 'algies'),
(17, 'uri:api/transaksisupplier/apotek:get', 1, 1659266410, 'algies'),
(18, 'uri:api/transaksipenjualan/apotek:get', 1, 1658666067, 'rifki'),
(19, 'uri:api/transaksipenjualan/apotek:post', 5, 1659137534, 'algies'),
(20, 'uri:api/transaksisupplier/apotek:post', 1, 1659137803, 'algies'),
(21, 'uri:api/transaksipenjualan/apotek:get', 1, 1659266410, 'algies'),
(22, 'uri:api/obat/apotek:post', 1, 1659414792, 'rifki'),
(23, 'uri:api/golongan/apotek:post', 1, 1659044916, 'rifki'),
(24, 'uri:api/karyawan/apotek:post', 2, 1659138707, 'algies'),
(25, 'uri:api/pelanggan/apotek:post', 2, 1658807064, 'algies'),
(26, 'uri:api/supplier/apotek:post', 2, 1659139187, 'algies'),
(27, 'uri:api/key/key:post', 3, 1659431166, 'algies');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(4) NOT NULL,
  `id_golongan` int(4) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `id_golongan`, `nama_obat`, `stok`, `harga`) VALUES
(57, 103, 'FGV', 240, 6000),
(301, 104, 'Promag', 140, 2500),
(302, 102, 'Cetirizine', 240, 3000),
(303, 103, 'Levsin', 240, 3000),
(304, 104, 'Dobrizol', 240, 3500),
(305, 105, 'Domperidon', 240, 4000),
(364, 103, 'SV', 345, 300),
(3463, 101, 'er', 45, 345);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(4) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenis_kelamin` enum('perempuan','laki-laki','','') NOT NULL,
  `umur` int(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `umur`, `alamat`, `notelp`) VALUES
(401, 'Rini N', 'perempuan', 21, 'Cikunir', 857946668),
(402, 'Dhanti', 'perempuan', 21, 'Bandung', 85744688),
(403, 'Hasna', 'perempuan', 20, 'Bandung', 857770765),
(404, 'Rifki', 'laki-laki', 21, 'Cimahi', 827864388),
(405, 'Algies R', 'perempuan', 20, 'Cimindi', 827686688);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(4) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` int(12) NOT NULL,
  `penanggungjawab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `notelp`, `penanggungjawab`) VALUES
(501, 'PT Bio Farma', 'Bandung', 857946668, 'Anita'),
(502, 'PT Bufa Aneka', 'Semarang', 873567779, 'Devie'),
(503, 'Kimia Farma', 'Tasikmalaya', 85777877, 'Refina Putri'),
(504, 'PT Bison', 'Jakarta', 827864388, 'Hana'),
(505, 'PT Pharos', 'Tasikmalaya', 808783748, 'Feby'),
(506, 'PT Afiat Farma', 'Bandung', 517352144, 'Salsa');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `id_t_penjualan` int(4) NOT NULL,
  `id_karyawan` int(4) NOT NULL,
  `id_pelanggan` int(4) NOT NULL,
  `id_obat` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(100) NOT NULL,
  `total_bayar` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`id_t_penjualan`, `id_karyawan`, `id_pelanggan`, `id_obat`, `tanggal`, `jumlah`, `total_bayar`) VALUES
(601, 202, 405, 301, '2022-07-14', 240, 18000),
(602, 201, 402, 301, '2022-07-03', 240, 30000),
(603, 205, 403, 304, '2022-07-01', 240, 21000),
(604, 203, 404, 305, '2022-07-18', 240, 20000),
(605, 201, 401, 302, '2022-07-16', 240, 30000),
(606, 202, 402, 302, '2022-07-18', 240, 22000),
(609, 201, 402, 302, '2022-07-18', 240, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_supplier`
--

CREATE TABLE `transaksi_supplier` (
  `id_t_supplier` int(4) NOT NULL,
  `id_obat` int(4) NOT NULL,
  `id_supplier` int(4) NOT NULL,
  `id_karyawan` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(100) NOT NULL,
  `total_bayar` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_supplier`
--

INSERT INTO `transaksi_supplier` (`id_t_supplier`, `id_obat`, `id_supplier`, `id_karyawan`, `tanggal`, `jumlah`, `total_bayar`) VALUES
(701, 301, 501, 201, '2022-06-30', 240, 300000),
(702, 302, 502, 202, '2022-06-30', 240, 360000),
(703, 303, 503, 203, '2022-06-29', 240, 360000),
(704, 304, 504, 204, '2022-06-28', 240, 400000),
(705, 302, 503, 204, '2022-06-28', 240, 330000),
(709, 301, 501, 201, '2022-07-29', 241, 2542351);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id_t_penjualan`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `transaksi_supplier`
--
ALTER TABLE `transaksi_supplier`
  ADD PRIMARY KEY (`id_t_supplier`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `id_t_penjualan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=612;

--
-- AUTO_INCREMENT for table `transaksi_supplier`
--
ALTER TABLE `transaksi_supplier`
  MODIFY `id_t_supplier` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=710;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD CONSTRAINT `transaksi_penjualan_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_penjualan_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_penjualan_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_supplier`
--
ALTER TABLE `transaksi_supplier`
  ADD CONSTRAINT `transaksi_supplier_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_supplier_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_supplier_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
