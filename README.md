# MovieBase
Ce projet de site web à été développé dans le cadre d'un cours de développement PHP/SQL à la HEIG-VD. Le but de ce site est de permettre à des utilisateurs d'insérer des films, de les ajouter à leur liste et d'indiquer si ils ont été visionné. Il possède aussi une gestion de comptes administrateur.

# How to
Attention, cette application nécessite l'installation de Smarty sur le serveur. Si celui-ci n'est pas présent toutes les informations sont accessible ici: https://www.smarty.net/

1. Télécharger la totalité du projet

2. Décompresser l'archive

3. Placer le contenu du dossier à l'endroit voulut sur le serveur (racine ou pas)

4. Importez le fichier `dump.sql` dans votre base de données (celui contient la structure de la base de données ainsi que quelques films, un administrateur et un simple utilisateur)

5. Ouvrir le fichier `config.php` et le modifier en fonction de votre configuration

6. Enjoy! Le site est fonctionnel!

## Fichier config

  * DB_USER = Utilisateur de la BDD
  * DB_PASS = Mot de passe de la BDD
  * DB_NAME = Nom de la BDD
  * DB_HOST = Adresse de la BDD (probablement localhost)
  * SITE_ROOT = Chemin du site dans le cas ou il n'est pas à la racine du serveur
  * SMARTY = le chemin menant à l'installation de Smarty

# Films
Les films possèdent un titre, une image et une description (synopsis). Il est possible d'ajouter des films et, si l'utilisateur est un administrateur, les modifier et les supprimer.

# Comptes
Les comptes utilisateurs peuvent être créé depuis le site. L'administrateur du site peut attribuer des droits administrateur à d'autres utilisateur de le site. Pour l'heure seul l'administrateur peut changer les différentes infos des utilisateurs mais bientôt l'utilisateur pourra aussi le faire lui même.

# Droits
* Un utilisateur non loggé ne peut que voir la liste des films.
* Un utilisateur peut ajouter des films à sa liste et les marquer comme vu.
* Un administrateur peut modifier et supprimer les films. Il peut aussi gérer les utilisateurs.

# Accès
La base de données contient déjà 2 utilisateurs de base dont voici les accès

Administrateur:
> Login->admin

> password->admin

Utilisateur test:
> Login->test

> password->1234

# Future change
Le site à été migré pour utiliser le système de templating Smarty. Il est toujours possible de trouver la version sans ici: https://github.com/Ilanss/MovieBase (attention, beaucoup de fonctionnalités ont été ajoutées depuis la migration).

Le prochain objectif est de permettre aux utilisateurs de changer leurs infos. Sinon il y a aussi des corrections mineures qui vont être apportée afin de combler des lacunes et rendre l'application plus stable.

# Objectifs du projet
Tout les objectifs, ainsi que les objectifs complémentaire, determiné au début du projet ont été atteint.
