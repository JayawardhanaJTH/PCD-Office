<?php
session_start();

require_once(__DIR__ . '/../connection/connection.php');

$Err = '';

if (isset($_POST['login_btn'])) {
	// get user entered email and password to variables
	$email = $_POST['email'];
	$password = $_POST['password'];

	$Err = '';
	$errflag = false;

	if (empty($email)) {
		$Err = "Please input email";
		$errflag = true;
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$Err = "Invalid email format";
		$errflag = true;
	}
	if (empty($password)) {
		$Err = "Please input password";
		$errflag = true;
	}

	if (!$errflag) {


		// avoid sql injection
		$email = mysqli_real_escape_string($conn, trim($email));
		$password = mysqli_real_escape_string($conn, trim($password));

		$encPassword = md5($password);

		// query to check is user valid or not
		$staff_query = "SELECT * FROM staff WHERE email = '$email' AND password = '$encPassword' ";
		$people_query = "SELECT * FROM people WHERE email = '$email' AND password = '$encPassword' ";

		$staff = mysqli_query($conn, $staff_query);
		$people = mysqli_query($conn, $people_query);

		if (mysqli_num_rows($staff) == 1) {
			session_regenerate_id();
			$user = mysqli_fetch_assoc($staff);

			$_SESSION['logged'] = true;
			$_SESSION['username'] = $user['username'];
			$_SESSION['TYPE'] = $user['type'];
			$_SESSION['USER_ID'] = $user['staffId'];

			//set cookie to 1 hour
			setcookie("loginSession", md5($use['staffId']), time() + (3600), '/');

			session_write_close();

			header("Location: ../index.php");
			exit();
		} else if (mysqli_num_rows($people) == 1) {
			session_regenerate_id();
			$user = mysqli_fetch_assoc($people);

			$_SESSION['logged'] = true;
			$_SESSION['username'] = $user['username'];
			$_SESSION['TYPE'] = '0';
			$_SESSION['USER_ID'] = $user['peopleId'];
			$_SESSION['USER_NIC'] = $user['nic'];
			$_SESSION['USER_EMAIL'] = $email;

			//set cookie to 1 hour
			setcookie("loginSession", md5($use['id']), time() + (3600), '/');

			session_write_close();

			header("Location: ../index.php");
			exit();
		} else {
			$Err = "Invalid email or password";
			$_SESSION['login_err'] = $Err;

			session_write_close();

			header("Location: ../login.php");
			exit();
		}
	} else {

		$_SESSION['login_err'] = $Err;

		session_write_close();

		header("Location: ../login.php");
		exit();
	}
}
