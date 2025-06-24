# Dynamic Portfolio Website

A modern, responsive portfolio website built with **Laravel**, **Blade**, and **FilamentPHP**. This project allows easy management of content via an admin panel and is containerized with **Docker**, deployed on **Oracle Cloud Free Tier**.

---

## 🚀 Live Demo

🖥️ [View Live Site](http://http://89.168.18.215/)

> The admin panel is built using FilamentPHP and can be accessed at `/admin` (with proper authentication).

---

## 📸 Preview

### 🌐 Frontend

> *(Insert screenshots of the homepage, project sections, about, contact, etc.)*

### ⚙️ Admin Panel (FilamentPHP)

> *(Insert screenshots of the FilamentPHP panel showing how to manage projects, skills, education, etc.)*

---

## 🧰 Technologies Used

- **Laravel** 10
- **PHP** 8.3
- **Blade** templating engine
- **MySQL** 10
- **FilamentPHP** (for the dynamic admin panel)
- **Docker** (local development & deployment)
- **Oracle Cloud Free Tier** (hosting)

---

## ⚙️ Features

- Responsive and dynamic portfolio layout
- Fully manageable from a FilamentPHP admin dashboard
- Categorized skills, education, experience and projects
- Contact form with validation
- SEO optimized structure

---

## 📁 Folder Structure Notes

This project was based on [Tauseed Zaman's Laravel Portfolio](https://github.com/tauseedzaman/laravel-portfolio). 

---

## **Installation Guide**  
### **1. Clone the Repository**  

```bash
# Clone the repository
git clone https://github.com/LionelBenvino/portfolio.git
cd portfolio
```
```bash
# Copy the .env file and configure database and credentials
cp .env.example .env
```

### **2. Install Dependencies**  
Ensure you have Composer installed, then execute:  

```bash
composer install
```

### **3. Set Up the Application**  
Generate the application key:  

```bash
php artisan key:generate
```

### **4. Configure Storage and Database**  
Run the following command to create a symbolic link for storage:  

```bash
php artisan storage:link
```

Run database migrations:  

```bash
php artisan migrate
```

### **5. Start the Development Server**  
Finally, launch the Laravel development server:  

```bash
php artisan serve
```

Your portfolio website should now be accessible at `http://127.0.0.1:8000`.  