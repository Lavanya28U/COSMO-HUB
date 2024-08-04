<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$bname = $_GET['name'];


$stmt = $conn->prepare("SELECT * FROM black_holes WHERE name = ?");
$stmt->bind_param("s", $bname);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    
   
    $response = array(
        'success' => true,
        'black_hole' => array(
            'mass' => $row['mass'],
            'size' => $row['size'],
            'spectral_class' => $row['spectral_class'],
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
