CREATE DATABASE sessions_exercise;
USE sessions_exercise;

CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       username VARCHAR(255) UNIQUE NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       first_name VARCHAR(255) NULL,
                       last_name VARCHAR(255) NULL,
                       born_on DATE NULL
);