<?php
require "conexao.php";

function remover(){
    $conex = new conexao();

    return $conex->deleteDesc();
}

