<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Space Mission</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #45a049;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Space Mission</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Mission Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="launch_date">Launch Date:</label>
            <input type="date" id="launch_date" name="launch_date"><br>

            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date"><br>

            <label for="objective">Objective:</label>
            <input type="text" id="objective" name="objective"><br>

            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination"><br>

            <label for="space_craft">Spacecraft:</label>
            <input type="text" id="space_craft" name="space_craft"><br>

            <label for="type">Type:</label>
            <input type="text" id="type" name="type"><br>

            <label for="outcome">Outcome:</label>
            <input type="text" id="outcome" name="outcome"><br>

            <label for="details">Details:</label>
            <textarea id="details" name="details" rows="4"></textarea><br>

            <label for="satellite_id">Satellite ID:</label>
            <input type="number" id="satellite_id" name="satellite_id"><br>

            <label for="celestial_body_id">Celestial Body ID:</label>
            <input type="number" id="celestial_body_id" name="celestial_body_id"><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "zZ@3Wnd4";
        $database = "space_dbms";

        
        $conn = new mysqli($servername, $username, $password, $database);

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $stmt = $conn->prepare("INSERT INTO space_missions (name, launch_date, end_date, objective, destination, space_craft, type, outcome, details, satellite_id, celestial_body_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $name, $launch_date, $end_date, $objective, $destination, $space_craft, $type, $outcome, $details, $satellite_id, $celestial_body_id);

        
        $name = $_POST['name'];
        $launch_date = $_POST['launch_date'];
        $end_date = $_POST['end_date'];
        $objective = $_POST['objective'];
        $destination = $_POST['destination'];
        $space_craft = $_POST['space_craft'];
        $type = $_POST['type'];
        $outcome = $_POST['outcome'];
        $details = $_POST['details'];
        $satellite_id = $_POST['satellite_id'];
        $celestial_body_id = $_POST['celestial_body_id'];

        $stmt->execute();

        echo "<p>Space mission added successfully.</p>";

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
