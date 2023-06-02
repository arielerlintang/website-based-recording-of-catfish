-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 06:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainit_yusuf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`, `nama_admin`) VALUES
(1, 'admin', 'admin', 'ariel erlintang');

-- --------------------------------------------------------

--
-- Table structure for table `kolam`
--

CREATE TABLE `kolam` (
  `id_kolam` int(11) NOT NULL,
  `nama_kolam` varchar(100) NOT NULL,
  `lebar_kolam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kolam`
--

INSERT INTO `kolam` (`id_kolam`, `nama_kolam`, `lebar_kolam`) VALUES
(1, 'kolam nila', '7x7 meter'),
(2, 'kolam lele', '5x5'),
(3, 'kolam ikan gurame', '3x9'),
(4, 'DOINO', '8x5');

-- --------------------------------------------------------

--
-- Table structure for table `pakan`
--

CREATE TABLE `pakan` (
  `id_pakan` int(11) NOT NULL,
  `nama_pakan` varchar(100) NOT NULL,
  `harga_pakan` int(11) NOT NULL,
  `berat_pakan` int(11) NOT NULL,
  `jumlah_pakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pakan`
--

INSERT INTO `pakan` (`id_pakan`, `nama_pakan`, `harga_pakan`, `berat_pakan`, `jumlah_pakan`) VALUES
(1, 'palet nila', 400, 400, 2),
(2, 'pakan iwak lele', 50000, 5000, 1),
(3, 'crutu', 120000, 300, 30),
(4, 'cbu tailan', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `jumlah_pembelian` int(11) NOT NULL,
  `nominal_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_produk`, `tanggal_pembelian`, `jumlah_pembelian`, `nominal_pembelian`) VALUES
(1, 1, '2023-02-16', 10, 100000),
(2, 1, '2023-02-21', 500, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_skala`
--

CREATE TABLE `pembelian_skala` (
  `id_pembelian_skala` int(11) NOT NULL,
  `id_pakan` int(11) NOT NULL,
  `id_kolam` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian_skala`
--

INSERT INTO `pembelian_skala` (`id_pembelian_skala`, `id_pakan`, `id_kolam`, `nama`, `deskripsi`) VALUES
(1, 4, 0, 'cbu tailan', 'lorem\r\n'),
(2, 0, 4, 'ALFAT', 'ALFAT\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `jumlah_penjualan` int(11) NOT NULL,
  `nominal_penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_produk`, `tanggal_penjualan`, `jumlah_penjualan`, `nominal_penjualan`) VALUES
(1, 1, '2023-02-16', 50, 500000),
(2, 1, '2023-02-21', 10, 50000),
(3, 1, '2023-02-21', 10, 50000),
(4, 1, '2023-01-01', 10, 100000),
(5, 1, '2023-02-22', 2, 100000),
(6, 1, '2023-03-09', 20000, 30000),
(7, 1, '2023-04-16', 10, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `peremajaan`
--

CREATE TABLE `peremajaan` (
  `id_peremajaan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pakan` int(11) NOT NULL,
  `id_kolam` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `tanggal_mulai_peremajaan` date NOT NULL,
  `tanggal_selesai_peremajaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peremajaan`
--

INSERT INTO `peremajaan` (`id_peremajaan`, `id_produk`, `id_pakan`, `id_kolam`, `jumlah_produk`, `tanggal_mulai_peremajaan`, `tanggal_selesai_peremajaan`) VALUES
(1, 1, 1, 1, 40, '2023-02-28', '2023-08-28'),
(2, 2, 2, 2, 30, '2023-02-08', '2023-03-01'),
(3, 1, 3, 3, 20, '2023-02-07', '2023-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` char(8) NOT NULL,
  `jenis_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `jenis_produk`, `nama_produk`, `harga_produk`, `stok_produk`, `berat_produk`, `deskripsi_produk`, `foto_produk`) VALUES
(1, '001', 'ikan air tawar', 'ikan nila', 10000, -19482, 500, 'ikan lele gemuk gemuk							\r\n													\r\n						', 'elerayk.png'),
(2, '004', 'ikan air tawar', 'ikan lele', 130000, 300, 300, 'ikan nila dari rowo jomboR							\r\n						', 'hools.jpg'),
(5, '003', 'ikan gurame', 'ikan gurame', 120000, 250, 100, 'ikan buntal				', 'hools.jpg'),
(6, '', '', '', 0, 10, 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kolam`
--
ALTER TABLE `kolam`
  ADD PRIMARY KEY (`id_kolam`);

--
-- Indexes for table `pakan`
--
ALTER TABLE `pakan`
  ADD PRIMARY KEY (`id_pakan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_skala`
--
ALTER TABLE `pembelian_skala`
  ADD PRIMARY KEY (`id_pembelian_skala`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `peremajaan`
--
ALTER TABLE `peremajaan`
  ADD PRIMARY KEY (`id_peremajaan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kolam`
--
ALTER TABLE `kolam`
  MODIFY `id_kolam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pakan`
--
ALTER TABLE `pakan`
  MODIFY `id_pakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian_skala`
--
ALTER TABLE `pembelian_skala`
  MODIFY `id_pembelian_skala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peremajaan`
--
ALTER TABLE `peremajaan`
  MODIFY `id_peremajaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
