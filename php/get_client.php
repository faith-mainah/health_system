<?php
include('../db.php');

if (isset($_GET['id'])) {
    $client_id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM clients WHERE id = '$client_id'";
    $result = mysqli_query($conn, $query);
    $client = mysqli_fetch_assoc($result);

    $program_query = "SELECT * FROM programs INNER JOIN client_programs ON programs.id = client_programs.program_id WHERE client_programs.client_id = '$client_id'";
    $program_result = mysqli_query($conn, $program_query);

    $programs = [];
    while ($program = mysqli_fetch_assoc($program_result)) {
        $programs[] = $program['program_name'];
    }

    $response = [
        'id' => $client['id'],
        'name' => $client['name'],
        'age' => $client['age'],
        'address' => $client['address'],
        'phone' => $client['phone'],
        'programs' => $programs
    ];

    echo json_encode($response);
} else {
    echo json_encode(['error' => 'Client not found']);
}
?>
