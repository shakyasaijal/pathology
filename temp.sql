-- CREATE TABLE user_token (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     user_id INT,
--     reset_token_hash VARCHAR(255) NOT NULL,
--     expire_at DATETIME NOT NULL,
--     FOREIGN KEY (user_id) REFERENCES users(user_id)
-- );

-- CREATE TABLE doctors (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     full_name VARCHAR(255) NOT NULL,
--     speciality VARCHAR(255) NOT NULL,
--     is_available TINYINT DEFAULT 1,
--     email VARCHAR(255) NOT NULL,
--     phone BIGINT,
--     photo TEXT NOT NULL,
--     `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
--     `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
-- );

INSERT INTO doctors (full_name, speciality, is_available, email, phone, photo)
VALUES 
('Aayush Yagol', 'Gastrologist', 1, '986031@win.edu.au', 000000, '/pathology/img/ayush.png'),
('Roisha Shrestha', 'Neurologist', 1, '986076@win.edu.au', 000000, '/pathology/img/roisha.png'),
('Ruby Chakatu', 'Pharmacist', 0, '985164@win.edu.au', 000000, '/pathology/img/ruby.png');