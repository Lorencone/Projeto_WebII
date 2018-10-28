<?php
include_once "../conexao/Conexao.php";

class Permissao{

    protected $id_permissao;
    protected $id_perfil;
    protected $id_pagina;


    public function inserir($dados)
    {
        $id_perfil = $dados['id_perfil'];
        $id_pagina = $dados['id_pagina'];

        $conexao = new Conexao();

        $sql = "insert into permissao (id_perfil, id_pagina) 
                               values ('$id_perfil', '$id_pagina')";
//        print_r($sql); die;
        return $conexao->executar($sql);
    }

    public function excluir($id_permissao)
    {
        $conexao = new Conexao();

        $sql = "delete from permissao where id_permissao = '$id_permissao'";
        return $conexao->executar($sql);
    }
    
}