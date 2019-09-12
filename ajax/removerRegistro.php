<?php 
require_once "../database/conexao.php";

if(isset($_GET["cli_id"]) && !empty($_GET["cli_id"])){
    $conex = new conexao();

echo json_encode($conex->deleteDesc($_GET["id"])); 
}
    



