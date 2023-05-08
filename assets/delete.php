<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))
{
    
   $hostname = "localhost";
   $username = "root";
   $password = "";
   $databaseName = "guvitask";
   
   $connect = mysqli_connect($hostname, $username, $password, $databaseName);
   
   // get values form input text and number

$email1 = $_POST['email1'];
$password1 = $_POST['password1'];

   $query = "DELETE FROM register WHERE email1='$email1'and password1 = $password1";
   $update = mysqli_query($connect, $query);

   $details = "SELECT * FROM register WHERE email1 = '$email1' AND password1 = '$password1'";
   $result = mysqli_query($connect, $details);
   if(mysqli_num_rows($result) > 0)
   {
       echo "<script>alert('Account Deleted Successfully.'); window.location.href = 'index.html';</script>";
   }else{
       echo "<script>alert('Check Email and Password'); window.location.href = 'update.php';</script>";
   }
   mysqli_close($connect);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <script src="js/login.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <title>Delete Account</title>
</head>
<body style="background-image: url(../desola-lanre-ologun-zYgV-NGZtlA-unsplash.jpg);">
    <div class="container hz-menu">
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link active" href="../index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../register.html">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../login.html">Login</a>
          </li>
        </ul>
      </div>
    <div class="registration-form">
        <form name="myform1" method="POST">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <h2 class="text-center">Delete Account</h2>
            <div class="form-group">
                <input type="email" class="form-control item" id="email" name="email1" placeholder="Email" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" name="password1" placeholder="Password" required="">
            </div>
            <div id="errorbox"></div>
            <div class="form-group">
            <input type="submit" name="login" class="btn btn-block create-account" value="Delete Account">
                </div>
        </form>
        
    </div>

</body>
</html>