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

    <?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $date = date('Y-m-d H:i:s');

    echo "<h1>Your message: </h1>";
    echo "<h4>Name: $name</h4>";
    echo "<h4>Email: $email</h4>";
    echo "<h4>Message: $message</h4>";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Contact_Form_Db";

    $link = mysqli_connect($servername, $username, $password, $dbname);
    if ($link === false) {
        die("Error: Could not connect. " . mysqli_connect_error());
    }


    $sql = "INSERT INTO Site_Messages (name, email, message, date) VALUES ('$name', '$email', '$message', '$date')";
    if (mysqli_query($link, $sql)) {
        echo "<h2>Has Been Sent</h2>";
    }
    else {
        // echo "Error: could not execute $sql. ". mysqli_error($link);
        echo "<h2>Could Not Be Sent</h2>";
    }

    mysqli_close($link);

    ?>

    <script src="bootstrap.js"></script>
    <script src="main.js"></script>
</body>
</html>