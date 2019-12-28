<?php
class Contato
{
    public $id;
    public $nome;
    public $telefone;
    private $conexao;

    public function __construct($con)
    {
        $this->conexao = $con;
    }

    public function criar()
    {
        $SQL = "INSERT INTO contatos(nome, telefone) values (:NOME, :TELEFONE)";

        $stnt = $this->conexao->prepare($SQL);

        $stnt->bindParam(':NOME', $this->nome);
        $stnt->bindParam(':TELEFONE', $this->telefone);

        if ($stnt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function lerTodos() {
        $SQL = "SELECT * FROM contatos";
        $stmt = $this->conexao->prepare($SQL);
        $stmt->execute();
        return $stmt;
    }
}