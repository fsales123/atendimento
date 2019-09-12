<?php

class conexao {
    
    private $conexao;

    public function __construct(){
        try {
            $this->conexao = new PDO("mysql:dbname=atendim;host=localhost", "root", "");
        } catch (PDOExpension $e) {
            echo "error: ". $e->getMessage();
        }
    } 
    public function createUsuario( $nomeCli, $cnpj){
        $sql = $this->conexao->prepare("INSERT INTO clientes ( nomeCli, cnpj) VALUES ( :nomeCli, :cnpj)"); 
        $sql->bindValue(':nomeCli', $nomeCli);
        $sql->bindValue(':cnpj', $cnpj);
        $sql->execute();
    }
    public function createDescricao($cli_id, $descricao){
        $sql = $this->conexao->prepare("INSERT INTO descricao (descricao, cli_id) VALUES (:descricao, :cli_id)"); 
        $sql->bindValue(':descricao' , $descricao);
        $sql->bindValue(':cli_id', $cli_id); 
        $sql->execute();        
    }

    public function deleteCliente($cli_id){
        $sql = $this->conexao->prepare("DELETE FROM clientes WHERE cli_id = :cli_id");
        $sql->bindValue(':cli_id', $cli_id);  
        $sql->execute(); 
        
    }

    public function deleteDesc($cli_id){
        $sql = $this->conexao->prepare("DELETE FROM descricao WHERE cli_id = :cli_id");
        $sql->bindValue(':cli_id',$cli_id);       
        $sql->execute();        

        return $sql->rowCount();
        //listar
        //$array = [];
        //if($sql->rowCount() > 0){
            
          // $array = $sql->fetchAll(); 
        //}
        
        //return $array; 
    
    }

    public function updateCliente($cli_id, $nomeCli, $cnpj){
        $sql = $this->conexao->prepare("UPDATE clientes SET nomeCli = :nome, cnpj = :empresa");
        $sql->bindValue(':nome', $nomeCli);
        $sql->bindValue(':empresa', $cnpj);
        $sql->execute();
    }
    public function listarClientes($dados = ''){
        if(is_array($dados) && $dados){
            
            $sql = $this->conexao->prepare("SELECT * FROM clientes WHERE $dados[0] = '$dados[1]'"); 
            $sql->execute();
            $array = [];
            
            if($sql->rowCount() > 0){
                
                $array = $sql->fetch();
            }
            return $array;
        }else{
            $sql = $this->conexao->prepare("SELECT * FROM clientes");
            
            $sql->execute(); 

            $array = [];
            
            if($sql->rowCount() > 0){
                
                $array = $sql->fetchAll();
            }
            return $array;
        }
    }
    public function clienteDescricao($cli_id){
        $sql = $this->conexao->prepare("SELECT DATE_FORMAT(descricao.data, '%d/%m/%Y %H:%i') as desc_data, descricao.descricao FROM clientes LEFT JOIN descricao ON clientes.cli_id = descricao.cli_id WHERE clientes.cli_id = '$cli_id'"); 
        $sql->execute(); 

        //listar
        $array = [];
        if($sql->rowCount() > 0){
            
           $array = $sql->fetchAll(); 
        }
        
        return $array; 
    }

}
