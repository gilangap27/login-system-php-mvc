

CREATE DATABASE login;

USE login;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(30),
    password VARCHAR(255)
);