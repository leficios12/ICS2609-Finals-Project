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

##Installation
## Requirements

- PHP 7.4+ (or compatible with your XAMPP stack)
- MySQL / MariaDB
- Apache (XAMPP, WAMP, or similar)

---

## Installation

1. Clone or download this repository.

2. Place the project folder inside your web server document root:

```text
C:/xampp/htdocs/
```

3. Create a MySQL database named:

```sql
db_librarysystem
```

4. Import the provided SQL file (if available) into the database.

5. Verify the database connection settings in your configuration file:

```php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_librarysystem";
```

---

## Run

1. Start **Apache** and **MySQL** from XAMPP.
2. Open your browser and navigate to:

```text
http://localhost/your-project-folder/
```

---

## Database Configuration

Example database connection:

```php
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_librarysystem";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```

## Course Information
**ICS2609 Final Project**

