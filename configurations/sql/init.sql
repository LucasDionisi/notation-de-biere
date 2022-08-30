CREATE DATABASE IF NOT EXISTS beer_rating CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE beer_rating;

CREATE TABLE IF NOT EXISTS beer_style
(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS beer
(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100),
    style_id INT,
    information VARCHAR(500),
    alcohol_level FLOAT,
    image_name VARCHAR(100),
    created_by INT DEFAULT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (style_id) REFERENCES beer_style(id),
    FOREIGN KEY (created_by) REFERENCES user(id)
);

CREATE TABLE IF NOT EXISTS user
(
    id INT NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(100),
    email VARCHAR(100),
    avatar_id INT NOT NULL DEFAULT 1,
    level INT NOT NULL DEFAULT 1,
    validation_token VARCHAR(100),
    is_validated BOOLEAN DEFAULT false,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (avatar_id) REFERENCES avatar(id)
);

CREATE TABLE IF NOT EXISTS user_credential
(
    user_id INT NOT NULL,
    password VARCHAR(100) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE IF NOT EXISTS advice
(
    id INT NOT NULL AUTO_INCREMENT,
    beer_id INT NOT NULL,
    user_id INT NOT NULL,
    rate INT NOT NULL,
    rate_aroma INT NOT NULL,
    rate_flavor INT NOT NULL,
    title VARCHAR(100),
    comment VARCHAR(750),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (beer_id) REFERENCES beer(id),
    FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE IF NOT EXISTS configuration
(
    id INT NOT NULL AUTO_INCREMENT,
    param VARCHAR(100),
    data VARCHAR(100),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS avatar
(
    id INT NOT NULL AUTO_INCREMENT,
    file_name VARCHAR(100),
    level INT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS version
(
    id INT NOT NULL AUTO_INCREMENT,
    param VARCHAR(100),
    data VARCHAR(100)
    PRIMARY KEY (id)
);