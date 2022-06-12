USE beer_rating;

INSERT INTO beer_style (name) VALUES 
('Style 1'),
('Style 2'),
('Style 3');

INSERT INTO beer (name, style_id, information, alcohol_level, image_name) VALUES
("Fada", 2, "C'est la bière du sud minot.", 4.2, "fada.png"),
("Fada2", 3, "Hé ouai", 5.2, "fada.png"),
("Fada3", 2, "EKRZAJKELAZJLKEJLKEAJEZALKJELKZAJELKZAJE ezkljz alkeazkle azlkje klazjelkaz", 3.2, "fada.png"),
("Fada4", 1, "C'est la bière du sud minot.", 4, "fada.png");

INSERT INTO user (pseudo, email) VALUES 
("Lucas", "lucas.dionisi@gmail.com");

INSERT INTO user_credential (user_id, password) VALUES
(1, "TcdICGbyTMoKg");

INSERT INTO advice (beer_id, user_id, rate, title, comment) VALUES
(1, 1, 1, "Mon titre 1", "C'est de la merde."),
(1, 1, 4, "Mon titre 2", "🍺🍺🍺🍺🍺"),
(1, 1, 3, "Mon titre 3", "PEDKLSQJLKDSQJ DLKSJDSQ LKDJQS LKDSQJ LQSKDJDQSLKDJ LKQSJDLQSKJ DSQLKJDQS LKDSQ JLDKQSJ DSQLKJD QSLKQSDJ LKDQS JSQDKLD JQSLK"),
(1, 1, 5, "Mon titre 4", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."),
(1, 1, 4, "Mon titre 5", "ok je mets un 4."),
(1, 1, 3, "Mon titre 6", "ezajlkezaj lkej klej eklj eklzajeklzaj elkzajelkaz."),
(1, 1, 2, "Mon titre 7", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");

INSERT INTO configuration (param, data) VALUES
("salt", "Tc2w5t6!A=Vm");