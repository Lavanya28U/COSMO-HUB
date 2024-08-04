<?php
// MySQL database configuration
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
$userType = $_POST['user_type'];
$authCode = $_POST['auth_code'];

if ($userType === "authorized") {
    
    $sql = "SELECT * FROM space_organisation WHERE org_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $authCode);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $sql = "INSERT INTO users (username, password, user_type, auth_code) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $username, $password, $userType, $authCode);
        $stmt->execute();
        echo "User registered successfully as an authorized user.";
    } else {
        
        echo "Unauthorized. Please enter a valid authorization code.";
    }
} else {
    $sql = "INSERT INTO users (username, password, user_type) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $userType);
    $stmt->execute();
    echo "User registered successfully as a normal user.";
}


$conn->close();
?>
