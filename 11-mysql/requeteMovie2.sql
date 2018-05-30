-- FILTRE
-- récupère tous les films
SELECT * FROM movie;

-- select tous les films gangster : 
SELECT * FROM movie WHERE category_id = 1;

-- récuperer film cat gangster sortie vant 1992, attention date entière
SELECT * FROM movie WHERE category_id = 1 AND `date` < '1992-01-01';