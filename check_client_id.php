<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../db.php');

$data = json_decode(file_get_contents("php://input"), true);
$client_id = mysqli_real_escape_string($conn, $data['client_id']);

$query = "SELECT * FROM clients WHERE id = '$client_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo json_encode(['exists' => true]);
} else {
    echo json_encode(['exists' => false]);
}
?>
