# PHP Base

Pour travailler, vous avez besoin de forker ce dépôt.
Ensuite, clonez votre dépôt sur votre machine.
Créez une branche avec votre prénom.

```
git branch prenom
```

Vous pouvez ajouter un remote upstream (en plus de votre origin) vers ce dépôt (WebforceLille9) avec :

```
git remote add upstream https://github.com/WebforceLille9/PHP.git
```

Vous avez maintenant 2 branches master, celle de ce dépôt (du formateur) et de votre dépôt.
Parfois, vous voudrez récupérer une mise à jour du dépôt :

```
# Mets à jour la branche master
git checkout master
git fetch upstream
git merge upstream/master
# Revenir sur votre branche
git checkout prenom
```

N'oubliez pas de toujours revenir sur votre branche lorsque vous travaillez sur votre propre code. Votre branche master ne doit servir que pour stocker les cours et le code du formateur.
