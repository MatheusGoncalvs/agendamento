<?php include_once 'layout/header.inc.php' ?>
    <div class="row linha-horizontal-banner"></div>
    <div class="row titulo-cadastrar-dia">
        <h1><strong>Insira as suas informações para confirmar o seu cadastro</strong></h1>
    </div>
    <div class="row alinhamento-cadastrar-cliente">
    <form action="admin-cadastrar-cliente.php" method="POST">
        <div class="row espacamento-formulario">
            <label>Qual o seu nome?</label>
        </div>
        <div class="row espacamento-formulario">
            <input type="text" name="nome_cliente" required>
        </div>
        <div class="row espacamento-formulario">
            <label>Qual o seu CPF?</label>
        </div>
        <div class="row espacamento-formulario">
            <input type="text" name="cpf" required>
        </div>
        <div class="row espacamento-formulario">
            <label>Qual o seu email?</label>
        </div>
        <div class="row espacamento-formulario">
            <input type="text" name="email" required>
        </div>
        <div class="row espacamento-formulario">
            <label>Defina uma senha</label>
        </div>
        <div class="row espacamento-formulario">
            <input type="password" name="senha" required>
        </div>
        <div class="row alinha-botoes">
            <div class="col-md-6 alinha-botoes">
                <input type="submit" class="btn btn-success" value="Efetuar cadastro">
            </div>
            <div class="col-md-6 alinha-botoes">
                <input type="reset" class="btn" value="Limpar formulário">
            </div>
        </div>
    </form>
    </div>
<?php include_once 'layout/rodape.php' ?>