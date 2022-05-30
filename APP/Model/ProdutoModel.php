<?php

class ProdutoModel
{
    /**
     * Está falando as propriedades de cada informação da tabela la no banco de dados
     */
    public $id, $produto, $codigo_barra, $data_fabric;


    /**
     * Declaração do método save que chamará a DAO para gravar no banco de dados
     * o model preenchido.
     * Save é onde chamará a DAO para poder gravar informações no banco
     * de dados do model preenchido.     */
    public function save()
    {
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        // Se id for nulo(null), quer dizer que trata-se de um novo registro
        // caso contrário, é um update poque a chave primária já existe.

        if(empty($this->id))
        {
            // No que estamos enviado o proprio objeto model para o insert, por isso do this
           
            $dao->insert($this);
        
        } else {

            $dao->update($this);
            // update
        }
    }
    public function GetAllRows()
    {
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

       $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new ProdutoModel();
    }
    public function delete(int $id)
    {
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        $dao->delete($id);
    }

}