<?php

spl_autoload_register(function ($nome_da_classe) {

    //echo "Tentou da include de: " . $nome_da_classe;

    $classe_controller = 'Controller/' . $nome_da_classe . ".php";
    $classe_model = 'Model/' . $nome_da_classe . ".php";
    $classe_dao = 'DAO/' . $nome_da_classe . ".php";

    if(file_exists($classe_controller))
    {
        include $classe_controller;
    }


    //include 'classes/' . class . '.class.php'
});