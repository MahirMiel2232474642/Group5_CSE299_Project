-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 10:05 AM
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
-- Database: `techshop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_mail` varchar(200) DEFAULT NULL,
  `admin_phone` varchar(200) DEFAULT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `admin_pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_mail`, `admin_phone`, `admin_name`, `admin_pass`) VALUES
(1, 'mark@gmail.com', '0123456789', 'Marco', 'Polo'),
(2, 'miel@gmail.com', '01989847915', 'Mielle', 'sibel');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `product_id`, `product_quantity`) VALUES
(531645645, 4, 10001, 1),
(531645645, 4, 10002, 1),
(531645645, 4, 20001, 1),
(531645645, 4, 20003, 1),
(531645645, 4, 30001, 1),
(637698918, 1, 10001, 2),
(637698918, 1, 10003, 1),
(746431420, 1, 20001, 1),
(979031818, 4, 10001, 1),
(1278627578, 1, 10001, 1),
(1278627578, 1, 20002, 1),
(1603826835, 1, 10003, 1),
(1782310602, 3, 10001, 1),
(1871795349, 1, 10002, 2),
(1871795349, 1, 10003, 1),
(2099861050, 1, 10002, 1),
(2128169590, 1, 20003, 1),
(2128169590, 1, 30001, 1),
(2147483647, 1, 10001, 1),
(2147483647, 1, 10004, 1);

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `product_id` int(11) NOT NULL,
  `category_id` varchar(20) DEFAULT 'Laptop',
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `rating` double DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `dimensions` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `operating_system` varchar(50) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `display` varchar(50) DEFAULT NULL,
  `resolution` varchar(50) DEFAULT NULL,
  `processor` varchar(50) DEFAULT NULL,
  `GPU` varchar(50) DEFAULT NULL,
  `RAM` varchar(50) DEFAULT NULL,
  `SSD` varchar(50) DEFAULT NULL,
  `battery` varchar(50) DEFAULT NULL,
  `audio` varchar(50) DEFAULT NULL,
  `connections` varchar(50) DEFAULT NULL,
  `front_camera` varchar(50) DEFAULT NULL,
  `warranty` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`product_id`, `category_id`, `product_name`, `price`, `rating`, `dimensions`, `weight`, `operating_system`, `brand`, `display`, `resolution`, `processor`, `GPU`, `RAM`, `SSD`, `battery`, `audio`, `connections`, `front_camera`, `warranty`) VALUES
(10001, 'Laptop', 'Lenovo IdeaPad D330-10IGL', 44000, 5, '10.5 inch x 7 inch', '2 kg', 'Windows 11', 'Lenovo', '10 inches', '1980x1080p', 'Intel Core i5', 'Intel Integrated Graphics 600', '4 GB', '1 TB', '39Wh', 'High Definition Audio', 'USB, Ethernet, WLAN, Wifi', '2.0MP', '1 Year'),
(10002, 'Laptop', 'Walton Walpad 10H', 22000, 5, '10.5 inch x 8 inch', '2 kg', 'Android 11', 'Walton', '10 inches', '1980x1080p', 'MediaTek Helio P60', 'Integrated Graphics', '4 GB', '128 GB', '6000mAh', 'High Definition Audio', 'Bluetooth, Wifi', '1.0MP', '2 Years'),
(10003, 'Laptop', 'Hp Laptop Elightbook', 25000, 5, '9 inch x 6 inch', '2 kg', 'Windows 8', 'HP', '8.5 inches', '1080x720p', '840 G3 core i5', 'Intel Integrated Graphics 300', '8 GB', '512 GB', '39Wh', 'High Definition Audio', 'USB, Ethernet, WLAN, Wifi', '1.0MP', '2 Year'),
(10004, 'Laptop', 'Generic Laptop 3', 12, 5, '10 inches x 8 inches x 0.5 inches', '3 kg', 'Windows 7', 'HP', 'LED', '1080x720p', 'Intel Corei5', 'Intel IG', '4 GB', '512 GB', '4000 mAh', 'Stereo', 'USB, Bluetooth, WiFi, Ethernet', '20 MP', '4 Years');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_placement_date` date DEFAULT curdate(),
  `expected_delivery_date` date DEFAULT (curdate() + 7),
  `notes` varchar(200) DEFAULT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `payment_type` varchar(20) DEFAULT NULL CHECK (`payment_type` = 'Cash on Delivery' or `payment_type` = 'Card' or `payment_type` = 'BKash'),
  `total_price` int(11) DEFAULT NULL,
  `delivered_status` varchar(20) DEFAULT 'Undelivered',
  `cancellation_request` varchar(200) DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_id`, `cart_id`, `user_id`, `order_placement_date`, `expected_delivery_date`, `notes`, `shipping_address`, `payment_type`, `total_price`, `delivered_status`, `cancellation_request`) VALUES
