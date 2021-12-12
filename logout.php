<?php
require 'config.php';
$_SESSION['token'] = '';
$_SESSION['logado'] = '0';
header("Location:".$base);
exit;