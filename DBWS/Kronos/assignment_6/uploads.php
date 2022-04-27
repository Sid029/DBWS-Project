<?php
    include('header.php');
?>

<?php

if (isset($_POST['submit'])) {

        include('config.php');

        $selected = $_POST['publisher-select'];
        $selected2 = $_POST['game-select'];

        $sql_query4 = "SELECT publisher_id FROM publisher WHERE company_name='$selected'";

        if (mysqli_query($conn, $sql_query4)) {
            $publisher_id = mysqli_query($conn, $sql_query4);
            $p_id = mysqli_fetch_row($publisher_id);
            $p = $p_id[0];
        } 
        else {
            echo 'failure';
        }

        $sql_query5 = "SELECT game_id FROM game WHERE name='$selected2'";

        if (mysqli_query($conn, $sql_query5)) {
            $game_id = mysqli_query($conn, $sql_query5);
            $g_id = mysqli_fetch_row($game_id);
            $g = $g_id[0];
        } 
        else {
            echo 'failure';
        }

        $sql_query6 = "INSERT INTO uploads(publisher_id, game_id) VALUES ('$p','$g')";

        if (mysqli_query($conn, $sql_query6)) {
            header('Location: success.php');
        } else {
            header('Location: failure.php');
        }
    
}
?>

<section class="container grey-text">
    <h2 class="center">Uploads Input Form</h4>
        <form class="white" method="POST">
            <label for="publisher-select">Please select a publisher that uploads a game.</label>
            <input list="publisher-select" name="publisher-select">
            <datalist id="publisher-select">
                <?php
                    include('config.php');
                    $sql_query3 = "SELECT company_name FROM publisher";
                    $result = mysqli_query($conn, $sql_query3);
                    $publishers = mysqli_fetch_all($result, MYSQLI_ASSOC);
                ?>
                <?php foreach ($publishers as $publisher) { ?>
                    <option value="<?php echo $publisher['company_name'] ?>"></option>
                <?php } ?>

            </datalist>

           
            <label for="game-select">Please select a game to be published.</label>
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
            <div class="center">
                    <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
                </div>

        </form>

</section>

<?php
    include('footer.php');
?>