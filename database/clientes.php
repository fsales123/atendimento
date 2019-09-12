<?php
require "conexao.php";

function Clientes(){
    $conex = new conexao();

return $conex->listarClientes();    
}
