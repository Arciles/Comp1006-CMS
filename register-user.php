<?php
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-03-19
 * Time: 9:31 PM
 */
$pageTitle = "Information Page | Arciles Inc.";
require "header.php";

$userName = $_POST["username"];
$password = $_POST["password"];
$confirm = $_POST["confirm"];
$fullName = $_POST["fullname"];
$email = $_POST["email"];
$birthday = $_POST["birthday"];
$flagGoodToGo = true;
// Check necessary variables. Prompt an error if something is wrong
if (empty($userName)) {
	echo "<p>User name is required</p>";
	$flagGoodToGo = false;
}
if (empty($password)) {
	echo "<p>Password name is required</p>";
	$flagGoodToGo = false;
}
else if ($password != $confirm) {
	echo "<p>Confirm your password!</p>";
	$flagGoodToGo = false;
}
// Proceed to save operation if everything is Okay
if ($flagGoodToGo) {
	try {
		// Hash the password and call db connection part
		$passwordHash = hash("sha512", $password);
		require_once "db-connection.php";

		// Prepare the sql query and bind parameters
		$sql = 'INSERT INTO dbt_users (username, password, fullname, email, birthday) VALUES (:username, :password, :fullname, :email, :birthday)';
		$cmd = $conn -> prepare($sql);
		$cmd -> bindParam(":username", $userName, PDO::PARAM_STR,50);
		$cmd -> bindParam(":password", $passwordHash, PDO::PARAM_STR, 128);
		$cmd -> bindParam(":fullname", $fullName, PDO::PARAM_STR, 100);
		$cmd -> bindParam(":email", $email, PDO::PARAM_STR, 50);
		$cmd -> bindParam(":birthday", $birthday, PDO::PARAM_STR);

		// Execute and close connection
		$cmd -> execute();
		$conn = null;
		echo '
			<div class="container">
			<main>
				<h3>Registration Successful</h3>
				<p>Please <a href="login.php" title="Re-direct to login">click here</a> to go to login page.</p>
			</main>
			</div>';
	} catch (Exception $e) {
		echo $e->getMessage();
	}

}

