-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 08:29 AM
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
-- Database: `onlinefoodphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', 'd6bf4bb9a66419380a7e8b034270d381', 'admin@mail.com', '', '2024-05-08 10:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_persons`
--

CREATE TABLE `delivery_persons` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp(4) NOT NULL DEFAULT current_timestamp(4) ON UPDATE current_timestamp(4)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_persons`
--

INSERT INTO `delivery_persons` (`id`, `name`, `email`, `phone`, `status`, `created_at`) VALUES
(1, 'ram', 'ram@gmail.com', '99887766', '', '2024-05-09 11:49:28.1215'),
(2, 'vijaykumar', 'vijay@gmail.com', '99885566', '', '2024-05-09 11:49:35.1898'),
(3, 'rahul', 'rahul@gmail.com', '7867890866', '', '2024-05-09 11:49:43.5306'),
(4, 'harish', 'harish@gmail.com', '998877', '', '2024-05-09 11:49:22.7758'),
(5, 'john', 'john@gmail.com', '7788997766', '', '2024-05-09 11:49:13.8681'),
(6, 'kerrthivassan', 'keerthi@gmail.com', '7788995544', '', '2024-05-09 11:35:06.6525');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(17, 5, 'Curry Leaves Idli', 'Idli pieces mixed with curry leaves powder and spices', 150.00, '6639de0149de5.jpg'),
(18, 7, ' Kannappa special non veg meals', ' Chettinad chicken pepper dry, Kannappa special non veg meals, Bamboo mutton biriyani, Bbq fish, Pepper bbq chicken, Kashmiri naan, Paneer butter masala, Crab soup, Schezwan chicken fried  rice.', 500.00, '6639df69d2e3c.jpg'),
(19, 6, 'BIRYANI ', 'Our first branch was started in 1987 in a small Town, Trichy. Now we have spread across 5 Cities & Towns with 10 Branches catering to the needs of the masses happily', 450.00, '6639e0482774a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(1, 2, 'in process', 'none', '2022-05-01 05:17:49'),
(2, 3, 'in process', 'none', '2022-05-27 11:01:30'),
(3, 2, 'closed', 'thank you for your order!', '2022-05-27 11:11:41'),
(4, 3, 'closed', 'none', '2022-05-27 11:42:35'),
(5, 4, 'in process', 'none', '2022-05-27 11:42:55'),
(6, 1, 'rejected', 'none', '2022-05-27 11:43:26'),
(7, 7, 'in process', 'none', '2022-05-27 13:03:24'),
(8, 8, 'in process', 'none', '2022-05-27 13:03:38'),
(9, 9, 'rejected', 'thank you', '2022-05-27 13:03:53'),
(10, 7, 'closed', 'thank you for your ordering with us', '2022-05-27 13:04:33'),
(11, 8, 'closed', 'thanks ', '2022-05-27 13:05:24'),
(12, 5, 'closed', 'none', '2022-05-27 13:18:03'),
(13, 11, 'closed', 'delivered successfully', '2024-04-27 09:42:53'),
(14, 10, 'closed', 'DELIVERED', '2024-04-27 10:05:06'),
(15, 12, 'closed', 'delivered', '2024-05-08 09:51:25'),
(16, 12, 'in process', 'order on the way', '2024-05-08 12:11:26'),
(17, 12, 'in process', 'from rahul', '2024-05-08 12:27:26'),
(18, 12, 'closed', 'delivered', '2024-05-09 04:48:07'),
(19, 10, 'closed', 'delivered', '2024-05-09 09:21:54'),
(20, 10, 'closed', 'delivered', '2024-05-09 10:20:31'),
(21, 13, 'rejected', 'not active', '2024-05-09 10:27:37'),
(22, 10, 'in process', 'on the way', '2024-05-09 10:41:10'),
(23, 13, 'in process', 'on the way', '2024-05-09 10:41:45'),
(24, 14, 'closed', ' food delivered to shalini', '2024-05-09 11:00:25'),
(25, 13, 'closed', 'food delivered by rahul', '2024-05-09 11:18:50'),
(26, 14, 'in process', 'on the way', '2024-05-09 11:50:49'),
(27, 14, 'closed', 'deli', '2024-05-09 11:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(5, 5, 'Shri Sangeethas', 'sangeethas@gmail.com', '9988771122', 'shrisangeethas.com', '6am', '11pm', '24hr-x7', 'thillainagartrichy, tamilnadu', '6639dae87ffbc.jpg', '2024-05-07 07:40:24'),
(6, 2, 'BANANALEAF RESTAURANT A/C RESTAURANT', 'banaleaf@gmail.com', '8855447722', 'bananaleaf.com', '6am', '12am', '24hr-x7', 'teppakulam, trichy, tamilnadu', '6639dbef981e3.jpg', '2024-05-07 07:44:47'),
(7, 1, 'Hotel Kannappa', 'kannappa@gmail.com', '6396458787', 'kannappahotel.com', '7am', '11pm', '24hr-x7', 'contonment, trichy, tamilnadu', '6639dca177232.jpg', '2024-05-07 07:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(1, 'Chettinad restaurant', '2024-05-07 07:33:08'),
(2, 'South Indian restaurant', '2024-05-07 07:32:26'),
(5, 'A Multi-Cuisine Dining Experience', '2024-05-07 07:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(7, 'rajesh', 'rajesh', 'r', 'rajesh123@gmail.com', '9988775566', 'bf44e33d9745e04551770c7a5a6cdb3b', 'thillainagar, trichy', 1, '2024-04-27 09:35:11'),
(8, 'ramesh', 'ramesh', 'r', 'ramesh@gmail.com', '9988776655', 'e10adc3949ba59abbe56e057f20f883e', 'trichy', 1, '2024-05-08 07:04:42'),
(9, 'shalini', 'SHALINI', 'ramesh', 'shalini@gmail.com', '9988775566', 'bc957a46e9f7280b47782cf8e7c626f4', 'trichy', 1, '2024-05-08 09:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(12, 9, 'Curry Leaves Idli', 1, 150.00, 'closed', '2024-05-09 04:48:07'),
(13, 9, 'BIRYANI ', 2, 450.00, 'closed', '2024-05-09 11:18:50'),
(14, 9, 'Curry Leaves Idli', 1, 150.00, 'closed', '2024-05-09 11:54:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `delivery_persons`
--
ALTER TABLE `delivery_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivery_persons`
--
ALTER TABLE `delivery_persons`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
