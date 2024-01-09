<?php 

namespace core\classes;

use Exception;

class Store
{

    public static function Layout($estruturas, $dados = []){

        if(!is_array($dados)){
            throw new Exception("ERRO!!!!!");
        }

        if(!empty($dados) && is_array($dados)){
            extract($dados);
        }

        foreach($estruturas as $estru){
            include("../core/views/$estru.php");
        }
    }



}