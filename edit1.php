<?php
require "db/connect1.php";

if(isset($_GET['id'])){
    $id = $_REQUEST['id'];
    
    $query = "SELECT name, position, bio, joined FROM staff WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($name, $position, $bio, $joined);
    $data = $stmt->fetch();
}

$conn = NULL;

require "db/connect1.php";

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $bio = $_POST['bio'];
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $update = $conn->prepare("UPDATE staff SET name = ?, position = ?, bio = ? WHERE id = ?");
    $update->bind_param('sssi', $name, $position, $bio, $id);
    
    if($update->execute()){
        header("location:index1.php");
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