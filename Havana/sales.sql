-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2025 at 01:17 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `membership_number` varchar(100) NOT NULL,
  `prod_name` varchar(550) NOT NULL,
  `expected_date` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `o_price` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `onhand_qty` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `qty_sold` int(10) NOT NULL,
  `expiry_date` varchar(500) NOT NULL,
  `date_arrival` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `gen_name`, `product_name`, `cost`, `o_price`, `price`, `profit`, `supplier`, `onhand_qty`, `qty`, `qty_sold`, `expiry_date`, `date_arrival`) VALUES
(58, 'Oil', 'Food', '', '', '150', '200', '50', '', 0, 81, 100, '2025-01-16', ''),
(61, 'Milk', 'Food', '', '', '100', '300', '200', '', 0, 456, 500, '2025-03-16', ''),
(62, 'Lipton', 'Food', '', '', '100', '300', '200', '', 0, 478, 500, '', ''),
(63, 'GAS', 'Food', '', '', '200', '200', '0', '', 0, 0, 100, '2025-03-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `profit`, `due_date`, `name`, `balance`) VALUES
(142, 'HA3330082', 'Admin', '01/13/25', 'cash', '200', '50', '400', 'Anonymous', ''),
(143, 'RS-2303', 'Admin', '01/13/25', 'cash', '2000', '500', '500', 'Anonymous', ''),
(144, 'HA3600432', 'Admin', '01/13/25', 'cash', '200', '50', '600', 'Anonymous', ''),
(145, 'HA222223', 'Admin', '01/13/25', 'cash', '200', '50', '777', 'Anonymous', ''),
(146, 'RS-82224', 'Admin', '01/13/25', 'cash', '200', '50', '555', 'Anonymous', ''),
(147, 'RS-03202032', 'Admin', '01/13/25', 'cash', '200', '50', '500', 'Anonymous', ''),
(148, 'HA306304', 'Admin', '01/14/25', 'cash', '', '', '500', 'Anonymous', ''),
(149, 'HA200222', 'Admin', '01/14/25', 'cash', '400', '100', '600', 'Anonymous', ''),
(150, 'RS-23936', 'Admin', '01/14/25', 'cash', '200', '50', '500', 'Anonymous', ''),
(151, 'RS-02223372', 'Admin', '01/14/25', 'cash', '200', '50', '777', 'Anonymous', ''),
(152, 'RS-307202', 'Admin', '01/14/25', 'cash', '200', '50', '400', 'Anonymous', ''),
(153, '', 'Admin', '01/14/25', 'cash', '', '', '400', 'Anonymous', ''),
(154, 'HA23383932', 'Admin', '01/14/25', 'cash', '200', '50', '200', 'Anonymous', ''),
(155, 'HA23222633', 'Admin', '03/15/25', 'cash', '200', '50', '500', 'Anonymous', ''),
(156, 'HA322303', 'Admin', '03/15/25', 'cash', '200', '50', '300', 'Anonymous', ''),
(157, 'HA436333', 'Admin', '03/15/25', 'cash', '200', '50', '555', 'Anonymous', ''),
(158, '2328547', 'Admin', '03/15/25', 'cash', '', '', '333', 'Anonymous', ''),
(159, 'RS-252', 'Admin', '03/15/25', 'cash', '', '', '6666', 'Anonymous', ''),
(160, 'RS-08822200', 'Admin', '03/15/25', 'cash', '200', '50', '200', 'Anonymous', ''),
(161, 'RS-8772228', 'Admin', '03/15/25', 'cash', '200', '50', '400', 'Anonymous', ''),
(162, 'RS-3302320', 'Admin', '03/15/25', 'cash', '200', '50', '500', 'Anonymous', ''),
(163, 'RS-030230', 'Admin', '03/15/25', 'cash', '200', '50', '555', 'Anonymous', ''),
(164, '48628158', 'Admin', '03/15/25', 'cash', '200', '50', '55', 'Anonymous', ''),
(165, '75487389', 'Admin', '03/15/25', 'cash', '300', '200', '500', 'Anonymous', ''),
(166, '80120278', 'Admin', '03/15/25', 'cash', '300', '200', '700', 'Anonymous', ''),
(167, '20503510', 'Admin', '03/15/25', 'cash', '300', '200', '600', 'Anonymous', ''),
(168, 'HA003000', 'Admin', '03/15/25', 'cash', '300', '200', '500', 'Anonymous', ''),
(169, '60468981', 'Admin', '03/16/25', 'cash', '300', '200', '500', 'Anonymous', ''),
(170, '20333003', 'Admin', '03/16/25', 'cash', '300', '200', '600', 'Anonymous', ''),
(171, '24322333', 'Admin', '03/16/25', 'cash', '200', '50', '600', 'Anonymous', ''),
(172, '29700252', 'Admin', '03/16/25', 'cash', '300', '200', '777', 'Anonymous', ''),
(173, '59852203', 'Admin', '03/16/25', 'cash', '300', '200', '500', 'Anonymous', ''),
(174, '17632974', 'Admin', '03/16/25', 'cash', '300', '200', '600', 'Anonymous', ''),
(175, 'RS-53383307', 'Admin', '03/16/25', 'cash', '300', '200', '555', 'Anonymous', ''),
(176, '05539298', 'Admin', '03/16/25', 'cash', '200', '50', '666', 'Anonymous', ''),
(177, '05539298', 'Admin', '03/16/25', 'cash', '200', '50', '333', 'Anonymous', ''),
(178, '73537188', 'Admin', '03/16/25', 'cash', '200', '50', '800', 'Anonymous', ''),
(179, '', 'Admin', '03/16/25', 'cash', '300', '200', '700', 'Anonymous', ''),
(180, '25279832', 'Admin', '03/16/25', 'cash', '300', '200', '800', 'Anonymous', ''),
(181, '64342823', 'Admin', '03/16/25', 'cash', '300', '200', '800', 'Anonymous', ''),
(182, 'HA32922', 'Admin', '03/16/25', 'cash', '', '', '777', 'Anonymous', ''),
(183, '50045383', 'Admin', '03/16/25', 'cash', '', '', '999', 'Anonymous', ''),
(184, '55145091', 'Administrator', '03/16/25', 'cash', '200', '50', '300', 'Anonymous', ''),
(185, '57669054', 'Administrator', '03/16/25', 'cash', '300', '200', '500', 'Anonymous', ''),
(186, '88877156', 'Admin', '03/16/25', 'cash', '300', '200', '299', 'Anonymous', ''),
(187, '29914906', 'Administrator', '03/16/25', 'cash', '300', '200', '500', 'Anonymous', ''),
(188, '71121042', 'Admin', '03/18/25', 'cash', '1800', '700', '2000', 'Anonymous', ''),
(189, '73334975', 'Admin', '03/18/25', 'cash', '400', '100', '500', 'Anonymous', ''),
(190, '64821146', 'Admin', '03/18/25', 'cash', '18400', '0', '20000', 'Anonymous', ''),
(191, 'RS-2233220', '<br />\r\n<b>Warning</b>:  Undefined array key ', '03/19/25', 'cash', '<br />\r\n<b>Warning</b>:  Undefined array key ', '<br />\r\n<b>Warning</b>:  Undefined array key ', '700', 'Anonymous', ''),
(192, '86128758', 'MIKE', '04/17/25', 'cash', '300', '200', '600', 'Anonymous', ''),
(193, '53834170', 'Admin', '04/17/25', 'cash', '300', '200', '900', 'Anonymous', ''),
(194, '68636082', 'Admin', '04/17/25', 'cash', '600', '400', '77777', '', ''),
(195, '37222333', 'Admin', '04/17/25', 'cash', '300', '200', '11111', '4efsg', ''),
(196, 'RS-2339908', 'Admin', '04/17/25', 'cash', '', '', '300', 'Anonymous', ''),
(197, '90652235', 'MIKE', '04/17/25', 'cash', '300', '200', '400', 'Anonymous', ''),
(198, '95692727', 'MIKE', '04/18/25', 'cash', '', '', '200', 'Anonymous', ''),
(199, 'RS-2322333', 'Admin', '04/18/25', 'cash', '', '', '200', 'Anonymous', ''),
(200, '08845923', 'Admin', '04/18/25', 'cash', '300', '200', '300', 'Anonymous', ''),
(201, '32900344', 'MIKE', '04/18/25', 'cash', '300', '200', '300', 'Anonymous', ''),
(202, '50578915', 'MIKE', '04/18/25', 'cash', '', '', '300', 'Anonymous', ''),
(203, '', 'MIKE', '04/18/25', 'cash', '1200', '800', '400', 'Anonymous', ''),
(204, '18959947', 'MIKE', '04/18/25', 'cash', '', '', '500', 'Anonymous', ''),
(205, '90043304', 'MIKE', '04/18/25', 'cash', '200', '0', '500', 'Anonymous', ''),
(206, '22804972', 'MIKE', '04/18/25', 'cash', '300', '200', '700', 'Anonymous', ''),
(207, '61110532', 'Admin', '04/18/25', 'cash', '300', '200', '500', 'Anonymous', ''),
(208, '33594124', 'Admin', '04/18/25', 'cash', '300', '200', '600', 'Anonymous', ''),
(209, 'RS-33322227', 'Admin', '04/18/25', 'cash', '300', '200', '800', 'Anonymous', ''),
(210, '23302542', 'Admin', '04/18/25', 'cash', '300', '200', '300', 'Anonymous', ''),
(211, '49267313', 'MIKE', '04/18/25', 'cash', '300', '200', '600', 'Anonymous', ''),
(212, '00967200', 'katari', '04/18/25', 'cash', '200', '50', '700', 'Anonymous', ''),
(213, '07195144', 'as', '04/18/25', 'cash', '300', '200', '500', 'Anonymous', ''),
(214, '42149843', 'as', '04/18/25', 'cash', '', '', '700', 'Anonymous', ''),
(215, '39060677', 'Havana', '04/18/25', 'cash', '300', '200', '600', 'Anonymous', ''),
(216, '77920574', 'Havana', '04/19/25', 'cash', '300', '200', '600', 'Anonymous', ''),
(217, '42114892', 'Havana', '04/19/25', 'cash', '300', '200', '700', 'Anonymous', ''),
(218, '87555063', 'as', '04/19/25', 'cash', '300', '200', '600', 'Anonymous', ''),
(219, '85357711', 'as', '04/19/25', 'cash', '300', '200', '600', 'Anonymous', ''),
(220, '48086290', 'as', '04/19/25', 'cash', '300', '200', '800', 'Anonymous', ''),
(221, '13126391', 'as', '04/19/25', 'cash', '300', '200', '700', 'Anonymous', ''),
(222, '24582621', 'as', '04/19/25', 'cash', '', '', '600', 'Anonymous', ''),
(223, '93049283', 'Havana', '04/19/25', 'cash', '300', '200', '800', 'Anonymous', ''),
(224, '17337498', 'Havana', '04/19/25', 'cash', '', '', '500', 'Anonymous', ''),
(225, '73613795', 'Havana', '04/19/25', 'cash', '300', '200', '700', 'Anonymous', ''),
(226, '14329728', 'Havana', '04/19/25', 'cash', '300', '200', '700', 'Anonymous', ''),
(227, '08018865', 'Havana', '04/20/25', 'cash', '300', '200', '55', 'Anonymous', ''),
(228, '06376969', 'Havana', '04/20/25', 'cash', '300', '200', '400', 'Anonymous', ''),
(229, '19167166', 'Havana', '04/20/25', 'cash', '300', '200', '577', 'Anonymous', ''),
(230, 'RS-2405330', 'Havana', '04/20/25', 'cash', '', '', '500', 'Anonymous', ''),
(231, '25546320', 'MIKE', '04/20/25', 'cash', '300', '200', '600', 'Anonymous', ''),
(232, '28376888', 'abs', '04/20/25', 'cash', '300', '200', '500', 'Anonymous', ''),
(233, '41516440', 'hana', '04/20/25', 'cash', '300', '200', '200', 'Anonymous', ''),
(234, '00086967', 'kay', '04/20/25', 'cash', '300', '200', '400', 'Anonymous', ''),
(235, '91034492', 'Precious', '04/20/25', 'cash', '300', '200', '600', 'Anonymous', ''),
(236, '69585493', 'Maltiti', '04/20/25', 'cash', '300', '200', '300', 'Anonymous', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `gen_name`, `name`, `price`, `discount`, `date`) VALUES
(346, '05539298', '58', '1', '200', '50', 'Oil', 'Food', '', '200', '', '03/16/25'),
(351, '55145091', '58', '1', '200', '50', 'Oil', 'Food', '', '200', '', '03/16/25'),
(352, '57669054', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '03/16/25'),
(353, '88877156', '62', '1', '300', '200', 'Lipton', 'Food', '', '300', '', '03/16/25'),
(354, '29914906', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '03/16/25'),
(355, '71121042', '63', '5', '1000', '250', 'GAS', 'Food', '', '200', '', '03/18/25'),
(356, '71121042', '58', '1', '200', '50', 'Oil', 'Food', '', '200', '', '03/18/25'),
(357, '71121042', '62', '2', '600', '400', 'Lipton', 'Food', '', '300', '', '03/18/25'),
(358, '73334975', '58', '1', '200', '50', 'Oil', 'Food', '', '200', '', '03/18/25'),
(359, '73334975', '63', '1', '200', '50', 'GAS', 'Food', '', '200', '', '03/18/25'),
(361, '86128758', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/17/25'),
(362, '53834170', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/17/25'),
(365, '68636082', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/17/25'),
(366, '68636082', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/17/25'),
(367, '37222333', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/17/25'),
(368, '20273733', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/17/25'),
(369, '20273733', '63', '1', '200', '0', 'GAS', 'Food', '', '200', '', '04/17/25'),
(370, '20273733', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/17/25'),
(371, '90652235', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/17/25'),
(372, '08845923', '62', '1', '300', '200', 'Lipton', 'Food', '', '300', '', '04/18/25'),
(373, '32900344', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/18/25'),
(375, '90043304', '63', '1', '200', '0', 'GAS', 'Food', '', '200', '', '04/18/25'),
(376, '22804972', '62', '1', '300', '200', 'Lipton', 'Food', '', '300', '', '04/18/25'),
(377, '61110532', '62', '1', '300', '200', 'Lipton', 'Food', '', '300', '', '04/18/25'),
(378, '33594124', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/18/25'),
(380, '23302542', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/18/25'),
(381, '49267313', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/18/25'),
(382, '00967200', '58', '1', '200', '50', 'Oil', 'Food', '', '200', '', '04/18/25'),
(383, '07195144', '62', '1', '300', '200', 'Lipton', 'Food', '', '300', '', '04/18/25'),
(384, '39060677', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/18/25'),
(385, '77920574', '62', '1', '300', '200', 'Lipton', 'Food', '', '300', '', '04/19/25'),
(386, '42114892', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/19/25'),
(387, '87555063', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/19/25'),
(388, '85357711', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/19/25'),
(389, '48086290', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/19/25'),
(390, '13126391', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/19/25'),
(391, '93049283', '61', '1', '300', '200', 'Milk', 'Food', '', '300', '', '04/19/25'),
(392, '73613795', '62', '1', '300', '200', 'Lipton', 'Food', '', '300', '', '04/19/25'),
(393, '14329728', '62', '1', '300', '200', 'Lipton', 'Food', '', '300', '', '04/19/25'),
(402, '69585493', '62', '1', '300', '200', 'Lipton', 'Food', '', '300', '', '04/20/25');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', '$2y$10$aT5EI2rgjnLk6BoM1/xHDe/UbeU2T7mJzMM/7M/72E.W0If.fhpQG', 'Admin', 'admin'),
(14, 'Havana', '$2y$10$IhmvjILWz/8ZtzBFJUEate5DGpfwr6FQzjvAb96KWDjBQdgGZSKhS', 'Havana', 'admin'),
(20, 'Maltiti', '$2y$10$lHkzsQ4PKcENPmRDCwTNoO7OEpIVkxv2FDhYBXMQ12v6s9g08Bo8a', 'Maltiti', 'cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchases_item`
--
ALTER TABLE `purchases_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
