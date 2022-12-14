-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 07:45 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ud`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`cart_item_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `checkout` tinyint(1) DEFAULT NULL,
  `ord_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_item_id`, `item_id`, `user_id`, `qty`, `checkout`, `ord_id`) VALUES
(5, 40, 6, 1, 1, 4),
(6, 7, 6, 1, 1, 5),
(7, 7, 6, 1, 1, 8),
(9, 20, 6, 1, 1, 16),
(10, 29, 6, 1, 0, 46),
(12, 5, 7, 1, 1, 47),
(13, 44, 7, 1, 1, 48),
(14, 4, 7, 1, 1, 53),
(15, 13, 8, 3, 0, NULL),
(18, 29, 11, 1, 1, 56),
(19, 29, 12, 1, 1, 57),
(20, 29, 13, 1, 1, 58);

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE IF NOT EXISTS `catalogue` (
`pid` int(11) NOT NULL,
  `pname` varchar(32) NOT NULL,
  `pimage` varchar(64) NOT NULL,
  `pcost` int(11) NOT NULL,
  `pweight` int(11) NOT NULL,
  `pcategory` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`pid`, `pname`, `pimage`, `pcost`, `pweight`, `pcategory`) VALUES
(1, 'Sojanya(black)', 'images/black.jpg', 2000, 0, 1),
(2, 'Sojanya(purple)', 'images/purple3.jpg', 2500, 0, 1),
(3, 'Jompers(blue)', 'images/blue2.jpg', 2800, 0, 1),
(4, 'Benstoke(white)', 'images/white.jpg', 3500, 0, 1),
(5, 'Jompers(Orange)', 'images/orange.jpg', 1640, 0, 1),
(6, 'Shazada(occur)', 'images/occur.jpg', 2000, 0, 1),
(7, 'Benstoke(blue)', 'images/bb.jpeg', 1500, 0, 1),
(8, 'Manyavar(blue)', 'images/bbb1.jpg', 2300, 0, 1),
(9, 'Manyavar(red)', 'images/red.jpg', 1800, 0, 1),
(11, 'Raw Brown Sherwani', 'images/sbrown.jpg', 40000, 0, 2),
(12, 'Woven Silk Grey Sherwani', 'images/sgrey.jpg', 35000, 0, 2),
(13, 'Embroidered Red Sherwani', 'images/sred.jpg', 50000, 0, 2),
(14, 'Embroidered Black Sherwani', 'images/sblack63.jpg', 25000, 0, 2),
(15, 'Woven Silk Brown Sherwani', 'images/sbb.jpg', 25000, 0, 2),
(16, 'Raw White Sherwani', 'images/swhite.jpg', 37000, 0, 2),
(20, 'Benstoke(brown)', 'images/brown.jpg', 1900, 0, 1),
(24, 'MAG(gold)', 'images/gold.jpeg', 2500, 0, 1),
(25, 'MAG(orange)', 'images/orange1.jpg', 1500, 0, 1),
(27, 'Gold Mojari', 'images/fgold.jpg', 4000, 0, 3),
(28, 'Red Mojari', 'images/fred.jpg', 2999, 0, 3),
(29, 'Black Mojari', 'images/fblack.jpeg', 3500, 0, 3),
(30, 'White Mojari', 'images/fwhite.jpg', 2500, 0, 3),
(34, 'Blue Mojari', 'images/fblue.jpeg', 3500, 0, 3),
(37, 'Diamond Mojari', 'images/fp.jpg', 4500, 0, 3),
(38, 'Traditional Art Mojari', 'images/fbb.jpg', 2000, 0, 3),
(39, 'Embroidered Gold Mojari', 'images/fgold1.jpg', 3700, 0, 3),
(40, 'Basic Traditional Shoes', 'images/fbasic.jpg', 2000, 0, 3),
(41, 'Diamond Necklace', 'images/ared.jpg', 5000, 0, 4),
(42, 'White Diamond Brooch', 'images/awhite.jpeg', 4000, 0, 4),
(43, 'Pearl Brooch', 'images/ablue.jpg', 2500, 0, 4),
(44, 'Gold Horse Brooch', 'images/agold.jpeg', 3000, 0, 4),
(45, 'Diamond Brooch', 'images/agg.jpg', 6000, 0, 4),
(46, 'Gold Necklace', 'images/agreen.jpg', 7000, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`ord_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rpid` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `user_id`, `rpid`) VALUES
(1, 1, 'order_EZ7LAdGNJDzJgR'),
(2, 6, 'order_EcpjZtmVX83c54'),
(3, 6, 'order_EcpkqyccAJWucw'),
(4, 6, 'order_EdCpCbdEv3Bblf'),
(5, 6, 'order_EdCqijHbj2dpsE'),
(6, 6, 'order_EdCrk2sANeuQBT'),
(7, 6, 'order_EdCuQHO88yXvAv'),
(8, 6, 'order_EdCvDE80x6YGJ1'),
(9, 6, 'order_EdDio2u7ea3GdX'),
(10, 6, 'order_EdDk9wCZIYe6Wc'),
(11, 6, 'order_EdDkATU2zyAmIT'),
(12, 6, 'order_EdDkEBbD7FEVH7'),
(13, 6, 'order_EdDmbE6mYKVvcm'),
(14, 6, 'order_EdDmhqc6KgI15k'),
(15, 6, 'order_EdDmsXTui6Ial1'),
(16, 6, 'order_EdDnZIczuNPX12'),
(17, 6, 'order_EdDpMW88NzrxLB'),
(18, 6, 'order_EdDr9YcEazwAYV'),
(19, 6, 'order_EdDrA8Vvi7faO5'),
(20, 6, 'order_EdDs08uqkqHQd9'),
(21, 6, 'order_EdDsJ72vl9WuIb'),
(22, 6, 'order_EdDsX3Iuw1s1e7'),
(23, 6, 'order_EdDsqw65m95sh4'),
(24, 6, 'order_EdDssTqJXf8bxs'),
(25, 6, 'order_EdDtGmIkgLmLZV'),
(26, 6, 'order_EdDtI3UhcMjmqT'),
(27, 6, 'order_EdDtbQGxhzLePS'),
(28, 6, 'order_EdDtch7rFvRVAJ'),
(29, 6, 'order_EdE1hslqgRAT0H'),
(30, 6, 'order_EdE2F7PBoGaOEW'),
(31, 6, 'order_EdE4NbzM1913cp'),
(32, 6, 'order_EdE4gZc42aNhj7'),
(33, 6, 'order_EdE54ZUNtbrCcs'),
(34, 6, 'order_EdE55vZKYA0muH'),
(35, 6, 'order_EdE58s656HfjoC'),
(36, 6, 'order_EdE5XK52OLuNC9'),
(37, 6, 'order_EdE6Q8zE8OPJ8P'),
(38, 6, 'order_EdE6pTT6Yng1Bc'),
(39, 6, 'order_EdE8xFcaiYk77G'),
(40, 6, 'order_EdE8zvw8yGoQvV'),
(41, 6, 'order_EdE90qoyXoOUTO'),
(42, 6, 'order_EdECNs6Cic4YEu'),
(43, 6, 'order_EdEF2LhqznDWMV'),
(44, 6, 'order_EdEFH0ti54Zkio'),
(45, 6, 'order_EdEG0q3GSBLjln'),
(46, 6, 'order_EdEIG3JRKGQwJp'),
(47, 7, 'order_EdWvF5L6GAYt9b'),
(48, 7, 'order_EdX1dtGtwp3Fse'),
(49, 7, 'order_EdX37DSeqURzC9'),
(50, 7, 'order_EdXE0kIqYIRKgj'),
(51, 7, 'order_EdXGeYb0IuiaZI'),
(52, 7, 'order_EdXHBJ0KNk5HnS'),
(53, 7, 'order_EdXKGXCCqKf3j1'),
(54, 9, 'order_EdXjkRCAu5o2gu'),
(55, 9, 'order_EdXkdtEe1DMMrm'),
(56, 11, 'order_EdXqJzNHBgOWZi'),
(57, 12, 'order_EdXytqx4YEDtek'),
(58, 13, 'order_EdY3NLlcpJav7s');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_fname` varchar(16) NOT NULL,
  `user_lname` varchar(16) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_contact`, `user_password`, `address`) VALUES
