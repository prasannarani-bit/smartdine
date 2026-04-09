-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2025 at 03:54 PM
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
-- Database: `smartdine`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `table_number` int(11) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `order_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_name`, `phone`, `table_number`, `payment_method`, `total_amount`, `delivery_address`, `order_time`) VALUES
(1, 'ramya', '8692453214', NULL, 'Cash on Delivery', 150.00, NULL, '2025-11-13 21:05:07'),
(2, 'prasanna', '8692453214', 1, 'Cash', 130.00, NULL, '2025-11-13 21:34:47'),
(3, 'prasanna', '8692453214', 1, 'Cash', 130.00, NULL, '2025-11-13 21:35:19'),
(4, 'prasanna', '8692453214', 1, 'Cash', 130.00, NULL, '2025-11-13 21:42:08'),
(5, 'ramya', '8692453214', 1, 'Cash', 130.00, NULL, '2025-11-13 21:50:29'),
(6, 'prasanna', '8692453214', 2, 'Cash', 180.00, NULL, '2025-11-13 22:08:31'),
(7, 'ramya', '8692453214', 2, 'Cash', 199.00, NULL, '2025-11-13 22:11:11'),
(8, 'prasanna', '8692453214', 1, 'Cash', 160.00, NULL, '2025-11-13 23:32:24'),
(9, 'prasanna', '8692453214', NULL, 'Cash on Delivery', 70.00, NULL, '2025-11-13 23:43:56'),
(10, 'yamini', '8692453214', NULL, 'Cash', 120.00, 'vzm', '2025-11-13 23:44:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
