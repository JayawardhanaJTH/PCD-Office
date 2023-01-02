<?php
session_start();
require_once("../connection/connection.php");
$form_id =  $_GET['id'];
$submit_status = $_GET['status'];
$user_type = $_SESSION['TYPE'];
$comment = $_GET['comment'];

$status = '3';
if ($submit_status == 'Approve') {
    $status = '1';
}

$sql2 = "SELECT * FROM application WHERE applicationId='$form_id'";

$result = mysqli_query($conn, $sql2);
$application = mysqli_fetch_assoc($result);

$submiter_id = $application['nic'];

$query = "SELECT * FROM people WHERE nic='$submiter_id'";

$result2 = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result2);

$username = $user['first_name'] . " " . $user['last_name'];
$email = $user['email'];

$code = $application['reason'];

$sql3 = "SELECT categoryName FROM application_category WHERE categoryCode = '$code'";
$result3 = mysqli_query($conn, $sql3);
$cat = mysqli_fetch_assoc($result3);

$date = date('Y-m-d h:i:sa');
$name = $_SESSION['username'];
$sql = "UPDATE application SET approval = '$status', approved_sign = '$name',approved_date='$date', comment = '$comment' WHERE applicationId ='$form_id'";
mysqli_query($conn, $sql);

if ($status == '1') {

    $to = $email;
    $mailSubject =  $cat['categoryName'] . " Application Approved.";
    $emailBody = "Dear <b> " . $application['applicantName'] . "</b> your Application (" . ($application['applicationNo']) . ") is Approved. <br>
                <br>Thank You !";

    $header = "From: pcdsecretaryoffice@gmail.com\r\nContent-Type: text/html;";

    $sen = mail($to, $mailSubject, $emailBody, $header);
    header("location: ../approvals.php");
} else {
    $to = $email;
    $mailSubject =  $cat['categoryName'] . " Application Rejected.";
    $emailBody = "Dear <b> " . $application['applicantName'] . "</b> your Application (" . ($application['applicationNo']) . ") is Rejected. <br>
                Please contact PCD Office (011-2142882) For more details. <br>
                <br>Thank You !";

    $header = "From: pcdsecretaryoffice@gmail.com\r\nContent-Type: text/html;";

    $sen = mail($to, $mailSubject, $emailBody, $header);
    header("location: ../approvals.php");
}
