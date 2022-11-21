<?php

namespace App\Model;
use App\DAO\UsuarioDAO;

class UsuarioModel
{
    public $id, $nome, $usuario, $email, $senha;

    public $rows;

    public function save()
    {
        $dao = new UsuarioDAO();

        if($this->id == null) {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getAllRows(){
        $dao = new UsuarioDAO();

        $this->rows = $dao->getAllRows();
    }

    public function getById(int $id){
        $dao = new UsuarioDAO();
        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new UsuarioModel();
    }

    public function delete(int $id)
    {
        $dao = new UsuarioDAO();
        $dao->delete($id);
    }
}