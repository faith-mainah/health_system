<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Programs</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            height: 100vh;
            background-color: #f4f4f4;
            overflow-y: auto; /* Make the whole page scrollable */
        }

        .programs-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            justify-items: center;
        }

        .program-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 250px;
        }

        .program-id {
            font-weight: bold;
            color: #2980b9;
            margin-bottom: 10px;
        }

        .program-name {
            font-weight: bold;
            color: #8e44ad;
        }
    </style>
</head>
<body>

    <div class="programs-container">
        <?php
            include('db.php');
            include('config.php');

            $query = "SELECT MIN(program_id) AS program_id, program_name FROM programs GROUP BY program_name ORDER BY program_id ASC";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die('Error fetching programs: ' . mysqli_error($conn));
            }

            while ($row = mysqli_fetch_assoc($result)):
        ?>
            <div class="program-card">
                <div class="program-id">
                    Program ID: <?php echo htmlspecialchars($row['program_id']); ?>
                </div>
                <div class="program-name">
                    Program Name: <?php echo htmlspecialchars($row['program_name']); ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

</body>
</html>
