-- Remonte tous les films triés par date de sortie décroissante
SELECT * FROM movie ORDER BY `date` DESC;

-- Remonte tous les films triés par date de sortie décroissante
SELECT * FROM movie ORDER BY `date` ASC;

-- par date et par ordre alpha
SELECT * FROM movie ORDER BY `date` DESC, `name` ASC;

-- film aleatoire
SELECT * FROM movie ORDER BY RAND();

-- recupère les 10 premiers titres
-- index du premier film de l'index 4 = 3, et limite à 10 film au total
SELECT * FROM movie LIMIT 3, 10;

-- Renvoie l'année du film le plus ancien et l'année du film le plus récent
SELECT MIN(date) as min_date, MAX(date) as max_date FROM movie;

-- Récupère le fimlm le plus récent
SELECT `name`, `date` FROM movie ORDER BY `date` DESC LIMIT 1;

-- récuperer données de Matthieu


-- calcul nombre de film
SELECT COUNT (*) FROM movie;
SELECT COUNT (id) FROM movie;


SELECT ROUND(AVG(YEAR(`date`))) as average FROM movie;
