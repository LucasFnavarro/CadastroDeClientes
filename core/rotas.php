<?php 

$rotas = [
    
    'inicio' => 'main@index',
    'cadastro' => 'main@cadastro',
    'cadastro_submit' => 'main@cadastro_submit',
    'editar_cliente' => 'main@editar_cliente'
];

$acao = 'inicio';

if(isset($_GET['a'])){

    if(!key_exists($_GET['a'], $rotas)){
        $acao = 'inicio';
    }else {
        $acao = $_GET['a'];
    }
}

$partes = explode('@', $rotas[$acao]);
$controler = "core\\controllers\\" . ucfirst($partes[0]);
$metodo = $partes[1];

$ctr = new $controler();
$ctr->$metodo();