<?php 
require_once "../database/conexao.php";

if(isset($_GET["id"]) && !empty($_GET["id"])){
    $conex = new conexao();
echo json_encode($conex->clienteDescricao($_GET["id"])); 
}


