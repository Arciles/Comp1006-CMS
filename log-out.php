<?php ob_start();
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-03-20
 * Time: 10:35 AM
 */
session_start();
session_destroy();

header("location:index.php");

ob_flush();
