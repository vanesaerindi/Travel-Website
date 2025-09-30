# 🌍 Travel Website (PHP + MySQL)

A simple travel booking & management demo built with **PHP + MySQL**.  
Users can browse destinations, packages, and services, while admins can manage content through a panel.

---

## 🚀 Features
- User-facing pages:
  - Home, About, Packages, Services, Guides, Testimonials
- Admin Panel (PHP):
  - Add, edit, and delete destinations, services, and travel dates
  - Login/logout functionality
- Database integration with MySQL

---

## 🛠️ Tech Stack
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Tools**: XAMPP / WAMP for local hosting

---

## 📂 Project Structure
```
travel-website/
│── css/              # Stylesheets
│── img/              # Images
│── js/               # JavaScript
│── lib/              # External libraries
│── mail/             # Contact form handler
│── scss/             # Sass styles
│── index.html        # Homepage
│── about.html
│── package.html
│── service.html
│── guide.html
│── testimonial.html
│── user.html
│── login.php
│── logout.php
│── admin-panel.php
│── add-*.php / edit-*.php / delete-*.php
│── database.sql      # Database schema (import this)
│── config.example.php # Template DB config (safe to upload)
```
---

## 🗄️ Database Setup
1. Open **phpMyAdmin** (or MySQL CLI).
2. Create a new database, e.g. `travel_db`.
3. Import the provided **`database.sql`** file. It creates:
   - `services` table
   - `destinations` table
   - `travel_dates` table

---

## ⚙️ Installation
1. Install [XAMPP](https://www.apachefriends.org/) or WAMP.
2. Place the `travel-website` folder into `htdocs` (for XAMPP).
3. Copy `config.example.php` → rename it **`config.php`** and fill your real DB credentials.
   Example (XAMPP default):
   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $dbname = "travel_db";
   ```
4. Start Apache + MySQL in XAMPP.
5. Visit:
   - `http://localhost/travel-website/index.html` (user pages)
   - `http://localhost/travel-website/admin-panel.php` (admin panel)

---

## 📸 Screenshots
(Add a few screenshots of homepage and admin panel here to make it look professional.)

---

## 📜 Notes
- Do **not** upload your real `config.php` (with password).
- Only `config.example.php` should be public.
