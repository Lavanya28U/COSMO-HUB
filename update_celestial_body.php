<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $celestial_body_id = $_POST['celestial_body_id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $mass = $_POST['mass'];
    $size = $_POST['size'];
    $composition = $_POST['composition'];
    $orbital_parameters = $_POST['orbital_parameters'];

    
    $servername = "localhost";
    $username = "root"; 
    $password = "zZ@3Wnd4"; 
    $dbname = "space_dbms"; 

    
    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "UPDATE celestial_bodies SET name=?, type=?, mass=?, size=?, composition=?, orbital_parameters=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssddssi", $name, $type, $mass, $size, $composition, $orbital_parameters, $celestial_body_id);

    
    if ($stmt->execute()) {
        echo json_encode(array("success" => true, "message" => "Celestial body updated successfully."));
    } else {
        echo json_encode(array("success" => false, "message" => "Error updating celestial body: " . $conn->error));
    }

    
    $stmt->close();
    $conn->close();
} else {
    
    echo json_encode(array("success" => false, "message" => "Invalid request."));
}
?>
