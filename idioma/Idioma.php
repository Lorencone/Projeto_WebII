<?php
include_once('../conexao/Conexao.php');

class Idioma
{
    protected $id_idioma;
    protected $nome;

    public function getIdIdioma()
    {
        return $this->id_idioma;
    }

    public function setIdIdioma($id_idioma)
    {
        $this->id_idioma = $id_idioma;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function recuperarDados()
    {

        $conexao = new Conexao();
        $sql = "select * from idioma ";
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_idioma)
    {
        $conexao = new Conexao();

        $sql = "select * from idioma WHERE id_idioma = '$id_idioma'";
        $dados = $conexao->recuperarDados($sql);

        $this->id_idioma = $dados[0]['id_idioma'];
        $this->nome = $dados[0]['nome'];
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $conexao = new Conexao();
        $sql = "insert into idioma (nome) values ('$nome')";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_idioma = $dados['id_idioma'];
        $nome = $dados['nome'];
        $conexao = new Conexao();
        $sql = "update idioma set nome = '$nome' WHERE id_idioma = '$id_idioma'";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function deletar($id_idioma)
    {

        $conexao = new Conexao();
        $sql = "DELETE FROM idioma WHERE id_idioma = '$id_idioma'";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function existeNome($nome)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(nome) qtd FROM idioma WHERE nome = '$nome'";
        $dados = $conexao->recuperarDados($sql);

        return $dados[0]['qtd'];
    }

}