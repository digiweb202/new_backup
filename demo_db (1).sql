-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 08:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_email_id` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email_id`, `admin_password`, `admin_otp`) VALUES
(1001, 'njoy', 'njoy123@gmail.com', '@Abcd123', 496845);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_new`
--

CREATE TABLE `cart_new` (
  `cart_new_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pa_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_new`
--

INSERT INTO `cart_new` (`cart_new_id`, `customer_id`, `pa_id`, `quantity`, `sub_total`) VALUES
(3, 2, 7, 1, 800);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` varchar(255) NOT NULL,
  `cat_img` longblob NOT NULL,
  `cat_status` enum('active','deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_img`, `cat_status`) VALUES
(3, 'Watches', '456', 0x30, 'active'),
(5, 'Grocery', '23', 0x30, 'active'),
(6, 'Home & Kitchen', 'cat desc', 0x30, 'active'),
(10, 'Fashion', 'Fashion desc', 0x30, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_mobile` int(10) NOT NULL,
  `customer_pwd` varchar(25) NOT NULL,
  `customer_p` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_mobile`, `customer_pwd`, `customer_p`) VALUES
(1, 'abc', 'abc@gmail.com', 1234567890, 'aaa', 1),
(2, 'a', 'ahmedabad@gmail.com', 1234567890, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `cust_add_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`cust_add_id`, `customer_id`, `street_address`, `city`, `state`, `country`) VALUES
(12, 2, 'orient', 'GUJARAT', 'GUJARAT', 'INDIA'),
(13, 1, 'Anywhere', ' Ahmedabad', 'GUJARAT', 'INDIA');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `total_price` decimal(10,2) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `status` enum('pending','delivered','approved','cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sub_total` float NOT NULL,
  `cgst` float NOT NULL,
  `sgst` float NOT NULL,
  `igst` float NOT NULL,
  `tcs_cgst` float NOT NULL,
  `tcs_sgst` float NOT NULL,
  `tcs_igst` float NOT NULL,
  `tds` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price`, `sub_total`, `cgst`, `sgst`, `igst`, `tcs_cgst`, `tcs_sgst`, `tcs_igst`, `tds`, `total`) VALUES
(130, 105, 1, 1, 500.00, 500, 45, 45, 0, 2.5, 2.5, 0, 5, 580),
(131, 105, 6, 1, 1000.00, 1000, 90, 90, 0, 5, 5, 0, 10, 1160),
(132, 106, 1, 1, 500.00, 500, 0, 0, 90, 0, 0, 5, 5, 580),
(133, 106, 6, 1, 1000.00, 1000, 0, 0, 180, 0, 0, 10, 10, 1160),
(134, 107, 1, 2, 500.00, 1000, 0, 0, 180, 0, 0, 10, 10, 1160);

-- --------------------------------------------------------

--
-- Table structure for table `order_new`
--

CREATE TABLE `order_new` (
  `order_new_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `total_price` decimal(10,2) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `state` text NOT NULL,
  `status` enum('pending','delivered','approved','cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_new`
--

INSERT INTO `order_new` (`order_new_id`, `customer_id`, `order_date`, `total_price`, `shipping_address`, `billing_address`, `state`, `status`) VALUES
(105, 1, '2023-08-18 10:03:24', 1500.00, 'shipping', 'billing', 'GUJARAT', 'pending'),
(106, 1, '2023-08-18 10:09:13', 1500.00, '', '', 'Rajasthan', 'pending'),
(107, 1, '2023-08-18 10:38:03', 1000.00, '', '', 'Rajasthan', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `product_status` enum('active','deactive') NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `created_on` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `product_price`, `tax`, `sub_cat_id`, `product_status`, `vendor_id`, `created_on`) VALUES
(1, 'shirt', 'desc for shirt2', 500, 5, 12, 'active', 17, '2023-08-23 14:50:08'),
(6, 'shirt', 'Female shirt', 1000, 18, 14, 'active', 17, '2023-08-23 14:50:08'),
(123, 'Shirt', 'desc for shirt', 600, 18, 12, 'active', 29, '2023-10-15 11:17:05'),
(134, 'jeans', 'desc for jeans', 1000, 5, 12, 'active', 29, '2023-10-15 11:17:05'),
(336, 'new prd', 'new prd desc', 2000, 5, 14, 'active', 18, '2023-08-23 14:50:08'),
(341, 'as', 'as', 21, 12, 16, 'active', 29, '2023-10-04 16:39:39'),
(343, 'sa', 'sa', 21, 12, 16, 'active', 17, '2023-10-04 16:40:22'),
(344, 'dassdsad', 'sdaasd', 12, 10, 14, 'active', 29, '2023-10-04 16:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `attribute_id` int(11) NOT NULL,
  `product_try_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `status` enum('active','deactive') NOT NULL,
  `ASNID` varchar(8) NOT NULL,
  `product_img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`attribute_id`, `product_try_id`, `size`, `color`, `price`, `sku`, `status`, `ASNID`, `product_img`) VALUES
(1, 1, 'S', 'White', 100.00, 'SK123', 'active', 'NJOY0001', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(2, 1, 'S', 'Blue', 200.00, 'SK124', 'deactive', 'NJOY0002', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(3, 1, 'S', 'Black', 300.00, 'SK125', 'active', 'NJOY0003', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(4, 1, 'M', 'White', 500.00, 'SK126', 'active', 'NJOY0004', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(5, 1, 'M', 'Blue', 600.00, 'SK127', 'active', 'NJOY0005', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(6, 1, 'M', 'Black', 700.00, 'SK128', 'active', 'NJOY0006', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(7, 1, 'M', 'Red', 800.00, 'SK129', 'active', 'NJOY0007', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(8, 1, 'L', 'White', 900.00, 'SK130', 'active', 'NJOY0008', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(9, 1, 'L', 'Blue', 1000.00, 'SK131', 'active', 'NJOY0009', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(55, 123, 'M', 'blue', 600.00, 'SK100', 'active', 'NJOY0010', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(56, 123, 'S', 'white', 650.00, 'SK101', 'active', 'NJOY0011', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(57, 134, '36', 'black', 1000.00, 'SK201', 'active', 'NJOY0012', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg');

--
-- Triggers `product_attributes`
--
DELIMITER $$
CREATE TRIGGER `before_insert_pro` BEFORE INSERT ON `product_attributes` FOR EACH ROW BEGIN
    DECLARE last_id INT;
    -- Get the last used numeric part of ASNID
    SET last_id = COALESCE((SELECT MAX(SUBSTRING(ASNID, 5)) FROM product_attributes), 0);
    -- Increment the last used numeric part
    SET last_id = last_id + 1;
    -- Set the new ASNID for the inserting row
    SET NEW.ASNID = CONCAT('NJOY', LPAD(last_id, 4, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `sub_cat_img` varchar(255) NOT NULL,
  `sub_cat_status` enum('active','deactive') NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`sub_cat_id`, `sub_cat_name`, `sub_cat_img`, `sub_cat_status`, `cat_id`) VALUES
(12, 'Men', '', 'active', 10),
(14, 'Female', '', 'active', 10),
(15, 'Kids', '', 'active', 10),
(16, 'watch1', '', 'deactive', 3),
(18, 'watch2', '', 'deactive', 3),
(19, 'kids toy', '', 'active', 10);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `vendor_pan` varchar(255) NOT NULL,
  `vendor_email` varchar(255) NOT NULL,
  `vendor_mobile` varchar(20) NOT NULL,
  `vendor_password` varchar(255) NOT NULL,
  `vendor_address` varchar(255) NOT NULL,
  `vendor_city` varchar(255) NOT NULL,
  `vendor_state` varchar(255) NOT NULL,
  `vendor_status` enum('pending','registered','rejected') NOT NULL,
  `vendor_Logo` varchar(255) NOT NULL,
  `vendor_store_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `brand_name`, `vendor_pan`, `vendor_email`, `vendor_mobile`, `vendor_password`, `vendor_address`, `vendor_city`, `vendor_state`, `vendor_status`, `vendor_Logo`, `vendor_store_image`) VALUES
(17, 'salman1 khan1', 'Being Human', 'files/Copy of Reduces Pain And Inflammation.pdf', 'salmankhan@gmail.com', '1234567890', 'salmankhan1', 'Galaxy Appartment', 'Mumbai', 'Maharastra', 'registered', 'Tshirts', 'Men'),
(18, 'a a', 'A', 'files/Copy of Reduces Pain And Inflammation.pdf', 'a@gmail.com', '1234567890', 'a1', 'at', 'ahmedabad', 'gujarat', 'pending', 'Tshirts', 'Men'),
(29, 'Hit shah', 'a', 'C:/xampp/htdocs/Hit/Njoymart-Dashboard/Njoymart-Admin/assetsPDF/Cyber_Threat_Predictive_Analytics_for_Im.pdf', 'shahhit15@gmail.com', '07405220799', 'a', 'a', 'aa', 'a', 'registered', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `yourtablename`
--

CREATE TABLE `yourtablename` (
  `id` int(11) NOT NULL,
  `custom_id` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yourtablename`
--

INSERT INTO `yourtablename` (`id`, `custom_id`) VALUES
(1, 'NJOY0001'),
(2, 'NJOY0002');

--
-- Triggers `yourtablename`
--
DELIMITER $$
CREATE TRIGGER `insert_custom_id` BEFORE INSERT ON `yourtablename` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET next_id = 1 + COALESCE((SELECT MAX(SUBSTRING(custom_id, 5)) FROM YourTableName), 0);
    SET NEW.custom_id = CONCAT('NJOY', LPAD(next_id, 4, '0'));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `c_id` (`customer_id`),
  ADD KEY `p_id` (`product_id`);

--
-- Indexes for table `cart_new`
--
ALTER TABLE `cart_new`
  ADD PRIMARY KEY (`cart_new_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `pa_id` (`pa_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`cust_add_id`),
  ADD KEY `customer id` (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_new_id` (`order_id`);

--
-- Indexes for table `order_new`
--
ALTER TABLE `order_new`
  ADD PRIMARY KEY (`order_new_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `sub_cat_id` (`sub_cat_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`attribute_id`) USING BTREE,
  ADD UNIQUE KEY `ASNID` (`ASNID`),
  ADD KEY `product_attributes_ibfk_1` (`product_try_id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`,`brand_name`);

--
-- Indexes for table `yourtablename`
--
ALTER TABLE `yourtablename`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `custom_id` (`custom_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `cart_new`
--
ALTER TABLE `cart_new`
  MODIFY `cart_new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `cust_add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `order_new`
--
ALTER TABLE `order_new`
  MODIFY `order_new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `yourtablename`
--
ALTER TABLE `yourtablename`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `c_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `cart_new`
--
ALTER TABLE `cart_new`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pa_id` FOREIGN KEY (`pa_id`) REFERENCES `product_attributes` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_new_id` FOREIGN KEY (`order_id`) REFERENCES `order_new` (`order_new_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `sub_cat_id` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_cat` (`sub_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vendor_id` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_ibfk_1` FOREIGN KEY (`product_try_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
