<?php 
    include('PDO/connection.php');
    include_once 'layout/telas_de_confirmacao.php';

    $dia_da_semana = $_POST["dia_da_semana"];
    $dia_data = $_POST["dia_data"];

    try{
        $query = "INSERT INTO dia (dia_id, dia_da_semana, dia_data )
            VALUES ('NULL', '$dia_da_semana', '$dia_data')";
        $db->query($query);

        include("services/msg-cadastro-confirm.php");
        header("refresh:3;url=admin-cadastrar-dia-view.php");
        $db->close();
    }catch (PDOException $e){
        printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
    }
?>