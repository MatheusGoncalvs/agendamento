<?php 
    include('../PDO/connection.php');

    $codigo_agendamento = $_GET["id"];

    try {
         $query = "SELECT * FROM servico_horario
                        INNER JOIN usuario_agendamento 
                        ON servico_horario.cod_horario = usuario_agendamento.cod_horario";
         $resultObj = $db->query($query);
         if($resultObj){
            while($row = $resultObj->fetch_array()){
                if($row['cod_agendamento'] == $codigo_agendamento){
                    if($row['qtde_horario'] >= 0){
                        $cod_horario = $row['cod_horario'];
                        $qtde_horario = ++$row['qtde_horario'];
                         $query = "UPDATE servico_horario SET qtde_horario = '$qtde_horario'
                            where cod_horario = '$cod_horario'";
                         $db->query($query);
                    }
                }
            }
        }

        $query = "DELETE FROM usuario_agendamento
            WHERE cod_agendamento = '$codigo_agendamento'";
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