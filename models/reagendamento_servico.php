<?php
session_start();
include('verifica_login.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agendamento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
</head>
<body>
    <!--header-->
    <header id="header">
        <a href="../index-login.php" class="logo"><strong>Agendamento</strong></a>
        <div class="entre-na-conta">
            <a href="login.html">
                <h5>Bem vindo: <?php echo $_SESSION['usuario'];?></h5>
            </a>
            <a href="index.html">
                <h5><a href="logout.php"> | Sair | </a></h5>
            </a>
        </div>
    </header>
<hr>
<form action="reagendamento_horario.php" method="GET">
<div class="input-search">
<h5>Codigo de agendamento:</h5>
<input type="text" name="codigo_agendamento" size="1" value="<?php echo $_GET['id'] ?>"/>
<h5>Escolha o tipo de serviço desejado</h5>
</br>
<select required name="id">
  <?php
    include('../PDO/connection.php');
    $cod_agendamento = $_GET['id'];
    $query = "SELECT * FROM servico ORDER BY id";
    $resultObj = $db->query($query);
  try {
    if($resultObj > 0){
        while($row = $resultObj->fetch_array()){
        ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['tipo_servico'];?>
            </option> <?php
        }
    }   
  }
  catch (PDOException $e) {
    printf("We had a problem: %s\n", $e->getMessage());
  }
?>
</select>
<?php 
    include('../PDO/connection.php');
    $cod_agendamento = $_GET['id'];
    $query = "SELECT usuario_agendamento.cod_servico, 
    servico.id, 
    servico.tipo_servico, 
    usuario_agendamento.cod_usuario,
    usuario_agendamento.cod_agendamento
    FROM usuario_agendamento 
    INNER JOIN servico ON usuario_agendamento.cod_servico = servico.id";
    $resultObj = $db->query($query);
     if($resultObj){
        while($row = $resultObj->fetch_array()){
            if($row['cod_agendamento'] == $cod_agendamento){
        ?>
            </br>
            </br>
            <h5>Tipo de serviço já agendado: 
            <strong style="color: #c0392b"><?php echo $row['tipo_servico']?></strong></h5>
            </br>
            </br>
            <?php
        }   }
    }
?>
<?php
  $resultObj->close();
  $db->close();
?>
</select>
<input type="submit" value="Buscar horário">
<a href="painel.php"> | cancelar</a>
</form>
</div>
</div>
</body>
</html>