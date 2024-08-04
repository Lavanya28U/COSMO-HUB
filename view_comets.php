<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comets</title>
    <link rel="stylesheet" href="view_style.css">
</head>
<body>
<div class="gif-background">
        <img src="images/comet.gif" class="gif-background" alt="Background GIF">
    </div>
    <div class="content">
    <h1>Comets Overview</h1>

<p>Comets are small celestial bodies composed of ice, dust, and rocky particles that orbit the Sun. They are often referred to as "dirty snowballs" or "icy dirtballs" due to their composition. Comets are known for their bright, glowing tails that develop when they approach the Sun.</p>

<h2>Characteristics of Comets:</h2>
<ul>
    <li><strong>Nucleus:</strong> The solid core of a comet is called the nucleus, which consists of ice, rock, and dust. Nuclei can vary in size from a few meters to tens of kilometers in diameter.</li>
    <li><strong>Coma:</strong> As a comet approaches the Sun, heat causes the nucleus to release gases and dust, forming a cloud around it known as the coma. The coma reflects sunlight, making the comet visible from Earth.</li>
    <li><strong>Tail:</strong> Solar radiation and the solar wind push the coma's gases and dust particles away from the Sun, forming two distinct tails: a gas tail and a dust tail. The gas tail is composed of ionized gases, while the dust tail consists of small, solid particles.</li>
    <li><strong>Orbit:</strong> Comets have highly elliptical orbits that take them from the outer regions of the solar system to closer to the Sun and back. Some comets have long orbital periods, while others have short ones.</li>
</ul>

<h2>Types of Comets:</h2>
<p>Comets can be categorized into two main types based on their orbital characteristics:</p>
<ul>
    <li><strong>Short-Period Comets:</strong> These comets have orbital periods of less than 200 years and originate from the Kuiper Belt, a region of the outer solar system beyond the orbit of Neptune.</li>
    <li><strong>Long-Period Comets:</strong> Long-period comets have orbital periods of more than 200 years and come from the Oort Cloud, a hypothetical region of icy objects surrounding the solar system at a great distance.</li>
</ul>

<h2>Observation and Study:</h2>
<p>Comets are observed and studied using telescopes and spacecraft. Space missions, such as NASA's Stardust and ESA's Rosetta, have provided valuable data about cometary nuclei, composition, and behavior. Cometary exploration helps scientists better understand the early solar system and the processes that formed it.</p>

<h2>Interesting Facts:</h2>
<ul>
    <li>Comets are believed to be remnants from the formation of the solar system around 4.6 billion years ago.</li>
    <li>Some comets, such as Comet Halley, are periodic and return to the inner solar system at regular intervals.</li>
    <li>Comets played a role in delivering water and organic molecules to Earth, contributing to the planet's early atmosphere and possibly the origin of life.</li>
</ul>

<h2>Comet Data</h2>
<?php

$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$database = "space_dbms";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM comet";
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