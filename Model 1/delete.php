<?php
$dbPassword = "PhpFundamentals";
$dbUserName = "PhpFundamentals";
$dbServer = "localhost";
$dbName = "Tema1";


$connection = new PDO('mysql:host='.$dbServer.';dbname='.$dbName, $dbUserName, $dbPassword);

$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// sql to delete a record
$sql = "DELETE FROM authors WHERE id='{$_GET['id']}'";

// use exec() because no results are returned
$connection->exec($sql);

header('location:index.php');
?>