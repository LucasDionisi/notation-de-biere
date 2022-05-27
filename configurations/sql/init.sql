CREATE DATABASE IF NOT EXISTS notation_de_biere;

USE notation_de_biere;

CREATE TABLE IF NOT EXISTS biere_style
(
    id INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS biere
(
    id INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100),
    styleID INT,
    information VARCHAR(500),
    degre_alcool FLOAT,
    PRIMARY KEY (id),
    FOREIGN KEY (styleID) REFERENCES biere_style(id)
);