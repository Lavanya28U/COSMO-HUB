<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$eventId = $_GET['event_id'];


$stmt = $conn->prepare("SELECT * FROM astronomical_events WHERE event_id = ?");
$stmt->bind_param("i", $eventId);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    
    $event = $result->fetch_assoc();
    
    
    $celestialStmt = $conn->prepare("SELECT id, name FROM celestial_bodies");
    $celestialStmt->execute();
    $celestialResult = $celestialStmt->get_result();
    $celestial_bodies = $celestialResult->fetch_all(MYSQLI_ASSOC);

    
    $response = array(
        'success' => true,
        'event' => $event,
        'celestial_bodies' => $celestial_bodies
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
