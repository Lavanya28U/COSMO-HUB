<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Astronomical Event</title>
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
    <h1>Add Astronomical Event</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="type">Type:</label>
        <input type="text" id="type" name="type" required>
        
        <label for="date">Date:</label>
        <input type="date" id="date" name="date">
        
        <label for="location">Location:</label>
        <input type="text" id="location" name="location">
        
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
        
        <label for="celestial_body_id">Celestial Body:</label>
        <select id="celestial_body_id" name="celestial_body_id">
            <?php
            
            include 'dbc.php';

            
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
        
        $stmt = $conn->prepare("INSERT INTO astronomical_events (type, date, location, description, celestial_body_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $type, $date, $location, $description, $celestial_body_id);

        
        $type = $_POST['type'];
        $date = $_POST['date'];
        $location = $_POST['location'];
        $description = $_POST['description'];
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
            document.getElementById("type").value = "";
            document.getElementById("date").value = "";
            document.getElementById("location").value = "";
            document.getElementById("description").value = "";
        }
    </script>
</body>
</html>
