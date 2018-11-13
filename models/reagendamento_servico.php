<?php 
    include_once '../layout/usuario_logado.php';
    include('../PDO/connection.php');
    $reserva_id = $_GET['id'];
?>
<form action="reagendamento_horario.php" method="GET">
    <div class="input-search">
        <h5>Codigo de agendamento:</h5>
        <input type="text" name="codigo_agendamento" size="1" value="<?php echo $_GET['id'] ?>"/>
        <h5>Escolha o tipo de serviço desejado</h5>
        </br>
        <select required name="id">
            <?php
            $query = "SELECT * FROM servico ORDER BY servico_id";
            $resultObj = $db->query($query);
            try {
                if($resultObj ->num_rows > 0){
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
            ?>
        </select>
    <?php 
        $query = "SELECT * FROM reserva
                    INNER JOIN servico 
                    ON reserva.servico_id_reserva > 0";
        $resultObj = $db->query($query);
        if($resultObj){
            while($row = $resultObj->fetch_array()){
                if($row['reserva_id'] == $reserva_id){
    ?>
                    </br>
                    </br>
                    <h5>Tipo de serviço já agendado: 
                    <strong style="color: #c0392b"><?php echo $row['nome']?></strong></h5>
                    </br>
                    </br>
                    <?php
                }   
            }
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