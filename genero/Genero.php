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
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_genero)
    {
        $conexao = new Conexao();

        $sql = "select * from genero WHERE id_genero = '$id_genero'";
        $dados = $conexao->recuperarDados($sql);

        $this->id_genero = $dados[0]['id_genero'];
        $this->nome = $dados[0]['nome'];
        $this->imagem = $dados[0]['imagem'];
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $imagem = $_FILES['imagem']['name'];
        $conexao = new Conexao();
        $this->uploadFoto();
        $sql = "insert into genero (nome, imagem) values ('$nome', '$imagem')";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_genero = $dados['id_genero'];
        $nome = $dados['nome'];
        $imagem = $_FILES['imagem']['name'];
        $conexao = new Conexao();
        $this->uploadFoto();
        $sql = "update genero set 
                nome = '$nome',
                imagem = '$imagem'
                WHERE id_genero = '$id_genero'";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function deletar($id_genero)
    {

        $conexao = new Conexao();
        $sql = "DELETE FROM genero WHERE id_genero = '$id_genero'";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function uploadFoto()
    {
        if ($_FILES['imagem']['erro'] == UPLOAD_ERR_OK){
            $origem = $_FILES['imagem']['tmp_name'];
            $destino = '../upload/genero/' . $_FILES['imagem']['name'];

            move_uploaded_file($origem, $destino);
        }
    }

    public function existeNome($nome)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(nome) qtd FROM genero WHERE nome = '$nome'";
        $dados = $conexao->recuperarDados($sql);

        return $dados[0]['qtd'];
    }

}
?>