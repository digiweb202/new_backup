-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 07:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testone`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_content`
--

CREATE TABLE `about_content` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content_1` text DEFAULT NULL,
  `content_2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_content`
--

INSERT INTO `about_content` (`id`, `image_path`, `title`, `content_1`, `content_2`) VALUES
(1, '3.jpg', '!!!!Title', 'Content!@@@!@!!', 'Content 2');

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
-- Table structure for table `images_test`
--

CREATE TABLE `images_test` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images_test`
--

INSERT INTO `images_test` (`id`, `name`, `path`) VALUES
(1, '81S9hokCyuL._AC_SL1500_.jpg', 'D:\\xampp\\htdocs\\excel/uploads/81S9hokCyuL._AC_SL1500_.jpg'),
(2, '81S9hokCyuL._AC_SL1500_.jpg', 'D:\\xampp\\htdocs\\excel/uploads/81S9hokCyuL._AC_SL1500_.jpg'),
(3, '81S9hokCyuL._AC_SL1500_.jpg', 'D:\\xampp\\htdocs\\excel/uploads/81S9hokCyuL._AC_SL1500_.jpg'),
(4, '2023-11-02_08-26-20_81S9hokCyuL._AC_SL1500_.jpg', 'D:\\xampp\\htdocs\\excel/uploads/2023-11-02_08-26-20_81S9hokCyuL._AC_SL1500_.jpg'),
(5, '2023-11-02_08-26-51_61m+mRfSztL._AC_SL1500_.jpg', 'D:\\xampp\\htdocs\\excel/uploads/2023-11-02_08-26-51_61m+mRfSztL._AC_SL1500_.jpg'),
(6, '02-Nov-2023_08-32-08_41NCcTrkCDL._AC_SR320,320_.jpg', 'D:\\xampp\\htdocs\\excel/uploads/02-Nov-2023_08-32-08_41NCcTrkCDL._AC_SR320,320_.jpg'),
(7, '02-Nov-2023_08-33-12_41NCcTrkCDL._AC_SR320,320_.jpg', 'D:\\xampp\\htdocs\\excel/uploads/02-Nov-2023_08-33-12_41NCcTrkCDL._AC_SR320,320_.jpg'),
(8, '02-Nov-2023_08-34-25_91uUUeEkJSL._AC_SX342_.jpg', 'D:\\xampp\\htdocs\\excel/uploads/02-Nov-2023_08-34-25_91uUUeEkJSL._AC_SX342_.jpg'),
(9, '02-Nov-2023_09-55-49_71wXQyxCENL._AC_SL1500_.jpg', 'D:\\xampp\\htdocs\\excel/uploads/02-Nov-2023_09-55-49_71wXQyxCENL._AC_SL1500_.jpg');

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
  `title` varchar(255) DEFAULT NULL,
  `paragraph` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `title`, `paragraph`) VALUES
(1, 'Your Title Here', 'Your Paragraph Here!!!!');

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
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `id` int(11) NOT NULL,
  `column1` varchar(255) DEFAULT NULL,
  `column2` varchar(255) DEFAULT NULL,
  `column3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`id`, `column1`, `column2`, `column3`) VALUES
(1341, 'colume1 ', 'colume2 ', 'colume3'),
(1342, 'dsfasdfasdf12', 'sdfadsfasd23234', 'sdfadsfasdf'),
(1343, 'dsfasdfasdf13', 'sdfadsfasd23235', 'sdfadsfasdf'),
(1344, 'dsfasdfasdf14', 'sdfadsfasd23236', 'sdfadsfasdf'),
(1345, 'dsfasdfasdf15', 'sdfadsfasd23237', 'sdfadsfasdf'),
(1346, 'dsfasdfasdf16', 'sdfadsfasd23238', 'sdfadsfasdf'),
(1347, 'dsfasdfasdf17', 'sdfadsfasd23239', 'sdfadsfasdf'),
(1348, 'dsfasdfasdf18', 'sdfadsfasd23240', 'sdfadsfasdf'),
(1349, 'dsfasdfasdf19', 'sdfadsfasd23241', 'sdfadsfasdf'),
(1350, 'dsfasdfasdf20', 'sdfadsfasd23242', 'sdfadsfasdf'),
(1351, 'dsfasdfasdf21', 'sdfadsfasd23243', 'sdfadsfasdf'),
(1352, 'dsfasdfasdf22', 'sdfadsfasd23244', 'sdfadsfasdf'),
(1353, 'dsfasdfasdf23', 'sdfadsfasd23245', 'sdfadsfasdf'),
(1354, 'dsfasdfasdf24', 'sdfadsfasd23246', 'sdfadsfasdf'),
(1355, 'dsfasdfasdf25', 'sdfadsfasd23247', 'sdfadsfasdf'),
(1356, 'dsfasdfasdf26', 'sdfadsfasd23248', 'sdfadsfasdf'),
(1357, 'dsfasdfasdf27', 'sdfadsfasd23249', 'sdfadsfasdf'),
(1358, 'dsfasdfasdf28', 'sdfadsfasd23250', 'sdfadsfasdf'),
(1359, 'dsfasdfasdf29', 'sdfadsfasd23251', 'sdfadsfasdf'),
(1360, 'dsfasdfasdf30', 'sdfadsfasd23252', 'sdfadsfasdf'),
(1361, 'dsfasdfasdf31', 'sdfadsfasd23253', 'sdfadsfasdf'),
(1362, 'dsfasdfasdf32', 'sdfadsfasd23254', 'sdfadsfasdf'),
(1363, 'dsfasdfasdf33', 'sdfadsfasd23255', 'sdfadsfasdf'),
(1364, 'dsfasdfasdf34', 'sdfadsfasd23256', 'sdfadsfasdf'),
(1365, 'dsfasdfasdf35', 'sdfadsfasd23257', 'sdfadsfasdf'),
(1366, 'dsfasdfasdf36', 'sdfadsfasd23258', 'sdfadsfasdf'),
(1367, 'dsfasdfasdf37', 'sdfadsfasd23259', 'sdfadsfasdf'),
(1368, 'dsfasdfasdf38', 'sdfadsfasd23260', 'sdfadsfasdf'),
(1369, 'dsfasdfasdf39', 'sdfadsfasd23261', 'sdfadsfasdf'),
(1370, 'dsfasdfasdf', 'sdfadsfasd23262', 'sdfadsfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `table2`
--

CREATE TABLE `table2` (
  `id` int(11) NOT NULL,
  `column4` varchar(255) DEFAULT NULL,
  `column5` varchar(255) DEFAULT NULL,
  `column6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table2`
--

INSERT INTO `table2` (`id`, `column4`, `column5`, `column6`) VALUES
(1049, 'colume4', 'colume5 ', 'colume 6'),
(1050, 'asdfsdfasdf', 'sdfasdfsdf3443', 'dfadsfasdf'),
(1051, 'asdfsdfasdf', 'sdfasdfsdf3444', 'dfadsfasdf'),
(1052, 'asdfsdfasdf', 'sdfasdfsdf3445', 'dfadsfasdf'),
(1053, 'asdfsdfasdf', 'sdfasdfsdf3446', 'dfadsfasdf'),
(1054, 'asdfsdfasdf', 'sdfasdfsdf3447', 'dfadsfasdf'),
(1055, 'asdfsdfasdf', 'sdfasdfsdf3448', 'dfadsfasdf'),
(1056, 'asdfsdfasdf', 'sdfasdfsdf3449', 'dfadsfasdf'),
(1057, 'asdfsdfasdf', 'sdfasdfsdf3450', 'dfadsfasdf'),
(1058, 'asdfsdfasdf', 'sdfasdfsdf3451', 'dfadsfasdf'),
(1059, 'asdfsdfasdf', 'sdfasdfsdf3452', 'dfadsfasdf'),
(1060, 'asdfsdfasdf', 'sdfasdfsdf3453', 'dfadsfasdf'),
(1061, 'asdfsdfasdf', 'sdfasdfsdf3454', 'dfadsfasdf'),
(1062, 'asdfsdfasdf', 'sdfasdfsdf3455', 'dfadsfasdf'),
(1063, 'asdfsdfasdf', 'sdfasdfsdf3456', 'dfadsfasdf'),
(1064, 'asdfsdfasdf', 'sdfasdfsdf3457', 'dfadsfasdf'),
(1065, 'asdfsdfasdf', 'sdfasdfsdf3458', 'dfadsfasdf'),
(1066, 'asdfsdfasdf', 'sdfasdfsdf3459', 'dfadsfasdf'),
(1067, 'asdfsdfasdf', 'sdfasdfsdf3460', 'dfadsfasdf'),
(1068, 'asdfsdfasdf', 'sdfasdfsdf3461', 'dfadsfasdf'),
(1069, 'asdfsdfasdf', 'sdfasdfsdf3462', 'dfadsfasdf'),
(1070, 'asdfsdfasdf', 'sdfasdfsdf3463', 'dfadsfasdf'),
(1071, 'asdfsdfasdf', 'sdfasdfsdf3464', 'dfadsfasdf'),
(1072, 'asdfsdfasdf', 'sdfasdfsdf3465', 'dfadsfasdf'),
(1073, 'asdfsdfasdf', 'sdfasdfsdf3466', 'dfadsfasdf'),
(1074, 'asdfsdfasdf', 'sdfasdfsdf3467', 'dfadsfasdf'),
(1075, 'asdfsdfasdf', 'sdfasdfsdf3468', 'dfadsfasdf'),
(1076, 'asdfsdfasdf', 'sdfasdfsdf3469', 'dfadsfasdf'),
(1077, 'asdfsdfasdf', 'sdfasdfsdf3470', 'dfadsfasdf'),
(1078, 'asdfsdfasdf', 'sdfasdfsdf3471', 'dfadsfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `terms_service`
--

CREATE TABLE `terms_service` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `paragraph` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms_service`
--

