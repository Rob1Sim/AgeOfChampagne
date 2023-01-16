# Age Of Champagne ( AOC ) 
## Réalisé par Robin Simonneau, Erwann Maton, Noa Brébant, Roman Szczepaniak, Dylan Huckel  
Le projet **Age of Champagne** est un projet de groupe réaliser lors de ma 2ème année de BUT informatique, à l'IUT de Reims.  
Le projet consiste à être une extension du jeu de plateau **Age Of Champagne**, permettant aux joueurs de scanner les cartes du jeu à fin de récupérer des informations sur celle-ci.

Pour plus d'informations sur le jeu : [Cliquez ici](https://www.ageofchampagne.fr/) 

## Instalation et configuration
Ce projet utlise le framework *Symfony* :
- Pour récupérer les paquets du projets utilisez : 
  ```shell
    composer install
  ```
- Pour lancer le projet utilisez : 
  ```shell
    composer start
  ```
- Pour vérifier que le codes est écrit selon le style de codage : PSR-12 utilisez : 
  ```shell
  composer test:cs
    ```
- Pour corriger tout erreur de style de codage utilisez : 
  ```shell
  composer fix:cs
  ```

## Tester le projet
Des test sont disponible pour le projet :
- Pour lancer les test écrit avec codeception et reset la base de donnée de test : 
  ```shell
  composer test:codecept
  ```
- Pour lancer les test de vérification de style de codage et les test codeception : 
  ```shell
  composer test
    ```
- Pour reset la base de donnée de test et ajouter des factice utilsé :
   ```shell
  composer db
    ```

## Base de donnée:
Le fichier de configuration de la base de donnée est `.env.local`
La ligne de configuration a la bd se présente sous cette forme :
```shell
 DATABASE_URL="mysql://user:mdp@ipBD/nomBD?serverVersion=serverVersion
 ```

## Les utilisateurs de connexions factices :
- Admin :
    - email : *root@example.fr*
    - password : *test*
- User :
    - email : *user-lambda@example.fr*
    - password : *test*
- User premium :
    - email : *user-premium@example.fr*
    - password : *test*


### Les utilisateurs de connexions en production :
- Amin :
  - email : *root@root.fr*
  - password : *root123*