<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['celestial_id'];
$name = $_POST['name'];
$type = $_POST['type'];
$mass = $_POST['mass'];
$size = $_POST['size'];
$composition = $_POST['composition'];
$orbital_parameters = $_POST['orbital_parameters'];

$stmt = $conn->prepare("UPDATE celestial_bodies SET name = ?, type = ?, mass = ?, size = ?, composition = ?, orbital_parameters = ? WHERE id = ?");
$stmt->bind_param("ssddssi", $name, $type, $mass, $size, $composition, $orbital_parameters, $id);

if ($stmt->execute()) {
    echo "Celestial body details updated successfully.";
} else {
    echo "Error updating celestial body details: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
