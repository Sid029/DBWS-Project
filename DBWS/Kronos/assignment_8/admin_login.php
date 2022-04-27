<?php
    require("config.php")
?>
<html>
<head>
    <title>
        ADMIN LOGIN
    </title>
</head>
<body style="color: beige; background-color: black" >
<h2 style="text-align: center;font-size:70px; color: beige">ADMIN LOGIN</h2>
<br><br><br><br>
    <div class="login-form" style="background-color: grey; width: 500px; margin: auto; padding: 10px">
        <br><br>
        <form style="margin: auto; padding: 10px" method="POST">
            <div class="input_field">
                <label>Username:</label>
                <input type="text" style="width:100%;height:4%;" placeholder="Username" name="username">
            </div>
            <br><br>
            <div class="input_field">
                <label>Password:</label>
                <input type="password" style="width:100%;height:4%;" placeholder="Password" name="password">
            </div>
            <br><br>
            <button style="background-color: green;  color: beige; border: 2px solid #4CAF50;width:100%;height:4%;" name="Signin">Sign in</button>
        </form>
        <br><br>
    </div>


    
<?php
if(isset($_POST['Signin']))
{
    $query="SELECT * FROM `admin_users` WHERE `username` = '$_POST[username]' AND `password` = '$_POST[password]'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $_SESSION['username']=$_POST['username'];
        header("location: maintenance.php");
    }
    else
    {
        echo "<script>alert('Incorrect Username/Password')</script>";
    }
}
?>
</body>
</html>
