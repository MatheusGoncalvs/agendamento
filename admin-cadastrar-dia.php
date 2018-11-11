<?php 
    include('PDO/connection.php');

    $dia_da_semana = $_POST["dia_da_semana"];
    $dia_data = $_POST["dia_data"];

    try{
        $query = "INSERT INTO dia (dia_id, dia_da_semana, dia_data )
            VALUES ('NULL', '$dia_da_semana', '$dia_data')";
        $db->query($query);

        printf("Dados inseridos com sucesso!");
        $db->close();
    }catch (PDOException $e){
        printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
    }
?>