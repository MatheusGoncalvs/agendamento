<?php include_once 'layout/painel-administrador.php' ?>
    <div class="row linha-horizontal-banner"></div>
    <div class="row titulo-cadastrar-dia">
        <h1><strong>Cadastrar um novo dia</strong></h1>
    </div>
    <div class="row alinhamento-cadastrar-dia">
    <form action="admin-cadastrar-dia.php" method="POST">
        <div class="row espacamento-formulario">
            <label>Qual o dia da semana?</label>
        </div>
        <div class="row espacamento-formulario">
            <input type="text" name="dia_da_semana">
        </div>
        <div class="row espacamento-formulario">
            <label>Qual a data?</label>
        </div>
        <div class="row espacamento-formulario">
            <input type="text" name="dia_data">
        </div>
        <div class="row espacamento-formulario">
            <input type="submit" class="btn btn-success" value="Cadastrar dia">
        </div>
    </form>
    </div>
<?php include_once 'layout/painel-administrador-rodape.php' ?>