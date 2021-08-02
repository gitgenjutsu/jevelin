-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 02, 2021 at 05:17 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jevelin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `password`, `img_name`, `phone`, `dob`) VALUES
(1, 'Mohd Wasim', 'admin', 'wasimraja@live.com', '5be97f74c4b5a607b6be58ecdd075e36', 'profile_pic.png', 9716689303, '1996-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `paymentMode` varchar(255) NOT NULL,
  `orderStatus` varchar(255) NOT NULL DEFAULT 'Order Placed',
  `orderTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `amount`, `paymentMode`, `orderStatus`, `orderTime`) VALUES
(1, 2, 3678, 'Credit Card', 'Order Cancelled', '2021-07-25 14:38:20'),
(2, 5, 8177, 'Debit Card', 'Order Cancelled', '2021-07-25 15:17:10'),
(3, 5, 2179, 'Debit Card', 'Order Delivered', '2021-07-25 17:02:08'),
(4, 2, 3599, 'Credit Card', 'Order Cancelled', '2021-07-26 01:09:42'),
(5, 6, 4998, 'Credit Card', 'Order Cancelled', '2021-07-26 18:44:18'),
(6, 2, 1178, 'Debit Card', 'Order Delivered', '2021-07-26 20:02:29'),
(7, 2, 10963, 'Credit Card', 'Order Cancelled', '2021-07-26 20:03:58'),
(8, 7, 3899, 'Debit Card', 'Dispatched', '2021-07-27 17:39:17'),
(9, 2, 15455, 'Credit Card', 'Order Cancelled', '2021-07-27 23:36:48'),
(10, 5, 589, 'Credit Card', 'Order Delivered', '2021-07-28 19:28:36'),
(11, 5, 8732, 'Debit Card', 'Order Delivered', '2021-07-28 19:55:55'),
(12, 8, 3678, 'Credit Card', 'Order Placed', '2021-07-29 12:48:43'),
(13, 9, 2469, 'Debit Card', 'Order Placed', '2021-08-02 16:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

DROP TABLE IF EXISTS `orders_items`;
CREATE TABLE IF NOT EXISTS `orders_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`id`, `order_id`, `product_id`, `product_name`, `product_img`, `product_price`, `quantity`) VALUES
(1, 1, 10, 'Little Black Dress', 'grid14.jpg,grid15.jpg', 3678, 1),
(2, 2, 4, 'Green as Grass', 'grid12.jpg,grid13.jpg', 2179, 1),
(3, 2, 16, 'Scarf fabric tie-up wedges', 'sandal-1.jpg,sandal-2.jpg', 2999, 2),
(4, 3, 4, 'Green as Grass', 'grid12.jpg,grid13.jpg', 2179, 1),
(5, 4, 19, 'Elite Flex Running Sketchers', 'shoe15.jpeg,shoe16.jpeg', 3599, 1),
(6, 5, 12, 'Rose Bold', 'grid16.jpg,grid17.jpg', 1999, 1),
(7, 5, 16, 'Scarf fabric tie-up wedges', 'sandal-1.jpg,sandal-2.jpg', 2999, 1),
(8, 6, 5, 'Striped Sweatshirt', 'grid1.jpg,grid2.jpg', 589, 2),
(9, 7, 1, 'Beige Longsleeve', 'grid10.jpg,grid11.jpg', 2199, 3),
(10, 7, 18, 'Stylish Casual Sports', 'shoe9.jpeg,shoe10.jpeg', 4366, 1),
(11, 8, 6, 'Denim Vest', 'grid3.jpg,grid4.jpg', 3899, 1),
(12, 9, 10, 'Little Black Dress', 'grid14.jpg,grid15.jpg', 3678, 1),
(13, 9, 4, 'Green as Grass', 'grid12.jpg,grid13.jpg', 2179, 1),
(14, 9, 8, 'Checked Tailored Trousers', 'grid8.jpg,grid9.jpg', 4799, 2),
(15, 10, 5, 'Striped Sweatshirt', 'grid1.jpg,grid2.jpg', 589, 1),
(16, 11, 18, 'Stylish Casual Sports', 'shoe9.jpeg,shoe10.jpeg', 4366, 2),
(17, 12, 10, 'Little Black Dress', 'grid14.jpg,grid15.jpg', 3678, 1),
(18, 13, 7, 'Denim Trucker Jacket', 'grid5.jpg,grid6.jpg', 2469, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_tracking`
--

DROP TABLE IF EXISTS `orders_tracking`;
CREATE TABLE IF NOT EXISTS `orders_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `orderStatus` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_tracking`
--

INSERT INTO `orders_tracking` (`id`, `order_id`, `orderStatus`, `reason`, `time`) VALUES
(1, 1, 'Order Cancelled', 'Get on cheaper rate from offline market', '2021-07-26 18:33:02'),
(2, 5, 'Order Cancelled', 'Mann badal gaya', '2021-07-26 18:45:04'),
(3, 4, 'Order Cancelled', 'Testing', '2021-07-26 20:02:56'),
(4, 7, 'Order Cancelled', 'test', '2021-07-26 20:04:21'),
(5, 2, 'Order Cancelled', 'Duplicate Order', '2021-07-27 20:43:38'),
(6, 2, 'Order Cancelled', 'Duplicate Order', '2021-07-27 20:44:51'),
(7, 9, 'Order Cancelled', 'Duplicate Order', '2021-07-27 23:43:02'),
(8, 8, 'In Progress', 'In Progress', '2021-07-28 01:48:07'),
(9, 8, 'In Progress', 'In Progress', '2021-07-28 01:52:40'),
(10, 6, 'In Progress', 'In Progress', '2021-07-28 01:54:01'),
(11, 3, 'In Progress', 'In Progress', '2021-07-28 01:54:26'),
(12, 6, 'Out For Delivery', 'Out For Delivery', '2021-07-28 01:55:40'),
(13, 6, 'In Progress', 'In Progress', '2021-07-28 01:58:01'),
(14, 8, 'Order Delivered', 'Order Delivered', '2021-07-28 02:06:19'),
(15, 8, 'In Progress', 'In Progress', '2021-07-28 02:08:34'),
(16, 8, 'Dispatched', 'Dispatched', '2021-07-28 02:10:10'),
(17, 6, 'Dispatched', 'Dispatched', '2021-07-28 15:18:08'),
(18, 6, 'In Progress', 'In Progress', '2021-07-28 15:31:24'),
(19, 6, 'Dispatched', 'Dispatched', '2021-07-28 15:34:38'),
(20, 6, 'Order Delivered', 'Order Delivered', '2021-07-28 15:35:11'),
(21, 3, 'Order Delivered', 'Order Delivered', '2021-07-28 19:23:16'),
(22, 10, 'In Progress', 'In Progress', '2021-07-28 19:29:03'),
(23, 10, 'Out For Delivery', 'Out For Delivery', '2021-07-28 19:29:18'),
(24, 10, 'Dispatched', 'Dispatched', '2021-07-28 19:30:51'),
(25, 10, 'Order Delivered', 'Order Delivered', '2021-07-28 19:31:29'),
(26, 11, 'Out For Delivery', 'Out For Delivery', '2021-07-28 20:09:51'),
(27, 11, 'Order Delivered', 'Order Delivered', '2021-07-28 20:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `prod_category` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `fashion` varchar(255) NOT NULL,
  `upload_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_name`, `img_name`, `size`, `prod_category`, `price`, `cost`, `fashion`, `upload_time`) VALUES
(1, 'Beige Longsleeve', 'grid10.jpg,grid11.jpg', 'Small', 'Sweater', 899, 1299, 'girl', '2021-07-15 17:52:39'),
(4, 'Green as Grass', 'grid12.jpg,grid13.jpg', 'Medium', 'Women Sweater', 1789, 2438, 'girl', '2021-07-15 18:42:44'),
(5, 'Striped Sweatshirt', 'grid1.jpg,grid2.jpg', 'Medium', 'Mens Sweater', 589, 899, 'boy', '2021-07-15 18:43:27'),
(6, 'Denim Vest', 'grid3.jpg,grid4.jpg', 'Medium', 'Denim Jacket', 3899, 4200, 'boy', '2021-07-15 19:37:10'),
(7, 'Denim Trucker Jacket', 'grid5.jpg,grid6.jpg', 'Medium', 'Jacket', 2469, 2599, 'boy', '2021-07-15 19:38:34'),
(8, 'Checked Tailored Trousers', 'grid8.jpg,grid9.jpg', 'Skin Fit', 'Pants check', 4799, 5199, 'boy', '2021-07-15 19:39:55'),
(9, 'Sport Jacket', 'grid7.jpg,grid20.jpg', 'Large', 'Sports', 3999, 4286, 'boy', '2021-07-15 19:41:26'),
(10, 'Little Black Dress', 'grid14.jpg,grid15.jpg', 'Small', 'One Piece Dress', 3678, 4255, 'girl', '2021-07-15 19:44:44'),
(11, 'Oversized denim jacket', 'model-3.jpg,model-4.jpg', 'Large', 'Jacket', 5999, 7899, 'girl', '2021-07-15 19:46:33'),
(12, 'Rose Bold', 'grid16.jpg,grid17.jpg', 'Medium', 'Sweater', 1999, 2599, 'girl', '2021-07-15 19:47:33'),
(13, 'Striped denim dress', 'model-1.jpg,model-2.jpg', 'Large', 'Dress', 4899, 5100, 'girl', '2021-07-15 19:48:21'),
(14, 'Summer Vibes', 'grid18.jpg,grid19.jpg', 'Small', 'Frock', 4999, 6859, 'girl', '2021-07-15 19:52:51'),
(15, 'Casual trainers', 'shoe13.jpeg,shoe14.jpeg', '6,7,8,9,10', 'Casual Shoes', 2899, 3369, 'boy', '2021-07-15 19:55:52'),
(16, 'Scarf fabric tie-up wedges', 'sandal-1.jpg,sandal-2.jpg', '6,7,8', 'Women Shoes', 2999, 4588, 'girl', '2021-07-15 19:57:03'),
(17, 'Oxygen Running Shoes', 'shoes11.jpg,shoes12.jpg', '7,8,9,11', 'Running Shoes', 4200, 4899, 'boy', '2021-07-15 19:59:10'),
(18, 'Stylish Casual Sports', 'shoe9.jpeg,shoe10.jpeg', '6,7,8,9', 'Women Sports Shoes', 4366, 4899, 'girl', '2021-07-15 20:01:14'),
(19, 'Elite Flex Running Sketchers', 'shoe15.jpeg,shoe16.jpeg', '8,9,10', 'Mens Running Shoes', 3599, 4286, 'boy', '2021-07-15 20:05:35'),
(20, 'Sneakers Shoes', 'shoe0.jpg,shoe1.jpg', '6,7,8,9,10', 'Women Sneakers Shoes', 2878, 3999, 'girl', '2021-07-15 20:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `prod_id`, `user_id`, `review`, `time`) VALUES
(1, 6, 2, 'Nice Product', '2021-07-28 17:06:04'),
(2, 5, 2, 'Great Quality', '2021-07-28 18:57:23'),
(3, 4, 5, 'Best product', '2021-07-28 19:23:51'),
(4, 5, 5, 'Awesome Quality in this price', '2021-07-28 19:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(3, 'spidey', 'spidey@gmail.com', '1da0bac388e8e0409a83e121e1af6ef4'),
(2, 'wasim', 'wasim@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 'sayera', 'sayera@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'naazpraveen', 'naazpraveen@gmail.com', '39741cf09acd8a213e7d8116778fcbf0'),
(7, 'newuser', 'newuser@gmail.com', '9dd9c2bc527cd3a8c9c7d535f99c2ec6'),
(8, 'mdwasim', 'mdwasim@gmail.com', '9220ce7e45ec47a783b64cb802b115ee'),
(9, 'finaltest', 'finaltest@gmail.com', '8ca62ab13163367c47a5bed31957ff7f');

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

DROP TABLE IF EXISTS `users_data`;
CREATE TABLE IF NOT EXISTS `users_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `pincode` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `userId`, `username`, `name`, `phone`, `pincode`, `state`, `locality`, `address`, `address_type`) VALUES
(1, 2, 'wasim', 'Md Wasim', 9716689300, 110044, 'newdelhi', 'Axis ATM', 'A-208/6 SAURABH VIHAR, JAITPUR, BADARPUR', 'home'),
(2, 3, 'spidey', 'Spider Man', 9871485620, 110022, 'haryana', 'Web', 'Marvels Studio', 'office'),
(3, 5, 'sayera', 'Sayera Wasim', 9812414845, 205154, 'haryana', 'Axis Bank', 'Home Address', 'home'),
(4, 6, 'naazpraveen', 'Naaz Praveen', 9821054545, 100225, 'newdelhi', 'Indu Doctor', 'Badarpur New Delhi', 'home'),
(5, 7, 'newuser', 'New User', 7812196651, 545454, 'haryana', 'Near Easyday', 'new user address', 'home'),
(6, 8, 'mdwasim', 'Mohd Wasim', 9614819452, 360154, 'haryana', 'Ram Mandir', 'Ballabgarh Haryana', 'home'),
(7, 9, 'finaltest', 'Final', 9179636646, 555555, 'haryana', 'dont know', 'nothing to say...', 'office');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `prod_id`, `user_id`, `time`) VALUES
(11, 10, 5, '2021-07-29 01:30:42'),
(12, 10, 2, '2021-07-30 18:55:29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
