# garagevpt1

STUDI - ECF Hiver 2023-24  - Garage V.Parrot

Pour éxécuter le site en local



cloner le projet sur votre machine
git clone https://github.com/<br>
Dans le fichier .env, définir la variable d'environnement<br> DATABASE_URL en fonction de votre système de gestion de base de données
installer les dépendances
composer install<br>
Création de la base de données<br>
symfony console doctrine:database:create
exécution du fichier de migration
symfony console doctrine:migrations:migrate
Insertion de données fixtures (vehicle, User, User1)<br>
symfony console doctrine:fixtures:load
ℹ️ ℹ️ ℹ️




Si vous ne souhaitez pas utiliser les donnée fixtures generer, vous pouvez créer directement des utilisateurs sur le site situé dans l'onglet connexion se connecter en tant que . Ce fichier s'occupe de la création de la base de données, des tables, des clés étrangères, du compte admin de Vincent Parrot, des horaires et d'un établissement.





Technologies utilisées
languages => PHP 8.2.4 et Javascript
Framework => Symfony 6.3
Système de gestion de base de données => Mysql
ORM => doctrine
moteur de template HTML => Twig
Style => Boostrap et Css
gestionnaires de dépendance => composer & npm
server web => Apache2
