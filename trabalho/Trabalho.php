<?php
include_once "../conexao/Conexao.php";

class Trabalho
{
    protected $id_trabalho;
    protected $nome;

    public function getIdTrabalho()
    {
        return $this->id_trabalho;
    }
    
    public function setIdTrabalho($id_trabalho)
    {
        $this->id_trabalho = $id_trabalho;
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
        $sql = "select * from trabalho";
        return $conexao->recuperar($sql);
    }

    public function carregarPorId($id_trabalho)
    {
        $conexao = new Conexao();

        $sql = "select * from trabalho WHERE id_trabalho = '$id_trabalho'";
        $dados = $conexao->recuperar($sql);

        $this->id_trabalho = $dados[0]['id_trabalho'];
        $this->nome = $dados[0]['nome'];
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $conexao = new Conexao();
        $sql = "insert into trabalho (nome) values ('$nome')";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_trabalho = $dados['id_trabalho'];
        $nome = $dados['nome'];
        $conexao = new Conexao();
        $sql = "update trabalho set nome = '$nome' WHERE id_trabalho = '$id_trabalho'";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function deletar($id_trabalho)
    {

        $conexao = new Conexao();
        $sql = "DELETE FROM trabalho WHERE id_trabalho = '$id_trabalho'";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }
}