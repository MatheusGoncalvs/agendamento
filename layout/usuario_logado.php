<?php
session_start();
include('verifica_login.php');
?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Agendamento NAF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css" /> <!-- CSS main -->
</head>

<body>
<!--Menu principal-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #273C75; height:56px;font-size:14px">
     <a class="navbar-brand" href="index.php">
     </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <div class="row menu-pa-text-painel-administrador active">
                    <!--Exibe o nome do usuário conectado-->
                    <div class="col-md-0 icon-user">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="col-md-0">
                        <a href="#" class="nav-link active">
                            <strong><?php echo $_SESSION['nome'];?></strong><span class="sr-only">(current)</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item active">
                <div class="row menu-pa-resumo">
                    <div class="col-md-4">
                        <img class="imagem-menu" src="../imagens/resumo.png" alt="">
                    </div>
                    <div class="col-md-8 active">
                        <a class="nav-link" href="../models/painel.php">Resumo</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="row menu-pa-brand-naf">
                    <a class="navbar-brand" href="#">
                        <img src="../imagens/brand.png" width="67" height="50" alt="">
                    </a>
                </div>
            </li>
            <li class="nav-item active" style="">
                <div class="row menu-pa-gerenciar-cadastros active">
                    <img class="imagem-menu" src="../imagens/produtos.png" width="26" height="20" alt="">
                    <a class="nav-link" href="../models/escolha-servico.php">Agendar</a>
                </div>
            </li>
            <div class="row menu-pa-text-painel-administrador active">
                <div class="col-md-0 text-logout">
                    <a href="logout.php" class="nav-link active">
                        <h5>Desconectar da conta</h5><span class="sr-only">(current)</span>
                    </a>
                </div>
                <div class="col-md-0 icon-logout">
                    <i class="fas fa-sign-out-alt"></i>
                </div>
            </div>
        </ul>
        <form class="form-inline my-2 my-lg-0 show-links-no-menu">
        </form>
  </div>
</nav>
<div class="container-fluid">

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>