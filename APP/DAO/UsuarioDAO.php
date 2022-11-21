<?php

namespace App\DAO;
use App\Model\UsuarioModel;
use \PDO;

class UsuarioDAO
{
    private $conexao;

    function __construct() {
        $dsn = "mysql:host=" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['database'];
        $user = $_ENV['db']['user'];
        $pass = $_ENV['db']['pass'];

        $this->conexao = new PDO($dsn, $user, $pass);
    }

    function insert(UsuarioModel $model){
        $sql = "INSERT INTO usuarios (nome, usuario, email, senha) VALUES (?, ?, ?, sha1(?));";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->usuario);
        $stmt->bindValue(3, $model->email);
        $stmt->bindValue(4, $model->senha);
        $stmt->execute();   
    }

    public function selectById(int $id){
        $sql = "SELECT * FROM usuarios WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\UsuarioModel");
    }

    public function update(UsuarioModel $model){
        $sql = "UPDATE usuarios SET nome=?, usuario=?, email=?, senha=sha1(?) WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->usuario);
        $stmt->bindValue(3, $model->email);
        $stmt->bindValue(4, $model->senha);
        $stmt->bindValue(5, $model->id);
        $stmt->execute();
    }

    function getAllRows(){
        $sql = "SELECT * FROM usuarios";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM usuarios WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}