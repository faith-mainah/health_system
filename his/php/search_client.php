<?php
include('../auth.php');
include('../db.php');

echo "<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f7fa;
    margin: 0;
    padding: 0;
}
.profile-container {
    max-width: 1000px;
    margin: 50px auto;
    background-color: #ffffff;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}
h1 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 40px;
    font-size: 2.5em;
    font-weight: bold;
    text-transform: uppercase;
}
.client-details {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
    margin-bottom: 30px;
}
.client-detail {
    background-color: #ecf0f1;
    border-radius: 10px;
    padding: 20px;
    font-size: 1.3em;
    color: #34495e;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.client-detail strong {
    color: #2980b9;
    font-weight: bold;
}
.program-list {
    margin: 30px 0;
    padding: 25px;
    background-color: #e1f5fe;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
}
.program-list h3 {
    text-align: center;
    color: #2980b9;
    margin-bottom: 15px;
    font-size: 1.8em;
    font-weight: bold;
}
.program-list ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}
.program-list li {
    background-color: #ffffff;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
    color: #34495e;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.program-list li:hover {
    background-color: #d5f0fe;
    cursor: pointer;
}
.message-box {
    background-color: #f8d7da;
    border-left: 5px solid #e74c3c;
    padding: 20px;
    border-radius: 10px;
    color: #e74c3c;
    font-weight: bold;
    margin-top: 40px;
    text-align: center;
}
.danger-icon {
    font-size: 48px;
    color: #e74c3c;
}
.message-info {
    background-color: #d4edda;
    border-left: 5px solid #28a745;
    padding: 20px;
    border-radius: 10px;
    color: #155724;
    font-weight: bold;
    margin-top: 40px;
    text-align: center;
}
</style>";

if (isset($_GET['search_query'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['search_query']);
    $query = "SELECT * FROM clients WHERE id = '$search_query'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $client_id = $row['id'];
            $client_name = $row['full_name'];
            $client_age = $row['age'];
            $client_phone = $row['phone'];
            $client_gender = $row['gender'];
            $client_address = $row['address'];

            $program_query = "
                SELECT DISTINCT programs.program_name
                FROM programs
                INNER JOIN enrollments ON programs.program_name = enrollments.program_name
                WHERE enrollments.client_id = '$client_id'";
            $program_result = mysqli_query($conn, $program_query);

            echo "<div class='profile-container'>";
            echo "<h1>Profile</h1>";
            echo "<div class='client-details'>";
            echo "<div class='client-detail'><strong>Client ID:</strong> " . htmlspecialchars($client_id) . "</div>";
            echo "<div class='client-detail'><strong>Name:</strong> " . htmlspecialchars($client_name) . "</div>";
            echo "<div class='client-detail'><strong>Age:</strong> " . htmlspecialchars($client_age) . "</div>";
            echo "<div class='client-detail'><strong>Phone:</strong> " . htmlspecialchars($client_phone) . "</div>";
            echo "<div class='client-detail'><strong>Gender:</strong> " . htmlspecialchars($client_gender) . "</div>";
            echo "<div class='client-detail'><strong>Address:</strong> " . htmlspecialchars($client_address) . "</div>";
            echo "</div>";
            echo "<div class='program-list'>";
            echo "<h3>Enrolled Programs</h3>";
            if (mysqli_num_rows($program_result) > 0) {
                echo "<ul>";
                while ($program = mysqli_fetch_assoc($program_result)) {
                    echo "<li>" . htmlspecialchars($program['program_name']) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p style='text-align:center;'>No programs enrolled.</p>";
            }
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='message-box'>
            <div class='danger-icon'>&#9888;</div>
            <p>No client found with that ID. Please check the ID and try again.</p>
        </div>";
    }
} else {
    echo "<div class='message-box'>
        <div class='danger-icon'>&#9888;</div>
        <p>Please enter a search query to find the client.</p>
    </div>";
}
?>
