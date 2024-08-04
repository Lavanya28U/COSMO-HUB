<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = "zZ@3Wnd4"; // Replace with your MySQL password
$dbname = "space_dbms"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$type = $_POST['type'];
$mass = $_POST['mass'];
$size = $_POST['size'];
$composition = $_POST['composition'];
$orbital_parameters = $_POST['orbital_parameters'];

$stmt = $conn->prepare("INSERT INTO celestial_bodies (name, type, mass, size, composition, orbital_parameters) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssddss", $name, $type, $mass, $size, $composition, $orbital_parameters);

if ($stmt->execute() === TRUE) {
    
    $celestial_body_id = $stmt->insert_id;

    
    switch ($type) {
        case "comet":
            header("Location: addcomet1.php?id=$celestial_body_id&name=$name");
            break;
        case "galaxy":
            header("Location: addg.php?id=$celestial_body_id&name=$name");
            break;
        case "asteroid":
        case "meteorite":
            header("Location: addam.php?id=$celestial_body_id&name=$name");
            break;
        case "black hole":
            header("Location: ab.php?id=$celestial_body_id&name=$name");
            break;
        default:
            
            break;
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>