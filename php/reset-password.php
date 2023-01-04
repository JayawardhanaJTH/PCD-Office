<?php
session_start();

require_once(__DIR__ . '/../connection/connection.php');

if (isset($_POST['reset_btn'])) {
    $isStaff = false;
    $userId;

    $email = $_POST['email'];
    $pass = $_POST['newPassword'];

    $Err = '';
    $errflag = false;

    if (empty($email)) {
        $Err = "Please input email";
        $errflag = true;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $Err = "Invalid email format";
        $errflag = true;
    }

    $sanitized_email = mysqli_escape_string($conn, $email);
    $sanitized_password = mysqli_escape_string($conn, $pass);

    $people_statement = mysqli_prepare($conn, "SELECT peopleId FROM people WHERE email = ?");

    mysqli_stmt_bind_param($people_statement, 's', $sanitized_email);
    mysqli_stmt_execute($people_statement);
    mysqli_stmt_bind_result($people_statement, $peopleId);
    mysqli_stmt_fetch($people_statement);
    mysqli_stmt_close($people_statement);

    if (!$peopleId) {
        $staff_statement = mysqli_prepare($conn, "SELECT staffId FROM staff WHERE email = ?");

        mysqli_stmt_bind_param($staff_statement, 's', $sanitized_email);
        mysqli_stmt_execute($staff_statement);
        mysqli_stmt_bind_result($staff_statement, $staffId);
        mysqli_stmt_fetch($staff_statement);
        mysqli_stmt_close($staff_statement);

        if ($staffId) {
            $isStaff = true;
            $userId = $staffId;
        }
    } else {
        $userId = $peopleId;
    }


    if (!$userId && !$errflag) {
        $Err = "The entered email is not found! Please check and enter again.";
    }

    if ($userId && !$errflag) {

        $subject = "Reset Password";
        $headers = array(
            "From: pcdsecretaryoffice@gmail.com",
            "Reply-To: pcdsecretaryoffice@gmail.com",
            "X-Mailer: PHP/" . PHP_VERSION
        );
        $headers = implode("\r\n", $headers);

        //encrypt password
        $password = $sanitized_password;
        $encPass = md5($password);
        date_default_timezone_set('Asia/Colombo');

        $emailBody = "You have successfully changed your account Password on " . date('d M Y H:i:s') .
            "! If you did not make this change and believe your account has been compromised, 
        please login to site and reset password.";

        if (mail($sanitized_email, $subject, $emailBody, "From: pcdsecretaryoffice@gmail.com")) {

            //update database
            if ($isStaff) {
                $updateUserPasswordQuery = "UPDATE staff SET password='$encPass' WHERE staffId = '$userId'";
            } else {

                $updateUserPasswordQuery = "UPDATE people SET password='$encPass' WHERE peopleId = '$userId'";
            }
            mysqli_query($conn, $updateUserPasswordQuery);

            $_SESSION['reset_password_send'] = true;
            session_write_close();

            header("Location: ../login.php");
            exit();
        } else {
            $_SESSION['reset_password_send'] = false;
            session_write_close();

            header("Location: ../login.php");
            exit();
        }
    } else {
        $_SESSION['ERROR'] = true;
        $_SESSION['ERROR_MESSAGE'] = $Err;
        session_write_close();

        header("Location: ../forget-password.php");
        exit();
    }
}
