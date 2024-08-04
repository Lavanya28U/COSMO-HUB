<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$mass = $_POST['mass'];
$size = $_POST['size'];
$composition = $_POST['composition'];
$orbital_details = $_POST['orbital_details'];
$description = $_POST['description'];

$stmt = $conn->prepare("UPDATE asteroids_meteors SET mass=?, size=?, composition=?, orbital_details=?, description=? WHERE name=?");
$stmt->bind_param("ddssss", $mass, $size, $composition, $orbital_details, $description, $name);

if ($stmt->execute()) {
    echo "Asteroid or meteor details updated successfully";
} else {
    echo "Error updating asteroid or meteor details: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
