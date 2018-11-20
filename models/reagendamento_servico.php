<?php 
    include_once '../layout/usuario_logado.php';
    include('../PDO/connection.php');
    $reserva_id = $_GET['id'];
?>
<div class="row linha-horizontal-banner"></div>
<div class="row titulo-cadastrar-servico">
    <h1><strong>Reagendar atendimento</strong></h1>
</div>
<div class="row alinhamento-reagendar-servico">
    <form action="reagendamento_horario.php" method="GET">
            <input type="hidden" name="codigo_agendamento" size="1" value="<?php echo $_GET['id'] ?>"/>
            <h4>Escolha o serviço para troca</h4>
            </br>
            <select class="custom-select" required name="id">
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
                    ON reserva.servico_id_reserva = servico.servico_id";
                $resultObj = $db->query($query);
                if($resultObj){
                    while($row = $resultObj->fetch_array()){
                        if($row['reserva_id'] == $reserva_id){
            ?>
                            </br>
                            </br>
                            <h4>Tipo de serviço já agendado: 
                            <strong style="color: #2E4789"><?php echo $row['nome']?></strong></h4>
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
            <input class="btn btn-success" type="submit" value="Buscar horário">
            <a href="painel.php"> | cancelar</a>
            </form>
    </div>
</div>