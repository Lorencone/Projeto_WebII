<?php
include_once '../conexao/Conexao.php';

class Filme_Equipe_Trabalho
{
    protected $id_filme_equipe_trabalho;
    protected $id_filme;
    protected $id_equipe_trabalho;

    public function inserir($dados)
    {
        $id_filme = $dados['id_filme'];
        $id_equipe_trabalho = $dados['id_equipe_trabalho'];

        $conexao = new Conexao();


        $sql = "insert into filme_equipe_trabalho (id_filme, id_equipe_trabalho) 
                               values ('$id_filme', '$id_equipe_trabalho')";

//        print_r($sql); die;
        return $conexao->executar($sql);
    }

    public function excluir($id_filme_equipe_trabalho)
    {
        $conexao = new Conexao();

        $sql = "delete from filme_equipe_trabalho where id_equipe_trabalho = '$id_filme_equipe_trabalho'";
        return $conexao->executar($sql);
    }
}