-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2025 at 01:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opc-p3-contact-manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone_number` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone_number`) VALUES
(1, 'Gandalf le gris', 'gandalf@istari.com', '0785 00 96 04'),
(2, 'Buffy Summer', 'buffy@sunnydale.com', '0632 02 45 31'),
(3, 'Hermione Granger', 'hermione@hogwarts.com', '0683 55 37 42'),
(4, 'Aragorn Elessar', 'aragorn@gondor.gov', '0756 11 42 09'),
(5, 'Lara Croft', 'lara@raider.co', '0698 77 32 15'),
(6, 'Tony Stark', 'tony@starkindustries.com', '0644 21 53 80'),
(7, 'Daenerys Targaryen', 'daenerys@dragonmail.com', '0739 14 92 33'),
(8, 'Luke Skywalker', 'luke@rebellion.org', '0621 49 63 08'),
(9, 'Walter White', 'walter@abqlab.net', '0782 90 41 17'),
(10, 'Selina Kyle', 'selina@gothamnet.com', '0677 58 29 44'),
(11, 'Jean-Luc Picard', 'picard@starfleet.ufp', '0651 12 74 20'),
(12, 'Katniss Everdeen', 'katniss@district12.gov', '0723 08 56 92'),
(13, 'Sherlock Holmes', 'sherlock@bakerstreet.uk', '0794 65 00 73'),
(14, 'Frodo Baggins', 'frodo@shiremail.me', '0635 82 10 54'),
(15, 'Diana Prince', 'diana@themyscira.org', '0790 34 88 19'),
(16, 'Mario Mario', 'mario@nintendoland.jp', '0689 50 73 61'),
(17, 'Trinity Anderson', 'trinity@zion.net', '0763 27 94 05'),
(18, 'Elizabeth Bennet', 'elizabeth@longbourn.uk', '0742 99 13 48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
