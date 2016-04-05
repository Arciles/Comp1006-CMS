<?php ob_start();
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-03-22
 * Time: 3:49 PM
 */

session_start();
require "auth.php";
require_once "db-connection.php";

try {
	
	$userId = $_GET['id'];
	
	$sql = "DELETE FROM dbt_users WHERE user_id= :user_id";
	
	$cmd = $conn -> prepare($sql);
	$cmd -> bindParam(":user_id",$userId,PDO::PARAM_INT);
	$cmd -> execute();
	$conn = null;
	
	if ($_SESSION['user_id'] == $userId){
		session_destroy();
		header("location:info.php");
	} else {
		header("location:admin-list.php");
	}
	
	
	
	
} catch (Exception $e) {
	mail("esat.taha.ibis@outlook.com","CMS Error",$e->getMessage());
}

ob_flush();