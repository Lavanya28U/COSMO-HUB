<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asteriods and Meteorites</title>
    <link rel="stylesheet" href="view_style.css">
</head>
<body>
<div class="gif-background">
        
        <img src="images/ast.gif" class="gif-background" alt="Background GIF">
    </div>
    <div class="content">
        <h1>Asteriods and Meteorites</h1>
        <p>Asteroids and meteors are both celestial objects found in space, but they differ in their size, composition, and behavior. Here's a breakdown of each:</p>

        <ol>
            <li>
                <strong>Asteroids:</strong>
                <ul>
                    <li><strong>Definition:</strong> Asteroids are rocky objects that orbit the Sun, primarily located in the asteroid belt between the orbits of Mars and Jupiter. They vary in size from small rocky fragments to large bodies several hundred kilometers in diameter.</li>
                    <li><strong>Composition:</strong> Most asteroids are composed of rocky materials, metals, and sometimes ice. They are remnants from the early solar system, representing the building blocks that never formed into planets.</li>
                    <li><strong>Classification:</strong> Asteroids are classified into different types based on their composition, including C-type (carbonaceous), S-type (silicate), and M-type (metallic) asteroids.</li>
                    <li><strong>Impact Risk:</strong> While most asteroids orbit harmlessly in space, some have orbits that bring them close to Earth. There is a potential risk of impact with Earth, although the likelihood of a catastrophic collision is low. Efforts are underway to track and monitor near-Earth asteroids for planetary defense purposes.</li>
                    <li><strong>Exploration:</strong> Several space missions, such as NASA's OSIRIS-REx and Japan's Hayabusa2, have been launched to study asteroids up close, collect samples, and return them to Earth for analysis.</li>
                </ul>
            </li>
            <li>
                <strong>Meteors:</strong>
                <ul>
                    <li><strong>Definition:</strong> Meteors, also known as shooting stars, are small particles of rock and debris that enter Earth's atmosphere from space. They typically range in size from grains of sand to pebbles.</li>
                    <li><strong>Formation:</strong> Meteors are formed when debris from comets or asteroids collides with Earth's atmosphere at high speeds. Friction with the atmosphere causes the particles to heat up and glow, producing a streak of light as they streak across the sky.</li>
                    <li><strong>Meteor Showers:</strong> Meteor showers occur when Earth passes through the debris trail left behind by a comet's orbit. During these events, the rate of meteors entering the atmosphere increases, resulting in a more significant number of visible shooting stars.</li>
                    <li><strong>Meteorites:</strong> If a meteoroid survives its passage through the atmosphere and lands on Earth's surface, it is called a meteorite. Meteorites provide valuable insight into the composition and history of the solar system.</li>
                    <li><strong>Observation:</strong> Meteor showers are popular events for amateur astronomers and stargazers. They provide opportunities for skywatchers to observe and photograph shooting stars.</li>
                </ul>
            </li>
        </ol>

        <h2>Asteroids and Meteors Data</h2>

    <?php
    
    $servername = "localhost";
        $username = "root";
        $password = "zZ@3Wnd4";
        $database = "space_dbms";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM asteroids_meteors";
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
