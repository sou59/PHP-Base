# PHP

Pour travailler, vous avez besoin de forker ce dépôt.
Ensuite, clonez votre dépôt sur votre machine.
Vous pouvez ajouter un remote upstream (en plus de votre origin) vers ce dépôt (WebforceLille9) avec :

```
git remote add upstream https://github.com/WebforceLille9/PHP.git
```

Vous avez maintenant 2 branches master, celle de ce dépôt (du formateur) et de votre dépôt.
Parfois, vous voudrez récupérer une mise à jour du dépôt sans toucher à votre branche pour garder votre propre code, pour se faire :

```
# Mets à jour le dépôt upstream
git fetch upstream
# Se déplacer sur la branche du formateur
git checkout upstream/master
# Revenir sur votre branche
git checkout master
```
