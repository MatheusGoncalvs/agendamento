<?php
session_start();
?>

<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agendamento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>
    <!--header-->
    <header id="header">
        <a href="index.html" class="logo"><strong>Agendamento</strong></a>
    </header>

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
                    <a href="cadastre-se.html">
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

</body>

</html>