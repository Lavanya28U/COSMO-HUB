<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$eventId = $_POST['event_id'];
$type = $_POST['type'];
$date = $_POST['date'];
$location = $_POST['location'];
$description = $_POST['description'];
$celestial_body_id = $_POST['celestial_body_id'];


$stmt = $conn->prepare("UPDATE astronomical_events SET type=?, date=?, location=?, description=?, celestial_body_id=? WHERE event_id=?");
$stmt->bind_param("ssssii", $type, $date, $location, $description, $celestial_body_id, $eventId);

if ($stmt->execute()) {
    echo "Astronomical event details updated successfully";
} else {
    echo "Error updating astronomical event details: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
