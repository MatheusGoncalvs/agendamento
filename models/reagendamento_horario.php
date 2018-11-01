<?php include_once '../layout/usuario_logado.php' ?>
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
      $tem_horario = false;
  
      if($resultObj){
          while($row = $resultObj->fetch_array()){
            if($row['qtde_horario'] > 0){
              if($row['cod_servico'] == $id){
                $tem_horario = true;
          ?>
              <option value="<?php echo $row['cod_horario']; ?>">
              <?php echo $row['data_horario'], " às ",$row['horario'], " hs";?>
              </option> 
              
              
              <?php
            }
          }
        }if($tem_horario){ ?>
          <input type="submit" value="Reagendar">
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
<a href="painel.php"> | cancelar</a>
</form>
</div>