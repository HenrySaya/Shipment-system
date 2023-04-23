-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 04, 2023 at 11:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dispatchers`
--

-- --------------------------------------------------------

--
-- Table structure for table `addshipment`
--

CREATE TABLE `addshipment` (
  `idaddshipment` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `productdesc` varchar(255) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `shipmenttype` varchar(50) DEFAULT NULL,
  `itemtype` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `invoice` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addshipment`
--

INSERT INTO `addshipment` (`idaddshipment`, `username`, `productdesc`, `weight`, `shipmenttype`, `itemtype`, `address`, `status`, `invoice`) VALUES
(1, 'henry', 'laptops', '15.00', 'Express', 'fragile', 'Nairpbi', 'waiting for confirmation', '15000'),
(2, 'maddy', 'laptops', '15.00', 'Urgent', 'normal', 'Nairpbi', 'waiting for confirmation', ''),
(3, 'kahome', 'laptops', '15.00', 'Express', 'fragile', 'Nairpbi', 'waiting for confirmation', '');

-- --------------------------------------------------------

--
-- Table structure for table `cancellation`
--

CREATE TABLE `cancellation` (
  `idaddshipment` int(11) NOT NULL,
  `productdesc` varchar(255) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `shipmenttype` varchar(255) DEFAULT NULL,
  `itemtype` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `username`, `password`, `email`, `address`, `phone`) VALUES
(1, 'John Doe', 'johndoe', 'password123', 'johndoe@example.com', '123 Main St, Anytown, USA', '555-123-4567'),
(2, 'Jane Smith', 'janesmith', 'password456', 'janesmith@example.com', '456 Oak Ave, Anytown, USA', '555-987-6543'),
(3, 'Bob Johnson', 'bobjohnson', 'password789', 'bobjohnson@example.com', '789 Elm St, Anytown, USA', '555-555-5555');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('customer','admin','loader','shipper','courier') DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `role`, `password`, `password2`) VALUES
(1, 'henry', 'Henry Saya', 'customer', 'a7856ca12b26e4a7ff1ea3d161416882', NULL),
(6, 'james', 'James Andanje', 'admin', '934cb3f192a08f485628f81dcc6da83b', NULL),
(7, 'duduu', 'Adolph Duduu', 'courier', 'cd64cb6e1bc369319ef93a124ff434b5', NULL),
(8, 'khotsa', 'Fidel Khotsa', 'loader', '7f7296705d0370f444014f4adeceb520', NULL),
(9, 'kahome', 'Rhodine Kahome', 'shipper', '6c334238e9fd4f4c70f0436e39d52a5d', NULL),
(10, 'maddy', 'Alex Madollar', 'loader', '14f59531451838a3adf0ef0340d6d0be', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addshipment`
--
ALTER TABLE `addshipment`
  ADD PRIMARY KEY (`idaddshipment`);

--
-- Indexes for table `cancellation`
--
ALTER TABLE `cancellation`
  ADD PRIMARY KEY (`idaddshipment`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addshipment`
--
ALTER TABLE `addshipment`
  MODIFY `idaddshipment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cancellation`
--
ALTER TABLE `cancellation`
  MODIFY `idaddshipment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
