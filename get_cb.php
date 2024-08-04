<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$cname = $_GET['name'];
$stmt = $conn->prepare("SELECT * FROM celestial_bodies WHERE name = ?");
$stmt->bind_param("s", $cname);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
   
    $row = $result->fetch_assoc();
    
    
    $response = array(
        'success' => true,
        'celestial_body' => array(
            'type' => $row['type'],
            'mass' => $row['mass'],
            'size' => $row['size'],
            'composition' => $row['composition'],
            'orbital_parameters' => $row['orbital_parameters']
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
