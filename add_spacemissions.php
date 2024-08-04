<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Space Mission</title>
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
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
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
    <h1>Add Space Mission</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="name">Mission Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="launch_date">Launch Date:</label>
        <input type="date" id="launch_date" name="launch_date" required>
        
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date">
        
        <label for="objective">Objective:</label>
        <textarea id="objective" name="objective"></textarea>
        
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination">
        
        <label for="spacecraft">Spacecraft:</label>
        <input type="text" id="spacecraft" name="spacecraft">
        
        <label for="type">Mission Type:</label>
        <input type="text" id="type" name="type">
        
        <label for="outcome">Outcome:</label>
        <input type="text" id="outcome" name="outcome">
        
        <label for="details">Details:</label>
        <textarea id="details" name="details"></textarea>
        
        <label for="celestial_body_id">Celestial Body:</label>
        <select id="celestial_body_id" name="celestial_body_id">
            <?php
            
                include 'dbc.php';

                
                $sql = "SELECT id, name FROM celestial_bodies";
                $result = $conn->query($sql);

                
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No celestial bodies found</option>";
                }

                
                $conn->close();
            ?>
        </select>
        
        <input type="submit" value="Submit">
        <input type="button" value="Clear" onclick="clearForm()">
    </form>

    <?php
    
    include 'dbc.php';

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $stmt = $conn->prepare("INSERT INTO space_missions (name, launch_date, end_date, objective, destination, space_craft, type, outcome, details, celestial_body_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssi", $name, $launch_date, $end_date, $objective, $destination, $spacecraft, $type, $outcome, $details, $celestial_body_id);

        
        $name = $_POST['name'];
        $launch_date = $_POST['launch_date'];
        $end_date = $_POST['end_date'];
        $objective = $_POST['objective'];
        $destination = $_POST['destination'];
        $spacecraft = $_POST['spacecraft'];
        $type = $_POST['type'];
        $outcome = $_POST['outcome'];
        $details = $_POST['details'];
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
            document.getElementById("end_date").value = "";
            document.getElementById("objective").value = "";
            document.getElementById("destination").value = "";
            document.getElementById("spacecraft").value = "";
            document.getElementById("type").value = "";
            document.getElementById("outcome").value = "";
            document.getElementById("details").value = "";
            document.getElementById("celestial_body_id").value = "";
        }
    </script>
</body>
</html>
