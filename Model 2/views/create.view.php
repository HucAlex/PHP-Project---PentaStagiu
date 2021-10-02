<!DOCTYPE html>
<html>
<head>
	<title>CREATE</title>
</head>
<body>
    <div>
        <div> 
            <form action="store" method="POST">

                <label for="title">Title</label>
                <input type="text" id="title" name="title"/>

                <label for="author_name">Author</label>
                <input type="text" id="" name="author_name"/>

                <label for="publisher_name">Publisher Name</label>
                <input type="text" id="publisher_name" name="publisher_name"/>

                <label for="publisher_year">Publisher Year</label>
                <input type="text" id="publisher_year" name="publisher_year"/>

                <label for="created_at">Created Data</label>
                <input type="text" id="created_at" name="created_at" value="<?php echo date("d/m/Y"); ?>"/>

                <input type="submit">

            </form>
        </div>
    </div>
</body>
</html>