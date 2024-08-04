<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$gname = $_GET['name'];


$stmt = $conn->prepare("SELECT * FROM galaxies WHERE name = ?");
$stmt->bind_param("s", $gname);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    
  
    $response = array(
        'success' => true,
        'galaxy' => array(
            'name' => $row['name'],
            'type' => $row['type'],
            'size' => $row['size'],
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
