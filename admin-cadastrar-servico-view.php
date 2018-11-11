<?php include_once 'layout/painel-administrador.php' ?>
    <div class="row linha-horizontal-banner"></div>
    <div class="row titulo-cadastrar-servico">
        <h1><strong>Cadastrar um novo serviço</strong></h1>
    </div>
    <div class="row alinhamento-cadastrar-servico">
    <form action="admin-cadastrar-servico.php" method="POST">
        <div class="row espacamento-formulario">
            <h4>Qual o nome do serviço?</h4>
        </div>
        <div class="row espacamento-formulario">
            <input type="text" name="servico" placeholder="Servico 1" size="60">
        </div>
        <div class="row espacamento-formulario">
            <input type="submit" class="btn btn-success" value="Cadastrar servico">
        </div>
    </form>
    </div>
<?php include_once 'layout/painel-administrador-rodape.php' ?>