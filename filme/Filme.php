<?php
include_once "../conexao/Conexao.php";

class Filme
{
    protected $id_filme;
    protected $nome;
    protected $estreia;
    protected $bilheteria;
    protected $duracao;
    protected $sinopse;
    protected $critica;
    protected $trailer;
    protected $assistir;
    protected $indicacao;
    protected $gasto;
    protected $imagem;
    protected $estudio;
    protected $id_classificacao;
    protected $id_pais;
    protected $id_legenda;
    protected $id_idioma;
    protected $id_equipe;
    protected $id_trabalho;
    protected $id_genero;

    public function getIdFilme()
    {
        return $this->id_filme;
    }

    public function setIdFilme($id_filme)
    {
        $this->id_filme = $id_filme;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEstreia()
    {
        return $this->estreia;
    }

    public function setEstreia($estreia)
    {
        $this->estreia = $estreia;
    }

    public function getBilheteria()
    {
        return $this->bilheteria;
    }

    public function setBilheteria($bilheteria)
    {
        $this->bilheteria = $bilheteria;
    }

    public function getDuracao()
    {
        return $this->duracao;
    }

    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;
    }

    public function getSinopse()
    {
        return $this->sinopse;
    }

    public function setSinopse($sinopse)
    {
        $this->sinopse = $sinopse;
    }

    public function getCritica()
    {
        return $this->critica;
    }

    public function setCritica($critica)
    {
        $this->critica = $critica;
    }

    public function getTrailer()
    {
        return $this->trailer;
    }

    public function setTrailer($trailer)
    {
        $this->trailer = $trailer;
    }

    public function getAssistir()
    {
        return $this->assistir;
    }

    public function setAssistir($assistir)
    {
        $this->assistir = $assistir;
    }

    public function getIndicacao()
    {
        return $this->indicacao;
    }

    public function setIndicacao($indicacao)
    {
        $this->indicacao = $indicacao;
    }

    public function getGasto()
    {
        return $this->gasto;
    }

