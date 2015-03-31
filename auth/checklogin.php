<?php
    require "connect.php";
    session_start();
    
    $username = mysql_real_escape_string($_POST['username']);
    $password_hash = mysql_real_escape_string($_POST['password']);
    $password = hash('ripemd160', $password_hash);


    $result = $conn->query("Select * from users WHERE username='$username'");
    $row_cnt = $result->num_rows; 
    $table_users = "";
    $table_password = "";
    if($row_cnt > 0) 
    {
       while($row = $result->fetch_assoc()) 
       {
          $table_users = $row['username']; 
          $table_password = $row['password'];
       }
       if(($username == $table_users) && ($password == $table_password))
       {
          if($password == $table_password)
          {
             $_SESSION['user'] = $username; 
             header("location: http://localhost/crud/index1.php"); 
          }
       }
       else
       {
        echo "<script>alert('Incorrect Password');</script>";
        Print '<script>window.location.assign("login.php");</script>';
       }
    }
    else
    {
        echo "<script>alert('Incorrect Username');</script>";
        Print '<script>window.location.assign("login.php");</script>';
    }
?>