-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2016 at 09:42 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ben`
--

-- --------------------------------------------------------

--
-- Table structure for table `consume`
--

CREATE TABLE IF NOT EXISTS `consume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(75) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dat` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `consume`
--

INSERT INTO `consume` (`id`, `prod_name`, `quantity`, `dat`) VALUES
(42, 'Cabbage Koftas Curry', 1, '2009-01-23'),
(43, 'Cheese Salad', 1, '2009-02-23'),
(44, 'Brinjal slice fry', 3, '2009-01-23'),
(45, 'Lassi', 5, '2009-02-23'),
(46, 'Pineapple Cheese Cake', 4, '2009-02-23'),
(47, 'Brinjal slice fry', 2, '2009-03-10'),
(48, 'Golden fried sweet potato', 10, '2009-03-10'),
(49, 'Banana koftas', 3, '2009-03-10'),
(50, 'Potato fritters', 5, '2009-03-10'),
(51, 'Corn cutlets', 2, '2009-03-10'),
(52, 'Golden fried sweet potato', 3, '2016-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `prod_id` int(11) DEFAULT NULL,
  `ingredient_id` bigint(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  KEY `prod_id` (`prod_id`),
  KEY `ingredient_id` (`ingredient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`prod_id`, `ingredient_id`, `quantity`) VALUES
