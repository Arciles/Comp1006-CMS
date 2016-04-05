<?php
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-04-02
 * Time: 1:12 PM
 */
$pageTitle = "Create Pages | Arciles Inc.";
require "user-header.php";
$flagOk = true;

try {
	if (!empty($_GET['id']) && !empty($_SESSION['fullname'])) {
		$pageID = $_GET['id'];
	}else{
		$flagOk = false;
	}
	if ($flagOk){
		
		// Select page comes with and ID
		$sql = 'SELECT * FROM dbt_pages INNER JOIN dbt_users ON dbt_pages.author = dbt_users.user_id WHERE id = :id';
		$cmd = $conn -> prepare($sql);
		$cmd->bindParam(":id",$pageID,PDO::PARAM_INT);
		$cmd -> execute();
		$pages = $cmd ->fetchAll();
		$conn = null;
		
		foreach ($pages as $page){
			$_pageTitle = $page["page_title"];
			$_articleTitle = $page["article_title"];
			$_articleText = $page["article_text"];
		}
		
	}
} catch (Exception $e) {
	mail("esat.taha.ibis@outlook.com","CMS Error",$e->getMessage());
}

?>

<div class="container">
	<main>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<form method="post" action="page-save.php">
					<div class="form-group">
						<label for="page-title">Enter page Title</label>
						<input type="text" class="form-control" id="page-title" name="page-title" maxlength="25" value="<?php echo $_pageTitle; ?>">
					</div>
					<div class="form-group">
						<label for="article-title">Enter Article Title</label>
						<input type="text" class="form-control" id="article-title" name="article-title" maxlength="45" value="<?php echo $_articleTitle; ?>">
					</div>
					<div class="form-group">
						<label for="article-text">Enter Your text</label>
						<textarea id="article-text" name="article-text" class="form-control" rows="6"><?php echo $_articleText; ?></textarea>
					</div>
					<input type="hidden" name="datetime" value="<?php echo date("Y-m-d H:i:s"); ?>">
					<input type="hidden" name="page-id" value="<?php echo $pageID; ?>">
					<button type="submit" class="btn btn-success pull-right">OK</button>
					<a href="admin-list.php" class="btn btn-warning pull-right">Cancel</a>
				</form>
			</div>
		</div>
	</main>
</div>

<?php
require "footer.php";
