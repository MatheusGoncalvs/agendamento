<?php 
    include('PDO/connection.php');
    include_once 'layout/telas_de_confirmacao.php';

    $servico = $_POST["servico"];

    try{
        $query = "INSERT INTO servico (servico_id, nome, listadocs )
            VALUES ('NULL', '$servico', 'NULL')";
        $db->query($query);
        
        include("services/msg-cadastro-confirm.php");
        header("refresh:3;url=admin-cadastrar-servico-view.php");
        
        $db->close();
    }catch (PDOException $e){
        printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
    }
?>