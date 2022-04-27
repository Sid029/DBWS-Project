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
    <form action="player_search_form.php" method="POST">
        <br><br>
        <h1 style="color:coral">Want User Statistics? Enter the email,first name and last name attached to the account! </h1>
        <input type="text" name="email" required="required" placeholder="Email"><br>
        <input type="text" name="first_name" required="required" placeholder="First Name"><br>
        <input type="text" name="last_name" required="required" placeholder="Last Name"><br>
        <button type="submit" name="submit-search">Search</button>
    </form>
</body>

</html>

<?php
require('config2.php');
if (isset($_POST['submit-search'])) {
    $search1 = mysqli_real_escape_string($conn, $_POST['email']);
    $search2 = mysqli_real_escape_string($conn, $_POST['first_name']);
    $search3 = mysqli_real_escape_string($conn, $_POST['last_name']);
    $sql = "SELECT * FROM player WHERE email LIKE '%$search1%' AND  first_name LIKE '%$search2%' AND last_name LIKE '%$search3%'";

    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);

    if ($queryResults > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<a href='player_result.php?email=".$row['email']."'><div class='game-box'>
            <h3>".$row['email']."</h3>
        </a></div>";
        }
    } 
    else {
        echo 'There are no results matching your search';
    }
}

?>
