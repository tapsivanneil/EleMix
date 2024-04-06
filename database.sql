-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 01:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elemix`
--

-- --------------------------------------------------------

--
-- Table structure for table `combinations`
--

CREATE TABLE `combinations` (
  `id` int(10) NOT NULL,
  `element_1` varchar(250) DEFAULT NULL,
  `subscript_1` int(10) DEFAULT NULL,
  `element_2` varchar(250) DEFAULT NULL,
  `subscript_2` int(10) DEFAULT NULL,
  `combination` varchar(250) DEFAULT NULL,
  `combination_name` varchar(250) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `combinations`
--

INSERT INTO `combinations` (`id`, `element_1`, `subscript_1`, `element_2`, `subscript_2`, `combination`, `combination_name`, `source`) VALUES
(1, 'Al', 3, 'Br', -1, 'AlBr3', 'Aluminum Bromide', 'assets/gif/AlBr3.gif'),
(2, 'Cd', 1, 'S', -1, 'CdS', 'Cadium Sulfide', 'assets/gif/CdS.gif'),
(3, 'H', 1, 'Cl', -1, 'HCl', 'Hydrochloric Acid', 'assets/gif/HCl.gif'),
(4, 'Na', 1, 'Cl', -1, 'NaCl', 'Sodium Chloride', 'assets/gif/NaCl.gif'),
(5, 'Ag', 1, 'Cl', -1, 'AgCl', 'Silver Chloride', 'assets/gif/AgCl.gif'),
(6, 'Hg', 2, 'O', -2, 'HgO', 'Mercuric Oxide', 'assets/gif/HgO.gif'),
(7, 'Pb', 2, 'I', 1, 'PbI2', 'Lead Iodide', 'assets/gif/PbI2.gif'),
(8, 'Ni', 2, 'Cl', -1, 'NiCl2', 'Nickel Chloride', 'assets/gif/NiCl2.gif'),
(9, 'P', 5, 'Br', -1, 'PBr5', 'Phosporus Pentabromide', 'assets/gif/PBr5.gif'),
(10, 'Cd', 2, 'Se', -2, 'CdSe', 'Ammonia', 'assets/gif/CdSe.gif');

-- --------------------------------------------------------

--
-- Table structure for table `elements`
--

CREATE TABLE `elements` (
  `id` int(10) NOT NULL,
  `symbol` varchar(250) DEFAULT NULL,
  `element_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elements`
--

INSERT INTO `elements` (`id`, `symbol`, `element_name`) VALUES
(1, 'AlBr3', 'Aluminum Bromide'),
(2, 'CdS', 'Cadmium Sulfide'),
(3, 'HCl', 'Hydrochloric Acid'),
(4, 'NaCl', 'Sodium Chloride'),
(5, 'AgCl', 'Silver Chloride'),
(6, 'HgO', 'Mercuric Oxide'),
(7, 'PbI2', 'Lead Iodide'),
(8, 'NiCl2', 'Nickel Chloride'),
(9, 'PBr5', 'Phosphorus Pentabromide'),
(10, 'CdSe', 'Cadmium Selenide');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `combinations`
--
ALTER TABLE `combinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `combinations`
--
ALTER TABLE `combinations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
