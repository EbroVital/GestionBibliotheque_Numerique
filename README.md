#  Bibliothèque en ligne – Projet de Fin de Cycle
![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/Database-MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)
![Status](https://img.shields.io/badge/Status-terminé-vert?style=for-the-badge)

---

##  Description
Ce projet est une **application web de gestion d’une bibliothèque en ligne**, développée avec **Laravel**, dans le cadre d’un mémoire de fin de cycle en **Licence 3 Génie Logiciel**.  

Elle permet aux utilisateurs de **consulter, emprunter, télécharger et commenter** des ouvrages numériques.  
L’administrateur dispose d’un **espace de gestion** pour organiser les livres, les catégories et les utilisateurs.

---

##  Fonctionnalités principales
###  Côté utilisateur
- Inscription et connexion sécurisée
- Recherche et consultation de livres
- Téléchargement de fichiers PDF
- Ajout aux favoris
- Notation et commentaires
- Historique des emprunts et téléchargements

###  Côté administrateur
- Gestion des utilisateurs et des rôles
- Ajout, modification et suppression d’ouvrages
- Gestion des catégories de livres
- Suivi des emprunts et téléchargements
- Statistiques et rapports sur l’utilisation

---

##  Technologies utilisées
- [Laravel 10](https://laravel.com/) (Framework PHP)
- [PHP 8.2](https://www.php.net/)
- [MySQL](https://www.mysql.com/) (Base de données)
- [Bootstrap 5](https://getbootstrap.com/) (Design responsive)
- [DomPDF](https://github.com/dompdf/dompdf) (Export PDF)

---

##  Installation et configuration

### 1️⃣ Cloner le projet
```
git clone https://github.com/EbroVital/GestionBlibliotheque.git
cd GestionBlibliotheque
```
### 2️⃣ Installer les dépendances
```
composer install
npm install && npm run build
```
### 3️⃣ Configurer l’environnement
Copier le fichier .env.example vers .env :
```
cp .env.example .env
```
Modifier ensuite :
```
APP_NAME="BibliothequeEnLigne"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bibliotheque
DB_USERNAME=root
DB_PASSWORD=
```
### 4️⃣ Générer la clé et migrer la base
```
php artisan key:generate
php artisan migrate --seed
```
### 5️⃣ Lancer le serveur
```
php artisan serve
```
Accéder à l’application 👉 http://localhost:8000

## Capture d'ecran
- Ecran d'accueil





