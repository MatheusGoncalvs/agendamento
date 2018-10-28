<?php
session_start();
include('verifica_login.php');
?>

<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agendamento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>
    <!--header-->
    <header id="header">
        <a href="painel.php" class="logo"><strong>Agendamento</strong></a>
        <div class="entre-na-conta">
            <a href="">
                <h5>Bem vindo: <?php echo $_SESSION['usuario'];?></h5>
            </a>
            <a href="index.html">
                <h5><a href="logout.php"> | Sair | </a></h5>
            </a>
        </div>
    </header>
    </body>
</html>