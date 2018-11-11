<?php 
  include_once '../layout/usuario_logado.php';
  include('../PDO/connection.php');
?>
<div class="input-search">
  <h5>Escolha o tipo de serviço desejado:</h5>
  </br>
  <form action="escolha-horario.php" method="POST">
  <select required name="servico_id">
    <option value="">Selecione</option>
    <?php
      try {
        $query = "SELECT * FROM servico ORDER BY servico_id";
        $resultObj = $db->query($query);
        if($resultObj){
          while($row = $resultObj->fetch_array()){
          ?>
            <option value="<?php echo $row['servico_id']; ?>"><?php echo $row['nome'];?>
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
    <input type="submit" value="buscar">
  </form>
</div>
