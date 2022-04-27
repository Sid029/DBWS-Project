<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add a Publisher</h4>
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
            <label>Company Tax ID</label>
            <input type="text" name="company_tax_id">
        </div>
        <div>
            <label>Company Name</label>
            <input type="text" name="company_name">
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
    $company_name = $_POST['company_name'];
    $company_tax_id = $_POST['company_tax_id'];

    if (!$_POST['email']) {
        $error .= "<br/>please Enter Your email";
    }
    if (!$_POST['password']) {
        $error .= "<br/>please Enter Your password";
    }
    if (!$_POST['company_name']) {
        $error .= "<br/>please Enter Your company name";
    }
    if (!$_POST['company_tax_id']) {
        $error .= "<br/>please Enter Your company tax id";
    }
    if (isset($error)) {
        echo "There Were error(s) In Your account info :" . $error;
    } else {

        
        $query = "INSERT INTO user (email, password) VALUES ('$email', '$password')";

        if (mysqli_query($conn, $query)) {

            $last_id = $conn->insert_id;
            $query1 = "INSERT INTO publisher (email,password,user_id,company_name,company_tax_id) 
            VALUES ('$email','$password','$last_id','$company_name','$company_tax_id')";
            if (mysqli_query($conn, $query1)) {
                header('Location: success.php');
            } else {
                header('Location: failure.php');
            }
        } 
    }
}
?>
