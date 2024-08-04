<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astronomical Events</title>
    <link rel="stylesheet" href="view_style.css">
</head>
<body>
<div class="gif-background">
        
        <img src="images/astronomical events.gif" class="gif-background" alt="Background GIF">
    </div>
    <div class="content">
        <h1>Astronomical Events</h1>
        <p>Astronomical events encompass a wide array of phenomena occurring in the cosmos that are observable from Earth. Here are some key points about astronomical events:</p>
        
        <p>
            1. <b>Types of Events:</b>
            <ul>
                <li>Eclipses: Solar and lunar eclipses occur when celestial bodies align in such a way that one is obscured by the other as seen from Earth.</li>
                <li>Transits: Transits occur when a celestial body passes in front of another, such as the transit of Mercury or Venus across the face of the Sun.</li>
                <li>Meteor Showers: Meteor showers result from Earth passing through the debris trail left by a comet, causing increased meteor activity in the atmosphere.</li>
                <li>Planetary Alignments: Occasions when multiple planets appear close together in the sky due to their positions in their orbits.</li>
                <li>Comet Appearances: Periodic or rare appearances of comets as they travel through the solar system, sometimes visible to the naked eye.</li>
                <li>Supernovae: Explosive deaths of massive stars, resulting in a sudden increase in brightness followed by a gradual fading.</li>
                <li>Occultations: Occurrences when one celestial body passes in front of another, partially or completely blocking its view from Earth.</li>
                <li>Variable Star Outbursts: Fluctuations in the brightness of certain stars due to internal processes or interactions with companions.</li>
            </ul>
        </p>
        
        <p>
            2. <b>Observation and Study:</b>
            <ul>
                <li>Astronomical events are observed and studied using various instruments, including telescopes, cameras, spectrographs, and space probes.</li>
                <li>Amateur astronomers often contribute valuable observations of astronomical events, collaborating with professional astronomers to gather data and document phenomena.</li>
            </ul>
        </p>
        
        
        
        <h2>Event Data</h2>
        <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "zZ@3Wnd4";
        $database = "space_dbms";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM astronomical_events";
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
    </div>
</body>
</html>
