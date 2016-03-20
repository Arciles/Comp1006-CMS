<?php
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-03-19
 * Time: 10:14 PM
 */

$pageTitle = "Successfully Login | Arciles Inc.";
require "header.php";
echo "<div class='container'> <main>";
$userName = $_POST["username"];
$password = $_POST["password"];
$flagEverythingOkay = true;

// Check variables. Pop a massage if variables are empty
if (empty($userName)) {
	echo "User name is required!";
	$flagEverythingOkay = false;
}
if (empty($password)) {
	echo "Password is required!";
	$flagEverythingOkay = false;
}
// Check flag for everything is ready to go
if ($flagEverythingOkay) {
	$passwordHash = hash("sha512", $password);
	require_once "db-connection.php";

	// prepare query, creade command, bind parameters, execute command and close connection
	$sql = 'SELECT * FROM dbt_users WHERE username = :username AND password = :password';
	$cmd = $conn ->prepare($sql);
	$cmd -> bindParam(":username", $userName, PDO::PARAM_STR);
	$cmd -> bindParam(":password", $passwordHash, PDO::PARAM_STR);
	$cmd -> execute();
	$datas = $cmd->fetchAll();
	$count = $cmd->rowCount();
	$conn = null;

	// check is data is valid. If it is, start the session

	if ($count == 0) {
		echo "<h3>Invalid Username or Password. Please try again.</h3>";
	} else {
		session_start();
		foreach ($datas as $user) {
			$_SESSION['user_id'] = $user['user_id'];
			echo "<h3>You successfully logged in.</h3>";
		}
	}
}
echo "</main> </div>";
require "footer.php";