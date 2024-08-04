<?php
$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$dbname = "space_dbms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['table']) && isset($_POST['query'])) {
    $table = $_POST['table'];
    $query = $_POST['query'];

    $sql = "SELECT * FROM $table WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    $query_param = "%$query%";
    $stmt->bind_param("s", $query_param);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h3>Results:</h3>";
        while($row = $result->fetch_assoc()) {
            echo "<p>";
            foreach ($row as $key => $value) {
                echo ucfirst($key) . ": " . $value . "<br>";
            }
            echo "</p>";
        }
    } else {
        echo "No results found";
    }

    $stmt->close();
}

$conn->close();
?>
