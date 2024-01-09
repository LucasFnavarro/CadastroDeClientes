<?php 

namespace core\models;

use core\classes\Database;

class Clientes{

    public static function verify_email_existente($email){
        $db = new Database();
        $parametros = [
            ':e' => strtolower(trim($email))
        ];

        $resultado = $db->select("SELECT email FROM pessoas WHERE email = :e", $parametros);

        if(count($resultado) != 0){
            return true;
        }else {
            return false;
        }
    }

    public static function criar_novo_cliente_submit(){

        $db = new Database();

        $parametros = [
            ':nome' => trim($_POST['nome']),
            ':email' => strtolower(trim($_POST['email'])),
            ':telefone' => trim($_POST['telefone']),
            ':cidade' => trim($_POST['cidade'])
        ];

        $db->insert("INSERT INTO pessoas VALUES(0, :nome, :email, :telefone, :cidade)", $parametros);

        


    }



}