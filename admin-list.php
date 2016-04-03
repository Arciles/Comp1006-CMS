<?php
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-03-22
 * Time: 1:52 PM
 */

require "user-header.php";


// preapre sql and execute the command
// This sql is for gettin all the users from database
$sql = 'SELECT * FROM dbt_users';
$cmd = $conn -> prepare($sql);
$cmd -> execute();
$users = $cmd ->fetchAll();

// This query is for gettin all the pages information from database

$sql = 'SELECT * FROM dbt_pages INNER JOIN dbt_users ON dbt_pages.author = dbt_users.user_id';
$cmd = $conn -> prepare($sql);
$cmd -> execute();
$pages = $cmd ->fetchAll();

$conn = null;
?>


<div class="container">
	<main>
		<nav>
			<ul id="adminNav" class="nav nav-tabs" data-tabs="tabs">
				<li class="active"><a href="#Users" data-toggle="tab">Users</a></li>
				<li><a href="#Pages" data-toggle="tab">Pages</a></li>
				<li><a href="#PageImage" data-toggle="tab">Brand Image</a></li>
			</ul>
		</nav>
		<div class="tab-content">
			<!--Users Section-->
			<div class="tab-pane active" id="Users">
				<h1>All Users</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>User Name</th>
							<th>Full Name</th>
							<th>E-mail</th>
							<th>Birth Date</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
					<?php
					// Looping thru all the rows in the table
					foreach ($users as $user) {
						echo "	<tr>
									<td>{$user['user_id']}</td>
									<td>{$user['username']}</td>
									<td>{$user['fullname']}</td>
									<td>{$user['email']}</td>
									<td>{$user['birthday']}</td>
									<td><a href='register.php?id={$user['user_id']}' class='btn btn-warning'>Edit</a></td>
									<td><a href='delete-user.php?id={$user['user_id']}' class='btn btn-danger confirmation'>Delete</a></td>
								</tr>";
					}
					?>
					</tbody>
				</table>
			</div>

			<!--Pages Section-->
			<div class="tab-pane" id="Pages">
				<!--TODO: create pages list here-->
				<h1>All Pages</h1>
				<table class="table table-striped">
					<thead>
					<tr>
						<th>ID</th>
						<th>Page Title</th>
						<th>Article Title</th>
						<th>Author</th>
						<th>Create Date</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
					</thead>
					<tbody>
					<?php
					// Looping thru all the rows in the table
					foreach ($pages as $page) {
						echo "	<tr>
									<td>{$page['id']}</td>
									<td>{$page['page_title']}</td>
									<td>{$page['article_title']}</td>
									<td>{$page['fullname']}</td>
									<td>{$page['create_time']}</td>
									<td><a href='create-edit-pages.php?id={$page['id']}' class='btn btn-warning'>Edit</a></td>
									<td><a href='delete-page.php?id={$page['id']}' class='btn btn-danger confirmation'>Delete</a></td>
								</tr>";
					}
					?>
					</tbody>
				</table>
			</div>
			<!--Page Image Upload Section-->
			<div class="tab-pane" id="PageImage">
				<!--TODO: create pages list here-->
				<h1>Upload Brand Image</h1>
				<div class="row">
					<div class="col-md-4">
						<form action="save-image.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="imageUpload">Select your image ( squre images for best result ) </label>
								<input type="file" name="site-image" id="imageUpload">
							</div>
							<br>
							<button class="btn btn-success">Upload</button>
						</form>
					</div>
					<label class="text-danger"><?php echo $errMessage; ?></label>
					<div class="col-md-5 col-md-offset-2">
						<img src="" class="thumbnail" width="500" id="image" alt="Image preview for user">
					</div>
				</div>

			</div>
		</div>
	</main>
</div>
<?php
require "footer.php";
?>