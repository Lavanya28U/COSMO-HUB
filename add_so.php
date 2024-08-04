<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Space Organization</title>
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
        input[type="number"],
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
        <h1>Add Space Organization</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="country">Country:</label>
            <input type="text" id="country" name="country"><br>

            <label for="established_date">Established Date:</label>
            <input type="date" id="established_date" name="established_date"><br>

            <label for="partnership">Partnership:</label>
            <input type="text" id="partnership" name="partnership"><br>

            <label for="projects">Projects:</label>
            <input type="number" id="projects" name="projects" required><br>

            <label for="satellite_id">Satellite ID:</label>
            <input type="number" id="satellite_id" name="satellite_id"><br>

            <label for="url">URL:</label>
            <input type="text" id="url" name="url" required><br>

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

        
        $stmt = $conn->prepare("INSERT INTO space_organisation (name, country, established_date, partnership, projects, satellite_id, url) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiss", $name, $country, $established_date, $partnership, $projects, $satellite_id, $url);

        
        $name = $_POST['name'];
        $country = $_POST['country'];
        $established_date = $_POST['established_date'];
        $partnership = $_POST['partnership'];
        $projects = $_POST['projects'];
        $satellite_id = $_POST['satellite_id'];
        $url = $_POST['url'];

        $stmt->execute();

        echo "<p>Space organization added successfully.</p>";

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