INSERT INTO `terms_service` (`id`, `title`, `paragraph`) VALUES
(1, 'Your Title Here', 'Your Paragraph Here!!!!');

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
(56, 'Somil', 'Brand_Somil', '', 'Somil_Testing@gmail.com', '123456789012', '123456', '', '', '', '', 'NjoyMart-R_3.png', 'banner-2.jpg'),
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
-- Table structure for table `watches`
--

CREATE TABLE `watches` (
  `Product_Type` varchar(255) DEFAULT NULL,
  `Seller_SKU` varchar(255) DEFAULT NULL,
  `Brand_Name` varchar(255) DEFAULT NULL,
  `Update_Delete` varchar(255) DEFAULT NULL,
  `Item_Name` varchar(255) DEFAULT NULL,
  `Manufacturer` varchar(255) DEFAULT NULL,
  `Model_Number` varchar(255) DEFAULT NULL,
  `Manufacturer_Part_Number` varchar(255) DEFAULT NULL,
  `Product_ID` varchar(255) DEFAULT NULL,
  `Product_ID_Type` varchar(255) DEFAULT NULL,
  `Recommended_Browse_Nodes` varchar(255) DEFAULT NULL,
  `Product_Description` text DEFAULT NULL,
  `Your_Price` decimal(10,2) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Age_Range_Description` varchar(255) DEFAULT NULL,
  `Target_Gender` varchar(255) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `Model_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watches`
--

INSERT INTO `watches` (`Product_Type`, `Seller_SKU`, `Brand_Name`, `Update_Delete`, `Item_Name`, `Manufacturer`, `Model_Number`, `Manufacturer_Part_Number`, `Product_ID`, `Product_ID_Type`, `Recommended_Browse_Nodes`, `Product_Description`, `Your_Price`, `Quantity`, `Age_Range_Description`, `Target_Gender`, `ID`, `Model_Name`) VALUES
('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 13.00, 14, '15', '16', 214657, NULL),
('Product_Type', 'Seller_SKU', 'Brand_Name', 'Update_Delete', 'Item_Name', 'Manufacturer', 'Model_Number', 'Manufacturer_Part_Number', 'Product_ID', 'Product_ID_Type', 'Recommended_Browse_Nodes', 'Product_Description', 0.00, 0, 'Age_Range_Description', 'Target_Gender', 214658, 'Model_Name'),
('Product_Type', 'Seller_SKU', 'Brand_Name', 'Update_Delete', 'Item_Name', 'Manufacturer', 'Model_Number', 'Manufacturer_Part_Number', 'Product_ID', 'Product_ID_Type', 'Recommended_Browse_Nodes', 'Product_Description', 0.00, 0, 'Age_Range_Description', 'Target_Gender', 214659, 'Model_Name'),
('Product_Type', 'Seller_SKU', 'Brand_Name', 'Update_Delete', 'Item_Name', 'Manufacturer', 'Model_Number', 'Manufacturer_Part_Number', 'Product_ID', 'Product_ID_Type', 'Recommended_Browse_Nodes', 'Product_Description', 0.00, 0, 'Age_Range_Description', 'Target_Gender', 214660, 'Model_Name'),
('Product_Type', 'Seller_SKU', 'Brand_Name', 'Update_Delete', 'Item_Name', 'Manufacturer', 'Model_Number', 'Manufacturer_Part_Number', 'Product_ID', 'Product_ID_Type', 'Recommended_Browse_Nodes', 'Product_Description', 0.00, 0, 'Age_Range_Description', 'Target_Gender', 214661, 'Model_Name'),
('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 13.00, 14, '15', '16', 214662, NULL),
('Product_Type', 'Seller_SKU', 'Brand_Name', 'Update_Delete', 'Item_Name', 'Manufacturer', 'Model_Number', 'Manufacturer_Part_Number', 'Product_ID', 'Product_ID_Type', 'Recommended_Browse_Nodes', 'Product_Description', 0.00, 0, 'Age_Range_Description', 'Target_Gender', 214663, 'Model_Name'),
('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 13.00, 14, '15', '16', 214664, NULL),
('Product_Type', 'Seller_SKU', 'Brand_Name', 'Update_Delete', 'Item_Name', 'Manufacturer', 'Model_Number', 'Manufacturer_Part_Number', 'Product_ID', 'Product_ID_Type', 'Recommended_Browse_Nodes', 'Product_Description', 0.00, 0, 'Age_Range_Description', 'Target_Gender', 214665, 'Model_Name'),
('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 13.00, 14, '15', '16', 214666, NULL),
('Product_Type', 'Seller_SKU', 'Brand_Name', 'Update_Delete', 'Item_Name', 'Manufacturer', 'Model_Number', 'Manufacturer_Part_Number', 'Product_ID', 'Product_ID_Type', 'Recommended_Browse_Nodes', 'Product_Description', 0.00, 0, 'Age_Range_Description', 'Target_Gender', 214667, 'Model_Name'),
('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 13.00, 14, '15', '16', 214668, NULL),
('Product_Type', 'Seller_SKU', 'Brand_Name', 'Update_Delete', 'Item_Name', 'Manufacturer', 'Model_Number', 'Manufacturer_Part_Number', 'Product_ID', 'Product_ID_Type', 'Recommended_Browse_Nodes', 'Product_Description', 0.00, 0, 'Age_Range_Description', 'Target_Gender', 214669, 'Model_Name'),
('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 13.00, 14, '15', '16', 214670, NULL),
('Product_Type', 'Seller_SKU', 'Brand_Name', 'Update_Delete', 'Item_Name', 'Manufacturer', 'Model_Number', 'Manufacturer_Part_Number', 'Product_ID', 'Product_ID_Type', 'Recommended_Browse_Nodes', 'Product_Description', 0.00, 0, 'Age_Range_Description', 'Target_Gender', 214671, 'Model_Name'),
('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 13.00, 14, '15', '16', 214672, NULL),
('Product_Type', 'Seller_SKU', 'Brand_Name', 'Update_Delete', 'Item_Name', 'Manufacturer', 'Model_Number', 'Manufacturer_Part_Number', 'Product_ID', 'Product_ID_Type', 'Recommended_Browse_Nodes', 'Product_Description', 0.00, 0, 'Age_Range_Description', 'Target_Gender', 214673, 'Model_Name'),
('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 13.00, 14, '15', '16', 214674, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `watches_compliance`
--

CREATE TABLE `watches_compliance` (
  `Warranty_Type` varchar(255) DEFAULT NULL,
  `Warranty_Description` text DEFAULT NULL,
  `Safety_Warning` text DEFAULT NULL,
  `Legal_Disclaimer` text DEFAULT NULL,
  `Country_Region_Of_Origin` varchar(255) DEFAULT NULL,
  `Battery_Composition` varchar(255) DEFAULT NULL,
  `Is_Product_Battery` varchar(255) DEFAULT NULL,
  `Batteries_Are_Included` varchar(255) DEFAULT NULL,
  `Battery_Type_Size1` varchar(255) DEFAULT NULL,
  `Battery_Type_Size2` varchar(255) DEFAULT NULL,
  `Battery_Type_Size3` varchar(255) DEFAULT NULL,
  `Number_Of_Batteries1` int(11) DEFAULT NULL,
  `Number_Of_Batteries2` int(11) DEFAULT NULL,
  `Number_Of_Batteries3` int(11) DEFAULT NULL,
  `Battery_Weight` decimal(10,2) DEFAULT NULL,
  `Battery_Weight_Unit_Of_Measure` varchar(255) DEFAULT NULL,
  `Number_Of_Lithium_Metal_Cells` int(11) DEFAULT NULL,
  `Number_Of_Lithium_Ion_Cells` int(11) DEFAULT NULL,
  `Lithium_Battery_Packaging` varchar(255) DEFAULT NULL,
  `Watt_Hours_Per_Battery` decimal(10,2) DEFAULT NULL,
  `Lithium_Battery_Energy_Content_Unit_Of_Measure` varchar(255) DEFAULT NULL,
  `Lithium_Content` decimal(10,2) DEFAULT NULL,
  `Lithium_Battery_Weight_Unit_Of_Measure` varchar(255) DEFAULT NULL,
  `Applicable_Dangerous_Goods_Regulations1` varchar(255) DEFAULT NULL,
  `Applicable_Dangerous_Goods_Regulations2` varchar(255) DEFAULT NULL,
  `Applicable_Dangerous_Goods_Regulations3` varchar(255) DEFAULT NULL,
  `Applicable_Dangerous_Goods_Regulations4` varchar(255) DEFAULT NULL,
  `Applicable_Dangerous_Goods_Regulations5` varchar(255) DEFAULT NULL,
  `UN_Number` varchar(255) DEFAULT NULL,
  `Safety_Data_Sheet_URL` varchar(255) DEFAULT NULL,
  `Flash_Point_Celsius` decimal(10,2) DEFAULT NULL,
  `HSN_Code` varchar(255) DEFAULT NULL,
  `Material_Fabric_Regulations1` varchar(255) DEFAULT NULL,
  `Material_Fabric_Regulations2` varchar(255) DEFAULT NULL,
  `Material_Fabric_Regulations3` varchar(255) DEFAULT NULL,
  `Categorisation_GHS_Pictograms1` varchar(255) DEFAULT NULL,
  `Categorisation_GHS_Pictograms2` varchar(255) DEFAULT NULL,
  `Categorisation_GHS_Pictograms3` varchar(255) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watches_compliance`
--

INSERT INTO `watches_compliance` (`Warranty_Type`, `Warranty_Description`, `Safety_Warning`, `Legal_Disclaimer`, `Country_Region_Of_Origin`, `Battery_Composition`, `Is_Product_Battery`, `Batteries_Are_Included`, `Battery_Type_Size1`, `Battery_Type_Size2`, `Battery_Type_Size3`, `Number_Of_Batteries1`, `Number_Of_Batteries2`, `Number_Of_Batteries3`, `Battery_Weight`, `Battery_Weight_Unit_Of_Measure`, `Number_Of_Lithium_Metal_Cells`, `Number_Of_Lithium_Ion_Cells`, `Lithium_Battery_Packaging`, `Watt_Hours_Per_Battery`, `Lithium_Battery_Energy_Content_Unit_Of_Measure`, `Lithium_Content`, `Lithium_Battery_Weight_Unit_Of_Measure`, `Applicable_Dangerous_Goods_Regulations1`, `Applicable_Dangerous_Goods_Regulations2`, `Applicable_Dangerous_Goods_Regulations3`, `Applicable_Dangerous_Goods_Regulations4`, `Applicable_Dangerous_Goods_Regulations5`, `UN_Number`, `Safety_Data_Sheet_URL`, `Flash_Point_Celsius`, `HSN_Code`, `Material_Fabric_Regulations1`, `Material_Fabric_Regulations2`, `Material_Fabric_Regulations3`, `Categorisation_GHS_Pictograms1`, `Categorisation_GHS_Pictograms2`, `Categorisation_GHS_Pictograms3`, `ID`) VALUES
('17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', 28, 29, 30, 31.00, '32', 33, 34, '35', 36.00, '37', 38.00, '39', '40', '41', '42', '43', '44', '45', '46', 47.00, '48', '49', '50', '51', '52', '53', '54', 2);

-- --------------------------------------------------------

--
-- Table structure for table `watches_dimensions`
--

CREATE TABLE `watches_dimensions` (
  `Band_Width` decimal(10,2) DEFAULT NULL,
  `Band_Width_Unit_of_Measure` varchar(255) DEFAULT NULL,
  `Case_Diameter` decimal(10,2) DEFAULT NULL,
  `Case_Diameter_Unit_of_Measure` varchar(255) DEFAULT NULL,
  `Case_Shape` varchar(255) DEFAULT NULL,
  `Item_Weight` decimal(10,2) DEFAULT NULL,
  `Item_Weight_Unit_of_Measure` varchar(255) DEFAULT NULL,
  `Item_Width_Unit_Of_Measure` varchar(255) DEFAULT NULL,
  `Item_Width` decimal(10,2) DEFAULT NULL,
  `Item_Height` decimal(10,2) DEFAULT NULL,
  `Unit_Count` int(11) DEFAULT NULL,
  `Item_Height_Unit_of_Measure` varchar(255) DEFAULT NULL,
  `Item_Length_Unit_of_Measure` varchar(255) DEFAULT NULL,
  `Item_Length` decimal(10,2) DEFAULT NULL,
  `Unit_Count_Type` varchar(255) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watches_dimensions`
--

INSERT INTO `watches_dimensions` (`Band_Width`, `Band_Width_Unit_of_Measure`, `Case_Diameter`, `Case_Diameter_Unit_of_Measure`, `Case_Shape`, `Item_Weight`, `Item_Weight_Unit_of_Measure`, `Item_Width_Unit_Of_Measure`, `Item_Width`, `Item_Height`, `Unit_Count`, `Item_Height_Unit_of_Measure`, `Item_Length_Unit_of_Measure`, `Item_Length`, `Unit_Count_Type`, `ID`) VALUES
(55.00, '56', 57.00, '58', '59', 60.00, '61', '62', 63.00, 64.00, 65, '66', '67', 68.00, '69', 46465),
(0.00, 'Band_Width_Unit_of_Measure', 0.00, 'Case_Diameter_Unit_of_Measure', 'Case_Shape', 0.00, 'Item_Weight_Unit_of_Measure', 'Item_Width_Unit_Of_Measure', 0.00, 0.00, 0, 'Item_Height_Unit_of_Measure', 'Item_Length_Unit_of_Measure', 0.00, 'Unit_Count_Type', 46466),
(0.00, 'Band_Width_Unit_of_Measure', 0.00, 'Case_Diameter_Unit_of_Measure', 'Case_Shape', 0.00, 'Item_Weight_Unit_of_Measure', 'Item_Width_Unit_Of_Measure', 0.00, 0.00, 0, 'Item_Height_Unit_of_Measure', 'Item_Length_Unit_of_Measure', 0.00, 'Unit_Count_Type', 46467),
(0.00, 'Band_Width_Unit_of_Measure', 0.00, 'Case_Diameter_Unit_of_Measure', 'Case_Shape', 0.00, 'Item_Weight_Unit_of_Measure', 'Item_Width_Unit_Of_Measure', 0.00, 0.00, 0, 'Item_Height_Unit_of_Measure', 'Item_Length_Unit_of_Measure', 0.00, 'Unit_Count_Type', 46468),
(0.00, 'Band_Width_Unit_of_Measure', 0.00, 'Case_Diameter_Unit_of_Measure', 'Case_Shape', 0.00, 'Item_Weight_Unit_of_Measure', 'Item_Width_Unit_Of_Measure', 0.00, 0.00, 0, 'Item_Height_Unit_of_Measure', 'Item_Length_Unit_of_Measure', 0.00, 'Unit_Count_Type', 46469),
(55.00, '56', 57.00, '58', '59', 60.00, '61', '62', 63.00, 64.00, 65, '66', '67', 68.00, '69', 46470),
(0.00, 'Band_Width_Unit_of_Measure', 0.00, 'Case_Diameter_Unit_of_Measure', 'Case_Shape', 0.00, 'Item_Weight_Unit_of_Measure', 'Item_Width_Unit_Of_Measure', 0.00, 0.00, 0, 'Item_Height_Unit_of_Measure', 'Item_Length_Unit_of_Measure', 0.00, 'Unit_Count_Type', 46471),
(55.00, '56', 57.00, '58', '59', 60.00, '61', '62', 63.00, 64.00, 65, '66', '67', 68.00, '69', 46472),
(0.00, 'Band_Width_Unit_of_Measure', 0.00, 'Case_Diameter_Unit_of_Measure', 'Case_Shape', 0.00, 'Item_Weight_Unit_of_Measure', 'Item_Width_Unit_Of_Measure', 0.00, 0.00, 0, 'Item_Height_Unit_of_Measure', 'Item_Length_Unit_of_Measure', 0.00, 'Unit_Count_Type', 46473),
(55.00, '56', 57.00, '58', '59', 60.00, '61', '62', 63.00, 64.00, 65, '66', '67', 68.00, '69', 46474),
(0.00, 'Band_Width_Unit_of_Measure', 0.00, 'Case_Diameter_Unit_of_Measure', 'Case_Shape', 0.00, 'Item_Weight_Unit_of_Measure', 'Item_Width_Unit_Of_Measure', 0.00, 0.00, 0, 'Item_Height_Unit_of_Measure', 'Item_Length_Unit_of_Measure', 0.00, 'Unit_Count_Type', 46475),
(55.00, '56', 57.00, '58', '59', 60.00, '61', '62', 63.00, 64.00, 65, '66', '67', 68.00, '69', 46476),
(0.00, 'Band_Width_Unit_of_Measure', 0.00, 'Case_Diameter_Unit_of_Measure', 'Case_Shape', 0.00, 'Item_Weight_Unit_of_Measure', 'Item_Width_Unit_Of_Measure', 0.00, 0.00, 0, 'Item_Height_Unit_of_Measure', 'Item_Length_Unit_of_Measure', 0.00, 'Unit_Count_Type', 46477),
(55.00, '56', 57.00, '58', '59', 60.00, '61', '62', 63.00, 64.00, 65, '66', '67', 68.00, '69', 46478),
(0.00, 'Band_Width_Unit_of_Measure', 0.00, 'Case_Diameter_Unit_of_Measure', 'Case_Shape', 0.00, 'Item_Weight_Unit_of_Measure', 'Item_Width_Unit_Of_Measure', 0.00, 0.00, 0, 'Item_Height_Unit_of_Measure', 'Item_Length_Unit_of_Measure', 0.00, 'Unit_Count_Type', 46479),
(55.00, '56', 57.00, '58', '59', 60.00, '61', '62', 63.00, 64.00, 65, '66', '67', 68.00, '69', 46480),
(0.00, 'Band_Width_Unit_of_Measure', 0.00, 'Case_Diameter_Unit_of_Measure', 'Case_Shape', 0.00, 'Item_Weight_Unit_of_Measure', 'Item_Width_Unit_Of_Measure', 0.00, 0.00, 0, 'Item_Height_Unit_of_Measure', 'Item_Length_Unit_of_Measure', 0.00, 'Unit_Count_Type', 46481),
(55.00, '56', 57.00, '58', '59', 60.00, '61', '62', 63.00, 64.00, 65, '66', '67', 68.00, '69', 46482);

-- --------------------------------------------------------

--
-- Table structure for table `watches_discovery`
--

CREATE TABLE `watches_discovery` (
  `Target_Audience1` varchar(255) DEFAULT NULL,
  `Target_Audience2` varchar(255) DEFAULT NULL,
  `Target_Audience3` varchar(255) DEFAULT NULL,
  `Target_Audience4` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `Bullet_Point1` text DEFAULT NULL,
  `Bullet_Point2` text DEFAULT NULL,
  `Bullet_Point3` text DEFAULT NULL,
  `Bullet_Point4` text DEFAULT NULL,
  `Bullet_Point5` text DEFAULT NULL,
  `Search_Terms` text DEFAULT NULL,
  `Band_Material` varchar(255) DEFAULT NULL,
  `Case_Thickness` decimal(10,2) DEFAULT NULL,
  `Band_Colour` varchar(255) DEFAULT NULL,
  `Clasp_Type` varchar(255) DEFAULT NULL,
  `Case_Material1` varchar(255) DEFAULT NULL,
  `Crystal_Material` varchar(255) DEFAULT NULL,
  `Display_Type` varchar(255) DEFAULT NULL,
  `Calendar_Type` varchar(255) DEFAULT NULL,
  `Water_Resistance_Depth` decimal(10,2) DEFAULT NULL,
  `Water_Resistance_Depth_Unit_of_Measure` varchar(255) DEFAULT NULL,
  `Additional_Features1` varchar(255) DEFAULT NULL,
  `Additional_Features2` varchar(255) DEFAULT NULL,
  `Additional_Features3` varchar(255) DEFAULT NULL,
  `Additional_Features4` varchar(255) DEFAULT NULL,
  `Additional_Features5` varchar(255) DEFAULT NULL,
  `Character` varchar(255) DEFAULT NULL,
  `Sport1` varchar(255) DEFAULT NULL,
  `Sport2` varchar(255) DEFAULT NULL,
  `Sport3` varchar(255) DEFAULT NULL,
  `Collection` varchar(255) DEFAULT NULL,
  `Case_Thickness_Unit_of_Measure` varchar(255) DEFAULT NULL,
  `Band_Length` varchar(255) DEFAULT NULL,
  `Packer` varchar(255) DEFAULT NULL,
  `Item_Type_Name` varchar(255) DEFAULT NULL,
  `Operating_Systems` varchar(255) DEFAULT NULL,
  `Supported_Application` varchar(255) DEFAULT NULL,
  `Colour_Map` varchar(255) DEFAULT NULL,
  `Importer` varchar(255) DEFAULT NULL,
  `Fur_Description` varchar(255) DEFAULT NULL,
  `Band_Length_Unit` varchar(255) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Water_Resistance_Level` varchar(255) DEFAULT NULL,
  `Size` varchar(255) DEFAULT NULL,
  `Directions` text DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watches_discovery`
--

INSERT INTO `watches_discovery` (`Target_Audience1`, `Target_Audience2`, `Target_Audience3`, `Target_Audience4`, `Gender`, `Bullet_Point1`, `Bullet_Point2`, `Bullet_Point3`, `Bullet_Point4`, `Bullet_Point5`, `Search_Terms`, `Band_Material`, `Case_Thickness`, `Band_Colour`, `Clasp_Type`, `Case_Material1`, `Crystal_Material`, `Display_Type`, `Calendar_Type`, `Water_Resistance_Depth`, `Water_Resistance_Depth_Unit_of_Measure`, `Additional_Features1`, `Additional_Features2`, `Additional_Features3`, `Additional_Features4`, `Additional_Features5`, `Character`, `Sport1`, `Sport2`, `Sport3`, `Collection`, `Case_Thickness_Unit_of_Measure`, `Band_Length`, `Packer`, `Item_Type_Name`, `Operating_Systems`, `Supported_Application`, `Colour_Map`, `Importer`, `Fur_Description`, `Band_Length_Unit`, `Color`, `Water_Resistance_Level`, `Size`, `Directions`, `ID`) VALUES
('70', '71', '72', '73', '74', '75', '76', '77', '78', '79', '80', '81', 82.00, '83', '84', '85', '86', '87', '88', 89.00, '90', '91', '92', '93', '94', '95', '96', '97', '98', '99', '100', '101', '102', '103', '104', '105', '106', '107', '108', '109', '110', '111', '112', '113', '114', 33);

-- --------------------------------------------------------

--
-- Table structure for table `watches_fulfillment`
--

CREATE TABLE `watches_fulfillment` (
  `Fulfilment_Centre_ID` varchar(255) DEFAULT NULL,
  `Package_Length` decimal(10,2) DEFAULT NULL,
  `Item_Package_Length_Unit_of_Measure` varchar(255) DEFAULT NULL,
  `Package_Height` decimal(10,2) DEFAULT NULL,
  `Item_Package_Height_Unit_of_Measure` varchar(255) DEFAULT NULL,
  `Package_Width` decimal(10,2) DEFAULT NULL,
  `Item_Package_Width_Unit_of_Measure` varchar(255) DEFAULT NULL,
  `Package_Weight` decimal(10,2) DEFAULT NULL,
  `Item_Package_Weight_Unit_of_Measure` varchar(255) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watches_fulfillment`
--

INSERT INTO `watches_fulfillment` (`Fulfilment_Centre_ID`, `Package_Length`, `Item_Package_Length_Unit_of_Measure`, `Package_Height`, `Item_Package_Height_Unit_of_Measure`, `Package_Width`, `Item_Package_Width_Unit_of_Measure`, `Package_Weight`, `Item_Package_Weight_Unit_of_Measure`, `ID`) VALUES
('115', 116.00, '117', 118.00, '119', 120.00, '121', 122.00, '123', 12289),
('Fulfilment_Centre_ID', 0.00, 'Item_Package_Length_Unit_of_Measure', 0.00, 'Item_Package_Height_Unit_of_Measure', 0.00, 'Item_Package_Width_Unit_of_Measure', 0.00, 'Item_Package_Weight_Unit_of_Measure', 12290),
('Fulfilment_Centre_ID', 0.00, 'Item_Package_Length_Unit_of_Measure', 0.00, 'Item_Package_Height_Unit_of_Measure', 0.00, 'Item_Package_Width_Unit_of_Measure', 0.00, 'Item_Package_Weight_Unit_of_Measure', 12291),
('Fulfilment_Centre_ID', 0.00, 'Item_Package_Length_Unit_of_Measure', 0.00, 'Item_Package_Height_Unit_of_Measure', 0.00, 'Item_Package_Width_Unit_of_Measure', 0.00, 'Item_Package_Weight_Unit_of_Measure', 12292),
('Fulfilment_Centre_ID', 0.00, 'Item_Package_Length_Unit_of_Measure', 0.00, 'Item_Package_Height_Unit_of_Measure', 0.00, 'Item_Package_Width_Unit_of_Measure', 0.00, 'Item_Package_Weight_Unit_of_Measure', 12293),
('115', 116.00, '117', 118.00, '119', 120.00, '121', 122.00, '123', 12294),
('Fulfilment_Centre_ID', 0.00, 'Item_Package_Length_Unit_of_Measure', 0.00, 'Item_Package_Height_Unit_of_Measure', 0.00, 'Item_Package_Width_Unit_of_Measure', 0.00, 'Item_Package_Weight_Unit_of_Measure', 12295),
('115', 116.00, '117', 118.00, '119', 120.00, '121', 122.00, '123', 12296),
('Fulfilment_Centre_ID', 0.00, 'Item_Package_Length_Unit_of_Measure', 0.00, 'Item_Package_Height_Unit_of_Measure', 0.00, 'Item_Package_Width_Unit_of_Measure', 0.00, 'Item_Package_Weight_Unit_of_Measure', 12297),
('115', 116.00, '117', 118.00, '119', 120.00, '121', 122.00, '123', 12298),
('Fulfilment_Centre_ID', 0.00, 'Item_Package_Length_Unit_of_Measure', 0.00, 'Item_Package_Height_Unit_of_Measure', 0.00, 'Item_Package_Width_Unit_of_Measure', 0.00, 'Item_Package_Weight_Unit_of_Measure', 12299),
('115', 116.00, '117', 118.00, '119', 120.00, '121', 122.00, '123', 12300),
('Fulfilment_Centre_ID', 0.00, 'Item_Package_Length_Unit_of_Measure', 0.00, 'Item_Package_Height_Unit_of_Measure', 0.00, 'Item_Package_Width_Unit_of_Measure', 0.00, 'Item_Package_Weight_Unit_of_Measure', 12301),
('115', 116.00, '117', 118.00, '119', 120.00, '121', 122.00, '123', 12302),
('Fulfilment_Centre_ID', 0.00, 'Item_Package_Length_Unit_of_Measure', 0.00, 'Item_Package_Height_Unit_of_Measure', 0.00, 'Item_Package_Width_Unit_of_Measure', 0.00, 'Item_Package_Weight_Unit_of_Measure', 12303),
('115', 116.00, '117', 118.00, '119', 120.00, '121', 122.00, '123', 12304),
('Fulfilment_Centre_ID', 0.00, 'Item_Package_Length_Unit_of_Measure', 0.00, 'Item_Package_Height_Unit_of_Measure', 0.00, 'Item_Package_Width_Unit_of_Measure', 0.00, 'Item_Package_Weight_Unit_of_Measure', 12305),
('115', 116.00, '117', 118.00, '119', 120.00, '121', 122.00, '123', 12306);

-- --------------------------------------------------------

--
-- Table structure for table `watches_img`
--

CREATE TABLE `watches_img` (
  `Main_Image_URL` varchar(255) DEFAULT NULL,
  `Other_Image_URL1` varchar(255) DEFAULT NULL,
  `Other_Image_URL2` varchar(255) DEFAULT NULL,
  `Other_Image_URL3` varchar(255) DEFAULT NULL,
  `Other_Image_URL4` varchar(255) DEFAULT NULL,
  `Other_Image_URL5` varchar(255) DEFAULT NULL,
  `Other_Image_URL6` varchar(255) DEFAULT NULL,
  `Other_Image_URL7` varchar(255) DEFAULT NULL,
  `Other_Image_URL8` varchar(255) DEFAULT NULL,
  `Swatch_Image_URL` varchar(255) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watches_img`
--

INSERT INTO `watches_img` (`Main_Image_URL`, `Other_Image_URL1`, `Other_Image_URL2`, `Other_Image_URL3`, `Other_Image_URL4`, `Other_Image_URL5`, `Other_Image_URL6`, `Other_Image_URL7`, `Other_Image_URL8`, `Swatch_Image_URL`, `ID`) VALUES
('124', '125', '126', '127', '128', '129', '130', '131', '132', '133', 12),
('Target_Gender', 'Main_Image_URL', 'Other_Image_URL1', 'Other_Image_URL2', 'Other_Image_URL3', 'Other_Image_URL4', 'Other_Image_URL5', 'Other_Image_URL6', 'Other_Image_URL7', 'Other_Image_URL8', 13),
('Target_Gender', 'Main_Image_URL', 'Other_Image_URL1', 'Other_Image_URL2', 'Other_Image_URL3', 'Other_Image_URL4', 'Other_Image_URL5', 'Other_Image_URL6', 'Other_Image_URL7', 'Other_Image_URL8', 14),
('Target_Gender', 'Main_Image_URL', 'Other_Image_URL1', 'Other_Image_URL2', 'Other_Image_URL3', 'Other_Image_URL4', 'Other_Image_URL5', 'Other_Image_URL6', 'Other_Image_URL7', 'Other_Image_URL8', 15),
('Target_Gender', 'Main_Image_URL', 'Other_Image_URL1', 'Other_Image_URL2', 'Other_Image_URL3', 'Other_Image_URL4', 'Other_Image_URL5', 'Other_Image_URL6', 'Other_Image_URL7', 'Other_Image_URL8', 16),
('16', '124', '125', '126', '127', '128', '129', '130', '131', '132', 17),
('Target_Gender', 'Main_Image_URL', 'Other_Image_URL1', 'Other_Image_URL2', 'Other_Image_URL3', 'Other_Image_URL4', 'Other_Image_URL5', 'Other_Image_URL6', 'Other_Image_URL7', 'Other_Image_URL8', 18),
('16', '124', '125', '126', '127', '128', '129', '130', '131', '132', 19),
('Target_Gender', 'Main_Image_URL', 'Other_Image_URL1', 'Other_Image_URL2', 'Other_Image_URL3', 'Other_Image_URL4', 'Other_Image_URL5', 'Other_Image_URL6', 'Other_Image_URL7', 'Other_Image_URL8', 20),
('16', '124', '125', '126', '127', '128', '129', '130', '131', '132', 21),
('Target_Gender', 'Main_Image_URL', 'Other_Image_URL1', 'Other_Image_URL2', 'Other_Image_URL3', 'Other_Image_URL4', 'Other_Image_URL5', 'Other_Image_URL6', 'Other_Image_URL7', 'Other_Image_URL8', 22),
('16', '124', '125', '126', '127', '128', '129', '130', '131', '132', 23),
('Target_Gender', 'Main_Image_URL', 'Other_Image_URL1', 'Other_Image_URL2', 'Other_Image_URL3', 'Other_Image_URL4', 'Other_Image_URL5', 'Other_Image_URL6', 'Other_Image_URL7', 'Other_Image_URL8', 24),
('16', '124', '125', '126', '127', '128', '129', '130', '131', '132', 25),
('Target_Gender', 'Main_Image_URL', 'Other_Image_URL1', 'Other_Image_URL2', 'Other_Image_URL3', 'Other_Image_URL4', 'Other_Image_URL5', 'Other_Image_URL6', 'Other_Image_URL7', 'Other_Image_URL8', 26),
('16', '124', '125', '126', '127', '128', '129', '130', '131', '132', 27),
('Target_Gender', 'Main_Image_URL', 'Other_Image_URL1', 'Other_Image_URL2', 'Other_Image_URL3', 'Other_Image_URL4', 'Other_Image_URL5', 'Other_Image_URL6', 'Other_Image_URL7', 'Other_Image_URL8', 28),
('16', '124', '125', '126', '127', '128', '129', '130', '131', '132', 29);

-- --------------------------------------------------------

--
-- Table structure for table `watches_offer`
--

CREATE TABLE `watches_offer` (
  `Currency` varchar(255) DEFAULT NULL,
  `Condition` varchar(255) DEFAULT NULL,
  `Condition_Note` text DEFAULT NULL,
  `Launch_Date` date DEFAULT NULL,
  `Release_Date` date DEFAULT NULL,
  `Sale_Price` decimal(10,2) DEFAULT NULL,
  `Product_Tax_Code` varchar(255) DEFAULT NULL,
  `Sale_Start_Date` date DEFAULT NULL,
  `Sale_End_Date` date DEFAULT NULL,
  `List_Price` decimal(10,2) DEFAULT NULL,
  `Restock_Date` date DEFAULT NULL,
  `Handling_Time` varchar(255) DEFAULT NULL,
  `Can_Be_Gift_Messaged` varchar(255) DEFAULT NULL,
  `Is_Gift_Wrap_Available` varchar(255) DEFAULT NULL,
  `Is_Discontinued_By_Manufacturer` varchar(255) DEFAULT NULL,
  `Number_Of_Items` int(11) DEFAULT NULL,
  `Max_Order_Quantity` int(11) DEFAULT NULL,
  `Shipping_Template` varchar(255) DEFAULT NULL,
  `Minimum_Advertised_Price` decimal(10,2) DEFAULT NULL,
  `Offer_End_Date` date DEFAULT NULL,
  `Offer_Start_Date` date DEFAULT NULL,
  `Maximum_Retail_Price` decimal(10,2) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watches_offer`
--

INSERT INTO `watches_offer` (`Currency`, `Condition`, `Condition_Note`, `Launch_Date`, `Release_Date`, `Sale_Price`, `Product_Tax_Code`, `Sale_Start_Date`, `Sale_End_Date`, `List_Price`, `Restock_Date`, `Handling_Time`, `Can_Be_Gift_Messaged`, `Is_Gift_Wrap_Available`, `Is_Discontinued_By_Manufacturer`, `Number_Of_Items`, `Max_Order_Quantity`, `Shipping_Template`, `Minimum_Advertised_Price`, `Offer_End_Date`, `Offer_Start_Date`, `Maximum_Retail_Price`, `ID`) VALUES
('134', '135', '136', '0000-00-00', '0000-00-00', 139.00, '140', '2023-11-21', '2023-11-09', 143.00, '2023-11-16', '145', '146', '147', '148', 149, 150, '151', 152.00, '2023-11-16', '2023-11-14', 155.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `watches_product_enrichment`
--

CREATE TABLE `watches_product_enrichment` (
  `Dial_Colour` varchar(255) DEFAULT NULL,
  `Bezel_Material` varchar(255) DEFAULT NULL,
  `Bezel_Function` varchar(255) DEFAULT NULL,
  `Movement_Type` varchar(255) DEFAULT NULL,
  `Band_Size` varchar(255) DEFAULT NULL,
  `Flash_Point_Unit_of_Measure` varchar(255) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watches_product_enrichment`
--

INSERT INTO `watches_product_enrichment` (`Dial_Colour`, `Bezel_Material`, `Bezel_Function`, `Movement_Type`, `Band_Size`, `Flash_Point_Unit_of_Measure`, `ID`) VALUES
('156', '157', '158', '159', '160', '161', 7),
('Dial_Colour', 'Bezel_Material', 'Bezel_Function', 'Movement_Type', 'Band_Size', 'Flash_Point_Unit_of_Measure', 8),
('Dial_Colour', 'Bezel_Material', 'Bezel_Function', 'Movement_Type', 'Band_Size', 'Flash_Point_Unit_of_Measure', 9),
('Dial_Colour', 'Bezel_Material', 'Bezel_Function', 'Movement_Type', 'Band_Size', 'Flash_Point_Unit_of_Measure', 10),
('Dial_Colour', 'Bezel_Material', 'Bezel_Function', 'Movement_Type', 'Band_Size', 'Flash_Point_Unit_of_Measure', 11),
('156', '157', '158', '159', '160', '161', 12),
('Dial_Colour', 'Bezel_Material', 'Bezel_Function', 'Movement_Type', 'Band_Size', 'Flash_Point_Unit_of_Measure', 13),
('156', '157', '158', '159', '160', '161', 14),
('Dial_Colour', 'Bezel_Material', 'Bezel_Function', 'Movement_Type', 'Band_Size', 'Flash_Point_Unit_of_Measure', 15),
('156', '157', '158', '159', '160', '161', 16),
('Dial_Colour', 'Bezel_Material', 'Bezel_Function', 'Movement_Type', 'Band_Size', 'Flash_Point_Unit_of_Measure', 17),
('156', '157', '158', '159', '160', '161', 18),
('Dial_Colour', 'Bezel_Material', 'Bezel_Function', 'Movement_Type', 'Band_Size', 'Flash_Point_Unit_of_Measure', 19),
('156', '157', '158', '159', '160', '161', 20),
('Dial_Colour', 'Bezel_Material', 'Bezel_Function', 'Movement_Type', 'Band_Size', 'Flash_Point_Unit_of_Measure', 21),
('156', '157', '158', '159', '160', '161', 22),
('Dial_Colour', 'Bezel_Material', 'Bezel_Function', 'Movement_Type', 'Band_Size', 'Flash_Point_Unit_of_Measure', 23),
('156', '157', '158', '159', '160', '161', 24);

-- --------------------------------------------------------

--
-- Table structure for table `watches_variation`
--

CREATE TABLE `watches_variation` (
  `Parentage` varchar(255) DEFAULT NULL,
  `Variation_Theme` varchar(255) DEFAULT NULL,
  `Relationship_Type` varchar(255) DEFAULT NULL,
  `Parent_SKU` varchar(255) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watches_variation`
--

INSERT INTO `watches_variation` (`Parentage`, `Variation_Theme`, `Relationship_Type`, `Parent_SKU`, `ID`) VALUES
('162', '163', '164', '165', 8),
('Swatch_Image_URL', 'Parentage', 'Variation_Theme', 'Relationship_Type', 9),
('Swatch_Image_URL', 'Parentage', 'Variation_Theme', 'Relationship_Type', 10),
('Swatch_Image_URL', 'Parentage', 'Variation_Theme', 'Relationship_Type', 11),
('Swatch_Image_URL', 'Parentage', 'Variation_Theme', 'Relationship_Type', 12),
('133', '162', '163', '164', 13),
('Swatch_Image_URL', 'Parentage', 'Variation_Theme', 'Relationship_Type', 14),
('133', '162', '163', '164', 15),
('Swatch_Image_URL', 'Parentage', 'Variation_Theme', 'Relationship_Type', 16),
('133', '162', '163', '164', 17),
('Swatch_Image_URL', 'Parentage', 'Variation_Theme', 'Relationship_Type', 18),
('133', '162', '163', '164', 19),
('Swatch_Image_URL', 'Parentage', 'Variation_Theme', 'Relationship_Type', 20),
('133', '162', '163', '164', 21),
('Swatch_Image_URL', 'Parentage', 'Variation_Theme', 'Relationship_Type', 22),
('133', '162', '163', '164', 23),
('Swatch_Image_URL', 'Parentage', 'Variation_Theme', 'Relationship_Type', 24),
('133', '162', '163', '164', 25);

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
-- Indexes for table `images_test`
--
ALTER TABLE `images_test`
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
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table2`
--
ALTER TABLE `table2`
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
-- Indexes for table `watches`
--
ALTER TABLE `watches`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `watches_compliance`
--
ALTER TABLE `watches_compliance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `watches_dimensions`
--
ALTER TABLE `watches_dimensions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `watches_discovery`
--
ALTER TABLE `watches_discovery`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `watches_fulfillment`
--
ALTER TABLE `watches_fulfillment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `watches_img`
--
ALTER TABLE `watches_img`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `watches_offer`
--
ALTER TABLE `watches_offer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `watches_product_enrichment`
--
ALTER TABLE `watches_product_enrichment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `watches_variation`
--
ALTER TABLE `watches_variation`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT for table `images_test`
--
ALTER TABLE `images_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1238848;

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
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1371;

--
-- AUTO_INCREMENT for table `table2`
--
ALTER TABLE `table2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1079;

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
-- AUTO_INCREMENT for table `watches`
--
ALTER TABLE `watches`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214675;

--
-- AUTO_INCREMENT for table `watches_compliance`
--
ALTER TABLE `watches_compliance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `watches_dimensions`
--
ALTER TABLE `watches_dimensions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46483;

--
-- AUTO_INCREMENT for table `watches_discovery`
--
ALTER TABLE `watches_discovery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `watches_fulfillment`
--
ALTER TABLE `watches_fulfillment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12307;

--
-- AUTO_INCREMENT for table `watches_img`
--
ALTER TABLE `watches_img`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `watches_offer`
--
ALTER TABLE `watches_offer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `watches_product_enrichment`
--
ALTER TABLE `watches_product_enrichment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `watches_variation`
--
ALTER TABLE `watches_variation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
