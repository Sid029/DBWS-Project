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

    <h1 style="color:coral">Want Publisher Statistics? </h1>
    <form action="publisher_search_form.php" method="POST">
            <input type="text" name="publisher_search" required="required"placeholder="Search">
            <button type="submit" name="submit-search">Search</button>
        </form>

<?php
    require('config2.php');
    if(isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['publisher_search']);
        $sql_search_query = "SELECT * FROM publisher WHERE company_name LIKE '%$search%' OR company_tax_id LIKE '%$search%' OR company_name LIKE '%$search%'";

        $result = mysqli_query($conn, $sql_search_query);
        $sql_query_result = mysqli_num_rows($result);

        if ($sql_query_result > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<a href='publisher_result.php?company_name=".$row['company_name']."'><div class='game-box'>
                <h3>".$row['company_name']."</h3>
            </a></div>";
            }
        } 
        else {
            echo 'There are no results matching your search';
        }
    }
?>

</body>

</html>
