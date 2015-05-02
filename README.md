La Guerre des 631 !
===================

Code source du jeu *La Guerre des 631*, par GilDev, sous license WTFPL. À disposition pour les curieux de la classe.

Ceci est le premier site que je développe en utilisant un framework, le code n'est donc pas parfait, il n'est pas commenté (il reste cependant relativement simple) et l'application n'est pas facilement configurable.


## Pré-requis

* Serveur web Apache (ou Nginx mais la configuration n'est pas fournie)
* PHP


## Installation

Pour créer la base de données (SQLite), entrez la commande suivante depuis la racine de l'application :
`php index.php create-db`


## Remarques

* Le fichier *app/config.php* permet de modifier les administrateurs à l'aide d'un tableau nommé `adminIds` qui contient l'`id` de chaque administrateur dans la table `eleves`
* La commande `php index.php new-day` doit être exécutée chaque jour à une heure précise
* Les mots de passe sont volontairement stockés en clair