<?php
include('../auth.php');

include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client_id = mysqli_real_escape_string($conn, $_POST['client_id']);
    $program_name = mysqli_real_escape_string($conn, $_POST['program_name']);
    $enrolled_at = date('Y-m-d H:i:s');
    $client_query = "SELECT full_name FROM clients WHERE id = '$client_id'";
    $client_result = mysqli_query($conn, $client_query);
    $program_query = "SELECT program_id FROM programs WHERE program_name = '$program_name'";
    $program_result = mysqli_query($conn, $program_query);

    if (mysqli_num_rows($client_result) > 0 && mysqli_num_rows($program_result) > 0) {
        $client_row = mysqli_fetch_assoc($client_result);
        $program_row = mysqli_fetch_assoc($program_result);
        $client_name = $client_row['full_name'];
        $program_id = $program_row['program_id'];
        $query = "INSERT INTO enrollments (client_id, client_name, program_id, program_name, enrolled_at) 
                  VALUES ('$client_id', '$client_name', '$program_id', '$program_name', '$enrolled_at')";
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
                    .error-icon { font-size: 48px; color: #721c24; }
                </style>
            </head>
            <body>
                <div class='error-container'>
                    <div class='error-icon'>&#9888;</div>
                    <h2>Error: Unable to enroll client.</h2>
                    <p>There was an issue while enrolling the client to the program. Please try again later.</p>
                </div>
            </body>
            </html>";
            exit();
        }
    } else {
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Error - Client or Program Not Found</title>
            <style>
                body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
                .error-container { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 20px; border-radius: 5px; width: 80%; max-width: 600px; text-align: center; }
                .error-container h2 { margin: 0 0 10px; }
                .error-container p { margin: 10px 0; }
                .error-icon { font-size: 48px; color: #721c24; }
            </style>
        </head>
        <body>
            <div class='error-container'>
                <div class='error-icon'>&#9888;</div>
                <h2>Error: Client or Program Not Found!</h2>
                <p>Please check the details and try again.</p>
            </div>
        </body>
        </html>";
        exit();
    }
}
?>
