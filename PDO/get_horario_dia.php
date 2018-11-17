<?php
    $query = "SELECT * FROM horario 
                INNER JOIN dia
                ON horario.dia_id_horario = dia.dia_id
                ORDER BY horario.horario";
                $resultObj = $db->query($query);
?>