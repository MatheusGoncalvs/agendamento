<?php 
    include('PDO/connection.php');
    $horario_id = $_GET["id"];

    try {
       $query = "DELETE FROM horario
           WHERE horario_id = '$horario_id'";
        $db->query($query);

        header("Location:admin-listar-horarios.php");
      }
      catch (PDOException $e) {
        printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
      }

      $db->close();
?>