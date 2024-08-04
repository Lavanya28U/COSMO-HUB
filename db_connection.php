<?php
// Database configuration
$servername = "localhost";  // Change this to your database server hostname
$username = "root"; // Change this to your database username
$password = "zZ@3Wnd4"; // Change this to your database password
$database = "space_dbms1"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Uncomment the following line if you want to see a success message when the connection is established
// echo "Connected successfully";

?>
