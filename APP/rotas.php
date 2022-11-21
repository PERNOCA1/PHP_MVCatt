<?php

use App\Controller\PessoaController;

use App\Controller\ProdutoController;

use App\Controller\UsuarioController;

use App\Controller\LoginController;



$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{

    case '/usuario':
        UsuarioController::index();
    break;

    case '/usuario/form':
        UsuarioController::form();
    break;

    case '/usuario/save':
        UsuarioController::save();
    break;

    case '/usuario/excluir':
        UsuarioController::delete();
    break;

    //////////////////////////////

    case '/login':
        LoginController::index();
    break;

    case '/login/auth':
        LoginController::auth();
    break;

    case '/logout':
        LoginController::logout();
    break;

    ////////////////////////////////

    case '/':
        echo "página inicial";
    break;
    
    case '/pessoa':
        PessoaController::index();
    break;

    case '/pessoa/form':
        PessoaController::form();
    break;

    case '/pessoa/save':
        PessoaController::save();
    break;

    case '/pessoa/delete':
        PessoaController::delete();
    break;

    default:
    echo "erro 404";
    break;

    ////////////////////////////////////
    
    case '/produto':
        ProdutoController::index();
    break;

    case '/produto/form':
        ProdutoController::form();
    break;

    case '/produto/save':
        ProdutoController::save();
    break;
   
}