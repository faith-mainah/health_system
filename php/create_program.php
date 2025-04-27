<?php
include('../auth.php');

include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $program_name = mysqli_real_escape_string($conn, $_POST['program_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $check_query = "SELECT * FROM programs WHERE program_name = '$program_name'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Error - Program Already Exists</title>
            <style>
                body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
                .error-container { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 20px; border-radius: 5px; width: 80%; max-width: 600px; text-align: center; }
                .error-container h2 { margin: 0 0 10px; }
                .error-container p { margin: 10px 0; }
                .error-container a { color: #004085; text-decoration: none; font-weight: bold; }
                .error-container a:hover { text-decoration: underline; }
            </style>
        </head>
        <body>
            <div class='error-container'>
                <h2>Error: Program with this name already exists!</h2>
                <p>Please go back and try again with a different program name.</p>
                <p><a href='../create_program.html'>Try Again</a></p>
            </div>
        </body>
        </html>";
        exit();
    } else {
        $query = "INSERT INTO programs (program_name, description) VALUES ('$program_name', '$description')";
        if (mysqli_query($conn, $query)) {
            header('Location: ../index.html');
            exit();
        } else {
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
                    .error-container a { color: #004085; text-decoration: none; font-weight: bold; }
                    .error-container a:hover { text-decoration: underline; }
                </style>
            </head>
            <body>
                <div class='error-container'>
                    <h2>Error: Unable to insert the program into the database.</h2>
                    <p>Please try again later or contact support.</p>
                    <p><a href='../create_program.html'>Try Again</a></p>
                </div>
            </body>
            </html>";
            exit();
        }
    }
}
?>