(1, 'Sarah', 'Carvalho', 'sarahcar28@gmail.com', '9867882407', 'Sarahcar@123', '8B-101, ALICA NAGAR, LOKHANDWALA COMPLEX,<br>KANDIVALI EAST,<br>Mumbai 400101,<br>Maharashtra'),
(6, 'yash', 'patel', 'yaasa@gmail.com', '7894561235', 'Yash@20001', 'ausSAX,<br>DSD,<br>DSDDC,<br>MUMBAI 400097,<br>Maharashtra'),
(7, 'steve', 'smit', 'yashspatel16@gmail.com', '9930222153', 'Yash@2003', 'ausSAX,<br>DSD,<br>DSDDC,<br>MUMBAI 400097,<br>Maharashtra'),
(8, 'Shubh', 'Zatakia', 'shubhzatakia111@gmail.com', '9930222154', 'Shubh@2001', 'ausSAX,<br>DSD,<br>DSDDC,<br>MUMBAI 400097,<br>Maharashtra'),
(9, 'Shubh', 'Zatakia', 'shubhzatakia111@gmail.com', '9930222154', 'Shubh@2001', 'ausSAX,<br>DSD,<br>DSDDC,<br>MUMBAI 400097,<br>Maharashtra'),
(10, 'Shubh', 'Zatakia', 'shubhzatakia111@gmail.com', '9930222154', 'Shubh@2002', ''),
(11, 'Yash', 'Patel', 'yashspatel16@gmail.com', '9930221545', 'Yash@2005', 'ausSAX,<br>DSD,<br>DSDDC,<br>MUMBAI 400097,<br>Maharashtra'),
(12, 'yash', 'patel', 'yashspatel16@gmail.com', '9930222154', 'Yash@2000', 'ausSAX,<br>DSD,<br>DSDDC,<br>MUMBAI 400097,<br>Maharashtra'),
(13, 'yash', 'patel', 'yashspatel16@gmail.com', '9930222154', 'Yash@2000', 'ausSAX,<br>DSD,<br>DSDDC,<br>MUMBAI 400097,<br>Maharashtra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`cart_item_id`), ADD KEY `fk_item` (`item_id`), ADD KEY `fk_user` (`user_id`), ADD KEY `fk_order` (`ord_id`);

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
 ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`ord_id`), ADD KEY `fk_user_order` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
ADD CONSTRAINT `fk_item` FOREIGN KEY (`item_id`) REFERENCES `catalogue` (`pid`),
ADD CONSTRAINT `fk_order` FOREIGN KEY (`ord_id`) REFERENCES `orders` (`ord_id`),
ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `fk_user_order` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
