<?php

include 'dbc.php';


$title = $_GET['title'];


$stmt = $conn->prepare("SELECT * FROM space_education WHERE title = ?");
$stmt->bind_param("s", $title);
$stmt->execute();
$result = $stmt->get_result();


$response = array();

if ($result->num_rows > 0) {

    $content = $result->fetch_assoc();
    $response['success'] = true;
    $response['content'] = $content;

    $celestial_bodies_query = "SELECT * FROM celestial_bodies";
    $celestial_bodies_result = $conn->query($celestial_bodies_query);
    $celestial_bodies = array();
    while ($row = $celestial_bodies_result->fetch_assoc()) {
        $celestial_bodies[] = $row;
    }
    $response['celestial_bodies'] = $celestial_bodies;
} else {
    
    $response['success'] = false;
}


header('Content-Type: application/json');
echo json_encode($response);


$stmt->close();
$conn->close();
?>
