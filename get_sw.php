<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$recordId = $_GET['w_id'];


$stmt = $conn->prepare("SELECT * FROM space_weather WHERE w_id = ?");
$stmt->bind_param("i", $recordId);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    
    $spaceWeather = $result->fetch_assoc();

    
    $celestialStmt = $conn->prepare("SELECT id, name FROM celestial_bodies");
    $celestialStmt->execute();
    $celestialResult = $celestialStmt->get_result();
    $celestialBodies = $celestialResult->fetch_all(MYSQLI_ASSOC);

    $response = array(
        'success' => true,
        'spaceWeather' => $spaceWeather,
        'celestialBodies' => $celestialBodies
    );

    
    header('Content-Type: application/json');
    echo json_encode($response);
} else {

    $response = array('success' => false);
    echo json_encode($response);
}

$stmt->close();
$conn->close();
?>
