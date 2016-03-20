<?php
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-03-19
 * Time: 7:52 PM
 */
$pageTitle = "Register Page | Arciles Inc.";
$pageName = "register";
require "header.php";
?>
<div class="container">
	<main>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<form method="post" action="register-user.php">
					<fieldset>
						<legend>User Info</legend>
						<div class="form-group">
							<label for="username">User name</label>
							<input type="text" class="form-control" name="username" id="username" placeholder="JohnDoe123" required>
							<label for="password">Password</label>
							<input type="text" class="form-control" name="password" id="password" placeholder="Password" required>
							<label for="confirm">Confirm Password</label>
							<input type="text" class="form-control" name="confirm" id="confirm" placeholder="Confirm Password" required>
						</div>
					</fieldset>
					<fieldset>
						<legend>Personal Info</legend>
						<div class="form-group">
							<label for="fullname">Full Name</label>
							<input type="text" class="form-control" name="fullname" id="fullname" placeholder="John Doe">
							<label for="email">E-mail</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="example123@example.ca">
							<label for="birthday">Birthday</label>
							<input type="date" class="form-control" name="birthday" id="birthday" max="<?php echo date('Y-m-d'); ?>">
						</div>
					</fieldset>
					<button type="submit" class="btn btn-info pull-right">Submit</button>
				</form>
			</div>
		</div>
	</main>
</div>
<?php require "footer.php"; ?>