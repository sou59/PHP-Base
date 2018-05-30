-- Insérer quelques films dans la bdd

-- film de gangster : La Parrain 1992, Scarface 1983, Les Affranchis 1990, Heat 1995

-- film action : Die Hard 1988, Demolition man 1993, Taken 2008, Deadpool 2016, expandable 2010
-- Horreur : Scream 1996, Vendredi 13 1980, Saw, Scary Movie
-- Science Fiction : Star Wars IV un nouvel espoir 1977, Alien 1979, ET, Robocop
-- Thriller : 

INSERT INTO movie (`name`, `date`, description, category_id) VALUES
('Le parrain', '1992-01-01', 'Lorem lorem lorem', 1), 
('Scarface', '1992-01-01', 'Lorem lorem lorem', 1),
('Les Affranchis', '1990-01-01', 'Lorem lorem lorem', 1),
('Heat', '1995-01-01', 'Lorem lorem lorem', 1),
('Die Hard', '1988-01-01', 'Lorem lorem lorem', 2), 
('Scarface', '1993-01-01', 'Lorem lorem lorem', 2),
('Taken', '2008-01-01', 'Lorem lorem lorem', 2),
('Deadpool', '2016-01-01', 'Lorem lorem lorem', 2),
('Scream', '1996-01-01', 'Lorem lorem lorem', 3), 
('Vendredi 13', '1980-01-01', 'Lorem lorem lorem', 3),
('Saw', '1990-01-01', 'Lorem lorem lorem', 3),
('Scary Movie', '1995-01-01', 'Lorem lorem lorem', 1),
('Star Wars IV un nouvel espoir', '1988-01-01', 'Lorem lorem lorem', 4), 
('Alien', '1993-01-01', 'Lorem lorem lorem', 4),
('ET', '2008-01-01', 'Lorem lorem lorem', 4);