<?php

class Reporter{
    private $idReporter;
    private $nomeReporter;
    private $cpfReporter;
    private $emailReporter;

    public function getIdReporter(){
        return $this->idReporter;
    }
    public function getNomeReporter(){
        return $this->nomeReporter;
    }
    public function getCpfReporter(){
        return $this->cpfReporter;
    }
    public function getEmailReporter(){
        return $this->emailReporter;
    }
    public function setIdReporter($id){
        $this->idReporter = $id;
    }
    public function setNomeReporter($nome){
        $this->nomeReporter = $nome;
    }
    public function setCpfReporter($cpf){
        $this->cpfReporter = $cpf;
    }
    public function setEmailReporter($email){
        $this->emailReporter = $email;
    }

    //A função cadastrar está inserindo as categorias ja existentes no banco.
    public function cadastrar($reporter){
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare("INSERT INTO tbreporter
                                (nomeReporter, cpfReporter, emailReporter)
                                VALUES (?,?,?)");
        
        $stmt->bindValue(1, $reporter->getNomeReporter());
        $stmt->bindValue(2, $reporter->getCpfReporter());
        $stmt->bindValue(3, $reporter->getEmailReporter());
        $stmt->execute();

        return 'Cadastro realizado com sucesso';
    }

    //A função listar está buscando todas as categorias.
    public function listar(){
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->prepare("SELECT idReporter,nomeReporter, cpfReporter, emailReporter FROM tbreporter ");
        $sql->execute();
        $lista = $sql->fetchAll();
        return $lista;
    }

}
?>