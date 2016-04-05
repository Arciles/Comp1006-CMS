<?php ob_start();
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-04-03
 * Time: 2:07 PM
 */
require "auth.php";
require_once "db-connection.php";

try {
	if (!empty($_FILES['site-image']['name'])) {
		$logoName = $_FILES['site-image']['name'];
		$type = $_FILES['site-image']['type'];
		
		if ($type == "image/png" || $type == "image/jpeg"){
			$finalName = session_id() . "-" .$logoName;
			move_uploaded_file($_FILES['site-image']['tmp_name'], "image/$finalName");
			
			// Get the file name of old file and delete
			$sql = "SELECT image_address FROM dbt_site_image";
			$cmd = $conn -> prepare($sql);
			$cmd -> execute();
			$fileName = $cmd -> fetch();
			$fullPath = "image/". $fileName["image_address"];
			
			// Overwrite the address in the data base
			if (!empty($fileName)){
				$sql = "UPDATE dbt_site_image SET image_name = :image_name,image_address = :image_address WHERE id = 1";
			} else {
				$sql = "INSERT INTO dbt_site_image (id, image_name, image_address) VALUE (1, :image_name, :image_address)";
			}
			$cmd = $conn -> prepare($sql);
			$cmd -> bindParam(":image_name",$logoName,PDO::PARAM_STR);
			$cmd -> bindParam(":image_address", $finalName, PDO::PARAM_STR);
			$cmd -> execute();
			
			if (!empty($fileName)) {
				unlink($fullPath);
			}
		}else {
			$errMessage = "Logo must be a JPG or PNG";
			$isOkay = false;
		}
		
	}
	header("location: admin-list.php");
} catch (Exception $e) {
	mail("esat.taha.ibis@outlook.com","CMS Error",$e->getMessage());
}


ob_flush();