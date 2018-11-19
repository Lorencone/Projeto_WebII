<?php
include_once('../conexao/Conexao.php');

class Legenda
{
    protected $id_legenda;
    protected $nome;

    public function getIdLegenda()
    {
        return $this->id_legenda;
    }

    public function setIdLegenda($id_legenda)
    {
        $this->id_legenda = $id_legenda;
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
        $sql = "select * from legenda ";
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_legenda)
    {
        $conexao = new Conexao();

        $sql = "select * from legenda WHERE id_legenda = '$id_legenda'";
        $dados = $conexao->recuperarDados($sql);

        $this->id_legenda = $dados[0]['id_legenda'];
        $this->nome = $dados[0]['nome'];
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $conexao = new Conexao();
        $sql = "insert into legenda (nome) values ('$nome')";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {    $id_legenda = $dados['id_legenda'];
        $nome = $dados['nome'];
        $conexao = new Conexao();
        $sql = "update legenda set nome = '$nome' WHERE id_legenda = '$id_legenda'";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function deletar($id_legenda)
    {

        $conexao = new Conexao();
        $sql = "DELETE FROM legenda WHERE id_legenda = '$id_legenda'";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function existeNome($nome)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(nome) qtd FROM legenda WHERE nome = '$nome'";
        $dados = $conexao->recuperarDados($sql);

        return $dados[0]['qtd'];
    }

}