<?php
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client_id = mysqli_real_escape_string($conn, $_POST['client_id']);
    $program_id = mysqli_real_escape_string($conn, $_POST['program_id']);
    $enrolled_at = date('Y-m-d H:i:s');
    $query = "INSERT INTO enrollments (client_id, program_id, enrolled_at) VALUES ('$client_id', '$program_id', '$enrolled_at')";

    if (mysqli_query($conn, $query)) {
        header('Location: ../index.html');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
