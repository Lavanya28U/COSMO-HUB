<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$missionId = $_POST['mission_id'];
$name = $_POST['name'];
$launch_date = $_POST['launch_date'];
$end_date = $_POST['end_date'];
$objective = $_POST['objective'];
$destination = $_POST['destination'];
$space_craft = $_POST['space_craft'];
$type = $_POST['type'];
$outcome = $_POST['outcome'];
$details = $_POST['details'];
$satellite_id = $_POST['satellite_id'];
$celestial_body_id = $_POST['celestial_body_id'];

$stmt = $conn->prepare("UPDATE space_missions SET name=?, launch_date=?, end_date=?, objective=?, destination=?, space_craft=?, type=?, outcome=?, details=?, satellite_id=?, celestial_body_id=? WHERE mission_id=?");
$stmt->bind_param("ssssssssssii", $name, $launch_date, $end_date, $objective, $destination, $space_craft, $type, $outcome, $details, $satellite_id, $celestial_body_id, $missionId);

if ($stmt->execute()) {
    echo "Space mission details updated successfully";
} else {
    echo "Error updating space mission details: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
