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
        <a href="index.html" class="logo"><strong>Agendamento</strong></a>
        <div class="entre-na-conta">
            <a href="login.html">
                <h5>Bem vindo: <?php echo $_SESSION['usuario'];?></h5>
            </a>
            <a href="index.html">
                <h5><a href="logout.php"> | Sair | </a></h5>
            </a>
        </div>
    </header>

    <!--section-->
    <section>
        <div>
            <div class="seus-agendamentos">
                <h3>Seus agendamentos</h3>
            </div>
            <div class="mostrar-agendamentos">
                <?php
    include('../PDO/connection.php');
    $usuario = $_SESSION['usuario'];
  try {

    $query = "SELECT usuario_agendamento.cod_servico, servico.id, servico.tipo_servico, usuario_agendamento.cod_usuario
	            FROM usuario_agendamento 
                INNER JOIN servico
                ON usuario_agendamento.cod_servico = servico.id ";
        $resultObj = $db->query($query);

        if($resultObj ->num_rows > 0){
            while($row = $resultObj->fetch_array()){
                if($row['cod_usuario'] == $usuario){
                ?>
                    <table>
                        <tr>
                            <th><h5><?php echo $row['tipo_servico'];?></h5></th>
                        </tr>
                <?php
                }
            }
        }else {?> <tr><th><h5>Nenhum serviço encontrado :/</h5></tr></th> <?php
      }}
      catch (PDOException $e) {
        printf("We had a problem: %s\n", $e->getMessage());
      }
  $resultObj->close();
  $db->close();
?>
            </div>
            <tr>
            <th>
            <div class="fazer-um-novo-agendamento">
                <a href="../models/busca.php">
                    <h5>Fazer um novo agendamento</h5>
                </a>
            </div>
            </th>
            </tr>
            </table>
        </div>
    </section>

</body>

</html>