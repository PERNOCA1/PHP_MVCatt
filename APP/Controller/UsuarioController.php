<?php

namespace App\Controller;

use App\Model\UsuarioModel;

class UsuarioController extends Controller
{
    public static function index()
    {
        parent::isAuthenticated();

        $model = new UsuarioModel();
        $model->getAllRows();

        include 'View/modules/Usuario/ListaUsuarios.php';
    }

    public static function form()
    {
        parent::isAuthenticated();

        $model = new UsuarioModel();

        if (isset($_GET['id']))
            $model = $model->getById((int) $_GET['id']);

        include 'View/modules/Usuario/FormUsuario.php';
    }

    public static function save()
    {
        parent::isAuthenticated();

        $usuario = new UsuarioModel();
        $usuario->id = $_POST['id'];
        $usuario->nome = $_POST['nome'];
        $usuario->usuario = $_POST['usuario'];
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];

        $usuario->save();

        header('location: /usuario');
    }

    public static function delete()
    {
        parent::isAuthenticated();

        $model = new UsuarioModel();
        $model->delete((int) $_GET['id']);

        header("Location: /usuario");
    }
}