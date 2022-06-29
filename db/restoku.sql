-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 06:36 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `level` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `name`, `username`, `email`, `password`, `telepon`, `gambar`, `status`, `level`) VALUES
(73, 'Restoku', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '086123451351', '1.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_favorit`
--

CREATE TABLE `tb_favorit` (
  `id_favorit` int(30) NOT NULL,
  `nama_favorit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_favorit`
--

INSERT INTO `tb_favorit` (`id_favorit`, `nama_favorit`) VALUES
(1, 'makanan favorit'),
(2, 'minuman'),
(3, 'snack'),
(4, 'umum');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jnsmakanan`
--

CREATE TABLE `tb_jnsmakanan` (
  `id_jenis` int(11) NOT NULL,
  `jenis_makanan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jnsmakanan`
--

INSERT INTO `tb_jnsmakanan` (`id_jenis`, `jenis_makanan`) VALUES
(1, 'Ayam'),
(2, 'Gurami'),
(3, 'Udang'),
(4, 'Daging'),
(5, 'Iga'),
(6, 'Nasgor dan Mie'),
(7, 'Sayur'),
(8, 'Lele');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(30) NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Snack');

-- --------------------------------------------------------

--
-- Table structure for table `tb_meja`
--

CREATE TABLE `tb_meja` (
  `id_meja` int(11) NOT NULL,
  `nama_meja` varchar(30) NOT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_meja`
--

INSERT INTO `tb_meja` (`id_meja`, `nama_meja`, `kapasitas`, `status`) VALUES
(1, 'GAKA 1', 8, 0),
(2, 'GAKA 2', 8, 0),
(3, 'GAKA 3', 4, 0),
(4, 'GAKA 4', 4, 0),
(18, 'GAKI 1A', 8, 0),
(19, 'GAKI 1', 4, 0),
(20, 'GAKI 2', 4, 0),
(21, 'GAKI 3', 4, 0),
(22, 'GAKI 4', 4, 0),
(24, 'GAKI 6', 4, 0),
(25, 'GAKI A', 4, 0),
(26, 'GAKI B', 4, 0),
(27, 'GAKI C', 8, 0),
(28, 'GAKI D', 4, 0),
(29, 'GABA 1', 4, 0),
(30, 'GABA 2', 4, 0),
(31, 'GABA 3', 4, 0),
(32, 'GABA 4', 8, 0),
(33, 'GABA 5', 4, 0),
(34, 'GABA 6', 8, 0),
(35, 'BT', 8, 0),
(36, 'BTT', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_favorit` int(11) DEFAULT NULL,
  `id_selera` int(11) DEFAULT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok_menu` int(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `id_kategori`, `id_favorit`, `id_selera`, `nama_menu`, `harga`, `stok_menu`, `gambar`) VALUES
(1, 1, 4, 15, 'Ayam Geprek', 16500, 8, 'Ayam_Geprek1.jpg'),
(2, 1, 1, 1, 'Iga Bakar', 35000, 4, 'Iga_Bakar.jpeg'),
(3, 1, 4, 11, 'Nasi Goreng', 12000, 8, 'Nasi_Goreng.jpg'),
(4, 1, 4, 10, 'Sop Ceker Ayam', 15000, 8, 'Sop_Ceker_Ayam.jpg'),
(5, 1, 4, 9, 'Udang Asam Manis', 15000, 7, 'Udang_Asam_Manis.jpg'),
(6, 1, 4, 8, 'Ayam Kremes', 12500, 8, 'Ayam_Kremes.jpg'),
(7, 1, 4, 12, 'Steak Daging Sapi', 40000, 5, 'Steak_Daging_Sapi.jpg'),
(8, 1, 4, 13, 'Cah Kangkung', 10000, 9, 'Cah_Kangkung.jpg'),
(9, 1, 1, 1, 'Gurame Bakar', 45000, 3, 'Gurame_Bakar.jpg'),
(10, 2, NULL, 16, 'Lemon Tea', 5000, 10, 'Lemon_Tea.jpeg'),
(11, 2, NULL, 16, 'Es Teh', 4000, 10, 'Es_Teh.jpeg'),
(12, 2, NULL, 16, 'Es Jeruk', 6000, 10, 'Es_Jeruk.jpeg'),
(13, 2, NULL, 18, 'Milk Shake Coklat', 11000, 9, 'Milk_Shake_Coklat.jpeg'),
(14, 2, NULL, 18, 'Bubble Ice Strawbery', 8000, 5, 'Bubble_Ice_Strawbery.jpeg'),
(15, 2, NULL, 16, 'Soda Gembira', 10000, 7, 'Soda_Gembira.jpeg'),
(16, 2, NULL, 23, 'Blue Ocean', 15000, 10, 'Blue_ocean.jpeg'),
(17, 2, NULL, 19, 'Sup Es Durian', 17000, 10, 'Sup_Es_Durian.jpeg'),
(18, 2, NULL, 16, 'Air Mineral', 3000, 20, 'Air_Mineral.jpeg'),
(19, 2, NULL, 18, 'Es Coklat', 12000, 10, 'Es_Coklat.jpeg'),
(20, 3, NULL, 18, 'Samosa', 10000, 10, 'Samosa.jpeg'),
(21, 3, 3, 17, 'Dimsum', 12000, 10, 'Dimsum.jpeg'),
(22, 3, 3, 17, 'Nugget', 10000, 10, 'nugget.jpeg'),
(23, 3, 3, 17, 'Nugget Pisang', 15000, 10, 'Nugget_Pisang.jpeg'),
(24, 3, 3, 17, 'Siomay Goreng', 15000, 10, 'Siomay_Goreng.jpeg'),
(25, 3, 3, 17, 'Kentang Goreng', 15000, 10, 'Kentang_Goreng.jpeg'),
(26, 3, 3, 17, 'Kulit Ayam Crispy', 20000, 10, 'Kulit_Ayam_Crispy.jpeg'),
(27, 3, 3, 17, 'Cornet Goreng', 18000, 10, 'Cornet_Goreng.jpeg'),
(28, 3, 3, 17, 'Sosis Goreng', 12000, 10, 'Sosis_Goreng.jpeg'),
(29, 3, 3, 17, 'Udang Rambutan', 15000, 10, 'Udang_Rambutan.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rasa`
--

CREATE TABLE `tb_rasa` (
  `id_rasa` int(11) NOT NULL,
  `id_selera` int(11) NOT NULL,
  `rasa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rasa`
--

INSERT INTO `tb_rasa` (`id_rasa`, `id_selera`, `rasa`) VALUES
(1, 1, 'Mercon'),
(2, 1, 'Madu'),
(3, 1, 'Asap'),
(4, 8, 'Kremes'),
(5, 8, 'Mercon'),
(6, 8, 'Tanpa Sambal'),
(7, 14, 'Asam manis'),
(8, 14, 'Asam pedas'),
(9, 1, 'Tampa bumbu'),
(10, 10, 'Original'),
(11, 10, 'Asam pedas'),
(12, 11, 'Mercon'),
(13, 11, 'Ayam sosis'),
(14, 11, 'Khas pawon ndeso'),
(15, 12, 'Original'),
(16, 12, 'Black paper'),
(17, 13, 'Saus tiram'),
(18, 13, 'Mercon'),
(19, 9, 'Mayonnaise'),
(20, 9, 'Goreng'),
(21, 15, 'Mercon'),
(22, 15, 'Original'),
(23, 15, 'Sambal pisah'),
(24, 16, '-'),
(25, 17, 'original'),
(26, 18, 'coklat'),
(27, 19, 'durian'),
(29, 23, 'soda'),
(30, 25, 'Stobery'),
(31, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_selera`
--

CREATE TABLE `tb_selera` (
  `id_selera` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `selera` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_selera`
--

INSERT INTO `tb_selera` (`id_selera`, `id_kategori`, `selera`) VALUES
(1, 1, 'Bakar'),
(8, 1, 'Goreng'),
(9, 1, 'Udang goreng'),
(10, 1, 'Sup'),
(11, 1, 'Nasi goreng'),
(12, 1, 'Panggang'),
(13, 1, 'Tumis'),
(14, 1, 'Asam'),
(15, 1, 'Penyet'),
(16, 2, 'Non-jus'),
(17, 3, 'Camilan'),
(18, 2, 'Jus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_transaksi` varchar(30) DEFAULT NULL,
  `meja` varchar(30) DEFAULT NULL,
  `pembeli` varchar(30) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `date_time` date NOT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `no_transaksi`, `meja`, `pembeli`, `total`, `status`, `date_time`, `time`) VALUES
(2, 'T200400001', 'GAKI B', 'Bagas', 130000, 3, '2020-01-04', '19:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_detail`
--

CREATE TABLE `tb_transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_detail`
--

INSERT INTO `tb_transaksi_detail` (`id_transaksi_detail`, `id_transaksi`, `bayar`, `diskon`, `kembalian`) VALUES
(1, 2, 200000, 0, 70000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_master`
--

CREATE TABLE `tb_transaksi_master` (
  `id_transaksi_master` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `menu` varchar(30) DEFAULT NULL,
  `selera` varchar(30) NOT NULL,
  `rasa` varchar(30) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `request` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_master`
--

INSERT INTO `tb_transaksi_master` (`id_transaksi_master`, `id_transaksi`, `menu`, `selera`, `rasa`, `id_kategori`, `jumlah`, `harga`, `subtotal`, `request`) VALUES
(3, 2, 'Iga Bakar', 'Bakar', 'Madu', 1, 1, 35000, 35000, ''),
(4, 2, 'Steak Daging Sapi', 'Panggang', 'Original', 1, 1, 40000, 40000, ''),
(5, 2, 'Cah Kangkung', 'Tumis', 'Saus tiram', 1, 1, 10000, 10000, ''),
(6, 2, 'Gurame Bakar', 'Bakar', 'Madu', 1, 1, 45000, 45000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `nama_user` varchar(20) DEFAULT NULL,
  `alamat_user` varchar(20) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_favorit`
--
ALTER TABLE `tb_favorit`
  ADD PRIMARY KEY (`id_favorit`);

--
-- Indexes for table `tb_jnsmakanan`
--
ALTER TABLE `tb_jnsmakanan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_meja`
--
ALTER TABLE `tb_meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_rasa`
--
ALTER TABLE `tb_rasa`
  ADD PRIMARY KEY (`id_rasa`);

--
-- Indexes for table `tb_selera`
--
ALTER TABLE `tb_selera`
  ADD PRIMARY KEY (`id_selera`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- Indexes for table `tb_transaksi_master`
--
ALTER TABLE `tb_transaksi_master`
  ADD PRIMARY KEY (`id_transaksi_master`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tb_favorit`
--
ALTER TABLE `tb_favorit`
  MODIFY `id_favorit` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jnsmakanan`
--
ALTER TABLE `tb_jnsmakanan`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_meja`
--
ALTER TABLE `tb_meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_rasa`
--
ALTER TABLE `tb_rasa`
  MODIFY `id_rasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_selera`
--
ALTER TABLE `tb_selera`
  MODIFY `id_selera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_transaksi_master`
--
ALTER TABLE `tb_transaksi_master`
  MODIFY `id_transaksi_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
