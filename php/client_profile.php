<?php
include('../db.php');
if (isset($_GET['id'])) {
    $client_id = intval($_GET['id']);
    $query = "SELECT * FROM clients WHERE id = '$client_id'";
    $result = mysqli_query($conn, $query);
    $client = mysqli_fetch_assoc($result);
    $program_query = "SELECT programs.program_name FROM programs INNER JOIN enrollments ON programs.program_id = enrollments.program_id WHERE enrollments.client_id = '$client_id'";
    $program_result = mysqli_query($conn, $program_query);
} else {
    echo "<p>Client not found!</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f9; color: #333;}
        header {background-color: #007bff; color: white; padding: 20px; text-align: center;}
        .container {width: 80%; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-top: 20px;}
        h2 {color: #007bff; margin-bottom: 10px;}
        p {font-size: 16px; line-height: 1.5;}
        .programs {margin-top: 20px; padding: 10px; background-color: #f9f9f9; border-radius: 5px;}
        .programs ul {list-style-type: none; padding: 0;}
        .programs li {padding: 5px; background-color: #e9ecef; margin: 5px 0; border-radius: 4px;}
        footer {background-color: #333; color: white; text-align: center; padding: 15px; position: fixed; width: 100%; bottom: 0;}
        a {color: #007bff; text-decoration: none;}
        a:hover {text-decoration: underline;}
    </style>
</head>
<body>
    <header>
        <h1>Client Profile: <?php echo htmlspecialchars($client['full_name']); ?></h1>
    </header>
    <div class="container">
        <h2>Client Information</h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($client['full_name']); ?></p>
        <p><strong>Age:</strong> <?php echo htmlspecialchars($client['age']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($client['address']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($client['phone']); ?></p>
        <div class="programs">
            <h2>Enrolled Programs</h2>
            <ul>
                <?php 
                if (mysqli_num_rows($program_result) > 0) {
                    while ($program = mysqli_fetch_assoc($program_result)) { 
                        echo "<li>" . htmlspecialchars($program['program_name']) . "</li>";
                    }
                } else {
                    echo "<p>This client is not enrolled in any programs yet.</p>";
                }
                ?>
            </ul>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Health Info System</p>
    </footer>
</body>
</html>
