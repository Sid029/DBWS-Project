<!DOCTYPE html>
<html lang="en">
    <?php include('header.php'); ?>
    <?php
    session_start();
    
    <?php include('config.php'); ?>
    if($_SESSION["username"]!='admin')
          {
          header('Location: admin_login.php');
          }    ?>
    <h1> Hello Welcome to the maintenance page: <?php echo $_SESSION['username']?> </h1>;
    <a href="./logout2.php">
                <button style="background-color:beige;cursor:pointer;color:red;font-size:16px;font-weight:600;padding:8px 12px;border:2px solid black;border-radius:5px;" class = "admin_buttons" class = "buttons">
                    Logout
                </button>
            </a>    
    <ul id="nav-mobile" class="center hide-on-small-and-down">
        <li><a href="game.php" class="btn brand z-depth-0" style="margin:20px">Game</a></li>
        <li><a href="review.php" class="btn brand z-depth-0" style="margin:20px">Review</a></li>
        <li><a href="player.php" class="btn brand z-depth-0" style="margin:20px">Player </a></li>
        <li><a href="publisher.php" class="btn brand z-depth-0" style="margin:20px">Publisher</a></li>
        <li><a href="installation.php" class="btn brand z-depth-0" style="margin:20px">Installation </a></li>
        <li><a href="genre.php" class="btn brand z-depth-0" style="margin:20px">Genre</a></li>
        <li><a href="is_in.php" class="btn brand z-depth-0" style="margin:20px">Is_In</a></li>
        <li><a href="uploads.php" class="btn brand z-depth-0" style="margin:20px">Uploads</a></li>
    </ul>

  
