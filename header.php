<?php
	require_once "db-connection.php";

$sql = "SELECT * FROM dbt_site_image";
$cmd = $conn -> prepare($sql);
$cmd -> execute();
$count = $cmd->rowCount();

if ($count == 0) {

} else {
	$brandImg = $cmd->fetch()["image_address"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $pageTitle; ?></title>
	<script src="js/modernizr-custom.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/jquery-ui-1.11.4.custom/jquery-ui.css">
	<link rel="stylesheet" href="vendor/jquery-ui-1.11.4.custom/jquery-ui.theme.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
	<link rel="stylesheet" href="css/custom.css">
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a href="default.php" class="navbar-brand <?php echo (!empty($brandImg)) ? "image-class" : ""; ?>"><?php
				if (!empty($brandImg)){
					echo "<img class='brand-image' src='image/$brandImg' alt='Brand Image' height='50' width='50'>";
				} else {
					echo "<i class=\"fa fa-mouse-pointer fa-lg\"></i>";
				}
				?>      Arciles CMS</a>
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="<?php echo ($pageName == "login") ? "active" : "" ;?>"><a href="login.php" title="Link to the login page"><i class="fa fa-user"></i> Login</a></li>
				<li class="<?php echo ($pageName == "register") ? "active" : "" ;?>"><a href="register.php" title="link to the register page"><i class="fa fa-user-plus"></i> Register</a></li>
			</ul>
		</div>
	</div>
</div><!-- end of navbar -->
