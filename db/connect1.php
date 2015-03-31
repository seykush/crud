<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "crud";

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

if($conn->connect_error){
    echo "Could not connect: " . $conn->connect_error;
}

