<?php

include_once ('../conexao/conectar.php');

$filme = new Filme();
$etaria = new Classificacao();
$dublado = new Idioma();
$legendado = new Legenda;
$tipo = new Genero();
$local  = new Pais();
$pessoa = new Equipe();
$atuar = new Trabalho();

$id_classicacoes = $etaria->recuperarDados();
$id_idiomas = $dublado->recuperarDados();
$id_legendas = $legendado->recuperarDados();
$id_generos = $tipo->recuperarDados();
$id_paises  = $local->recuperarDados();
$id_equipes = $pessoa->recuperarDados();
$id_trabalhos = $atuar->recuperarDados();

if(!empty($_GET['id_filme'])){
    $filme->carregarPorId($_GET['id_filme']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Filme</h1>
        <br/>

        <form method="post" action="processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_filme" value="<?= $filme->getIdFilme(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $filme->getNome(); ?>">
                </div>
                <div id="mensagemNome" role="alert"></div>
            </div>
            <div class="form-group">
                <label for="estreia" class="col-sm-2 control-label">Estreia</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="estreia" name="estreia" value="<?= $filme->getEstreia(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="producao" class="col-sm-2 control-label">Produtora</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="producao" name="producao" value="<?= $filme->getProducao(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="bilheteria" class="col-sm-2 control-label">Bilheteria</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="bilheteria" name="bilheteria" value="<?= $filme->getBilheteria(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="gasto" class="col-sm-2 control-label">Orçamento</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="gasto" name="gasto" value="<?= $filme->getGasto(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="duracao" class="col-sm-2 control-label">Duração</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="duracao" name="duracao" value="<?= $filme->getDuracao(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="sinopse" class="col-sm-2 control-label">Sinopse</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="sinopse" name="sinopse" ><?= $filme->getSinopse(); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="critica" class="col-sm-2 control-label">Crítica</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="critica" name="critica"><?= $filme->getCritica(); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="indicacao" class="col-sm-2 control-label">Indicação</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="indicacao" name="indicacao" value="<?= $filme->getIndicacao(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="id_classificacao" class="col-sm-2 control-label">Classificacao</label>
                <div class="col-sm-10">
                    <select class="form-control chosen" id="id_classificacao" name="id_classificacao">
                        <option>Selecione</option>
                        <?php
                        foreach ($id_classicacoes as $id_classicacao) {
                            ?>
                            <option required value="<?= $id_classicacao['id_classificacao'];?>" <?= $filme->getIdClassificacao() == $id_classicacao['id_classificacao']? "selected" : '';?> >
                                <?= $id_classicacao['nome']; ?>
                            </option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="id_idioma" class="col-sm-2 control-label">Idioma</label>
                <div class="col-sm-10">
                    <select class="form-control chosen" multiple id="id_idioma[]" name="id_idioma">
                        <option>Selecione</option>
                        <?php
                        foreach ($id_idiomas as $id_idioma) {
                            ?>
                            <option required value="<?= $id_idioma['id_idioma'];?>" <?= ($filme->getIdIdioma() == $id_idioma['id_idioma'])? "selected" : '';?> >
                                <?= $id_idioma['nome']; ?>
                            </option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="id_legenda" class="col-sm-2 control-label">Legenda</label>
                <div class="col-sm-10">
                    <select class="form-control chosen" multiple id="id_legenda[]" name="id_legenda">
                        <option>Selecione</option>
                        <?php
                        foreach ($id_legendas as $id_legenda) {
                            ?>
                            <option required value="<?= $id_legenda['id_legenda'];?>" <?= ($filme->getIdLegenda() == $id_legenda['id_legenda'])? "selected" : '';?> >
                                <?= $id_legenda['nome']; ?>
                            </option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="id_genero" class="col-sm-2 control-label">Gênero</label>
                <div class="col-sm-10">
                    <select class="form-control chosen" multiple id="id_genero []" name="id_genero">
                        <option>Selecione</option>
                        <?php
                        foreach ($id_generos as $id_genero) {
                            ?>
                            <option required value="<?= $id_genero['id_genero'];?>" <?= ($filme->getIdGenero() == $id_genero['id_genero'])? "selected" : '';?> >
                                <?= $id_genero['nome']; ?>
                            </option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">País</label>
                <div class="col-sm-10">
                    <select class="form-control chosen" id="id_pais" name="id_pais">
                        <option>Selecione</option>
                        <?php
                        foreach ($id_paises as $id_pais) {
                            ?>
                            <option required value="<?= $id_pais['id_pais'];?>" <?= ($filme->getIdPais() == $id_pais['id_pais'])? "selected" : '';?> >
                                <?= $id_pais['nome']; ?>
                            </option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="id_equipe" class="col-sm-2 control-label">Equipe</label>
                <div class="col-sm-10">
                    <select class="form-control chosen" multiple id="id_equipe[]" name="id_equipe">
                        <option>Selecione</option>
                        <?php
                        foreach ($id_equipes as $id_equipe) {
                            ?>
                            <option required value="<?= $id_equipe['id_equipe'];?>" <?= ($filme->getIdEquipe() == $id_equipe['id_equipe'])? "selected" : '';?> >
                                <?= $id_equipe['nome']; ?>
                            </option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="trailer" class="col-sm-2 control-label">Trailer</label>
                <div class="col-sm-10">
                    <input type="url" class="form-control" id="trailer" name="trailer" value="<?= $filme->getTrailer(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="assistir" class="col-sm-2 control-label">Assistir</label>
                <div class="col-sm-10">
                    <input type="url" class="form-control" id="assistir" name="assistir" value="<?= $filme->getAssistir(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="imagem" class="col-sm-2 control-label">Imagem</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="imagem" name="imagem" value="<?= $filme->getImagem(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <a href="../cadastro/index.php#filme" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>

<?php
include_once("../rodape.php");
?>
<script>
    // AJAX para verificação do nome
    $('#nome').change(function () {

        $.ajax({
            url: 'processamento.php?acao=verificar_nome&' + $('#nome').serialize(),
            success: function (dados) {
                $('#mensagemNome').html(dados);
            }
        });

        // Verificação em JQUERY Load
        // $('#mensagemNome').load('processamento.php?acao=verificar_nome&nome=' + $('#nome').val());

    });
</script>
