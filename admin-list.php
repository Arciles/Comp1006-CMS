<?php
/**
 * Created by PhpStorm.
 * User: esattahaibis
 * Date: 2016-03-22
 * Time: 1:52 PM
 */

require "user-header.php";

?>


<div class="container">
	<main>
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
			require_once "db-connection.php";
			// preapre sql and execute the command

			$sql = 'SELECT * FROM dbt_users';
			$cmd = $conn -> prepare($sql);
			$cmd -> execute();
			$rows = $cmd ->fetchAll();
			$conn = null;
			
			// Looping thru all the rows in the table
			foreach ($rows as $row) {
				echo "	<tr>
							<td>{$row['user_id']}</td>
							<td>{$row['username']}</td>
							<td>{$row['fullname']}</td>
							<td>{$row['email']}</td>
							<td>{$row['birthday']}</td>
							<td><a href='register.php?id={$row['user_id']}' class='btn btn-warning'>Edit</a></td>
							<td><a href='delete-user.php?id={$row['user_id']}' class='btn btn-danger confirmation'>Delete</a></td>
						</tr>";
			}
			?>
			</tbody>
		</table>
	</main>
</div>
<?php
require "footer.php";
?>