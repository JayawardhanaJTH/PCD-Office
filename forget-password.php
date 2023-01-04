<?php
$page = "resetPassword";
include 'support/header.php';
$type = "form";
?>

<div class="container-fluid p-3">
	<div class="row justify-content-center">
		<div class="login-main p-2 col-10 col-md-6" style="border: 2px solid maroon; border-radius: 0px 30px 0px 30px;">
			<div class="text-center">
				<h1 class="font-x2" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
					Reset Your Password</h1>
			</div>
			<div class="login-form p-2">

				<form action="php/reset-password.php" method="POST" onsubmit="return validateResetForm()" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" class="needs-validation" novalidate>
					<div class="form-group">
						<label for="email">Your email address</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-at"></i></div>
							</div>
							<input class="form-control" id="email" type="email" name="email" placeholder="Email" required>
							<div class="invalid-feedback">
								Please enter valid email.
							</div>
						</div>
						<span class="text-danger font-weight-bold"> </span>
					</div>
					<div class="form-group">
						<label for="newPassword">Your new password</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-key"></i></div>
							</div>
							<input class="form-control" type="password" id="newPassword" name="newPassword" aria-describedby="info" placeholder="Your new password" required>

							<div class="invalid-feedback">
								Please enter valid password.
							</div>
						</div>
						<div class="input-group">
							<input type="checkbox" class="form-check" id="showPass" onClick="showPassword()">
							<label for="showPass"> Show Password</label>
						</div>
						<small id="info" class="form-text text-muted">Your password must be 8-20 characters long, contain letters, special characters and numbers, and must not contain spaces, or emoji.</small>
						<span class="text-danger font-weight-bold"> </span>
					</div>

					<div>
						<input type="submit" name="reset_btn" class="btn btn-success" value="Reset">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include "support/footer.php";
?>
<?php
if (isset($_SESSION['ERROR'])) {
	$Err = $_SESSION['ERROR_MESSAGE'];
?>
	<script type='text/javascript'>
		error_popup('<?php echo $Err  ?>');
	</script>
<?php
	unset($_SESSION['ERROR']);
	unset($_SESSION['ERROR_MESSAGE']);
}
?>
<script src="/js/reset-password.js"></script>
<script>
	function showPassword() {
		var inputField = document.getElementById("newPassword");
		if (inputField.type === "password") {
			inputField.type = "text";
		} else {
			inputField.type = "password";
		}
	}
</script>
</body>

</html>