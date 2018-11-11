<?php 
    include('PDO/connection.php');

    $horario = $_POST["horario"];
    $dia_id = $_POST["dia_id"];
    $quantidade_max_vagas = $_POST["quantidade_max_vagas"];

    try{
        $query = "INSERT INTO horario (horario_id, horario, dia_id_horario, quantidade_max_vagas)
            VALUES ('NULL', '$horario', '$dia_id', '$quantidade_max_vagas')";
        $db->query($query);

        printf("Dados inseridos com sucesso!");
        $db->close();
    }catch (PDOException $e){
        printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
    }
?>