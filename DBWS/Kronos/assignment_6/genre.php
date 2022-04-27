<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add Genre</h4>
    <form class="white" action="genre.php" method="POST">

        <label> Genre Type </label>
        <input type="text" name="genre-type">

        <div class="center">
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </div>

    </form>
</section>

</html>

<?php
if (isset($_POST['submit'])) {
    include('config.php');

    $genre_type = $_POST['genre-type'];

    if (!$_POST['genre-type']) {
        $error .= "Please Enter A Genre Type";
    }

    if (isset($error)) {
        echo "Still errors :" . $error;
    } else {
        $query = "INSERT INTO genre (genre_type) VALUES ('$genre_type')";

        if (mysqli_query($conn, $query)) {
            header("Location: ./success.php");
        } else {
            header("Location: ./failure.php");
        }
    }
}
?>