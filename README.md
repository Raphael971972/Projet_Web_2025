# 🚀 Coding Tool Box – Guide d'installation

Bienvenue dans **Coding Tool Box**, un outil complet de gestion pédagogique conçu pour la Coding Factory.  
Ce projet Laravel inclut la gestion des groupes, promotions, étudiants, rétro (Kanban), QCM  dynamiques, et bien plus.

---

## 📦 Prérequis

Assurez-vous d’avoir les éléments suivants installés sur votre machine :

- PHP ≥ 8.1
- Composer
- MySQL ou MariaDB
- Node.js + npm (pour les assets frontend si nécessaire)
- Laravel CLI (`composer global require laravel/installer`)

---

## ⚙️ Installation du projet

Exécutez les étapes ci-dessous pour lancer le projet en local :

### 1. Cloner le dépôt

```bash
git clone https://m_thibaud@bitbucket.org/m_thibaud/projet-web-2025.git
cd coding-tool-box
cp .env.example .env
```

### 2. Configuration de l'environnement

```bash
✍️ Ouvrez le fichier .env et configurez les paramètres liés à votre base de données :

DB_DATABASE=nom_de_votre_bdd
DB_USERNAME=utilisateur
DB_PASSWORD=motdepasse
```

### 3. Installation des dépendances PHP

```bash
composer install
```

### 4. Nettoyage et optimisation du cache

```bash
php artisan optimize:clear
```

### 5. Génération de la clé d'application

```bash
php artisan key:generate
```

### 6. Migration de la base de données

```bash
php artisan migrate
```

### 7. Population de la base (Données de test)

```bash
php artisan db:seed
```

---

## 💻 Compilation des assets (si nécessaire)

```bash
npm install
npm run dev
```

---

## 👤 Comptes de test disponibles

| Rôle       | Email                         | Mot de passe |
|------------|-------------------------------|--------------|
| **Admin**  | admin@codingfactory.com       | 123456       |
| Enseignant | teacher@codingfactory.com     | 123456       |
| Étudiant   | student@codingfactory.com     | 123456       |

---

## 🚧 Fonctionnalités principales

- 🔧 Gestion des groupes, promotions, étudiants
- 📅 Vie commune avec système de pointage
- 📊 Bilans semestriels étudiants via QCM générés par IA
- 🧠 Génération automatique de QCM par langage sélectionné
- ✅ Système de Kanban pour les rétrospectives
- 📈 Statistiques d’usage et suivi pédagogique


////////////////////////////////////////        FIN DE PROJET        ///////////////////////////////////////////////////


Je devais te rappeler que mon projet a eu un problème à l'initialisation et que le premier commit que j'ai fait a été
compté pour mardi dernier alors que mes commits avaient été faits bien avant.
Pour corriger ça, tu m'as créé un nouveau repo, j'ai continué le projet sur ce repo.

À propos du projet, je n'ai pas fait d'AJAX, c'est un domaine que je n'ai pas vraiment compris et qui m'a valu
plusieurs problèmes lors de mon développement. J'ai donc décidé de l'enlever car certains problèmes m'empêchaient d'avancer.

Une dernière chose à propos de la modification des étudiants et des enseignants, lorsque l'on clique sur la petite
icône à côté du bouton supprimer, le modal de la modification s'affiche mais une autre page sans CSS s'affiche
juste après. Il faut revenir à la page d'avant avec les flèches de ton navigateur et mon modal sera normalement bien présent.
Cela ne se produit pas pour la modification des cohorts car j'ai changé ma méthode d'affichage de la modification.



---- Résumé des stories : -----


STORY 1 : terminée
STORY 2 : pas finie
STORY 3 : il manque juste l'association d'un étudiant à une promotion
STORY 4 : terminée
STORY 5 : terminée
STORY 6 : pas de changement de photo de profil et pas de modif de mot de passe

------ Avis et commentaires : ------
J'ai été assez déçu de mes performances sur ce projet.

J'ai pris mon temps au début du projet en espérant avoir "largement" du temps pour finir, mais finalement
je me suis retrouvé dépassé par la tâche. À force de laisser le projet de côté et de faire d'autres choses lors de mon week-end,
mon temps de travail se réduisait de plus en plus.

Je suis totalement conscient que cette manière de travailler n'est pas la bonne et je retiendrai la leçon, peu importe la note
attribuée, je l'assumerai complètement.










