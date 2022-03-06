-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 02:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ambulance`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `patient` varchar(200) NOT NULL,
  `driver` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `price` bigint(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `travelon` datetime NOT NULL,
  `droploc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`patient`, `driver`, `address`, `price`, `status`, `travelon`, `droploc`) VALUES
('Gau@gmail.com', 'driver1@gmail.com', '107,25th cross,BSK 2nd bangalore-70', 900, 'Completed', '0000-00-00 00:00:00', ''),
('suma@gmail.com', 'driver2@gmail.com', '108,25th cross,BSK 2nd bangalore-70', 900, 'Booked', '0000-00-00 00:00:00', ''),
('suma@gmail.com', 'driver2@gmail.com', 'BSK 2nd stage', 900, 'Booked', '2022-02-07 16:55:00', 'Basaveshwara nagar bangalore'),
('driver1@gmail.com', 'driver4@gmail.com', '', 900, 'Booked', '0000-00-00 00:00:00', ''),
('Gau@gmail.com', 'driver1@gmail.com', '', 900, 'Completed', '0000-00-00 00:00:00', ''),
('Gau@gmail.com', 'driver1@gmail.com', 'BSK 2nd stage', 900, 'Completed', '2022-02-12 23:14:00', 'Basaveshwara nagar bangalore'),
('Gau@gmail.com', 'driver1@gmail.com', '107,25th cross,BSK 2nd bangalore-70', 500, 'Booked', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `Mail` varchar(200) NOT NULL,
  `Vehicle` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Price` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`Mail`, `Vehicle`, `Status`, `Price`) VALUES
('driver1@gmail.com', 'KA51EN8633', 'Activated', 500),
('driver2@gmail.com', 'ka05sh1234', 'Activated', 500),
('driver3@gmail.com', 'ka09en1354', 'Activated', 500),
('driver4@gmail.com', 'Ka12js7648', 'Activated', 500),
('Gunda@gmail.com', 'KA12JS7648', 'Activated', 600);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Name` varchar(100) NOT NULL,
  `Mail` varchar(200) NOT NULL,
  `Mobile` bigint(10) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Name` varchar(100) NOT NULL,
  `Mail` varchar(200) NOT NULL,
  `Mobile` bigint(10) NOT NULL,
  `Acctype` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `Mail`, `Mobile`, `Acctype`, `Password`, `Address`) VALUES
('Admin', 'admin@gmail.com', 1234567890, 'Admin', '$2y$10$wZB3YWb.ExOTbguZJtQMYevioOPjxgDryn6rX8QH4hEofUv0oWocu', ''),
('Driver1 ', 'driver1@gmail.com', 1234567891, 'User', '$2y$10$wZB3YWb.ExOTbguZJtQMYevioOPjxgDryn6rX8QH4hEofUv0oWocu', ''),
('Driver2', 'driver2@gmail.com', 9965258763, 'User', '$2y$10$wZB3YWb.ExOTbguZJtQMYevioOPjxgDryn6rX8QH4hEofUv0oWocu', '108,25th cross,BSK 2nd bangalore-70'),
('Driver3', 'driver3@gmail.com', 1234563584, 'User', '$2y$10$wZB3YWb.ExOTbguZJtQMYevioOPjxgDryn6rX8QH4hEofUv0oWocu', ''),
('Driver4', 'driver4@gmail.com', 8746084206, 'User', '$2y$10$wZB3YWb.ExOTbguZJtQMYevioOPjxgDryn6rX8QH4hEofUv0oWocu', ''),
('Gaurav', 'Gau@gmail.com', 886733582, 'User', '$2y$10$i7GMt7T6DQILtmDuzOAkwO0qk62MPbNx69cNdklTISp4/6yExfSPK', '107,25th cross,BSK 2nd bangalore-70'),
('Skanda', 'Gunda@gmail.com', 9966558844, 'User', '$2y$10$WAk4TrXc6Y7Xd0svqitzd.OIYC4u49qO.MSaDo6y6KUFyi1kLyb7q', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