(1, 66, 2),
(1, 118, 2),
(1, 99, 1),
(1, 78, 2),
(2, 49, 5),
(2, 118, 2),
(2, 99, 1),
(2, 78, 2),
(2, 14, 3),
(3, 58, 5),
(3, 118, 2),
(3, 75, 2),
(3, 85, 3),
(3, 113, 4),
(3, 78, 3),
(4, 69, 5),
(4, 118, 2),
(4, 90, 3),
(5, 58, 3),
(5, 51, 4),
(5, 48, 4),
(5, 71, 4),
(5, 118, 2),
(5, 90, 3),
(6, 68, 4),
(6, 118, 2),
(6, 85, 3),
(6, 75, 2),
(6, 57, 3),
(6, 78, 2),
(6, 100, 3),
(6, 60, 2),
(6, 115, 2),
(6, 117, 2),
(6, 111, 2),
(7, 68, 4),
(7, 14, 3),
(7, 78, 2),
(7, 81, 3),
(7, 118, 2),
(7, 57, 2),
(8, 57, 4),
(8, 48, 3),
(8, 55, 3),
(8, 71, 4),
(8, 47, 3),
(8, 53, 2),
(8, 118, 3),
(9, 50, 4),
(9, 14, 3),
(9, 118, 2),
(9, 99, 1),
(9, 78, 2),
(10, 37, 4),
(10, 118, 2),
(10, 75, 2),
(10, 85, 1),
(10, 60, 1),
(10, 62, 2),
(10, 78, 3),
(10, 57, 4),
(11, 16, 4),
(11, 57, 3),
(11, 53, 2),
(11, 85, 2),
(11, 118, 2),
(11, 99, 3),
(11, 78, 2),
(11, 14, 2),
(11, 75, 2),
(12, 71, 4),
(12, 118, 2),
(12, 78, 1),
(12, 87, 2),
(12, 85, 2),
(12, 14, 1),
(12, 75, 2),
(13, 57, 4),
(13, 101, 2),
(13, 118, 2),
(13, 90, 3),
(13, 58, 4),
(13, 48, 3),
(13, 46, 3),
(13, 50, 1),
(13, 100, 2),
(13, 104, 3),
(14, 57, 4),
(14, 101, 2),
(14, 118, 2),
(14, 90, 3),
(14, 95, 4),
(14, 100, 3),
(14, 53, 2),
(15, 57, 4),
(15, 48, 3),
(15, 71, 2),
(15, 46, 3),
(15, 120, 3),
(15, 118, 2),
(15, 90, 2),
(15, 54, 2),
(15, 122, 3),
(15, 48, 3),
(15, 55, 2),
(16, 16, 4),
(16, 58, 2),
(16, 78, 2),
(16, 57, 3),
(16, 101, 3),
(16, 118, 2),
(16, 90, 3),
(16, 60, 2),
(16, 100, 3),
(17, 61, 5),
(17, 118, 2),
(17, 99, 3),
(17, 78, 2),
(17, 14, 2),
(18, 106, 30),
(18, 79, 2),
(18, 100, 2),
(18, 111, 2),
(18, 115, 3),
(18, 75, 2),
(18, 85, 2),
(18, 57, 12),
(18, 99, 3),
(19, 106, 25),
(19, 100, 2),
(19, 81, 3),
(19, 75, 3),
(19, 85, 3),
(19, 90, 2),
(20, 106, 1),
(20, 78, 1),
(20, 75, 3),
(20, 85, 3),
(20, 100, 3),
(20, 57, 4),
(21, 106, 20),
(21, 57, 1),
(21, 48, 1),
(21, 90, 2),
(21, 79, 2),
(21, 77, 2),
(21, 100, 2),
(22, 106, 20),
(22, 75, 2),
(22, 85, 2),
(22, 99, 2),
(22, 78, 2),
(23, 106, 1),
(23, 57, 2),
(23, 53, 2),
(23, 79, 3),
(23, 80, 4),
(23, 77, 2),
(23, 99, 2),
(23, 100, 3),
(23, 60, 3),
(23, 56, 2),
(23, 75, 2),
(23, 85, 2),
(23, 90, 3),
(23, 78, 3),
(23, 112, 2),
(24, 106, 2),
(24, 103, 3),
(24, 90, 3),
(24, 100, 3),
(25, 105, 1),
(25, 103, 2),
(25, 60, 2),
(25, 58, 1),
(25, 90, 8),
(25, 78, 4),
(25, 80, 3),
(25, 77, 2),
(25, 62, 2),
(25, 81, 1),
(25, 83, 1),
(25, 85, 2),
(25, 75, 2),
(25, 100, 3),
(25, 104, 2),
(26, 105, 2),
(26, 57, 3),
(26, 78, 6),
(26, 75, 2),
(26, 85, 2),
(26, 58, 3),
(26, 81, 2),
(27, 27, 2),
(27, 23, 1),
(27, 38, 2),
(27, 100, 2),
(27, 95, 3),
(27, 111, 2),
(27, 115, 2),
(27, 117, 1),
(28, 48, 2),
(28, 100, 3),
(28, 95, 2),
(28, 77, 3),
(28, 104, 2),
(28, 117, 2),
(29, 115, 2),
(29, 95, 1),
(29, 104, 4),
(29, 93, 2),
(29, 115, 2),
(30, 100, 3),
(30, 95, 2),
(30, 16, 2),
(30, 94, 1),
(30, 117, 2),
(31, 100, 4),
(31, 95, 4),
(31, 94, 1),
(31, 77, 2),
(31, 115, 2),
(31, 117, 2),
(32, 66, 1),
(32, 112, 2),
(32, 95, 3),
(32, 100, 4),
(32, 101, 5),
(33, 69, 1),
(33, 62, 2),
(33, 118, 3),
(34, 16, 3),
(34, 78, 2),
(34, 85, 3),
(34, 118, 2),
(34, 90, 3),
(34, 16, 2),
(34, 101, 3),
(35, 30, 9),
(35, 112, 1),
(35, 78, 3),
(35, 81, 2),
(35, 83, 2),
(35, 12, 3),
(35, 99, 1),
(35, 95, 2),
(35, 98, 2),
(36, 53, 1),
(36, 75, 2),
(36, 80, 2),
(36, 79, 2),
(36, 78, 2),
(36, 118, 3),
(36, 60, 2),
(37, 47, 1),
(37, 48, 2),
(37, 71, 2),
(37, 60, 2),
(37, 16, 1),
(37, 90, 2),
(37, 78, 2),
(37, 118, 3),
(38, 53, 1),
(38, 78, 2),
(38, 60, 2),
(38, 99, 3),
(38, 118, 2),
(39, 58, 2),
(39, 103, 2),
(39, 57, 3),
(39, 118, 2),
(39, 99, 3),
(39, 95, 3),
(39, 79, 2),
(39, 80, 2),
(39, 85, 3),
(39, 60, 2),
(39, 57, 1),
(40, 71, 1),
(40, 120, 2),
(40, 57, 1),
(40, 75, 2),
(40, 77, 2),
(40, 79, 1),
(40, 80, 3),
(40, 87, 2),
(40, 53, 2),
(41, 23, 3),
(41, 80, 2),
(41, 79, 3),
(41, 78, 2),
(41, 99, 3),
(41, 81, 2),
(41, 95, 3),
(41, 118, 2),
(42, 23, 1),
(42, 78, 2),
(42, 12, 2),
(42, 99, 3),
(42, 118, 2),
(43, 51, 2),
(43, 78, 2),
(43, 83, 2),
(43, 81, 3),
(43, 98, 3),
(43, 118, 3),
(44, 64, 2),
(44, 78, 2),
(44, 87, 2),
(44, 98, 3),
(44, 118, 2),
(45, 48, 2),
(45, 50, 2),
(45, 118, 3),
(45, 78, 2),
(45, 99, 2),
(45, 87, 2),
(46, 33, 1),
(46, 118, 3),
(46, 78, 2),
(46, 99, 3),
(47, 53, 1),
(47, 118, 3),
(47, 87, 2),
(47, 119, 2),
(47, 78, 2),
(47, 81, 2),
(47, 78, 3),
(47, 118, 2),
(48, 70, 2),
(48, 61, 3),
(48, 52, 3),
(48, 65, 2),
(48, 87, 3),
(48, 78, 3),
(48, 81, 2),
(48, 118, 2),
(49, 118, 2),
(49, 78, 3),
(50, 112, 2),
(50, 81, 2),
(50, 57, 3),
(50, 78, 2),
(50, 118, 3),
(50, 95, 2),
(51, 55, 2),
(51, 118, 3),
(51, 90, 2),
(52, 95, 3),
(52, 77, 2),
(52, 101, 3),
(53, 58, 2),
(53, 59, 2),
(53, 85, 2),
(53, 118, 3),
(54, 95, 2),
(54, 30, 3),
(54, 123, 2),
(51, 123, 2),
(49, 124, 2),
(48, 124, 1),
(47, 124, 2),
(46, 124, 2),
(43, 124, 2),
(42, 124, 3),
(40, 124, 2),
(37, 124, 1),
(36, 124, 2),
(35, 124, 1),
(24, 124, 1),
(23, 124, 5),
(20, 124, 1),
(19, 124, 1),
(18, 124, 1),
(17, 124, 2),
(16, 124, 1),
(15, 124, 2),
(7, 124, 3),
(5, 124, 1),
(1, 124, 2);

