<?php
include_once "../conexao/Conexao.php";

class Pagina
{

    protected $id_pagina;
    protected $nome;
    protected $caminho;
    protected $publica;

    public function getIdPagina()
    {
        return $this->id_pagina;
    }

    public function setIdPagina($id_pagina)
    {
        $this->id_pagina = $id_pagina;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCaminho()
    {
        return $this->caminho;
    }

    public function setCaminho($caminho)
    {
        $this->caminho = $caminho;
    }

    public function getPublica()
    {
        return $this->publica;
    }

    public function setPublica($publica)
    {
        $this->publica = $publica;
    }


    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "select * from pagina order by nome";
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_pagina)
    {

        $conexao = new Conexao();


        $sql = "select * from pagina where id_pagina = '$id_pagina'";

        $dados = $conexao->recuperarDados($sql);

        $this->id_pagina = $dados[0]['id_pagina'];
        $this->nome = $dados[0]['nome'];
        $this->caminho = $dados[0]['caminho'];
        $this->publica = $dados[0]['publica'];

        return $conexao->executar($sql);
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $caminho = $dados['caminho'];
        $publica = $dados['publica'];

        $conexao = new Conexao();

        $sql = "insert into pagina (nome, caminho, publica) 
                            values ('$nome', '$caminho', '$publica')";

//        print_r($sql);
//        print_r($dados);
//        die;

        $id_pagina = $conexao->executar($sql);

        $this->vincularPerfil($id_pagina, $dados);

        return $id_pagina;
    }

    public function vincularPerfil($id_pagina, $dados)
    {
        include_once '../permissao/Permissao.php';

        $permissao = new Permissao();

        if(isset($dados['id_perfil'])){

            foreach ($dados['id_perfil'] as $perfil) {

                $aDados = [
                    'id_pagina' => $id_pagina,
                    'id_perfil' => $perfil,
                ];

                $permissao->inserir($aDados);
            }
        }

    }

    public function alterar($dados)
    {
        $id_pagina = $dados['id_pagina'];
        $nome = $dados['nome'];
        $caminho = $dados['caminho'];
        $publica = !empty($dados['publica']) ? 1 : 0;

        $conexao = new Conexao();

        $sql = "update pagina set
                  nome = '$nome',
                  caminho = '$caminho',
                  publica = '$publica'
                where id_pagina = '$id_pagina'";
        return $conexao->executar($sql);
    }

    public function excluir($id_pagina)
    {
        $conexao = new Conexao();

        $sql = "delete from pagina where id_pagina = '$id_pagina'";
        return $conexao->executar($sql);
    }

    public function existeNome($nome)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(nome) qtd FROM pagina WHERE nome = '$nome'";
        $dados = $conexao->recuperarDados($sql);

        return $dados[0]['qtd'];
    }
}