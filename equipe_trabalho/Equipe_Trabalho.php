<?php
include_once '../conexao/Conexao.php';

class Equipe_Trabalho
{
    protected $id_equipe;
    protected $id_trabalho;


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

//    public function excluir($id_permissao)
//    {
//        $conexao = new Conexao();
//
//        $sql = "delete from permissao where id_permissao = '$id_permissao'";
//        return $conexao->executar($sql);
//    }
}