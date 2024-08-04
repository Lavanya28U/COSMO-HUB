<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Space Organization</title>
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
    <h1>Add Space Organization</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="name">Organization Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="country">Country:</label>
        <input type="text" id="country" name="country">
        
        <label for="established_date">Established Date:</label>
        <input type="date" id="established_date" name="established_date">
        
        <label for="partnership">Partnership:</label>
        <textarea id="partnership" name="partnership"></textarea>
        
        <label for="projects">Projects:</label>
        <input type="number" id="projects" name="projects" required>
        
        <label for="satellite_id">Satellite:</label>
        <select id="satellite_id" name="satellite_id">
            <?php
                
                include 'dbc.php';

                
                $sql = "SELECT s_id, name FROM satellite";
                $result = $conn->query($sql);

               
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["s_id"] . "'>" . $row["name"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No satellites found</option>";
                }

                
                $conn->close();
            ?>
        </select>
        
        <label for="url">URL:</label>
        <input type="text" id="url" name="url" required>
        
        <input type="submit" value="Submit">
        <input type="button" value="Clear" onclick="clearForm()">
    </form>

    <?php
    
    include 'dbc.php';

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $stmt = $conn->prepare("INSERT INTO space_organisation (name, country, established_date, partnership, projects, satellite_id, url) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiss", $name, $country, $established_date, $partnership, $projects, $satellite_id, $url);

       
        $name = $_POST['name'];
        $country = $_POST['country'];
        $established_date = $_POST['established_date'];
        $partnership = $_POST['partnership'];
        $projects = $_POST['projects'];
        $satellite_id = $_POST['satellite_id'];
        $url = $_POST['url'];

        
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
            document.getElementById("country").value = "";
            document.getElementById("established_date").value = "";
            document.getElementById("partnership").value = "";
            document.getElementById("projects").value = "";
            document.getElementById("satellite_id").value = "";
            document.getElementById("url").value = "";
        }
    </script>
</body>
</html>
