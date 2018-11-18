<?php 
  include_once '../layout/usuario_logado.php';
  include('../PDO/connection.php');
  $servico_id = $_POST["servico_id"];
?>
<div class="row linha-horizontal-banner"></div>
<div class="row secao-escolha-servico">
  <!--Bloco-->
  <div class="col-md-11 blocos-ecolha-servico borda">
    <!--Exibe em qual seção o cliente está-->    
    <div class="row bottom-border txt-escolher-servico">
      <div class="col-md-0 right-border alinhamento-info">
        <a href="../models/escolha-servico.php">
          <h6><strong>AGENDAMENTO</strong></h6>
        </a>
      </div>
      <div class="col-md-0 left-border alinhamento-info">
        <a href="../models/escolha-servico.php">
          <h4>Escolha o serviço desejado</h4>
        </a>
      </div>
      <div class="col-md-0 left-border alinhamento-info info-active">
        <a>
          <h4>Escolha o horário desejado</h4>
        </a>
      </div>
      <div class="col-md-0 left-border right-border alinhamento-info">
        <a>
          <h4>Agendamento concluido</h4>
        </a>
      </div>
    </div>
    <!-- Parte do meio com o select para escolher o serviço-->
    <div class="row select-escolher-servico">
      <form action="cadastrar_agendamento.php" method="POST">
        <select class="custom-select" required name="servico_id">
          <?php
            try {
              $query = "SELECT * FROM servico ORDER BY servico_id";
              $resultObj = $db->query($query);
              if($resultObj){
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
      <!-- Parte do meio com o select para escolher o horário-->
      <div class="row select-escolher-horario">
        <select class="custom-select" required name="horario_id">
          <option value="">Escolha o horário desejado</option>
          <?php
            try {
              $query = "SELECT * FROM horario 
                      INNER JOIN dia
                      ON horario.dia_id_horario = dia.dia_id
                      ORDER BY dia.dia_data";
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
                }
                //Só exibe o botão para agendar se tiver horário disponível
                if($tem_horario){ 
                ?>
                  
              <?php
                }
              }
              if(!$tem_horario){
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
      </div>
      <div class="row botao-escolher-servico">
        <input class="btn btn-info" type="submit" value="Agendar">
      </div>
    </form>
  </div>
</div>
<?php include_once '../layout/rodape_usuario_logado.php'; ?>