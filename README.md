# 📦 Gestion de Stock - Laravel + Vue 3 + Inertia.js

Application de gestion de stock développée avec Laravel 12 et Vue 3 (Inertia.js).  
Elle permet de gérer les produits, les clients, les mouvements de stock ainsi que l’historique des prix.

---

## 🚀 Fonctionnalités

- 📦 Gestion des produits (CRUD)
- 📊 Mouvements de stock (entrées / sorties)
- 📉 Vérification automatique du stock
- 📈 Historique des prix (Observer Laravel)
- 👤 Gestion des clients (CRUD)
- 🔎 Recherche multi-critères (produits et clients)
- 📊 Dashboard admin (vue globale du système)

---

## 🧰 Stack technique

### Backend
- Laravel 12.x
- PHP 8.3+
- SQLite (ou MySQL possible)

### Frontend
- Vue 3 (Composition API)
- Inertia.js 2.x
- Tailwind CSS 3.x

### Build
- Vite 5.x
- npm

---

## 📁 Installation du projet

```bash
git clone https://github.com/ton-user/gestion-stock.git
cd gestion-stock

composer install
npm install

cp .env.example .env
    DB_CONNECTION=sqlite
    DB_DATABASE=database/database.sqlite

php artisan key:generate
php artisan migrate
php artisan serve
npm run dev

## Login : /login

## Register: /register
