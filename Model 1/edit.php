<?php
require 'DB.php';

$query = "SELECT `id`, `title`, `author_name`, `publisher_name`, `publisher_year`, `created_at`, `update_at` FROM `authors` WHERE id='{$_GET['id']}'";
$resulObj = $connection->query($query);

$i=0;
if($resulObj->rowCount())
{
    foreach($resulObj as $elem)
    {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Page</title>
</head>
<body>

    <h2>Edit Article</h2>
    <form method="post" action="update.php">
            <div>
                <textarea name="id" cols="25" rows="1"><?php echo $elem['id']; ?></textarea>
            </div>
            <div>
                <textarea name="title" cols="25" rows="1"><?php echo $elem['title']; ?></textarea>
            </div>
            <div>
                <textarea name="author_name" cols="25" rows="1"><?php echo $elem['author_name']; ?></textarea>
            </div>
            <div>
                <textarea name="publisher_name" cols="25" rows="1"><?php echo $elem['publisher_name']; ?></textarea>
            </div>
            <div>
                <textarea name="publisher_year" cols="25" rows="1"><?php echo $elem['publisher_year']; ?></textarea>
            </div>
            <div>
                <textarea readonly name="create_at" cols="25" rows="1"><?php echo $elem['created_at']; ?></textarea>
            </div>
            <div>
                <textarea name="update_at" cols="25" rows="1"><?php echo $elem['update_at']; ?></textarea>
            </div>
            <div>
                    <label>&nbsp;</label>
                    <input type="submit" name="submit" value="Save">
            </div>
    </form>


    <button type="button"><a href="index.php">Back</button>
</body>
</html>

<?php
        }
    }
?>