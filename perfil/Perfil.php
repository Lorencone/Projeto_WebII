<?php
include_once "../conexao/Conexao.php";

class Perfil
{

    protected $id_perfil;
    protected $nome;

    const PERFIL_USUARIO = 1;
    const PERFIL_EDITOR = 2;
    const PERFIL_ADMINISTRADOR = 3;


    public function getIdPerfil()
    {
        return $this->id_perfil;
    }

    public function setIdPerfil($id_perfil)
    {
        $this->id_perfil = $id_perfil;
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

        $sql = "select * from perfil order by id_perfil";
        return $conexao->recuperarDados($sql);
    }


    public function carregarPorId($id_perfil)
    {

        $conexao = new Conexao();


        $sql = "select * from perfil where id_perfil = '$id_perfil'";

        $dados = $conexao->recuperarDados($sql);

        $this->id_perfil = $dados[0]['id_perfil'];
        $this->nome = $dados[0]['nome'];

        return $conexao->executar($sql);
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];

        $conexao = new Conexao();

        $sql = "insert into perfil (nome) values ('$nome')";

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_perfil = $dados['id_perfil'];
        $nome = $dados['nome'];

        $conexao = new Conexao();

        $sql = "update perfil set
                  id_perfil = '$id_perfil',
                  nome = '$nome'
                where id_perfil = '$id_perfil'";

        return $conexao->executar($sql);
    }

    public function excluir($id_perfil)
    {
        $conexao = new Conexao();

        $sql = "delete from perfil where id_perfil = '$id_perfil'";
        return $conexao->executar($sql);
    }

    public function existeNome($nome)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(nome) qtd FROM perfil WHERE nome = '$nome'";
        $dados = $conexao->recuperarDados($sql);

        return $dados[0]['qtd'];
    }

}