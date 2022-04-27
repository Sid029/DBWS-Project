<?php
    include ('config2.php');
?>

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
        <form action="game_search_form.php" method="POST">
            <h1 style="color:coral">Need Game Info? Enter the name of the game! </h1>
            <input type="text" required="required" name="game_search" placeholder="Search">
            <button type="submit" required="required" name="submit-search">Search</button>
        </form>
        



        <div class="game-result-container">

<?php
    if(isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['game_search']);
        $sql_search_query = "SELECT * FROM game WHERE name LIKE '%$search%' OR platform LIKE '%$search%' OR description LIKE '%$search%'";

        $result = mysqli_query($conn, $sql_search_query);
        $search_query_result = mysqli_num_rows($result);

        echo "There are ".$search_query_result." result(s)!";

        if ($search_query_result > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<a href='game_result.php?name=".$row['name']."'><div class='game-box'>
                <h3>".$row['name']."</h3>
            </a></div>";
            }
        } else {
            echo 'There are no results matching your search';
        }
    }
?>
        </div>

    </body>
</html>