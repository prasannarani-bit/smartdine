🍽️ SmartDine – Restaurant Management Website - https://smartdine.free.nf/index.php

📌 Project Overview
SmartDine is a web-based restaurant management system developed using PHP and MySQL.
The application allows customers to browse the menu, place orders online, and enables administrators to manage food items, categories, and customer orders efficiently.

This project is designed to simplify restaurant operations and enhance customer experience through digital ordering.

🚀 Features
👤 Customer Module

User Registration & Login

Browse Food Menu

Search Food Items

Add to Cart

Place Orders

View Order Status

🔐 Admin Module

Secure Admin Login

Add / Update / Delete Food Items

Manage Categories

View Customer Orders

Update Order Status

Manage Users

🛠️ Technologies Used

Frontend: HTML, CSS, Bootstrap

Backend: PHP

Database: MySQL

Server: Apache (XAMPP / InfinityFree Hosting)

🗄️ Database Structure

The system includes tables such as:

users

admin

categories

food_items

orders

order_details

Database is connected using PHP MySQLi.

⚙️ Installation & Setup
1️⃣ Local Setup (Using XAMPP)

Install XAMPP.

Place project folder inside:

htdocs


Start Apache and MySQL.

Open phpMyAdmin.

Create a new database (e.g., smartdine).

Import the provided .sql file.

Update config.php with database credentials:

$host = "localhost";
$user = "root";
$pass = "";
$db   = "smartdine";


Run in browser:

http://localhost/smartdine

2️⃣ Online Deployment (InfinityFree)

Create free hosting account.

Upload files to htdocs folder.

Create MySQL database.

Update config.php with hosting DB details.

Access your live URL.

🔐 Security Features

Session-based authentication

Password validation

Admin authorization control

Input validation

🎯 Project Objectives

Digitize restaurant ordering system

Reduce manual errors

Improve order management efficiency

Provide user-friendly online food ordering platform

📈 Future Enhancements

Online payment integration

AI-based food recommendation

Order tracking with notifications

Mobile application version

Analytics dashboard

🎓 Academic Purpose

This project was developed as part of MCA academic curriculum to demonstrate practical implementation of web development concepts including database management, CRUD operations, and authentication systems.

👩‍💻 Author

Prasannarani Patnana
MCA Student
