-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 09:32 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce2`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `building` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `baner`
--

CREATE TABLE `baner` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baner`
--

INSERT INTO `baner` (`id`, `image`, `item_id`) VALUES
(1, 'image1.png', 1),
(2, 'image2.png', 3),
(3, 'image3.png', 2),
(4, 'image4.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_english` varchar(50) NOT NULL,
  `name_arabic` varchar(50) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_english`, `name_arabic`, `image`) VALUES
(1, 'CAT1', 'arabic', 'cat1.png'),
(2, 'car access', 'arabic', NULL),
(3, 'car details', 'Ø§Ù„Ø¹Ù†Ø§ÙŠØ© Ø¨Ø§Ù„Ø³ÙŠØ§Ø±Ø§Øª', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `compons`
--

CREATE TABLE `compons` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `expire_date` date NOT NULL,
  `code` varchar(20) NOT NULL,
  `percentage` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `notification_token` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `token`, `notification_token`, `phone_number`) VALUES
(1, 'ahmad', 'sami', 'ahmad@gmail.com', '1234', 'ahmad@gmail.com', 'helo ahmad', 'fres', '81370598'),
(2, '', '', 'mohammad@gmail.com', '12345', 'mohammad@gmail.com', 'cacsc', 'czxcxddc', '81370598'),
(3, '', '', 'mazen@gmail.com', '4321', 'mazen@gmail.com', 'vsdadv', 'vsdcs fdsvgs', '71383978');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_english` varchar(50) NOT NULL,
  `name_arabic` varchar(50) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `new_item` tinyint(1) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `description_english` varchar(255) NOT NULL,
  `description_arabic` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name_english`, `name_arabic`, `price`, `new_item`, `availability`, `description_english`, `description_arabic`, `category_id`) VALUES
(1, 'cleaner', 'cleaner', 10, 1, 1, 'caf', 'caad', 1),
(2, 'shine', 'shine', 5, 1, 1, 'vds', 'vds', 1),
(3, 'detol', 'detol', 15, 1, 1, 'cfsd', 'vacsvc', 1),
(4, 'ti shirt', 'ti shirt', 15, 1, 1, 'vsda', 'vds', 1),
(5, 'jeenz', 'jeenz', 20, 1, 1, 'vfdv', 'vasv', 1),
(6, 'pin', 'pin', 13, 1, 1, 'vfedsa', 'dsvv', 1),
(7, 'tire shine', 'hjdgnhn', 10, 0, 0, 'hvdasfu  df', 'df bkaj', 1),
(8, 'interior cleaner', 'Ù…Ù†Ø¸Ù Ø¯Ø§Ø®Ù„ÙŠØ©', 15, 1, 1, 'vfds  sf', 'vvds vs sf', 2),
(9, 'interior cleaner', 'Ù…Ù†Ø¸Ù Ø¯Ø§Ø®Ù„ÙŠØ©', 15, 1, 1, 'vfds  sf', 'vvds vs sf', 2),
(10, 'interior shine', 'Ù…Ù„Ù…Ø¹ Ø¯Ø§Ø®Ù„ÙŠØ©', 20, 0, 1, 'shine the interior of your car', 'Ù„Ù…Ø¹ Ø¯Ø§Ø®Ù„ÙŠØ© Ø§Ù„Ø³ÙŠØ§Ø±Ø© ', 3),
(12, 'fog light', 'ÙƒØ´Ø§ÙØ§Øª Ø¶ÙˆØ¡ÙŠØ©', 25, 1, 1, 'Ù‰Ø§Ø³Ø¨ Ù‰Ø«Ù‚ØºÙ„Ø§', 'Ù„Ø§Ù‚Ù„ Ù„Ø§Ù', 2),
(13, 'interior shine', 'Ù…Ù„Ù…Ø¹ Ø¯Ø§Ø®Ù„ÙŠØ©', 15, 1, 1, 'ebwrbv efbv', 'evfab efbsv', 3),
(14, 'interior cleaner', 'Ù…Ù†Ø¸Ù Ø¯Ø§Ø®Ù„ÙŠØ©', 15, 1, 1, 'jnfx', 'xfnfyh', 3),
(15, 'interior cleaner', 'Ù…Ù†Ø¸Ù Ø¯Ø§Ø®Ù„ÙŠØ©', 15, 1, 1, 'hransn asrnrtn', 'ngnzsn r est', 3),
(16, 'interior shine', 'Ù…Ù„Ù…Ø¹ Ø¯Ø§Ø®Ù„ÙŠØ©', 15, 1, 0, 'hdzten dh', 'gndnddn ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `items_images`
--

CREATE TABLE `items_images` (
  `id` int(11) NOT NULL,
  `item_id` int(11) UNSIGNED NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_images`
--

INSERT INTO `items_images` (`id`, `item_id`, `image`) VALUES
(1, 1, 'image1.png'),
(2, 1, 'image2.png'),
(3, 15, 'download (1)1.jpeg'),
(4, 16, 'clore1.jpeg'),
(5, 16, 'download (1)2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `items_transactions`
--

CREATE TABLE `items_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `transaction_status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_transactions`
--

INSERT INTO `items_transactions` (`id`, `item_id`, `quantity`, `price`, `date`, `transaction_status`) VALUES
(1, 1, 30, 10, '2023-01-01', 'IN'),
(2, 1, 50, 11, '2023-02-07', 'IN');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `date`, `address`, `status`) VALUES
(1, 1, '2023-02-01', 'sour/jal al bahar', 'Ready To Delivered'),
(2, 1, '2023-03-24', '', 'In Preparation'),
(3, 2, '2023-02-07', '', 'Delivery Is Underway'),
(4, 2, '2023-03-09', '', 'delivered'),
(5, 1, '2022-06-01', '', 'delivered'),
(6, 1, '2022-06-01', '', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `quantity`, `price`) VALUES
(1, 1, 1, 2, 10),
(2, 1, 3, 4, 12),
(3, 1, 5, 6, 25),
(4, 2, 5, 5, 25),
(5, 2, 6, 3, 12),
(6, 2, 4, 4, 12),
(7, 3, 2, 3, 10),
(8, 3, 1, 8, 10),
(9, 4, 4, 3, 10),
(10, 4, 5, 12, 10),
(11, 5, 1, 3, 5),
(12, 6, 7, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `page_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `user_id`, `page_name`) VALUES
(1, 1, 'admin_page_dashbord.php');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `rating` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `command` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `image` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `phone_number`, `image`) VALUES
(1, 'mohammad', 'abo alfoul', 'moh@gmail.com', '1234', 'mohd2001af@gmail.com', '81370598', 'moh.png');

