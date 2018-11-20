<?php 
    include_once '../layout/usuario_logado.php';
    include('../PDO/connection.php');

    $servico_id = $_POST["servico_id"];
    $cliente_id = $_SESSION['cliente_id'];
    $horario_id = $_POST["horario_id"];
    $reserva_id = $_POST["codigo_agendamento"];

    try {
        /*
        //Incrementa mais 1 na tabela servico_horario no atributo quantidade_max_vagas (anterior) antes do UPDATE
        $query = "SELECT * FROM reserva
                        INNER JOIN horario
                        ON reserva.horario_id_reserva = horario.horario_id";
         $resultObj = $db->query($query);
         if($resultObj->num_rows > 0){
            while($row = $resultObj->fetch_array()){
                if($row['reserva_id'] == $reserva_id){
                    if($row['quantidade_max_vagas'] >= 0){
                        $horario_id_anterior = $row['horario_id'];
                        $quantidade_max_vagas = ++$row['quantidade_max_vagas'];
                         $query = "UPDATE horario SET quantidade_max_vagas = '$quantidade_max_vagas'
                            where horario_id = '$horario_id_anterior'";
                         $db->query($query);
                    }
                }
            }
            }
        //Atualiza a reserva do cliente com os novos dados
         $query = "UPDATE reserva 
            set horario_id_reserva='$horario_id', 
            cliente_id_reserva='$cliente_id',
            servico_id_reserva='$servico_id' 
            WHERE reserva_id='$reserva_id'";
         $db->query($query);
        //Decrementa 1 no atributo (atual) quantidade_max_vagas da tabela horario 
        $query = "SELECT * FROM reserva
                        INNER JOIN horario
                        ON reserva.horario_id_reserva = horario.horario_id";
         $resultObj = $db->query($query);
         if($resultObj->num_rows > 0){
            while($row = $resultObj->fetch_array()){
                if($row['reserva_id'] == $reserva_id){
                    if($row['quantidade_max_vagas'] >= 0){
                        $horario_id = $row['horario_id'];
                        $quantidade_max_vagas = --$row['quantidade_max_vagas'];
                         $query = "UPDATE horario SET quantidade_max_vagas = '$quantidade_max_vagas'
                            where horario_id = '$horario_id'";
                         $db->query($query);
                    }
                }
            }
        }
            */
            include("../services/msg-reagendamento-confirm.php");
       }
       catch (PDOException $e) {
         printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
       }
       $db->close();
?>