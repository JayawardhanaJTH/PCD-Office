<?php
$page = 'login';

include 'support/header.php';
?>

<div class="container-fluid p-3">
	<div class="row justify-content-center">
		<div class="login-main p-2 col-10 col-md-6" style="border: 2px solid maroon; border-radius: 0px 30px 0px 30px;">
			<div class="text-center">
				<h1 class="font-x2" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
					Login</h1>
			</div>
			<div class="login-form p-2">

				<form action="php/login_exe.php" method="POST" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
					<div class="form-group">
						<label for="email">Email</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-at"></i></div>
							</div>
							<input class="form-control" type="email" name="email" placeholder="Email">
						</div>
						<span class="text-danger font-weight-bold"> </span>
					</div>
					<br>
					<div class="form-group">
						<label for="password">Password</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-key"></i></div>
							</div>
							<input class="form-control" type="password" id="password" name="password" autocomplete="false" placeholder="Password">

						</div>
						<div class="input-group">
							<input type="checkbox" class="form-check" id="showPass" onClick="showPassword()">
							<label for="showPass"> Show Password</label>
						</div>
						<span class="text-danger font-weight-bold"> </span>
						<small class="form-text"><a href="forget-password.php"> Forgot Password </a> / <a href="register.php"> Not a
								member register </a></small>
					</div>

					<div class="form-check">
						<input type="checkbox" class="form-check-input">
						<label for="remember" class="form-check-label">Remember</label>
					</div>
					<br>
					<div>
						<input type="submit" name="login_btn" class="btn btn-success" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="js/register.js"></script>
<?php
include "support/footer.php";
?>
<?php
if (isset($_SESSION['login_err'])) {
	$Err = $_SESSION['login_err'];
?>
	<script type='text/javascript'>
		error_popup('<?php echo $Err ?>');
	</script>
<?php
	unset($_SESSION['login_err']);
}
?>

<?php
if (isset($_SESSION['reset_password_send'])) {
	$value =  $_SESSION['reset_password_send'];
	if ($value) {
?>
		<script type='text/javascript'>
			success_popup("Your new password is sent to your email!");
		</script>
	<?php
		unset($_SESSION['reset_password_send']);
	} else {
	?>
		<script type='text/javascript'>
			error_popup("Error on send new password!");
		</script>
<?php
	}
	unset($_SESSION['login_err']);
}
?>

<?php

if (isset($_SESSION["FORM_SUBMITTED"])) {
	if ($_SESSION["FORM_SUBMITTED"] == true) {
		unset($_SESSION["FORM_SUBMITTED"]);

?>
		<script type="text/javascript">
			success_popup('Form has been Submitted');
		</script>
	<?php
	} else {

		unset($_SESSION["FORM_SUBMITTED"]);
	?>
		<script type="text/javascript">
			error_popup('Form has been not submitted');
		</script>
<?php
	}
}

?>
</body>

</html>