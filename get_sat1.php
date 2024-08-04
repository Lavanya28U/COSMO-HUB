<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT s_id, name FROM satellite");
$stmt->execute();
$result = $stmt->get_result();


$satellites = array();
while ($row = $result->fetch_assoc()) {
    $satellites[] = $row;
}


header('Content-Type: application/json');
echo json_encode($satellites);

$stmt->close();
$conn->close();
?>