    public function setGasto($gasto)
    {
        $this->gasto = $gasto;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function getEstudio()
    {
        return $this->estudio;
    }

    public function setEstudio($estudio)
    {
        $this->estudio = $estudio;
    }

    public function getIdClassificacao()
    {
        return $this->id_classificacao;
    }

    public function setIdClassificacao($id_classificacao)
    {
        $this->id_classificacao = $id_classificacao;
    }

    public function getIdPais()
    {
        return $this->id_pais;
    }

    public function setIdPais($id_pais)
    {
        $this->id_pais = $id_pais;
    }

    public function getIdLegenda()
    {
        return $this->id_legenda;
    }

    public function setIdLegenda($id_legenda)
    {
        $this->id_legenda = $id_legenda;
    }

    public function getIdIdioma()
    {
        return $this->id_idioma;
    }

    public function setIdIdioma($id_idioma)
    {
        $this->id_idioma = $id_idioma;
    }

    public function getIdEquipe()
    {
        return $this->id_equipe;
    }

    public function setIdEquipe($id_equipe)
    {
        $this->id_equipe = $id_equipe;
    }

    public function getIdTrabalho()
    {
        return $this->id_trabalho;
    }

    public function setIdTrabalho($id_trabalho)
    {
        $this->id_trabalho = $id_trabalho;
    }

    public function getIdGenero()
    {
        return $this->id_genero;
    }

    public function setIdGenero($id_genero)
    {
        $this->id_genero = $id_genero;
    }

    //Para fazer a interação com o Banco de Dados

    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "select * from filme ";
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorGenero($id_genero)
    {
        $conexao = new Conexao();

        $sql = "select * from filme WHERE id_genero = '$id_genero'";
        return $conexao->recuperarDados($sql);

    }

    public function carregarPorId($id_filme)
    {
        $conexao = new Conexao();

        $sql = "select * from filme WHERE id_filme = '$id_filme'";
        $dados = $conexao->recuperarDados($sql);

        $this->nome = $dados[0]['nome'];
        $this->estreia = $dados[0]['estreia'];
        $this->bilheteria = $dados[0]['bilheteria'];
        $this->duracao = $dados[0]['duracao'];
        $this->sinopse = $dados[0]['sinopse'];
        $this->critica = $dados[0]['critica'];
        $this->trailer = $dados[0]['trailer'];
        $this->assistir = $dados[0]['assistir'];
        $this->indicacao = $dados[0]['indicacao'];
        $this->gasto = $dados[0]['gasto'];
        $this->imagem = $dados[0]['imagem'];
        $this->estudio = $dados[0]['estudio'];
        $this->id_classificacao = $dados[0]['id_classificacao'];
        $this->id_pais = $dados[0]['id_pais'];
        $this->id_legenda = $dados[0]['id_legenda'];
        $this->id_idioma = $dados[0]['id_idioma'];
        $this->id_equipe = $dados[0]['id_equipe'];
        $this->id_trabalho = $dados[0]['id_trabalho'];
        $this->id_genero = $dados[0]['id_genero'];

    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $estreia = $dados['estreia'];
        $bilheteria = $dados['bilheteria'];
        $duracao = $dados['duracao'];
        $sinopse = $dados['sinopse'];
        $critica = $dados['critica'];
        $trailer = $dados['trailer'];
        $assistir = $dados['assistir'];
        $indicacao = $dados['indicacao'];
        $gasto = $dados['gasto'];
        $imagem = $dados['imagem'];
        $estudio = $dados['estudio'];
        $id_classificacao = $dados['id_classificacao'];
        $id_pais = $dados['id_pais'];
        $id_legenda = $dados['id_legenda'];
        $id_idioma = $dados['id_idioma'];
        $id_equipe = $dados['id_equipe'];
        $id_trabalho = $dados['id_trabalho'];
        $id_genero = $dados['id_genero'];

        $conexao = new Conexao();
        $sql = "insert into filme (nome, estreia, bilheteria, duracao, sinopse, critica, 
                                  trailer, assistir, indicacao, gasto, imagem, estudio, 
                                  id_classificacao, id_pais, id_legenda, id_idioma, id_equipe, id_trabalho, id_genero) 
                            values ('$nome', '$estreia', '$bilheteria', '$duracao', '$sinopse', '$critica',
                             '$trailer', '$assistir', '$indicacao', '$gasto', '$imagem', '$estudio', 
                             '$id_classificacao', '$id_pais', '$id_legenda', '$id_idioma', '$id_equipe', 
                             '$id_trabalho', '$id_genero')";
        print_r($sql);
        die;
        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_filme = $dados['id_filme'];
        $nome = $dados['nome'];
        $estreia = $dados['estreia'];
        $bilheteria = $dados['bilheteria'];
        $duracao = $dados['duracao'];
        $sinopse = $dados['sinopse'];
        $critica = $dados['critica'];
        $trailer = $dados['trailer'];
        $assistir = $dados['assistir'];
        $indicacao = $dados['indicacao'];
        $gasto = $dados['gasto'];
        $imagem = $dados['imagem'];
        $estudio = $dados['estudio'];
        $id_classificacao = $dados['id_classificacao'];
        $id_pais = $dados['id_pais'];
        $id_legenda = $dados['id_legenda'];
        $id_idioma = $dados['id_idioma'];
        $id_equipe = $dados['id_equipe'];
        $id_trabalho = $dados['id_trabalho'];
        $id_genero = $dados['id_genero'];

        $conexao = new Conexao();
        $sql = "update filme set
                        nome = '$nome', 
                        estreia = '$estreia', 
                        bilheteria = '$bilheteria', 
                        duracao = '$duracao', 
                        sinopse = '$sinopse', 
                        critica = '$critica', 
                        trailer = '$trailer', 
                        assistir = '$assistir', 
                        indicacao = '$indicacao', 
                        gasto = '$gasto', 
                        imagem = '$imagem', 
                        estudio = '$estudio', 
                        id_classificacao = '$id_classificacao', 
                        id_pais = '$id_pais', 
                        id_legenda = '$id_legenda', 
                        id_idioma = '$id_idioma', 
                        id_equipe = '$id_equipe', 
                        id_trabalho = '$id_trabalho', 
                        id_genero = '$id_genero' 
                      
                    WHERE id_filme = $id_filme";

        print_r($sql);
        die;
        return $conexao->executar($sql);
    }

    public function deletar($id_filme)
    {
        $conexao = new Conexao();
        $sql = "DELETE FROM filme WHERE id_filme = '$id_filme'";
        print_r($sql);
        die;
        return $conexao->executar($sql);
    }

    public function existeNome($nome)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(nome) qtd FROM filme WHERE nome = '$nome'";
        $dados = $conexao->recuperarDados($sql);

        return $dados[0]['qtd'];
    }

    public function uploadFoto()
    {
        if ($_FILES['foto']['erro'] == UPLOAD_ERR_OK){
            $origem = $_FILES['foto']['tmp_name'];
            $destino = '../upload/filme/' . $_FILES['foto']['name'];

            move_uploaded_file($origem, $destino);
            //TesteS
        }
    }
}