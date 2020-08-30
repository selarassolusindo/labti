-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2018 at 12:47 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seb`
--

-- --------------------------------------------------------

--
-- Table structure for table `formula`
--

CREATE TABLE `formula` (
  `id` int(11) NOT NULL,
  `bahan_formula1` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kebutuhan_bahan_formula1` double NOT NULL,
  `hasil_formula1` double NOT NULL,
  `bahan_formula2` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kebutuhan_bahan_formula2` double NOT NULL,
  `hasil_formula2` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `formula`
--

INSERT INTO `formula` (`id`, `bahan_formula1`, `kebutuhan_bahan_formula1`, `hasil_formula1`, `bahan_formula2`, `kebutuhan_bahan_formula2`, `hasil_formula2`) VALUES
(1, 'Sludge Paper', 21, 156, 'Sludge Paper', 21, 130),
(2, 'Avalan Karton', 4.5, 156, 'Avalan Karton', 3, 130),
(3, 'Avalan Gelondongan', 4.5, 156, 'Avalan Gelondongan', 3, 130),
(4, 'Duplek', 0, 156, 'Duplek', 3, 130);

-- --------------------------------------------------------

--
-- Table structure for table `hp_produksi`
--

CREATE TABLE `hp_produksi` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `formula` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `hpp` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hp_produksi`
--

INSERT INTO `hp_produksi` (`id`, `tanggal`, `formula`, `hpp`) VALUES
(7, '7/2/2018', 'formula 2', '307.35'),
(6, '6/2/2018', 'formula 1', '293.48'),
(8, '7/2/2018', 'formula 1', '157.16'),
(10, '6/2/2018', 'formula 2', '161.97'),
(11, '8/2/2018', 'formula 1', '400');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `sludge_paper` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_sp` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `avalan_karton` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_ak` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `avalan_gelondongan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_ag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `duplek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_duplek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `plastik_pembungkus` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_pp` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tali_rafia` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_tr` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kayu_bakar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_kb` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `borongan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_borongan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `harian` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_harian` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `bonus` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_bonus` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `listrik` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_listrik` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pemakaian_solar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_ps` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `transportasi` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_transportasi` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `solar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_solar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `muatan_colt_diesel` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jml_mcd` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `sludge_paper`, `jml_sp`, `avalan_karton`, `jml_ak`, `avalan_gelondongan`, `jml_ag`, `duplek`, `jml_duplek`, `plastik_pembungkus`, `jml_pp`, `tali_rafia`, `jml_tr`, `kayu_bakar`, `jml_kb`, `borongan`, `jml_borongan`, `harian`, `jml_harian`, `bonus`, `jml_bonus`, `listrik`, `jml_listrik`, `pemakaian_solar`, `jml_ps`, `transportasi`, `jml_transportasi`, `solar`, `jml_solar`, `muatan_colt_diesel`, `jml_mcd`) VALUES
(6, '400', '2', '4000', '2', '1500', '2', '2000', '2', '500', '2', '10000', '2', '850000', '2', '5000', '2', '84000', '2', '1500', '2', '25000000', '2', '120', '2', '180000', '2', '5500', '2', '400', '2'),
(7, '200', '3', '1500', '3', '2000', '3', '500', '3', '3000', '3', '600', '3', '1400', '3', '700', '3', '200', '3', '500', '3', '600', '3', '100', '3', '400', '3', '500', '3', '900', '3');

-- --------------------------------------------------------

--
-- Table structure for table `t_ampas_keluar`
--

