<?php 
    include('PDO/connection.php');
    $servico_id = $_GET["id"];

    try {
       $query = "DELETE FROM servico
           WHERE servico_id = '$servico_id'";
        $db->query($query);

        header("Location:admin-listar-servicos.php");
      }
      catch (PDOException $e) {
        printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
      }

      $db->close();
?>