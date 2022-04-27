<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add a Player</h4>
    <form class="white" method="POST">

        <div>
            <label>Your Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label>Password</label>
            <input type="text" name="password">
        </div>

        <div>
            <label>First Name</label>
            <input type="text" name="first_name">
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" name="last_name">
        </div>
        <div>
            <label>Date of birth (YYYY/MM/DD) </label>
            <input type="text" name="date_of_birth">
        </div>
        <div>
            <label>Country of residence</label>
            <input type="text" name="country_of_residence">
        </div>
        <div class="center">
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

</html>

<?php
    session_start();
    if ($_SESSION['username'] != "admin") {
          header('location: admin_login.php');
    }
if (isset($_POST['submit'])) {
    include('config.php');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $country_of_residence = $_POST['country_of_residence'];

    if (!$_POST['email']) {
        $error .= "please Enter Your email";
    }
    if (!$_POST['password']) {
        $error .= "please Enter Your password";
    }
    if (!$_POST['first_name']) {
        $error .= "please Enter Your first_name";
    }
    if (!$_POST['last_name']) {
        $error .= "please Enter Your last_name";
    }
    if (!$_POST['date_of_birth']) {
        $error .= "please Enter Your DOB";
    }
    if (!$_POST['country_of_residence']) {
        $error .= "please Enter Your COR";
    }
    if (isset($error)) {
        echo "There Were error(s) In Your account info :" . $error;
    } else {

        $query = "INSERT INTO user (email, password) VALUES ('$email', '$password')"; 

        if (mysqli_query($conn, $query)) {
            $last_id = $conn->insert_id;
            $query2 = "INSERT INTO player (email,password,user_id,first_name,last_name,date_of_birth,country_of_residence) 
            VALUES ('$email','$password','$last_id','$first_name','$last_name','$date_of_birth','$country_of_residence')";
            if (mysqli_query($conn, $query2)) {
                header('Location: success.php');
            } else {
                header('Location: failure.php');
            }
        }
    }
}
?>
