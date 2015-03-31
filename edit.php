<?php
require 'db/connect.php';

//update button from index.php
if (isset($_GET['id'])) {
	$id = $_REQUEST['id'];

	$update = $db->prepare("SELECT name, position, joined, bio FROM staff WHERE id = ?");
	$update->bind_param('i', $id);
	$update->execute();
	$update->bind_result($name, $position, $joined, $bio);

	$data = $update->fetch();
}

//update button from edit.php
if (isset($_POST['update'])) {
	$name 		= $_POST['name'];
	$position 	= $_POST['position'];
	$bio 		= $_POST['bio'];
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}

	$update = $db->prepare("UPDATE staff SET name = ?, position = ?, bio = ? WHERE id = ?");
	$update->bind_param('sssi', $name, $position, $bio, $id);
	if($update->execute()){
		header("location:index.php");
	} else {
            echo $update->error_list;
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
			<h1>Edit Staff</h1>
			<form action="" method="post">
				<table class="table">
					<tr>
						<td><label for="name">Name:</label></td>
						<td><input type="text" id="name" name="name" value="<?php echo $name;?>"></td>
					</tr>
					<tr>
						<td><label for="position">Position:</label></td>
						<td><input type="text" id="position" name="position" value="<?php echo $position;?>"></td>
					</tr>				
					<tr>
						<td><label for="bio">Bio:</label></td>
						<td><textarea id="bio" name="bio"><?php echo $bio;?></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><button class="update" name="update">UPDATE</button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn" href="index.php">BACK</a></td>
					</tr>
				</table>
			</form>
			
		</div>
	</body>
</html>

