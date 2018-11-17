<?php 
    include('PDO/connection.php');
    $horario_id = $_GET["id"];

    try {
       $query = "DELETE FROM horario
           WHERE horario_id = '$horario_id'";
        $db->query($query);

        include("services/msg-exclusao-confirm.php");
        header("refresh:3;url=admin-listar-horarios-escolher-dia.php");
      }
      catch (PDOException $e) {
        printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
      }

      $db->close();
?>