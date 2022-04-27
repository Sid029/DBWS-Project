<?php 
    include('header.php'); 
?>
<?php

    $name = $platform = $description = $media = '';
    $errors = array('name' => '', 'platform' => '', 'description' => '', 'media' => '');
    if (isset($_POST['submit'])) {

        if (!($_POST['name'])) {
            $errors['name'] = 'Name field is required.';
        } else {
            $name = $_POST['name'];
        }

        if (!($_POST['platform'])) {
            $errors['platform'] = 'Platform field is required.';
        } else {
            $platform = $_POST['platform'];
        }

        if (!($_POST['description'])) {
            $errors['description'] = 'Description field is required.';
        } else {
            $description = $_POST['description'];
        }

        if (!($_POST['media'])) {
            $errors['media'] = 'Media field is required.';
        } else {
            $media = $_POST['media'];
        }
        
        if (array_filter($errors)) {
            echo 'The form still contains errors.';
        } else {
            include('config.php');
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $platform = mysqli_real_escape_string($conn, $_POST['platform']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $media = mysqli_real_escape_string($conn, $_POST['media']);

            $sql_query = "INSERT INTO game(media, name, platform, description) 
            VALUES ('$media', '$name', '$platform', '$description')";

            if (mysqli_query($conn, $sql_query)) {
                header('Location: success.php');
            } else {
                echo 'query error: '.mysqli_error($conn);
            }

        }
    }              
?>

        <section class="container grey-text">
            <h2 class="center">Game Input Form</h4>
            <form class="white" method="POST">
                <label for="name">Name</label>
                <input type="text" name="name" value="<?php echo $name ?>">
                <div class="red-text"><?php echo $errors['name']; ?></div>
                <label for="platform">Platform</label>
                <input type="text" name="platform" value="<?php echo $platform ?>">
                <div class="red-text"><?php echo $errors['platform']; ?></div>
                <label for="description">Description</label>
                <input type="text" name="description" value="<?php echo $description ?>">
                <div class="red-text"><?php echo $errors['description']; ?></div>
                <label for="media">Media</label>
                <input type="text" name="media" value="<?php echo $media ?>">
                <div class="red-text"><?php echo $errors['media']; ?></div>
                <div class="center">
                    <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
                </div>

                
            </form>

        </section>

<?php 
    include('footer.php'); 
?>