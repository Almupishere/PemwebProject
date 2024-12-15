-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2024 at 06:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `re4`
--

-- --------------------------------------------------------

--
-- Table structure for table `senjata`
--

CREATE TABLE `senjata` (
  `id` int NOT NULL,
  `nama_senjata` varchar(255) NOT NULL,
  `gambar_senjata` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `senjata`
--

INSERT INTO `senjata` (`id`, `nama_senjata`, `gambar_senjata`, `deskripsi`) VALUES
(1, 'Handgun', 'handgun.jpg', 'Senjata api ringan yang efektif untuk tembakan cepat dan akurat. Cocok untuk pertempuran jarak dekat.'),
(2, 'Shotgun', 'shotgun.jpg', 'Senjata jarak dekat yang kuat, efektif untuk menghancurkan musuh yang mendekat dengan cepat.'),
(3, 'Rifle', 'rifle.jpg', 'Senjata jarak jauh dengan presisi tinggi. Memiliki daya tembak yang kuat untuk musuh jarak jauh.'),
(4, 'Rocket Launcher', 'rocket_launcher.jpg', 'Senjata besar yang dapat menghancurkan musuh besar dengan satu tembakan. Diperlukan untuk pertempuran besar.'),
(5, 'Knife', 'knife.jpg', 'Senjata tajam yang efektif untuk pertahanan diri. Bisa digunakan untuk membunuh musuh dalam jarak dekat.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `senjata`
--
ALTER TABLE `senjata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `senjata`
--
ALTER TABLE `senjata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
