<?php
require 'DB.php';

$query = "SELECT `id`, `title`, `author_name`, `publisher_name`, `publisher_year`, `created_at`, `update_at` FROM `authors` ORDER BY `id`";
$resulObj = $connection->query($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index Page</title>
</head>
<body>
    <table style="width:50%">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author Name</th>
            <th>Publisher Name</th>
            <th>Publisher Year</th>
            <th>Index Created</th>
            <th>Last Update</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>

        <?php foreach($resulObj as $elem) { ?>
            <tr  method="get">
                <th><?php  echo $elem['id']; ?></th>
                <th><?php  echo $elem['title']; ?></th>
                <th><?php  echo $elem['author_name']; ?></th>
                <th><?php  echo $elem['publisher_name']; ?></th>
                <th><?php  echo $elem['publisher_year']; ?></th>
                <th><?php  echo $elem['created_at']; ?></th>
                <th><?php  echo $elem['update_at']; ?></th>
                <th><button type="button"><?php echo "<a href=\"edit.php?id=".$elem['id']."\">Edit  </a>" ?></th>
                <th><button type="button"><?php echo "<a href=\"delete.php?id=".$elem['id']."\"onclick=\"return confirm('Are you sure?')\">Delete</a>"; ?></th>
            </tr>
        <?php } ?>
    </table>
    <button type="button"><a href="create.php">Create</a></button>

</body>
</html>