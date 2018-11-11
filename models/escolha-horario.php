<?php 
  include_once '../layout/usuario_logado.php';
  include('../PDO/connection.php');
  $servico_id = $_POST["servico_id"];
?>
<!-- Select que exibe o serviço-->
<form action="cadastrar_agendamento.php" method="POST">
  <div class="input-search">
    <h5>Escolha o tipo de serviço desejado:</h5>
    </br>
    <select required name="servico_id">
    <?php
      try {
        $query = "SELECT * FROM servico ORDER BY servico_id";
        $resultObj = $db->query($query);

        if($resultObj){
          while($row = $resultObj->fetch_array()){
            if($row['servico_id'] == $servico_id){
            ?>
              <option value="<?php echo $row['servico_id']; ?>"><?php echo $row['nome'];?>
              </option> <?php
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
  <!-- Select que exibe todos os horários-->
  <div class="input-search">
    <h5>Escolha um horário para atendimento:</h5>
    </br>
    <select required name="horario_id">
      <option>Selecione</option>
      <?php
        try {
          $query = "SELECT * FROM horario 
                      INNER JOIN dia
                      ON horario.dia_id_horario = dia.dia_id";
          $resultObj = $db->query($query);
          $tem_horario = false;
          if($resultObj){
            while($row = $resultObj->fetch_array()){
              if($row['quantidade_max_vagas'] > 0){
                  if($row['dia_id'] == $row['dia_id_horario']){
                    $tem_horario = true;
                    ?>
                    <option value="<?php echo $row['horario_id']; ?>">
                    <?php echo $row['dia_da_semana']," ",$row['dia_data']," às ", $row['horario'], " hs";?>
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
