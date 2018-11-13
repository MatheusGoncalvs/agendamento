<?php 
    include_once '../layout/usuario_logado.php';
    include('../PDO/connection.php');

    $servico_id = $_POST["servico_id"];
    $horario_id = $_POST["horario_id"];
    $cliente_id = $_SESSION['cliente_id'];
    try {
        //Insere os dados da reserva no banco
         $query = "INSERT INTO reserva (reserva_id, horario_id_reserva, reserva_status, cliente_id_reserva, servico_id_reserva) 
            VALUES ('NULL','$horario_id','NULL','$cliente_id','$servico_id')";
         $db->query($query);
        //Atualiza a quantidade_max_vagas para -1
         $query = "SELECT * FROM horario ORDER BY horario_id";
         $resultObj = $db->query($query);
         if($resultObj){
            while($row = $resultObj->fetch_array()){
                if($row['horario_id'] == $horario_id){
                    if($row['quantidade_max_vagas'] > 0){
                        $quantidade_max_vagas = --$row['quantidade_max_vagas'];
                         $query = "UPDATE horario SET quantidade_max_vagas = '$quantidade_max_vagas'
                            where horario_id = '$horario_id'";
                         $db->query($query);
                    }
                }
            }
        }
         
         printf("Dados inseridos com sucesso!");
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