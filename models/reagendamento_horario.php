<?php 
  include_once '../layout/usuario_logado.php';
  include('../PDO/connection.php');
  $servico_id = $_GET['id'];
?>
<hr>
<form action="update_agendamento.php" method="POST">
  <div class="input-search">
    <h5>Codigo de agendamento:</h5>
    <input type="text" name="codigo_agendamento" size="1" value="<?php echo $_GET['codigo_agendamento'] ?>"/>
    <!--Parte para escolher o serviço-->
    </br>
    </br>
    <h5>Tipo de serviço escolhido:</h5>
    </br>
    <select required name="servico_id">
      <?php
        $query = "SELECT * FROM servico ORDER BY servico_id";
        $resultObj = $db->query($query);
        try {
          if($resultObj->num_rows > 0){
            while($row = $resultObj->fetch_array()){
              if($row['servico_id'] == $servico_id){
      ?>
                <option value="<?php echo $row['servico_id']; ?>"><?php echo $row['nome'];?>
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
  <!--Parte para escolher o horário-->
  <div class="input-search">
    <h5>Escolha o novo horário para agendamento:</h5>
    </br>
    <select required name="horario_id">
      <option>Selecione</option>
      <?php
        try {
          $query = "SELECT * FROM horario 
                    INNER JOIN dia
                    ON horario.dia_id_horario = dia.dia_id
                    order by dia.dia_data";
          $resultObj = $db->query($query);
          $tem_horario = false;
          if($resultObj->num_rows > 0){
            while($row = $resultObj->fetch_array()){
              if($row['quantidade_max_vagas'] > 0){
                  $tem_horario = true;
      ?>
                  <option value="<?php echo $row['horario_id']; ?>">
                  <?php echo $row['dia_da_semana'],", ",$row['dia_data'], " às ", $row['horario'];?>
                  </option> 
                  <?php
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