<?php
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-04-02
 * Time: 10:52 PM
 */


$pageTitle = "Page not Found | Arciles Inc.";
require "header.php";

?>
	<div class="container">
		<main>
			<div class="jumbotron">
				<h1>
					Oops!</h1>
				<h2>
					500 Internal Error</h2>
				<div class="error-details">
					Sorry, something went wrong!
				</div>
				<div class="error-actions">
					<a href="default.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
						Take Me Home </a>
				</div>
		</main>
	</div>
<?php
require "footer.php";