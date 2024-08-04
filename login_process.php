<?php
// Database configuration
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


$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    
    if ($user['user_type'] === 'normal') {
        header("Location: normal_user_page.php");
    } elseif ($user['user_type'] === 'authorized') {
        header("Location: a2.html");
    }
} else {
    
    header("Location: login.html");
}


$stmt->close();
$conn->close();
exit;
?>
