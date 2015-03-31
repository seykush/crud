<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "crud";

$db = new mysqli($db_server, $db_user, $db_pass, $db_name);

if($db->connect_errno){
    echo "Could not connect to database." . $db->connect_errno;
}