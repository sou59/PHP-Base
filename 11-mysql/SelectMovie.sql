-- Récupère tous les films
SELECT * FROM movie;

-- Récupère tous les films dans la catégorie "Films de gangster"
SELECT * FROM movie WHERE category_id = 1;

-- Récupère tous les films dans la catégorie "Films de gangster" qui sont sortis avant 1990
SELECT * FROM movie WHERE category_id = 1 AND `date` < '1990-01-01';

-- Récupère tous les films du plus récent au plus vieux
SELECT * FROM movie ORDER BY `date` DESC, `name` ASC;

-- Récupère les films dans l'ordre aléatoire
SELECT * FROM movie ORDER BY RAND();

-- Récupère les 10 premiers films à partir du 4ème
SELECT * FROM movie LIMIT 3, 10;

-- Récupère le film le plus récent
SELECT `name`, `date` FROM movie ORDER BY `date` DESC LIMIT 1;
-- Récupère le film le plus ancien
SELECT `name`, `date` FROM movie ORDER BY `date` ASC LIMIT 1;

-- Récupère le film le plus récent et le plus ancien
SELECT * FROM movie
WHERE `date` = (SELECT MAX(`date`) as `date` FROM movie)
OR `date` = (SELECT MIN(`date`) as `date` FROM movie);

-- Compte le nombre de films
SELECT COUNT(id) FROM movie;

-- Avoir la moyenne des années de sortie des films
SELECT ROUND(AVG(YEAR(`date`))) as average FROM movie;
