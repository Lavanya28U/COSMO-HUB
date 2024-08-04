<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Normal User Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .gif-background {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.8); /* 70% opacity */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 50px;
            text-align: center;
            max-width: 400px;
        }

        .card a {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 200px;
            font-size: 16px; /* Set font size for all buttons */
        }

        .card a:hover {
            background-color: #0056b3;
        }

        h1, h2 {
            color: #333;
            margin-bottom: 20px;
        }
        hr{
            border-style: solid;
        }
    </style>
</head>
<body>
<div class="gif-background">
        <img src="images/background.gif" class="gif-background" alt="Background GIF">
    </div>
    <div class="container">
        <div class="card">
            <h1>Welcome, Normal User!</h1>
            
            <h2>View Data</h2>
            <a href="dummy_view.html">View Data</a> 
            <hr>
            <h2>Search Data</h2>
            <a href="search.html">Search Data</a> 
            <hr>
            <h2>Add</h2>
            <form action="add_normal_user.html" method="post">
                <input type="submit" value="Multiple Add Options" style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer; transition: background-color 0.3s ease; width: 200px; font-size: 16px;">
            </form>
            <hr>
            <h2>Logout</h2>
            <a href="home.html">Logout</a>
        </div>
    </div>
 
</body>
</html>
