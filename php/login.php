<?php

session_start();
$databaseConnection = mysqli_connect("localhost", "root", "", "guvitask");

// check if connection succeeded
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// check if login form submitted
if (isset($_POST['login'])) {
    $email1 = $_POST['email1'];
    $password1 = $_POST['password1'];

    // fetch user from MySQL Users table
    $query = "SELECT * FROM register WHERE email1 = '$email1' AND password1 = '$password1'";
    $result = mysqli_query($databaseConnection, $query);

    if (mysqli_num_rows($result) > 0) {
        // user found, create session
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email1'] = $row['email1'];

        // redirect to the profile page
        header('Location: ../assets/profile.html');
        exit();
    } else {
        // user not found, show error message
        echo "<script>alert('Check Email and Password.'); window.location.href = '../login.html';</script>";
        exit();
    }
}

// close MySQL connection
mysqli_close($databaseConnection);

?>