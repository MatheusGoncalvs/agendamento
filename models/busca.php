<?php include_once '../layout/usuario_logado.php' ?>
<hr>
<div class="input-search">
<h5>Escolha o tipo de serviço desejado</h5>
</br>
<form action="escolha_horario.php" method="POST">
<select required name="select_servico">
    <option value="">Selecione</option>
  <?php
    include('../PDO/connection.php');

  try {
    $query = "SELECT * FROM servico ORDER BY id";
    $resultObj = $db->query($query);

    if($resultObj){
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

  $resultObj->close();
  $db->close();
?>
</select>
<input type="submit" value="buscar">
</form>
</div>
