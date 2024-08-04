<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Satellite</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"],
        input[type="button"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Add Satellite</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="launch_date">Launch Date:</label>
        <input type="date" id="launch_date" name="launch_date">
        
        <label for="purpose">Purpose:</label>
        <textarea id="purpose" name="purpose"></textarea>
        
        <label for="orbital_type">Orbital Type:</label>
        <textarea id="orbital_type" name="orbital_type"></textarea>
        
        <label for="orbital_period">Orbital Period:</label>
        <textarea id="orbital_period" name="orbital_period"></textarea>
        
        <label for="launch_vehicle">Launch Vehicle:</label>
        <textarea id="launch_vehicle" name="launch_vehicle"></textarea>
        
        <label for="mass">Mass:</label>
        <textarea id="mass" name="mass"></textarea>
        
        <label for="celestial_body_id">Celestial Body:</label>
        <select id="celestial_body_id" name="celestial_body_id">
            <?php
            // Include database connection
            include 'dbc.php';

            // Fetch existing celestial bodies
            $sql = "SELECT id, name FROM celestial_bodies";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
            }
            ?>
        </select>
        
        <input type="submit" value="Submit">
        <input type="button" value="Clear" onclick="clearForm()">
    </form>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $stmt = $conn->prepare("INSERT INTO satellite (name, launch_date, purpose, orbital_type, orbital_period, launch_vehicle, mass, celestial_body_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssi", $name, $launch_date, $purpose, $orbital_type, $orbital_period, $launch_vehicle, $mass, $celestial_body_id);

        
        $name = $_POST['name'];
        $launch_date = $_POST['launch_date'];
        $purpose = $_POST['purpose'];
        $orbital_type = $_POST['orbital_type'];
        $orbital_period = $_POST['orbital_period'];
        $launch_vehicle = $_POST['launch_vehicle'];
        $mass = $_POST['mass'];
        $celestial_body_id = $_POST['celestial_body_id'];

        if ($stmt->execute()) {
            echo "<p>Data inserted successfully.</p>";
        } else {
            echo "<p>Error inserting data: " . $conn->error . "</p>";
        }

        
        $stmt->close();
    }


    $conn->close();
    ?>

    <script>
        function clearForm() {
            document.getElementById("name").value = "";
            document.getElementById("launch_date").value = "";
            document.getElementById("purpose").value = "";
            document.getElementById("orbital_type").value = "";
            document.getElementById("orbital_period").value = "";
            document.getElementById("launch_vehicle").value = "";
            document.getElementById("mass").value = "";
        }
    </script>
</body>
</html>
