<?php
$firstname1 = $_POST['firstname1'];
$lastname1 = $_POST['lastname1'];
$email1 = $_POST['email1'];
$password1 = $_POST['password1'];
$retype_password1 = $_POST['retype_password1'];
$phone_number1 = $_POST['phone_number1'];
$birth_date1 = $_POST['birth_date1'];
$gender1 = $_POST['gender1'];
$country1 = $_POST['country1'];


if (!empty($firstname1) || !empty($lastname1) || !empty($email1) || !empty($password1) || !empty($retype_password1) || !empty($phone_number1) || !empty($birth_date1) || !empty($gender1) || !empty($country1)) {
    if ($password1 == $retype_password1) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "guvitask";
        $conn = new mysqli("localhost","root","","guvitask");

        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        } else {
            $SELECT = "SELECT email1 From register Where email1 = ? Limit 1";
            $INSERT = "INSERT Into register (firstname1 , lastname1 , email1 ,password1, retype_password1,phone_number1,birth_date1,gender1,country1 )values(?,?,?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $email1);
            $stmt->execute();
            $stmt->bind_result($email1);
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sssssssss", $firstname1, $lastname1, $email1, $password1, $retype_password1, $phone_number1, $birth_date1, $gender1, $country1);
                $stmt->execute();

                echo "<script>alert('Account Created Successfully.'); window.location.href = '../login.html';</script>";
            } else {
                echo "<script>alert('Account already exists with this Email.'); window.location.href = '../register.html';</script>";
            }
            $stmt->close();
            $conn->close();
        }
    } else {
        echo 'Password not match.Go back and re-type password.';
    }
} else {
    echo "All field are required";
    die();
}

?>