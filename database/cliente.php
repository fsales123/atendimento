<?php
require_once("conexao.php");
//alterei || para &&
    if(isset($_POST["nomeCli"]) && isset($_POST["cnpj"])){
       if(!empty($_POST["nomeCli"]) && !empty($_POST["cnpj"])){
        
           $nomeCli = $_POST["nomeCli"];
           $cnpj = $_POST["cnpj"];        

        $conex = new conexao();
        $conex->createUsuario($nomeCli, $cnpj);
        $cliente = $conex->listarClientes(['cnpj', "$cnpj"]); 
        
            if($cliente){
            header('Location:../index.php'); 
            }        
       }
    }
?>
