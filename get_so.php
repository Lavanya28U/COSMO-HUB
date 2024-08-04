<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$orgId = $_GET['org_id'];

$stmt = $conn->prepare("SELECT * FROM space_organisation WHERE org_id = ?");
$stmt->bind_param("i", $orgId);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    
    $spaceOrganization = $result->fetch_assoc();

    
    $response = array(
        'success' => true,
        'spaceOrganization' => $spaceOrganization
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
