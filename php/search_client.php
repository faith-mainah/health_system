<?php
include('../db.php');

if (isset($_GET['search_query'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['search_query']);
    $query = "SELECT * FROM clients WHERE full_name LIKE '%$search_query%'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $client_id = $row['id'];
            $client_name = $row['full_name'];
            $program_query = "
                SELECT programs.program_name
                FROM programs
                INNER JOIN enrollments ON programs.program_id = enrollments.program_id
                WHERE enrollments.client_id = '$client_id'
            ";
            $program_result = mysqli_query($conn, $program_query);

            echo "<p><a href='client_profile.php?id=" . $client_id . "'>" . htmlspecialchars($client_name) . "</a>";

            if (mysqli_num_rows($program_result) > 0) {
                echo "<br><strong>Enrolled in Programs:</strong><ul>";
                while ($program = mysqli_fetch_assoc($program_result)) {
                    echo "<li>" . htmlspecialchars($program['program_name']) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<br><strong>No programs enrolled.</strong>";
            }

            echo "</p>";
        }
    } else {
        echo "<p>No clients found with that name.</p>";
    }
} else {
    echo "<p>Please enter a search query.</p>";
}
?>
