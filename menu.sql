-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2025 at 03:19 PM
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
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` enum('veg','nonveg','drinks','desserts') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(1, 'Paneer Butter Masala', 'Rich creamy curry made with paneer and spices.', 199.00, 'paneer_butter_masala.jpg', 'veg'),
(2, 'Veg Biryani', 'Aromatic rice cooked with vegetables and Indian spices.', 180.00, 'veg_biryani.jpg', 'veg'),
(3, 'Masala Dosa', 'Crispy dosa stuffed with spiced potato filling.', 120.00, 'masala_dosa.jpg', 'veg'),
(4, 'Chicken Biryani', 'Flavorful basmati rice layered with tender chicken.', 220.00, 'chicken_biryani.jpg', 'nonveg'),
(5, 'Grilled Chicken', 'Juicy chicken grilled to perfection with herbs.', 250.00, 'grilled_chicken.jpg', 'nonveg'),
(6, 'Fish Curry', 'Spicy and tangy coastal fish curry.', 230.00, 'fish_curry.jpg', 'nonveg'),
(7, 'Mango Lassi', 'Refreshing yogurt-based mango drink.', 80.00, 'mango_lassi.jpg', 'drinks'),
(8, 'Cold Coffee', 'Chilled coffee topped with whipped cream.', 100.00, 'cold_coffee.jpg', 'drinks'),
(9, 'Lemon Soda', 'Tangy soda drink with lemon and mint.', 70.00, 'lemon_soda.jpg', 'drinks'),
(10, 'Gulab Jamun', 'Soft fried dough balls soaked in sugar syrup.', 90.00, 'gulab_jamun.jpg', 'desserts'),
(11, 'Chocolate Brownie', 'Warm chocolate brownie served with ice cream.', 150.00, 'chocolate_brownie.jpg', 'desserts'),
(12, 'Ice Cream Sundae', 'A scoop of ice cream topped with syrup and nuts.', 130.00, 'ice_cream_sundae.jpg', 'desserts'),
(13, 'Mutton Curry', 'a flavorful, tender meat dish of goat or lamb cooked in a rich, spiced gravy, with regional variations across the Indian subcontinent and Caribbean', 300.00, 'mutton_curry.jpg', 'nonveg'),
(14, 'Mozzarella Pizza', 'Fresh mozzarella, basil & tomato sauce', 199.00, 'pizza.jpg', 'veg'),
(15, 'Classic Burger', 'Juicy beef patty, lettuce, cheese & sauce', 149.00, 'burger.jpg', 'nonveg'),
(16, 'Creamy Pasta', 'Penne pasta tossed with Alfredo sauce', 179.00, 'pasta.jpg', 'veg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
