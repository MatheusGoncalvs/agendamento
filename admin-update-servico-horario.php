<?php 
    include('../models/escolha_horario.php');
    include('../PDO/connection.php');

    $codigo_servico = $_POST["codigo_servico"];
    $tipo_servico = $_POST["tipo_servico"];
    $data_servico = $_POST["data_servico"];
    $horario = $_POST["horario"];
    $qtde_horario = $_POST["qtde_horario"];
?>