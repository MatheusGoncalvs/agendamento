<?php 
  include_once '../layout/usuario_logado.php';
  include('../PDO/connection.php');
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
      <div class="col-md-0 left-border alinhamento-info info-active">
        <a href="../models/escolha-servico.php">
          <h4>Escolha o serviço desejado</h4>
        </a>
      </div>
      <div class="col-md-0 left-border alinhamento-info">
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
      <form action="escolha-horario.php" method="POST">
        <select class="custom-select" required name="servico_id">
          <option value="">Escolha o serviço desejado</option>
          <?php
            try {
              $query = "SELECT * FROM servico ORDER BY servico_id";
              $resultObj = $db->query($query);
              if($resultObj){
                while($row = $resultObj->fetch_array()){
          ?>
                  <option value="<?php echo $row['servico_id']; ?>"><?php echo $row['nome'];?>
                  </option> 
                  <?php
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
      <div class="row botao-escolher-servico">
        <input class="btn btn-info" type="submit" value="Escolher">
      </div>
    </form>
  </div>
</div>
<?php include_once '../layout/rodape_usuario_logado.php'; ?>