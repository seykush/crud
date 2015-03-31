<?php
    require "connect.php";
    session_start();
    $username = mysql_real_escape_string($_POST['username']);
    $password_hash = mysql_real_escape_string($_POST['password']);
    $password = hash('ripemd160', $password_hash);
    $bool = true;

    $result = $conn->query("Select * from users WHERE username='$username'");
    $row_cnt = $result->num_rows; //Checks if username exists
    $table_users = "";
    $table_password = "";
    if($row_cnt > 0) //IF there are no returning rows or no existing username
    {
       while($row = $result->fetch_assoc()) // display all rows from query
       {
          $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
          $table_password = $row['password']; // the first password row is passed on to $table_password, and so on until the query is finished
       }
       if(($username == $table_users) && ($password == $table_password))// checks if there are any matching fields
       {
          if($password == $table_password)
          {
             $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
             header("location: http://localhost/crud/index1.php"); // redirects the user to the authenticated home page
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