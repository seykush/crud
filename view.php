<?php
require 'db/connect.php';

if(isset($_GET)){
	$id = $_GET['id'];

	$read = $db->prepare("SELECT name, position, joined, bio FROM staff WHERE id = ?");
	$read->bind_param('i', $id);
	$read->execute();
	$read->bind_result($name, $position, $joined, $bio);

	$data = $read->fetch();
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
			<h1>Read Staff Details</h1>
			<table class="table">
				<tr>
					<td>Name:</td>
					<td><?php echo $name; ?></td>
				</tr>
				<tr>
					<td>Position</td>
					<td><?php echo $position; ?></td>
				</tr>				
				<tr>
					<td>Date Joined</td>
					<td><?php echo $joined; ?></td>
				</tr>
				<tr>
					<td>Staff Bio Data</td>
					<td><?php echo $bio; ?></td>
				</tr>
				<tr>
					<td></td>
					<td><a class="btn" href="index.php">BACK</a></td>
				</tr>
			</table>
		</div>
	</body>
</html>
