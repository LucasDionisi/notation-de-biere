USE beer_rating;

INSERT INTO beer_style (name) VALUES
('Autre'),
('Blonde'),
('Blanche'),
('IPA');

INSERT INTO beer (name, style_id, information, alcohol_level, image_name) VALUES
("Fada", 1, "Brassée avec un mélange d'épeautre provençal et de malt d'orge, la FADA blonde est une belle lager où s'exprime pleinement le cœur aromatique frais et floral du houblon Mistral. Les notes maltées s'équilibrent autour d'une amertume fine et légère.", 5.5, "fada.png"),
("Chouffe", 1, "La Chouffe présente une robe doré et légèrement trouble, avec un riche col de mousse blanc et de légères bulles. Cette bière de spécialité blonde — la première brassée à Achouffe il y a 40 ans — révèle en bouche un caractère agréablement fruité, épicé à la coriandre avec une légère saveur houblonnée.", 8, "chouffe.jpg"),
("Leffe", 1, "Leffe Blonde est une authentique bière blonde d'abbaye avec une légère pointe d'amertume. Leffe Blonde est la bière de dégustation par excellence: elle accompagnera avec légèreté vos repas et leur donnera une touche de saveur supplémentaire.", 6.6, "leffe.jpg"),
("Mont blanc", 2, "C’est en 1821 qu’on trouve trace d’une première brasserie à Sallanches. L'expansion continue jusqu'en 1911 où l'appellation Bière du Mont-Blanc fait son apparition. La Brasserie stoppa toute activité en 1966. Relancé en 1999 par Sylvain Chiron, la Brasserie du Mont-Blanc s’installe à la Motte-Servolex au coeur de la Savoie et produit les «bières du Mont-Blanc», bières authentiques, de caractères, de qualité et de dégustation brassées à l’eau des glaciers du Mont-Blanc.", 5.8, "Blanche_mont_blanc.jpg");

INSERT INTO user (pseudo, email) VALUES 
("Lucas", "lucas.dionisi@gmail.com"),
("Manisi", "manisi@gmail.com");

INSERT INTO user_credential (user_id, password) VALUES
(1, "TcdICGbyTMoKg"),
(2, "TcdICGbyTMoKg");

INSERT INTO advice (beer_id, user_id, rate, title, comment) VALUES
(1, 1, 5, "Excellente bière 🍺 !", "J'ai pu avoir l'occasion de la gouter sur place, elle est très bonne et très fraiche. Gros point fort sur le brasseur qui est accueillant et passionnant"),
(1, 2, 4, "C'est pas mal du tout", "La bière n'est pas donnée mais vraiment bonne."),
(1, 1, 5, "titre", "Elle est vraiment bonne et je vais vous raconter 3 fois son histoire : Brassée avec un mélange d'épeautre provençal et de malt d'orge, la FADA blonde est une belle lager où s'exprime pleinement le cœur aromatique frais et floral du houblon Mistral. Les notes maltées s'équilibrent autour d'une amertume fine et légère."),
(2, 1, 2, "C'est trop fort !!!", "C'est du whiskey ou quoi ? 😫"),
(4, 2, 1, "Que du marketing 👎.", "Vraiment nulle, prendre l'eau de la montagne n'a aucun intérêt à part trouver de nouveaux clients. Une bière pour les touristes !"),
(4, 1, 4, "Vraiment bonne 😍 !!", "Elle est très bonne, cependant un peu forte. Je recommande quand même.")
;

INSERT INTO configuration (param, data) VALUES
("salt", "Tc2w5t6!A=Vm");

INSERT INTO avatar (file_name, level) VALUES
("default.png", 1), 
("1.png", 1),  ("2.png", 1),  ("3.png", 1),  ("4.png", 1),  ("5.png", 1),  ("6.png", 2),  ("7.png", 2),  ("8.png", 2),  ("9.png", 2),  ("10.png", 2),
("11.png", 2), ("12.png", 3), ("13.png", 3), ("14.png", 3), ("15.png", 3), ("16.png", 3), ("17.png", 3), ("18.png", 4), ("19.png", 4), ("20.png", 4),
("21.png", 4), ("22.png", 4), ("23.png", 4), ("24.png", 5), ("25.png", 5), ("26.png", 5), ("27.png", 5), ("28.png", 5), ("29.png", 5), ("30.png", 6),
("31.png", 6), ("32.png", 6), ("33.png", 6), ("34.png", 6), ("35.png", 7), ("36.png", 7), ("37.png", 7), ("38.png", 7), ("39.png", 7), ("40.png", 8),
("41.png", 8), ("42.png", 8), ("43.png", 8), ("44.png", 9), ("45.png", 9), ("46.png", 9), ("47.png", 9), ("48.png", 9), ("49.png", 10), ("50.png", 10),
("51.png", 10), ("52.png", 11), ("53.png", 11), ("54.png", 11), ("55.png", 12), ("56.png", 12);