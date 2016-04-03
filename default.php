<?php
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-03-31
 * Time: 11:39 PM
 */

$pageTitle = "Welcome | Arciles Inc.";
session_start();
if(!empty($_SESSION['fullname'])){
	require "user-header.php";
	echo "success";
} else {
	require "header.php";
}

$sql = "SELECT id, page_title FROM dbt_pages ORDER BY id";
$cmd = $conn->prepare($sql);
$cmd ->execute();
$pages = $cmd->fetchAll();

$pageNumber = $pages[0]['id'];

if (!empty($_GET["number"])){
	$pageNumber = $_GET["number"];
}

$sql = "SELECT * FROM dbt_pages WHERE id = :id";
$cmd = $conn->prepare($sql);
$cmd ->bindParam(":id",$pageNumber,PDO::PARAM_INT);
$cmd ->execute();
$pageInfo = $cmd->fetch();
$conn = null;
?>
<div class="container">
	<main>
		<div class="row">
			<div class="col-md-3">
				<aside>
					<div class="list-group" role="navigation" id="sideNavigation">
						<span href="#" class="list-group-item active">
							Pages
						</span>

						<?php
						foreach ($pages as $page){
							echo "<a href='default.php?number={$page["id"]}' class='list-group-item'>
									<i class='fa fa-comment-o'></i> {$page["page_title"]}
								  </a>";
						}

						?>

					</div>
				</aside>
			</div>
			<div class="col-md-9">
				<div class="page-header">
					<h1><?php echo $pageInfo['article_title']?></h1>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<p><?php echo $pageInfo['article_text']; ?></p>
					</div>
				</div>
			</div>
		</div>
		
	</main>
</div>
<?php
require "footer.php";




