INSERT INTO brewery (name, adress, city, zip, country) VALUES
('Buxton', '1, rue Jean', 'Lille', '59000', 'Belgique'),
('Mikkeller', '2, rue Jean', 'Arras', '62000', 'France'),
('Frontalier', '3, rue Jean', 'Bailleul', '59270', 'Belgique');

-- récupère les brasserie s ainsi que la marque

SELECT * FROM brewery INNER JOIN brewery_made_brand ON brewery.id = brewery_made_brand.brewery_id INNER JOIN brand ON brewery_made_brand.brand_id = brand.id

-- récupère les bieres les marques et les ebc moins de 1.50

SELECT * FROM beer INNER JOIN brand ON beer.brand_id = brand.id
INNER JOIN ebc ON beer.ebc_id = ebc.id 