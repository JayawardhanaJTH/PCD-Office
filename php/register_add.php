<?php
session_start();
require_once("../connection/connection.php");
?>
<?php
if ($_POST['register']) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone  = $_POST['phone'];
    $nic = $_POST['nic'];
    $password = $_POST['password'];
    $rePassword = $_POST['repassword'];
    $elecSeat = $_POST['elecSeat'];
    $address = $_POST['address'];

    $encPass = md5($password);

    //check the email is already used
    $query = "SELECT peopleId FROM people WHERE email='$email'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) != 0) {
        $_SESSION['EMAIL_USED'] = true;
        session_write_close();

        header("location: ../register.php");
        exit();
    }

    $sql = "INSERT INTO people(firstname, lastname, username, email, contact, nic, password, electoralseat, address) 
            VALUES ('$firstname', '$lastname', '$username' , '$email', '$phone', '$nic' , '$encPass' ,'$elecSeat', '$address')";



    if (mysqli_query($conn, $sql)) {

        $to = $email;
        $mailSubject =  "PCD Office Account Created..";
        $emailBody = "Dear <b> $username </b> your account is created. <br>
                Now you can access PCD Office options. <br>
                Your <b>Username :</b> $email <br>
                Your <b>Password :</b> $password <br>Thank You !";

        $header = "From: pcdsecretaryoffice@gmail.com\r\nContent-Type: text/html;";

        if (mail($to, $mailSubject, $emailBody, $header)) {

            $_SESSION['REGISTERED'] = true;
            session_write_close();

            header("location: ../register.php");
            exit();
        } else {
            $_SESSION['REGISTERED'] = false;
            session_write_close();

            header("location: ../register.php");
            exit();
        }
    } else {
        $_SESSION['REGISTERED'] = false;
        session_write_close();

        header("location: ../register.php");
        exit();
    }
}
?>