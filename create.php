<?php require "db/connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Creating A Simple CRUD Application | TutorialsLodge</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>Create New Staff</h1>
			<span class="error"><?php if(isset($error)) echo $error;?></span>
                        <span class="success"><?php if(isset($success)) echo $success;?></span>
			<form action="" method="post">
				<table class="table">
					<tr>
						<td><label for="name">Name:</label></td>
						<td><input type="text" id="name" name="name"></td>
					</tr>
					<tr>
						<td><label for="position">Position:</label></td>
						<td><input type="text" id="position" name="position"></td>
					</tr>				
					<tr>
						<td><label for="bio">Bio:</label></td>
						<td><textarea id="bio" name="bio"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" class="create" name="create">CREATE</button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn" href="index.php">BACK</a></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>

<?php 
$error = "";
$success = "";

if(isset($_POST['create'])){
    $name = trim($_POST['name']);
    $position = trim($_POST['position']);
    $bio = trim($_POST['bio']);
}

if(empty($name) && empty($position) && empty($bio)){
    $error = "You must fill all the fields.";
} else {
    $insert = $db->prepare("INSERT INTO staff (name, position, bio, joined) VALUES (?, ?, ?, NOW())");
    $insert->bind_param("sss", $name, $position, $bio);
    
    if($insert->execute()){
    header("location: index.php");
    }
}

?>
