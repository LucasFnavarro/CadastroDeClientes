<?php

namespace core\controllers;

use core\classes\Database;
use core\classes\Store;
use core\models\Clientes;

class Main
{

    public function index()
    {

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'pagina_ini',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }
    #=============================================================
    public function cadastro()
    {
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'cadastrar_cli',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }
   #=============================================================
    public function editar_cliente(){
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'editar_cliente',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    #=============================================================
    public function cadastro_submit()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->index();
            return;
        }

        $clientes = new Clientes();

        if ($clientes->verify_email_existente($_POST['email'])) {

            $_SESSION['erro'] = '<p style="color: red">E-mail já cadastrado no sistema!</p>';
            $this->cadastro();
            return;
        }

        $clientes->criar_novo_cliente_submit();
        $_SESSION['sucesso'] = '<p style="color: green">Cliente cadastrado com sucesso!</p>';
        $this->cadastro();
        return;
    }
}
