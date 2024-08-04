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
$launch_date = $_POST['launch_date'];
$purpose = $_POST['purpose'];
$orbital_type = $_POST['orbital_type'];
$orbital_period = $_POST['orbital_period'];
$launch_vehicle = $_POST['launch_vehicle'];
$mass = $_POST['mass'];
$celestial_body_id = $_POST['celestial_body_id'];

$stmt = $conn->prepare("UPDATE satellite SET launch_date=?, purpose=?, orbital_type=?, orbital_period=?, launch_vehicle=?, mass=?, celestial_body_id=? WHERE name=?");
$stmt->bind_param("ssssssis", $launch_date, $purpose, $orbital_type, $orbital_period, $launch_vehicle, $mass, $celestial_body_id, $name);

if ($stmt->execute()) {
    echo "Satellite details updated successfully";
} else {
    echo "Error updating satellite details: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
