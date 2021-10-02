<?php
require 'DB.php';

$query = "SELECT `id`, `title`, `author_name`, `publisher_name`, `publisher_year`, `created_at`, `update_at` FROM `authors` ORDER BY `id`";
$resulObj = $connection->query($query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Page</title>
</head>
<body>

    <h2>Add New Author</h2>

    <div id="content">
        <form method="post" action="store.php" enctype="multipart/form-data">
            <div>
                <textarea name="id" id="" cols="25" rows="1" placeholder="Id"></textarea>
            </div>
            <div>
                <textarea name="title" id="" cols="25" rows="1" placeholder="Title"></textarea>
            </div>
            <div>
                <textarea name="author_name" id="" cols="25" rows="1" placeholder="Author Name"></textarea>
            </div>
            <div>
                <textarea name="publisher_name" id="" cols="25" rows="1" placeholder="Publisher Name"></textarea>
            </div>
            <div>
                <textarea name="publisher_year" id="" cols="25" rows="1" placeholder="Publisher Year"></textarea>
            </div>
            <div>
                <textarea readonly name="created_at" id="" cols="25" rows="1"><?php echo date("Y/m/d"); ?></textarea>
            </div>
            <div>
                <textarea readonly name="update_at" id="" cols="25" rows="1"><?php echo date("Y/m/d"); ?></textarea>
            </div>
            <div>
                    <label>&nbsp;</label>
                    <input type="submit" name="submit" value="Save">
            </div>
        </form>
    </div>

    <button type="button"><a href="index.php">Back</button>
</body>
</html>