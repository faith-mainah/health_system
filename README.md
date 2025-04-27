# Health Information System (HIS) - README

## Project Prototype

[[https://github.com/faith-mainah/prototype](https://github.com/faith-mainah/prototype-/blob/master/prototype%20(1)%20(1).mp4)](https://github.com/faith-mainah/prototype)
just view raw

## Overview
The **Health Information System (HIS)** is a web-based application designed to manage client health information, including enrollment in health programs. The system is developed using **PHP**, **HTML**, **CSS**, **JavaScript**, and utilizes **MySQL** as the database.

## Prerequisites
Before setting up the project, make sure you have the following installed on your machine:
- **XAMPP** (or **WAMP**)
- **Web Browser** (Google Chrome, Firefox, etc.)
- **Text Editor or IDE** (VS Code, Sublime Text, etc.)

### Steps to Install and Run the Project

#### 1. Install XAMPP
- Download **XAMPP** from the official site: [XAMPP](https://www.apachefriends.org/index.html).
- Follow the installation instructions for your operating system (Windows, macOS, or Linux).
- After installation, open the **XAMPP Control Panel**.

#### 2. Set up XAMPP
- In the XAMPP Control Panel, start the following services:
    - **Apache** (for the web server)
    - **MySQL** (for the database)

#### 3. Download and Set up the Project
```bash
git clone https://github.com/your-username/health-information-system.git
Place the entire project f![pss](https://github.com/user-attachments/assets/f3a6a91c-803e-4965-a21b-b646eb0cb0ce)
older (health-information-system) ![index](https://github.com/user-attachments/assets/88502f2e-25f2-4c88-b2ae-d2aa200a9721)
![register](https://github.com/user-attachments/assets/5b983e8f-8991-4f06-a149-82954d5f5930)
inside the htdocs folder of your XAMPP installation.

The typical path for the htdocs folder is:


C:\xampp\htdocs\
Rename the folder to HIS for convenience, so it looks like:


C:\xampp\htdocs\HIS

 Create a Database
Open your web browser and navigate to phpMyAdmin:

Go to http://localhost/phpmyadmin/.

In phpMyAdmin:

Click on Databases.

Create a new database named his_database.

Select the newly created database, and then import the his_schema.sql file from the project into this database.

If there is no his_schema.sql file, you can manually create the required tables based on your project's schema.

 Configure Database Connection
Open the php/db.php file in your project folder (HIS).

Update the database connection parameters as follows:


<?php
// Database connection details
$servername = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";      // Default password for XAMPP is empty
$dbname = "his_database";  // The name of the database you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
Hosting the Application Locally
To host the Health Information System (HIS) on your local machine using XAMPP:

Ensure Apache and MySQL are Running:
![index](https://github.com/user-attachments/assets/6509d965-5070-41ae-a883-7fa2802ec792)

Open the XAMPP Control Panel.

Start the Apache (web server) and MySQL (database server) modules.

Access the Application:

Open your web browser (Google Chrome, Firefox, etc.).

In the address bar, type:


http://localhost/HIS/index.html
This will load the landing page of your Health Information System (HIS).

Test the Application:

Try logging in or registering a client to ensure the system is working correctly.

If there are any errors, check your PHP files, database configuration, and ensure the database is properly set up.


Common Issues and Troubleshooting
Issue 1: Missing auth.php File
If you encounter errors like:


Warning: include(auth.php): Failed to open stream: No such file or directory
Ensure that the file auth.php exists and is correctly included in your PHP files. If missing, create this file to handle authentication or update the include path in your PHP files.

Issue 2: Database Connection Error
If you encounter an error connecting to the database:


Connection failed: Access denied for user 'root'@'localhost' (using password: YES)
Ensure that your MySQL server is running and that the credentials in php/db.php are correct.

Issue 3: Duplicate Client ID or Program Name
If you see an error message like:


Error: Client ID already exists! Please choose a different Client ID.
Ensure that the Client ID or Program Name you're trying to register is unique. The system does not allow duplicate entries.

Updating the Project
To update the project, simply make changes to your files in the HIS folder. If you've made changes to the database schema, remember to update the database accordingly.

Contributing
We welcome contributions to improve the Health Information System! If you'd like to contribute:

Fork the repository.

Create a new branch (git checkout -b feature/your-feature).

Commit your changes (git commit -am 'Add new feature').

Push to the branch (git push origin feature/your-feature).

Create a new Pull Request.

Password Hashing
For secure password storage, use password_hash() when registering a new user:


$hashed_password = password_hash($password, PASSWORD_DEFAULT);
When checking a password during login, use password_verify():


if (password_verify($password, $user['password'])) { ... }
Note: Ensure that the maximum length of the password adheres to the requirements in the screenshot provided.


