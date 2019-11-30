-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 06:46 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Food', 'Any food including snacks, pastries, consumables, etc.'),
(2, 'Drinks', 'Any drinks including water, carbonated drinks, alcohol, etc.'),
(3, 'Home', 'Any home items including cleaning agents, toiletries, supplies, etc.');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'Coke Sakto', 'Soft drink', 13.00),
(2, 'Piattos', 'Flavored chips', 12.00),
(3, 'Ariel Powder', 'Cleaning detergent', 8.50),
(4, 'Zesto BIG 250ml', 'Juice drink for kids', 7.00),
(5, 'Oreo Cookies', 'Vanilla-flavored cookies', 8.00),
(6, 'Vaseline Shampoo', 'Shampoo', 6.00);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `category_id`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 3),
(4, 4, 2),
(5, 5, 1),
(6, 6, 3),
(7, 6, 1),
(8, 1, 1),
(9, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `from_warehouse` varchar(255) NOT NULL,
  `to_warehouse` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `from_warehouse`, `to_warehouse`, `product_id`, `quantity`, `date`) VALUES
(1, 'QC Warehouse', 'Mandaluyong Warehouse', 1, 2, '2019-07-21 14:50:24'),
(2, 'QC Warehouse', 'Mandaluyong Warehouse', 1, 5, '2019-07-21 15:00:32'),
(3, 'QC Warehouse', 'Pasig Warehouse', 2, 2, '2019-10-09 02:28:22'),
(4, 'QC Warehouse', 'Pasig Warehouse', 2, 4, '2019-10-09 02:43:00'),
(5, 'QC Warehouse', 'Mandaluyong Warehouse', 1, 2, '2019-10-14 13:49:19'),
(6, 'QC Warehouse', 'Mandaluyong Warehouse', 1, 2, '2019-10-14 13:53:02'),
(7, 'QC Warehouse', 'Mandaluyong Warehouse', 4, 2, '2019-10-14 13:53:03'),
(8, 'QC Warehouse', 'Mandaluyong Warehouse', 1, 1, '2019-10-15 02:42:07'),
(9, 'QC Warehouse', 'Mandaluyong Warehouse', 1, 10, '2019-10-22 09:55:19'),
(10, 'QC Warehouse', 'Mandaluyong Warehouse', 1, 8, '2019-10-22 09:56:31'),
(11, 'QC Warehouse', 'Mandaluyong Warehouse', 4, 8, '2019-10-22 09:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `address`) VALUES
(1, 'QC Warehouse', 'Quezon City'),
(2, 'Mandaluyong Warehouse', 'Mandaluyong City'),
(3, 'Pasig Warehouse', 'Pasig City');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_products`
--

CREATE TABLE `warehouse_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse_products`
--

INSERT INTO `warehouse_products` (`id`, `product_id`, `warehouse_id`, `quantity`) VALUES
(1, 4, 1, 10),
(2, 6, 1, 70),
(10, 1, 1, 40),
(13, 6, 2, 35),
(14, 1, 2, 54),
(15, 1, 3, 50),
(17, 6, 3, 10),
(23, 2, 2, 5),
(27, 2, 3, 4),
(28, 4, 2, 20),
(29, 5, 1, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_fk_2` (`category_id`),
  ADD KEY `product_category_fk_1` (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_fk_1` (`product_id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_products`
--
ALTER TABLE `warehouse_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_products_fk_2` (`warehouse_id`),
  ADD KEY `warehouse_products_fk_1` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warehouse_products`
--
ALTER TABLE `warehouse_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_fk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_fk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_fk_1` FOREIGN KEY (`product_id`) REFERENCES `product_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warehouse_products`
--
ALTER TABLE `warehouse_products`
  ADD CONSTRAINT `warehouse_products_fk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `warehouse_products_fk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
