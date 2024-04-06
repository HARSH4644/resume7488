<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        h2 {
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 30px;
        }
        .section h3 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Resume</h2>
        <?php
        // Replace these values with your own database connection details
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "presentation";
        
        $conn = mysqli_connect($host, $username, $password, $dbname);
        
        
        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch resume data from database
        $sql = "SELECT * FROM resume";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='section'>";
                echo "<h3>Name: " . $row["name"]. "</h3>";
                echo "<p>Email: " . $row["email"]. "</p>";
                echo "<p>Phone: " . $row["phone"]. "</p>";
                echo "<p>Address: " . $row["address"]. "</p>";
                echo "<h3>Education</h3>";
                echo "<p>" . $row["education"]. "</p>";
                echo "<h3>Experience</h3>";
                echo "<p>" . $row["experience"]. "</p>";
                // Add more fields as needed
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
