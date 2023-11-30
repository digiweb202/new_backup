-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 02:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.2

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
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(200) NOT NULL,
  `banner_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_title`, `banner_image`) VALUES
(8, 'Slider1', 'slider-1.png');

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
-- Table structure for table `cart_banner_3`
--

CREATE TABLE `cart_banner_3` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_banner_3`
--

INSERT INTO `cart_banner_3` (`id`, `image`, `text`) VALUES
(1, 'assets/imgs/banner/banner-1.png', 'Everyday Fresh & Clean with Our Products'),
(2, 'assets/imgs/banner/banner-2.png', 'Make your Breakfast Healthy and Easy!!!'),
(3, 'assets/imgs/banner/banner-3.png', 'The best Organic Products Online');

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
-- Table structure for table `contact_information`
--

CREATE TABLE `contact_information` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_information`
--

INSERT INTO `contact_information` (`id`, `icon`, `title`, `content`) VALUES
(1, 'icon-location.svg', 'Address', '5171 W Campbell Ave undefined Kent, Utah 53127 United States!!!'),
(2, 'icon-contact.svg', 'Call Us', '(+91) - 540-025-124553'),
(3, 'icon-email-2.svg', 'Email', '[email protected]'),
(4, 'icon-clock.svg', 'Hours', '10:00 - 18:00, Mon - Sat');

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
-- Table structure for table `dbs_cart_banner_1`
--

CREATE TABLE `dbs_cart_banner_1` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbs_cart_banner_1`
--

INSERT INTO `dbs_cart_banner_1` (`id`, `heading`, `link`) VALUES
(1, 'Bring nature into your home!!', 'shop-grid-right.php');

-- --------------------------------------------------------

--
-- Table structure for table `featured_icons`
--

CREATE TABLE `featured_icons` (
  `id` int(11) NOT NULL,
  `icon_url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `featured_icons`
--

INSERT INTO `featured_icons` (`id`, `icon_url`, `title`, `description`) VALUES
(1, 'icon-1.svg', 'Best prices & offers', 'Orders $50 or more'),
(2, 'icon-2.svg', 'Free delivery', '24/7 amazing services'),
(3, 'icon-3.svg', 'Great daily deal', 'When you sign up'),
(4, 'icon-4.svg', 'Wide assortment', 'Mega Discounts'),
(5, 'icon-5.svg', 'Easy returns', 'Within 30 days!!!'),
(6, 'icon-6.svg', 'Safe delivery', 'Within 30 days');

-- --------------------------------------------------------

--
-- Table structure for table `footer_links`
--

