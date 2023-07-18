-- CREATE DATABASE YORDI;
USE YORDI;
DROP TABLE users;
DROP TABLE notes;

CREATE TABLE users (
  username VARCHAR(50) PRIMARY KEY,
  password VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  full_name VARCHAR(100),
  date_format VARCHAR(20) NOT NULL 
);

INSERT INTO users (username, password, email, full_name, date_format) 
VALUES 
    ('Test_1', '$2y$10$ndjDEs/0p1VVzS1bR./vDOOgj.s6xoWAEpTeDhl3fhek9FXaDQ3f2', 'test_1@test.com', 'Test_1', 'd.m.Y'),
    ('Test_2', '$2y$10$ndjDEs/0p1VVzS1bR./vDOOgj.s6xoWAEpTeDhl3fhek9FXaDQ3f2', 'test_2@test.com', 'Test_2', 'F d'),
    ('Test_3', '$2y$10$ndjDEs/0p1VVzS1bR./vDOOgj.s6xoWAEpTeDhl3fhek9FXaDQ3f2', 'test_2@test.com', 'Test_3', 'm-d-Y'),
    ('Norbert', '$2y$10$ndjDEs/0p1VVzS1bR./vDOOgj.s6xoWAEpTeDhl3fhek9FXaDQ3f2', 'Norbert@norbert.com', 'Norbertos', 'd.m.Y');

CREATE TABLE notes (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO notes (username, title, content, date_created)
VALUES
    ('Norbert', 'Note 1', 'This is the content of Note 1.', '2023-07-01 12:34:56'),
    ('Norbert', 'Note 2', 'This is the content of Note 2.', '2023-07-05 08:15:00'),
    ('Norbert', 'Note 3', 'This is the content of Note 3.', '2023-07-10 18:45:22'),
    ('Norbert', 'Note 4', 'This is the content of Note 4.', '2023-07-15 09:30:10'),
    ('Norbert', 'Note 5', 'This is the content of Note 5.', '2023-07-20 14:20:35');




INSERT INTO notes (username, title, content, date_created)
VALUES
    ('Test_3', 'Note 1', 'This is the content of Note 1.', '2023-07-01 12:34:56'),
    ('Test_3', 'Note 2', 'This is the content of Note 2.', '2023-07-05 08:15:00'),
    ('Test_3', 'Note 3', 'This is the content of Note 3.', '2023-07-10 18:45:22'),
    ('Test_3', 'Note 4', 'This is the content of Note 4.', '2023-07-15 09:30:10'),
    ('Test_3', 'Note 5', 'This is the content of Note 5.', '2023-07-20 14:20:35');