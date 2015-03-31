<?php require "db/connect1.php"; ?>

<html>
    <head>
        <title>Create a staff member</title>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <table>
                <tr>
                <td>Name:</td>
                <td><input type="text" name="name" id="name"></td>
                </tr>
                <tr>
                    <td>Position: </td>
                    <td><input type="text" name="position" id="position"></td>
                </tr>
                <tr>
                    <td>Bio:</td>
                    <td><textarea name="bio" id="bio" rows="10" cols="30"></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Submit" id="submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>

<?php

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
$name = test_input($_POST['name']);
$position = test_input($_POST['position']);
$bio = test_input($_POST['bio']);
}

$query = "INSERT INTO staff (name, position, bio, joined) VALUES(?,?,?, NOW())";

if(empty($name) && empty($position) && empty($bio)){
    echo "You must fill all the fields";
} else {
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $name, $position, $bio);
    $stmt->execute();
    header("location:index1.php");
}
?>