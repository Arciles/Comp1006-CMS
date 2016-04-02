<?php
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-03-19
 * Time: 7:52 PM
 */

$pageTitle = "Login Page | Arciles Inc.";
$pageName = "login";
require "header.php";
?>
<div class="container">
	<main>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<div class="panel panel-info">
					<div class="panel-body">
						<form method="post" action="login-user.php">
							<div class="form-group">
								<label for="username">User Name</label>
								<input type="text" class="form-control" name="username" id="username" placeholder="JaneDoe123" required>
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
							</div>
							<button type="submit" class="btn btn-primary pull-right">Login</button>
							<a href="default.php" class="btn btn-danger pull-right">Cancel</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
<?php
require "footer.php";
