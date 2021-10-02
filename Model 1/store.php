<?php
$dbPassword = "PhpFundamentals";
$dbUserName = "PhpFundamentals";
$dbServer = "localhost";
$dbName = "Tema1";

$connection = new PDO('mysql:host='.$dbServer.';dbname='.$dbName, $dbUserName, $dbPassword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO authors (id, title, author_name, publisher_name, publisher_year, created_at, update_at) VALUES ('{$_POST['id']}','{$_POST['title']}','{$_POST['author_name']}','{$_POST['publisher_name']}','{$_POST['publisher_year']}','{$_POST['created_at']}','{$_POST['update_at']}')";
$connection->exec($sql);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Store Page</title>
</head>
<body>
    <h2>Data Was Stored</h2>

    <form action="index.php">
            <div>
                Id: <?php echo $_POST['id']; ?>
            </div>
            <div>
                Title: <?php echo $_POST['title'] ?>
            </div>
            <div>
                Author: <?php echo $_POST['author_name']; ?>
            </div>
            <div>
                Publisher Name: <?php echo $_POST['publisher_name'] ?>
            </div>
            <div>
                Publisher Year: <?php echo $_POST['publisher_year'] ?>
            </div>
            <div>
                Date added: <?php echo $_POST['created_at'] ?>
            </div>
            <div>
                Last update: <?php echo $_POST['update_at'] ?>
            </div>
            <div>
                    <label>&nbsp;</label>
                    <input type="submit" name="submit" value="Save">
            </div>
    </form>
</body>
</html>