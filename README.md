# AMARWORLD — Social Platform in Pure PHP

[![Live Demo](https://img.shields.io/badge/Live_Site-amarworld.me-0b3d91?style=for-the-badge)](https://amarworld.me)
[![Built in PHP](https://img.shields.io/badge/Stack-Pure%20PHP%20%2B%20MySQL-informational?style=for-the-badge)](https://php.net)
[![Responsive UI](https://img.shields.io/badge/Responsive-Mobile%20%7C%20Desktop-green?style=for-the-badge)](#)
[![Deploy Ready](https://img.shields.io/badge/Deploy-AlwaysData%20%7C%20NGINX%20%7C%20cPanel-blueviolet?style=for-the-badge)](#)

---

## ✨ Overview

**AmarWorld** is a full-featured, futuristic social media platform built with pure PHP and MySQL — no frameworks.  
Think **Instagram + Facebook** in a clean, modern UI with complete backend logic and real-time features.

🌐 Live Demo: [https://amarworld.me](https://amarworld.me)

---

## 🧩 Features

- 📱 **Story Bar** – Like Instagram
- 📝 **Posts Feed** – Likes, comments, media
- 🎬 **Shorts Uploads** – Video-based content at `/shorts`
- 💬 **Real-Time Chat** – AJAX-based messaging
- 👤 **User Profiles** – Change bio, avatar, email, password
- 🔐 **Authentication** – Login, register, forgot password (SMTP support)
- 📶 **Responsive UI** – Mobile and desktop optimized
- ☁️ **Deploy Ready** – Works great on AlwaysData, cPanel, NGINX servers

---

## 🖼️ Interface Samples

> Replace these placeholders with real screenshots from your project.

| Home Feed + Stories | Realtime Chat |
|---------------------|---------------|
| ![Feed](https://via.placeholder.com/450x250.png?text=Feed+%2B+Stories) | ![Chat](https://via.placeholder.com/450x250.png?text=Live+Chat) |

| Shorts Section | Profile Editor |
|----------------|----------------|
| ![Shorts](https://via.placeholder.com/450x250.png?text=Short+Videos) | ![Profile](https://via.placeholder.com/450x250.png?text=Edit+Profile) |

---

## ⚙️ Tech Stack

| Layer     | Tech         |
|-----------|--------------|
| Backend   | PHP (native) |
| Database  | MySQL        |
| Frontend  | HTML, CSS, JS|
| Realtime  | AJAX         |
| Mailing   | SMTP (PHPMailer) |
| Hosting   | NGINX / cPanel / AlwaysData |

---

## 📦 Installation & Setup

### 1. Clone Repository

```bash
git clone https://github.com/harunabdullahrakin/Social-Media-App-Php.git

```

---

### 2. Configure Environment

- Make sure your server has **PHP 7.4+** and **MySQL**.
- Enable required extensions: `mysqli`, `mbstring`, `openssl`, `fileinfo`, etc.
- Edit `/config/db.php` and `/config/smtp.php` with your credentials.

---

### 3. Import MySQL Database

> File location: `config/mysql.sql`

**Using phpMyAdmin:**
1. Login to phpMyAdmin  
2. Create a database  
3. Import `mysql.sql`

---

### 4. Run Locally

```bash
php -S localhost:8000
```

Visit: [http://localhost:8000](http://localhost:8000)

---

## ☁️ Deploying to Production

### ✅ Recommended Host: [AlwaysData](https://alwaysdata.com)

- Upload project via SFTP
- Set project root to `index.php`
- Use MySQL + SMTP config from panel

### NGINX Example Config:

```nginx
server {
    listen 80;
    server_name yourdomain.com;

    root /var/www/amarworld;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php7.4-fpm.sock;
    }
}
```

---


  

---

## 🧑‍💻 Author

**Harun Abdullah**  
🌐 [harunabdullah.is-a.dev](https://harunabdullah.is-a.dev)

---

## 📄 License

This project is open-source for educational and development use.  
Please give credit if you use it publicly.

> Built with passion — no frameworks, just raw PHP.

