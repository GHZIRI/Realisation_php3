DROP DATABASE IF EXISTS blog_db;
CREATE DATABASE blog_db;
USE blog_db;



CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
);
INSERT INTO articles (title, content) VALUES 
('My First Blog Post', 'This is the content of my very first article. Welcome to my back-office!'),
('Learning PHP OOP', 'Object-Oriented Programming is powerful because it makes the code reusable.'),
('Why use PDO?', 'PDO is great because it helps prevent SQL injection and works with many databases.');