-- Insèrer quelques films dans la bdd
-- 1 Film de gangster : Le Parrain 1972, Scarface 1983, Les Affranchis 1990, Heat 1995
-- 2 Action : Die Hard 1988, Demolition Man 1993, Taken 2008, Deadpool 2016, Expandable 2010
-- 3 Horreur : Scream 1996, Vendredi 13 1980, Saw 2005, Scary Movie 2000
-- 4 Science Fiction : Star Wars IV Un nouvel espoir 1977, Alien 1979, ET 1982, Robocop 1987
-- 5 Thriller : The Game 1997, Sixième Sens 1999, Usual Suspects 1995, Fight Club 1999,
-- Inception 2010

INSERT INTO movie (`name`, `date`, description, category_id) VALUES
('Le Parrain', '1972-01-01', 'Lorem ipsum', 1),
('Scarface', '1983-01-01', 'Lorem ipsum', 1),
('Les Affranchis', '1990-01-01', 'Lorem ipsum', 1),
('Heat', '1995-01-01', 'Lorem ipsum', 1),
('Die Hard', '1988-01-01', 'Lorem ipsum', 2),
('Demolition Man', '1993-01-01', 'Lorem ipsum', 2),
('Taken', '2008-01-01', 'Lorem ipsum', 2),
('Deadpool', '2016-01-01', 'Lorem ipsum', 2),
('Expandable', '2010-01-01', 'Lorem ipsum', 2),
('Scream', '1996-01-01', 'Lorem ipsum', 3),
('Vendredi 13', '1980-01-01', 'Lorem ipsum', 3),
('Saw', '2005-01-01', 'Lorem ipsum', 3),
('Scary Movie', '2000-01-01', 'Lorem ipsum', 3),
('Star Wars IV Un nouvel espoir', '1977-01-01', 'Lorem ipsum', 4),
('Alien', '1979-01-01', 'Lorem ipsum', 4),
('ET', '1982-01-01', 'Lorem ipsum', 4),
('Robocop', '1987-01-01', 'Lorem ipsum', 4),
('The Game', '1997-01-01', 'Lorem ipsum', 5),
('Sixième Sens', '1999-01-01', 'Lorem ipsum', 5),
('Usual Suspects', '1995-01-01', 'Lorem ipsum', 5),
('Fight Club', '1999-01-01', 'Lorem ipsum', 5),
('Inception', '2010-01-01', 'Lorem ipsum', 5);
