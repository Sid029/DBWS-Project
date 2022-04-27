<?php
    include('header.php');
?>

<?php
    session_start();
    if ($_SESSION['username'] != "admin") {
          header('location: admin_login.php');
    }
$size_of_game = $graphics = '';
$errors = array('size_of_game' => '', 'graphics' => '');
if (isset($_POST['submit'])) {

    if (!($_POST['size_of_game'])) {
        $errors['size_of_game'] = 'Size of Game field is required.';

    } else {
        $size_of_game = $_POST['size_of_game'];
    }

    if (!($_POST['graphics'])) {
        $errors['graphics'] = 'Graphics field is required.';
    } else {
        $graphics = $_POST['graphics'];
    }

    if (array_filter($errors)) {
        echo 'The form still contains errors.';
    } else {

        include('config.php');

        $selected = $_POST['player-select'];

        $sql_query4 = "SELECT player_id FROM player WHERE email='$selected'";
        
        if (mysqli_query($conn, $sql_query4)) {
            $player_id = mysqli_query($conn, $sql_query4);
            $p_id = mysqli_fetch_row($player_id);
            $p = $p_id[0];

        } 
        else {
            echo 'failure';
        }

        $size_of_game = mysqli_real_escape_string($conn, $_POST['size_of_game']);
        $graphics = mysqli_real_escape_string($conn, $_POST['graphics']);

        $sql_query = "INSERT INTO installation(size_of_game, graphics) VALUES ('$size_of_game','$graphics')";

        if (mysqli_query($conn, $sql_query)) {
            $last_id = $conn->insert_id;
            
            $sql_query2 = "INSERT INTO does(install_id, player_id) VALUES ('$last_id','$p')";
            if (mysqli_query($conn, $sql_query2)) {
                header('Location: success.php');
            } else {
                echo 'failure2';
            }
        }
    }
}
?>

<section class="container grey-text">
    <h2 class="center">Installation Input Form</h4>
        <form class="white" method="POST">
            <label for="player-select">Please select a player that makes the installation</label>
            <input list="player-select" name="player-select">
            <datalist id="player-select">
                <?php
                include('config.php');
                $sql_query3 = "SELECT email FROM player";
                $result = mysqli_query($conn, $sql_query3);
                $players = mysqli_fetch_all($result, MYSQLI_ASSOC);
                ?>
                <?php foreach ($players as $player) { ?>
                    <option value="<?php echo $player['email'] ?>"></option>
                <?php } ?>

            </datalist>

           
            <label for="size_of_game">Size of Game</label>
            <input type="text" name="size_of_game" value="<?php echo $size_of_game ?>">
            <div class="red-text"><?php echo $errors['size_of_game']; ?></div>

            <label for="graphics">Recommended Graphics Card</label>
            <input type="text" name="graphics" value="<?php echo $graphics ?>">
            <div class="red-text"><?php echo $errors['graphics']; ?></div>

            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>


        </form>

</section>

<?php
include('footer.php');
?>
