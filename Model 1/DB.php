<?php

$dbPassword = "PhpFundamentals";
$dbUserName = "PhpFundamentals";
$dbServer = "localhost";
$dbName = "Tema1";

$connection = new PDO('mysql:host='.$dbServer.';dbname='.$dbName, $dbUserName, $dbPassword);
?>