(201864846, 1871795349, 1, '2025-03-25', '2025-04-01', 'gggggg', 'asdf', 'BKash', 69000, 'Undelivered', 'N/A'),
(428315747, 2128169590, 1, '2025-03-26', '2025-04-30', '', 'Ohio', 'Card', 634999, 'Delivered', 'N/A'),
(501812535, 979031818, 4, '2025-03-27', '2025-04-03', 'No', 'Hello', 'Cash on Delivery', 44000, 'Undelivered', 'N/A'),
(520355812, 1603826835, 1, '2025-03-26', '2025-04-02', '', 'f', 'Cash on Delivery', 25000, 'Undelivered', 'N/A'),
(911870128, 2099861050, 1, '2025-03-26', '2025-04-02', '', 'hjkl', 'BKash', 22000, 'Undelivered', 'N/A'),
(1664735315, 1871795349, 1, '2025-03-25', '0000-00-00', 'Something', 'Ooklahoma', 'Cash on Delivery', 69000, 'Undelivered', 'YES'),
(1851242095, 746431420, 1, '2025-03-26', '2025-04-02', 'water', 'Namek', 'Cash on Delivery', 82999, 'Undelivered', 'N/A'),
(1915979504, 637698918, 1, '2025-04-06', '2025-04-13', 'Will be unavailable before 1 pm on Saturdays Please deliver outside of that time', 'House 6 Road 6 Sector 6 Uttara', 'Card', 113000, 'Undelivered', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `product_id` int(11) NOT NULL,
  `category_id` varchar(20) DEFAULT 'Phone',
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `rating` double DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `dimensions` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `os_version` varchar(50) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `display` varchar(50) DEFAULT NULL,
  `resolution` varchar(50) DEFAULT NULL,
  `CPU` varchar(50) DEFAULT NULL,
  `GPU` varchar(50) DEFAULT NULL,
  `memory` varchar(50) DEFAULT NULL,
  `battery` varchar(50) DEFAULT NULL,
  `SIM` varchar(50) DEFAULT NULL,
  `connections` varchar(50) DEFAULT NULL,
  `front_camera` varchar(50) DEFAULT NULL,
  `back_camera` varchar(50) DEFAULT NULL,
  `warranty` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`product_id`, `category_id`, `product_name`, `price`, `rating`, `dimensions`, `weight`, `os_version`, `brand`, `display`, `resolution`, `CPU`, `GPU`, `memory`, `battery`, `SIM`, `connections`, `front_camera`, `back_camera`, `warranty`) VALUES
