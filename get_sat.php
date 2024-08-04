<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sname = $_GET['name'];


$stmt = $conn->prepare("SELECT * FROM satellite WHERE name = ?");
$stmt->bind_param("s", $sname);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    
    $satellite = $result->fetch_assoc();
    
    
    $celestialStmt = $conn->prepare("SELECT id, name FROM celestial_bodies");
    $celestialStmt->execute();
    $celestialResult = $celestialStmt->get_result();
    $celestial_bodies = $celestialResult->fetch_all(MYSQLI_ASSOC);

    
    $response = array(
        'success' => true,
        'satellite' => array(
            'name' => $satellite['name'],
            'launch_date' => $satellite['launch_date'],
            'purpose' => $satellite['purpose'],
            'orbital_type' => $satellite['orbital_type'],
            'orbital_period' => $satellite['orbital_period'],
            'launch_vehicle' => $satellite['launch_vehicle'],
            'mass' => $satellite['mass'],
            'celestial_body_id' => $satellite['celestial_body_id']
        ),
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
