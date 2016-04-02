<?php session_start();
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-03-19
 * Time: 7:52 PM
 */
$pageTitle = "Register Page | Arciles Inc.";
$pageName = "register";
// If there is an id param use register page as edit page and check if is there a session if there is no session don't allow user to edit anything
if (!empty($_GET['id']) && !empty($_SESSION['fullname'])){
	// create a password flag
	$passFlag = true;
	// call user header beacuse user is already registered
	require "user-header.php";
	$userId = $_GET['id'];
	require_once "db-connection.php";
	// prepare query and execute command
	$sql = "SELECT * FROM dbt_users WHERE user_id = :user_id";
	$cmd = $conn -> prepare($sql);
	// bind id param
	$cmd -> bindParam("user_id",$userId,PDO::PARAM_INT);
	$cmd -> execute();
	$rows = $cmd ->fetchAll();
	$conn = null;
	// Loop thru user information

	foreach ($rows as $row) {
		$userName = $row['username'];
		$fullName = $row['fullname'];
		$email = $row['email'];
		$birthday = $row['birthday'];
	}

} else {
	require "header.php";
}
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
							<input type="text" class="form-control" name="username" id="username" placeholder="JohnDoe123" required value="<?php echo $userName?>">
							<label for="password">Password</label>
							<?php echo ($passFlag) ? "<br><label class='text-warning'> You need to reset your password!!</label>" : "" ?>
							<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
							<label for="confirm">Confirm Password</label>
							<input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm Password" required>
							<label id="warning" class="text-danger">Your password needs to mach!!!</label>
						</div>
					</fieldset>
					<fieldset>
						<legend>Personal Info</legend>
						<div class="form-group">
							<label for="fullname">Full Name</label>
							<input type="text" class="form-control" name="fullname" id="fullname" placeholder="John Doe" value="<?php echo $fullName?>">
							<label for="email">E-mail</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="example123@example.ca" required value="<?php echo $email?>">
							<label for="birthday">Birthday</label>
							<input type="date" class="form-control" name="birthday" id="birthday" placeholder="Date" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $birthday?>">
							<input type="hidden" name="user_id" value="<?php echo $userId?>">
						</div>
					</fieldset>
					<button type="submit" class="btn btn-info pull-right">Submit</button>
				</form>
			</div>
		</div>
	</main>
</div>
<?php require "footer.php"; ?>