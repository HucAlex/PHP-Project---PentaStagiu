<!DOCTYPE html>
<html>
<head>
	<title>EDIT</title>
</head>
<body>
    <div>
        <div> 
            <form action="update" method="POST">
                <?php foreach($books as $book) { ?>

                <input type="hidden" name="id" value="<?php echo $book->id; ?>">

                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo $book->title; ?>"/>

                <label for="author_name">Author</label>
                <input type="text" id="" name="author_name" value="<?php echo $book->author_name; ?>"/>

                <label for="publisher_name">Publisher Name</label>
                <input type="text" id="publisher_name" name="publisher_name" value="<?php echo $book->publisher_name; ?>"/>

                <label for="publisher_year">Publisher Year</label>
                <input type="text" id="publisher_year" name="publisher_year" value="<?php echo $book->publisher_year; ?>"/>

                <label for="update_at">Update Data</label>
                <input readonly type="text" id="update_at" name="update_at" value="<?php echo date("d/m/Y"); ?>"/>

                <?php } ?>

                <input type="submit" value="Save">

            </form>
        </div>
    </div>
</body>
</html>