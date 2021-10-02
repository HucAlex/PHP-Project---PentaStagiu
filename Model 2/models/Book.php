<?php

class Book
{
    public int $id;
    public string $author_name;
    public string $publisher_name;
    public int $publisher_year;
    public string $created_at;
    public ?string $update_at;

    private ?PDO $pdo = null;

    public function __construct()
    {
        $this->pdo = DB::getInstance();
    }

    public function create()
    {
        $this->id = 0;
        $this->author_name = "Autor";
        $this->publisher_name = "Publicatie";
        $this->publisher_year = 2020;
        $this->created_at = date("d/m/Y");
        $this->update_at = NULL;
    }
}


?>