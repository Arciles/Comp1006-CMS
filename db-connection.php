<?php
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-03-19
 * Time: 9:33 PM
 */

try {
	$conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200327914', 'gc200327914', '^HS3wWvE');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
}