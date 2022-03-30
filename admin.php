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