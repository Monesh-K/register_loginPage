<?php


session_start();

if (!isset($_SESSION['email1'])) {
    header('Location: ../login.html');
    exit();
} else {

    //connect to SQL database
    $databaseConnection = mysqli_connect("localhost", "root", "", "guvitask");

    //check if connection to database was successful
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $userEmail = $_SESSION['email1'];

    //fetch user data from SQL database
    $query = "SELECT * FROM register WHERE email1 = '$userEmail'";
    $result = mysqli_query($databaseConnection, $query);

    //check if query was successful
    if (!$result) {
        echo "Error fetching user data: " . mysqli_error($databaseConnection);
        exit();
    }

    $fetch = mysqli_fetch_assoc($result);

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
    <script src="../js/register.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Profile site</title>
</head>

<body style="background-image: url(../desola-lanre-ologun-zYgV-NGZtlA-unsplash.jpg);">
    <!-- <h1>Profile</h1> -->
    <div class="registration-form">
        <form name="myform2" method="POST">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <h2 class="text-center">Welcome <?php echo $fetch['firstname1']; ?>!!</h2>
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="fixed" value="<?php echo $fetch['firstname1']; ?>" class="form-control item" id="firstname"
                    name="firstname1" placeholder="Firstname" readonly>
            </div>
            <div class="form-group">
                <label for="firstname">Lastname</label>
                <input type="fixed" class="form-control item" id="lastname" name="lastname1" placeholder="Lastname"
                    value="<?php echo $fetch['lastname1']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="firstname">Email</label>
                <input type="email" class="form-control item" id="email" name="email1" placeholder="Email"
                    value="<?php echo $fetch['email1']; ?>" readonly>

            </div>
            <div class="form-group">
                <label for="firstname">Password</label>
                <input type="password" class="form-control item" id="password" name="password1" placeholder="Password"
                    value="<?php echo $fetch['password1']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="firstname">Phone Number</label>
                <input type="fixed" class="form-control item" id="phone-number" name="phone_number1"
                    placeholder="Phone Number" value="<?php echo $fetch['phone_number1']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="firstname">Birth Date</label>
                <input type="fixed" class="form-control item" id="birth-date" name="birth_date1"
                    placeholder="Birth Date" value="<?php echo $fetch['birth_date1']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="firstname">Gender</label>
                <input type="fixed" class="form-control item" id="gender" name="gender1" placeholder="Gender"
                    value="<?php echo $fetch['gender1']; ?>" readonly>

            </div>
            <div class="form-group">
                <label for="firstname">Country</label>

                <input type="fixed" class="form-control item" id="country" name="country1" placeholder="Country"
                    value="<?php echo $fetch['country1']; ?>" readonly>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account"><a href="../assets/logout.php"
                        style="text-decoration:none ;color:#fff">Logout</a></button>
            </div>



        </form>
    </div>
</body>

</html>