<html>
    <head>
        <title>Login Form</title>
    </head>
    <body>
        <h1>Login</h1>
        
        <form action="checklogin.php" method="post">
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
                    <td><input type="submit" value="Login" name="submit"></td>
                </tr>
                
            </table>
        </form>
        <p>If you don't have an account, <a href="register.php">click here</a> to Register</p>
    </body>
</html>
