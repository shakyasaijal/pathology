-- CREATE TABLE `users` (
--   `user_id` int AUTO_INCREMENT PRIMARY KEY,
--   `first_name` varchar(50) NOT NULL,
--   `last_name` varchar(50) NOT NULL,
--   `email` varchar(100) NOT NULL,
--   `password` varchar(255) NOT NULL,
--   `is_verified` TINYINT DEFAULT 0 NOT NULL,
--   `is_admin` TINYINT DEFAULT 0 NOT NULL,
--   `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
-- )

-- CREATE TABLE `auth_tokens` (
--   `id` int AUTO_INCREMENT PRIMARY KEY,
--   `user_email` varchar(255) NOT NULL,
--   `auth_type` varchar(255) NOT NULL,
--   `selector` text NOT NULL,
--   `token` longtext NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
--   `expires_at` timestamp NULL DEFAULT NULL
-- )

CREATE TABLE `about`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `info` TEXT NULL,
    `house_no` 
)