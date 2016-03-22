<?php ob_start();
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-03-22
 * Time: 3:49 PM
 */
$userId = $_GET['id'];

require_once "db-connection.php";

$sql = "DELETE FROM dbt_users WHERE user_id= :user_id";

$cmd = $conn -> prepare($sql);
$cmd -> bindParam(":user_id",$userId,PDO::PARAM_INT);
$cmd -> execute();
$conn = null;

session_start();
if ($_SESSION['user_id'] == $userId){
	session_destroy();
	header("location:index.php");
} else {
	header("location:admin-list.php");
}



ob_flush();