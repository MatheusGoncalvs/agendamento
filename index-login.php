<?php
session_start();
?>
    <?php include_once 'layout/header.inc.php' ?>

    <!--section-->
    <section>
        <form action="models/login.php" method="POST">
            <div class="busca-section">
                <div class="text-center">
                    <h2>ENTRAR</h2>
                </div>
                <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                <div class="login-center">
                    <input name="usuario" name="text" placeholder="Seu usuário" autofocus="">
                </div>
                <div class="login-center">
                    <input name="senha" type="password" placeholder="Sua senha">
                </div>
                <div class="botao-entrar">
                    <input type="submit" value="ENTRAR">
                </div>
                <div class="cadastre-se">
                    <a href="cadastre-se-view.php">
                        <h5>Cadastre-se</h5>
                    </a>
                </div>
                <div class="esqueceu-senha">
                    <a href="#">
                        <h5>Esqueceu a senha?</h5>
                    </a>
                </div>
            </div>
        </form>
    </section>