-- --------------------------------------------------------

--
-- Table structure for table `itemlist`
--

CREATE TABLE IF NOT EXISTS `itemlist` (
  `items` varchar(25) NOT NULL,
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemlist`
--

INSERT INTO `itemlist` (`items`, `category`) VALUES
('Barley', 'Cereals'),
('Maize', 'Cereals'),
('Millet', 'Cereals'),
('Milo', 'Cereals'),
('Paddy', 'Cereals'),
('Ragi', 'Cereals'),
('Rice', 'Cereals'),
('Wheat', 'Cereals'),
('Cumin', 'Cereals'),
('Semolina', 'Cereals'),
('Senugreek', 'Cereals'),
('Mustard', 'Cereals'),
('Horsegram', 'Pulses'),
('Redgram', 'Pulses'),
('Bengalgram', 'Pulses'),
('Greengram', 'Pulses'),
('Blackgram', 'Pulses'),
('Jowar', 'Pulses'),
('Bajra', 'Pulses'),
('Corn', 'Pulses'),
('Beans', 'Pulses'),
('Apple', 'Fruits'),
('Orange', 'Fruits'),
('Strawberry', 'Fruits'),
('Pairs', 'Fruits'),
('Banana', 'Fruits'),
('Peaches', 'Fruits'),
('Mangoose', 'Fruits'),
('Pineapple', 'Fruits'),
('Pomegranet', 'Fruits'),
('Muskmelon', 'Fruits'),
('Datefruit', 'Fruits'),
('Plantain', 'Fruits'),
('Crune', 'Fruits'),
('Peas', 'Vegetables'),
('Carrot', 'Vegetables'),
('Brinjal', 'Vegetables'),
('Cauliflower', 'Vegetables'),
('Beetroot', 'Vegetables'),
('Turnips', 'Vegetables'),
('Tomato', 'Vegetables'),
('Drumstick', 'Vegetables'),
('Capsicum', 'Vegetables'),
('Shallot', 'Vegetables'),
('Onion', 'Vegetables'),
('Potato', 'Vegetables'),
('Greens', 'Vegetables'),
('Corriandor Leaves', 'Vegetables'),
('Ladies finger', 'Vegetables'),
('Mint leaves', 'Vegetables'),
('Bitter gourd', 'Vegetables'),
('Bottle gourd', 'Vegetables'),
('Yam', 'Vegetables'),
('Sweet potato', 'Vegetables'),
('Saber bean', 'Vegetables'),
('Green plantain', 'Vegetables'),
('Cucumbur', 'Vegetables'),
('Cluster beans', 'Vegetables'),
('Cabbage', 'Vegetables'),
('Ridded gourd', 'Vegetables'),
('Ginger', 'Grocery'),
('Bishopweed', 'Grocery'),
('Chilli', 'Grocery'),
('Cinamom', 'Grocery'),
('Cloves', 'Grocery'),
('Cubes', 'Grocery'),
('Sennel', 'Grocery'),
('Garlic', 'Grocery'),
('Insence', 'Grocery'),
('Jagri', 'Grocery'),
('Licorice', 'Grocery'),
('Musk', 'Grocery'),
('Rose water', 'Grocery'),
('Sago', 'Grocery'),
('Safron', 'Grocery'),
('Salt', 'Grocery'),
('Sugar', 'Grocery'),
('Sarasaparilla', 'Grocery'),
('Tailpepper', 'Grocery'),
('Turmuric', 'Grocery'),
('Tamarind', 'Grocery'),
('Milk', 'Milk products'),
('Butter milk', 'Milk products'),
('Cheese', 'Milk products'),
('Curd', 'Milk products'),
('Ghee', 'Milk products'),
('Butter', 'Milk products'),
('Cashew', 'Nuts'),
('Coconut', 'Nuts'),
('Groundnut', 'Nuts'),
('Wallnut', 'Nuts'),
('Almond', 'Nuts'),
('Gingilly', 'Nuts'),
('Pistachio', 'Nuts'),
('Mutton', 'Meat'),
('Chicken', 'Meat'),
('Bief', 'Meat'),
('Fish', 'Meat'),
('Dryfish', 'Meat'),
('Prawns', 'Meat'),
('Grapes', 'Fruits'),
('Jackfruit', 'Fruits'),
('Custard apple', 'Fruits'),
('Gooseberry', 'Fruits'),
('Papaya', 'Fruits'),
('Watermelon', 'Fruits'),
('Mango', 'Fruits'),
('Fig', 'Fruits'),
('Plums', 'Fruits'),
('Guava', 'Fruits'),
('Melon', 'Fruits'),
('Cardamom', 'Grocery'),
('Cumin', 'Grocery'),
('Pepper', 'Grocery'),
('Rolong', 'Grocery'),
('Corriandor', 'Grocery'),
('Corriandor', 'Cereals'),
('Peas', 'Pulses'),
('Snake gourd', 'Vegetables'),
('Pumpkin', 'Vegetables'),
('Beans', 'Vegetables'),
('Bread fruit', 'Vegetables'),
('Oil', 'Grocery');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `password` varchar(10) NOT NULL,
  `dat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`password`, `dat`) VALUES
