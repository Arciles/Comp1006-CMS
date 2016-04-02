<?php
session_start();
$pageTitle = "Content Managment System | Arciles Inc.";
if(!empty($_SESSION['fullname'])){
	require "user-header.php";
	echo "success";
} else {
	require "header.php";
}

?>
<div class="container">
	<main>
		<div class="row">
			<div class="col-lg-12">
				<div class="jumbotron">
					<h1>Welcome to my <br> Content Management System</h1>
					<p>This content management system helps you to create and keep track of your entries and posts.</p>
				</div>
			</div>
		</div>
	</main>
</div><!-- end of .container -->
<?php
require "footer.php";
?>