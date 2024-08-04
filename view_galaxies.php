<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galaxies</title>
    <link rel="stylesheet" href="view_style.css">
</head>
<body>
<div class="gif-background">
        <!-- Replace 'YOUR_GIF_URL' with the actual URL of your background GIF -->
        <img src="images/galaxies.gif" class="gif-background" alt="Background GIF">
    </div>
    <div class="content">
    <h1>Galaxies</h1>

    <p>
        Galaxies are vast systems comprising stars, stellar remnants, interstellar gas, dust, dark matter, and other celestial objects bound together by gravity. Here's a breakdown of key information about galaxies:
    </p>

    <h2>1. Types of Galaxies:</h2>
    <ul>
        <li><strong>Spiral Galaxies:</strong> Characterized by a central bulge surrounded by spiral arms, where new stars form. Examples include the Milky Way and the Andromeda Galaxy.</li>
        <li><strong>Elliptical Galaxies:</strong> Typically shaped like ellipsoids, with older stars and little interstellar gas and dust. They range from nearly spherical to highly elongated in shape.</li>
        <li><strong>Irregular Galaxies:</strong> Lack a distinct shape and often exhibit chaotic structures. They may contain young stars, star clusters, and regions of active star formation.</li>
        <li><strong>Dwarf Galaxies:</strong> Small and faint galaxies, including dwarf elliptical, dwarf spiral, and irregular types. They are the most abundant type of galaxy in the universe.</li>
    </ul>

    <h2>2. Structure and Components:</h2>
    <p>
        Galaxies consist of various components, including a central bulge or nucleus, a disk of stars and gas, spiral arms (in spiral galaxies), globular clusters, open clusters, and a halo of dark matter. The central bulge typically contains older stars and a supermassive black hole at the galactic center, while the disk contains both young and old stars, as well as interstellar gas and dust.
    </p>

    <!-- More sections can be added here -->

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "zZ@3Wnd4";
    $database = "space_dbms";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM galaxies";
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
