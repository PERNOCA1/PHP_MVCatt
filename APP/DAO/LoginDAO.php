<?php

namespace App\DAO;

use App\Model\LoginModel;
use \PDO;

/**
 * As classes DAO (Data Access Object) são responsáveis por executar os
 * SQL junto ao banco de dados.
 */
class LoginDAO extends DAO
{
     
    public function __construct()
    {
       
        parent::__construct();       
    }

    public function selectByEmailAndSenha($email, $senha)
    {
        $sql = "SELECT * FROM usuario WHERE email = ? AND senha = sha1(?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\LoginModel"); 
    }


    
}