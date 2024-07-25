<?php
include 'partials/nav.php';
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
$servername ="localhost" ;
$username = "root";
$passsword = "";
$database = "user";
$conn = mysqli_connect($servername, $username, $passsword, $database);
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    $sql = "Select * from signup where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: index.php");
        } 
    else{
        $showError = true;
    }
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Login</title>
</head>
<body>
    <?php
    // if($login){
    // echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    //     <strong>Success!</strong> You are logged in
    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         <span aria-hidden="true">&times;</span>
    //     </button>
    // </div> ';
    // }
    if($showError){
    echo ' <div class="alert" role="alert">
        <strong>Error! Please check username or password!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
   
    ?>

<div class="container">
    <div class="login-form">
        <form action="login.php" method="POST">
            <div>
                <label for="username">Username:</label>
                <input  type="text" class="form-control" id="username" name="username"  required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div>
                <input type="submit" value="Login">
            </div>
            <br>
            <a href="signup.php">Don't Have an account?</a>
        </form>
    </div>
    <div class="image-section"></div>
</div>
</body>
</html>
