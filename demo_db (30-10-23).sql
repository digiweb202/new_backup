-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 07:46 AM
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
-- Table structure for table `about_content`
--

CREATE TABLE `about_content` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content_1` text NOT NULL,
  `content_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_content`
--

INSERT INTO `about_content` (`id`, `image_path`, `title`, `content_1`, `content_2`) VALUES
(1, 'NjoyMart-R_1_BETA.png', 'Title!!!', '<i>Lorem</i> <br><b>ipsum</b> dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate id est laborum.', 'Ius ferri velit sanctus cu, sed at soleat accusata. Dictas prompta et Ut placerat legendos interpre.Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante Etiam sit amet orci eget. Quis commodo odio aenean sed adipiscing. Turpis massa tincidunt dui ut ornare lectus. Auctor elit sed vulputate mi sit amet. Commodo consequat. Duis aute irure dolor in reprehenderit in voluptate id est laborum.');

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
(1001, 'njoy', 'njoy123@gmail.com', '@Abcd123', 496845),
(1003, 'njoy', 'admin@gmail.com', 'admin', 496845);

-- --------------------------------------------------------

--
-- Table structure for table `all_browse_categories`
--

CREATE TABLE `all_browse_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all_browse_categories`
--

INSERT INTO `all_browse_categories` (`id`, `name`, `link`, `image`) VALUES
(1, 'Milks and Dairies', 'shop-grid-right.php', 'category-1.svg'),
(2, 'Clothing & beauty', 'shop-grid-right.php', 'category-2.svg'),
(3, 'Pet Foods & Toy', 'shop-grid-right.php', 'category-3.svg'),
(4, 'Baking material', 'shop-grid-right.php', 'category-4.svg'),
(5, 'Fresh Fruit', 'shop-grid-right.php', 'category-5.svg'),
(6, 'Wines & Drinks', 'shop-grid-right.php', 'category-6.svg'),
(7, 'Fresh Seafood', 'shop-grid-right.php', 'category-7.svg'),
(8, 'Fast food', 'shop-grid-right.php', 'category-8.svg'),
(9, 'Vegetables', 'shop-grid-right.php', 'category-9.svg'),
(10, 'Bread and Juice', 'shop-grid-right.php!!!', 'category-10.svg');

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
(8, 'Slider_1', 'slider-1.png'),
(19, 'Slider_2', 'slider-2.png');

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
  `text` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_banner_3`
--

INSERT INTO `cart_banner_3` (`id`, `image`, `text`, `link`) VALUES
(2, 'banner-2.png', 'Make your Breakfast Healthy and Easy!!!', 'Demo1.php'),
(3, 'banner-3.png', 'The best Organic Products Online', 'Demo2.php'),
(4, 'banner-1.png', 'Make your Breakfast Healthy and Easy!!!', 'Demo3.php!!!');

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
  `link` varchar(255) NOT NULL,
  `background_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbs_cart_banner_1`
--

INSERT INTO `dbs_cart_banner_1` (`id`, `heading`, `link`, `background_image`) VALUES
(1, 'Bring nature into your home!!', 'shop-grid-right1.php!!!', 'banner-4.png');

-- --------------------------------------------------------

--
-- Table structure for table `featured_categories`
--

CREATE TABLE `featured_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `item_count` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categories_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `featured_categories`
--

INSERT INTO `featured_categories` (`category_id`, `category_name`, `item_count`, `image`, `categories_link`) VALUES
(1, 'Cake & Milk', 26, 'cat-13.png', 'Testing.php'),
(2, 'Organic Kiwi', 28, 'cat-12.png', 'Testing2.php'),
(3, 'Peach', 14, 'cat-11.png', 'Testing.php'),
(4, 'Red Apple', 54, 'cat-9.png', 'Testing.php'),
(5, 'Snack', 56, 'cat-3.png', 'Testing.php'),
(6, 'Vegetables', 72, 'cat-1.png', 'Testing.php'),
(7, 'Strawberry', 36, 'cat-2.png', 'Testing.php'),
(8, 'Black Plum', 123, 'cat-4.png', 'Testing6.php'),
(9, 'Custard Apple', 34, 'cat-5.png', 'Testing5.php');

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
(1, 'icon-1.svg', 'Best prices & offers!!!', 'Testing INformation'),
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
(4, 'About Us', 'page-about.php', 'Company'),
(5, 'Delivery Information', 'index.php', 'Company'),
(6, 'Privacy Policy', '#', 'Company'),
(7, 'Terms & Conditions', '#', 'Company'),
(8, 'Contact Us', '#', 'Company'),
(9, 'Support Center', 'Support-Center.php', 'Company'),
(11, 'Careers', '#', 'Account'),
(12, 'Careers', '#', 'Corporate'),
(13, 'Careers_New', 'newpage_link.php', 'Account');

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
-- Table structure for table `hotline_table`
--

CREATE TABLE `hotline_table` (
  `id` int(11) NOT NULL,
  `hotline_number` varchar(255) NOT NULL,
  `support_hours` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotline_table`
--

INSERT INTO `hotline_table` (`id`, `hotline_number`, `support_hours`) VALUES
(1, '1900 - 888!!!!', '24/7 Support Center');

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
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(6) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL,
  `image_source` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `link`, `image_source`) VALUES
