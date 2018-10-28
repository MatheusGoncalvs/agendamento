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
<form action="update_agendamento.php" method="POST">
<div class="input-search">
<h5>Codigo de agendamento:</h5>
<input type="text" name="codigo_agendamento" size="1" value="<?php echo $_GET['codigo_agendamento'] ?>"/>
<h5>Escolha o tipo de serviço desejado</h5>
</br>
<select required name="select_servico_2">
  <?php
    include('../PDO/connection.php');
    $id = $_GET['id'];
    $query = "SELECT * FROM servico ORDER BY tipo_servico";
    $resultObj = $db->query($query);
  try {
    if($resultObj){
        while($row = $resultObj->fetch_array()){
            if($row['id'] == $id){
        ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['tipo_servico'];?>
            </option>
            <?php
            }
        }
    }   
  
  }
  catch (PDOException $e) {
    printf("We had a problem: %s\n", $e->getMessage());
  }
?>
</select>
</div>

<div class="input-search">
<h5>Escolha o horário do serviço desejado</h5>
</br>

<select required name="select_servico_horario">
    <option>Selecione</option>
  <?php
    include('../PDO/connection.php');
    $id = $_GET['id'];

  try {
    $query = "SELECT * FROM servico_horario order by data_horario";
    $resultObj = $db->query($query);

    if($resultObj){
        while($row = $resultObj->fetch_array()){
            if($row['cod_servico'] == $id){
        ?>
            <option value="<?php echo $row['cod_horario']; ?>">
            <?php echo $row['data_horario'], " às ",$row['horario'], " hs";?>
            </option> <?php
            }
        }
    }
  
  }
  catch (PDOException $e) {
    printf("We had a problem: %s\n", $e->getMessage());
  }

  $resultObj->close();
  $db->close();
?>
</select>
<input type="submit" value="Reagendar">
<a href="painel.php"> | cancelar</a>
</form>
</div>
</body>
</html>