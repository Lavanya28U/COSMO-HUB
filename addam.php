<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Asteroids and Meteors</title>
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
        }
        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url('data:image/svg+xml;utf8,<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M6 9l6 6 6-6H6z"/></svg>') no-repeat right 10px center/12px;
            padding-right: 40px;
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
    <h1>Add Asteroids and Meteors</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="celestial_body">Celestial Body:</label><br>
        <select id="celestial_body" name="celestial_body">
            <?php
            include 'dbc.php';

           
            $sql = "SELECT id, name FROM celestial_bodies where type like 'asteroid' or type like 'meteorite'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
            } else {
                echo "<option value=''>No celestial bodies found</option>";
            }
            $conn->close();
            ?>
        </select><br>

        
      
        
        <label for="mass">Mass:</label><br>
        <input type="number" id="mass" name="mass"><br>
        
        <label for="size">Size:</label><br>
        <input type="number" id="size" name="size"><br>
        
        <label for="composition">Composition:</label><br>
        <input type="text" id="composition" name="composition"><br>
        
        <label for="orbital_details">Orbital Details:</label><br>
        <textarea id="text" name="orbital_details"></textarea><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>
        
        <input type="submit" value="Submit">
        <input type="button" value="Clear" onclick="clearForm()">
    </form>

    <?php
    
    include 'dbc.php';

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $stmt = $conn->prepare("INSERT INTO asteroids_meteors (id,name, mass, size, composition, description,orbital_details) VALUES (?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("isddsss", $celestial_body_id, $celestial_body_name, $mass, $size, $composition, $description,$orbital_details);

        
        $celestial_body_id = $_POST['celestial_body'];
        $mass = $_POST['mass'];
        $size = $_POST['size'];
        $composition = $_POST['composition'];
        $description = $_POST['description'];
        $orbital_details=$_POST['orbital_details'];

       
        $sql = "SELECT name FROM celestial_bodies WHERE id = ?";
        $stmt_name = $conn->prepare($sql);
        $stmt_name->bind_param("i", $celestial_body_id);
        $stmt_name->execute();
        $stmt_name->bind_result($celestial_body_name);
        $stmt_name->fetch();
        $stmt_name->close();

        
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
            document.getElementById("celestial_body").selectedIndex = 0;
            document.getElementById("mass").value = "";
            document.getElementById("size").value = "";
            document.getElementById("composition").value = "";
            document.getElementById("description").value = "";
            document.getElementById("orbital_details").value = "";
        }
    </script>
</body>
</html>
