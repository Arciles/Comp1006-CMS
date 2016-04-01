<?php session_start();
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-03-19
 * Time: 9:31 PM
 */
$pageTitle = "Information Page | Arciles Inc.";
if(!empty($_SESSION['fullname'])){
	require "user-header.php";
	echo "success";
} else {
	require "header.php";
}

$userName = $_POST["username"];
$password = $_POST["password"];
$confirm = $_POST["confirm"];
$fullName = $_POST["fullname"];
$email = $_POST["email"];
$birthday = $_POST["birthday"];
$user_id = $_POST['user_id'];
$errMassage = "";
$flagEdit = false;
$flagGoodToGo = true;
// Check necessary variables. Prompt an error if something is wrong
if (empty($userName)) {
	$errMassage .= "<br>User name is required";
	$flagGoodToGo = false;
}
if (empty($password)) {
	$errMassage .= " <br>Password is required";
	$flagGoodToGo = false;
}
else if ($password != $confirm) {
	$errMassage .= "<br>Confirm your password!";
	$flagGoodToGo = false;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errMassage .= "<br>This ($email) email address is invalid. Please enter a valid email address.";
	$flagGoodToGo = false;
}
if (!empty($user_id)) {
	$flagEdit = true;
}

// open db connection and check that email is already registered
require_once "db-connection.php";
if ($flagEdit == false){
	$querry = "SELECT * FROM dbt_users WHERE email = :email OR username = :username";
	$check = $conn ->prepare($querry);
	$check -> bindParam(":email",$email,PDO::PARAM_STR);
	$check -> bindParam(":username",$userName,PDO::PARAM_STR);
	$check -> execute();
	$count = $check->rowCount();
	if($count == 0){
		$flagGoodToGo = true;
		var_dump($check->rowCount());
	} else {
		$errMassage .= "Email or User name is already in use.";
		$flagGoodToGo = false;
	}

}

// Proceed to save operation if everything is Okay
if ($flagGoodToGo) {
	// Hash the password
	$passwordHash = hash("sha512", $password);
	try {

		if ($flagEdit) {
			// this part is editing an existing user
			$sql = "UPDATE dbt_users SET username = :username, password = :password, fullname = :fullname, email = :email, birthday = :birthday WHERE user_id = :user_id";
			$cmd = $conn -> prepare($sql);
			$cmd -> bindParam("user_id",$user_id,PDO::PARAM_INT);
		} else {
			// this part is for creating adn non-existing user
			// Prepare the sql query and bind parameters
			$sql = 'INSERT INTO dbt_users (username, password, fullname, email, birthday) VALUES (:username, :password, :fullname, :email, :birthday)';
			$cmd = $conn->prepare($sql);
		}
		$cmd->bindParam(":username", $userName, PDO::PARAM_STR, 50);
		$cmd->bindParam(":password", $passwordHash, PDO::PARAM_STR, 128);
		$cmd->bindParam(":fullname", $fullName, PDO::PARAM_STR, 100);
		$cmd->bindParam(":email", $email, PDO::PARAM_STR, 50);
		$cmd->bindParam(":birthday", $birthday, PDO::PARAM_STR);

		// Execute and close connection
		$cmd->execute();
		$conn = null;
		if (!$flagEdit){
			echo '
			<div class="container">
			<main>
				<h3>Registration Successful</h3>
				<p>Please <a href="login.php" title="Re-direct to login">click here</a> to go to login page.</p>
			</main>
			</div>';
		} else {
			echo '
			<div class="container">
			<main>
				<h3>Update Successful</h3>
				<p>Please <a href="admin-list.php" title="Re-direct to admin page">click here</a> to go to Admin page.</p>
			</main>
			</div>';
		}

	} catch (Exception $e) {
		echo $e->getMessage();
	}
require "footer.php";
}
else {
	$conn = null;
	echo "
			<div class='container'>
			<main>
				<h3>Registration Failed</h3>
				<p>{$errMassage}</p>
			</main>
			</div>";
}

