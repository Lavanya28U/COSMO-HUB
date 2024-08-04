<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Space Weather</title>
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
    <h1>Add Space Weather</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="type">Type:</label>
        <input type="text" id="type" name="type" required>
        
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
        
        <label for="intensity">Intensity:</label>
        <select id="intensity" name="intensity">
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
        
        <input type="submit" value="Submit">
        <input type="button" value="Clear" onclick="clearForm()">
    </form>

    <?php
    
    include 'dbc.php';

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $stmt = $conn->prepare("INSERT INTO space_weather (type, date, intensity, description) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $type, $date, $intensity, $description);

        
        $type = $_POST['type'];
        $date = $_POST['date'];
        $intensity = $_POST['intensity'];
        $description = $_POST['description'];

        
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
            document.getElementById("intensity").value = "";
            document.getElementById("description").value = "";
        }
    </script>
</body>
</html>
