<?php
    require 'functions.php';
    require 'controllers/BookController.php';
    require 'models/Book.php';
    require 'DB.php';
    require 'Router.php';

    $uri = explode('?' ,trim(substr($_SERVER['REQUEST_URI'], 29), '/'))[0];

    $router = new Router();
    $router->setRoutes(require 'routes.php');

    try
    {
        $router->direct($uri);
    } 
    catch(Exception $exception)
    {
        require '404.error.php';
    }
?>