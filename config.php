<?php
session_start();
$base = 'http://localhost:8691';

$db_name = "devsbook";
$db_host = "192.168.100.2";
$db_user = "adminuser";
$db_pass = "@AdminUser2005@";

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
