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

    $encPass = md5($password);

    $sql = "INSERT INTO user(firstname, lastname, username, email, contact, nic, password, electoralseat) 
            VALUES ('$firstname', '$lastname', '$username' , '$email', '$phone', '$nic' , '$encPass' ,'$elecSeat')";



    if (mysqli_query($conn, $sql)) {

        //get inserted user
        $query = "SELECT * FROM user WHERE email='$email' AND password='$encPass'";

        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        $id = $user['id'];

        $sql2 = "INSERT INTO user_login(id,username, email, password, type) 
                    VALUES ('$id','$username','$email','$encPass','2')";

        mysqli_query($conn, $sql2);

        $to = $email;
        $mailSubject =  "PCD Office Account Created..";
        $emailBody = "Dear <b> $username </b> your account is created. <br>
                Now you can access PCD Office options. <br>
                Your <b>Username :</b> $email <br>
                Your <b>Password :</b> $password <br>Thank You !";

        $header = "From: secraterywththala@gmail.com\r\nContent-Type: text/html;";

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