<?php

namespace App\Controller;

use App\Model\PessoaModel;


class PessoaController extends Controller 
{
    /**
     * Os métodos index serão usados para devolver uma View.
     */
    public static function index() 
    {
        
        
        $model = new PessoaModel(); // Instância da Model
        $model->getAllRows(); // Obtendo todos os registros, abastecendo a propriedade $rows da model.
        
        

        parent::render('Pessoa/ListaPessoa', $model);
    }

   /**
     * Devolve uma View contendo um formulário para o usuário.
     */
    public static function form()
    {
        $model = new PessoaModel();

        if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
            $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
            
            parent::render('Pessoa/FormPessoa', $model);

    }

    /**
     * Preenche um Model para que seja enviado ao banco de dados para salvar.
     */
    public static function save() 
    {


        // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
        // pelo usuário no formulário (note o envio via POST)
        $model = new PessoaModel();

        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->rg = $_POST['rg'];
        $model->cpf = $_POST['cpf'];
        $model->data_nascimento = $_POST['data_nascimento'];
        $model->email = $_POST['email'];
        $model->telefone = $_POST['telefone'];
        $model->endereco = $_POST['endereco'];

        $model->save();  // chamando o método save da model.

        header("Location: /pessoa"); // redirecionando o usuário para outra rota.
    }

    public static function delete()
    {
        $model = new PessoaModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /pessoa"); // redirecionando o usuário para outra rota.
    }
}