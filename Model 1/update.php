<?php
$dbPassword = "PhpFundamentals";
$dbUserName = "PhpFundamentals";
$dbServer = "localhost";
$dbName = "Tema1";

$date = date("Y/m/d");

$connection = new PDO('mysql:host='.$dbServer.';dbname='.$dbName, $dbUserName, $dbPassword);
$connection->exec("SET CHARACTER SET utf8");
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 
"UPDATE `authors`   
   SET `id` = :id,
       `title` = :title,
       `author_name` = :author_name,
       `publisher_name` = :publisher_name,
       `publisher_year` = :publisher_year,
       `update_at` = :update_at 
 WHERE `id` = '{$_POST['id']}'";

$statement = $connection->prepare($sql);
$statement->bindValue(":id", $_POST['id']);
$statement->bindValue(":title", $_POST['title']);
$statement->bindValue(":author_name", $_POST['author_name']);
$statement->bindValue(":publisher_name", $_POST['publisher_name']);
$statement->bindValue(":publisher_year", $_POST['publisher_year']);
$statement->bindValue(":update_at", $_POST['update_at']);

$count = $statement->execute();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Update Page</title>
</head>
<body>
    <h2>Data Was Stored</h2>

    <form action="index.php">
            <div>
                Id: <?php echo $_POST['id']; ?>
            </div>
            <div>
                Title: <?php echo $_POST['title']; ?>
            </div>
            <div>
                Author: <?php echo $_POST['author_name']; ?>
            </div>
            <div>
                Publisher Name: <?php echo $_POST['publisher_name']; ?>
            </div>
            <div>
                Publisher Year: <?php echo $_POST['publisher_year']; ?>
            </div>
            <div>
                Last update: <?php echo date("Y/m/d"); ?>
            </div>
            <div>
                    <label>&nbsp;</label>
                    <input type="submit" name="submit" value="Save">
            </div>
    </form>
</body>
</html>