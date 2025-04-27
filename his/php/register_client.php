<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../auth.php');

include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $client_id = mysqli_real_escape_string($conn, $_POST['client_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $registered_at = date('Y-m-d H:i:s');

    // Check if the client_id already exists
    $check_query = "SELECT * FROM clients WHERE id = '$client_id'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // If client_id exists, show error and stop further execution
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Error - Client ID Already Exists</title>
            <style>
                body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
                .error-container { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 20px; border-radius: 5px; width: 80%; max-width: 600px; text-align: center; }
                .error-container h2 { margin: 0 0 10px; }
                .error-container p { margin: 10px 0; }
            </style>
        </head>
        <body>
            <div class='error-container'>
                <h2>Error: Client ID already exists!</h2>
                <p>Please choose a different Client ID.</p>
            </div>
        </body>
        </html>";
        exit();
    }

    // Check if the phone number already exists
    $phone_check_query = "SELECT * FROM clients WHERE phone = '$phone'";
    $phone_check_result = mysqli_query($conn, $phone_check_query);

    if (mysqli_num_rows($phone_check_result) > 0) {
        // If phone number exists, show error and stop further execution
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Error - Phone Number Already Exists</title>
            <style>
                body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
                .error-container { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 20px; border-radius: 5px; width: 80%; max-width: 600px; text-align: center; }
                .error-container h2 { margin: 0 0 10px; }
                .error-container p { margin: 10px 0; }
            </style>
        </head>
        <body>
            <div class='error-container'>
                <h2>Error: Phone number already exists!</h2>
                <p>Please choose a different phone number.</p>
            </div>
        </body>
        </html>";
        exit();
    }

    // Insert the new client record
    $query = "INSERT INTO clients (id, full_name, age, gender, phone, registered_at, address) 
              VALUES ('$client_id', '$name', '$age', '$gender', '$phone', '$registered_at', '$address')";

    if (mysqli_query($conn, $query)) {
        // Redirect to the home page after successful registration
        header('Location: ../index.html');
        exit();
    } else {
        // If there's an error during insertion
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Error - Database Issue</title>
            <style>
                body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
                .error-container { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 20px; border-radius: 5px; width: 80%; max-width: 600px; text-align: center; }
                .error-container h2 { margin: 0 0 10px; }
                .error-container p { margin: 10px 0; }
            </style>
        </head>
        <body>
            <div class='error-container'>
                <h2>Error: Unable to insert client into the database.</h2>
                <p>Please try again later or contact support.</p>
            </div>
        </body>
        </html>";
        exit();
    }
}
?>
