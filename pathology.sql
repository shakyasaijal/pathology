-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2023 at 09:20 PM
-- Server version: 8.0.34-0ubuntu0.20.04.1
-- PHP Version: 8.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pathology`
--
CREATE DATABASE IF NOT EXISTS `pathology` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `pathology`;

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `info` text NOT NULL,
  `full_address` varchar(250) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` VALUES
(1, 'Breast cancer pathology involves the analysis of breast tissue samples to diagnose and characterize the disease. Artificial intelligence (AI) models have emerged as valuable tools in this field, assisting pathologists by analyzing tissue images using machine learning algorithms. AI can identify subtle patterns and potential cancerous regions, enhancing diagnostic accuracy and efficiency. While AI aids in early breast cancer detection, it should complement rather than replace human expertise, as pathologists remain vital for interpreting complex clinical data and making treatment decisions. The integration of AI in breast cancer pathology shows promise in improving patient outcomes through faster and more precise diagnoses.', '8/8 Charles St, Queanbeyan, NSW, 2620', '+61 423 456 789', 'info@bcpathology.com', 'facebook.com', 'linkedin.com', '2023-09-19 11:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `auth_type` varchar(255) NOT NULL,
  `selector` text NOT NULL,
  `token` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` VALUES
(1, 'What is the accuracy of our AI Model?', 'Based on all the data we got, our AI model has 91% of accuracy. There is only 9% chances of false positive, but consulting with doctors should be your first priority.', '2023-09-19 11:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` VALUES
(1, 'Saijal Shakya', 'saijal@gmail.com', '0405 000 000', 'About AI', 'Can you provide me the code for AI model?', '2023-09-19 11:15:10'),
(2, 'John Doe', 'john@gmail.com', '0505 055 050', 'Appreciated', 'Thank you guys.', '2023-09-19 11:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` tinyint NOT NULL DEFAULT '0',
  `is_admin` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES
(1, 'John', 'Doe', 'user@gmail.com', '$2y$10$zAOKmKAl72QGAkpROmOlv.PBqat.cSgIu7GA3xXI9yFYik0RRj4G.', 0, 0, '2023-09-19 11:08:04'),
(2, 'Admin', 'User', 'admin@admin.com', '$2y$10$0wvgo9Pvc2pRghb7L9uXUebo7./bKNuiJm3gXj2IIHgiicE9JU6EK', 0, 1, '2023-09-19 11:08:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
