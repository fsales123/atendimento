<?php
$cli_id = $_POST['cli_id'];

if(isset($_POST["cli_id"]) && isset($_POST["cli_id"])){

    require "conexao.php";
    
    $conex = new conexao();
    $conex->deleteDesc($cli_id);
    print_r($_POST);
    die;
    header('Location:../index.php');
    

}else{
    echo "erro";
}

?>