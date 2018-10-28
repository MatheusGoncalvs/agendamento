<?php include_once '../layout/usuario_logado.php' ?>
<hr>
<form action="reagendamento_horario.php" method="GET">
<div class="input-search">
<h5>Codigo de agendamento:</h5>
<input type="text" name="codigo_agendamento" size="1" value="<?php echo $_GET['id'] ?>"/>
<h5>Escolha o tipo de serviço desejado</h5>
</br>
<select required name="id">
  <?php
    include('../PDO/connection.php');
    $cod_agendamento = $_GET['id'];
    $query = "SELECT * FROM servico ORDER BY id";
    $resultObj = $db->query($query);
  try {
    if($resultObj > 0){
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
?>
</select>
<?php 
    include('../PDO/connection.php');
    $cod_agendamento = $_GET['id'];
    $query = "SELECT usuario_agendamento.cod_servico, 
    servico.id, 
    servico.tipo_servico, 
    usuario_agendamento.cod_usuario,
    usuario_agendamento.cod_agendamento
    FROM usuario_agendamento 
    INNER JOIN servico ON usuario_agendamento.cod_servico = servico.id";
    $resultObj = $db->query($query);
     if($resultObj){
        while($row = $resultObj->fetch_array()){
            if($row['cod_agendamento'] == $cod_agendamento){
        ?>
            </br>
            </br>
            <h5>Tipo de serviço já agendado: 
            <strong style="color: #c0392b"><?php echo $row['tipo_servico']?></strong></h5>
            </br>
            </br>
            <?php
        }   }
    }
?>
<?php
  $resultObj->close();
  $db->close();
?>
</select>
<input type="submit" value="Buscar horário">
<a href="painel.php"> | cancelar</a>
</form>
</div>
</div>