(20001, 'Phone', 'Google Pixel 9 ', 82999, 5, '152.8 x 72 x 8.5 mm', '198 g', 'Android 14', 'Google', 'OLED', '1080 x 2424 pixels', 'Octa-core', 'Google Tensor G4 (4 nm)', '12/128 GB', 'Li-Ion 4700 mAh', 'Dual nanoSIM', ' GSM / HSPA / LTE / 5G', '10.5MP', '50MP', '1 Year'),
(20002, 'Phone', 'Google Pixel 7 pro', 55999, 5, '159.9 x 76.7 x 8.3 mm', '212 g', 'iOS 17', 'Apple', 'XDR OLED', '1440 x 3120 pixels', 'Octa-core', 'Google Tensor G2 (5 nm)', '12/128 GB', 'Li-Ion 5000 mAh', 'Dual nanoSIM', 'WLANWi-Fi 802.11 a/b/g/n/ac/6e, tri-band, Wi-Fi Di', '12MP', '50MP', '1 Year'),
(20003, 'Phone', 'Apple iPhone 15 Pro Max', 239999, 5, '162.9 x 76.6 x 8.9 mm', '212 g', 'Android 13', 'Google', 'AMOLED', '1290 x 2796 pixels', 'Hexa-core', 'Apple GPU (6-core graphics)', '256 GB', 'Li-Ion 4441 mAh', 'nanoSIM', 'GSM, CDMA, HSPA, EVDO, LTE, 5G', '12MP', '48MP', '3 Years'),
(20004, 'Phone', 'Generic Phone X', 1000, 5, '5 inches x 2.5 inches x 0.25 inches', '250g', '', 'Nokia', 'OLED', '1080x720p', 'Quad processor', 'Integrated', '64 GB', '2000 mAh', 'Dual', 'USB, Bluetooth, WiFi', '2 MP', '50 MP', '2 Years');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` varchar(20) NOT NULL CHECK (`category_id` = 'Television' or `category_id` = 'Phone' or `category_id` = 'Laptop'),
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `rating` double DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `price`, `rating`) VALUES
(10001, 'Laptop', 'Lenovo IdeaPad D330-10IGL', 44000, 5),
(10002, 'Laptop', 'Walton Walpad 10H', 22000, 5),
(10003, 'Laptop', 'Hp Laptop ElightbookL', 25000, 5),
(10004, 'Laptop', 'Generic Laptop 3', 12, 5),
(20001, 'Phone', 'Google Pixel 9 ', 82999, 5),
(20002, 'Phone', 'Google Pixel 7 pro', 82999, 5),
(20003, 'Phone', 'Apple iPhone 15 Pro Max', 239999, 5),
(20004, 'Phone', 'Generic Phone X', 1000, 5),
(30001, 'Television', 'LG C4 65\" 4K Smart HDR EVO OLED TV', 395000, 5),
(30002, 'Television', 'LG Generic TV ', 900000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_score` int(11) NOT NULL CHECK (`review_score` >= 1 and `review_score` <= 5),
  `review_text` varchar(200) DEFAULT NULL,
  `review_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `television`
--

CREATE TABLE `television` (
  `product_id` int(11) NOT NULL,
  `category_id` varchar(20) DEFAULT 'Television',
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `rating` double DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `size` varchar(50) DEFAULT NULL,
  `display` varchar(50) DEFAULT NULL,
  `resolution` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `sound_system` varchar(50) DEFAULT NULL,
  `operating_system` varchar(50) DEFAULT NULL,
  `voice_command` varchar(50) DEFAULT NULL,
  `ports` varchar(50) DEFAULT NULL,
  `warranty` varchar(50) DEFAULT NULL,
  `panel_warranty` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `television`
--

INSERT INTO `television` (`product_id`, `category_id`, `product_name`, `price`, `rating`, `size`, `display`, `resolution`, `color`, `brand`, `sound_system`, `operating_system`, `voice_command`, `ports`, `warranty`, `panel_warranty`) VALUES
(30001, 'Television', 'LG C4 65\" 4K Smart HDR EVO OLED TV', 395000, 5, '65 inches', 'OLED', '4K Ultra HD (3,840 x 2,160)', 'Wide Color', 'LG', 'Dolby Atmos', 'webOS 24', 'Yes', 'USB, HDMI, Ethernet', '10 years', '2 years'),
(30002, 'Television', 'LG Generic TV ', 900000, 5, '53 inches', 'OLED', '4K', 'High', 'LG', 'Dolby Atmos', 'Android', 'Yes', 'HDMI, USB', '4 Years', '1 Year');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userpassword` varchar(100) NOT NULL,
  `phone_no` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `present_cart_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `userpassword`, `phone_no`, `address`, `present_cart_id`) VALUES
(1, 'Michael Myers', 'mike@gmail.com', 'angelo', '01234567891', 'Someplace', NULL),
(2, 'Emily', 'emily@gmail.com', 'rudd', '01989847915', 'Someplace else', 2090792427),
(3, 'Ryan Reynolds', 'ryan@gmail.com', 'deadpool', '01914007478', 'HOUSE 7, ROAD 3, SECTOR 7,', 1782310602),
(4, 'SeaPrismStone', 'seaprismstoneuswa@gmail.com', 'Luffy1044', '01914007478', 'chicken street 420, 69, 42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`,`user_id`,`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_id`,`cart_id`,`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`,`user_id`,`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `television`
--
ALTER TABLE `television`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `laptop`
--
ALTER TABLE `laptop`
  ADD CONSTRAINT `laptop_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`);

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `television`
--
ALTER TABLE `television`
  ADD CONSTRAINT `television_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
