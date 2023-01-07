<?php
session_start();
require_once("../connection/connection.php");

if (isset($_POST['feedbackSubmit'])) {
    $Err = false;
    $applicationId = $_POST['id'];
    $feedback = $_POST['feedback'];
    $userNic = $_SESSION['USER_NIC'];

    $sql = "INSERT INTO feedback (feedback,peopleNic,applicationId) VALUES('$feedback','$userNic','$applicationId')";
    if (!mysqli_query($conn, $sql)) {
        $Err = true;
    }

    if ($Err) {
        $_SESSION["ERROR"] = true;
        $_SESSION["MESSAGE"] = "Error on submit feedback";
    } else {
        $_SESSION["ERROR"] = false;
        $_SESSION["MESSAGE"] = "Feedback submitted";
    }

    header('location: ../view_application.php?id=' . $applicationId);

    exit();
} else {
    echo "not set";
}
