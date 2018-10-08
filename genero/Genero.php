<?php
include_once('../conexao/Conexao.php');

class Genero
{
    protected $id_genero;
    protected $nome;
    protected $imagem;

    public function getIdGenero()
    {
        return $this->id_genero;
    }

    public function setIdGenero($id_genero)
    {
        $this->id_genero = $id_genero;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function recuperarDados()
    {

        $conexao = new Conexao();
        $sql = "select * from genero ";
        return $conexao->recuperar($sql);
    }

    public function carregarPorId($id_genero)
    {
        $conexao = new Conexao();

        $sql = "select * from genero WHERE id_genero = '$id_genero'";
        $dados = $conexao->recuperar($sql);

        $this->id_genero = $dados[0]['id_genero'];
        $this->nome = $dados[0]['nome'];
        $this->imagem = $dados[0]['imagem'];
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $imagem = $dados['imagem'];
        $conexao = new Conexao();
        $sql = "insert into genero (nome, imagem) values ('$nome', '$imagem')";
        print_r($sql);
        die;
        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_genero = $dados['id_genero'];
        $nome = $dados['nome'];
        $imagem = $dados['imagem'];
        $conexao = new Conexao();
        $sql = "update genero set 
                nome = '$nome',
                imagem = '$imagem'
                WHERE id_genero = '$id_genero'";
        print_r($sql);
        die;
        return $conexao->executar($sql);
    }

    public function deletar($id_genero)
    {

        $conexao = new Conexao();
        $sql = "DELETE FROM genero WHERE id_genero = '$id_genero'";
        print_r($sql);
        die;
        return $conexao->executar($sql);
    }
}
?>