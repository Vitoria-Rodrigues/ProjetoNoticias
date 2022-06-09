<?php

class Categoria
{

    private $idCategoria;
    private $descCategoria;

    public function getidCategoria()
    {
        return $this->idCategoria;
    }

    public function getdescCategoria()
    {
        return $this->descCategoria;
    }

    public function setidCategoria($id)
    {
        $this->idCategoria = $id;
    }

    public function setdescCategoria($desc)
    {
        $this->descCategoria = $desc;
    }

    //A função cadastrar está inserindo as categorias ja existentes no banco.
    public function cadastrar($categoria)
    {
        $conexao = Conexao::pegarConexao();

        $stmt = $conexao->prepare("INSERT INTO tbcategoria
                                     (descCategoria)
                                     VALUES(?)");

        $stmt->bindValue(1, $categoria->getdescCategoria());
        $stmt->execute();

        return 'Cadastro realizado com sucesso';
    }

    //A função listar está buscando todas as categorias.
    public function listar()
    {
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->prepare("SELECT idCategoria,descCategoria FROM tbcategoria");
        $sql->execute();
        $lista = $sql->fetchAll();

        //A variavel exibir esta concatenando o valor da tag select 
        //junto com os valores que foram buscados no banco e apresentando suas posições.
        $exibir = "<select name='idCategoria'>";
        foreach ($lista as $linha) {
            $exibir .= "<option value={$linha['idCategoria']}>";
            $exibir .= $linha['descCategoria'];
            $exibir .= "</option>";
        };
        $exibir .= "</select>";
        return $exibir;
    }
}
?>