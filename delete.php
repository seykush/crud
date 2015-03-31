<?php
require 'db/connect.php';

if (isset($_POST['delete'])) {
	
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}

	$delete = $db->prepare("DELETE FROM staff WHERE id = ?");
	$delete->bind_param('i', $id);
	if($delete->execute()){
		header("location:index.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Creating A Simple CRUD Application | TutorialsLodge</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>Delete Staff</h1>
			<p>You are about to delete this staff, do you want to continue?</p>
			<form action="" method="post">
				<table class="table">
					<tr>
						<td><button type="submit" class="delete" name="delete">DELETE</button></td>
						<td><a class="btn" href="index.php">BACK</a></td>
					</tr>
				</table>
			</form>	
		</div>
	</body>
</html>