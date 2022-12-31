<?php
session_start();
require("../connection/connection.php");

if (isset($_POST['application_save'])) {

    $name = $_POST['name'];
    $childBelow = $_POST['childBelow'];
    $childAbove = $_POST['childAbove'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $nic = $_POST['nic'];
    $status = $_POST['status'];
    $contact = $_POST['contact'];
    $elecSeat = $_POST['elecSeat'];
    $division = $_POST['division'];
    $domain = $_POST['domain'];
    $referrer = $_POST['referrer'];
    $reason = $_POST['reason'];
    $description = $_POST['description'];
    $applicationNo = createApplicationNo($elecSeat, $reason);

    $sql = "INSERT INTO application(applicantName, nic, address, birthday, maritalStatus, childAbove18, 
                                childBelow18, contact, electoralSeat, referredPerson, villageDomain, regionalDivision, reason,description,applicationNo)
            VALUES ('$name','$nic','$address','$birthday','$status','$childAbove','$childBelow','$contact',
                            '$elecSeat','$referrer','$domain','$division','$reason','$description','$applicationNo')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION["FORM_SUBMITTED"] = true;
        session_write_close();

        if (isset($_SESSION['logged'])) {
            header('location: ../online_application_home.php');
        } else {
            header('location: ../login.php');
        }
        exit();
    } else {
        $_SESSION["FORM_SUBMITTED"] = false;
        session_write_close();

        // die ("Connection failed ".mysqli_query($conn, $sql) .$conn->connect_error);
        header('location: ../online_application_home.php');
        echo $conn->connect_error;
        exit();
    }
}

function createApplicationNo($seat, $reason): string
{
    require("../connection/connection.php");
    date_default_timezone_set('Asia/Colombo');

    $applicationCount = 1;
    $applicationNo = "PCD/" . $seat . "/" . $reason . "/";
    $date = date("y/m/d");

    $today = date("Y-m-d");
    $sql = "SELECT COUNT(applicationID) FROM application WHERE date= '$today'";
    $result = mysqli_query($conn, $sql);

    $data = mysqli_fetch_row($result);

    if ($data != null) {
        $count = $data[0];

        if ($count > 0) {
            $applicationCount = $count + 1;
        }
    }

    $applicationNo = $applicationNo . $date . "/" . $applicationCount;

    return $applicationNo;
}
