<?php
session_start();
?>
<?php include_once 'layout/header.inc.php' ?>
    <!--Seção-->
     <!--Seção logo do NAF -->
    <div class="row">
    <div class="col-md-6 secao-logo-naf-outras-paginas">
        <img src="imagens/brand-banner.png" class="img-fluid" width="221px">
    </div>
    <div class="col-md-6 secao-logo-naf-outras-paginas alinhamento-naf-text">
        <h1>Efetue seu login no <strong>NAF</strong></h1>
    </div>
    </div>
    <div class="row linha-horizontal-banner"></div>
    <div class="row">
        <div class="col-md-6 coluna-nao-tem-conta">
            <div class="row">
                <h1>Não tem uma conta no <strong>NAF</strong>?</h1>
            </div>
            <div class="row">
                <a href="cadastre-se-view.php">Criar uma conta</a>
            </div>
        </div>
        <div class="col-md-3 coluna-nao-tem-conta">
            <form action="models/login.php" method="POST">
                <div class="row">
                    <?php
                        if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="notification is-danger">
                        <h4>O email ou senha digitados não conferem. Por favor verifique os dados informados.</h4>
                    </div>
                    <?php
                        endif;
                        unset($_SESSION['nao_autenticado']);
                    ?>
                </div>
                <div class="row">
                    <label for="email">Endereço de email</label>
                    <input type="text" class="form-control" id="email" name="email"
                        aria-describedby="emailHelp" placeholder="Seu email">
                </div>
                <div class="row coluna-email-senha">
                    <div class="col-md-4 ">
                        <label for="senha">Senha</label>
                    </div>
                    <div class="col-md-8 alinhamento-esqueceu-senha-text">
                        <a href="recuperar_senha.php">Esqueceu a senha?</a>
                    </div>
                </div>
                <div class="row">
                    <input type="password" class="form-control" id="senha" placeholder="Sua senha" name="senha">
                </div>
                <div class="row" style="padding-top:6%">
                    <input class="btn btn-success" type="submit" value="Entrar na conta">
                </div>
            </form>
        </div>
    </div>
<?php include_once 'layout/rodape.php' ?>