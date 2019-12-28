<?php

class BancoDados {
    public function getConexao() {
        $conexao=null;
        try {
            $conexao= new PDO("mysql:host=localhost;dbname=contatos","root", "");
        
        } catch (PDOException $erro) {
            echo "erro na conexão: " .$erro->getMessage();
        }
        return $conexao;
    }
}