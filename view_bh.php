<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Holes</title>
    <link rel="stylesheet" href="view_style.css">
</head>
<body>
<div class="gif-background">
        
        <img src="images/blackhole.gif" class="gif-background" alt="Background GIF">
    </div>
    <div class="content">
        <h1>Black Holes</h1>
        <p>Black holes are enigmatic celestial objects with gravitational forces so strong that they trap everything, including light, within their vicinity. They form from the remnants of massive stars undergoing gravitational collapse at the end of their lifecycle. When a star's core runs out of nuclear fuel, it can no longer support itself against its own gravity, leading to a catastrophic collapse. For massive stars, this collapse results in a supernova explosion, leaving behind either a neutron star or a black hole, depending on the mass remaining after the explosion.</p>
        
        <p>Black holes come in various sizes. Stellar-mass black holes are typically a few times more massive than our Sun and form from the remnants of massive stars. Intermediate-mass black holes are more massive than stellar-mass black holes but smaller than supermassive black holes found in the centers of galaxies. Supermassive black holes can be millions or even billions of times more massive than the Sun and are thought to reside at the hearts of most galaxies, including our own Milky Way.</p>
        
        <p>The boundary surrounding a black hole where the gravitational pull is so strong that not even light can escape is called the event horizon. Beyond this point, known as the point of no return, the gravitational pull becomes infinite, forming a singularity at the center of the black hole, where the laws of physics, as we currently understand them, break down.</p>
        
        <p>Despite their invisible nature, black holes can be detected indirectly through their gravitational effects on nearby matter. They can also emit radiation and energetic particles when they consume surrounding material, creating phenomena like accretion disks and powerful jets of particles.</p>
        
        <p>Studying black holes provides valuable insights into fundamental aspects of physics, including gravity, space-time, and the behavior of matter under extreme conditions. It also helps scientists understand the formation and evolution of galaxies and the universe as a whole.</p>
        
        <h2>Black Hole Data</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "zZ@3Wnd4";
        $database = "space_dbms";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM black_holes";
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
