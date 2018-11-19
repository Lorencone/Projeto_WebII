<?php
include_once '../conexao/Conexao.php';

class Filme_Genero
{
    protected $id_filme;
    protected $id_genero;


    public function inserir($dados)
    {
        $id_filme = $dados['id_filme'];
        $id_genero = $dados['id_genero'];

        $conexao = new Conexao();

        $sql = "insert into filme_genero (id_filme, id_genero) 
                               values ('$id_filme', '$id_genero')";
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