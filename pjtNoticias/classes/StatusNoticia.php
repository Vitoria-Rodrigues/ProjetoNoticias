<?php

class StatusNoticia
{

    private $idStatusNoticia;
    private $descNoticia;

    public function getidStatusNoticia()
    {
        return $this->idStatusNoticia;
    }

    public function getdescNoticia()
    {
        return $this->descNoticia;
    }

    public function setidStatusNoticia($id)
    {
        $this->idStatusNoticia = $id;
    }

    public function setdescNoticia($desc)
    {
        $this->descNoticia = $desc;
    }
    //A função listar está buscando todas as categorias.
    public function cadastrar($StatusNoticia)
    {
        $conexao = Conexao::pegarConexao();

        $stmt = $conexao->prepare("INSERT INTO tbstatusnoticia
                                 (descStatusNoticia)
                                 VALUES(?)");

        $stmt->bindValue(1, $StatusNoticia->getdescNoticia());
        $stmt->execute();

        return 'Cadastro realizado com sucesso';
    }
    
     //A função listar está buscando todas as categorias.
    public function listar()
    {
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->prepare("SELECT idStatusNoticia,descStatusNoticia FROM tbstatusnoticia");
        $sql->execute();
        $lista = $sql->fetchAll();

        //A variavel exibir esta concatenando o valor da tag select 
        //junto com os valores que foram buscados no banco e apresentando suas posições.
        $exibir = "<select name='idStatusNoticia'>";
        foreach ($lista as $linha) {
            $exibir .= "<option value={$linha['idStatusNoticia']}>";
            $exibir .= $linha['descStatusNoticia'];
            $exibir .= "</option>";
        };
        $exibir .= "</select>";
        
        return $exibir;
        
    }
}
