<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Space Education Content</title>
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
        input[type="date"] {
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
            width: 100%;
            height: 100px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
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
    <h1>Add Space Education Content</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="type">Content Type:</label>
        <input type="text" id="type" name="type" required>
        
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        
        <label for="published_date">Published Date:</label>
        <input type="date" id="published_date" name="published_date" required>
        
        <label for="level">Education Level:</label>
        <input type="text" id="level" name="level" required>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
        
        <label for="url">URL:</label>
        <input type="text" id="url" name="url" required>
        
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
    
        $stmt = $conn->prepare("INSERT INTO space_education (type, title, published_date, level, description, url, celestial_body_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $type, $title, $published_date, $level, $description, $url, $celestial_body_id);

        
        $type = $_POST['type'];
        $title = $_POST['title'];
        $published_date = $_POST['published_date'];
        $level = $_POST['level'];
        $description = $_POST['description'];
        $url = $_POST['url'];
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
            document.getElementById("title").value = "";
            document.getElementById("published_date").value = "";
            document.getElementById("level").value = "";
            document.getElementById("description").value = "";
            document.getElementById("url").value = "";
            document.getElementById("celestial_body_id").value = "";
        }
    </script>
</body>
</html>
