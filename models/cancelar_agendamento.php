<?php 
    include('../PDO/connection.php');

    $reserva_id = $_GET["id"];

    try {
         $query = "SELECT * FROM reserva
                        INNER JOIN horario
                        ON reserva.horario_id_reserva = horario.horario_id";
         $resultObj = $db->query($query);
         if($resultObj->num_rows > 0){
            while($row = $resultObj->fetch_array()){
                if($row['reserva_id'] == $reserva_id){
                    if($row['quantidade_max_vagas'] >= 0){
                        $horario_id = $row['horario_id'];
                        $quantidade_max_vagas = ++$row['quantidade_max_vagas'];
                         $query = "UPDATE horario SET quantidade_max_vagas = '$quantidade_max_vagas'
                            where horario_id = '$horario_id'";
                         $db->query($query);
                    }
                }
            }
        }

        $query = "DELETE FROM reserva
            WHERE reserva_id = '$reserva_id'";
         $db->query($query);

         header("Location:../models/painel.php");
       }
       catch (PDOException $e) {
         printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
       }

       $db->close();
?>

<!doctype <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <a href="painel.php">Voltar para o painel</a>
</body>
</html>