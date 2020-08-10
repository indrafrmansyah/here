-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2020 at 06:56 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tugasakhir1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `kode_bahan` varchar(5) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `stok` int(11) NOT NULL,
  `expired` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`kode_bahan`, `nama_bahan`, `satuan`, `stok`, `expired`) VALUES
('B-006', 'Gula', 'Gram', 3665, '2022-01-22'),
('B-003', 'Cokelat', 'Gram', 3751, '2022-01-02'),
('B-004', 'Es Batu', 'Gram', 3208, '2022-01-15'),
('B-005', 'Robusta', 'Gram', 5850, '2022-01-29'),
('B-002', 'Arabika', 'Gram', 3724, '2022-01-05'),
('B-001', 'Susu', 'ml', 2760, '2022-01-07'),
('B-007', 'Syrup', 'ml', 1000, '2021-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_pakai`
--

CREATE TABLE `bahan_pakai` (
  `kode_bahan` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `terpakai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_pakai`
--

INSERT INTO `bahan_pakai` (`kode_bahan`, `tanggal`, `terpakai`) VALUES
('B-003', '0000-00-00', 0),
('B-003', '2020-08-07', 6),
('B-001', '2020-08-07', 240),
('B-002', '2020-08-07', 40),
('B-002', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `kode_beli` varchar(15) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `kode_supplier` varchar(5) NOT NULL,
  `total_beli` int(11) NOT NULL,
  `status_beli` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`kode_beli`, `tanggal_beli`, `kode_supplier`, `total_beli`, `status_beli`) VALUES
('P1606003', '2020-06-16', 'S-001', 21000, 'Selesai'),
('P2906004', '2020-06-29', 'S-001', 16000, 'Selesai'),
('P3006005', '2020-06-30', 'S-001', 15000, 'Selesai'),
('P1407006', '2020-07-14', 'S-001', 29000, 'Selesai'),
('P2807007', '2020-07-28', 'S-002', 3000, 'Selesai'),
('P2807008', '2020-07-28', 'S-001', 32000, 'Selesai'),
('P1406044', '2020-06-14', 'S-001', 15000000, 'Selesai'),
('P1406045', '2020-06-14', 'S-001', 8000, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `beli_detail`
--

CREATE TABLE `beli_detail` (
  `kode_beli` varchar(15) NOT NULL,
  `kode_bahan` varchar(5) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `subtotal_beli` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beli_detail`
--

INSERT INTO `beli_detail` (`kode_beli`, `kode_bahan`, `jumlah_beli`, `subtotal_beli`) VALUES
('P0401002', 'B-001', 5, 50000),
('P0301001', 'B-002', 5, 50000),
('P0401002', 'B-002', 5, 100000),
('P1701003', 'B-001', 10, 100000),
('P1701004', 'B-001', 5, 50000),
('P1701005', 'B-001', 1, 1000),
('P0702006', 'B-001', 5, 50000),
('P1107007', 'B-001', 10, 500000),
('P1107008', 'B-001', 5, 125000),
('P1107009', 'B-003', 10, 400000),
('P1107010', 'B-001', 10, 800000),
('P1107011', 'B-003', 15, 1050000),
('P1107012', 'B-004', 11, 880000),
('P1107013', 'B-004', 10, 500000),
('P1107014', 'B-001', 20, 1200000),
('P1107015', 'B-003', 10, 700000),
('P1107016', 'B-004', 10, 600000),
('P1107017', 'B-004', 10, 1000000),
('P1207018', 'B-001', 10, 5000000),
('P1207019', 'B-003', 20, 1000000),
('P0910020', 'B-001', 3, 90000),
('P0910021', 'B-004', 8, 640000),
('P0910022', 'B-004', 11, 1100000),
('P0910023', 'B-003', 8, 800000),
('P1010024', 'B-001', 5, 250000),
('P1010024', 'B-003', 2, 40000),
('P1010024', 'B-004', 4, 240000),
('P1610025', 'B-001', 2, 80000),
('P2810026', 'B-001', 2, 30000),
('P0611027', 'B-002', 20, 400000),
('P1311028', 'B-001', 25, 500000),
('P1311029', 'B-002', 16, 800000),
('P1311029', 'B-001', 250000, 2147483647),
('P1311030', 'B-002', 16, 400000),
('P1311031', 'B-004', 10, 150000),
('P0401032', 'B-001', 15, 3750000),
('P0401032', 'B-002', 11, 5500000),
('P0401032', 'B-003', 18, 6300000),
('P0601033', 'B-001', 1, 20000),
('P0601033', 'B-002', 2, 200000),
('P0601034', 'B-001', 1, 10000),
('P0601034', 'B-007', 2, 0),
('P0601035', 'B-004', 1, 15000),
('P0801036', 'B-001', 1000, 20000000),
('P0801037', 'B-001', 1000, 20000000),
('P0801037', 'B-002', 1000, 150000000),
('P0801037', 'B-006', 1000, 100000000),
('P0801037', 'B-004', 1000, 50000000),
('P0801037', 'B-003', 1000, 20000000),
('P0801037', 'B-005', 1000, 20000000),
('P1501038', 'B-001', 1000, 20000000),
('P2001039', 'B-002', 1000, 150000000),
('P2001040', 'B-002', 1000, 150000),
('P3101041', 'B-003', 1000, 25000),
('P3101042', 'B-006', 1000, 21000),
('P0102043', 'B-001', 1000, 20000),
('P0102043', 'B-002', 1000, 150000),
('P0102043', 'B-005', 1000, 120000),
('P0102043', 'B-003', 1000, 25000),
('P0102043', 'B-006', 1000, 20000),
('P0102043', 'B-004', 1000, 1000),
('P1406044', 'B-001', 1000, 15000000),
('P1406045', 'B-001', 500, 8000),
('P1606003', 'B-005', 1000, 21000),
('P2906004', 'B-005', 1000, 16000),
('P3006005', 'B-005', 1000, 15000),
('P1407006', 'B-001', 2000, 29000),
('P2807007', 'B-004', 1000, 3000),
('P2807008', 'B-007', 1, 32000);

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `kode_jual` varchar(10) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `total_jual` int(11) NOT NULL,
  `nama_konsumen` varchar(100) NOT NULL,
  `status_jual` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`kode_jual`, `tanggal_jual`, `total_jual`, `nama_konsumen`, `status_jual`) VALUES
('PJ2006002', '2020-06-16', 20000, 'Andri', 'Selesai'),
('PJ2006003', '2020-06-29', 38000, 'Firdaus', 'Selesai'),
('PJ2006004', '2020-06-30', 20000, 'Allen', 'Selesai'),
('PJ2007005', '2020-07-14', 40000, 'irfan', 'Selesai'),
('PJ2007006', '2020-07-14', 40000, 'andri', 'Selesai'),
('PJ2007007', '2020-07-27', 60000, 'Ipang', 'Selesai'),
('PJ2007008', '2020-07-27', 40000, 'Panji', 'Selesai'),
('PJ2007009', '2020-07-27', 60000, 'Gema', 'Selesai'),
('PJ2008010', '2020-08-06', 40000, 'lolo', 'Selesai'),
('PJ2008011', '2020-08-06', 40000, '123', 'Selesai'),
('PJ2008012', '2020-08-06', 40000, '123', 'Selesai'),
('PJ2008013', '2020-08-06', 100000, '123', 'Selesai'),
('PJ2008014', '2020-08-06', 40000, '12', 'Selesai'),
('PJ2008015', '2020-08-06', 40000, '123', 'Selesai'),
('PJ2008016', '2020-08-06', 20000, '456', 'Selesai'),
('PJ2008017', '2020-08-06', 60000, '123', 'Selesai'),
('PJ2008018', '2020-08-06', 40000, 'a', 'Selesai'),
('PJ2008019', '2020-08-07', 40000, 'Risa', 'Selesai'),
('PJ2006053', '2020-06-14', 40000, 'indra', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `jual_detail`
--

CREATE TABLE `jual_detail` (
  `kode_jual` varchar(10) NOT NULL,
  `kode_menu` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jual_detail`
--

INSERT INTO `jual_detail` (`kode_jual`, `kode_menu`, `jumlah`, `subtotal`) VALUES
('PJ1911033', 'M-002', 1, 20000),
('PJ1907003', 'M-001', 2, 30000),
('PJ1907004', 'M-002', 3, 60000),
('PJ1907005', 'M-001', 1, 15000),
('PJ1907006', 'M-001', 1, 15000),
('PJ1911033', 'M-001', 1, 20000),
('PJ1907008', 'M-002', 1, 20000),
('PJ1907009', 'M-001', 1, 15000),
('PJ1907010', 'M-001', 3, 45000),
('PJ1907011', 'M-001', 2, 30000),
('PJ1907012', 'M-001', 5, 100000),
('PJ1907013', 'M-001', 1, 20000),
('PJ1907014', 'M-002', 3, 60000),
('PJ1910015', 'M-001', 1, 20000),
('PJ1910015', 'M-002', 1, 20000),
('PJ1910016', 'M-001', 2, 40000),
('PJ1910016', 'M-002', 1, 20000),
('PJ1910017', 'M-001', 1, 20000),
('PJ1910018', 'M-003', 1, 20000),
('PJ1910019', 'M-006', 1, 21000),
('PJ1910020', 'M-003', 1, 20000),
('PJ1910021', 'M-002', 1, 20000),
('PJ1910022', 'M-004', 1, 15000),
('PJ1910023', 'M-004', 1, 15000),
('PJ1910024', 'M-003', 1, 20000),
('PJ1910025', 'M-001', 1, 20000),
('PJ1910026', 'M-003', 1, 20000),
('PJ1910027', 'M-006', 1, 21000),
('PJ1910028', 'M-001', 1, 20000),
('PJ1910029', 'M-001', 1, 20000),
('PJ1910030', 'M-004', 1, 15000),
('PJ1910031', 'M-001', 1, 20000),
('PJ1910032', 'M-001', 1, 20000),
('PJ1910033', 'M-001', 2, 40000),
('PJ1910034', 'M-001', 2, 40000),
('PJ1910035', 'M-001', 3, 60000),
('PJ2001034', 'M-001', 1, 20000),
('PJ2001034', 'M-002', 2, 40000),
('PJ2001034', 'M-005', 1, 18000),
('PJ2001035', 'M-002', 1, 20000),
('PJ2001035', 'M-001', 1, 20000),
('PJ2001036', 'M-001', 1, 20000),
('PJ2001036', 'M-005', 1, 18000),
('PJ2001037', 'M-001', 1, 20000),
('PJ2001038', 'M-005', 1, 18000),
('PJ2001039', 'M-001', 1, 20000),
('PJ2001040', 'M-001', 1, 20000),
('PJ2001040', 'M-003', 1, 20000),
('PJ2001041', 'M-001', 1, 20000),
('PJ2001042', 'M-001', 1, 20000),
('PJ2001043', 'M-003', 1, 20000),
('PJ2001044', 'M-001', 1, 20000),
('PJ2001045', 'M-001', 1, 20000),
('PJ2001046', 'M-003', 1, 20000),
('PJ2001047', 'M-002', 1, 20000),
('PJ2001048', 'M-005', 1, 18000),
('PJ2001049', 'M-002', 1, 20000),
('PJ2001050', 'M-005', 1, 18000),
('PJ2001051', 'M-003', 1, 20000),
('PJ2002052', 'M-001', 2, 40000),
('PJ2006053', 'M-004', 2, 40000),
('PJ2006002', 'M-004', 1, 20000),
('PJ2006003', 'M-004', 1, 20000),
('PJ2006003', 'M-005', 1, 18000),
('PJ2006004', 'M-001', 1, 20000),
('PJ2007005', 'M-004', 2, 40000),
('PJ2007006', 'M-004', 2, 40000),
('', 'M-003', 2, 40000),
('', 'M-001', 1, 20000),
('PJ2007007', 'M-001', 1, 20000),
('PJ2007007', 'M-002', 2, 40000),
('PJ2007008', 'M-003', 1, 20000),
('PJ2007008', 'M-001', 1, 20000),
('PJ2007009', 'M-001', 2, 40000),
('PJ2007009', 'M-002', 1, 20000),
('PJ2008010', 'M-001', 2, 40000),
('PJ2008011', 'M-001', 2, 40000),
('PJ2008012', 'M-001', 2, 40000),
('PJ2008013', 'M-001', 5, 100000),
('PJ2008014', 'M-001', 2, 40000),
('PJ2008015', 'M-001', 2, 40000),
('PJ2008016', 'M-001', 1, 20000),
('PJ2008017', 'M-001', 1, 20000),
('PJ2008017', 'M-001', 1, 20000),
('PJ2008017', 'M-001', 1, 20000),
('PJ2008019', 'M-001', 2, 40000),
('PJ2008018', 'M-001', 2, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `kode_menu` varchar(5) NOT NULL,
  `nama_menu` varchar(25) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`kode_menu`, `nama_menu`, `harga_menu`, `stok`) VALUES
('M-001', 'Mochaccino', 20000, 94),
('M-002', 'Cappucino', 20000, 7),
('M-003', 'Vietnam Drip', 20000, 4),
('M-005', 'Americano', 18000, 6),
('M-006', 'Espresso', 15000, 6),
('M-004', 'Es Kopi London', 20000, 8),
('M-007', 'Banana Milkshake', 18000, 5),
('M-008', 'Latte', 21000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `menu_bahan`
--

CREATE TABLE `menu_bahan` (
  `kode_menu` varchar(5) NOT NULL,
  `kode_bahan` varchar(5) NOT NULL,
  `jml` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_bahan`
--

INSERT INTO `menu_bahan` (`kode_menu`, `kode_bahan`, `jml`) VALUES
('M-001', 'B-003', 3),
('M-004', 'B-003', 3),
('M-001', 'B-001', 120),
('M-005', 'B-006', 27),
('M-005', 'B-007', 10),
('M-001', 'B-002', 20),
('M-003', 'B-002', 15),
('M-002', 'B-001', 120),
('M-006', 'B-006', 25),
('M-006', 'B-007', 14),
('M-002', 'B-002', 20),
('M-004', 'B-004', 66),
('M-003', 'B-001', 100),
('M-004', 'B-002', 18),
('M-004', 'B-001', 120),
('M-002', 'B-003', 3),
('M-008', 'B-006', 20),
('M-008', 'B-005', 15),
('M-008', 'B-001', 100);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(5) NOT NULL,
  `nama_supplier` varchar(35) NOT NULL,
  `telepon_supplier` varchar(13) NOT NULL,
  `alamat_supplier` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `telepon_supplier`, `alamat_supplier`) VALUES
('S-001', 'Erwin Roaster & Coffee', '085559077343', 'Bandung'),
('S-002', 'Gambung Coffee', '087822830700', 'Cimahi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `hak_akses` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama_user`, `hak_akses`) VALUES
('kasir', 'kasir', 'Agung', 'Kasir'),
('owner', 'owner', 'Oki Faisal', 'Owner'),
('admin', 'admin', 'Irfan', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`kode_bahan`);

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`kode_beli`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`kode_jual`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`kode_menu`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
