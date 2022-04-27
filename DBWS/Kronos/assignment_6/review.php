<?php 
    include('header.php'); 
?>

<?php

    $score = $comments = '';
    $errors = array('score' => '', 'comments' => '');
    
    if (isset($_POST['submit'])) {

        if (!($_POST['score'])) {
            $errors['score'] = 'Score field is required.';
        } else {
            $score = $_POST['score'];
        }

        if (!($_POST['comments'])) {
            $errors['comments'] = 'Comment field is required.';
        } else {
            $comments = $_POST['comments'];
        }
        
        if (array_filter($errors)) {
            echo 'The form still contains errors.';
        } else {
            
            include('config.php');

            $selected = $_POST['game-select']; 

            echo $selected;

            $sql_query4 = "SELECT game_id FROM game WHERE name='$selected'";
            
            if (mysqli_query($conn, $sql_query4)) {
                $game_id = mysqli_query($conn, $sql_query4);
                $g_id = mysqli_fetch_row($game_id); 
                $g = $g_id[0];

            } else {
                echo 'failure';
            }
            $score = mysqli_real_escape_string($conn, $_POST['score']);
            $comments = mysqli_real_escape_string($conn, $_POST['comments']);

            $sql_query = "INSERT INTO review(score, comments) VALUES ('$score','$comments')";

            if (mysqli_query($conn, $sql_query)) {
                $last_id = $conn->insert_id;
                $sql_query2 = "INSERT INTO gets(review_id, game_id) VALUES ('$last_id','$g')";
                if (mysqli_query($conn, $sql_query2)) {
                    header('Location: success.php');
                
                } else {
                    header('Location: failure.php');
                }

            }
        } 
    }             
?>

        <section class="container grey-text">
            <h2 class="center">Review Input Form</h4>
            <form class="white" method="POST">
                <label for="game-select">Please select a game to review.</label> 
                <input list = "game-select" name="game-select">
                <datalist id="game-select">
                    <?php
                    include('config.php');
                    $sql_query3 = "SELECT name FROM game";
                    $result = mysqli_query($conn, $sql_query3);
                    $games = mysqli_fetch_all($result, MYSQLI_ASSOC); 
                    ?>
                    <?php foreach ($games as $game) {?>
                        <option value="<?php echo $game['name'] ?>"></option>
                    <?php } ?>
                    
                </datalist>
                
                <label for="score">Score</label>
                <input type="range" name="score" value="<?php echo $score ?>" min="0" max="10" step="1">
                <div class="red-text"><?php echo $errors['score']; ?></div>
                <label for="comments">Comments</label>
                <input type="text" name="comments" value="<?php echo $comments ?>">
                <div class="red-text"><?php echo $errors['comments']; ?></div>
                <div class="center">
                    <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
                </div>

                
            </form>

        </section>

<?php 
    include('footer.php'); 
?>