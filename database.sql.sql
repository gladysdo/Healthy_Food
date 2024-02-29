-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 04:27 PM
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
-- Database: `sweetfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`id`, `full_name`, `user_name`, `password`) VALUES
(2, 'aku', '123', 'd41d8cd98f00b204e9800998ecf8427e'),
(11, 'sweetfood', 'root', '202cb962ac59075b964b07152d234b70'),
(12, 'joy', 'root', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `table_foodgallary`
--

CREATE TABLE `table_foodgallary` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_foodgallary`
--

INSERT INTO `table_foodgallary` (`id`, `price`, `quantity`, `description`, `order_id`, `image_name`) VALUES
(8, 40.00, 5, 'drink', 0, 'chocolate_Drink.jpg'),
(9, 20.00, 2, 'Rice and stew ', 0, 'fo1.png'),
(10, 10.00, 2, 'cup cake', 0, 'gallary_2.jpg'),
(11, 40.00, 4, 'salad', 0, 'fo9.png'),
(12, 10.00, 4, 'ice-cream', 0, 'ice_cream.jpg'),
(13, 50.00, 4, 'pizza', 0, 'pizza.jpg'),
(14, 100.00, 2, 'Rice and chicken', 0, 'biryani.webp'),
(15, 100.00, 4, 'fufu', 0, 'fo6.png'),
(16, 50.00, 2, 'spegetti', 0, 'fo10.png'),
(17, 70.00, 4, 'buger', 0, 'buger.jpg'),
(18, 100.00, 4, 'buger', 0, 'buger.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `table_menu`
--

CREATE TABLE `table_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_menu`
--

INSERT INTO `table_menu` (`id`, `title`, `image_name`, `featured`, `active`, `price`) VALUES
(7, 'pasta', 'fo10.png', 'Yes', 'Yes', 50.00),
(8, 'rice', 'fo1.png', 'Yes', 'Yes', 100.00),
(9, 'Rice', 'food_menu_580.png', 'Yes', 'Yes', 100.00),
(11, 'pizza', 'food_menu_755.jpg', 'No', 'No', 150.00),
(12, 'Hot dog', 'food_menu_145.jpg', 'No', 'No', 50.00),
(13, 'Joloff', 'food_menu_325.webp', 'Yes', 'Yes', 100.00),
(14, 'Salad', 'food_menu_589.png', 'Yes', 'Yes', 50.00),
(15, 'buger', 'food_menu_6.jpg', 'No', 'No', 50.00),
(16, 'chocolate', 'food_menu_647.jpg', 'Yes', 'Yes', 50.00),
(17, 'Rice', 'food_menu_472.png', 'No', 'No', 100.00),
(18, 'cake pizza', 'food_menu_389.webp', 'No', 'No', 50.00),
(19, 'Cake', 'food_menu_822.jpg', 'Yes', 'Yes', 30.00),
(21, 'Salad', 'food_menu_406.png', 'Yes', 'Yes', 30.00),
(22, 'vegetable pizza', 'food_menu_382.jpg', 'Yes', 'Yes', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

CREATE TABLE `table_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `cus_name` varchar(200) NOT NULL,
  `cus_contact` int(50) NOT NULL,
  `cus_email` varchar(200) NOT NULL,
  `cus_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_order`
--

INSERT INTO `table_order` (`id`, `food`, `price`, `quantity`, `total`, `order_date`, `status`, `cus_name`, `cus_contact`, `cus_email`, `cus_address`) VALUES
(4, 'Rice and stew ', 20.00, 3, 60, '0000-00-00 00:00:00', 'ordered', 'Rose', 233, '154@gmail.com', 'accra'),
(5, 'fufu', 100.00, 3, 300, '0000-00-00 00:00:00', 'ordered', 'Rose', 233, '154@gmail.com', ''),
(6, 'buger', 100.00, 3, 300, '0000-00-00 00:00:00', 'ordered', 'rita', 233, '154@gmail.com', 'osu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_foodgallary`
--
ALTER TABLE `table_foodgallary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_menu`
--
ALTER TABLE `table_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_order`
--
ALTER TABLE `table_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `table_foodgallary`
--
ALTER TABLE `table_foodgallary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `table_menu`
--
ALTER TABLE `table_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `table_order`
--
ALTER TABLE `table_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
