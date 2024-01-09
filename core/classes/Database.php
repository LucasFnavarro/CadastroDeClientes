<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database
{

    private $ligacao;

    private function ligarDataBase()
    {

        $this->ligacao = new PDO(
            "mysql:" .
                "dbhost=" . MYSQL_HOST . ';' .
                "dbname=" . MYSQL_DBNAME . ';' .
                "charset=" . MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS
        );
    }

    #=========================================================================================
    private function desligarDataBase()
    {
        $conexao = null;
    }

    #=========================================================================================
    public function select($sql, $parametros = null)
    {
        if (!preg_match("/^SELECT/i", $sql)) {
            throw new Exception("SQL INVÁLIDO");
        }

        $this->ligarDataBase();
        $resultado = null;

        try {
            if (!empty($parametros)) {
                $execute = $this->ligacao->prepare($sql);
                $execute->execute($parametros);
                $resultado = $execute->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $execute = $this->ligacao->prepare($sql);
                $execute->execute();
                $resultado = $execute->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            return false;
        }
        $this->desligarDataBase();
        return $resultado;
    }

      #=========================================================================================
      public function insert($sql, $parametros = null)
      {
          if (!preg_match("/^INSERT/i", $sql)) {
              throw new Exception("SQL INVÁLIDO");
          }
  
          $this->ligarDataBase();
          //$resultado = null;
  
          try {
              if (!empty($parametros)) {
                  $execute = $this->ligacao->prepare($sql);
                  $execute->execute($parametros);
                  //resultado = $execute->fetchAll(PDO::FETCH_ASSOC);
              } else {
                  $execute = $this->ligacao->prepare($sql);
                  $execute->execute();
                 //$resultado = $execute->fetchAll(PDO::FETCH_ASSOC);
              }
          } catch (PDOException $e) {
              return false;
          }
          $this->desligarDataBase();
          //return $resultado;
      }


    #=========================================================================================
    public function update($sql, $parametros = null)
    {
        if (!preg_match("/^UPDATE/i", $sql)) {
            throw new Exception("SQL INVÁLIDO");
        }

        $this->ligarDataBase();
        $resultado = null;

        try {
            if (!empty($parametros)) {
                $execute = $this->ligacao->prepare($sql);
                $execute->execute($parametros);
                $resultado = $execute->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $execute = $this->ligacao->prepare($sql);
                $execute->execute();
                $resultado = $execute->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            return false;
        }
        $this->desligarDataBase();
        return $resultado;
    }

 #=========================================================================================
 public function delete($sql, $parametros = null)
 {
     if (!preg_match("/^DELETE/i", $sql)) {
         throw new Exception("SQL INVÁLIDO");
     }

     $this->ligarDataBase();
     $resultado = null;

     try {
         if (!empty($parametros)) {
             $execute = $this->ligacao->prepare($sql);
             $execute->execute($parametros);
             $resultado = $execute->fetchAll(PDO::FETCH_ASSOC);
         } else {
             $execute = $this->ligacao->prepare($sql);
             $execute->execute();
             $resultado = $execute->fetchAll(PDO::FETCH_ASSOC);
         }
     } catch (PDOException $e) {
         return false;
     }
     $this->desligarDataBase();
     return $resultado;
 }

  #=========================================================================================
  public function stetement($sql, $parametros = null)
  {
      if (!preg_match("/SELECT|INSERT|UPDATE|DELETE/i", $sql)) {
          throw new Exception("SQL INVÁLIDO");
      }

      $this->ligarDataBase();
      $resultado = null;

      try {
          if (!empty($parametros)) {
              $execute = $this->ligacao->prepare($sql);
              $execute->execute($parametros);
              $resultado = $execute->fetchAll(PDO::FETCH_ASSOC);
          } else {
              $execute = $this->ligacao->prepare($sql);
              $execute->execute();
              $resultado = $execute->fetchAll(PDO::FETCH_ASSOC);
          }
      } catch (PDOException $e) {
          return false;
      }
      $this->desligarDataBase();
      return $resultado;
  }


}
