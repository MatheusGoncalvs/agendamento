<?php include_once 'layout/header.inc.php'?>
    <div class="row linha-horizontal-banner"></div>
    <div class="row titulo-cadastrar-dia">
        <h1><strong>Recupere a sua senha</strong></h1>
    </div>
    <div class="row alinhamento-recuperar-senha">
    <form action="models/email.php" method="POST">
        <div class="row espacamento-formulario">
            <h4>Digite o seu email e lhe enviaremos os seus dados! Fácil, não?! :)</h4>
        </div>
        <div class="row espacamento-formulario">
            <input type="text" name="email-recuperar" size="30">
            <input type="submit" class="btn btn-success" name="Enviar" value="Recuperar senha">
        </div>
        <div class="row espacamento-formulario">
            <h4>Lembrou a senha?! <a href="index-login.php">Efetue o seu login</a>.</h4>
        </div>
    </form>
    </div>
<?php include_once 'layout/rodape.php' ?>