<!doctype <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de agendamento | PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    
</body>
</html>

<?php
    include('../PDO/connection.php');

    $tipo_servico= $_POST["tipo-servico"];
    $dia= $_POST["dia"];
    $mes= $_POST["mes"];
    $ano= $_POST["ano"];
    $horario= $_POST["horario"];
    $cod_servico= $_POST["cod_servico"];

    try {
         $query = "INSERT INTO servico (id, tipo_servico, dia, mes, ano, horario,cod_cliente) VALUES ('$cod_servico','$tipo_servico','$dia', '$mes', '$ano', '$horario','00')";
         $db->query($query);

         $query = "INSERT INTO servico_horario (cod_horario, data_horario, horario, cod_servico) VALUES ('NULL','$dia/$mes/$ano', '$horario','$cod_servico')";
         $db->query($query);
         printf("Dados inseridos com sucesso!");
       }
       catch (PDOException $e) {
         printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
       }

       $db->close();
       
?>