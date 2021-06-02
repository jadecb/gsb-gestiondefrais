# GSB - Gestion fiches de frais

Ce projet a été créé dans le cadre du BTS SIO en répondant à des besoin de l'entreprise fictive Galaxy Swiss Bourdin(GSB).  
Il s'agit d'un site web comprenant l'affichage et la gestion de fiches de frais.   
L'interface comprend 3 parties distinctes correspondant à 3 différents rôles : 

- L’accès visiteur   
Enregistrer de nouvelles fiches de frais.   
Consulter ses propres de fiches de frais existantes en fonction de leurs états.   

- L’accès comptable   
Consulter toutes les fiches de frais.   
Peut modifier l'état des fiches de frais (non-traitée, refusée, acceptée).   


- L’accès administrateur   
Consulter les utilisateurs.   
Créer et modifier des utilisateurs.   


## Pour commencer

Afin de pouvoir débuter le projet, veillez à bien installer tous les composants associés.     
Il est conseillé de clonner ou bien de télécharger le projet entièrement afin d'éviter tous désagrements.     


### Pré-requis

Afin que le projet soit éxecuté dans de bonnes conditions, il est nécessaire de posséder :     

- Un IDE configuré pour PHP   
- Composer préalablement installé   
- MySQL préalablement installé   

Si Composer n'est pas installé voici un lien d'installation : https://getcomposer.org/doc/00-intro.md   
Si MySQL n'est pas installé voici un lien d'installation : https://dev.mysql.com/doc/mysql-installation-excerpt/5.7/en/   

Une fois Composer installé il faut installer le framework Laravel à l'aide de la commande suivante :    
$ composer create-project laravel/laravel example-app   


## Démarrage

Pour démarer le projet vous devez le cloner, puis vous placer dans celui-ci.   
Ouvrez un terminal et effectuez les commandes suivantes :   

$ mysql -u root < database/sql/script.sql   
$ composer update   
$ cp .env.example .env   
$ php artisan key:generate   
$ php artisan serv   

Vous pouvez à présent accèder au site we en ouvrant un navigateur et à l'adresse suivante: http://localhost:8000/   


Voici les comptes pour se connecter :     

Compte administrateur   
login : e.musk@gsb.com    
mdp : Elon69    
   
Compte visiteur   
login : b.gates@gsb.com   
mdp : Bill69   

Compte comptable   
login : j.bezos@gsb.com   
mdp : Jeff69   


## Conçu avec

* Visual Studio Code
* Lavarel
* Bootstrap

## Versions

**Dernière version :** 1.0

## Auteurs

* **JANVIER Pierre** _alias_ [@p.janvier](https://gitlab.com/p.janvier)  
* **ARQUILLIERE Benoit** _alias_ [@b.arquilliere](https://gitlab.com/b.arquilliere)  
