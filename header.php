<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
	<link rel="stylesheet" href="css/custom.css">
	<title><?php echo $pageTitle; ?></title>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a href="index.php" class="navbar-brand">Arciles CMS</a>
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="<?php echo ($pageName == "login") ? "active" : "" ;?>"><a href="login.php" title="Link to the login page"><i class="fa fa-sign-in"></i> Login</a></li>
				<li class="<?php echo ($pageName == "register") ? "active" : "" ;?>"><a href="register.php" title="link to the register page"><i class="fa fa-user-plus"></i> Register</a></li>
			</ul>
		</div>
	</div>
</div><!-- end of navbar -->
