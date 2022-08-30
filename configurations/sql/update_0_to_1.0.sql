USE beer_rating;

CREATE TABLE IF NOT EXISTS version
(
    id INT NOT NULL AUTO_INCREMENT,
    param VARCHAR(100),
    data VARCHAR(100),
    PRIMARY KEY (id)
);

INSERT INTO version (param, data) VALUES
("database", "1.0");

ALTER TABLE advice 
ADD rate_aroma INT NOT NULL,
ADD rate_flavor INT NOT NULL;