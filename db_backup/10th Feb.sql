-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2014 at 10:58 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2014_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `descr` varchar(256) DEFAULT NULL,
  `img` varchar(256) DEFAULT NULL,
  `thumb_img` varchar(60) NOT NULL,
  `link` varchar(256) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `descr`, `img`, `thumb_img`, `link`, `status`) VALUES
(2, 'first advertisement', 'first advertisement', '1391663314_breakfast2.jpg', '1391663314_thumb_breakfast2.jpg', 'http://crm.codetrio.com', 1),
(3, 'Testing Advertisement', 'This is a testing advertisement', '1391951246_breakfast2.jpg', '1391951246_thumb_breakfast2.jpg', 'http://crm.codetrio.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descr` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL,
  `thumb_img` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `menu_id`, `title`, `descr`, `img`, `thumb_img`) VALUES
(5, 4, 'Vegetables', 'Various type of vegitables', '1391653482_vegetables.jpg', '1391653482_thumb_vegetables.jpg'),
(4, 7, 'Soft Drinks', 'Various type of drinks', '1391653457_drinks2.jpg', '1391653457_thumb_drinks2.jpg'),
(6, 5, 'Test Main Dish', 'Test Main Dish Category', '1391882218_brunch.jpg', '1391882218_thumb_brunch.jpg'),
(7, 6, 'Test Desert Cat', 'Test Desert Category', '1391883821_image1.jpeg', '1391883821_thumb_image1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `categories_menus_canceled`
--

CREATE TABLE IF NOT EXISTS `categories_menus_canceled` (
  `category_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories_menus_canceled`
--

INSERT INTO `categories_menus_canceled` (`category_id`, `menu_id`) VALUES
(4, 6),
(4, 5),
(4, 4),
(4, 7),
(5, 4),
(5, 5),
(5, 6),
(5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descr` tinytext NOT NULL,
  `img` varchar(256) NOT NULL,
  `thumb_img` varchar(60) NOT NULL,
  `ingredients` tinytext NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `title`, `descr`, `img`, `thumb_img`, `ingredients`, `price`, `discount`, `is_featured`) VALUES
(2, 5, 'Pulmkeen Vegetables fry', 'Pulmkeen Vegetables fry', '1391663482_breakfast2.jpg', '1391663482_thumb_breakfast2.jpg', 'Green Spices, Red Spices, Mastard Oil, Garlic, Onion', 20, 0, 1),
(3, 5, 'Tomatoes Vege', 'Green Vegetalble of tomatos', '1391663989_vegetables.jpg', '1391663989_thumb_vegetables.jpg', 'Spice, Dry Spice', 23, 0, 1),
(4, 4, 'Sprite 250ml', 'Sprite Cane 250ml of 4degree temperature', '1391711198_sprite.jpeg', '1391711198_thumb_sprite.jpeg', 'Sugar, Soda', 50, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `descr` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL,
  `thumb_img` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `descr`, `img`, `thumb_img`) VALUES
(4, 'Starter', 'Starter Categories should be shown', '1391652969_breakfast2.jpg', '1391652969_thumb_breakfast2.jpg'),
(5, 'Main Dish', 'Main Dish food items will be shown', '1391653291_brunch.jpg', '1391653291_thumb_brunch.jpg'),
(6, 'Desert', 'Desert food items can be found here', '1391653388_lunch.jpeg', '1391653388_thumb_lunch.jpeg'),
(7, 'Drinks', 'Drinks food items', '1391653422_brunch.jpeg', '1391653422_thumb_brunch.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_id` int(11) NOT NULL,
  `waiter_id` int(11) NOT NULL,
  `items` blob NOT NULL,
  `grand_total` float NOT NULL DEFAULT '0',
  `is_printed` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `comments` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `table_id`, `waiter_id`, `items`, `grand_total`, `is_printed`, `created`, `comments`) VALUES
(6, 1, 2, 0x59546f7a4f6e74704f6a413759546f7a4f6e747a4f6a4936496d6c6b496a747a4f6a4536496a49694f334d364d544536496d6c755a334a6c5a476c6c626e527a496a747a4f6a59304f694a48636d566c6269425463476c6a5a584d734943416749464a6c5a43425463476c6a5a584d73494341674945316863335268636d516754326c734c4341674943424859584a7361574d73494341674945397561573975496a747a4f6a6736496e46315957353061585235496a74704f6a493766576b364d5474684f6a4d3665334d364d6a6f69615751694f334d364d546f694d794937637a6f784d546f696157356e636d566b6157567564484d694f334d364d546336496c4e7761574e6c4c43416752484a3549464e7761574e6c496a747a4f6a6736496e46315957353061585235496a74704f6a493766576b364d6a74684f6a4d3665334d364d6a6f69615751694f334d364d546f694e434937637a6f784d546f696157356e636d566b6157567564484d694f334d364d544936496c4e315a3246794c4341675532396b59534937637a6f344f694a786457467564476c306553493761546f784f333139, 136, 0, '2014-02-11 07:43:55', ''),
(7, 1, 2, 0x59546f7a4f6e74704f6a413759546f7a4f6e747a4f6a4936496d6c6b496a747a4f6a4536496a49694f334d364d544536496d6c755a334a6c5a476c6c626e527a496a747a4f6a59344f694a48636d566c6269425463476c6a5a584d7349434167494342535a575167553342705932567a4c434167494341675457467a644746795a43425061577773494341674943424859584a7361574d734943416749434250626d6c7662694937637a6f344f694a786457467564476c306553493761546f784f3331704f6a453759546f7a4f6e747a4f6a4936496d6c6b496a747a4f6a4536496a4d694f334d364d544536496d6c755a334a6c5a476c6c626e527a496a747a4f6a45334f694a5463476c6a5a537767494552796553425463476c6a5a534937637a6f344f694a786457467564476c306553493761546f784f3331704f6a493759546f7a4f6e747a4f6a4936496d6c6b496a747a4f6a4536496a51694f334d364d544536496d6c755a334a6c5a476c6c626e527a496a747a4f6a45794f694a54645764686369776749464e765a4745694f334d364f446f6963585668626e527064486b694f326b364d54743966513d3d, 93, 0, '2014-02-11 07:46:53', ''),
(8, 1, 2, 0x59546f784f6e74704f6a413759546f7a4f6e747a4f6a4936496d6c6b496a747a4f6a4536496a49694f334d364d544536496d6c755a334a6c5a476c6c626e527a496a747a4f6a4d354f694a48636d566c6269425463476c6a5a584d73494342535a575167553342705932567a4c4341675457467a644746795a434250615777694f334d364f446f6963585668626e527064486b694f326b364d54743966513d3d, 20, 0, '2014-02-11 08:09:04', ''),
(9, 1, 2, 0x59546f794f6e74704f6a413759546f7a4f6e747a4f6a4936496d6c6b496a747a4f6a4536496a49694f334d364d544536496d6c755a334a6c5a476c6c626e527a496a747a4f6a55324f694a48636d566c6269425463476c6a5a584d73494342535a575167553342705932567a4c4341675457467a644746795a434250615777734943424859584a7361574d7349434250626d6c7662694937637a6f344f694a786457467564476c306553493761546f304f3331704f6a453759546f7a4f6e747a4f6a4936496d6c6b496a747a4f6a4536496a51694f334d364d544536496d6c755a334a6c5a476c6c626e527a496a747a4f6a457a4f694a5464576468636977674943425462325268496a747a4f6a6736496e46315957353061585235496a74704f6a4d376658303d, 230, 0, '2014-02-12 02:07:59', ''),
(10, 1, 2, 0x59546f784f6e74704f6a413759546f7a4f6e747a4f6a4936496d6c6b496a747a4f6a4536496a49694f334d364d544536496d6c755a334a6c5a476c6c626e527a496a747a4f6a49354f6949675457467a644746795a434250615777734943424859584a7361574d7349434250626d6c7662694937637a6f344f694a786457467564476c306553493761546f794f333139, 40, 0, '2014-02-12 08:41:05', ''),
(11, 1, 2, 0x59546f7a4f6e74704f6a413759546f7a4f6e747a4f6a4936496d6c6b496a747a4f6a4536496a49694f334d364d544536496d6c755a334a6c5a476c6c626e527a496a747a4f6a51794f694967556d566b49464e7761574e6c637977674945316863335268636d516754326c734c4341675232467962476c6a4c43416754323570623234694f334d364f446f6963585668626e527064486b694f326b364d54743961546f784f3245364d7a7037637a6f794f694a705a434937637a6f784f69497a496a747a4f6a45784f694a70626d64795a5752705a57353063794937637a6f314f694a5463476c6a5a534937637a6f344f694a786457467564476c306553493761546f784f3331704f6a493759546f7a4f6e747a4f6a4936496d6c6b496a747a4f6a4536496a51694f334d364d544536496d6c755a334a6c5a476c6c626e527a496a747a4f6a55364969425462325268496a747a4f6a6736496e46315957353061585235496a74704f6a45376658303d, 93, 0, '2014-02-12 08:45:46', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variable_name` varchar(50) NOT NULL,
  `value` varchar(256) NOT NULL,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `variable_name`, `value`, `label`) VALUES
(1, 'restaurant_name', 'Gulshan INN', 'Restaurant Name'),
(2, 'restaurant_address', 'Gulshan-1, Dhaka, Bangladesh', 'Restaurant Address');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories_canceled`
--

CREATE TABLE IF NOT EXISTS `subcategories_canceled` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descr` varchar(256) NOT NULL,
  `img` varchar(256) DEFAULT NULL,
  `thumb_img` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subcategories_canceled`
--

INSERT INTO `subcategories_canceled` (`id`, `category_id`, `title`, `descr`, `img`, `thumb_img`) VALUES
(1, 5, 'Green Veges', 'Simple green vages with salt boiling', '1391656120_vegetables.jpg', '1391656120_thumb_vegetables.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `title`) VALUES
(1, 'Front Left'),
(2, 'Front Middle'),
(3, 'Front Right');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'FeraTech', 'fera@tech.com', '14465b470a7b4b54853ed097a6f18f252206b9a4'),
(2, 'Mushfique', 'mushfique@shaiun.com', '14465b470a7b4b54853ed097a6f18f252206b9a4'),
(4, 'Test', 'test@gmail.com', '14465b470a7b4b54853ed097a6f18f252206b9a4');

-- --------------------------------------------------------

--
-- Table structure for table `waiters`
--

CREATE TABLE IF NOT EXISTS `waiters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `waiters`
--

INSERT INTO `waiters` (`id`, `name`, `password`) VALUES
(2, 'W Evan', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