-- --------------------------------------------------------

--
-- Table structure for table `whichlist_favorite`
--

CREATE TABLE `whichlist_favorite` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baner`
--
ALTER TABLE `baner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r1_baner_item` (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compons`
--
ALTER TABLE `compons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `r1_compons_customer` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r1_category_item` (`category_id`);

--
-- Indexes for table `items_images`
--
ALTER TABLE `items_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r1_items_images` (`item_id`);

--
-- Indexes for table `items_transactions`
--
ALTER TABLE `items_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r1_items_itemstrns` (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r1_order_order_items` (`order_id`),
  ADD KEY `r2_item_order_items` (`item_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_permision_r1` (`user_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r1_rating_item` (`item_id`),
  ADD KEY `r1_rating_customer` (`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `whichlist_favorite`
--
ALTER TABLE `whichlist_favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r1_whichlist_item` (`item_id`),
  ADD KEY `r2_whichlist_customer` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `baner`
--
ALTER TABLE `baner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `compons`
--
ALTER TABLE `compons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `items_images`
--
ALTER TABLE `items_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `items_transactions`
--
ALTER TABLE `items_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `whichlist_favorite`
--
ALTER TABLE `whichlist_favorite`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `baner`
--
ALTER TABLE `baner`
  ADD CONSTRAINT `r1_baner_item` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `compons`
--
ALTER TABLE `compons`
  ADD CONSTRAINT `r1_compons_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `r1_category_item` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `items_images`
--
ALTER TABLE `items_images`
  ADD CONSTRAINT `r1_items_images` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items_transactions`
--
ALTER TABLE `items_transactions`
  ADD CONSTRAINT `r1_items_itemstrns` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `r1_order_order_items` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `r2_item_order_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `idx_permision_r1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `r1_rating_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r1_rating_item` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `whichlist_favorite`
--
ALTER TABLE `whichlist_favorite`
  ADD CONSTRAINT `r1_whichlist_item` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `r2_whichlist_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
