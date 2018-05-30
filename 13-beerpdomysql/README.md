# Beer PDO SQL

A partir du tableau, on doit reproduire le schéma de la BDD sur WorkBench.

A partir du schéma, on pourra créer la base de données.

Au niveau du PHP, nous aurons besoin de créer plusieurs fichiers :
- config/database.php -> Connexion à la base de données en PDO, sera inclus dans tous les fichiers PHP
- partials/header.php -> Le header du site à inclure dans toutes les pages (Bootstrap)
- partials/footer.php -> Le footer du site à inclure dans toutes les pages
- index.php -> Page d'accueil du site
- beer_list.php -> Lister toutes les bières de la BDD
- beer_single.php -> La page d'une bière seule
