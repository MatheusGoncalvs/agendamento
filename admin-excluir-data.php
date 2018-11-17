<?php 
    include('PDO/connection.php');
    $dia_id = $_GET["id"];

    try {
       $query = "DELETE FROM dia
           WHERE dia_id = '$dia_id'";
        $db->query($query);

        include("services/msg-exclusao-confirm.php");
        header("refresh:3;url=admin-listar-datas.php");
      }
      catch (PDOException $e) {
        printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
      }

      $db->close();
?>