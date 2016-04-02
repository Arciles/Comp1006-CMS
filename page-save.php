<?php ob_start();
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-04-02
 * Time: 4:39 PM
 */

require "auth.php";
require "db-connection.php";
session_start();
$_pageID = $_POST["page-id"];
$_pageTitle = $_POST["page-title"];
$_articleTitle = $_POST["article-title"];
$_articleText = $_POST["article-text"];
$_date = $_POST["datetime"];
$isNew = false;

if (empty($_pageID)) {
	$isNew = true;
}
if ($isNew){
	$sql = 'INSERT INTO dbt_pages (page_title, article_title, article_text, author, create_time) VALUES (:page_title, :article_title, :article_text, :author, :create_time)';
	$cmd = $conn -> prepare($sql);
	$cmd -> bindParam(":author",$_SESSION['user_id'],PDO::PARAM_INT);
}else {
	$sql = "UPDATE dbt_pages SET page_title = :page_title, article_title = :article_title, article_text = :article_text, create_time = :create_time WHERE id = :page_id";
	$cmd = $conn -> prepare($sql);
	$cmd -> bindParam(":page_id",$_pageID,PDO::PARAM_INT);
}

$cmd -> bindParam(":page_title",$_pageTitle,PDO::PARAM_STR);
$cmd -> bindParam(":article_title",$_articleTitle,PDO::PARAM_STR);
$cmd -> bindParam(":article_text",$_articleText,PDO::PARAM_STR);
$cmd -> bindParam(":create_time",$_date,PDO::PARAM_STR);

$cmd -> execute();
$conn = null;

header("location: admin-list.php");


ob_flush();