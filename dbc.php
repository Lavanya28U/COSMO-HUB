<?php

$servername = "localhost";  
$username = "root"; 
$password = "zZ@3Wnd4"; 
$database = "space_dbms"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>