('boomi', '2016-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE IF NOT EXISTS `productlist` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(50) NOT NULL,
  `target` int(11) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`prod_id`, `prod_name`, `target`) VALUES
(1, 'Golden fried sweet potato', 15),
(2, 'Brinjal slice fry', 10),
(3, 'Potato fritters', 0),
(4, 'Cucumber delight', 0),
(5, 'Mixed chops', 0),
(6, 'Banana koftas', 0),
(7, 'Banana fries', 0),
(8, 'Vegetable fritters', 0),
(9, 'Golden fried cauliflower', 0),
(10, 'Jack fruit koftas', 0),
(11, 'Corn kofta', 0),
(12, 'Cabbage Kababs', 0),
(13, 'Cream of vegetable soup', 0),
(14, 'Tomato soup', 0),
(15, 'Baked vegetable soup', 0),
(16, 'Corn cutlets', 0),
(17, 'Slit fried lady finger', 0),
(18, 'Butter Chicken', 0),
(19, 'Baked Chicken', 0),
(20, 'Chicken Fry', 0),
(21, 'Chicken Stock', 0),
(22, 'Chicken Presto', 0),
(23, 'Chicken Chittinad', 0),
(24, 'Curd Chicken', 0),
(25, 'Methi Chicken', 0),
(26, 'Spicy Mutton', 0),
(27, 'Banana Custard', 0),
(28, 'Cheese Halwa', 0),
(29, 'Almond Roll', 0),
(30, 'Pista Icecream', 0),
(31, 'Rasmalai', 0),
(32, 'Sweet Potato Cake', 0),
(33, 'Cucumbur Soup', 0),
(34, 'Corn Soup', 0),
(35, 'Pineapple Coconut Curry', 0),
(36, 'Dal Soup', 0),
(37, 'Hot & Sour Soup', 0),
(38, 'Tomato Dal', 0),
(39, 'Small Potato Curry', 0),
(40, 'Cabbage Koftas Curry', 0),
(41, 'Apple Chutney', 0),
(42, 'Apple Pickle', 0),
(43, 'Beetroot Chutney', 0),
(44, 'Bottlegourd', 0),
(45, 'Cauliflower Carrot Pickle', 0),
(46, 'Mango Pickle', 0),
(47, 'Tomato Pickle', 0),
(48, 'Vegetable Rotti', 0),
(49, 'Spicy Chapati', 0),
(50, 'Ragi Roti', 0),
(51, 'Cheese Salad', 0),
(52, 'Lassi', 0),
(53, 'Potato Salad', 0),
(54, 'Pineapple Cheese Cake', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_daily`
--

CREATE TABLE IF NOT EXISTS `purchase_daily` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `units` varchar(10) NOT NULL,
  `rate` float NOT NULL,
  `amount` float NOT NULL,
  `category` varchar(50) NOT NULL,
  `purchase_date` varchar(15) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `purchase_daily`
--

INSERT INTO `purchase_daily` (`purchase_id`, `item_name`, `quantity`, `units`, `rate`, `amount`, `category`, `purchase_date`) VALUES
(3, 'Green plantain', 1, 'Kgs', 10, 10, 'Vegetables', '22/01/2009'),
(4, 'Curd', 5, 'Ltrs', 20, 100, 'Milk products', '15/01/2005'),
(5, 'Mango', 10, 'Kgs', 40, 400, 'Fruits', '15/01/2005'),
(6, 'Fish', 2, 'Kgs', 100, 200, 'Meat', '15/01/2005'),
(7, 'Fish', 2, 'Kgs', 100, 200, 'Meat', '15/01/2005'),
(12, 'Mangoose', 2, 'Units', 12, 24, 'Fruits', '28/01/2009'),
(13, 'Pomegranet', 5, 'Kgs', 15, 75, 'Fruits', '28/01/2009'),
(78, 'Onion', 50, 'Units', 10, 500, 'Vegetables', '23/02/2009'),
(79, 'Onion', 50, 'Units', 10, 500, 'Vegetables', '23/02/2009'),
(80, 'Milk', 50, 'Ltrs', 10, 500, 'Milk products', '23/02/2009'),
(81, 'Cheese', 10, 'Units', 10, 100, 'Milk products', '23/02/2009'),
(82, 'Brinjal', 50, 'Kgs', 10, 500, 'Vegetables', '10/03/2009'),
(83, 'Sweet potato', 55, 'Kgs', 12, 660, 'Vegetables', '10/03/2009'),
(85, 'Potato', 20, 'Kgs', 5, 100, 'Vegetables', '10/03/2009'),
(91, 'Fig', 2, 'kgs', 12, 24, 'Fruits', '10/03/2009'),
(92, 'Chicken', 5, 'kgs', 100, 500, 'Meat', '03/04/2016'),
(93, 'Chicken', 10, 'kgs', 100, 1000, 'Meat', '03/04/2016');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_monthly`
--

CREATE TABLE IF NOT EXISTS `purchase_monthly` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `units` varchar(10) NOT NULL,
  `rate` float NOT NULL,
  `amount` float NOT NULL,
  `category` varchar(40) NOT NULL,
  `purchase_date` varchar(15) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `purchase_monthly`
--

INSERT INTO `purchase_monthly` (`purchase_id`, `item_name`, `quantity`, `units`, `rate`, `amount`, `category`, `purchase_date`) VALUES
(3, 'Greengram', 10, 'kg', 45, 450, 'Pulses', '22/01/2009'),
(4, 'Cubes', 5, 'kg', 50, 250, 'Grocery', '15/01/2005'),
(5, 'Wheat', 10, 'kg', 15, 150, 'Cereals', '15/01/2005'),
(6, 'Coconut', 5, 'kg', 10, 50, 'Nuts', '15/01/2005'),
(43, 'Mustard', 5, 'kg', 120, 600, 'Cereals', '28/01/2009'),
(44, 'Mustard', 5, 'kg', 120, 600, 'Cereals', '28/01/2009'),
(45, 'Jagri', 34, 'ltrs', 54, 1836, 'Grocery', '28/01/2009'),
(70, 'Coconut', 10, 'Units', 5, 50, 'Nuts', '23/02/2009'),
(71, 'Salt', 10, 'Units', 20, 200, 'Grocery', '23/02/2009'),
(72, 'Coconut', 4, 'units', 4, 16, 'Nuts', '24/02/2009'),
(73, 'Barley', 23, 'kg', 2, 46, 'Cereals', '07/03/2009'),
(74, 'Salt', 20, 'kg', 5, 100, 'Grocery', '10/03/2009'),
(75, 'Chilli', 50, 'kg', 6, 300, 'Grocery', '10/03/2009'),
(76, 'Salt', 34, 'kg', 12, 408, 'Grocery', '10/03/2009'),
(80, 'Bengalgram', 1, 'kgs', 12, 12, 'Pulses', '10/03/2009'),
(81, 'Turmuric', 10, 'kgs', 2, 20, 'Grocery', '10/03/2009'),
(82, 'Blackgram', 12, 'kgs', 12, 144, 'Pulses', '10/03/2009'),
(83, 'Jowar', 10, 'kgs', 15, 150, 'Pulses', '10/03/2009');

-- --------------------------------------------------------

--
-- Table structure for table `sales_target`
--

CREATE TABLE IF NOT EXISTS `sales_target` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sale_users`
--

CREATE TABLE IF NOT EXISTS `sale_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `item_name`, `category`, `quantity`) VALUES
(1, 'Barley', 'Cereals', 123),
(2, 'Maize', 'Cereals', 10),
(3, 'Millet', 'Cereals', 57),
(4, 'Milo', 'Cereals', 52),
(5, 'Paddy', 'Cereals', 21),
(6, 'Ragi', 'Cereals', 66),
(7, 'Rice', 'Cereals', 23),
(8, 'Semolina', 'Cereals', 52),
(9, 'Wheat', 'Cereals', 45),
(10, 'Corriandor', 'Cereals', 50),
(11, 'Cumin', 'Cereals', 110),
(12, 'Senugreek', 'Cereals', 65),
(13, 'Horsegram', 'Pulses', 22),
(14, 'Bengalgram', 'Pulses', 37),
(15, 'Jowar', 'Pulses', 55),
(16, 'Corn', 'Pulses', 16),
(17, 'Bajra', 'Pulses', 124),
(18, 'Greengram', 'Pulses', 23),
(19, 'Blackgram', 'Pulses', 149),
(20, 'Redgram', 'Pulses', 78),
(21, 'Peas', 'Pulses', 45),
(22, 'Strawberry', 'Fruits', 30),
(23, 'Apple', 'Fruits', 50),
(24, 'Gooseberry', 'Fruits', 35),
(25, 'Pairs', 'Fruits', 65),
(26, 'Orange', 'Fruits', 10),
(27, 'Banana', 'Fruits', 30),
(28, 'Peaches', 'Fruits', 55),
(29, 'Mangoose', 'Fruits', 24),
(30, 'Pineapple', 'Fruits', 15),
(31, 'Papaya', 'Fruits', 64),
(32, 'Watermelon', 'Fruits', 5),
(33, 'Mango', 'Fruits', 54),
(34, 'Guava', 'Fruits', 65),
(35, 'Fig', 'Fruits', 35),
(36, 'Plums', 'Fruits', 35),
(37, 'Jackfruit', 'Fruits', 63),
(38, 'Custard Apple', 'Fruits', 69),
(39, 'Grapes', 'Fruits', 55),
(40, 'Pomegranet', 'Fruits', 20),
(41, 'Muskmelon', 'Fruits', 34),
(42, 'Melon', 'Fruits', 41),
(43, 'Datefruit', 'Fruits', 44),
(44, 'Plantain', 'Fruits', 30),
(45, 'Crune', 'Fruits', 12),
(46, 'Peas', 'Vegetables', 45),
(47, 'Beans', 'Vegetables', 77),
(48, 'Carrot', 'Vegetables', 51),
(49, 'Brinjal', 'Vegetables', 36),
(50, 'Cauliflower', 'Vegetables', 47),
(51, 'Beetroot', 'Vegetables', 30),
(52, 'Turnips', 'Vegetables', 22),
(53, 'Tomato', 'Vegetables', 26),
(54, 'Drumstick', 'Vegetables', 34),
(55, 'Capsicum', 'Vegetables', 24),
(56, 'Shallot', 'Vegetables', 33),
(57, 'Onion', 'Vegetables', 84),
(58, 'Potato', 'Vegetables', 19),
(59, 'Greens', 'Vegetables', 56),
(60, 'Corriandor Leaves', 'Vegetables', 10),
(61, 'Ladies Finger', 'Vegetables', 40),
(62, 'Mint Leaves', 'Vegetables', 30),
(63, 'Bitter gourd', 'Vegetables', 50),
(64, 'Bottle gourd', 'Vegetables', 40),
(65, 'Yam', 'Vegetables', 30),
(66, 'Sweet potato', 'Vegetables', 37),
(67, 'Saber bean', 'Vegetables', 40),
(68, 'Green plantain', 'Vegetables', 12),
(69, 'Cucumbur', 'Vegetables', 25),
(70, 'Cluster beans', 'Vegetables', 60),
(71, 'Cabbage', 'Vegetables', 44),
(72, 'Bread fruit', 'Vegetables', 35),
(73, 'Ridded gourd', 'Vegetables', 35),
(75, 'Ginger', 'Grocery', 2),
(76, 'Bishopweed', 'Grocery', 35),
(77, 'Cardamom', 'Grocery', 30),
(78, 'Chilli', 'Grocery', 7),
(79, 'Cinamom', 'Grocery', 34),
(80, 'Cloves', 'Grocery', 37),
(81, 'Corriandor', 'Grocery', 44),
(82, 'Cubes', 'Grocery', 50),
(83, 'Cumin', 'Grocery', 110),
(84, 'Sennel', 'Grocery', 45),
(85, 'Garlic', 'Grocery', 24),
(86, 'Insence', 'Grocery', 10),
(87, 'Jagri', 'Grocery', 62),
(88, 'Licorice', 'Grocery', 13),
(89, 'Musk', 'Grocery', 44),
(90, 'Pepper', 'Grocery', 8),
(91, 'Rolong', 'Grocery', 22),
(92, 'Sago', 'Grocery', 32),
(93, 'Rose water', 'Grocery', 13),
(94, 'Safron', 'Grocery', 50),
(95, 'Sugar', 'Grocery', 4),
(96, 'Sarasaparilla', 'Grocery', 33),
(97, 'Tailpepper', 'Grocery', 33),
(98, 'Tamarind', 'Grocery', 44),
(99, 'Turmuric', 'Grocery', 13),
(100, 'Milk', 'Milk products', 131),
(101, 'Butter', 'Milk products', 26),
(102, 'Butter milk', 'Milk products', 100),
(103, 'Curd', 'Milk products', 100),
(104, 'Ghee', 'Milk products', 34),
(105, 'Mutton', 'Meat', 100),
(106, 'Chicken', 'Meat', 25),
(107, 'Fish', 'Meat', 47),
(108, 'Bief', 'Meat', 65),
(109, 'Dryfish', 'Meat', 43),
(110, 'Prawns', 'Meat', 150),
(111, 'Cashew', 'Nuts', 44),
(112, 'Coconut', 'Nuts', 69),
(113, 'Groundnut', 'Nuts', 165),
(114, 'Wallnut', 'Nuts', 33),
(115, 'Almond', 'Nuts', 39),
(116, 'Gingilly', 'Nuts', 32),
(117, 'Pistachio', 'Nuts', 48),
(118, 'Salt', 'Grocery', 13),
(119, 'Mustard', 'Cereals', 104),
(120, 'Beans', 'Pulses', 46),
(121, 'Snake gourd', 'Vegetables', 40),
(122, 'Pumpkin', 'Vegetables', 40),
(123, 'Cheese', 'Milk products', 5),
(124, 'Oil', 'Grocery', 18);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `productlist` (`prod_id`),
  ADD CONSTRAINT `ingredients_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `stock` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
