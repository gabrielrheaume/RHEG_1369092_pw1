# Projet Web

## Contexte
Dans le cadre de ma formation en conception de sites Web, un *faux* client m'a approché pour créer un site pour son restaurant PUBG4  

Ce dernier voulait :
1. Une page d'accueil qui donne envie d'essayer leur cuisine
2. Un menu dynamique
3. Une page "À propos"
4. Une page de contact
5. Un moyen de s'inscrire à leur infolettre
6. Une zone admin pour modifier le menu ainsi que créer des utilisateurs

Puisque le temps était limité et que c'était un projet étudiant, certains éléments plus ou moins importants sont manquants.
Parmi ceux-ci, l'aspect responsive du site est pour moi l'élément manquant le plus important, mais n'était pas demandé (bien que ce soit ridicule pour un restaurant de faire le site en desktop-first)

## FrontEnd
Pour la partie frontend, dans ma formation, nous avons vu HTML, CSS (SCSS) et JavaScript  
Néanmoins nous n'avions vue aucune façon de gérer les différents fichiers  
Pour ma part, j'ai mis tout ce qui à attrait au frontend dans le dossier "public". Il y a un dossier JS et un CSS pour les fichiers de même type  
Ensuite, j'ai divisés les fichiers par élément. Par exemple, il y a un fichier CSS "Header", pour le header  

## BackEnd
Pour le backend, nous avons vu PHP avec SQL pour les requêtes de base de données  
Et nous avons vu la méthode MVC, alors c'est celle que j'ai utilisée  
Séparation des modèles, des controlleurs et des vues  

## Description du projet
### Header
Le Header contient :
- Le logo du restaurant
- Des liens de navigation
- Les icônes des réseaux sociaux

Les liens de navigation ont un petit effet lors du survol  
Il serait intéressant d'en ajouter un pour les réseaux sociaux  
Le header est fait en HTML/CSS

### Footer
Le footer contient :
- Un logo copyright
- Deux éléments importants : l'adresse et le numéro de téléphone
- Un texte et un bouton pour inciter l'inscription à l'infolettre

La partie infolettre n'est pas présente sur la page d'inscription à l'infolettre, ni sur la page réservée au gérant et aux employés
Le footer est fait en HTML/CSS

### Page d'Accueil
La page d'acceuil est divisée en trois sections et une fonctionnalité :
- Entête
- Informations sur le style de nourriture
- Incitation à vivre l'expérience PUBG4
- Commentaires pop-up

Les trois sections sont statiques et faites en HTML/CSS  
Les commentaires sont tirés aléatoirement dans une liste contenue dans la base de données.  
Ensuite, le commentaire obtenu est affiché dans une infobulle style texto  
Les commentaires sont récupérés dans la base de données via PHP/SQL et sont envoyés en json pour être traités et affichés en JavaScript/CSS

### Page "À Propos"
Cette page contient une image et un texte descriptif du restaurant et/ou de l'entreprise  
Ce n'est que du HTML/CSS

### Page de Contact
Tout comme la page "À propos", cette page est en très grande majorité du HTML/CSS statique  
Il y a un élément visuel, géré en PHP, pour indiquer si le restaurant est actuellement ouvert ou fermé  
Il serait toutefois très intéressant de permettre au propriétaire de modifier les heures d'ouverture et potentiellement des fermetures exceptionnelles

### Infolettre (et plus)
Cette page contient un formulaire d'inscription à l'infolettre  
Il y a aussi une petite flèche pour le retour à la page précédente et une image pour combler l'espace vide  
Ce qui est très intéressant avec cette page, c'est que la section du formulaire sert aussi à accueillir tous les autres formulaires du site 
En effet, la création de compte ainsi que toutes les fonctions relatives à la modification du menu s'y retrouvent, mais ne sont accessibles qu'au propriétaire ainsi qu'à ses employés. Note spéciale pour la création de compte qui n'est accessible qu'au propriétaire, comme il l'a demandé  

Évidemment, l'affichage est fait en HTML/CSS, mais toute la gestion des formulaires est faites en PHP/SQL

### Menu dynamique
### Zone Admin
