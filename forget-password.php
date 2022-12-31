<?php
$page = "resetPassword";
include 'support/header.php';
?>

<div class="container-fluid p-3">
	<div class="row justify-content-center">
		<div class="login-main p-2 col-10 col-md-6" style="border: 2px solid maroon; border-radius: 0px 30px 0px 30px;">
			<div class="text-center">
				<h1 class="font-x2" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
					Reset Your Password</h1>
			</div>
			<div class="login-form p-2">

				<form action="php/reset-password.php" method="POST" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
					<div class="form-group">
						<label for="email">Your email address</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-at"></i></div>
							</div>
							<input class="form-control" type="email" name="email" placeholder="Email" required>
						</div>
						<span class="text-muted h6">Your new password will send to your email!</span>
						<span class="text-danger font-weight-bold"> </span>
					</div>
					<br>

					<br>
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
if (isset($_SESSION['user_not_found'])) {
	$Err = $_SESSION['user_not_found'];
?>
	<script type='text/javascript'>
		error_popup("The entered email is not found! Please check and enter again.");
	</script>
<?php
	unset($_SESSION['user_not_found']);
}
?>
</body>

</html>