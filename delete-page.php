<?php ob_start();
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-04-02
 * Time: 3:38 PM
 */
require "auth.php";
require_once "db-connection.php";

$pageID = $_GET['id'];

$sql = "DELETE FROM dbt_pages WHERE id = :page_id";
$cmd = $conn -> prepare($sql);

$cmd -> bindParam(":page_id",$pageID,PDO::PARAM_INT);
$cmd->execute();

$conn = null;

header("location: admin-list.php");

ob_flush();