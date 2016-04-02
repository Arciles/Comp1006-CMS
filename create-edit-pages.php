<?php
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-04-02
 * Time: 1:12 PM
 */

require "user-header.php";

?>
<div class="container">
	<main>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<form method="post" action="">
					<div class="form-group">
						<label for="page-title">Enter page Title</label>
						<input type="text" class="form-control" id="page-title" name="page-title" max="25">
					</div>
					<div class="form-group">
						<label for="article-title">Enter Article Tiele</label>
						<input type="text" class="form-control" id="article-title" name="article-title" max="45">
					</div>
					<div class="form-group">
						<label for="article-text">Enter Your text</label>
						<textarea id="article-text" name="article-text" class="form-control" maxlength="1000" rows="6"></textarea>
					</div>
					<button class="btn btn-success pull-right">OK</button>
					<a href="admin-list.php" class="btn btn-warning pull-right">Cancel</a>
				</form>
			</div>
		</div>
	</main>
</div>

<?php
require "footer.php";
