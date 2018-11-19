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
        $imagem = $_FILES['imagem']['name'];
        $estudio = $dados['estudio'];
        $id_classificacao = $dados['id_classificacao'];
        $id_pais = $dados['id_pais'];

        $conexao = new Conexao();

        $this->uploadFoto();

        $sql = "insert into filme (nome, estreia, bilheteria, duracao, sinopse, critica, 
                                  trailer, assistir, indicacao, gasto, imagem, estudio, 
                                  id_classificacao, id_pais) 
                            values ('$nome', '$estreia', '$bilheteria', '$duracao', '$sinopse', '$critica',
                             '$trailer', '$assistir', '$indicacao', '$gasto', '$imagem', '$estudio', 
                             '$id_classificacao', '$id_pais')";
        print_r($sql);
        die;

        $id_filme = $conexao->executar($sql);

        $this->vincularEquipeTrabalho($id_filme, $dados);
        $this->vincularGenero($id_filme, $dados);
        $this->vincularIdioma($id_filme, $dados);
        $this->vincularLegenda($id_filme, $dados);

        return $id_filme;
    }

    public function vincularEquipeTrabalho($id_filme, $dados)
    {
        include_once '../filme_equipe_trabalho/Filme_Equipe_Trabalho.php';

        $fet = new Filme_Equipe_Trabalho();

        if(isset($dados['id_equipe'])){

            foreach ($dados['id_equipe'] as $equipe) {
                foreach ($dados['id_trabalho'] as $trabalho) {

                    $aDados = [
                        'id_filme' => $id_filme,
                        'id_equipe' => $equipe,
                        'id_trabalho' => $trabalho
                    ];

                    print_r($aDados);
                    die;
                    $fet->inserir($aDados);
                }
            }
        }

    }

    public function vincularGenero($id_filme, $dados)
    {
        include_once '../filme_genero/Filme_Genero.php';

        $fg = new Filme_Genero();

        if(isset($dados['id_genero'])){

            foreach ($dados['id_genero'] as $genero) {

                $aDados = [
                    'id_filme' => $id_filme,
                    'id_genero' => $genero,
                ];

                print_r($aDados);
                die;

                $fg->inserir($aDados);
            }
        }

    }

    public function vincularIdioma($id_filme, $dados)
    {
        include_once '../filme_idioma/Filme_Idioma.php';

        $fi = new Filme_Idioma();

        if(isset($dados['id_idioma'])){

            foreach ($dados['id_idioma'] as $idioma) {

                $aDados = [
                    'id_filme' => $id_filme,
                    'id_idioma' => $idioma,
                ];

                print_r($aDados);
                die;
                $fi->inserir($aDados);
            }
        }

    }

    public function vincularLegenda($id_filme, $dados)
    {
        include_once '../filme_legenda/Filme_Legenda.php';

        $fl = new Filme_Legenda();

        if(isset($dados['id_legenda'])){

            foreach ($dados['id_legenda'] as $legenda) {

                $aDados = [
                    'id_filme' => $id_filme,
                    'id_legenda' => $legenda,
                ];

                print_r($aDados);
                die;
                $fl->inserir($aDados);
            }
        }

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
        $imagem = $_FILES['imagem']['name'];
        $estudio = $dados['estudio'];
        $id_classificacao = $dados['id_classificacao'];
        $id_pais = $dados['id_pais'];

        $conexao = new Conexao();

        $this->uploadFoto();

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
        if ($_FILES['imagem']['erro'] == UPLOAD_ERR_OK){
            $origem = $_FILES['imagem']['tmp_name'];
            $destino = '../upload/genero/' . $_FILES['imagem']['name'];

            move_uploaded_file($origem, $destino);
        }
    }
}