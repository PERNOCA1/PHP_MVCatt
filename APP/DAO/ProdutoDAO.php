<?php

namespace App\DAO;

use App\Model\ProdutoModel;
use \PDO;
/**
 * As classes DAO servem para fazer os SQL junto com o banco de dados
 */
class ProdutoDAO
{
    /**
     * Serve para armazenar as informações com o banco de dados
     */
    private $conexao;


    /**
     * Método construtor, sempre chamado quando a classe é chamada.
     * Exemplo de instanciar classe (criar objeto da classe):
     * $dao = new ProdutoDAO();
     * Neste caso, assim que é chamado, abre uma conexão com o MySQL (Banco de dados)
     * A conexão é aberta via PDO (PHP Data Object) que é um recurso da linguagem para
     * acesso a diversos SGBDs.
     */
    function __construct() 
    {
        // DSN (Data Source Name) onde será encontrado o servidor MySQL e qual acesso para
        // o MySQL e o nome do banco criado.
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        // Criando a ligaçao e armazenando as informações no lugar definido.
        $this->conexao = new PDO($dsn, 'root', 'etecjau');
    }


   /**
     * Método que recebe um model e extrai os dados do model para realizar o insert
     * na tabela correspondente ao model. Note o tipo do parâmetro declarado.
     */
    function insert(ProdutoModel $model) 
    {
        // Trecho de código SQL com marcadores ? para substituição posterior, no prepare   
        $sql = "INSERT INTO produto
                (produto, codigo_barra, data_fabric) 
                VALUES (?, ?, ?)";
        
        // Declaração da variável stmt que conterá a montagem da consulta. Observe que
        // estamos acessando o método prepare dentro da propriedade que guarda a conexão
        // com o MySQL, via operador seta "->". Isso significa que o prepare "está dentro"
        // da propriedade $conexao e recebe nossa string sql com os devidor marcadores.
        $stmt = $this->conexao->prepare($sql);

        // Nesta etapa os bindValue são responsáveis por receber um valor e trocar em uma 
        // determinada posição, ou seja, o valor que está em 3, será trocado pelo terceiro ?
        // No que o bindValue está recebendo o model que veio via parâmetro e acessamos
        // via seta qual dado do model queremos pegar para a posição em questão.
        $stmt->bindValue(1, $model->produto);
        $stmt->bindValue(2, $model->codigo_barra);
        $stmt->bindValue(3, $model->data_fabric);
       
        // Ao fim, onde todo SQL está montando, executamos a consulta.
        $stmt->execute();      
    }

/**
     * Método que recebe o Model preenchido e atualiza no banco de dados.
     * Note que neste model é necessário ter a propriedade id preenchida.
     */
    public function update(ProdutoModel $model)
    {
        $sql = "UPDATE produto SET produto=?, codigo_barra=?, data_fabric=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->produto);
        $stmt->bindValue(2, $model->codigo_barra);
        $stmt->bindValue(3, $model->data_fabric);
        $stmt->bindValue(4, $model->id);
        $stmt->execute();
    }


    /**
     * Método que retorna todas os registros da tabela pessoa no banco de dados.
     */
    public function select()
    {
        $sql = "SELECT * FROM produto ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        // Retorna um array com as linhas retornadas da consulta. Observe que
        // o array é um array de objetos. Os objetos são do tipo stdClass e 
        // foram criados automaticamente pelo método fetchAll do PDO.
        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    /**
     * Retorna um registro específico da tabela pessoa do banco de dados.
     * Note que o método exige um parâmetro $id do tipo inteiro.
     */
    public function selectById(int $id)
    {
        include_once 'Model/ProdutoModel.php';

        $sql = "SELECT * FROM produto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("ProdutoModel"); // Retornando um objeto específico PessoaModel
    }


    /**
     * Remove um registro da tabela pessoa do banco de dados.
     * Note que o método exige um parâmetro $id do tipo inteiro.
     */
    public function delete(int $id)
    {
        $sql = "DELETE FROM produto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}