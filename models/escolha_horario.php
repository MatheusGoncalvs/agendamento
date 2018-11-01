<?php include_once '../layout/usuario_logado.php' ?>
<hr>
<form action="cadastrar_agendamento.php" method="POST">
<div class="input-search">
<h5>Escolha o tipo de serviço desejado</h5>
</br>
<select required name="select_servico_2">
  <?php
    include('../PDO/connection.php');
    $tipo_servico_select = $_POST["select_servico"];
  try {
    $query = "SELECT * FROM servico ORDER BY id";
    $resultObj = $db->query($query);

    if($resultObj){
        while($row = $resultObj->fetch_array()){
            if($row['id'] == $tipo_servico_select){
        ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['tipo_servico'];?>
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
</div>

<div class="input-search">
<h5>Escolha o horário do serviço desejado:</h5>
</br>

<select required name="select_servico_horario">
    <option>Selecione</option>
  <?php
    include('../PDO/connection.php');
    $tipo_servico_select = $_POST["select_servico"];

  try {
    $query = "SELECT * FROM servico_horario order by data_horario";
    $resultObj = $db->query($query);
    $tem_horario = false;

    if($resultObj){
        while($row = $resultObj->fetch_array()){
          if($row['qtde_horario'] > 0){
            if($row['cod_servico'] == $tipo_servico_select){
              $tem_horario = true;
        ?>
            <option value="<?php echo $row['cod_horario']; ?>">
            <?php echo $row['data_horario'], " às ",$row['horario'], " hs";?>
            </option> 
            
            
            <?php
          }
        }
      }if($tem_horario){ ?>
        <input type="submit" value="Agendar">
        <?php
      }
    }if(!$tem_horario){
      ?>
            <option>
            <?php echo " Horários esgotados :(";?>
            </option> 
            <?php
    }
  
  }
  catch (PDOException $e) {
    printf("We had a problem: %s\n", $e->getMessage());
  }

  $resultObj->close();
  $db->close();
?>
</select>
</br>
</br>
<a href="../models/busca.php">Escolher outro serviço | </a>
<a href="../models/painel.php">Voltar para seu painel</a>
</form>
</div>
