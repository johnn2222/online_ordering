-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 07:35 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `addon`
--

CREATE TABLE `addon` (
  `id` int(11) NOT NULL,
  `prd_id` varchar(50) NOT NULL,
  `addon_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `addon_list`
--

CREATE TABLE `addon_list` (
  `id` int(11) NOT NULL,
  `addon_name` varchar(255) NOT NULL,
  `addon_price` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupan`
--

CREATE TABLE `coupan` (
  `id` int(11) NOT NULL,
  `coupan_code` varchar(100) NOT NULL,
  `coupan_amt` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `creditCard` varchar(100) NOT NULL,
  `expr` varchar(40) NOT NULL,
  `cvv` varchar(40) NOT NULL,
  `sub_total` varchar(50) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `order_date` datetime NOT NULL,
  `discount` varchar(50) NOT NULL,
  `coupan_discount` varchar(50) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `coupan_code` varchar(100) NOT NULL,
  `delivery_charge` varchar(50) NOT NULL,
  `tip` varchar(50) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `custome_time` varchar(50) NOT NULL,
  `now` varchar(50) NOT NULL,
  `view_status` int(11) NOT NULL DEFAULT '0',
  `addons` varchar(255) NOT NULL,
  `addons_amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`id`, `order_no`, `name`, `email`, `mobile`, `address`, `creditCard`, `expr`, `cvv`, `sub_total`, `total_amount`, `order_date`, `discount`, `coupan_discount`, `tax`, `coupan_code`, `delivery_charge`, `tip`, `order_status`, `custome_time`, `now`, `view_status`, `addons`, `addons_amount`) VALUES
(29, 'T51518', 'SHRI KANT testing', 'shrikantdubey12314581@gmail.com', '9990990288', '236 (', '', '', '', '63.89', '59.42', '2017-03-16 07:37:49', '9.5835', '', '5.11', '', '', '', 'delivery', '', '', 0, '', ''),
(30, 'T70076', 'SHRI KANT testing', 'shrikantdubey12314581@gmail.com', '9990990288', '', '', '', '', '82.85', '77.05', '2017-03-17 05:43:09', '12.4275', '', '6.63', '', '', '', 'pickup', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `prd_id` varchar(50) NOT NULL,
  `item_name` varchar(150) NOT NULL,
  `price` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `special_instruction` varchar(150) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `item_discount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prd_id`, `item_name`, `price`, `item_description`, `special_instruction`, `qty`, `item_discount`) VALUES
(65, '29', '186', 'Mulligatawny', '3.99', '', ' ', '1', ''),
(66, '29', '188', 'Murg Shorba Curried Base', '4.99', '', ' ', '4', ''),
(67, '29', '190', 'Seafood Soup', '5.99', '', ' ', '2', ''),
(68, '29', '192', 'Lovash Salad', '6.99', '', ' ', '4', ''),
(69, '30', '264', 'Chicken Biryani', '13.99', '', ' ', '1', ''),
(70, '30', '270', 'Lamb Biryani', '16.99', '', ' ', '1', ''),
(71, '30', '182', ' Vegetable Pakoras', '3.99', '', ' ', '13', '');

-- --------------------------------------------------------

--
-- Table structure for table `special_event`
--

CREATE TABLE `special_event` (
  `item_id` int(5) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_desc` varchar(300) NOT NULL,
  `item_price` decimal(5,0) NOT NULL,
  `how` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `special_event`
--

INSERT INTO `special_event` (`item_id`, `item_name`, `item_desc`, `item_price`, `how`) VALUES
(21, 'CHICKEN TIKKA MASALA', 'Chunks Of Tender Chicken In A Traditional Sun-Dried Tomato Based Tikka Masala', '10', 'na');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `user_type_id` varchar(20) DEFAULT NULL,
  `last_login` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created` varchar(100) DEFAULT NULL,
  `modified` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `user_type_id`, `last_login`, `status`, `created`, `modified`) VALUES
(1, 'lovash_indian_restaurant', '', 'Lovash@lovash', 'Mohan', 'Parmar', 'admin', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertisement`
--

CREATE TABLE `tbl_advertisement` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `add_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL,
  `lable` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category`, `lable`, `image`, `icon`, `status`, `created`, `modified`) VALUES
(18, 'APPETIZERS', 0, 'appet.jpg', '', 1, '2017-03-15 06:28:19', '0000-00-00 00:00:00'),
(19, 'SOUPS', 0, 'garamshorbe.jpg', '', 1, '2017-03-15 06:28:32', '0000-00-00 00:00:00'),
(20, 'SALADS', 0, 'salad.jpg', '', 1, '2017-03-15 06:28:44', '0000-00-00 00:00:00'),
(21, 'BREADS', 0, 'tandooriroti.jpg', '', 1, '2017-03-15 06:28:53', '0000-00-00 00:00:00'),
(22, 'MONTHLY SPECIAL MENU', 0, 'specialmonth.jpg', '', 1, '2017-03-15 06:29:10', '0000-00-00 00:00:00'),
(23, 'CREATION''S FROM THE CHEF''S HEART', 0, 'chefsheart.jpg', '', 1, '2017-03-15 06:29:31', '2017-03-15 06:29:39'),
(24, 'TANDOOR SE (CLAY OVEN)', 0, 'tandoorse.jpg', '', 1, '2017-03-15 06:29:53', '0000-00-00 00:00:00'),
(25, 'VEGETARIAN DELIGHTS', 0, 'vegdelights.jpg', '', 1, '2017-03-15 06:30:05', '0000-00-00 00:00:00'),
(26, 'SOUTH INDIAN FLAVORS', 0, 'southindian.jpg', '', 1, '2017-03-15 06:30:18', '0000-00-00 00:00:00'),
(27, 'ENTREES', 0, 'entrees.jpg', '', 1, '2017-03-15 06:30:50', '0000-00-00 00:00:00'),
(28, 'BASMATI RICE SPECIALS', 0, 'rice.jpg', '', 1, '2017-03-15 06:31:02', '0000-00-00 00:00:00'),
(29, 'DESSERTS', 0, 'desserts.jpg', '', 1, '2017-03-15 06:31:09', '0000-00-00 00:00:00'),
(30, 'BEVERAGES', 0, 'beverages.jpg', '', 1, '2017-03-15 06:31:15', '0000-00-00 00:00:00'),
(31, 'SIDE ORDERS', 0, 'accompaniments.jpg', '', 1, '2017-03-15 06:31:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `lable` int(11) NOT NULL DEFAULT '0',
  `page_id` varchar(25) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `sord_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` varchar(255) NOT NULL,
  `tax` varchar(25) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `category`, `price`, `tax`, `discount`, `image`, `status`, `created`, `modified`, `description`) VALUES
(182, ' Vegetable Pakoras', '18', '3.99', '', '', 'vegpakora.jpg', 1, '2017-03-15 07:14:49', '0000-00-00 00:00:00', 'Mixed Vegetables, Dipped in Gram Flour & Fried to Perfection'),
(183, ' Vegetable Samosas', '18', '4.29', '', '', 'vegsamosa.jpg', 1, '2017-03-15 07:15:18', '0000-00-00 00:00:00', 'Pastry Stuffed with Peas, Potatoes, Herbs & Spices; Served with Mint & Tamarind Sauces'),
(184, 'Meat Samosas', '18', '5.99', '', '', 'meatsamosa.jpg', 1, '2017-03-15 07:15:47', '0000-00-00 00:00:00', 'Pastry Stuffed with Ground Beef, Peas, Herbs & Spices; Served with Mint & Tamarind Sauces'),
(185, ' Tandoori Chicken Samosas', '18', '5.99', '', '', 'tandoorichickensamosa.jpg', 1, '2017-03-15 07:16:11', '0000-00-00 00:00:00', 'Pastry stuffed with chunks of Tandoori Chicken; served with Mint & Tamarind Sauces.'),
(186, 'Mulligatawny', '19', '3.99', '', '', 'mulligatawny.jpg', 1, '2017-03-15 07:16:14', '0000-00-00 00:00:00', 'Lentil Soup with Spices (A Favorite of The Raj), Garnished with Julienne Vegetables, Rice & Lemon'),
(187, 'Mixed Appetizers', '18', '7.99', '', '', 'mixedappetizer.jpg', 1, '2017-03-15 07:16:40', '0000-00-00 00:00:00', 'Two Shami Kebab, One Vegetable Samosa, Two Vegetable Pakoras, Chicken Tikka & 1 Tandoori Shrimp with Mint Chutney & Tamarind Sauces'),
(188, 'Murg Shorba Curried Base', '19', '4.99', '', '', 'murgshorbacurriedbase.jpg', 1, '2017-03-15 07:16:47', '0000-00-00 00:00:00', 'Chicken Soup with White Chicken Meat & Julienne Vegetables'),
(189, 'Crab in Pastry', '18', '8.99', '', '', 'crabinpastry.jpg', 1, '2017-03-15 07:17:06', '0000-00-00 00:00:00', 'Crab Meat Wrapped in Pastry Served with Coconut Chutney'),
(190, 'Seafood Soup', '19', '5.99', '', '', 'seafoodsoup.jpg', 1, '2017-03-15 07:17:12', '0000-00-00 00:00:00', 'Mild Seafood Broth with Assorted Seafood, Garnished with Julienne Vegetables'),
(191, ' Lovash Scallops', '18', '8.99', '', '', 'lovashscallops.jpg', 1, '2017-03-15 07:17:28', '0000-00-00 00:00:00', 'Fresh Sea Scallops Braised & Seasoned with Fresh Herbs & Served with Coconut Chutney'),
(192, 'Lovash Salad', '20', '6.99', '', '', 'salad.jpg', 1, '2017-03-15 07:17:48', '0000-00-00 00:00:00', 'Diced Meats & Poultry Hand Picked, Spring Mixed Greens Topped with Julienne Vegetables'),
(193, 'Shami Kebab', '18', '6.99', '', '', 'shamikabab.jpg', 1, '2017-03-15 07:17:59', '0000-00-00 00:00:00', 'Lamb Patties Cooked with Lentils, Served on Top of Salad Accompanied with Mint, Tamarind & House Dressing'),
(194, 'Vegetable House Salad', '20', '5.99', '', '', 'salad.jpg', 1, '2017-03-15 07:18:09', '0000-00-00 00:00:00', 'Bed of Crispy Spring Mix Topped with Julienne Vegetables'),
(195, 'Aloo Tikki Chole', '18', '7.99', '', '', 'alootikki.jpg', 1, '2017-03-15 07:18:22', '0000-00-00 00:00:00', 'Potato Pancakes Served with Chana'),
(196, 'Chicken Salad', '20', '6.99', '', '', 'chickensalad.jpg', 1, '2017-03-15 07:18:35', '0000-00-00 00:00:00', 'Grilled Chicken on a Bed of Crispy Mixed Greens'),
(197, 'Lovash Chicken Wings', '18', '6.99', '', '', 'lovashchickenwings.jpg', 1, '2017-03-15 07:18:43', '0000-00-00 00:00:00', 'Marinated Chicken Wings Cooked in Clay oven'),
(198, 'Tandoori Roti', '21', '1.99', '', '', 'tandooriroti.jpg', 1, '2017-03-15 07:19:12', '0000-00-00 00:00:00', 'An Indian Bread Made with Whole-Wheat Flour'),
(199, ' Pomegranate Chicken Masala', '22', '16.75', '', '', 'anarchickenmasala.jpg', 1, '2017-03-15 07:19:38', '0000-00-00 00:00:00', ''),
(200, 'Parantha', '21', '1.99', '', '', 'plainparatha.jpg', 1, '2017-03-15 07:19:39', '0000-00-00 00:00:00', 'A Typical Double Folded Buttered Indian Bread Made with Whole-Wheat Flour'),
(201, 'Spinach Parantha', '21', '2.49', '', '', 'spinachparantha.jpg', 1, '2017-03-15 07:20:07', '0000-00-00 00:00:00', 'Fresh Spinach Blended With Whole-Wheat Flour Double Folded Bread'),
(202, ' Mango Chicken', '22', '17.00', '', '', 'chickenmango.jpg', 1, '2017-03-15 07:20:07', '0000-00-00 00:00:00', ''),
(203, 'Naan', '21', '1.99', '', '', 'naan.jpg', 1, '2017-03-15 07:20:24', '0000-00-00 00:00:00', 'Bread Made with Unbleached Flour, Baked in Our Clay Oven'),
(204, 'Surf And Turf Masala', '22', '16.95', '', '', 'surfturfmasala.jpg', 1, '2017-03-15 07:20:28', '0000-00-00 00:00:00', ''),
(205, 'Onion Kulcha', '21', '2.99', '', '', 'onionkulcha.jpg', 1, '2017-03-15 07:20:46', '0000-00-00 00:00:00', 'Stuffed with Onions Herbs & Spices'),
(206, 'Harabhara Beef/Lamb', '22', '18.00', '', '', 'harabharabeef.jpg', 1, '2017-03-15 07:20:50', '0000-00-00 00:00:00', ''),
(207, 'Aloo Parantha', '21', '2.99', '', '', 'alooparantha.jpg', 1, '2017-03-15 07:21:05', '0000-00-00 00:00:00', 'Whole-Wheat Bread Stuffed with Potatoes & Spice'),
(208, 'Paneer Naan', '21', '3.49', '', '', 'paneerbhatura.jpg', 1, '2017-03-15 07:21:28', '0000-00-00 00:00:00', 'Naan Stuffed with Homemade Cottage Cheese, Herbs & Spices'),
(209, ' Harabhara Lamb', '22', '18.00', '', '', 'harabharabeef.jpg', 1, '2017-03-15 07:21:39', '0000-00-00 00:00:00', ''),
(210, 'Lovash Naan', '21', '3.49', '', '', 'naan.jpg', 1, '2017-03-15 07:22:01', '0000-00-00 00:00:00', 'Naan Stuffed with Cheese, Mushrooms, Herbs & Spices'),
(211, 'Shrimp Mastana', '22', '19.00', '', '', 'shrimpmasala.jpg', 1, '2017-03-15 07:22:09', '0000-00-00 00:00:00', ''),
(212, 'Musulini Naan', '21', '3.49', '', '', 'musulininaan.jpg', 1, '2017-03-15 07:22:21', '0000-00-00 00:00:00', 'Naan Stuffed with Mozzarella Cheese, Garlic, Herbs & Spices'),
(213, 'Mix Vegetable Haryali', '22', '15.00', '', '', 'mixvegetableharyali.jpg', 1, '2017-03-15 07:22:32', '0000-00-00 00:00:00', ''),
(214, 'Chicken Naan', '21', '3.49', '', '', 'chickennaan.jpg', 1, '2017-03-15 07:22:51', '0000-00-00 00:00:00', 'Delicately Spiced Naan, Stuffed with Chicken & Fresh Herbs'),
(215, 'Fish Maselader', '22', '17.00', '', '', 'fishmasaledar.jpg', 1, '2017-03-15 07:23:08', '0000-00-00 00:00:00', ''),
(216, 'Keema Naan', '21', '3.49', '', '', 'keemaparantha.jpg', 1, '2017-03-15 07:23:12', '0000-00-00 00:00:00', 'Naan Stuffed with Ground Beef & Shredded Mozzarella Cheese'),
(217, 'Pishaureri Naan', '21', '3.99', '', '', 'peshawarinaan.jpg', 1, '2017-03-15 07:23:40', '0000-00-00 00:00:00', 'Typical of Afghanistan, Shredded Coconut & Raisins'),
(218, ' Butter Chicken', '23', '15.99', '', '', 'butterchicken.jpg', 1, '2017-03-15 07:23:57', '0000-00-00 00:00:00', 'Traditional Tomato Sauce and Combination of Sweet & Sour Spices & Herbs. Makes This Unique Choice of Taste.'),
(219, 'Garlic Naan', '21', '2.99', '', '', 'garlicnaan.jpg', 1, '2017-03-15 07:24:03', '0000-00-00 00:00:00', 'Topped with Garlic, Herbs & Spices'),
(220, 'Puri', '21', '3.49', '', '', 'puri.jpg', 1, '2017-03-15 07:24:31', '0000-00-00 00:00:00', 'Whole-Wheat Deep Fried, Puffy Traditional Bread'),
(221, ' Dhaniya Chicken', '23', '14.99', '', '', 'dhaniyachicken.jpg', 1, '2017-03-15 07:24:36', '0000-00-00 00:00:00', 'BBQ Chicken Marinated in Yogurt & Cooked in Fresh Cilantro Sauce'),
(222, 'Mohans Lamb Niyamatkhani (Our Executive Chefs Special)', '23', '16.99', '', '', 'mohans.jpg', 1, '2017-03-15 07:25:10', '2017-03-20 05:58:42', 'Marinated in Seasoned Coconut Milk, & Flash Seared in its Natural Juices, Served in a Coconut-Based Sauce'),
(223, 'Tandoori Lobster', '24', '24.99', '', '', 'tandoorilobster.jpg', 1, '2017-03-15 07:25:16', '0000-00-00 00:00:00', 'Fresh Water Lobster Tail Marinated in Selected Spices & Cooked in Clay Oven'),
(224, 'Maharaja Kofta', '23', '13.99', '', '', 'maharajakofta.jpg', 1, '2017-03-15 07:25:29', '0000-00-00 00:00:00', 'A Royal Dish of Indian Cheese Stuffed with Vegetable, Cashews, Raisins, Herbs & Spices, Served in a Tomato Sauce'),
(225, 'Fish Tikka', '24', '14.99', '', '', 'fishtikka.jpg', 1, '2017-03-15 07:25:35', '0000-00-00 00:00:00', 'Chunks of Fresh Fish Marinated in Yogurt & Herbs Cooked in Clay Oven'),
(226, ' Shahi Paneer', '23', '12.99', '', '', 'shaahipaneer.jpg', 1, '2017-03-15 07:25:48', '0000-00-00 00:00:00', 'Homemade Cottage Cheese Cubed & Rolled in Sundried Tomato Sauce'),
(227, 'Tandoori Shrimp', '24', '16.99', '', '', 'tandoorishrimp.jpg', 1, '2017-03-15 07:25:53', '0000-00-00 00:00:00', 'Selected marinated Prawns Cooked on Clay Oven'),
(228, 'Grilled Salmon With Goa Sauce', '23', '15.99', '', '', 'grilledsalmon.jpg', 1, '2017-03-15 07:26:16', '0000-00-00 00:00:00', 'Grilled Salmon Served on Onions, Tomatoes & Relish Topped with Goa Sauce'),
(229, 'Tandoori Chicken', '24', '14.99', '', '', 'tandoorichicken.jpg', 1, '2017-03-15 07:26:19', '0000-00-00 00:00:00', 'Spring Chicken Marinated In Special Marinade with Freshly Ground Spices Cooked in Clay Oven'),
(230, 'Chicken Tikka', '24', '13.99', '', '', 'chickentikka.jpg', 1, '2017-03-15 07:26:40', '0000-00-00 00:00:00', 'Boneless Pieces of Chicken Marinated & Cooked in Clay Oven'),
(231, 'Aloo-Gobi', '25', '8.99', '', '', 'aloogobi.jpg', 1, '2017-03-15 07:26:57', '0000-00-00 00:00:00', 'Cauliflower & Potatoes Cooked in Herbs & Spices'),
(232, 'Tikka-Kebab Musulini', '24', '14.99', '', '', 'tikkakababmusulini.jpg', 1, '2017-03-15 07:27:00', '0000-00-00 00:00:00', 'Tender Pieces of Marinated Chicken Cooked with Garlic & Spices Cooked in Clay Oven'),
(233, 'Mattar Paneer', '25', '8.99', '', '', 'matarpaneer.jpg', 1, '2017-03-15 07:27:18', '0000-00-00 00:00:00', 'Homemade Cheese & Peas Cooked with Tomatoes, Herbs & Spices'),
(234, 'Chicken Chops', '24', '14.99', '', '', 'chickenchops.jpg', 1, '2017-03-15 07:27:22', '0000-00-00 00:00:00', 'Chicken Drumsticks Created by Our Chef & Given the Shape of Chop-Marinated Grilled, Cooked in a Clay Oven & Served on a Hot Sizzling Plate'),
(235, 'Palak-Paneer', '25', '8.99', '', '', 'palakpaneer.jpg', 1, '2017-03-15 07:27:39', '0000-00-00 00:00:00', 'Spinach with Paneer (Cheese), Fresh Herbs & Spices'),
(236, 'Lamb Chops', '24', '21.99', '', '', 'lambchops.jpg', 1, '2017-03-15 07:27:40', '0000-00-00 00:00:00', 'Approximately 16oz. of Baby Lamb Chops, Rack of Baby Lamb Chops Marinated & Seared, Topped with Creamy Mint Sauce & Cooked in a Clay Oven'),
(237, 'Lamb Kebab', '24', '16.99', '', '', 'lambkabab.jpg', 1, '2017-03-15 07:28:00', '0000-00-00 00:00:00', 'Chunks of Lamb (Stick) Cooked in a Clay Oven'),
(238, ' Began-Bhurta', '25', '8.99', '', '', 'beganbhurta.jpg', 1, '2017-03-15 07:28:02', '0000-00-00 00:00:00', 'Roasted Eggplant Cooked with Fresh Tomatoes, Onions, Herbs & Spices'),
(239, 'Shish Kebab', '24', '13.99', '', '', 'shishkabab.jpg', 1, '2017-03-15 07:28:21', '0000-00-00 00:00:00', 'Seasoned Ground Beef Molded on Skewers & Cooked in a Clay Oven'),
(240, 'Mushroom Vindaloo', '25', '8.99', '', '', 'mushroomvindaloo.jpg', 1, '2017-03-15 07:28:36', '0000-00-00 00:00:00', 'Mushrooms & Potatoes Cooked with Tomatoes & Onions in Goan Style'),
(241, 'Tandoori Tofu', '24', '9.99', '', '', 'tandooritofu.jpg', 1, '2017-03-15 07:28:40', '0000-00-00 00:00:00', 'Marinated Tofu Grilled to Perfection & Cooked in a Clay Oven'),
(242, 'Chana Masala', '25', '8.99', '', '', 'chanamasala.jpg', 1, '2017-03-15 07:29:01', '0000-00-00 00:00:00', 'Chick Peas Cooked with Tomatoes in a Special Sauce'),
(243, 'Vegetable Curry', '25', '8.99', '', '', 'vegetablecurry.jpg', 1, '2017-03-15 07:29:19', '0000-00-00 00:00:00', 'Fresh Vegetables Cooked in Blend of Onions, Tomatoes & Garlic'),
(244, 'Utthappam', '26', '8.95', '', '', 'uttapam.jpg', 1, '2017-03-15 07:29:32', '0000-00-00 00:00:00', 'A rice flour and lentil pancake which is thicker & come with a topping of your choice: onions, tomatoes, peppers, hot peppers, herbs.'),
(245, 'Vegetable Korma', '25', '8.99', '', '', 'vegetablekorma.jpg', 1, '2017-03-15 07:29:34', '0000-00-00 00:00:00', 'Mixed Vegetables Cooked in a Creamy Rich Sauce'),
(246, ' Dal Special', '25', '8.99', '', '', 'dalspecial.jpg', 1, '2017-03-15 07:29:54', '0000-00-00 00:00:00', 'A Variety of Specially Prepared Lentils'),
(247, ' Idlis', '26', '8.00', '', '', 'idlis.jpg', 1, '2017-03-15 07:30:07', '0000-00-00 00:00:00', 'Steamed rice flour and lentil cakes'),
(248, 'Bhindi Masala', '25', '8.99', '', '', 'bhindimasala.jpg', 1, '2017-03-15 07:30:21', '0000-00-00 00:00:00', 'Okra Cooked in a Wok with Dry Seasonings & Herbs'),
(249, 'Lamb Chettinad', '26', '14.95', '', '', 'lambchettinad.jpg', 1, '2017-03-15 07:30:28', '0000-00-00 00:00:00', 'The traditional lamb dish cooked in typical style with black pepper, coconut milk, tamarind and curry leaves.'),
(250, 'Coondapur Chicken Curry', '26', '14.95', '', '', 'coondapurchickencurry.jpg', 1, '2017-03-15 07:30:46', '0000-00-00 00:00:00', 'The quintessential chicken curry from the southern part of india with a delicate blend of spices like coriander, cumin, coconut.'),
(251, 'Masala Potatoes', '26', '9.95', '', '', 'masalapotatoes.jpg', 1, '2017-03-15 07:31:13', '0000-00-00 00:00:00', 'Cubes of potatoes tossed with whole and cooked to golden brown.'),
(252, 'Aloo Dum Banarsi', '25', '8.99', '', '', 'aloodumbanarsi.jpg', 1, '2017-03-15 07:31:21', '2017-03-15 07:41:54', 'A Famous Potato Dish From (Banaras Holy Place) Simmered, Accompanied with Sun-Dried Tomatoes, Onions, Herbs & Spices'),
(253, 'Rajma Aloo', '25', '8.99', '', '', 'rajmaaloo.jpg', 1, '2017-03-15 07:31:44', '0000-00-00 00:00:00', 'Kidney Beans Cooked with Potatoes, Herbs & Spices'),
(254, 'Potatoes Masala Dosa', '26', '9.95', '', '', 'potatoesmasaladosa.jpg', 1, '2017-03-15 07:32:08', '0000-00-00 00:00:00', '(A rice flour and lentil crepe cooked to rispy golden color with a filling of your choice.)'),
(255, 'Mysore Masala Dosa', '26', '9.25', '', '', 'mysoremasaladosa.jpg', 1, '2017-03-15 07:32:22', '0000-00-00 00:00:00', '(A rice flour and lentil crepe cooked to rispy golden color with a filling of your choice.)'),
(256, 'Tikka Masala Sauce', '27', '9.99', '', '', 'tikkamasalasauce.jpg', 1, '2017-03-15 07:32:26', '0000-00-00 00:00:00', 'Chefs Invention, What Creates this Sauce, Sundried Tomato Sauce and Combination to Match Up this Spic'),
(257, 'Mushroom & Onions Dosa', '26', '9.25', '', '', 'mushroomoniondosa.jpg', 1, '2017-03-15 07:32:35', '0000-00-00 00:00:00', '(A rice flour and lentil crepe cooked to rispy golden color with a filling of your choice.)'),
(258, ' Korma', '27', '9.99', '', '', 'korma.jpg', 1, '2017-03-15 07:32:47', '0000-00-00 00:00:00', 'Exquisitely Blended Spices & Herbs Mild Sauce Prepared with Cashews & Dressed with Cream'),
(259, 'Minced Lamb Dosa', '26', '9.95', '', '', 'mincedlambdosa.jpg', 1, '2017-03-15 07:32:50', '0000-00-00 00:00:00', '(A rice flour and lentil crepe cooked to rispy golden color with a filling of your choice.)'),
(260, 'Chicken Dosa', '26', '9.95', '', '', 'chickendosa.jpg', 1, '2017-03-15 07:33:03', '0000-00-00 00:00:00', '(A rice flour and lentil crepe cooked to rispy golden color with a filling of your choice.)'),
(261, 'Saag', '27', '9.99', '', '', 'saag.jpg', 1, '2017-03-15 07:33:21', '0000-00-00 00:00:00', 'Fresh Spinach, Delicately Cooked with Fresh Garlic, Onions, Herbs & Spices'),
(262, ' Jalfraizie', '27', '9.99', '', '', 'jalfrezi.jpg', 1, '2017-03-15 07:33:40', '0000-00-00 00:00:00', '(Indian Stir Fry) Prepared with Ground Spices & Sauteed with Tomatoes & Onions'),
(263, 'Vindaloo', '27', '9.99', '', '', 'vindaloo.jpg', 1, '2017-03-15 07:34:12', '0000-00-00 00:00:00', 'Originated in the Island of Goa! A Truly Balanced Taste of Hot & Sour Sauce'),
(265, 'Curries', '27', '9.99', '', '', 'curries.jpg', 1, '2017-03-15 07:34:35', '0000-00-00 00:00:00', 'Fresh Blend of Onions, Tomatoes, Ginger, Garlic & Fresh Herbs Simmered on the Flame'),
(266, ' Rogan Josh', '27', '9.99', '', '', 'roganjosh.jpg', 1, '2017-03-15 07:34:52', '0000-00-00 00:00:00', 'A Classic Touch of Mughals Simmer Flame Cooked with Onion, Tomato, Garlic, Ginger, Herb & Spices'),
(267, 'Chicken Biryani', '28', '13.99', '', '', 'chickenbiryani.jpg', 1, '2017-03-15 07:35:28', '0000-00-00 00:00:00', 'Aromatic Long Grain Basmati Rice with Chicken in a Blend of Herbs & Spices'),
(268, 'Kheer', '29', '3.99', '', '', 'kheer.jpg', 1, '2017-03-15 07:35:35', '0000-00-00 00:00:00', 'Traditional Ceremonial Rice Pudding'),
(269, 'Gulab Jamun', '29', '3.99', '', '', 'gulab.jpg', 1, '2017-03-15 07:35:55', '0000-00-00 00:00:00', 'Pastry Balls Made from Milk Served in Syrup'),
(270, 'Lamb Biryani', '28', '16.99', '', '', 'lambiryani.jpg', 1, '2017-03-15 07:36:05', '0000-00-00 00:00:00', 'Aromatic Long Grain Basmati Rice with Lamb in a Blend of Herbs & Spices'),
(271, ' Mango Kulfi', '29', '3.99', '', '', 'kulfi.jpg', 1, '2017-03-15 07:36:15', '0000-00-00 00:00:00', 'Fresh Mango Ice Cream'),
(272, 'Shrimp Biryani', '28', '16.99', '', '', 'shrimpbiryani.jpg', 1, '2017-03-15 07:36:24', '0000-00-00 00:00:00', 'Basmati Rice with Shrimp, Herbs & Delicate Spices'),
(273, ' Pistachio Kulfi', '29', '3.99', '', '', 'kulfi.jpg', 1, '2017-03-15 07:36:45', '0000-00-00 00:00:00', 'Homemade Pistachio Ice Cream'),
(274, ' Mixed Vegetable Biryani', '28', '10.99', '', '', 'mixedvegetablebiryani.jpg', 1, '2017-03-15 07:36:59', '0000-00-00 00:00:00', 'Basmati Rice with Mixed Vegetables & Spices'),
(275, 'Rus Malai', '29', '3.99', '', '', 'rasmalai.jpg', 1, '2017-03-15 07:37:11', '0000-00-00 00:00:00', 'Homemade Cheese Cake'),
(276, 'Suji Halwa', '29', '2.99', '', '', 'sujihalwa.jpg', 1, '2017-03-15 07:37:39', '0000-00-00 00:00:00', '(Non Dairy) - Cream of Wheat Cooked with Dried Fruits, Topped with Pistachios'),
(277, 'Salt & Jeera (Salty Lassi)', '30', '2.49', '', '', 'saltjeera.jpg', 1, '2017-03-15 07:38:04', '0000-00-00 00:00:00', 'Roasted Cumin Seeds'),
(278, 'Papdum', '31', '2.00', '', '', 'papadam.jpg', 1, '2017-03-15 07:38:12', '0000-00-00 00:00:00', ''),
(279, 'Extra Rice (16 Oz.)', '31', '3.00', '', '', 'rice1.jpg', 1, '2017-03-15 07:38:28', '0000-00-00 00:00:00', ''),
(280, 'Sweet Lassi', '30', '2.49', '', '', 'lassi.jpg', 1, '2017-03-15 07:38:29', '0000-00-00 00:00:00', 'with Cardamom & Spices'),
(281, ' Raita (8 Oz.)', '31', '3.00', '', '', 'raita.jpg', 1, '2017-03-15 07:38:41', '0000-00-00 00:00:00', ''),
(282, 'Lassi', '30', '2.99', '', '', 'lassi.jpg', 1, '2017-03-15 07:38:47', '0000-00-00 00:00:00', 'with Cardamom'),
(283, ' Pickled Chutney (8 Oz.)', '31', '3.00', '', '', 'pickledchutney.jpg', 1, '2017-03-15 07:38:59', '0000-00-00 00:00:00', ''),
(284, 'Hot Drinks', '30', '1.99', '', '', 'hotdrinks.jpg', 1, '2017-03-15 07:39:09', '0000-00-00 00:00:00', ''),
(285, ' Pickled Achaar (8 Oz.)', '31', '3.00', '', '', 'achaar.jpg', 1, '2017-03-15 07:39:19', '0000-00-00 00:00:00', ''),
(286, ' Iced Tea', '30', '1.99', '', '', 'icedtea.jpg', 1, '2017-03-15 07:39:35', '0000-00-00 00:00:00', ''),
(287, ' Mango Chutney (8 Oz.)', '31', '3.00', '', '', 'mangochutney.jpg', 1, '2017-03-15 07:39:37', '0000-00-00 00:00:00', ''),
(288, 'Soft Drinks', '30', '1.99', '', '', 'softdrink.jpg', 1, '2017-03-15 07:39:44', '0000-00-00 00:00:00', ''),
(289, 'Mint Chutney (8 Oz.)', '31', '3.00', '', '', 'mintchutney.jpg', 1, '2017-03-15 07:39:54', '0000-00-00 00:00:00', ''),
(290, ' Mango Juice', '30', '2.99', '', '', 'mangojuice.jpg', 1, '2017-03-15 07:39:54', '0000-00-00 00:00:00', ''),
(291, 'Tamarind Sauce (8 Oz.)', '31', '3.00', '', '', 'tamarined.jpg', 1, '2017-03-15 07:40:05', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addon`
--
ALTER TABLE `addon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addon_list`
--
ALTER TABLE `addon_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupan`
--
ALTER TABLE `coupan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_event`
--
ALTER TABLE `special_event`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addon`
--
ALTER TABLE `addon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `addon_list`
--
ALTER TABLE `addon_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coupan`
--
ALTER TABLE `coupan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `special_event`
--
ALTER TABLE `special_event`
  MODIFY `item_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
