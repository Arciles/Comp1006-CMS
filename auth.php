<?php ob_start();
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-04-02
 * Time: 4:40 PM
 */

session_start();
if(empty($_SESSION['user_id'])) {
	header("location:login.php");
	exit;
}
ob_flush();