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
$spectral_class = $_POST['spectral_class'];
$description = $_POST['description'];

$stmt = $conn->prepare("UPDATE black_holes SET mass=?, size=?, spectral_class=?, description=? WHERE name=?");
$stmt->bind_param("ddsss", $mass, $size, $spectral_class, $description, $name);

if ($stmt->execute()) {
    echo "Black hole details updated successfully";
} else {
    echo "Error updating black hole details: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
