<?php
session_start();
require_once("../connection/connection.php");
    $form_id =  $_GET['id'];
    $form_type = $_GET['type'];
    $submit_status = $_GET['status'];
    $user_type = $_SESSION['TYPE'];

    if($form_type == '1'){
        $status = '3';
        if($submit_status == 'true'){
            $status = '1';
        }

        $sql2 = "SELECT * FROM business_registration WHERE f_id='$form_id'";

        $result = mysqli_query($conn,$sql2);
        $data = mysqli_fetch_assoc($result);

        $email = $data['b_email'];
        $submiter_id = $data['submitted_by'];

        $query = "SELECT * FROM people WHERE pid='$submiter_id'";

        $result2 = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result2);

        $username = $user['first_name']." ".$user['last_name'];

        if($user_type == '1'){
            $sql = "UPDATE business_registration SET secretary_approval = '$status' WHERE f_id ='$form_id'";
            mysqli_query($conn, $sql);

            if($status == '1'){
                $date = date('Y-m-d h:i:sa');
                $name = $_SESSION['username'];
                $sql = "UPDATE business_registration SET secretary_sign = '$name',approved_date='$date' WHERE f_id ='$form_id'";
                mysqli_query($conn, $sql);

                $to = $email;
                $mailSubject =  "Business registration Application Approved By Secretary.";
                $emailBody = "Dear <b> $username </b> your Application is Approved. <br>
                <br>Thank You !";
    
                $header = "From: secraterywththala@gmail.com\r\nContent-Type: text/html;";
    
                $sen = mail($to, $mailSubject, $emailBody, $header);
                header("location: ../approvals.php");
            }
            else{
                $to = $email;
                $mailSubject =  "Business registration Application Rejected By Secretary.";
                $emailBody = "Dear <b> $username </b> your Application is Rejected. <br>
                Please contact Secretary For more details. <br>
                <br>Thank You !";
    
                $header = "From: secraterywththala@gmail.com\r\nContent-Type: text/html;";
    
                $sen = mail($to, $mailSubject, $emailBody, $header);
                header("location: ../approvals.php");
            }
            

        }
        else if($user_type == '2'){
            $sql = "UPDATE business_registration SET grama_niladhari_approval = '$status' WHERE f_id ='$form_id'";
            mysqli_query($conn, $sql);

            if($status == '1'){

                $name = $_SESSION['username'];
                $sql = "UPDATE business_registration SET grama_niladhari_sign = '$name' WHERE f_id ='$form_id'";
                mysqli_query($conn, $sql);

                $to = $email;
                $mailSubject =  "Business registration Application Approved By Grama Niladhari.";
                $emailBody = "Dear <b> $username </b> your Application is Approved. <br>
                <br>Thank You !";
    
                $header = "From: secraterywththala@gmail.com\r\nContent-Type: text/html;";
    
                $sen = mail($to, $mailSubject, $emailBody, $header);

                header("location: ../approvals.php");
            }
            else{
                $to = $email;
                $mailSubject =  "Business registration Application Rejected By Grama Niladhari.";
                $emailBody = "Dear <b> $username </b> your Application is Rejected. <br>
                Please contact Grama Niladhari For more details. <br>
                <br>Thank You !";
    
                $header = "From: secraterywththala@gmail.com\r\nContent-Type: text/html;";
    
                $sen = mail($to, $mailSubject, $emailBody, $header);

                header("location: ../approvals.php");
            }
        }
        else{
            header("location: ../support/error.php");
        }
    }
    else if($form_type == '2'){
        $status = '3';
        if($submit_status == 'true'){
            $status = '1';
        }

        $sql2 = "SELECT * FROM requirement_application WHERE f_id='$form_id'";

        $result = mysqli_query($conn,$sql2);
        $data = mysqli_fetch_assoc($result);

        $email = $data['email'];
        $submiter_id = $data['submitted_by'];

        $query = "SELECT * FROM people WHERE pid='$submiter_id'";

        $result2 = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result2);

        $username = $user['first_name']." ".$user['last_name'];

        if($user_type == '2'){
            $sql = "UPDATE requirement_application SET grama_approval = '$status' WHERE f_id ='$form_id'";
            mysqli_query($conn, $sql);

            if($status == '1'){

                $date = date("Y-m-d");
                $name = $_SESSION['username'];
                $sql = "UPDATE requirement_application SET grama_niladhari_sign = '$name',approved_date='$date' WHERE f_id ='$form_id'";
                mysqli_query($conn, $sql);

                $to = $email;
                $mailSubject =  "Requirement Application Approved By Grama Niladhari.";
                $emailBody = "Dear <b> $username </b> your Application is Approved. <br>
                <br>Thank You !";
    
                $header = "From: secraterywththala@gmail.com\r\nContent-Type: text/html;";
    
                $sen = mail($to, $mailSubject, $emailBody, $header);
                header("location: ../approvals.php");
            }
            else{
                $to = $email;
                $mailSubject =  "Requirement Application Rejected By Grama Niladhari.";
                $emailBody = "Dear <b> $username </b> your Application is Rejected. <br>
                Please contact Grama Niladhari For more details. <br>
                <br>Thank You !";
    
                $header = "From: secraterywththala@gmail.com\r\nContent-Type: text/html;";
    
                $sen = mail($to, $mailSubject, $emailBody, $header);
                header("location: ../approvals.php");
            }
        }
        else{
            header("location: ../support/error.php");
        }
    }
    else if($form_type == '3'){
        $status = '3';
        if($submit_status == 'true'){
            $status = '1';
        }

        if($user_type == '1'){
            $sql = "UPDATE user SET approved = '$status' WHERE id ='$form_id'";
            mysqli_query($conn, $sql);

            $query = "SELECT * FROM user WHERE id='$form_id' ";
            
            $result = mysqli_query($conn,$query);
            $user = mysqli_fetch_assoc($result);

            $id = $user['id'];
            $username = $user['username'];
            $email = $user['email'];
            $password = $user['password'];

            if($status == '1'){

                $sql2 = "INSERT INTO user_login(id,username, email, password, type) 
                    VALUES ('$id','$username','$email','$password','2')";
    
                mysqli_query($conn, $sql2);

                $to = $email;
                $mailSubject =  "Secretary Division Account Created..";
                $emailBody = "Dear <b> $username </b> your account is created. <br>
                Now you can access Grama Niladhari options. <br>
                Your <b>Username :</b> $email <br>
                Your <b>Password :</b> $password <br>Thank You !";

                $header = "From: secraterywththala@gmail.com\r\nContent-Type: text/html;";

                $sen = mail($to, $mailSubject, $emailBody, $header);
                header("location: ../approvals.php");

            }else{
                $to = $email;
                $mailSubject =  "Secretary Division Account Rejected..";
                $emailBody = "Dear <b> $username </b> your account is Rejected. <br>
                Please contact Secretary For more details. <br>
                <br>Thank You !";

                $header = "From: secraterywththala@gmail.com\r\nContent-Type: text/html;";

                $sen = mail($to, $mailSubject, $emailBody, $header);
                header("location: ../approvals.php");
            }
        }
        else{
            header("location: ../support/error.php");
        }
    }
    else{
        header("location: ../support/error.php");
    }
?>