-- Exemple
-- On insère une catégoryen sql
INSERT INTO category (`name`) VALUES ('Film de gangsters');

-- On insère plusieurs catégories
INSERT INTO category (`name`) VALUES
 ('Action'),
 ('Horreur'),
 ('Science-fiction'),
 ('thriller');

-- Pour récupérer toutes les catégories
SELECT * FROM category;

UPDATE category SET `name` = 'Documentaire' WHERE id = 5;

SELECT * FROM category;

DELETE FROM category WHERE id = 5;

