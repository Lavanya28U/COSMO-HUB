<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserted Satellite Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "zZ@3Wnd4";
    $dbname = "space_dbms";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // If form is submitted, save the data
        $name = $_POST['satellite_name'];
        $launch_date = $_POST['launch_date'];
        $purpose = $_POST['purpose'];
        $orbital_type = $_POST['orbital_type'];
        $orbital_period = $_POST['orbital_period'];
        $launch_vehicle = $_POST['launch_vehicle'];
        $mass = $_POST['satellite_mass'];
        $celestial_body_id = $_POST['celestial_body_id'];

        $stmt = $conn->prepare("CALL InsertSatellite(?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssi", $name, $launch_date, $purpose, $orbital_type, $orbital_period, $launch_vehicle, $mass, $celestial_body_id);
        $stmt->execute();
        $stmt->close();
    }

    // Retrieve and display saved data
    $sql = "SELECT * FROM satellite"; // Change 'your_table_name' to your actual table name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Saved Satellite Data</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Launch Date</th><th>Purpose</th><th>Orbital Type</th><th>Orbital Period</th><th>Launch Vehicle</th><th>Mass</th><th>Celestial Body ID</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['s_id']}</td><td>{$row['name']}</td><td>{$row['launch_date']}</td><td>{$row['purpose']}</td><td>{$row['orbital_type']}</td><td>{$row['orbital_period']}</td><td>{$row['launch_vehicle']}</td><td>{$row['mass']}</td><td>{$row['celestial_body_id']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No data available.";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
