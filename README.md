# projet_web_burger_quiz
Projet de fin d'années CIR2 - php  c++ -

/*------------------------------------------------------------------------------------------------------------------------------*/
C++


taper la commande:
    echo "mot de passe de la base" | sha256sum
recuperer la suite de lettre renvoyé par la commande
la mettre dans le fichier bdd.conf a la 3eme ligne
Dans ce même fichier indiquer à la deuxième ligne le nom de votre utilisateur de base
ainsi qu'à la quatrième ligne le nom de votre base de données.

ouvrir phpmyadmin avec l’url “localhost/phpmyadmin”
sélectionner la base de donnée créer et y importer le script “burgerquiz.sql” ci joint.
Vous allez pouvoir exécuter le programme BurgerQuiz.exe.
Vous pouvez vous connecter à l'interface d'administration.

L'utilisateur de base est "admin" et a pour mot de passe "admin"

/*------------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------------------------------------------------------*/
PHP


Récupérer le .zip sur l’ent et le dézipper directement sur le serveur dans le dossier :
$/var/www/nomdevotredossier/

créer la base de donnée avec le fichier burgerquiz.sql directement dans phpmyadmin
si il y a besoin de changer l’utilisateur, modifier le fichier constant.php qui se trouve dans /model/class/

/*------------------------------------------------------------------------------------------------------------------------------*/
