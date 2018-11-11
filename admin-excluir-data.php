<?php 
    include('PDO/connection.php');
    $dia_id = $_GET["id"];

    try {
       $query = "DELETE FROM dia
           WHERE dia_id = '$dia_id'";
        $db->query($query);

        header("Location:admin-listar-datas.php");
      }
      catch (PDOException $e) {
        printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
      }

      $db->close();
?>