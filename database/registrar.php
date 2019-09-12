<?php 
require_once("conexao.php");
//alterei || para &&
if(isset($_POST["descricao"]) && isset($_POST["cli_id"])){
    if(!empty($_POST["descricao"]) && !empty($_POST["cli_id"]))

    //pega os valores
    $descricao = $_POST["descricao"];
    $cli_id = $_POST["cli_id"];

    $conex = new conexao();
    $conex->createDescricao($cli_id, $descricao); 

    if($conex){
        header('Location:../index.php'); 
    }
}
?>

