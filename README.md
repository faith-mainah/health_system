# Health Information System (HIS) - README

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
Place the entire project folder (health-information-system) inside the htdocs folder of your XAMPP installation.

The typical path for the htdocs folder is:

bash
Copy
Edit
C:\xampp\htdocs\
Rename the folder to HIS for convenience, so it looks like:

bash
Copy
Edit
C:\xampp\htdocs\HIS

4. Create a Database
Open your web browser and navigate to phpMyAdmin:

Go to http://localhost/phpmyadmin/.

In phpMyAdmin:

Click on Databases.

Create a new database named his_database.

Select the newly created database, and then import the his_schema.sql file from the project into this database.

If there is no his_schema.sql file, you can manually create the required tables based on your project's schema.

5. Configure Database Connection
Open the php/db.php file in your project folder (HIS).

Update the database connection parameters as follows:

php
Copy
Edit
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

Open the XAMPP Control Panel.

Start the Apache (web server) and MySQL (database server) modules.

Access the Application:

Open your web browser (Google Chrome, Firefox, etc.).

In the address bar, type:

bash
Copy
Edit
http://localhost/HIS/index.html
This will load the landing page of your Health Information System (HIS).

Test the Application:

Try logging in or registering a client to ensure the system is working correctly.

If there are any errors, check your PHP files, database configuration, and ensure the database is properly set up.


Common Issues and Troubleshooting
Issue 1: Missing auth.php File
If you encounter errors like:

text
Copy
Edit
Warning: include(auth.php): Failed to open stream: No such file or directory
Ensure that the file auth.php exists and is correctly included in your PHP files. If missing, create this file to handle authentication or update the include path in your PHP files.

Issue 2: Database Connection Error
If you encounter an error connecting to the database:

text
Copy
Edit
Connection failed: Access denied for user 'root'@'localhost' (using password: YES)
Ensure that your MySQL server is running and that the credentials in php/db.php are correct.

Issue 3: Duplicate Client ID or Program Name
If you see an error message like:

text
Copy
Edit
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

php
Copy
Edit
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
When checking a password during login, use password_verify():

php
Copy
Edit
if (password_verify($password, $user['password'])) { ... }
Note: Ensure that the maximum length of the password adheres to the requirements in the screenshot provided.

markdown
Copy
Edit

### Instructions:
1. Replace the placeholder `insert-your-index-image-url-here` and `insert-your-register-image-url-here` with the actual URLs of your images.
2. Save this as `README.md` in your project repository.![index](https://github.com/user-attachments/assets/63f08ee0-28c2-487a-b8a9-808a6a0f2fb4)
![pss](https://github.com/user-attachments/assets/f5507956-2f69-4643-aacb-8bb49d86bb97)
![register](https://github.com/user-attachments/assets/7bcd1c3b-18f4-4544-95dd-4a0dc0366581)
