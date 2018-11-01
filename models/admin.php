<?php
    include('../PDO/connection.php');

    $tipo_servico= $_POST["tipo-servico"];
    $dia= $_POST["dia"];
    $mes= $_POST["mes"];
    $ano= $_POST["ano"];
    $horario= $_POST["horario"];
    $cod_servico= $_POST["cod_servico"];
    $qtde_horario = $_POST["qtde_horario"];

    try {
         $query = "INSERT INTO servico (id, tipo_servico, dia, mes, ano, horario,cod_cliente) 
          VALUES ('$cod_servico','$tipo_servico','$dia', '$mes', '$ano', '$horario','00')";
         $db->query($query);

         $query = "INSERT INTO servico_horario (cod_horario, data_horario, horario, cod_servico, qtde_horario) 
            VALUES ('NULL','$dia/$mes/$ano', '$horario','$cod_servico', $qtde_horario)";
         $db->query($query);
         printf("Dados inseridos com sucesso!");
       }
       catch (PDOException $e) {
         printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
       }

       $db->close();
       
?>