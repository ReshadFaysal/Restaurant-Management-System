-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 04:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `phonenumber`, `email`) VALUES
('Fahad', '01745666644', 'fahad@mail.com'),
('Moon', '0177723444', 'moon@mail.com'),
('Reshad', '01785566627', 'reshad@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `phonenumber`, `email`) VALUES
('Md. Ashraf', '01237854699', 'ashraf@mail.com'),
('limon', '01777773456', 'limon@mail.com'),
('Shuvo', '1234567', 'shuvo@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `deliman`
--

CREATE TABLE `deliman` (
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `salary` decimal(10,0) NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deliman`
--

INSERT INTO `deliman` (`name`, `email`, `phonenumber`, `salary`, `address`, `region`) VALUES
('Md. Asad', 'asad@mail.com', '01230986574', '10000', 'Merul-Badda, Dhaka', 'Badda'),
('Md. Rashed', 'rashed@mail.com', '01235689324', '10000', 'Jatrabari, Dhaka', 'Jatrabari'),
('sumon', 'sumon@mail.com', '016666634', '10000', 'dhaka', 'mirpur');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fno` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `subtime` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fno`, `email`, `comment`, `subtime`) VALUES
(5, 'ashraf@mail.com', 'Good food.....', '23-09-2020 10:36:31am'),
(6, 'ashraf@mail.com', 'very delicious food....', '23-09-2020 04:17:51pm');

-- --------------------------------------------------------

--
-- Table structure for table `irl_order`
--

CREATE TABLE `irl_order` (
  `order_no` int(11) NOT NULL,
  `cname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `wemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tableno` int(11) NOT NULL,
  `bill` double NOT NULL,
  `served` tinyint(1) NOT NULL,
  `subtime` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `irl_order`
--

INSERT INTO `irl_order` (`order_no`, `cname`, `wemail`, `tableno`, `bill`, `served`, `subtime`) VALUES
(4, 'limon', 'bashir@mail.com', 2, 335, 0, '23-09-2020 04:28:25pm');

-- --------------------------------------------------------

--
-- Table structure for table `irl_order_item`
--

CREATE TABLE `irl_order_item` (
  `order_no` int(11) NOT NULL,
  `item_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `irl_order_item`
--

INSERT INTO `irl_order_item` (`order_no`, `item_name`, `quantity`, `unit_price`, `total_price`) VALUES
(4, 'Burger', 1, 300, 300),
(4, 'Coca Cola 500ml', 1, 35, 35);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `pname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `itype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descr` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `pname`, `image`, `price`, `itype`, `descr`) VALUES
(1, 'Burger', 'http://localhost/projects/rms/tools/img/food/burgers.jpg', 300, 'food', 'works to help its followers eat well using simple, wholesome ingredients prepared in a manner that elevates the everyday. Even a basic roast chicken can be sublime if done well!'),
(2, 'French Fries', 'http://localhost/projects/rms/tools/img/food/frenchfries.jpg', 150, 'food', 'works to help its followers eat well using simple, wholesome ingredients prepared in a manner that elevates the everyday. Even a basic roast chicken can be sublime if done well!'),
(3, 'Pasta', 'http://localhost/projects/rms/tools/img/food/pasta1.jpg', 200, 'food', 'works to help its followers eat well using simple, wholesome ingredients prepared in a manner that elevates the everyday. Even a basic roast chicken can be sublime if done well!'),
(4, 'Pizza', 'http://localhost/projects/rms/tools/img/food/pizza1.jpg', 500, 'food', 'works to help its followers eat well using simple, wholesome ingredients prepared in a manner that elevates the everyday. Even a basic roast chicken can be sublime if done well!'),
(5, 'Chocolate Strawberry Smoothie', 'http://localhost/projects/rms/tools/img/food/smoothy.jpg', 200, 'beverage', 'works to help its followers eat well using simple, wholesome ingredients prepared in a manner that elevates the everyday. Even a basic roast chicken can be sublime if done well!'),
(6, 'Coca Cola 500ml', 'http://localhost/projects/rms/tools/img/food/coke1.png', 35, 'beverage', 'works to help its followers eat well using simple, wholesome ingredients prepared in a manner that elevates the everyday. Even a basic roast chicken can be sublime if done well!'),
(7, 'Mountain Dew 500ml', 'http://localhost/projects/rms/tools/img/food/dew1.jpg', 35, 'beverage', 'works to help its followers eat well using simple, wholesome ingredients prepared in a manner that elevates the everyday. Even a basic roast chicken can be sublime if done well!'),
(8, 'Pepsi 500ml', 'http://localhost/projects/rms/tools/img/food/pepsi1.jpg', 35, 'beverage', 'works to help its followers eat well using simple, wholesome ingredients prepared in a manner that elevates the everyday. Even a basic roast chicken can be sublime if done well!');

-- --------------------------------------------------------

--
-- Table structure for table `online_order`
--

CREATE TABLE `online_order` (
  `order_no` int(11) NOT NULL,
  `cname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bill` double NOT NULL,
  `dmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `delivered` tinyint(1) NOT NULL,
  `subtime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deltime` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `online_order`
--

INSERT INTO `online_order` (`order_no`, `cname`, `email`, `address`, `phone`, `bill`, `dmail`, `delivered`, `subtime`, `deltime`) VALUES
(108, 'Md. Ashraf', 'ashraf@mail.com', 'Gulshan', '0199945567', 1176, '', 0, '23-09-2020 04:23:39pm', ''),
(109, 'Md. Ashraf', 'ashraf@mail.com', 'badda', '01666669087', 1111.5, 'sumon@mail.com', 0, '23-09-2020 04:24:27pm', ''),
(110, 'Shuvo', 'shuvo@mail.com', 'dhaka', '01666669087', 760, '', 0, '23-09-2020 04:30:37pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `online_order_item`
--

CREATE TABLE `online_order_item` (
  `order_no` int(11) NOT NULL,
  `item_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `online_order_item`
--

INSERT INTO `online_order_item` (`order_no`, `item_name`, `quantity`, `unit_price`, `total_price`) VALUES
(108, 'Burger', 3, 300, 900),
(108, 'Pizza', 1, 500, 500),
(108, 'Pepsi 500ml', 1, 35, 35),
(108, 'Mountain Dew 500ml', 1, 35, 35),
(109, 'Coca Cola 500ml', 1, 35, 35),
(109, 'Pasta', 3, 200, 600),
(109, 'French Fries', 4, 150, 600),
(110, 'Chocolate Strawberry Smoothie', 1, 200, 200),
(110, 'French Fries', 5, 150, 750);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `payment_method`) VALUES
(44, 103, 'Cash On Delivery'),
(45, 104, 'Paid'),
(46, 105, 'Paid'),
(48, 108, 'Cash On Delivery'),
(49, 109, 'Paid'),
(50, 110, 'Cash On Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(5, 'Md. Asad', 'asad@mail.com', '123', 'deliman'),
(6, 'Abdul Karim', 'abdulk@mail.com', '123', 'deliman'),
(8, 'Md. Bashir', 'bashir@mail.com', '123', 'waiter'),
(9, 'Md. Rashed', 'rashed@mail.com', '123', 'deliman'),
(11, 'Md. Ashraf', 'ashraf@mail.com', '123', 'customer'),
(121, 'Shuvo', 'shuvo@mail.com', '123', 'customer'),
(138, 'Reshad', 'reshad@mail.com', '123', 'admin'),
(139, 'Moon', 'moon@mail.com', '123', 'admin'),
(142, 'Fahad', 'fahad@mail.com', '123', 'admin'),
(143, 'karim', 'karim@mail.com', '123', 'waiter'),
(145, 'sumon', 'sumon@mail.com', '123', 'deliman'),
(146, 'limon', 'limon@mail.com', '123', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `waiter`
--

CREATE TABLE `waiter` (
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `salary` decimal(10,0) NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `waiter`
--

INSERT INTO `waiter` (`name`, `email`, `phonenumber`, `salary`, `address`) VALUES
('Md. Bashir', 'bashir@mail.com', '01234523213', '15000', 'Jatrabari, Dhaka'),
('karim', 'karim@mail.com', '01999', '15000', 'khulna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `deliman`
--
ALTER TABLE `deliman`
  ADD PRIMARY KEY (`email`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fno`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `irl_order`
--
ALTER TABLE `irl_order`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `irl_order_item`
--
ALTER TABLE `irl_order_item`
  ADD KEY `order_no` (`order_no`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_order`
--
ALTER TABLE `online_order`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `online_order_item`
--
ALTER TABLE `online_order_item`
  ADD KEY `order_no` (`order_no`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `name` (`name`,`email`);

--
-- Indexes for table `waiter`
--
ALTER TABLE `waiter`
  ADD PRIMARY KEY (`email`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `irl_order`
--
ALTER TABLE `irl_order`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `online_order`
--
ALTER TABLE `online_order`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`name`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`name`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deliman`
--
ALTER TABLE `deliman`
  ADD CONSTRAINT `deliman_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deliman_ibfk_2` FOREIGN KEY (`name`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`email`) REFERENCES `customer` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `irl_order_item`
--
ALTER TABLE `irl_order_item`
  ADD CONSTRAINT `irl_order_item_ibfk_1` FOREIGN KEY (`order_no`) REFERENCES `irl_order` (`order_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `online_order_item`
--
ALTER TABLE `online_order_item`
  ADD CONSTRAINT `online_order_item_ibfk_1` FOREIGN KEY (`order_no`) REFERENCES `online_order` (`order_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `waiter`
--
ALTER TABLE `waiter`
  ADD CONSTRAINT `waiter_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `waiter_ibfk_2` FOREIGN KEY (`name`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
