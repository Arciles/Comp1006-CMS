<?php
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-03-19
 * Time: 7:52 PM
 */
$pageTitle = "Register Page | Arciles Inc.";
$pageName = "register";
require "header.php";
?>
<div class="container">
	<main>
		<div class="row">
			<div class="col-lg-8">
				<form>
					<fieldset>
						<legend>User Info</legend>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
						</div>
					</fieldset>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="exampleInputFile">File input</label>
						<input type="file" id="exampleInputFile">
						<p class="help-block">Example block-level help text here.</p>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox"> Check me out
						</label>
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</main>
</div>
<?php require "footer.php"; ?>