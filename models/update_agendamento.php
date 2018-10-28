<?php 
    include('../models/escolha_horario.php');
    include('../PDO/connection.php');

    $tipo_servico_select = $_POST["select_servico_2"];
    $usuario = $_SESSION['usuario'];
    $servico_horario = $_POST["select_servico_horario"];
    $codigo_agendamaento = $_POST["codigo_agendamento"];

    try {
         $query = "UPDATE usuario_agendamento 
            set cod_servico='$tipo_servico_select', 
            cod_horario='$servico_horario' 
            WHERE cod_agendamento = '$codigo_agendamaento'";
         $db->query($query);

         $query = "UPDATE servico SET cod_cliente = $usuario
            where id = '$tipo_servico_select'";
         $db->query($query);   
         printf("-------- >Dados atualizados com sucesso!");
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