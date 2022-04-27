<?php
    include('header.php');
?>

<?php

if (isset($_POST['submit'])) {

        include('config.php');

        $selected = $_POST['game-select'];
        $selected2 = $_POST['genre-select'];

        $sql_query5 = "SELECT game_id FROM game WHERE name='$selected'";

        if (mysqli_query($conn, $sql_query5)) {
            $game_id = mysqli_query($conn, $sql_query5);
            $g_id = mysqli_fetch_row($game_id);
            $g = $g_id[0];
        } 
        else {
            echo 'failure';
        }

        $sql_query6 = "SELECT genre_id FROM genre WHERE genre_type='$selected2'";

        if (mysqli_query($conn, $sql_query6)) {
            $genre_id = mysqli_query($conn, $sql_query6);
            $gn_id = mysqli_fetch_row($genre_id);
            $gn = $gn_id[0];
        } else {
            echo 'failure';
        }

        $sql_query7 = "INSERT INTO is_in(genre_id, game_id) VALUES ('$gn','$g')";

        if (mysqli_query($conn, $sql_query7)) {
            header('Location: success.php');
        } else {
            header('Location: failure.php');
        }
    
}
?>

<section class="container grey-text">
    <h2 class="center">Is_In Input Form</h4>
        <form class="white" method="POST">
            <label for="game-select">Please select a game to add a genre</label>
            <input list="game-select" name="game-select">
            <datalist id="game-select">
                <?php
                include('config.php');
                $sql_query3 = "SELECT name FROM game";
                $result = mysqli_query($conn, $sql_query3);
                $games = mysqli_fetch_all($result, MYSQLI_ASSOC);
                ?>
                <?php foreach ($games as $game) { ?>
                    <option value="<?php echo $game['name'] ?>"></option>
                <?php } ?>

            </datalist>

           
            <label for="genre-select">Please select the genre for the game to be added to.</label>
            <input list="genre-select" name="genre-select">
            <datalist id="genre-select">
                <?php
                include('config.php');
                $sql_query4 = "SELECT genre_type FROM genre";
                $result = mysqli_query($conn, $sql_query4);
                $genres = mysqli_fetch_all($result, MYSQLI_ASSOC);
                ?>
                <?php foreach ($genres as $genre) { ?>
                    <option value="<?php echo $genre['genre_type'] ?>"></option>
                <?php } ?>

            </datalist>

            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>


        </form>

</section>

<?php
include('footer.php');
?>