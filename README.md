<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Information System (HIS) - README</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 30px;
        }
        h1, h2 {
            color: #2980b9;
        }
        h3 {
            margin-top: 20px;
        }
        ul {
            list-style: none;
            padding-left: 0;
        }
        pre {
            background-color: #f7f7f7;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-family: monospace;
        }
        .note {
            color: #e74c3c;
            font-weight: bold;
        }
        .step-title {
            font-weight: bold;
        }
        .screenshot {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Health Information System (HIS) - README</h1>

        <h2>Overview</h2>
        <p>The <strong>Health Information System (HIS)</strong> is a web-based application designed to manage client health information, including enrollment in health programs. The system is developed using <strong>PHP</strong>, <strong>HTML</strong>, <strong>CSS</strong>, <strong>JavaScript</strong>, and utilizes <strong>MySQL</strong> as the database.</p>

        <h2>Prerequisites</h2>
        <p>Before setting up the project, make sure you have the following installed on your machine:</p>
        <ul>
            <li><strong>XAMPP</strong> (or <strong>WAMP</strong>)</li>
            <li><strong>Web Browser</strong> (Google Chrome, Firefox, etc.)</li>
            <li><strong>Text Editor or IDE</strong> (VS Code, Sublime Text, etc.)</li>
        </ul>

        <h3>Steps to Install and Run the Project</h3>

        <div class="step-title">1. Install XAMPP</div>
        <ul>
            <li>Download <strong>XAMPP</strong> from the official site: <a href="https://www.apachefriends.org/index.html" target="_blank">XAMPP</a>.</li>
            <li>Follow the installation instructions for your operating system (Windows, macOS, or Linux).</li>
            <li>After installation, open the <strong>XAMPP Control Panel</strong>.</li>
        </ul>

        <div class="step-title">2. Set up XAMPP</div>
        <ul>
            <li>In the XAMPP Control Panel, start the following services:
                <ul>
                    <li><strong>Apache</strong> (for the web server)</li>
                    <li><strong>MySQL</strong> (for the database)</li>
                </ul>
            </li>
        </ul>

        <div class="step-title">3. Download and Set up the Project</div>
        <pre>git clone https://github.com/your-username/health-information-system.git</pre>
        <p>Place the entire project folder (health-information-system) inside the htdocs folder of your XAMPP installation.</p>
        <pre>C:\xampp\htdocs\HIS</pre>
        <p>Rename the folder to HIS for convenience.</p>

        <div class="step-title">4. Create a Database</div>
        <p>Open your web browser and navigate to <a href="http://localhost/phpmyadmin/" target="_blank">phpMyAdmin</a>.</p>
        <ul>
            <li>Create a new database named <strong>his_database</strong>.</li>
            <li>Import the <strong>his_schema.sql</strong> file from the project into this database (if it exists).</li>
            <li>If the <strong>his_schema.sql</strong> file is missing, create the necessary tables manually.</li>
        </ul>

        <div class="step-title">5. Configure Database Connection</div>
        <pre>&lt;?php
$servername = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";      // Default password for XAMPP is empty
$dbname = "his_database";  // The name of the database you created

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?&gt;</pre>

        <h3>Hosting the Application Locally</h3>
        <p>To host the Health Information System (HIS) on your local machine using XAMPP:</p>
        <ul>
            <li>Ensure Apache and MySQL are running in the XAMPP Control Panel.</li>
            <li>Access the application by typing <strong>http://localhost/HIS/index.html</strong> in your browser.</li>
            <li>Test the application by logging in or registering a client to ensure everything works.</li>
        </ul>

        <h3>Common Issues and Troubleshooting</h3>
        <p><strong>Issue 1:</strong> Missing <strong>auth.php</strong> File</p>
        <pre>Warning: include(auth.php): Failed to open stream: No such file or directory</pre>
        <p>Ensure that the file <strong>auth.php</strong> exists and is correctly included in your PHP files.</p>

        <p><strong>Issue 2:</strong> Database Connection Error</p>
        <pre>Connection failed: Access denied for user 'root'@'localhost' (using password: YES)</pre>
        <p>Ensure that your MySQL server is running and that the credentials in <strong>php/db.php</strong> are correct.</p>

        <p><strong>Issue 3:</strong> Duplicate Client ID or Program Name</p>
        <pre>Error: Client ID already exists! Please choose a different Client ID.</pre>
        <p>Ensure that the Client ID or Program Name you're trying to register is unique. The system does not allow duplicates.</p>

        <h3>Updating the Project</h3>
        <p>To update the project, simply make changes to your files in the HIS folder. If you modify the database schema, update the database as well.</p>

        <h3>Contributing</h3>
        <p>We welcome contributions to improve the Health Information System!</p>
        <ul>
            <li>Fork the repository.</li>
            <li>Create a new branch (<code>git checkout -b feature/your-feature</code>).</li>
            <li>Commit your changes (<code>git commit -am 'Add new feature'</code>).</li>
            <li>Push to the branch (<code>git push origin feature/your-feature</code>).</li>
            <li>Create a new Pull Request.</li>
        </ul>

        <h3>Password Hashing</h3>
        <p>For secure password storage, use <code>password_hash()</code> when registering a new user:</p>
        <pre>$hashed_password = password_hash($password, PASSWORD_DEFAULT);</pre>
        <p>When checking a password during login, use <code>password_verify()</code>:</p>
        <pre>if (password_verify($password, $user['password'])) { ... }</pre>
        <p><span class="note">Note: Ensure that the maximum length of the password adheres to the requirements in the screenshot provided.</span></p>
    </div>

</body>
</html>
![pss](https://github.com/user-attachments/assets/64e6b679-0250-496d-a2ab-b4e21cf0ebc4)
