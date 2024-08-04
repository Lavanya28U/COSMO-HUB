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
$type = $_POST['type'];
$size = $_POST['size'];
$description = $_POST['description'];

$stmt = $conn->prepare("UPDATE galaxies SET type=?, size=?, description=? WHERE name=?");
$stmt->bind_param("sdss", $type, $size, $description, $name);

if ($stmt->execute()) {
    echo "Galaxy details updated successfully";
} else {
    echo "Error updating galaxy details: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
