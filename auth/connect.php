<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "crud";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if($conn->connect_error){
    echo "Could not connect to database: " . $conn->connect_error;
}

?>