CREATE TABLE `footer_links` (
  `id` int(11) NOT NULL,
  `link_name` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `title_tag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer_links`
--

INSERT INTO `footer_links` (`id`, `link_name`, `link_url`, `title_tag`) VALUES
(4, 'About Us!!!', 'page-about.php', 'Company'),
(5, 'Delivery Information', 'index.php', 'Company'),
(6, 'Privacy Policy', '#', 'Company'),
(7, 'Terms & Conditions', '#', 'Company'),
(8, 'Contact Us', '#', 'Company'),
(9, 'Support Center', 'Support-Center.php', 'Company'),
(10, 'Careers', 'Careers.php', 'Company'),
(11, 'Careers', '#', 'Account'),
(12, 'Careers', '#', 'Corporate');

-- --------------------------------------------------------

--
-- Table structure for table `footer_links_company`
--

CREATE TABLE `footer_links_company` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link_name` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer_links_company`
--

INSERT INTO `footer_links_company` (`id`, `title`, `link_name`, `link_url`) VALUES
(1, 'Company', 'About Us112', 'page-about.php'),
(2, 'Company', 'Delivery Information', '#'),
(3, 'Company', 'Privacy Policy', '#'),
(4, 'Company', 'Terms & Conditions', '#'),
(5, 'Company', 'Contact Us', '#'),
(6, 'Company', 'Support Center', '#'),
(7, 'Company', 'Careers', '#');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modifed` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `title`, `created`, `modifed`, `status`) VALUES
(1, 'banner-1.png', 'Demo Product 1', '2023-01-12 16:19:36', '2023-01-12 16:19:36', 1),
(2, 'banner-2.png', 'Demo Product 2', '2023-01-12 16:19:53', '2023-01-12 16:19:53', 1),
(3, 'banner-3.png', 'Demo Product 3', '2023-01-12 16:20:03', '2023-01-12 16:20:03', 1),
(4, 'banner-4.png.', 'Demo Product 4', '2023-01-12 16:20:11', '2023-01-12 16:20:11', 1),
(5, 'banner-5.png', 'Demo Product 5', '2023-01-12 16:20:22', '2023-01-12 16:20:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `info_app`
--

CREATE TABLE `info_app` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `app_store_link` varchar(255) DEFAULT NULL,
  `google_play_link` varchar(255) DEFAULT NULL,
  `app_store_image` varchar(255) DEFAULT NULL,
  `google_play_image` varchar(255) DEFAULT NULL,
  `payment_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info_app`
--

INSERT INTO `info_app` (`id`, `title`, `app_store_link`, `google_play_link`, `app_store_image`, `google_play_image`, `payment_image`) VALUES
(1, 'Install App', 'https://www.example.com/appstore', 'https://www.example.com/googleplay', 'app-store.jpg', 'google-play.jpg', 'payment-method.png');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_content`
--

CREATE TABLE `newsletter_content` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter_content`
--

INSERT INTO `newsletter_content` (`id`, `heading`, `description`, `image_url`) VALUES
(1, 'Stay home & get your daily needs!!!', 'Start Your Daily Shopping with', 'banner-9.png');

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
(123, 'Shirt', 'desc for shirt', 600, 18, 12, 'deactive', 29, '2023-10-15 11:17:05'),
(134, 'jeans', 'desc for jeans', 1000, 5, 12, 'deactive', 29, '2023-10-15 11:17:05'),
(336, 'new prd', 'new prd desc', 2000, 5, 14, 'active', 18, '2023-08-23 14:50:08'),
(341, 'as', 'as', 21, 12, 16, 'active', 29, '2023-10-04 16:39:39'),
(343, 'sa', 'sa', 21, 12, 16, 'active', 17, '2023-10-04 16:40:22'),
(344, 'dassdsad', 'sdaasd', 12, 10, 14, 'active', 29, '2023-10-04 16:38:52'),
(12345, 'Shirt', 'desc for shirt', 600, 18, 12, 'active', 29, '2023-10-15 11:57:45'),
(123456, 'shirt', 'desc for shirt', 650, 18, 12, 'active', 29, '2023-10-15 11:57:45'),
(123450000, 'Shirt', 'desc for shirt', 600, 18, 12, 'active', 29, '2023-10-15 12:28:44'),
(123456778, 'jeans', 'desc for jeans', 1000, 5, 12, 'active', 29, '2023-10-15 11:57:45'),
(2147483647, 'Shirt', 'desc for shirt', 600, 18, 12, 'active', 29, '2023-10-15 12:33:49');

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
  `ASNID` varchar(11) NOT NULL,
  `product_img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`attribute_id`, `product_try_id`, `size`, `color`, `price`, `sku`, `status`, `ASNID`, `product_img`) VALUES
