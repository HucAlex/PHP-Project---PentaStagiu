<?php

function loadView(string $viewName, array $parameters = [])
{
    if(!empty($parameters))
    {
        extract($parameters);
    }
    require "views".DIRECTORY_SEPARATOR. $viewName;
}

function dd($parametre)
{
    echo "<pre>";
    var_dump($parametre);
    echo "</pre>";
    die;
}

?>