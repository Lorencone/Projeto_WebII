<?php
include_once('../conexao/Conexao.php');

class Classificacao
{
    protected $id_classificacao;
    protected $nome;
    protected $idade;

    public function getIdClassificacao()
    {
        return $this->id_classificacao;
    }

    public function setIdClassificacao($id_classificacao)
    {
        $this->id_classificacao = $id_classificacao;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    public function recuperarDados()
    {

        $conexao = new Conexao();
        $sql = "select * from classificacao ";
        return $conexao->recuperar($sql);
    }

    public function carregarPorId($id_classificacao)
    {
        $conexao = new Conexao();

        $sql = "select * from classificacao WHERE id_classificacao = '$id_classificacao'";
        $dados = $conexao->recuperar($sql);

        $this->id_classificacao = $dados[0]['id_classificacao'];
        $this->nome = $dados[0]['nome'];
        $this->idade = $dados[0]['idade'];
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $idade = $dados['idade'];
        $conexao = new Conexao();
        $sql = "insert into classificacao (nome, idade) 
                            values ('$nome', '$idade')";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_classificacao = $dados['id_classificacao'];
        $nome = $dados['nome'];
        $idade = $dados['idade'];
        $conexao = new Conexao();
        $sql = "update classificacao set 
                        nome = '$nome' , idade = '$idade' 
                        WHERE id_classificacao = '$id_classificacao'";

//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }

    public function deletar($id_classificacao)
    {

        $conexao = new Conexao();
        $sql = "DELETE FROM classificacao WHERE id_classificacao = '$id_classificacao'";
//        print_r($sql);
//        die;
        return $conexao->executar($sql);
    }
}

?>