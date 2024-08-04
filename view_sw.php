<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Weather</title>
    <link rel="stylesheet" href="view_style.css">
</head>
<body>
<div class="gif-background">
        <img src="images/space weather.gif" class="gif-background" alt="Background GIF">
    </div>
<div class="content">
    <h1>Space Weather</h1>

    <p>Space weather refers to the environmental conditions in space as influenced by solar activity and the solar wind. These conditions can have various effects on Earth and technology in space, including communications systems, satellites, and power grids.</p>

    <h2>Components of Space Weather:</h2>
    <ul>
        <li><strong>Solar Flares:</strong> Explosive releases of energy on the Sun's surface that can result in bursts of electromagnetic radiation, including X-rays and ultraviolet light.</li>
        <li><strong>Coronal Mass Ejections (CMEs):</strong> Large eruptions of plasma and magnetic field from the Sun's corona that can cause geomagnetic storms and auroras when they interact with Earth's magnetosphere.</li>
        <li><strong>Solar Wind:</strong> A stream of charged particles (mostly electrons and protons) emitted by the Sun and flowing through the solar system at high speeds. The solar wind interacts with Earth's magnetic field, creating the magnetosphere.</li>
        <li><strong>Geomagnetic Storms:</strong> Disturbances in Earth's magnetosphere caused by changes in the solar wind or CME impacts. These storms can induce electric currents in the Earth's atmosphere and disrupt power grids, satellite communications, and navigation systems.</li>
        <li><strong>Auroras:</strong> Spectacular displays of light in the Earth's polar regions caused by charged particles from the solar wind interacting with the gases in the atmosphere.</li>
    </ul>

    <h2>Effects of Space Weather:</h2>
    <p>Space weather can impact various technologies and systems on Earth and in space, including:</p>
    <ul>
        <li>Interference with satellite communications, navigation systems, and GPS signals.</li>
        <li>Disruption of power grids due to induced electric currents.</li>
        <li>Damage to spacecraft and satellites from increased radiation levels.</li>
        <li>Increased radiation exposure for astronauts and airline passengers at high altitudes.</li>
    </ul>

    <h2>Monitoring and Prediction:</h2>
    <p>Space weather is monitored by various space agencies and organizations using satellites, ground-based observatories, and space weather prediction models. Early warning systems are in place to alert operators of vulnerable systems to potential space weather events.</p>

    <h2>Space Weather Data</h2>
    <?php

$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$database = "space_dbms";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM space_weather";
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