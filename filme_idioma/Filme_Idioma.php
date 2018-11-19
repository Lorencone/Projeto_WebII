<?php
include_once '../conexao/Conexao.php';

class Filme_Idioma
{
    protected $id_filme;
    protected $id_idioma;


    public function inserir($dados)
    {
        $id_filme = $dados['id_filme'];
        $id_idioma = $dados['id_idioma'];

        $conexao = new Conexao();

        $sql = "insert into filme_idioma (id_filme, id_idioma) 
                               values ('$id_filme', '$id_idioma')";
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