<?php
include_once '../conexao/Conexao.php';

class Filme_Legenda
{
    protected $id_filme;
    protected $id_legenda;


    public function inserir($dados)
    {
        $id_filme = $dados['id_filme'];
        $id_legenda = $dados['id_legenda'];

        $conexao = new Conexao();

        $sql = "insert into filme_legenda (id_filme, id_legenda) 
                               values ('$id_filme', '$id_legenda')";
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