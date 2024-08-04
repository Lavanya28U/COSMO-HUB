<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Space Education</title>
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
        <h1>Add Space Education</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="type">Type:</label>
            <input type="text" id="type" name="type" required><br>

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br>

            <label for="published_date">Published Date:</label>
            <input type="date" id="published_date" name="published_date" required><br>

            <label for="level">Level:</label>
            <input type="text" id="level" name="level" required><br>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea><br>

            <label for="url">URL:</label>
            <input type="text" id="url" name="url" required><br>

            <label for="celestial_body_id">Celestial Body ID:</label>
            <input type="number" id="celestial_body_id" name="celestial_body_id" required><br>

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

        
        $stmt = $conn->prepare("INSERT INTO space_education (type, title, published_date, level, description, url, celestial_body_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $type, $title, $published_date, $level, $description, $url, $celestial_body_id);

        
        $type = $_POST['type'];
        $title = $_POST['title'];
        $published_date = $_POST['published_date'];
        $level = $_POST['level'];
        $description = $_POST['description'];
        $url = $_POST['url'];
        $celestial_body_id = $_POST['celestial_body_id'];

        $stmt->execute();

        echo "<p>Space education added successfully.</p>";

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
