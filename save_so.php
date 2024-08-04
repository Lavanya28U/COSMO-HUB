<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$orgId = $_POST['org_id'];
$name = $_POST['name'];
$country = $_POST['country'];
$established_date = $_POST['established_date'];
$partnership = $_POST['partnership'];
$projects = $_POST['projects'];
$satellite_id = $_POST['satellite_id'];
$url = $_POST['url'];

$stmt = $conn->prepare("UPDATE space_organisation SET name=?, country=?, established_date=?, partnership=?, projects=?, satellite_id=?, url=? WHERE org_id=?");
$stmt->bind_param("ssssiiis", $name, $country, $established_date, $partnership, $projects, $satellite_id, $url, $orgId);

if ($stmt->execute()) {
    echo "Space organization details updated successfully";
} else {
    echo "Error updating space organization details: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
