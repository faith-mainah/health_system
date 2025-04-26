<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $registered_at = date('Y-m-d H:i:s');
    
    $query = "INSERT INTO clients (full_name, age, gender, phone, registered_at, address) 
              VALUES ('$name', '$age', '$gender', '$phone', '$registered_at', '$address')";
    
    if (mysqli_query($conn, $query)) {
        header('Location: ../index.html');
        exit();
    } else {
        echo "Error inserting client: " . mysqli_error($conn);
    }
}
?>
