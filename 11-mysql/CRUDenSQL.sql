-- CECI N'EST QU'UN SUPPORT POUR LE COURS
-- Commentaire en SQL
-- On insère une catégorie
-- On peut mettre les colonnes entre ``
-- et les valeurs entre ''
INSERT INTO category (`name`) VALUES ('Film de gangsters');

-- On insère plusieurs catégories
INSERT INTO category (`name`) VALUES
('Action'),
('Horreur'),
('Science-fiction'),
('Thriller');

-- Pour récupérer toutes les catégories
SELECT * FROM category;

-- On change le nom de la catégorie qui a l'id 5
UPDATE category SET `name` = 'Documentaire' WHERE id = 5;

-- Supprimer la catégorie qui a l'id 5
DELETE FROM category WHERE id = 5;
