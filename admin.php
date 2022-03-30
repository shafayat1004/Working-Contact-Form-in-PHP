<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Contact_Form_Db";


$link = mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
    die("Error: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM Site_Messages ORDER BY date DESC";
$result = mysqli_query($link, $sql);

mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <link rel="stylesheet" href="static/css/bootstrap.css">
    <link rel="stylesheet" href="static/css/my.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">1910456 Assignment 2</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="admin.php">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact-form.html">Contact Form</a>
                </li>
            </ul>
          </div>
        </div>
    </nav>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["message"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "</tr>";
                }
            } 
            else {
                echo "0 results";
            }
        ?>
    </tbody>
    </table>
</body>
</html>