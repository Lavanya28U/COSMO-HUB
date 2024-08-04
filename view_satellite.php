<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satellite</title>
    <link rel="stylesheet" href="view_style.css">
</head>
<body>
    <div class="gif-background">
        <!-- Replace 'YOUR_GIF_URL' with the actual URL of your background GIF -->
        <img src="images/satellite.gif" class="gif-background" alt="Background GIF">
    </div>
    <div class="content">
        <h1>Satellites Overview</h1>

        <p>
            The term "satellite" refers to an object that orbits around a celestial body, such as a planet or a moon. However, in the context of space exploration and technology, the term is commonly used to refer to artificial satellites, which are human-made objects placed into orbit around Earth or other celestial bodies for various purposes.
        </p>

        <h2>1. Types of Satellites:</h2>
        <ul>
            <li>Communication Satellites: These satellites relay signals for telecommunications, broadcasting, internet connectivity, and global positioning systems (GPS).</li>
            <li>Earth Observation Satellites: Used for remote sensing, these satellites capture images and data about Earth's surface, atmosphere, oceans, and weather patterns.</li>
            <li>Navigation Satellites: These satellites provide precise positioning and timing information for navigation systems like GPS, GLONASS, and Galileo.</li>
            <li>Weather Satellites: Dedicated to monitoring weather conditions and patterns, these satellites gather data for weather forecasting, climate research, and disaster management.</li>
            <li>Scientific Satellites: Equipped with scientific instruments, these satellites study space phenomena, celestial bodies, cosmic rays, and other scientific phenomena.</li>
            <li>Space Telescopes: These satellites observe the universe in various wavelengths, enabling astronomers to study distant galaxies, stars, planets, and cosmic phenomena without atmospheric interference.</li>
            <li>Military Satellites: Used for reconnaissance, surveillance, intelligence gathering, and military communication purposes.</li>
        </ul>

        <h2>2. Components and Functionality:</h2>
        <p>
            Satellites typically consist of various components, including a power source (solar panels or batteries), communication systems (antennas and transponders), payload (scientific instruments or cameras), propulsion systems (for orbit adjustment), and onboard computers. They orbit Earth at different altitudes and inclinations, depending on their intended mission and function. Satellites communicate with ground stations using radio waves, transmitting data collected from sensors or instruments and receiving commands for operation.
        </p>

        <h2>3. Launch and Deployment:</h2>
        <p>
            Satellites are launched into space using rockets or space shuttles. They can be launched individually or as part of a larger payload. Once in space, satellites are deployed into their designated orbits using onboard propulsion systems or by being released from a carrier spacecraft.
        </p>

        <h2>4. Applications and Benefits:</h2>
        <p>
            Satellites play a crucial role in modern society, facilitating communication, navigation, weather forecasting, disaster management, environmental monitoring, agriculture, transportation, urban planning, and scientific research. They enable global connectivity, support emergency response efforts, enhance national security, and provide valuable data for scientific discoveries and commercial applications.
        </p>

        <h2>5. Challenges and Future Trends:</h2>
        <p>
            Challenges in satellite technology include ensuring reliable operation, managing space debris and collision risks, optimizing performance, and adapting to evolving user demands and technological advancements. Future trends in satellite technology include miniaturization, increased use of artificial intelligence and machine learning, development of small satellites (cubesats and nanosats), deployment of satellite constellations for global coverage, and advancements in satellite propulsion and materials technology.
        </p>

        <h2>Satellite Data</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "zZ@3Wnd4";
        $database = "space_dbms";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM satellite";
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
</body
