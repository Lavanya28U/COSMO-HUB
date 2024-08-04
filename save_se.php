<?php
include 'dbc.php';

$title = $_POST['title'];
$type = $_POST['type'];
$published_date = $_POST['published_date'];
$level = $_POST['level'];
$description = $_POST['description'];
$url = $_POST['url'];
$celestial_body_id = $_POST['celestial_body_id'];

$stmt = $conn->prepare("UPDATE space_education SET type=?, published_date=?, level=?, description=?, url=?, celestial_body_id=? WHERE title=?");
$stmt->bind_param("sssssis", $type, $published_date, $level, $description, $url, $celestial_body_id, $title);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $response['success'] = true;
} else {
    $response['success'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);

$stmt->close();
$conn->close();
?>
