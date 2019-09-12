<?php
require_once "../database/conexao.php";

$conex = new conexao();

echo json_encode($conex->listarClientes()); 



