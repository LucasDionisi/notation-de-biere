# Projet notabière - Site de notation de bières

![BeerRater Logo](resources/img/beer.svg)

Bienvenue dans le projet notabière ! Ce projet vise à créer un site web interactif permettant aux utilisateurs de noter et de partager leurs expériences sur différentes bières. 
Inspiré par des plateformes telles que TripAdvisor, notabière fournit une plateforme communautaire où les amateurs de bière peuvent découvrir de nouvelles bières, noter leurs favoris et échanger des recommandations.

## Fonctionnalités clés

- **Notation de bières** : Les utilisateurs pourront attribuer des notes et des critiques détaillées à leurs bières préférées.
- **Recherche de bières** : Les utilisateurs pourront rechercher des bières spécifiques et consulter les notes et les avis qui leur sont associés.
- **Création de profils** : Les utilisateurs peuvent créer des profils personnalisés pour suivre leurs notes et leurs statistiques.
- **Ajout de bières** : Les utilisateurs auront la possibilité d'ajouter de nouvelles bières à la base de données du site.
- **Images de bières** : Le site affichera des images de chaque bière pour faciliter l'identification visuelle.

## Prérequis

Avant de déployer le projet, assurez-vous d'avoir les éléments suivants installés sur votre système :

- PHP (version 8.1)
- MySQL (version 8.0.x) ou un autre système de gestion de base de données compatible
- Navigateur web moderne (Chrome, Firefox, Edge, etc.)
- Une bonne bière craft fraiche à déguster en même temps

## Installation

Suivez ces étapes pour déployer le projet localement sur votre machine :

1. Clonez ce dépôt sur votre machine locale :

```
git clone https://github.com/LucasDionisi/notation-de-biere.git
```

2. Créez la base de donnée via le fichier :

- Initialiser la base de donnée avec le fichier [init.sql](configurations/sql/init.sql).
- Créer des données avec le fichier [data.sql](configurations/sql/data.sql).
- Mettre a jour les données avec le fichier [update_0_to_1.0.sql](configurations/sql/update_0_to_1.0.sql).

4. Configurez les paramètres de connexion à la base de données :

Dupliquer le fichier [databaseCredentials.sample.json](configurations/databaseCredentials.sample.json) en un fichier `databaseCredentials.json` et y insérer vos données perso.

5. Lancez le serveur PHP local :

```
php -S localhost:8000
```

6. Ouvrez votre navigateur et accédez à l'URL suivante :

```
http://localhost:8000
```

7. Vous devriez maintenant voir le site notabière opérationnel avec un jeu de donnée pour donner un exemple du site.

---

Merci d'avoir montré de l'intérêt pour BeerRater ! Si vous avez des questions, des suggestions ou des problèmes, n'hésitez pas à créer une issue sur GitHub. Bonne dégustation de bières et de code ! 🍻👩‍💻
