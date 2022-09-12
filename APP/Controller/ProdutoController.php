<?php

namespace App\Controller;

use App\Model\ProdutoModel;

/**
 * As classes Controller servem para processar os pedidos do usuário.
 * Ou seja o Controller é chamado toda vez que um usúario chamar uma ação de uma classe.
 * O método poderá devolver uma View (fazendo um include), acessar uma Model (para
 * buscar algo no banco de dados), redirecionar o usuário de rota, ou mesmo,
 * chamar outra Controller.
 */
class ProdutoController 
{
    /**
     * As ações index serve para ter uma visualização.
     */
    public static function index() 
    {
        include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();
        $model->GetAllRows();

        include 'View/modules/Produto/ProdutoListar.php';
    }

   /**
     * Faz uma visualização com um formulário para quem está acessando.
     */
    public static function form()
    {
        include 'Model/ProdutoModel.php';
        $model = new ProdutoModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']);
            
        include 'View/modules/Produto/ProdutoCadastro.php';
    }

    /**
     * Preenche um Model para ir até o banco de dados e é salvado lá
     */
    public static function save() {

        include 'Model/ProdutoModel.php'; // colocando tambem o arquivo da model.

       
        // Em baixo cada parte do objeto sendo preenchido com as informações dos produtos
        // já armazenados.       
        $produto = new ProdutoModel();
        $produto->nome = $_POST['produto'];
        $produto->rg = $_POST['codigo_barra'];
        $produto->cpf = $_POST['data_fabric'];

        $produto->save();  // chamando a ação save da camada model.

        header("Location: /produto"); // mandando o usuário para outro lugar.
    }
}