(10265, 2147483647, 'M', 'blue', 805.00, 'SK305', 'active', 'NJOY0226', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10266, 2147483647, 'M', 'blue', 806.00, 'SK306', 'active', 'NJOY0227', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10267, 2147483647, 'M', 'blue', 807.00, 'SK307', 'active', 'NJOY0228', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10268, 2147483647, 'M', 'blue', 808.00, 'SK308', 'active', 'NJOY0229', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10269, 2147483647, 'M', 'blue', 809.00, 'SK309', 'active', 'NJOY0230', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10270, 2147483647, 'M', 'blue', 810.00, 'SK310', 'active', 'NJOY0231', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10271, 2147483647, 'M', 'blue', 811.00, 'SK311', 'active', 'NJOY0232', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10272, 2147483647, 'M', 'blue', 812.00, 'SK312', 'active', 'NJOY0233', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10273, 2147483647, 'M', 'blue', 813.00, 'SK313', 'active', 'NJOY0234', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10274, 2147483647, 'M', 'blue', 814.00, 'SK314', 'active', 'NJOY0235', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10275, 2147483647, 'M', 'blue', 815.00, 'SK315', 'active', 'NJOY0236', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10276, 2147483647, 'M', 'blue', 816.00, 'SK316', 'active', 'NJOY0237', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10277, 2147483647, 'M', 'blue', 817.00, 'SK317', 'active', 'NJOY0238', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10278, 2147483647, 'M', 'blue', 818.00, 'SK318', 'active', 'NJOY0239', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10279, 2147483647, 'M', 'blue', 819.00, 'SK319', 'active', 'NJOY0240', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10280, 2147483647, 'M', 'blue', 820.00, 'SK320', 'active', 'NJOY0241', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10281, 2147483647, 'M', 'blue', 821.00, 'SK321', 'active', 'NJOY0242', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10282, 2147483647, 'M', 'blue', 822.00, 'SK322', 'active', 'NJOY0243', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10283, 2147483647, 'M', 'blue', 823.00, 'SK323', 'active', 'NJOY0244', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10284, 2147483647, 'M', 'blue', 824.00, 'SK324', 'active', 'NJOY0245', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10285, 2147483647, 'M', 'blue', 825.00, 'SK325', 'active', 'NJOY0246', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10286, 2147483647, 'M', 'blue', 826.00, 'SK326', 'active', 'NJOY0247', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10287, 2147483647, 'M', 'blue', 827.00, 'SK327', 'active', 'NJOY0248', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10288, 2147483647, 'M', 'blue', 828.00, 'SK328', 'active', 'NJOY0249', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10289, 2147483647, 'M', 'blue', 829.00, 'SK329', 'active', 'NJOY0250', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10290, 2147483647, 'M', 'blue', 830.00, 'SK330', 'active', 'NJOY0251', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10291, 2147483647, 'M', 'blue', 831.00, 'SK331', 'active', 'NJOY0252', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10292, 2147483647, 'M', 'blue', 832.00, 'SK332', 'active', 'NJOY0253', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10293, 2147483647, 'M', 'blue', 833.00, 'SK333', 'active', 'NJOY0254', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10294, 2147483647, 'M', 'blue', 834.00, 'SK334', 'active', 'NJOY0255', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10295, 2147483647, 'M', 'blue', 835.00, 'SK335', 'active', 'NJOY0256', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10296, 2147483647, 'M', 'blue', 836.00, 'SK336', 'active', 'NJOY0257', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10297, 2147483647, 'M', 'blue', 837.00, 'SK337', 'active', 'NJOY0258', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10298, 2147483647, 'M', 'blue', 838.00, 'SK338', 'active', 'NJOY0259', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10299, 2147483647, 'M', 'blue', 839.00, 'SK339', 'active', 'NJOY0260', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10300, 2147483647, 'M', 'blue', 840.00, 'SK340', 'active', 'NJOY0261', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10301, 2147483647, 'M', 'blue', 841.00, 'SK341', 'active', 'NJOY0262', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10302, 2147483647, 'M', 'blue', 842.00, 'SK342', 'active', 'NJOY0263', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10303, 2147483647, 'M', 'blue', 843.00, 'SK343', 'active', 'NJOY0264', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10304, 2147483647, 'M', 'blue', 844.00, 'SK344', 'active', 'NJOY0265', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10305, 2147483647, 'M', 'blue', 845.00, 'SK345', 'active', 'NJOY0266', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10306, 2147483647, 'M', 'blue', 846.00, 'SK346', 'active', 'NJOY0267', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10307, 2147483647, 'M', 'blue', 847.00, 'SK347', 'active', 'NJOY0268', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10308, 2147483647, 'M', 'blue', 848.00, 'SK348', 'active', 'NJOY0269', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10309, 2147483647, 'M', 'blue', 849.00, 'SK349', 'active', 'NJOY0270', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10310, 2147483647, 'M', 'blue', 850.00, 'SK350', 'active', 'NJOY0271', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10311, 2147483647, 'M', 'blue', 851.00, 'SK351', 'active', 'NJOY0272', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10312, 2147483647, 'M', 'blue', 852.00, 'SK352', 'active', 'NJOY0273', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10313, 2147483647, 'M', 'blue', 853.00, 'SK353', 'active', 'NJOY0274', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(10314, 2147483647, 'M', 'blue', 854.00, 'SK354', 'active', 'NJOY0275', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg');

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
    SET NEW.ASNID = CONCAT('NJOY', LPAD(last_id, 5, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `social_media_links`
--

CREATE TABLE `social_media_links` (
  `id` int(11) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_media_links`
--

INSERT INTO `social_media_links` (`id`, `platform`, `link`) VALUES
(1, 'facebook', 'https://www.facebook.com'),
(2, 'twitter', 'https://www.twitter.com'),
(3, 'instagram', 'https://www.instagram.com'),
(4, 'pinterest', 'https://www.pinterest.com'),
(5, 'youtube', 'https://www.youtube.com');

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
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `c_id` (`customer_id`),
  ADD KEY `p_id` (`product_id`);

--
-- Indexes for table `cart_banner_3`
--
ALTER TABLE `cart_banner_3`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `contact_information`
--
ALTER TABLE `contact_information`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `dbs_cart_banner_1`
--
ALTER TABLE `dbs_cart_banner_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_icons`
--
ALTER TABLE `featured_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_links`
--
ALTER TABLE `footer_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_links_company`
--
ALTER TABLE `footer_links_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_app`
--
ALTER TABLE `info_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_content`
--
ALTER TABLE `newsletter_content`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `social_media_links`
--
ALTER TABLE `social_media_links`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `cart_banner_3`
--
ALTER TABLE `cart_banner_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `contact_information`
--
ALTER TABLE `contact_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `dbs_cart_banner_1`
--
ALTER TABLE `dbs_cart_banner_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `featured_icons`
--
ALTER TABLE `featured_icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `footer_links`
--
ALTER TABLE `footer_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `footer_links_company`
--
ALTER TABLE `footer_links_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `info_app`
--
ALTER TABLE `info_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletter_content`
--
ALTER TABLE `newsletter_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1218856;

--
-- AUTO_INCREMENT for table `social_media_links`
--
ALTER TABLE `social_media_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
