# MovieBase
Ce projet de site web à été développé dans le cadre d'un cours de développement PHP/SQL à la HEIG-VD. Le but de ce site est de permettre à des utilisateurs d'insérer des films, de les ajouter à leur liste et d'indiquer si ils ont été visionné. Il possède aussi une gestion de comptes administrateur.

# How to
1. Télécharger la totalité du projet
2. Décompresser l'archive
3. Placer le contenu du dossier à l'endroit voulut sur le serveur (racine ou pas)
4. Importez le fichier `dump.sql` dans votre base de données (celui contient la structure de la base de données ainsi que quelques films, un administrateur et un simple utilisateur)
5. Ouvrir le fichier `config.php` et le modifier en fonction de votre configuration
  * DB_USER = Utilisateur de la BDD
  * DB_PASS = Mot de passe de la BDD
  * DB_NAME = Nom de la BDD
  * DB_HOST = Adresse de la BDD (probablement localhost)
  * SITE_ROOT = Chemin du site dans le cas ou il n'est pas à la racine
6. Enjoy! Le site est fonctionnel!

# Films
Les films possèdent un titre, une image et une description (synopsis). Il est possible d'ajouter des films, les modifier et les supprimer.

# Comptes
Les comptes utilisateurs peuvent être créé depuis le site. Il faut par contre passer par la BDD pour définir le rôle d'administrateur à un utilisateur car ceci n'est pas encore géré sur le site. Il n'est pas non plus possible à l'heure actuelle de changer les différentes infos des utilisateurs (ceci n'étant pas une priorité dans ce projet).

# Droits
* Un utilisateur non loggé ne peut que voir la liste des films.
* Un utilisateur peut ajouter des films à sa liste et les marquer comme vu
* Un administrateur peut modifier et supprimer les films

# Accès
Administrateur:
> Login->admin
> password->admin

Utilisateur test:
> Login->test
> password->1234

# Future change
Le site est en train d'être migré pour utiliser le système de templating Smarty. Il sera publié dans un autre repo (ou éventuellement celui-ci).
