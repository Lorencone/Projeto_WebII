<?php
include_once '../conexao/Conexao.php';

class Equipe_Trabalho
{
    protected $id_equipe_trabalho;
    protected $id_equipe;
    protected $id_trabalho;

    public function recuperarEquipeTrabalho($id_equipe_trabalho)
    {
        $conexao = new Conexao();

        $sql = "select * from equipe_trabalho where id_equipe_trabalho = $id_equipe_trabalho";
        return $conexao->recuperarDados($sql);

    }public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "select * from equipe_trabalho";
        return $conexao->recuperarDados($sql);
    }

    public function inserir($dados)
    {
        $id_equipe = $dados['id_equipe'];
        $id_trabalho = $dados['id_trabalho'];

        $conexao = new Conexao();

        $sql = "insert into equipe_trabalho (id_equipe, id_trabalho) 
                               values ('$id_equipe', '$id_trabalho')";
//        print_r($sql); die;
        return $conexao->executar($sql);
    }

    public function excluir($id_equipe_trabalho)
    {
        $conexao = new Conexao();

        $sql = "delete from equipe_trabalho where id_equipe_trabalho = $id_equipe_trabalho";
        return $conexao->executar($sql);
    }
}