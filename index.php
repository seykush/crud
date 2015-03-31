<?php
require 'db/connect.php';

$select = $db->query("SELECT * FROM staff ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Creating A Simple CRUD Application | TutorialsLodge</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>A SIMPLE CRUD APPLICATION</h1>
			<p><a class="btn create" href="create.php">CREATE</a></p>
			<?php
			if (!$select->num_rows) {
				echo '<p>', 'No records', '</p>';
			}else{
			?>
				<table border="1" width="100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Date Joined</th>
						<th>Staff Bio Data</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while ($row = $select->fetch_object()) {
				?>
					<tr>
						<td><?php echo $row->name;?></td>
						<td><?php echo $row->position;?></td>
						<td><?php echo $row->joined;?></td>
						<td><?php echo substr($row->bio, 0, 20), '...';?></td>
						<td><a class="btn read" href="view.php?id=<?php echo $row->id; ?>">READ</a>&nbsp;<a class="btn update" href="edit.php?id=<?php echo $row->id; ?>">UPDATE</a>&nbsp;<a class="btn delete" href="delete.php?id=<?php echo $row->id; ?>">DELETE</a></td>
					</tr>
				</tbody>
			<?php
			}
			?>
			</table>
			<?php
			}
			?>
		</div>
	</body>
</html>>