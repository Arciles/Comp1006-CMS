<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
	<link rel="stylesheet" href="css/custom.css">
	<title><?php session_start(); echo $pageTitle; ?></title>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a href="default.php" class="navbar-brand"><i class="fa fa-mouse-pointer fa-lg"></i> Arciles CMS</a>
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-hashtag"></i> <?php echo $_SESSION['fullname']; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="create-edit-pages.php"><i class="fa fa-plus"></i> Add Pages</a></li>
						<li><a href="admin-list.php" title="link to admin page"><i class="fa fa-lock"></i> Admin Page</a> </li>
						<li><a href="#"><i class="fa fa-wrench"></i> Settings</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="log-out.php"><i class="fa fa-times"></i> Log out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div><!-- end of navbar -->
