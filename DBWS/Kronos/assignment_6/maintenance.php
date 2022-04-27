<!DOCTYPE html>
<html lang="en">
    <?php include('header.php'); ?>
    <?php
        $conn = mysqli_connect('localhost', 'group13', '12345678', 'kronos_games');

        if (!$conn) {
            echo "Connection Error: ".mysqli_connect_error();
        }
    ?>
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

<?php 
    include('footer.php'); 
?>