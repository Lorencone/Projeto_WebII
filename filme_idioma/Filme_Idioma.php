<?php
include_once '../conexao/Conexao.php';

class Filme_Idioma
{
    protected $id_filme_idioma;
    protected $id_filme;
    protected $id_idioma;

    public function recuperarFilme($id_filme)
    {
        $conexao = new Conexao();

        $sql = "select * from filme_idioma where id_filme = $id_filme";
        return $conexao->recuperarDados($sql);
    }

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

    public function excluir($id_filme_idioma)
    {
        $conexao = new Conexao();

        $sql = "delete from filme_idioma where id_filme_idioma = '$id_filme_idioma'";
        return $conexao->executar($sql);
    }
}