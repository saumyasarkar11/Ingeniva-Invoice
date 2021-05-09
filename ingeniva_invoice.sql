-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2021 at 11:17 AM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ingeniva_invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `bank_id` int NOT NULL,
  `user_id` int NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_number` varchar(200) NOT NULL,
  `acc_type` enum('Current','Savings') NOT NULL,
  `account_name` varchar(150) NOT NULL,
  `ifsc_code` varchar(200) NOT NULL,
  `micr_code` varchar(200) NOT NULL,
  `swift_code` varchar(200) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_details`
--

CREATE TABLE `buyer_details` (
  `buyer_id` int NOT NULL,
  `user_id` int NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `code` int NOT NULL,
  `buyer_name` varchar(50) NOT NULL,
  `pan` varchar(20) NOT NULL,
  `cin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `data_id` int NOT NULL,
  `user_id` int NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `type` enum('Proforma Invoice','Tax Invoice') NOT NULL,
  `client` varchar(100) NOT NULL,
  `project` varchar(255) NOT NULL,
  `workorder` varchar(191) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `discount` varchar(3) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gst`
--

CREATE TABLE `gst` (
  `gst_id` int NOT NULL,
  `user_id` int NOT NULL,
  `gst` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `logo_id` int NOT NULL,
  `user_id` int NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mail_id` int NOT NULL,
  `smtp` varchar(5) NOT NULL,
  `hostname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `message_from` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mail_id`, `smtp`, `hostname`, `username`, `password`, `message_from`, `subject`) VALUES
(1, '465', 'host', 'username', 'password', 'Ingeniva Invoice Administrator', 'Recover Password');

-- --------------------------------------------------------

--
-- Table structure for table `other_data`
--

CREATE TABLE `other_data` (
  `id` int NOT NULL,
  `data_id` int NOT NULL,
  `product` varchar(191) NOT NULL,
  `qty` varchar(191) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `rate` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permanent_details`
--

CREATE TABLE `permanent_details` (
  `company_id` int NOT NULL,
  `user_id` int NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `pincode` int NOT NULL,
  `ph_number` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `whatsapp` varchar(14) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `pan_number` varchar(20) NOT NULL,
  `cin` varchar(26) NOT NULL,
  `statecode` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_description` varchar(250) NOT NULL,
  `sac` varchar(10) NOT NULL,
  `rate` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `sign_id` int NOT NULL,
  `user_id` int NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statecode`
--

CREATE TABLE `statecode` (
  `state_id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `company` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `company`, `type`, `email`, `password`, `pass`) VALUES
(1, 'John', 'Doe', 'ABC', 'Service', 'abc@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`bank_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `buyer_details`
--
ALTER TABLE `buyer_details`
  ADD PRIMARY KEY (`buyer_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`data_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `gst`
--
ALTER TABLE `gst`
  ADD PRIMARY KEY (`gst_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logo_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `other_data`
--
ALTER TABLE `other_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_id` (`data_id`);

--
-- Indexes for table `permanent_details`
--
ALTER TABLE `permanent_details`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `permanent_details_ibfk_1` (`user_id`),
  ADD KEY `permanent_details_ibfk_2` (`statecode`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sign`
--
ALTER TABLE `sign`
  ADD PRIMARY KEY (`sign_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `statecode`
--
ALTER TABLE `statecode`
  ADD PRIMARY KEY (`state_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `bank_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer_details`
--
ALTER TABLE `buyer_details`
  MODIFY `buyer_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `data_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gst`
--
ALTER TABLE `gst`
  MODIFY `gst_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `logo_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `other_data`
--
ALTER TABLE `other_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permanent_details`
--
ALTER TABLE `permanent_details`
  MODIFY `company_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sign`
--
ALTER TABLE `sign`
  MODIFY `sign_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statecode`
--
ALTER TABLE `statecode`
  MODIFY `state_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD CONSTRAINT `bank_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `buyer_details`
--
ALTER TABLE `buyer_details`
  ADD CONSTRAINT `buyer_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `buyer_details_ibfk_2` FOREIGN KEY (`code`) REFERENCES `statecode` (`state_id`);

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `gst`
--
ALTER TABLE `gst`
  ADD CONSTRAINT `gst_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `logo`
--
ALTER TABLE `logo`
  ADD CONSTRAINT `logo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `other_data`
--
ALTER TABLE `other_data`
  ADD CONSTRAINT `other_data_ibfk_1` FOREIGN KEY (`data_id`) REFERENCES `data` (`data_id`);

--
-- Constraints for table `permanent_details`
--
ALTER TABLE `permanent_details`
  ADD CONSTRAINT `permanent_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `permanent_details_ibfk_2` FOREIGN KEY (`statecode`) REFERENCES `statecode` (`state_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sign`
--
ALTER TABLE `sign`
  ADD CONSTRAINT `sign_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `statecode`
--
ALTER TABLE `statecode`
  ADD CONSTRAINT `statecode_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
