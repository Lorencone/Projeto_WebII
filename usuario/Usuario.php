<?php
include_once "../conexao/Conexao.php";

class Usuario{

    protected $id_usuario;
    protected $nome;
    protected $senha;
    protected $sexo;
    protected $email;
    protected $id_perfil;
    
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getIdPerfil()
    {
        return $this->id_perfil;
    }

    public function setIdPerfil($id_perfil)
    {
        $this->id_perfil = $id_perfil;
    }

    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "SELECT * FROM usuario order by id_usuario";
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_usuario)
    {

        $conexao = new Conexao();


        $sql = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";

        $dados = $conexao->recuperarDados($sql);

        $this->id_usuario = $dados[0]['id_usuario'];
        $this->nome = $dados[0]['nome'];
        $this->sexo = $dados[0]['sexo'];
        $this->email = $dados[0]['email'];
        $this->id_perfil = $dados[0]['id_perfil'];

//        print_r($sql);
//        die;

        return $conexao->executar($sql);
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $id_perfil = $dados['id_perfil'];

        $conexao = new Conexao();
        $sql = "insert into usuario (nome, email, senha, id_perfil) 
                values ('$nome','$email', '".md5($senha)."', '$id_perfil')";

        //print_r($sql);
        //die;

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_usuario = $dados['id_usuario'];
        $nome = $dados['nome'];

        $sexo = $dados['sexo'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $id_perfil = $dados['id_perfil'];

        $conexao = new Conexao();

        $sql = "UPDATE usuario SET
                  id_usuario = '$id_usuario',
                  nome = '$nome',
                  sexo = '$sexo',
                  email = '$email',
                  senha = '".md5($senha)."',
                  id_perfil = '$id_perfil'
                WHERE id_usuario = '$id_usuario'";
//        print_r($sql);
//        die;

        return $conexao->executar($sql);
    }

    public function excluir($id_usuario)
    {
        $conexao = new Conexao();

        $sql = "DELETE FROM usuario WHERE id_usuario = '$id_usuario'";

        print_r($sql);
        echo "<br>";
        die;

        return $conexao->executar($sql);
    }



    public function logar($dados)
    {

        $email = $dados['email'];
        $senha  = md5($dados['senha']);

        $conexao = new Conexao();

        $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";
        $dados = $conexao->recuperarDados($sql);


        if (count($dados)){

            $_SESSION['usuario']['id_usuario'] = $dados[0]['id_usuario'];
            $_SESSION['usuario']['nome'] = $dados[0]['nome'];
            $_SESSION['usuario']['email'] = $dados[0]['email'];
            $_SESSION['usuario']['sexo'] = $dados[0]['sexo'];
            $_SESSION['usuario']['id_perfil'] = $dados[0]['id_perfil'];

        }

        return $conexao->executar($sql);
    }

    public function possuiAcesso()
    {
        $raizUrl = '/php/Projeto_WebII/';
        $url = $_SERVER['REQUEST_URI'];
        $url2 = explode('?',$url);

        $sql = "SELECT * FROM pagina WHERE publica = 1";

//        print_r($url);
//        echo "<br>";
//        die;

        $conexao = new Conexao();
        $paginas = $conexao->recuperarDados($sql);

        // Se a página for cadastrada como pública, libera o acesso
        foreach ($paginas as $pagina){
            if ($url2[0] == $raizUrl . $pagina['caminho']){

                  return true;
//                print_r($pagina);
//                echo "<br>";
//                die;
            }
        }

        // Caso a página não seja pública, verifica se o usuário está logado
        // para então verificar se ele tem acesso à página
        if (!empty($_SESSION['usuario']['id_usuario'])){
            $perfil = $_SESSION['usuario']['id_perfil'];
            $sql = "SELECT * FROM permissao pe
                      INNER JOIN pagina pa on pa.id_pagina = pe.id_pagina
                    WHERE id_perfil = $perfil";
            $paginas = $conexao->recuperarDados($sql);

            foreach ($paginas as $pagina){
                if ($url2[0] == $raizUrl . $pagina['caminho']){
                    return true;
                }
            }
        }
        return false;
    }


    public function existeEmail($email)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(email) qtd FROM usuario WHERE email = '$email'";

        $dados =  $conexao->recuperarDados($sql);

        return (boolean) $dados[0]['qtd'];
    }
}
?>
