<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Organization</title>
    <link rel="stylesheet" href="view_style.css">
</head>
<body>
<div class="gif-background">
        <img src="images/space org.gif" class="gif-background" alt="Background GIF">
    </div>
<div class="content">
    <h1>Space Organization</h1>

    <p>Space organizations are entities responsible for various aspects of space exploration, research, and development. Here's an overview of some prominent space organizations:</p>

    <h2>NASA (National Aeronautics and Space Administration)</h2>
    <p>NASA is the United States government agency responsible for the nation's civilian space program and for aeronautics and aerospace research. It conducts space missions, including robotic exploration of other planets, human spaceflight, Earth observation, and satellite deployment.</p>

    <h2>ESA (European Space Agency)</h2>
    <p>The European Space Agency is an intergovernmental organization dedicated to the exploration of space. It conducts space missions, launches satellites, and collaborates with other space agencies worldwide. ESA focuses on scientific research, Earth observation, and space exploration.</p>

    <h2>Roscosmos (Russian Federal Space Agency)</h2>
    <p>Roscosmos is the governmental body responsible for the space science program of the Russian Federation and general aerospace research. It oversees the Russian space program, including crewed space missions, satellite launches, and space exploration projects.</p>

    <h2>ISRO (Indian Space Research Organisation)</h2>
    <p>The Indian Space Research Organisation is the space agency of the Government of India, responsible for the country's space research and exploration activities. ISRO designs and launches satellites, conducts space missions, and contributes to scientific research and space technology development.</p>

    <h2>CNSA (China National Space Administration)</h2>
    <p>The China National Space Administration is the national space agency of China, responsible for the country's space program and aerospace research. CNSA conducts crewed space missions, satellite launches, lunar exploration, and space science projects.</p>

    <h2>SpaceX</h2>
    <p>Space Exploration Technologies Corp., known as SpaceX, is a private aerospace manufacturer and space transportation company founded by Elon Musk. SpaceX designs, manufactures, and launches spacecraft and rockets, with the goal of reducing space transportation costs and enabling human colonization of Mars.</p>

    <h2>Space Organizations Data</h2><?php

$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$database = "space_dbms";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM space_organisation";
$result = $conn->query($sql);

if (!$result) {
    die("Error: " . $conn->error);
}

if ($result->num_rows > 0) {
    echo "<table>";
    
    echo "<tr>";
    $row = $result->fetch_assoc();
    foreach ($row as $key => $value) {
        echo "<th>$key</th>";
    }
    echo "</tr>";
    
    do {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    } while ($row = $result->fetch_assoc());
    
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</html>