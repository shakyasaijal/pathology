CREATE TABLE user_token (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    reset_token_hash VARCHAR(255) NOT NULL,
    expire_at DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
