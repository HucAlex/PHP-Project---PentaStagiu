<?php

class BookController
{

    public function index()
    {
        $connection = DB::getInstance();
        $statement = $connection->prepare("SELECT `id`, `title`, `author_name`, `publisher_name`, `publisher_year`, `created_at`, `update_at` FROM `authors` ORDER BY `id`");
        $statement->execute();
        $books = $statement->fetchAll(PDO::FETCH_OBJ);
    
        loadView('index.view.php', ['books' => $books]);
    } 

    public function create()
    {
        loadView('create.view.php');
    }

    public function store()
    {
        //trebuia sa stchez prima data varibilele din POST pentru a evita SQL Injection si pentru a evita posibile valori
        $connection = DB::getInstance();
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO authors (id, title, author_name, publisher_name, publisher_year, created_at, update_at) 
        VALUES ('{$_POST['id']}','{$_POST['title']}','{$_POST['author_name']}','{$_POST['publisher_name']}','{$_POST['publisher_year']}','{$_POST['created_at']}','{$_POST['update_at']}')";
        $connection->exec($sql);
    
        header("Location: http://localhost//PHPinVisualStudioCode/Tema2/?success=create");
    }

    public function edit()
    {
        $connection = DB::getInstance();
        $statement = $connection->prepare("SELECT * FROM `authors` WHERE `id` = '{$_GET['id']}'");
        $statement->execute();
        $books = $statement->fetchAll(PDO::FETCH_OBJ);

        loadView('edit.view.php', ['books' => $books]);
    }

    public function update()
    {   
        $connection = DB::getInstance();
            $sql = 
        "UPDATE `authors`   
        SET `title` = :title,
            `author_name` = :author_name,
            `publisher_name` = :publisher_name,
            `publisher_year` = :publisher_year,
            `update_at` = :update_at 
        WHERE `id` = '{$_POST['id']}'";
        
        $statement = $connection->prepare($sql);
        $statement->bindValue(":title", $_POST['title']);
        $statement->bindValue(":author_name", $_POST['author_name']);
        $statement->bindValue(":publisher_name", $_POST['publisher_name']);
        $statement->bindValue(":publisher_year", $_POST['publisher_year']);
        $statement->bindValue(":update_at", $_POST['update_at']);
        
        $count = $statement->execute();
        header("Location: http://localhost//PHPinVisualStudioCode/Tema2/?success=updated");
    }

    public function delete()
    {
        $connection = DB::getInstance();
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM authors WHERE id='{$_GET['id']}'";
        $connection->exec($sql);
    
        header("Location: http://localhost//PHPinVisualStudioCode/Tema2/?success=deleted");
    }
}
?>