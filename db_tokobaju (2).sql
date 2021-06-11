-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 04:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokobaju`
--

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id_konten` int(25) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id_konten`, `judul`, `isi`) VALUES
(1, 'Hallo Selamat Datang ', 'Selamat daatang kembali, ini dashboard anda ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`, `image`) VALUES
(1, 'Syifara Dhetra Alfadjar', 'admin', '21232f297a57a5a743894a0e4a801fc3', '082313374864', 'syifaradhetra@gmail.com', 'jl.Taman Bunga Merak No.48 Malang', 'user1622392833.png'),
(2, 'm', 'salnanssa', 'd41d8cd98f00b204e9800998ecf8427e', '081234535711', 'amarkhabiir@gmail.com', 'jl asudhasda', 'user1622347918.jpg'),
(4, 'manuk', 'salnan', '76d80224611fc919a5d54f0ff9fba446', '098753421', 'amarkhabiir@gmail.com', '081249261162', 'produk1622347836.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(2, 'Kaos'),
(5, 'Dres'),
(7, 'Celana'),
(9, 'Baju Tidur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `produk_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `id_size` int(25) NOT NULL,
  `produk_name` varchar(100) NOT NULL,
  `produk_price` int(11) NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `produk_image` varchar(100) NOT NULL,
  `produk_status` tinyint(1) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `category_id`, `id_size`, `produk_name`, `produk_price`, `produk_deskripsi`, `produk_image`, `produk_status`, `data_created`) VALUES
(43, 2, 2, 'kaos oblong', 50000, '<p>Hitam Motif</p>\r\n', 'produk1622388733.jpg', 1, '2021-05-29 07:32:42'),
(44, 5, 0, 'Dress motif bunga', 100000, '<p>Kain tebal&nbsp;</p>\r\n', 'produk1622388689.jpg', 1, '2021-05-29 07:32:42'),
(45, 7, 1, 'celana coklat pendek', 90000, '<p>Bahan tebal&nbsp;</p>\r\n', 'produk1622388422.jpg', 1, '2021-05-29 07:32:42'),
(46, 9, 1, 'Daster', 30000, '<p>Kain adem dan nyaman</p>\r\n', 'produk1622388372.jpg', 0, '2021-05-29 07:32:42'),
(47, 2, 1, 'Kaos couple', 80000, '<p>Tie Die warna pink</p>\r\n', 'produk1622389571.png', 1, '2021-05-30 15:46:11'),
(48, 5, 0, 'Gamis ', 90000, '<p>motif polos</p>\r\n', 'produk1622389672.jpg', 1, '2021-05-30 15:47:52'),
(49, 2, 2, 'Lorek', 45000, '<p>Lengan panjang dan tidak gampang melar</p>\r\n', 'produk1622389721.jpg', 0, '2021-05-30 15:48:42'),
(50, 9, 1, 'piyama pendek', 40000, '<p>polkadot pink kain adem</p>\r\n', 'produk1622389769.jpg', 0, '2021-05-30 15:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_produk`
--

CREATE TABLE `ukuran_produk` (
  `id_size` int(25) NOT NULL,
  `size` varchar(25) NOT NULL,
  `panjang` int(100) NOT NULL,
  `lebar` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran_produk`
--

INSERT INTO `ukuran_produk` (`id_size`, `size`, `panjang`, `lebar`) VALUES
(0, 's', 50, 22),
(1, 'm', 50, 22),
(2, 'L', 54, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `id_size` (`id_size`);

--
-- Indexes for table `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  ADD PRIMARY KEY (`id_size`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  MODIFY `id_size` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`),
  ADD CONSTRAINT `tb_produk_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `ukuran_produk` (`id_size`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