CREATE TABLE `t_ampas_keluar` (
  `id_ampas_keluar` int(255) NOT NULL,
  `berat_ampas_keluar` varchar(255) DEFAULT NULL,
  `biner_ampas_keluar` varchar(255) DEFAULT NULL,
  `desimal_ampas_keluar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_ampas_keluar`
--

INSERT INTO `t_ampas_keluar` (`id_ampas_keluar`, `berat_ampas_keluar`, `biner_ampas_keluar`, `desimal_ampas_keluar`) VALUES
(1, '1500', '0001', '1.0'),
(2, '1812.777778\r\n', '0010', '10.0'),
(3, '2125.555556\r\n', '0011 ', '11.0'),
(4, '2438.333333\r\n', '0100', '100.0'),
(5, '2751.111111\r\n', '0101', '101.0'),
(6, '3063.888889\r\n', '0110', '110.0'),
(7, '3376.666667\r\n', '111\r\n', '111.0'),
(8, '3689.444444\r\n', '1000\r\n', '1000.0'),
(9, '4002.222222\r\n', '1001\r\n', '1001.0'),
(10, '4315\r\n', '1010\r\n', '1010.0');

-- --------------------------------------------------------

--
-- Table structure for table `t_ampas_masuk`
--

CREATE TABLE `t_ampas_masuk` (
  `id_ampas_masuk` int(11) NOT NULL,
  `berat_ampas_masuk` varchar(255) DEFAULT NULL,
  `biner_ampas_masuk` varchar(255) DEFAULT NULL,
  `desimal_ampas_masuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_ampas_masuk`
--

INSERT INTO `t_ampas_masuk` (`id_ampas_masuk`, `berat_ampas_masuk`, `biner_ampas_masuk`, `desimal_ampas_masuk`) VALUES
(1, '17740\r\n', '0001', '1.0'),
(2, '19180\r\n', '0010', '10.0'),
(3, '20620\r\n', '0011', '11.0'),
(4, '22060\r\n', '0100', '100.0'),
(5, '23500\r\n', '0101', '101.0'),
(6, '24940\r\n', '0110', '110.0'),
(7, '26380\r\n', '0111', '111.0'),
(8, '27820\r\n', '1000', '1000.0'),
(9, '29260\r\n', '1001', '1001.0'),
(10, '30700\r\n', '1010', '1010.0');

-- --------------------------------------------------------

--
-- Table structure for table `t_ampas_sisa`
--

CREATE TABLE `t_ampas_sisa` (
  `id_ampas_sisa` int(255) NOT NULL,
  `berat_ampas_sisa` varchar(255) DEFAULT NULL,
  `biner_ampas_sisa` varchar(255) DEFAULT NULL,
  `desimal_ampas_sisa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_ampas_sisa`
--

INSERT INTO `t_ampas_sisa` (`id_ampas_sisa`, `berat_ampas_sisa`, `biner_ampas_sisa`, `desimal_ampas_sisa`) VALUES
(1, '1500', '0001', '1.0'),
(2, '5575.550889', '0010', '10.0'),
(3, '9651.101778', '0011', '11.0'),
(4, '13726.65267', '0100', '100.0'),
(5, '17802.20356', '0101', '101.0'),
(6, '21877.75444', '0110', '110.0'),
(7, '25953.30533', '0111', '111.0'),
(8, '30028.85622', '1000', '1000.0'),
(9, '34104.40711', '1001', '1001.0'),
(10, '38179.958', '1010', '1010.0');

-- --------------------------------------------------------

--
-- Table structure for table `t_gelondongan_keluar`
--

CREATE TABLE `t_gelondongan_keluar` (
  `id_gelondongan_keluar` int(255) NOT NULL,
  `berat_gelondongan_keluar` varchar(255) DEFAULT NULL,
  `biner_gelondongan_keluar` varchar(255) DEFAULT NULL,
  `desimal_gelondongan_keluar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gelondongan_keluar`
--

INSERT INTO `t_gelondongan_keluar` (`id_gelondongan_keluar`, `berat_gelondongan_keluar`, `biner_gelondongan_keluar`, `desimal_gelondongan_keluar`) VALUES
(1, '342', '0001', '1.0'),
(2, '404.2222222', '0010', '10.0'),
(3, '466.4444444', '0011', '11.0'),
(4, '528.6666667', '0100', '100.0'),
(5, '590.8888889', '0101', '101.0'),
(6, '653.1111111', '0110', '110.0'),
(7, '715.3333333', '0111', '111.0'),
(8, '777.5555556', '1000', '1000.0'),
(9, '839.7777778', '1001', '1001.0'),
(10, '902', '1010', '1010.0');

-- --------------------------------------------------------

--
-- Table structure for table `t_gelondongan_masuk`
--

CREATE TABLE `t_gelondongan_masuk` (
  `id_gelondongan_masuk` int(255) NOT NULL,
  `berat_gelodongan_masuk` varchar(255) DEFAULT NULL,
  `biner_gelondongan_masuk` varchar(255) DEFAULT NULL,
  `desimal_gelondongan_masuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gelondongan_masuk`
--

INSERT INTO `t_gelondongan_masuk` (`id_gelondongan_masuk`, `berat_gelodongan_masuk`, `biner_gelondongan_masuk`, `desimal_gelondongan_masuk`) VALUES
(1, '900', '0001', '1.0'),
(2, '1263.333333', '0010', '10.0'),
(3, '1626.666667', '0011', '11.0'),
(4, '1990', '0100', '100.0'),
(5, '2353.333333', '0101', '101.0'),
(6, '2716.666667', '0110', '110.0'),
(7, '3080', '0111', '111.0'),
(8, '3443.333333', '1000', '1000.0'),
(9, '3806.666667', '1001', '1001.0'),
(10, '4170', '1010', '1010.0');

-- --------------------------------------------------------

--
-- Table structure for table `t_gelondongan_sisa`
--

CREATE TABLE `t_gelondongan_sisa` (
  `id_gelondongan_sisa` int(255) NOT NULL,
  `berat_gelondongan_sisa` varchar(255) DEFAULT NULL,
  `biner_gelondongan_sisa` varchar(255) DEFAULT NULL,
  `desimal_gelondongan_sisa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gelondongan_sisa`
--

INSERT INTO `t_gelondongan_sisa` (`id_gelondongan_sisa`, `berat_gelondongan_sisa`, `biner_gelondongan_sisa`, `desimal_gelondongan_sisa`) VALUES
(1, '488', '0001', '1.0'),
(2, '1069.444444', '0010', '10.0'),
(3, '1650.888889', '0011', '11.0'),
(4, '2232.333333', '0100', '100.0'),
(5, '2813.777778', '0101', '101.0'),
(6, '3395.222222', '0110', '110.0'),
(7, '3976.666667', '0111', '111.0'),
(8, '4558.111111', '1000', '1000.0'),
(9, '5139.555556', '1001', '1001.0'),
(10, '5721', '1010', '1010.0');

-- --------------------------------------------------------

--
-- Table structure for table `t_karton_keluar`
--

CREATE TABLE `t_karton_keluar` (
  `id_karton_keluar` int(255) NOT NULL,
  `berat_karton_keluar` varchar(255) DEFAULT NULL,
  `biner_karton_keluar` varchar(255) DEFAULT NULL,
  `desimal_karton_keluar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_karton_keluar`
--

INSERT INTO `t_karton_keluar` (`id_karton_keluar`, `berat_karton_keluar`, `biner_karton_keluar`, `desimal_karton_keluar`) VALUES
(1, '352', '0001', '1.0'),
(2, '458', '0010', '10.0'),
(3, '564', '0011', '11.0'),
(4, '670', '0100', '100.0'),
(5, '776', '0101', '101.0'),
(6, '882', '0110', '110.0'),
(7, '988', '0111', '111.0'),
(8, '1094', '1000', '1000.0'),
(9, '1200', '1001', '1001.0'),
(10, '1306', '1010', '1010.0');

-- --------------------------------------------------------

--
-- Table structure for table `t_karton_masuk`
--

CREATE TABLE `t_karton_masuk` (
  `id_karton_masuk` int(255) NOT NULL,
  `berat_karton_masuk` varchar(255) DEFAULT NULL,
  `biner_karton_masuk` varchar(255) DEFAULT NULL,
  `desimal_karton_masuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_karton_masuk`
--

INSERT INTO `t_karton_masuk` (`id_karton_masuk`, `berat_karton_masuk`, `biner_karton_masuk`, `desimal_karton_masuk`) VALUES
(1, '220', '0001', '1.0'),
(2, '793.3333333', '0010', '10.0'),
(3, '1366.666667', '0011', '11.0'),
(4, '1940', '0100', '100.0'),
(5, '2513.333333', '0101', '101.0'),
(6, '3086.666667', '0110', '110.0'),
(7, '3660', '0111', '111.0'),
(8, '4233.333333', '1000', '1000.0'),
(9, '4806.666667', '1001', '1001.0'),
(10, '5380', '1010', '1010.0');

-- --------------------------------------------------------

--
-- Table structure for table `t_karton_sisa`
--

CREATE TABLE `t_karton_sisa` (
  `id_karton_sisa` int(11) NOT NULL,
  `berat_karton_sisa` varchar(255) DEFAULT NULL,
  `biner_karton_sisa` varchar(255) DEFAULT NULL,
  `desimal_karton_sisa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_karton_sisa`
--

INSERT INTO `t_karton_sisa` (`id_karton_sisa`, `berat_karton_sisa`, `biner_karton_sisa`, `desimal_karton_sisa`) VALUES
(1, '9358', '0001', '1.0'),
(2, '10089.77778', '0010', '10.0'),
(3, '10821.55556', '0011', '11.0'),
(4, '11553.33333', '0100', '100.0'),
(5, '12285.11111', '0101', '101.0'),
(6, '13016.88889', '0110', '110.0'),
(7, '13748.66667', '0111', '111.0'),
(8, '14480.44444', '1000', '1000.0'),
(9, '15212.22222', '1001', '1001.0'),
(10, '15944', '1010', '1010.0');

-- --------------------------------------------------------

--
-- Table structure for table `t_lem`
--

CREATE TABLE `t_lem` (
  `id_lem` int(255) NOT NULL,
  `berat_lem` varchar(255) DEFAULT NULL,
  `biner_lem` varchar(255) DEFAULT NULL,
  `desimal_lem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_lem`
--

INSERT INTO `t_lem` (`id_lem`, `berat_lem`, `biner_lem`, `desimal_lem`) VALUES
(1, '23', '0001', '1.0'),
(2, '26.94444444', '0010', '10.0'),
(3, '30.88888889', '0011', '11.0'),
(4, '34.83333333', '0100', '100.0'),
(5, '38.77777778', '0101', '101.0'),
(6, '42.72222222', '0110', '110.0'),
(7, '46.66666667', '0111', '111.0'),
(8, '50.61111111', '1000', '1000.0'),
(9, '54.55555556', '1001', '1001.0'),
(10, '58.5', '1010', '1010.0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formula`
--
ALTER TABLE `formula`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hp_produksi`
--
ALTER TABLE `hp_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_ampas_keluar`
--
ALTER TABLE `t_ampas_keluar`
  ADD PRIMARY KEY (`id_ampas_keluar`);

--
-- Indexes for table `t_ampas_masuk`
--
ALTER TABLE `t_ampas_masuk`
  ADD PRIMARY KEY (`id_ampas_masuk`);

--
-- Indexes for table `t_ampas_sisa`
--
ALTER TABLE `t_ampas_sisa`
  ADD PRIMARY KEY (`id_ampas_sisa`);

--
-- Indexes for table `t_gelondongan_keluar`
--
ALTER TABLE `t_gelondongan_keluar`
  ADD PRIMARY KEY (`id_gelondongan_keluar`);

--
-- Indexes for table `t_gelondongan_masuk`
--
ALTER TABLE `t_gelondongan_masuk`
  ADD PRIMARY KEY (`id_gelondongan_masuk`);

--
-- Indexes for table `t_gelondongan_sisa`
--
ALTER TABLE `t_gelondongan_sisa`
  ADD PRIMARY KEY (`id_gelondongan_sisa`);

--
-- Indexes for table `t_karton_keluar`
--
ALTER TABLE `t_karton_keluar`
  ADD PRIMARY KEY (`id_karton_keluar`);

--
-- Indexes for table `t_karton_masuk`
--
ALTER TABLE `t_karton_masuk`
  ADD PRIMARY KEY (`id_karton_masuk`);

--
-- Indexes for table `t_karton_sisa`
--
ALTER TABLE `t_karton_sisa`
  ADD PRIMARY KEY (`id_karton_sisa`);

--
-- Indexes for table `t_lem`
--
ALTER TABLE `t_lem`
  ADD PRIMARY KEY (`id_lem`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hp_produksi`
--
ALTER TABLE `hp_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_ampas_keluar`
--
ALTER TABLE `t_ampas_keluar`
  MODIFY `id_ampas_keluar` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_ampas_masuk`
--
ALTER TABLE `t_ampas_masuk`
  MODIFY `id_ampas_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_ampas_sisa`
--
ALTER TABLE `t_ampas_sisa`
  MODIFY `id_ampas_sisa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_gelondongan_masuk`
--
ALTER TABLE `t_gelondongan_masuk`
  MODIFY `id_gelondongan_masuk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_gelondongan_sisa`
--
ALTER TABLE `t_gelondongan_sisa`
  MODIFY `id_gelondongan_sisa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_karton_keluar`
--
ALTER TABLE `t_karton_keluar`
  MODIFY `id_karton_keluar` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_karton_masuk`
--
ALTER TABLE `t_karton_masuk`
  MODIFY `id_karton_masuk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_karton_sisa`
--
ALTER TABLE `t_karton_sisa`
  MODIFY `id_karton_sisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_lem`
--
ALTER TABLE `t_lem`
  MODIFY `id_lem` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
