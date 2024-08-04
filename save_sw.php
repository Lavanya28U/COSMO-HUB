<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$recordId = $_POST['w_id'];
$type = $_POST['type'];
$date = $_POST['date'];
$intensity = $_POST['intensity'];
$description = $_POST['description'];
$celestial_body_id = $_POST['celestial_body_id'];

$stmt = $conn->prepare("UPDATE space_weather SET type=?, date=?, intensity=?, description=?, celestial_body_id=? WHERE w_id=?");
$stmt->bind_param("ssssii", $type, $date, $intensity, $description, $celestial_body_id, $recordId);

if ($stmt->execute()) {
    echo "Space weather record details updated successfully";
} else {
    echo "Error updating space weather record details: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
