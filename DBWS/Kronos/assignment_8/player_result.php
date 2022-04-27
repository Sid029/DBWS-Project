<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Kronos Games</title>
</head>

<body>
    <div class="logo">
        <img src="logo.png" height="90" width="90" alt="Kronos Games Logo">
    </div>
    <!--Logo-->

    <div class="login">
        <button type="button">Create Account</button>
        <button type="button">Sign In</button>
    </div>

    <div class="title">
        <h1>Kronos Games</h1>
    </div>
    <!--Title-->
    <div class="navbar">
        <ul>
            <li><a href="./index.html">Home</a></li>
            <div class="dropdown">
                <button class="dropbtn">
                    <li><a href="#">Catalog</a></li>
                </button>
                <div class="dropdown-content">
                    <li><a href="#">Shooting</a></li>
                    <li><a href="#">Racing&emsp;</a></li>
                    <li><a href="#">Fantasy&emsp;</a></li>
                </div>
            </div>
            <li><a href="#">News</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="imprint.html">Disclaimer</a></li>
            <li><a href="search.html">Search Form</a></li>
        </ul>
    </div>

<?php
require('config2.php');
$title1 = mysqli_real_escape_string($conn, $_GET['email']);

$sql = "SELECT * FROM player WHERE email='$title1'";
$result = mysqli_query($conn, $sql);
$queryResults = mysqli_num_rows($result);

if ($queryResults > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<h1 style='color:coral;'>Here is your User Info from our database:</h1>
                    
                    <table style='border-collapse:seperate; border-spacing: 50px; border: 1px solid red;text-align:center;'>
                        <tr style='color:red;font-size:30px;text-align:center;'>
                            <th><p>First Name</th></p>
                            <th><p>Last Name</th></p>
                            <th><p>Email</th></p>
                            <th><p>Password</th></p>
                            <th><p>Country of Residence</th></p>
                            <th><p>Date of Birth</th></p>
                        </tr>
                            <tr style='color:limegreen;font-size:25px;text-align:center;'>
                            <td>" . $row['first_name'] . "</td>
                            <td>" . $row['last_name'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['password'] . "</td>
                            <td>" . $row['country_of_residence'] . "</td>
                            <td>" . $row['date_of_birth'] . "</td>
                        </tr>
                    </table>";
    }
}
    ?>
</body>
</html>