(1, 'index.php!~!!!', 'logo.svg');

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE `main_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `sub_menu` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`id`, `name`, `link`, `sub_menu`) VALUES
(1, 'Home', 'Shop Grid – Right Sidebar', 0),
(2, 'About', 'page-about.php', 0),
(3, 'Shop', 'shop-grid-right.php', 1),
(4, 'Vendors', 'data_vendors.php', 5),
(5, 'Mega menu', 'mega_menu.php', 1),
(6, 'Blog', 'blog-category-grid.php', 1),
(9, 'Link', 'link.php', 10);

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `link` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`id`, `name`, `link`, `active`) VALUES
(1, 'Deals', 'shop-grid-right.php', 0),
(2, 'Home!!!', 'index.php', 1),
(3, 'About', 'page-about.php', 0);

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
(1, 'Some random content', 'Stay home & get your daily needs!!!', 'banner-9.png');

-- --------------------------------------------------------

--
-- Table structure for table `nw_customer`
--

CREATE TABLE `nw_customer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `customer_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nw_customer`
--

INSERT INTO `nw_customer` (`id`, `username`, `email`, `password`, `customer_number`) VALUES
(1, 'Testing', 'Testing@gmail.com', '123', '1234567898'),
(3, 'Testing ', 'testing@gmail.com', 'testing', '456465483254856'),
(4, 'Testing ', 'testing@gmail.com', 'testing', '165164863548'),
(25, 'Testing', 'njoy123@gmail.com', '123', '41646341316553654'),
(26, 'Username ', 'Email@gmail.com', '123', '12334678695'),
(27, 'qqq', 'qqq@gmail.com', '123', '123333333'),
(28, 'View', 'View@gmail.com', '1234566', '123456789'),
(29, 'sdfasdfsdfakdjj', 'aldsfjldsajfl123@gmail.com', '123456', '123456789012'),
(30, 'TestingNew', 'TestingNWS@gmail.com', '123456', '123456789012'),
(31, 'Testing12121', 'njoy123122@gmail.com', '123456', '112121212122');

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
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `paragraph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `title`, `paragraph`) VALUES
(1, 'Privacy Policy', '!!!!!!\r\n\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">To Fulfill your dream, we came up with NJOY MART. We NJOY MART will help our sellers to provide their Genuine products to valuable buyers who will get all their needs at their doorsteps in just 4 hours. We are trying to help vendors to increase their sales in any situation and buyers have their products without going outside in any critical situation.</p>\r\n<ul style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART is operating an online marketplace and provides a platform as a mediator between Buyers and Sellers. It only assures on-time delivery of the product and nowhere responsible for the product’s size, color, taste, physical formation of product, preference, efficacy, quality, ingredients, durability, or any offer associated with the product.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART is only providing a platform for communication and it is agreed that the contract for sale of any of the products or services shall be a strictly bipartite contract between the Merchant and the Buyer. In case of complaints from the Buyer pertaining to food efficacy, quality, color, size, durability, taste, physical formation, etc. or any other such issues, NJOY MART shall notify the same Merchant and shall also redirect the Buyer to the consumer call center of the Merchant. The Merchant shall be liable for redressing Buyer’s complaints.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART does not have any control or does not determine or advise or in any way involve itself in the offering or acceptance of such commercial/contractual terms between the Buyers and Merchants.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART does not consider itself responsible for any breach of contract between Buyers and Sellers. We cannot and do not guarantee that the concerned Buyers and/or Merchants will perform any transaction concluded on the Platform.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">We, NJOY MART, is not responsible for unsatisfactory or non-performance of services or damages caused to the product at the time of delivery or due to any accidental case, or delays as a result of products that are out of stock, unavailable or back-ordered.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">In case of any accidental damage caused at the time of delivery. NJOY MART is not liable for such damages. In such cases, The Merchant shall be liable for redressing Buyer’s complaints and is responsible to exchange the product if the damage caused to the product is due to an accident or by any other natural accidents.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART neither makes any representation or warranty as to specifics (such as quality, value, preference, size, colour, saleability, etc.) of the products. Buyers are advised to independently verify the bona fides of any particular Merchant that they choose to deal with on the Platform and use their best judgment in that behalf. All Merchant offers and third-party offers are subject to respective party terms and conditions. NJOY MART takes no responsibility for such offers.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">All commercial/contractual terms are offered by and agreed to between Buyers and Merchants alone. The commercial/contractual terms include without limitation price, taxes, shipping costs, payment methods, payment terms, date, period and mode of delivery, warranties related to products and services and after sales services related to products and services.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n</ul>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">We value the trust you place in us. That’s why we insist upon the highest standards for secure transactions and customer information privacy. Please read the following statement to learn about our information gathering and dissemination practices.</p>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">By mere use of the Website, you expressly consent to our use and disclosure of personal information provided by you in accordance with this Privacy Policy. This Privacy Policy is incorporated into and subject to the Terms of Use.</p>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">This Privacy Policy applies to all products and services provided by NJOY MART and sets out how NJOY MART may collect, use and disclose information in relation to Users of the Platform.</p>\r\n<h4 style=\"text-align: start;color: rgb(51, 51, 51);background-color: rgb(255, 255, 255);font-size: 22px;border: 0px;\"><strong><strong style=\"font-size: 22px;border: 0px;\">1.Collection of information</strong></strong></h4>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">“Personal Information”</strong></strong> of User shall include the information shared by the User and collected by us for the following purposes:</p>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">Registration on the NJOY MART: </strong></strong>If you provide any Personal Data to NJOY MART, Information which you provide while subscribing to or registering on the Website, including but not limited to information about your personal identities such as name, gender, marital status, religion, age etc., your contact details such as your email address, postal addresses, telephone (mobile or otherwise) and/or fax numbers and any other information relating to your income and/or lifestyle; billing information payment history etc. (as shared by you), you are deemed to have authorized NJOY MART to collect, retain and use that Personal Data for the following purposes:</p>\r\n<ol style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">processing the User’s registration as a user, providing the User with a log-in ID for the Platform, and maintaining and managing User’s registration;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">providing User with customer service and responding to User(s) queries, feedback, claims or disputes;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">to facilitate communication between Users on the Platform and / or process Users’ transactions on the Platform;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">performing research or statistical analysis in order to improve the content and layout of the Platform, to improve NJOY MART’s product offerings and services, and for marketing and promotional purposes;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">Subject to applicable law, NJOY MART (including our affiliated companies and their designated Service Providers) may use User’s name, phone number, residential address, email address, fax number, and other data (“Marketing Data”) to provide notices, surveys, product alerts, communications and other marketing materials to User(s) relating to products and services offered by NJOY MART or NJOY MART’s affiliated companies;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">If the User voluntarily submits User information or other information to the Platform for publication on the Platform through the publishing tools, then Users are deemed to have given consent to the publication of such information on the Platform; and making such disclosures as may be required for any of the above purposes or as required by law, regulations and guidelines or in respect of any investigations, claims or potential claims brought on or against us or against third parties;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n</ol>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">Other information:</strong></strong> We may also collect some other information and documents including but not limited to:</p>\r\n<ol style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">Transactional history (other than banking details) about your e-commerce activities, buying behavior.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">Your usernames, passwords, email addresses and other security-related information used by you in relation to our Services.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">Data either created by you or by a third party and which you wish to store on our servers such as image files, documents etc.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">voice recordings of our conversations with our customer care agent with you to address your queries/grievances.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">Information pertaining to any other person for who you make a purchase through your registered NJOY MART account. In such case, you must confirm and represent that each of the other person for whom a purchase has been made, has agreed to have the information shared by you disclosed to us and further be shared by us with the concerned service provider(s).</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">In connection with any communication or transaction and payment services or any other services that you may avail using the Platform, information, including but not limited to, bank account numbers, billing and delivery information, credit/debit card numbers and expiration dates and tracking information from cheques or money orders (“Account Information”) may be collected, among other things, to facilitate the sale and purchase as well as the settlement of purchase price of the products or services transacted on or procured through the Platform.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART record and retain details of Users’ activities on the Platform. Information relating to communication or transactions including, but not limited to, the types and specifications of the goods, pricing and delivery information, any dispute records and any information disclosed in any communication forum provided by us and/or other affiliated companies of NJOY MART (“Activities Information”) may be collected as and when the communication and / or transactions are conducted through the Platform.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART record and retain records of Users’ browsing or buying activities on Platform including but not limited to IP addresses, demographic location, browsing patterns and User behavioural patterns.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">Registration Information, Account Information, Activities Information, and Browsing Information are collectively referred to as Personal Data.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">It is mandatory for Users of the Platform to provide certain categories of Personal Data (as specified at the time of collection). In the event that Users do not provide any or sufficient Personal Data marked as mandatory, NJOY MART may not be able to complete the registration process or provide such Users with NJOY MART’s products or services.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n</ol>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">Use of Demographic / Profile Data</strong></strong></p>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">We may also use your Personal Information for several reasons including but not limited to:</strong></strong></p>\r\n<ul style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">confirm your orders with the buyers/sellers;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">keep you informed of the transaction status;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">send order confirmations either via SMS or WhatsApp or any other messaging service;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">send any updates or changes to your order(s);</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">allow our customer service to contact you, if necessary;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">customize the content of our Website, mobile site and mobile app;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">request for reviews of products or services or any other improvements;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">send verification message(s) or email(s);</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">validate/authenticate your account and to prevent any misuse or abuse.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">contact you to offer a special gift or offers.</li>\r\n</ul>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">We use personal information to provide the services you request. To the extent we use your personal information to market to you, we will provide you the ability to opt-out of such uses. We use your personal information to assist sellers in handling and fulfilling orders, enhancing customer experience, resolve disputes; troubleshoot problems; help promote a safe service; measure consumer interest in our products or services(if applicable), inform you about online and offline offers, products, and updates; customize and enhance your experience; detect and protect us against error, fraud and other criminal activity; enforce our terms and conditions; and as otherwise described to you at the time of collection.</p>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">DISCLOSURE OF PERSONAL DATA</strong></strong></p>\r\n<ol style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">User further agrees that NJOY MART may disclose and transfer User’s Personal Data to third party service providers that are providing Users with services (including but not limited to data entry, database management, promotions, products and services alerts, delivery services, payment extension services, authentication and verification services and logistics services) (“Service Providers”). These Service Providers are under a duty of confidentiality to NJOY MART and are only permitted to use Users Personal Data in connection with the purposes specified</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">We may share personal information with our other corporate entities and affiliates. These entities and affiliates may market to you as a result of such sharing unless you explicitly opt-out.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART may establish relationships with other parties and websites to offer User the benefit of products and services which NJOY MART does not offer. NJOY MART may offer you access to these other parties and/or their websites. This Privacy Policy does not apply to the products and services enabled or facilitated by such third parties. The privacy policies of those other parties may differ from NJOY MART, and NJOY MART has no control over the information that User may submit to those third parties. User should read the relevant privacy policy for those third parties before responding to and availing any offers, products or services advertised or provided by those third parties.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART may share User’s Personal Data with third parties, including without limitation, banks, financial institutions, credit agencies, or vendors to enable such third parties to offer their products or services to such Users. While NJOY MART shall Endeavour to have in place internal procedures to keep User’s Personal Data secure from intruders, there is no guarantee that such measures/procedures can eliminate all of the risks of theft, loss or misuse.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">When necessary NJOY MART may also disclose and transfer User’s Personal Data to our professional advisers, law enforcement agencies, insurers, government, and regulatory and other organizations.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">We may disclose personal information to third parties. This disclosure may be required for us to provide you access to our Services, for the fulfilment of your orders, or for enhancing your experience, to comply with our legal obligations, to enforce our User Agreement, to facilitate our marketing and advertising activities, or to prevent, detect, mitigate, and investigate fraudulent or illegal activities related to our Services. We do not disclose your personal information to third parties for their marketing and advertising purposes without your explicit consent.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">We may disclose personal information if required to do so by law or in the good faith belief that such disclosure is reasonably necessary to respond to subpoenas, court orders, or other legal process. We may disclose personal information to law enforcement offices, third-party rights owners, or others in the good faith belief that such disclosure is reasonably necessary to: enforce our Terms or Privacy Policy; respond to claims that an advertisement, posting or other content violates the rights of a third party; or protect the rights, property or personal safety of our users or the general public.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">We and our affiliates will share/sell some or all of your personal information with another business entity should we (or our assets) plan to merge with, or be acquired by that business entity, or re-organization, amalgamate, or restructure of business. Should such a transaction occur that other business entity (or the new combined entity) will be required to follow this privacy policy with respect to your personal information.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n</ol>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">COOKIES</strong></strong></p>\r\n<ul style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART Do not use “cookies” to store specific information about User and track User(s) visits to the Sites. A “cookie” is a small amount of data that is sent to the User’s browser and stored on the User’s device. If the User does not de-activate or erase the cookie, each time User uses the same device to access the Platform. The cookies do not contain any of your personally identifiable information.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n</ul>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">Link to Other Websites</strong></strong></p>\r\n<ul style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">Our Website links to other websites that may collect personally identifiable information about you. NJOY MART is not responsible for the privacy practices or the content of those linked websites.</li>\r\n</ul>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">Your Consent</strong></strong></p>\r\n<ul style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">By using the Website and/ or by providing your information, you consent to the collection and use of the information you disclose on the Website in accordance with this Privacy Policy, including but not limited to Your consent for sharing your information as per this privacy policy. If you disclose any personal information relating to other people to us, you represent that you have the authority to do so and to permit us to use the information in accordance with this Privacy Policy.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n</ul>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">Security Precautions</strong></strong></p>\r\n<ul style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART employ commercially reasonable security methods to prevent unauthorized access to the Platform, to maintain data accuracy and to ensure the correct use of the information NJOY MART hold. No data transmission over the internet or any wireless network can be guaranteed to be perfectly secure. As a result, while NJOY MART try to protect the information NJOY MART hold, NJOY MART cannot guarantee the security of any information User transmit to NJOY MART and Users do so at their own risk.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n</ul>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">Changes to This Privacy Policy</strong></strong></p>\r\n<ul style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">Any changes to this Privacy Policy will be communicated by us posting an amended and restated Privacy Policy on the Platform. Once posted on the Platform the new Privacy Policy will be effective immediately. User agree that any information NJOY MART hold about User (as described in this Privacy Policy and whether or not collected prior to or after the new Privacy Policy became effective) will be governed by the latest version of the Privacy Policy.</li>\r\n</ul>');

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
(10314, 2147483647, 'M', 'blue', 854.00, 'SK354', 'active', 'NJOY0275', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg'),
(1218856, 2147483647, 'M', 'blue', 600.00, 'SK100', 'active', 'NJOY00276', 'https://www.freecodecamp.org/news/content/images/2022/02/arrows-2889040_1920.jpg');

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
(1, 'Facebook', 'https://www.facebook.com'),
(2, 'twitter', 'https://www.twitter.com'),
(3, 'instagram', 'https://www.instagram.com'),
(4, 'pinterest', 'https://www.pinterest.com'),
(5, 'youtube', 'https://www.youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `submenuitems`
--

CREATE TABLE `submenuitems` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent_id` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submenuitems`
--

INSERT INTO `submenuitems` (`id`, `name`, `link`, `parent_id`) VALUES
(21, 'Shop Grid – Right Sidebar', 'shop-grid-right.php', 1),
(22, 'Shop Grid – Left Sidebar', 'shop-grid-left.php', 1),
(23, 'Shop List – Right Sidebar', 'shop-list-right.php', 1),
(24, 'Shop List – Left Sidebar', 'shop-list-left.php', 1),
(25, 'Shop - Wide', 'shop-fullwidth.php', 1),
(26, 'Vendors Grid', 'vendors-grid.php', 2),
(27, 'Vendors List', 'vendors-list.php', 2),
(28, 'Vendor Details 01', 'vendor-details-1.php', 2),
(29, 'Vendor Details 02', 'vendor-details-2.php', 2),
(30, 'Vendor Dashboard', 'vendor-dashboard.php', 2);

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
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `main_menu_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `main_menu_id`, `name`, `link`) VALUES
(1, 3, 'Shop Grid – Right Sidebar', 'shop-grid-right.php'),
(2, 3, 'Shop Grid – Left Sidebar', 'shop-grid-left.php'),
(3, 6, 'Blog Category Grid', 'blog-category-grid.php'),
(4, 4, 'Vendors Grid', 'vendors-grid.php'),
(5, 4, 'Vendors List', 'vendors-list.php'),
(6, 4, 'Vendor Details 01', 'vendor-details-1.php'),
(7, 4, 'Vendor Details 02', 'vendor-details-2.php'),
(8, 4, 'Vendor Dashboard', 'vendor-dashboard.php');

