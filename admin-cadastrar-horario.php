<?php 
    include('PDO/connection.php');
    include_once 'layout/telas_de_confirmacao.php';

    $horario = $_POST["horario"];
    $dia_id = $_POST["dia_id"];
    $quantidade_max_vagas = $_POST["quantidade_max_vagas"];

    try{
        $query = "INSERT INTO horario (horario_id, horario, dia_id_horario, quantidade_max_vagas)
            VALUES ('NULL', '$horario', '$dia_id', '$quantidade_max_vagas')";
        $db->query($query);
        
        include("services/msg-cadastro-confirm.php");
        header("refresh:3;url=admin-cadastrar-horario-view.php");
        
        $db->close();
    }catch (PDOException $e){
        printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
    }
?>