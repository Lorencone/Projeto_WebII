<?php
include_once ('../conexao/conectar.php');

$equipe = new Equipe();
$paises = new Pais();
$trabalho = new trabalho();
$paise = $paises->recuperarDados();
$trabalhos = $trabalho->recuperarDados();

if(!empty($_GET['id_equipe'])){
    $equipe->carregarPorId($_GET['id_equipe']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Equipe</h1>
        <br/>
        <form method="post" action="../equipe/processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_equipe" value="<?= $equipe->getIdEquipe(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $equipe->getNome(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="data_nascimento" class="col-sm-2 control-label">Data Nascimento</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= $equipe->getDataNascimento(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="Sexo" class="col-sm-2 control-label">Sexo</label>
                <div class="col-sm-10">
                    <label class="radio-inline"><input required type="radio" name="sexo" id="sexo" value="M" <?= $equipe->getSexo() == "M" ? "checked" : '';?>>Masculino</label>
                    <label class="radio-inline"><input required type="radio" name="sexo" id="sexo" value="F" <?= $equipe->getSexo() == "F" ? "checked" : '';?>>Feminino</label>
                </div>
            </div>
            <div class="form-group">
                <label for="id_pais" class="col-sm-2 control-label">Pais</label>
                <div class="col-sm-10">
                    <select class="form-control" id="id_pais" name="id_pais">
                        <option>Selecione</option>
                        <?php
                        foreach ($paise as $pais) {
                            ?>
                            <option value="<?= $pais['id_pais'];?>" <?= ($equipe->getIdPais() == $pais['id_pais'])? "selected" : '';?> >
                                <?= $pais['id_pais']; ?>
                                <?= " - "; ?>
                                <?= $pais['nome']; ?>
                            </option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <?php
                    if(!empty($_GET['id_equipe'])){
                        echo "<a href='../equipe/processamento.php?acao=excluir&id_equipe={$equipe->getIdEquipe()}' class='btn btn-warning'>Excluir</a> </td>";
                    }
                    ?>
                    <a href="../cadastro/index.php#equipe" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>
<?php
include_once("../rodape.php");
?>