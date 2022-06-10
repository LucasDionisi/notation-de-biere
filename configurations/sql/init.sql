CREATE DATABASE IF NOT EXISTS beer_rating;

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
    PRIMARY KEY (id),
    FOREIGN KEY (style_id) REFERENCES beer_style(id)
);

CREATE TABLE IF NOT EXISTS user
(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS advice
(
    id INT NOT NULL AUTO_INCREMENT,
    beer_id INT NOT NULL,
    user_id INT NOT NULL,
    rate INT NOT NULL,
    title VARCHAR(100),
    comment VARCHAR(500),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (beer_id) REFERENCES beer(id),
    FOREIGN KEY (user_id) REFERENCES user(id)
);