-- Ce fichier ajoute les bières dans la BDD
-- Nom, degrès, volume, image, prix, ebc_id, brand_id
-- EBC : 1 -> 4, 2 -> 26, 3 -> 39, 4 -> 57
-- Marque : 1 -> Chimay, 2 -> Duvel, 3 -> Kwak, 4 -> Guinness, 5 -> Ch'ti

INSERT INTO beer (`name`, degree, volum, image, price, ebc_id, brand_id) VALUES
('Chimay Bleue', 9, 330, 'img/chimay-chimay-bleue.jpg', 1.79, 3, 1),
('Chimay Blanche', 8, 330, 'img/chimay-chimay-blanche.jpg', 1.65, 1, 1),
('Duvel', 8.5, 330, 'img/duvel-duvel.jpg', 1.99, 1, 2),
('Duvel Triple hop', 9.5, 330, 'img/duvel-duvel-triple-hop.jpg', 1.95, 1, 2),
('Ch''ti Blonde', 6.4, 250, 'img/chti-chti-blonde.jpg', 1.84, 1, 5),
('Ch''ti Ambrée', 5.9, 330, 'img/chti-chti-ambree.jpg', 1.46, 3, 5);
