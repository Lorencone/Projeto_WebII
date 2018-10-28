<?php

class Pais
{
    protected $id_pais;
    protected $nome;

    public function getIdPais()
    {
        return $this->id_pais;
    }

    public function setIdPais($id_pais)
    {
        $this->id_pais = $id_pais;
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
        $sql = "select * from  pais";
        return $conexao->recuperar($sql);
    }

    public function carregarPorId($id_pais)
    {
        $conexao = new Conexao();

        $sql = "select * from pais WHERE id_pais = '$id_pais'";
        $dados = $conexao->recuperar($sql);

        $this->id_pais = $dados[0]['id_pais'];
        $this->nome = $dados[0]['nome'];
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $conexao = new Conexao();
        $sql = "insert into pais (nome) values ('$nome')";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_pais = $dados['id_pais'];
        $nome = $dados['nome'];
        $conexao = new Conexao();
        $sql = "update pais set nome = '$nome' WHERE id_pais = '$id_pais'";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function deletar($id_pais)
    {

        $conexao = new Conexao();
        $sql = "DELETE FROM pais WHERE id_pais = '$id_pais'";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function existeNome($nome)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(nome) qtd FROM pais WHERE nome = '$nome'";
        $dados = $conexao->recuperarDados($sql);

        return $dados[0]['qtd'];
    }

}