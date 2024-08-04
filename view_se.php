<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Education</title>
    <link rel="stylesheet" href="view_style.css">
</head>
<body>
<div class="gif-background">
        <img src="images/edu.gif" class="gif-background" alt="Background GIF">
    </div>
<div class="content">
    <h1>Space Education Overview</h1>

    <p>Space education plays a crucial role in inspiring the next generation of scientists, engineers, and explorers. Here's an overview of space education initiatives:</p>

    <h2>STEM Outreach Programs</h2>
    <p>Many organizations, including space agencies like NASA, ESA, and private companies like SpaceX, conduct STEM (Science, Technology, Engineering, and Mathematics) outreach programs. These programs aim to engage students of all ages in hands-on activities, workshops, and competitions related to space exploration and technology.</p>

    <h2>Space Camps and Workshops</h2>
    <p>Space camps and workshops provide immersive learning experiences for students interested in space science and engineering. Participants have the opportunity to interact with astronauts, engineers, and scientists, as well as engage in simulations, experiments, and team-building activities.</p>

    <h2>Online Resources and Courses</h2>
    <p>With the rise of online education platforms, there is a wealth of space-related resources and courses available to students worldwide. Websites like Khan Academy, Coursera, and edX offer free or low-cost courses on topics such as astronomy, astrophysics, rocketry, and space exploration.</p>

    <h2>Space Education Centers</h2>
    <p>Space education centers, such as museums, planetariums, and science centers, provide interactive exhibits and educational programs on space science and exploration. These centers offer visitors the opportunity to learn about topics like the solar system, space travel, and the search for extraterrestrial life.</p>

    <h2>Student Research Opportunities</h2>
    <p>Students interested in space science and engineering can participate in research opportunities through school programs, internships, and competitions. These experiences allow students to work on real-world projects, collaborate with professionals, and gain hands-on experience in space-related fields.</p>

    <h2>Space Education Data</h2>
    <?php

$servername = "localhost";
$username = "root";
$password = "zZ@3Wnd4";
$database = "space_dbms";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM space_education";
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