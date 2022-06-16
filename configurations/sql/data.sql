USE beer_rating;

INSERT INTO beer_style (name) VALUES 
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
(1, 1, 5, "Elle est vraiment bonne et je vais vous raconter 3 fois son histoire : Brassée avec un mélange d'épeautre provençal et de malt d'orge, la FADA blonde est une belle lager où s'exprime pleinement le cœur aromatique frais et floral du houblon Mistral. Les notes maltées s'équilibrent autour d'une amertume fine et légère."),
(2, 1, 2, "C'est trop fort !!!", "C'est du whiskey ou quoi ? 😫"),
(4, 2, 1, "Que du marketing 👎.", "Vraiment nulle, prendre l'eau de la montagne n'a aucun intérêt à part trouver de nouveaux clients. Une bière pour les touristes !"),
(4, 1, 4, "Vraiment bonne 😍 !!", "Elle est très bonne, cependant un peu forte. Je recommande quand même.")
;

INSERT INTO configuration (param, data) VALUES
("salt", "Tc2w5t6!A=Vm");