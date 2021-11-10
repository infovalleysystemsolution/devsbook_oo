<?php
$base = 'http://localhost:8691';

$db_name = "name_of_database";
$db_host = "host_of_database";
$db_user = "user_access_database";
$db_pass = "password_user_access_database";

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
