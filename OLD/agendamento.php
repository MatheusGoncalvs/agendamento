<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agendamento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
</head>
<body>
    <!--header-->
    <header id="header">
        <a href="index.html" class="logo"><strong>Agendamento</strong></a>
        <div class="entre-na-conta">
            <a href="login.html">
                <h5>Bem vindo: Matheus Goncalves</h5>
            </a>
        </div>
    </header>

    <!--section-->
    <section>
        <form action="models/busca.php" method="POST" enctype="multipart/form-data">
            <div class="input-search">
                <h5>Escolha o tipo de serviço desejado</h5>
                </br>
                <select required>
                    <option value="">Selecione</option>
                    <?php
include('../PDO/connection.php');

try {
    $query = "SELECT * FROM servico";
    $resultObj = $db->query($query);

    if($resultObj){
        while($row = $resultObj->fetch_array()){
          $linha = $row['tipo_servico'];
            echo "Tipo de serviço: ".$linha.PHP_EOL; ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['tipo_servico'];?>
            </option> <?php
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
            </div>
        </form>
        <div class="fazer-um-novo-agendamento">
            <a href="painel.html">
                <h5>Retornar ao painel</h5>
            </a>
        </div>
        <div>
        </div>
    </section>
</body>

</html>