# ShelfCore

ShelfCore is a web-based Library Management System developed as the final project for **ICS2609**. The system is designed to help libraries efficiently manage books, track records, and streamline daily library operations through a simple and user-friendly interface.

####
<img width="1902" height="908" alt="image" src="https://github.com/user-attachments/assets/d2936e9d-e0df-41a3-b5cd-11b27aaae708" />
<img width="1538" height="881" alt="image" src="https://github.com/user-attachments/assets/e5d54510-0bcd-4eae-a042-405f6b568ce9" />
<img width="1271" height="890" alt="image" src="https://github.com/user-attachments/assets/a5f3769d-3e73-4330-bae4-a792b039c0fd" />

## Features
- Book catalog management
- Library record organization
- User-friendly interface
- Efficient library data handling
- Admin / Librarian / Member Dashboard

## Tech Stack

### Frontend
- HTML
- CSS
- Bootstrap

### Backend
- PHP
- MySQL

### Version Control
- Git
- GitHub

## Contributors
- **Euschii** — Marquinn Budomo
- **Leficios12** — Shinya Koike
- **DigiCode4** — Leocadio Belaro


## Requirements

Before running the project, make sure the following are installed on your machine:

- PHP 7.4 or later
- MySQL / MariaDB
- XAMPP (or any local server environment)

---

## Setup Guide

### 1. Download the Project

Clone the repository or download the ZIP file and extract it into your web server's root directory.

Example for XAMPP:

```text
C:/xampp/htdocs/
```

### 2. Create the Database

Open phpMyAdmin and create a new database named:

```sql
db_librarysystem
```

### 3. Configure the Database Connection

Locate the database configuration file and ensure the connection details match your local setup:

```php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_librarysystem";
```

### 4. Configure Email Settings (PHPMailer)

If the system uses email features such as account verification, password recovery, or notifications, configure your email credentials in the PHPMailer configuration file.

Update the required SMTP settings, including:

```php
$mail->Host = 'smtp.gmail.com';
$mail->Username = 'your-email@gmail.com';
$mail->Password = 'your-app-password';
$mail->Port = 587;
```

> **Note:** For Gmail accounts, it is recommended to use an App Password instead of your regular account password. Ensure that the email credentials are valid before testing email-related features.

### 5. Import Database Tables

Import the provided SQL file into the `db_librarysystem` database to create the required tables and initial data.

## Launching the Application

1. Start **Apache** and **MySQL** through the XAMPP Control Panel.
2. Open your preferred browser.
3. Access the application using:

```text
http://localhost/[project-folder-name]/
```

---

## Notes

- The default MySQL username in XAMPP is `root`.
- If your MySQL server uses a password, update the connection settings accordingly.
- Ensure that Apache and MySQL services are running before accessing the system.

## Course Information
**ICS2609 Final Project**

