<?php
include_once '../conexao/Conexao.php';

class Filme_Legenda
{
    protected $id_filme_legenda;
    protected $id_filme;
    protected $id_legenda;

    public function recuperarFilme($id_filme)
    {
        $conexao = new Conexao();

        $sql = "select * from filme_legenda where id_filme = $id_filme";
        return $conexao->recuperarDados($sql);
    }

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

    public function excluir($id_filme_legenda)
    {
        $conexao = new Conexao();

        $sql = "delete from filme_legenda where id_filme_legenda = '$id_filme_legenda'";
        return $conexao->executar($sql);
    }
}