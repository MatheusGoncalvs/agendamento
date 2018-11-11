<?php 
    include('PDO/connection.php');

    $servico = $_POST["servico"];

    try{
        $query = "INSERT INTO servico (servico_id, nome, listadocs )
            VALUES ('NULL', '$servico', 'NULL')";
        $db->query($query);

        printf("Dados inseridos com sucesso!");
        $db->close();
    }catch (PDOException $e){
        printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
    }
?>