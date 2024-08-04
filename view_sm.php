<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Missions</title>
    <link rel="stylesheet" href="view_style.css">
</head>
<body>
<div class="gif-background">
        <img src="images/space missions.gif" class="gif-background" alt="Background GIF">
    </div>
<div class="content">
    <h1>Space Missions</h1>

    <p>Space missions encompass a wide range of activities, from exploring other planets to studying distant galaxies. Here's an overview of some notable space missions:</p>

    <h2>NASA's Apollo Program</h2>
    <p>The Apollo program was a series of crewed space missions conducted by NASA during the 1960s and 1970s. Its primary goal was to land astronauts on the Moon and bring them safely back to Earth. The program achieved this objective with the historic Apollo 11 mission in 1969, when astronauts Neil Armstrong and Buzz Aldrin became the first humans to set foot on the lunar surface.</p>

    <h2>Voyager Missions</h2>
    <p>The Voyager spacecraft were launched by NASA in the late 1970s to explore the outer planets of the solar system. Voyager 1 and Voyager 2 conducted flybys of Jupiter, Saturn, Uranus, and Neptune, providing valuable data and images of these distant worlds. Voyager 1 is the farthest human-made object from Earth and has entered interstellar space.</p>

    <h2>Mars Rovers</h2>
    <p>NASA's Mars rovers, including Sojourner, Spirit, Opportunity, and Curiosity, have explored the Martian surface, studying its geology, climate, and potential for past life. These robotic missions have contributed to our understanding of Mars' history and provided crucial data for future human exploration.</p>

    <h2>International Space Station (ISS)</h2>
    <p>The ISS is a collaborative space station project involving multiple space agencies, including NASA, Roscosmos, ESA, JAXA, and CSA. Crewed missions to the ISS support scientific research in fields such as biology, physics, and materials science, as well as technology development and international cooperation in space exploration.</p>

    <h2>James Webb Space Telescope (JWST)</h2>
    <p>The JWST is an upcoming space telescope developed by NASA, ESA, and CSA, set to launch in 2021. It will be the premier observatory of the next decade, studying the universe in infrared wavelengths and exploring the early universe, star formation, and the formation of planetary systems.</p>

    <h2>Space Missions Data</h2><?php

$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$database = "space_dbms";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM space_missions";
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