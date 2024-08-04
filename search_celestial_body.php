<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$database = "space_dbms1";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchName = $_GET['name'];

$stmt = $conn->prepare("SELECT name FROM celestial_bodies WHERE name LIKE ?");
$searchName = '%' . $searchName . '%'; 
$stmt->bind_param("s", $searchName);

$stmt->execute();

$result = $stmt->get_result();

$names = array();

while ($row = $result->fetch_assoc()) {
    $names[] = $row["name"];
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($names);
?>
