<style>
    /*ajustes do select*/
    select.form-control + .chosen-container.chosen-container-single .chosen-single{
        height: 40px; /*altura*/
        padding: 6px 10px; /*ajuste do espaçamento vertical/horizontal*/
        font-size: 18px; /*tamanho da fonte*/
    }

    /*seta*/
    select.form-control + .chosen-container.chosen-container-single .chosen-single div{
        top: 8px;
    }

    /*ícone de deselecionar*/
    select.form-control + .chosen-container.chosen-container-single .search-choice-close{
        top: 14px;
    }

    /*caixa de texto*/
    select.form-control + .chosen-container .chosen-search input[type=text] {
        height: 40px;
        font-size: 18px;
    }

    /*resultados*/
    select.form-control + .chosen-container .chosen-results {
        font-size: 18px;
    }
</style>