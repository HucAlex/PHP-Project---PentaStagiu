<!DOCTYPE html>
<html>
<head>
	<title>INDEX</title>
</head>
<body>
    <div>
        <br>
        <div>
            <h1>Librarie</h1>
        </div>
        <div>
            <a href="create">Create</a>
        </div>

        <br>
        <?php if(isset($_GET['success']) && $_GET['success'] == 'create') { ?>
            <div>
                <p>Book was created</p>
            </div>
        <?php } ?>

        <br>
        <?php if(isset($_GET['success']) && $_GET['success'] == 'updated') { ?>
            <div>
                <p>Book was updated</p>
            </div>
        <?php } ?>

        <br>
        <?php if(isset($_GET['success']) && $_GET['success'] == 'deleted') { ?>
            <div>
                <p>Book was deleted</p>
            </div>
        <?php } ?>

        <br>
        <div>
            <table>
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Title</td>
                        <td>Author</td>
                        <td>Publisher Name</td>
                        <td>Publisher Year</td>
                        <td>Create Data</td>
                        <td>Update Data</td>
                        <td>Options</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($books as $book):?>
                        <tr>
                            <td><?= $book->id; ?></td>
                            <td><?= $book->title; ?></td>
                            <td><?= $book->author_name; ?></td>
                            <td><?= $book->publisher_name; ?></td>
                            <td><?= $book->publisher_year; ?></td>
                            <td><?= $book->created_at; ?></td>
                            <td><?= $book->update_at; ?></td>
                            <td>
                                <a href="edit?id=<?php echo $book->id; ?>">Edit</a>
                                <a href="delete?id=<?php echo $book->id; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>