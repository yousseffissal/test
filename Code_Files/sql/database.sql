CREATE DATABASE IF NOT EXISTS Registrations;
USE Registrations;

CREATE TABLE IF NOT EXISTS registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    academic_level VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL,
    favorite_hobby VARCHAR(50) NOT NULL,
    message TEXT NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

