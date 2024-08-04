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
$comet_text = $_POST['comet_text'];
$time_stamp = $_POST['time_stamp'];

$stmt = $conn->prepare("UPDATE comet SET comet_text=?, time_stamp=? WHERE name=?");
$stmt->bind_param("sss", $comet_text, $time_stamp, $name);

if ($stmt->execute()) {
    echo "Comet details updated successfully";
} else {
    echo "Error updating comet details: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
