<?php
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $program_name = mysqli_real_escape_string($conn, $_POST['program_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $query = "INSERT INTO programs (program_name, description) VALUES ('$program_name', '$description')";

    if (mysqli_query($conn, $query)) {
        header('Location: ../index.html');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
