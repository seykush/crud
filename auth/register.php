<?php require "connect.php" ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration Form</title>
    </head>
    <body>
        <h1>Register</h1>
        
        <form action="register.php" method="post">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" required="required"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" required="required"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Register" name="submit"></td>
                </tr>
            </table>
        </form>
        <p>If you already have an account, <a href="login.php">click here</a> to Log In</p>
    </body>
</html>

<?php 


//validation function
function validation($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//validation
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    $username = validation($_POST['username']);
    $password_hash = validation($_POST['password']);
    $password = hash('ripemd160', $password_hash);
    $bool = true;

    $sql = "SELECT username FROM users";
    $result = $conn->query($sql);
    

    while($row = $result->fetch_assoc()){
        $existing_user = $row['username'];
        if($username == $existing_user){
            $bool = false;
            echo "<script>alert('Sorry! Username is already taken. Choose a new one');</script>";
        }  
    }

//Creating new user
    $query = "INSERT INTO users (username, password) VALUES (?, ?)";

 
     

        if($bool){
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ss', $username, $password);
            $stmt->execute();
            header("location:http://localhost/crud/index1.php");
        }
}
?>

