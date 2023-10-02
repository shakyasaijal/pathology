-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 02, 2023 at 08:06 PM
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

DROP TABLE IF EXISTS `about`;
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
-- Truncate table before insert `about`
--

TRUNCATE TABLE `about`;
--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `info`, `full_address`, `phone`, `email`, `facebook_link`, `linkedin_link`, `created_at`) VALUES
(1, 'Breast cancer pathology involves the analysis of breast tissue samples to diagnose and characterize the disease. Artificial intelligence (AI) models have emerged as valuable tools in this field, assisting pathologists by analyzing tissue images using machine learning algorithms. AI can identify subtle patterns and potential cancerous regions, enhancing diagnostic accuracy and efficiency. While AI aids in early breast cancer detection, it should complement rather than replace human expertise, as pathologists remain vital for interpreting complex clinical data and making treatment decisions. The integration of AI in breast cancer pathology shows promise in improving patient outcomes through faster and more precise diagnoses.', '5/7 Charles St, Queanbeyan NSW, 2620', '0405 496 157', 'info@bcpathology.com.au', 'facebook.com', 'linkedin.com', '2023-09-19 01:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

DROP TABLE IF EXISTS `auth_tokens`;
CREATE TABLE `auth_tokens` (
  `id` int NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `auth_type` varchar(255) NOT NULL,
  `selector` text NOT NULL,
  `token` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Truncate table before insert `auth_tokens`
--

TRUNCATE TABLE `auth_tokens`;
-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE `doctors` (
  `id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `is_available` tinyint DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `phone` bigint DEFAULT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Truncate table before insert `doctors`
--

TRUNCATE TABLE `doctors`;
--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `full_name`, `speciality`, `is_available`, `email`, `phone`, `photo`, `created_at`) VALUES
(1, 'Aayush Yagol', 'Gastrologist', 1, '986031@win.edu.au', 405656565, '/pathology/img/ayush.png', '2023-09-27 01:17:08'),
(2, 'Roisha Shrestha', 'Neurologist', 1, '986076@win.edu.au', 405326323, '/pathology/img/roisha.png', '2023-09-27 01:17:08'),
(3, 'Ruby Chakatu', 'Cardiologist', 0, '985164@win.edu.au', 405232252, '/pathology/img/ruby.png', '2023-09-27 01:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `id` int NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Truncate table before insert `faq`
--

TRUNCATE TABLE `faq`;
--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `created_at`) VALUES
(1, 'What is the accuracy rate of our AI?', 'An AI prediction accuracy rate of 91% indicates that the AI system correctly predicts outcomes or classifications in 91% of cases, showcasing its effectiveness in various applications like medical diagnoses, image recognition, and more. This high level of accuracy reflects the AI&#39;s ability to make reliable and valuable predictions.', '2023-09-19 01:17:27'),
(3, 'How our AI works on predicting breast cancer?', 'AI for breast cancer prediction uses machine learning algorithms to analyze medical data like mammograms. It identifies patterns, anomalies, and risk factors to assist radiologists and doctors in early detection and diagnosis, potentially improving patient outcomes through earlier intervention and treatment.', '2023-09-27 00:41:38'),
(4, 'How our online consultation works?', 'Our platform facilitates seamless communication between doctors and patients by creating an email thread during consultations. This thread serves as a secure and convenient channel for ongoing dialogue, enabling patients to freely discuss their healthcare concerns with their healthcare providers. It ensures privacy and continuity of care, allowing doctors to offer guidance, answer queries, and provide support remotely. This feature enhances the patient experience and promotes effective healthcare management, fostering a stronger doctor-patient relationship. It also offers the flexibility for patients to seek medical advice and updates at their convenience, fostering convenience and accessibility in healthcare interactions.', '2023-10-02 08:41:53'),
(5, 'What is our future roadmap in AI?', 'Our future roadmap centers on further advancements in AI-driven tools dedicated to streamlining the identification of cancer. We aim to harness the power of cutting-edge technology to enhance early detection, diagnosis, and treatment of cancerous conditions. By leveraging AI, we aspire to create innovative solutions that empower healthcare professionals with more accurate and efficient diagnostic capabilities. These tools will not only revolutionize cancer detection but also contribute to improved patient outcomes and reduced healthcare burdens. Our commitment is to drive the development of AI-driven healthcare technologies that lead to more accessible, precise, and effective cancer management solutions for the benefit of patients and healthcare providers alike.', '2023-10-02 08:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
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
-- Truncate table before insert `messages`
--

TRUNCATE TABLE `messages`;
--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `full_name`, `email`, `phone`, `subject`, `message`, `created_at`) VALUES
(1, 'Saijal Shakya', 'saijal@gmail.com', '0405 000 000', 'About AI', 'Can you provide me the code for AI model?', '2023-09-19 01:15:10'),
(2, 'John Doe', 'john@gmail.com', '0505 055 050', 'Appreciated', 'Thank you guys.\r\nThank you guys.\r\nThank you guys.\r\nThank you guys.\r\nThank you guys.\r\nThank you guys.\r\nThank you guys.\r\nThank you guys.\r\nThank you guys.\r\nThank you guys.\r\nThank you guys.', '2023-09-19 01:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
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
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `is_verified`, `is_admin`, `created_at`) VALUES
(1, 'John', 'Doe', 'user@gmail.com', '$2y$10$zAOKmKAl72QGAkpROmOlv.PBqat.cSgIu7GA3xXI9yFYik0RRj4G.', 0, 0, '2023-09-19 01:08:04'),
(2, 'Admin', 'User', 'admin@admin.com', '$2y$10$0wvgo9Pvc2pRghb7L9uXUebo7./bKNuiJm3gXj2IIHgiicE9JU6EK', 0, 1, '2023-09-19 01:08:53'),
(3, 'Saijal', 'Shakya', 'saijalshakya@gmail.com', '$2y$10$rzuchKE2uP9LdGzyRVGorOXuBg17Dh673Ya7fsa/H.n3jBLr97xv6', 0, 0, '2023-09-26 10:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE `user_token` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `reset_token_hash` varchar(255) NOT NULL,
  `expire_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Truncate table before insert `user_token`
--

TRUNCATE TABLE `user_token`;
--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `user_id`, `reset_token_hash`, `expire_at`) VALUES
(1, 3, '1bba325d62bd9c621e2d6a29acb3bef0992fa49f20a05aa3535f963cafe89f82', '2023-09-26 21:49:19'),
(2, 3, 'f73278213427ecd304f2a9372af2d50193899359f6ef0ad6764d4d7c51ea1956', '2023-09-26 21:50:59'),
(3, 3, '0a9968a8222def9081878b34901bf2d7cb690a05d49df7867820539ac7a1722e', '2023-09-26 21:54:53'),
(4, 3, '15737370361803975de04a7008ba6991cf1981e795c48c106d5ee5e9c2c4a702', '2023-09-26 21:59:02'),
(5, 3, 'fc3c4096840751e8259017de1dc60dcf6d16266f64c31fc11afcfe96120fdd05', '2023-09-26 21:59:51'),
(6, 3, 'afc1bc7e7860ef57fffb9ddfc3a91c672987e1b693d9e012dd82133e5de21ffd', '2023-09-26 22:03:26'),
(7, 3, '284bce1a052859c9b1eac96e941d3e19250fa980efa2bfdb5518b9c3c9a304c3', '2023-09-26 22:04:13'),
(8, 3, 'b3b63930e70be66260e3b912f5f607a4557f91cc3a3417bbf67a61957c7bd5d2', '2023-09-26 22:05:10'),
(9, 3, 'cfbe848dbeebe1d84a59b41f4095eca52b1041f358c112361f8b955dbb7d858c', '2023-09-26 22:10:58'),
(10, 3, '097c7a5b83710501f0e6eb32e701b7660395dfc9a15c549be479211470a3fb18', '2023-09-26 22:22:44'),
(11, 3, '77ef30b8568d40d6d0190a96a81004f3fee8a37a460101ad524047b14623e866', '2023-09-26 22:23:45'),
(12, 3, 'cd4d4fd3e43bcb79a938391d34cfc0208c6faed249a7e11f30c8ebd48f502c43', '2023-09-26 22:24:30'),
(13, 3, '8d12382c96fbd73603e9287fd4c293eee3bfcb93d70ba48bd616abf7a76931c8', '2023-09-26 22:35:23'),
(14, 3, '97753f7f8eef6edcf2ba203383134313efb3bce797d3eed58589b7b52d56b12b', '2023-09-26 22:57:08'),
(15, 3, '48dd56468541131de8316e2a527c216ffbb213e42a94f39aed984dbd3f6e48c7', '2023-09-26 23:25:22'),
(16, 3, '6775542a184ed82bf3b98acb699050a9785c0502bbedc554672d93d4ff32bcc5', '2023-09-26 23:36:06'),
(17, 3, '61f115debcc3b17a1d59312af4c64d97cb1d9c8a881d19b896738f16ad09ab03', '2023-09-26 23:39:39'),
(18, 3, 'cfeca1a9cadb5ab13aa6a932fb345c5025e9b18af4bf0e9628798565c78818c0', '2023-09-27 11:24:58');

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
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
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
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_token`
--
ALTER TABLE `user_token`
  ADD CONSTRAINT `user_token_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
