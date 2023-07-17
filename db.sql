-- CREATE DATABASE YORDI;
USE YORDI;
DROP TABLE users;

CREATE TABLE users (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    full_name VARCHAR(100),
    date_format VARCHAR(20) NOT NULL
);

INSERT INTO users (username, password, email, full_name, date_format) 
VALUES 
    ('testuser1', 'password1', 'testuser1@example.com', 'Test User 1', 'YYYY-MM-DD'),
    ('testuser2', 'password2', 'testuser2@example.com', 'Test User 2', 'MM/DD/YYYY'),
    ('testuser3', 'password3', 'testuser3@example.com', 'Test User 3', 'DD.MM.YYYY');
