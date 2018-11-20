<?php
include_once '../conexao/Conexao.php';

class Filme_Genero
{
    protected $id_filme_genero;
    protected $id_filme;
    protected $id_genero;

    public function recuperarFilme($id_filme)
    {
        $conexao = new Conexao();

        $sql = "select * from filme_genero where id_filme = $id_filme";
        return $conexao->recuperarDados($sql);
    }

    public function recuperarGenero($id_genero)
    {
        $conexao = new Conexao();

        $sql = "select * from filme_genero where id_genero = '$id_genero'";
        return $conexao->recuperarDados($sql);
    }

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

    public function excluir($id_filme_genero)
    {
        $conexao = new Conexao();

        $sql = "delete from filme_genero where id_filme_genero = '$id_filme_genero'";
        return $conexao->executar($sql);
    }
}