-- --------------------------------------------------------

--
-- Table structure for table `terms_service`
--

CREATE TABLE `terms_service` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `paragraph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms_service`
--

INSERT INTO `terms_service` (`id`, `title`, `paragraph`) VALUES
(1, 'Term & Services', '\r\n!!!!\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">To Fulfill your dream, we came up with NJOY MART. We NJOY MART will help our sellers to provide their Genuine products to valuable buyers who will get all their needs at their doorsteps in just 4 hours. We are trying to help vendors to increase their sales in any situation and buyers have their products without going outside in any critical situation.</p>\r\n<ul style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART is operating an online marketplace and provides a platform as a mediator between Buyers and Sellers. It only assures on-time delivery of the product and nowhere responsible for the product’s size, color, taste, physical formation of product, preference, efficacy, quality, ingredients, durability, or any offer associated with the product.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART is only providing a platform for communication and it is agreed that the contract for sale of any of the products or services shall be a strictly bipartite contract between the Merchant and the Buyer. In case of complaints from the Buyer pertaining to food efficacy, quality, color, size, durability, taste, physical formation, etc. or any other such issues, NJOY MART shall notify the same Merchant and shall also redirect the Buyer to the consumer call center of the Merchant. The Merchant shall be liable for redressing Buyer’s complaints.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART does not have any control or does not determine or advise or in any way involve itself in the offering or acceptance of such commercial/contractual terms between the Buyers and Merchants.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART does not consider itself responsible for any breach of contract between Buyers and Sellers. We cannot and do not guarantee that the concerned Buyers and/or Merchants will perform any transaction concluded on the Platform.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">We, NJOY MART, is not responsible for unsatisfactory or non-performance of services or damages caused to the product at the time of delivery or due to any accidental case, or delays as a result of products that are out of stock, unavailable or back-ordered.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">In case of any accidental damage caused at the time of delivery. NJOY MART is not liable for such damages. In such cases, The Merchant shall be liable for redressing Buyer’s complaints and is responsible to exchange the product if the damage caused to the product is due to an accident or by any other natural accidents.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART neither makes any representation or warranty as to specifics (such as quality, value, preference, size, colour, saleability, etc.) of the products. Buyers are advised to independently verify the bona fides of any particular Merchant that they choose to deal with on the Platform and use their best judgment in that behalf. All Merchant offers and third-party offers are subject to respective party terms and conditions. NJOY MART takes no responsibility for such offers.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">All commercial/contractual terms are offered by and agreed to between Buyers and Merchants alone. The commercial/contractual terms include without limitation price, taxes, shipping costs, payment methods, payment terms, date, period and mode of delivery, warranties related to products and services and after sales services related to products and services.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n</ul>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">We value the trust you place in us. That’s why we insist upon the highest standards for secure transactions and customer information privacy. Please read the following statement to learn about our information gathering and dissemination practices.</p>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">By mere use of the Website, you expressly consent to our use and disclosure of personal information provided by you in accordance with this Privacy Policy. This Privacy Policy is incorporated into and subject to the Terms of Use.</p>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">This Privacy Policy applies to all products and services provided by NJOY MART and sets out how NJOY MART may collect, use and disclose information in relation to Users of the Platform.</p>\r\n<h4 style=\"text-align: start;color: rgb(51, 51, 51);background-color: rgb(255, 255, 255);font-size: 22px;border: 0px;\"><strong><strong style=\"font-size: 22px;border: 0px;\">1.Collection of information</strong></strong></h4>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">“Personal Information”</strong></strong> of User shall include the information shared by the User and collected by us for the following purposes:</p>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">Registration on the NJOY MART: </strong></strong>If you provide any Personal Data to NJOY MART, Information which you provide while subscribing to or registering on the Website, including but not limited to information about your personal identities such as name, gender, marital status, religion, age etc., your contact details such as your email address, postal addresses, telephone (mobile or otherwise) and/or fax numbers and any other information relating to your income and/or lifestyle; billing information payment history etc. (as shared by you), you are deemed to have authorized NJOY MART to collect, retain and use that Personal Data for the following purposes:</p>\r\n<ol style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">processing the User’s registration as a user, providing the User with a log-in ID for the Platform, and maintaining and managing User’s registration;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">providing User with customer service and responding to User(s) queries, feedback, claims or disputes;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">to facilitate communication between Users on the Platform and / or process Users’ transactions on the Platform;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">performing research or statistical analysis in order to improve the content and layout of the Platform, to improve NJOY MART’s product offerings and services, and for marketing and promotional purposes;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">Subject to applicable law, NJOY MART (including our affiliated companies and their designated Service Providers) may use User’s name, phone number, residential address, email address, fax number, and other data (“Marketing Data”) to provide notices, surveys, product alerts, communications and other marketing materials to User(s) relating to products and services offered by NJOY MART or NJOY MART’s affiliated companies;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n    <li style=\"font-size: 15px;border: 0px;\">If the User voluntarily submits User information or other information to the Platform for publication on the Platform through the publishing tools, then Users are deemed to have given consent to the publication of such information on the Platform; and making such disclosures as may be required for any of the above purposes or as required by law, regulations and guidelines or in respect of any investigations, claims or potential claims brought on or against us or against third parties;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n</ol>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">Other information:</strong></strong> We may also collect some other information and documents including but not limited to:</p>\r\n<ol style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">Transactional history (other than banking details) about your e-commerce activities, buying behavior.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">Your usernames, passwords, email addresses and other security-related information used by you in relation to our Services.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">Data either created by you or by a third party and which you wish to store on our servers such as image files, documents etc.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">voice recordings of our conversations with our customer care agent with you to address your queries/grievances.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">Information pertaining to any other person for who you make a purchase through your registered NJOY MART account. In such case, you must confirm and represent that each of the other person for whom a purchase has been made, has agreed to have the information shared by you disclosed to us and further be shared by us with the concerned service provider(s).</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">In connection with any communication or transaction and payment services or any other services that you may avail using the Platform, information, including but not limited to, bank account numbers, billing and delivery information, credit/debit card numbers and expiration dates and tracking information from cheques or money orders (“Account Information”) may be collected, among other things, to facilitate the sale and purchase as well as the settlement of purchase price of the products or services transacted on or procured through the Platform.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART record and retain details of Users’ activities on the Platform. Information relating to communication or transactions including, but not limited to, the types and specifications of the goods, pricing and delivery information, any dispute records and any information disclosed in any communication forum provided by us and/or other affiliated companies of NJOY MART (“Activities Information”) may be collected as and when the communication and / or transactions are conducted through the Platform.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART record and retain records of Users’ browsing or buying activities on Platform including but not limited to IP addresses, demographic location, browsing patterns and User behavioural patterns.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">Registration Information, Account Information, Activities Information, and Browsing Information are collectively referred to as Personal Data.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">It is mandatory for Users of the Platform to provide certain categories of Personal Data (as specified at the time of collection). In the event that Users do not provide any or sufficient Personal Data marked as mandatory, NJOY MART may not be able to complete the registration process or provide such Users with NJOY MART’s products or services.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n</ol>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">Use of Demographic / Profile Data</strong></strong></p>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">We may also use your Personal Information for several reasons including but not limited to:</strong></strong></p>\r\n<ul style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">confirm your orders with the buyers/sellers;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">keep you informed of the transaction status;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">send order confirmations either via SMS or WhatsApp or any other messaging service;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">send any updates or changes to your order(s);</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">allow our customer service to contact you, if necessary;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">customize the content of our Website, mobile site and mobile app;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">request for reviews of products or services or any other improvements;</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">send verification message(s) or email(s);</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">validate/authenticate your account and to prevent any misuse or abuse.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">contact you to offer a special gift or offers.</li>\r\n</ul>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">We use personal information to provide the services you request. To the extent we use your personal information to market to you, we will provide you the ability to opt-out of such uses. We use your personal information to assist sellers in handling and fulfilling orders, enhancing customer experience, resolve disputes; troubleshoot problems; help promote a safe service; measure consumer interest in our products or services(if applicable), inform you about online and offline offers, products, and updates; customize and enhance your experience; detect and protect us against error, fraud and other criminal activity; enforce our terms and conditions; and as otherwise described to you at the time of collection.</p>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">DISCLOSURE OF PERSONAL DATA</strong></strong></p>\r\n<ol style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">User further agrees that NJOY MART may disclose and transfer User’s Personal Data to third party service providers that are providing Users with services (including but not limited to data entry, database management, promotions, products and services alerts, delivery services, payment extension services, authentication and verification services and logistics services) (“Service Providers”). These Service Providers are under a duty of confidentiality to NJOY MART and are only permitted to use Users Personal Data in connection with the purposes specified</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">We may share personal information with our other corporate entities and affiliates. These entities and affiliates may market to you as a result of such sharing unless you explicitly opt-out.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART may establish relationships with other parties and websites to offer User the benefit of products and services which NJOY MART does not offer. NJOY MART may offer you access to these other parties and/or their websites. This Privacy Policy does not apply to the products and services enabled or facilitated by such third parties. The privacy policies of those other parties may differ from NJOY MART, and NJOY MART has no control over the information that User may submit to those third parties. User should read the relevant privacy policy for those third parties before responding to and availing any offers, products or services advertised or provided by those third parties.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART may share User’s Personal Data with third parties, including without limitation, banks, financial institutions, credit agencies, or vendors to enable such third parties to offer their products or services to such Users. While NJOY MART shall Endeavour to have in place internal procedures to keep User’s Personal Data secure from intruders, there is no guarantee that such measures/procedures can eliminate all of the risks of theft, loss or misuse.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">When necessary NJOY MART may also disclose and transfer User’s Personal Data to our professional advisers, law enforcement agencies, insurers, government, and regulatory and other organizations.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">We may disclose personal information to third parties. This disclosure may be required for us to provide you access to our Services, for the fulfilment of your orders, or for enhancing your experience, to comply with our legal obligations, to enforce our User Agreement, to facilitate our marketing and advertising activities, or to prevent, detect, mitigate, and investigate fraudulent or illegal activities related to our Services. We do not disclose your personal information to third parties for their marketing and advertising purposes without your explicit consent.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">We may disclose personal information if required to do so by law or in the good faith belief that such disclosure is reasonably necessary to respond to subpoenas, court orders, or other legal process. We may disclose personal information to law enforcement offices, third-party rights owners, or others in the good faith belief that such disclosure is reasonably necessary to: enforce our Terms or Privacy Policy; respond to claims that an advertisement, posting or other content violates the rights of a third party; or protect the rights, property or personal safety of our users or the general public.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\">We and our affiliates will share/sell some or all of your personal information with another business entity should we (or our assets) plan to merge with, or be acquired by that business entity, or re-organization, amalgamate, or restructure of business. Should such a transaction occur that other business entity (or the new combined entity) will be required to follow this privacy policy with respect to your personal information.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n</ol>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">COOKIES</strong></strong></p>\r\n<ul style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART Do not use “cookies” to store specific information about User and track User(s) visits to the Sites. A “cookie” is a small amount of data that is sent to the User’s browser and stored on the User’s device. If the User does not de-activate or erase the cookie, each time User uses the same device to access the Platform. The cookies do not contain any of your personally identifiable information.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n</ul>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">Link to Other Websites</strong></strong></p>\r\n<ul style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">Our Website links to other websites that may collect personally identifiable information about you. NJOY MART is not responsible for the privacy practices or the content of those linked websites.</li>\r\n</ul>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">Your Consent</strong></strong></p>\r\n<ul style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">By using the Website and/ or by providing your information, you consent to the collection and use of the information you disclose on the Website in accordance with this Privacy Policy, including but not limited to Your consent for sharing your information as per this privacy policy. If you disclose any personal information relating to other people to us, you represent that you have the authority to do so and to permit us to use the information in accordance with this Privacy Policy.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n</ul>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">Security Precautions</strong></strong></p>\r\n<ul style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">NJOY MART employ commercially reasonable security methods to prevent unauthorized access to the Platform, to maintain data accuracy and to ensure the correct use of the information NJOY MART hold. No data transmission over the internet or any wireless network can be guaranteed to be perfectly secure. As a result, while NJOY MART try to protect the information NJOY MART hold, NJOY MART cannot guarantee the security of any information User transmit to NJOY MART and Users do so at their own risk.</li>\r\n    <li style=\"font-size: 15px;border: 0px;\"> </li>\r\n</ul>\r\n<p style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\"><strong><strong style=\"font-size: 15px;border: 0px;\">Changes to This Privacy Policy</strong></strong></p>\r\n<ul style=\"text-align: start;color: rgb(122, 122, 122);background-color: rgb(255, 255, 255);font-size: 15px;border: 0px;\">\r\n    <li style=\"font-size: 15px;border: 0px;\">Any changes to this Privacy Policy will be communicated by us posting an amended and restated Privacy Policy on the Platform. Once posted on the Platform the new Privacy Policy will be effective immediately. User agree that any information NJOY MART hold about User (as described in this Privacy Policy and whether or not collected prior to or after the new Privacy Policy became effective) will be governed by the latest version of the Privacy Policy.</li>\r\n</ul>');

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
(18, 'Vendor$$$', 'A', 'files/Copy of Reduces Pain And Inflammation.pdf', 'a@gmail.com', '1234567890', 'a1', 'at', 'ahmedabad', 'gujarat', 'pending', 'Tshirts', 'Men'),
(29, 'Hit shah', 'a', 'C:/xampp/htdocs/Hit/Njoymart-Dashboard/Njoymart-Admin/assetsPDF/Cyber_Threat_Predictive_Analytics_for_Im.pdf', 'shahhit15@gmail.com', '07405220799', 'a', 'a', 'aa', 'a', 'registered', 'logo.svg', 'a'),
(32, 'TestingNew', '', '', 'testingnew@gmail.com', '123456789120', '123456', '', '', '', '', '', ''),
(34, 'VENDORnew', '', '', 'newvendor@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(35, 'testingven', '', '', 'vend@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(37, 'test@@@', 'test', 'test', 'test@gmail.com', 'test', 'test', 'test', 'test', 'test', '', 'test!!', 'test'),
(38, 'Vendor', 'Vendor', 'Vendor', 'Vendor@gmail.com', '123456', '123456789', 'Vendor', 'Vendor', 'Vendor', '', 'Vendor', 'Image Vendor'),
(40, 'TestingVendor', '', '', 'TestingVendor@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(41, 'Testing', '', '', 'TestingVIEW@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(42, 'Testingdemo', '', '', 'testingdemo@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(43, 'Testingdemo12', '', '', 'testingdemo12@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(44, 'Testingdemo12123', '', '', 'testingdemo12123@gmail.com', '123456789012', '123456789', '', '', '', '', '', ''),
(45, 'LSDjl;kadsjflj', '', '', 'aldsfjlkds@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(46, 'sdfjladksfj', '', '', 'ldskfjasd@gmail.cojm', '123456789012', '123456', '', '', '', '', '', ''),
(47, '', '', '', '', '', '', '', '', '', '', '', ''),
(48, 'Testingdemo121231312', '', '', 'testingdemo1212312312@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(49, 'TestingnewVendor', '', '', 'TestingnewVendor@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(50, 'fjladsfjdksf', '', '', 'aldfjldsfjkl@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(51, 'sdklfkladkfjlads', '', '', 'sdlflasdfkjadsl12@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(52, 'dfjakldsjflasdkjfl', '', '', 'asdlfjasdflkdjsa12@gmail.com', '123456012132', '123456', '', '', '', '', '', ''),
(53, 'Testingnewlaqdjkfladsfjlkj', '', '', 'dasfjkasdfksdjflj##@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(54, 'TestingnewlaqdjkfladsfjlkjSDFASDFASDF', '', '', 'dasfjkasdfksdjflj##!!!@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(55, 'VNew', '', '', 'Vnew@gmail.com', '123456789012', '123456', '', '', '', '', 'logo.svg', ''),
(56, 'Somil', 'Brand_Somil', '', 'Somil_Testing@gmail.com', '123456789012', '123456', '', '', '', '', 'NjoyMart-R_1.png', 'iPhone.jpg'),
(57, 'SomilNew', '', '', 'Somil_Testing_New@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(58, 'SomilNewTesting', '', '', 'Somil_Testing_NewTesting@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(59, 'newUser', '', '', 'NewUser@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(60, 'TestingNewUser', '', '', 'TestingNewUser@gmail.com', '123456789012', '123456', '', '', '', '', '', ''),
(61, 'TestingVendorNewUser', '', '', 'TestingNews@gmail.com', '123456789012', '123456', '', '', '', '', 'logo.svg', ''),
(62, 'TestingOOO', '', '', 'TestingOOO@gmail.com', '123456789012', '123456', '', '', '', '', '7.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_logo`
--

CREATE TABLE `vendor_logo` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image_source` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor_logo`
--

INSERT INTO `vendor_logo` (`id`, `link`, `image_source`) VALUES
(1, 'index.php', 'logo.svg');

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
-- Indexes for table `about_content`
--
ALTER TABLE `about_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `all_browse_categories`
--
ALTER TABLE `all_browse_categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `featured_categories`
--
ALTER TABLE `featured_categories`
  ADD PRIMARY KEY (`category_id`);

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
-- Indexes for table `hotline_table`
--
ALTER TABLE `hotline_table`
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
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_menu`
--
ALTER TABLE `main_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_content`
--
ALTER TABLE `newsletter_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nw_customer`
--
ALTER TABLE `nw_customer`
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
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `submenuitems`
--
ALTER TABLE `submenuitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_service`
--
ALTER TABLE `terms_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`,`brand_name`);

--
-- Indexes for table `vendor_logo`
--
ALTER TABLE `vendor_logo`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `about_content`
--
ALTER TABLE `about_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `all_browse_categories`
--
ALTER TABLE `all_browse_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `cart_banner_3`
--
ALTER TABLE `cart_banner_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `featured_categories`
--
ALTER TABLE `featured_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `featured_icons`
--
ALTER TABLE `featured_icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `footer_links`
--
ALTER TABLE `footer_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13337;

--
-- AUTO_INCREMENT for table `footer_links_company`
--
ALTER TABLE `footer_links_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hotline_table`
--
ALTER TABLE `hotline_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_menu`
--
ALTER TABLE `main_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletter_content`
--
ALTER TABLE `newsletter_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nw_customer`
--
ALTER TABLE `nw_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1228852;

--
-- AUTO_INCREMENT for table `social_media_links`
--
ALTER TABLE `social_media_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `submenuitems`
--
ALTER TABLE `submenuitems`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `terms_service`
--
ALTER TABLE `terms_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `vendor_logo`
--
ALTER TABLE `vendor_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `submenuitems`
--
ALTER TABLE `submenuitems`
  ADD CONSTRAINT `submenuitems_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `menuitems` (`id`);

--
-- Constraints for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
