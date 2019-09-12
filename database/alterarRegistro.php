<?php

require "conexao.php";
//alterei || para &&
if(isset($_POST["cli_id"]) && isset($_POST["descricao"])){
    if(!empty($_POST["cli_id"]) && !empty($_POST["descricao"])){
       
        $cli_id = $_POST["cli_id"];
        $descricao = $_POST["descricao"];
        
    $conex = new conexao();
    $conex->updateCliente($cli_id, $nomeCli, $cnpj);
        if($conex){
        echo "Alterado com sucesso!";
        }
    }
}