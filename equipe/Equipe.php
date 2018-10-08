<?php
include_once('../conexao/Conexao.php');

class Equipe
{
    protected $id_equipe;
    protected $nome;
    protected $data_nascimento;
    protected $sexo;
    protected $id_pais;

    public function getIdEquipe()
    {
        return $this->id_equipe;
    }

    public function setIdEquipe($id_equipe)
    {
        $this->id_equipe = $id_equipe;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getIdPais()
    {
        return $this->id_pais;
    }

    public function setIdPais($id_pais)
    {
        $this->id_pais = $id_pais;
    }

    public function recuperarDados()
    {

        $conexao = new Conexao();
        $sql = "select * from equipe ";
        return $conexao->recuperar($sql);
    }

    public function carregarPorId($id_equipe)
    {
        $conexao = new Conexao();

        $sql = "select * from equipe WHERE id_equipe = '$id_equipe'";
        $dados = $conexao->recuperar($sql);

        $this->id_equipe = $dados[0]['id_equipe'];
        $this->nome = $dados[0]['nome'];
        $this->sexo = $dados[0]['sexo'];
        $this->data_nascimento = $dados[0]['data_nascimento'];
        $this->id_pais = $dados[0]['id_pais'];
        $this->id_trabalho = $dados[0]['id_trabalho'];
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $data_nascimento = $dados['data_nascimento'];
        $sexo = $dados['sexo'];
        $id_pais = $dados['id_pais'];

        $conexao = new Conexao();
        $sql = "insert into equipe (nome, sexo, data_nascimento, id_pais) 
                values ('$nome', '$sexo','$data_nascimento', '$id_pais')";
        print_r($sql);
        die;
        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_equipe = $dados['id_equipe'];
        $nome = $dados['nome'];
        $data_nascimento = $dados['data_nascimento'];
        $sexo = $dados['sexo'];
        $id_pais = $dados['id_pais'];

        $conexao = new Conexao();

        $sql = "update equipe set 
                nome = '$nome' , 
                sexo = '$sexo', 
                data_nascimento = '$data_nascimento', 
                id_pais = '$id_pais'

                WHERE id_equipe = '$id_equipe'";
        print_r($sql);
        die;
        return $conexao->executar($sql);
    }

    public function deletar($id_equipe)
    {

        $conexao = new Conexao();
        $sql = "DELETE FROM equipe WHERE id_equipe = '$id_equipe'";
        print_r($sql);
        die;
        return $conexao->executar($sql);
    }

}
?>