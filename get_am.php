<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_GET['name'];


$stmt = $conn->prepare("SELECT * FROM asteroids_meteors WHERE name = ?");
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    

    $response = array(
        'success' => true,
        'asteroidMeteor' => array(
            'name' => $row['name'],
            'mass' => $row['mass'],
            'size' => $row['size'],
            'composition' => $row['composition'],
            'orbital_details' => $row['orbital_details'],
            'description' => $row['description']
        )
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
