<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$missionId = $_GET['mission_id'];


$stmt = $conn->prepare("SELECT * FROM space_missions WHERE mission_id = ?");
$stmt->bind_param("i", $missionId);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
   
    $spaceMission = $result->fetch_assoc();

    
    $response = array(
        'success' => true,
        'spaceMission' => $spaceMission
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
