<?php 
    include('../models/escolha_horario.php');
    include('../PDO/connection.php');

    //$qtde_horario = $_POST["qtde_horario"];
    $tipo_servico_select = $_POST["select_servico_2"];
    $usuario = $_SESSION['usuario'];
    $servico_horario = $_POST["select_servico_horario"];

    //Testa

    try {
         $query = "INSERT INTO usuario_agendamento (cod_agendamento, cod_usuario, cod_servico, cod_horario) 
            VALUES ('NULL','$usuario','$tipo_servico_select','$servico_horario')";
         $db->query($query);

         $query = "UPDATE servico SET cod_cliente = $usuario
            where id = '$tipo_servico_select'";
         $db->query($query); 

         $query = "SELECT * FROM servico_horario ORDER BY cod_horario";
         $resultObj = $db->query($query);
         if($resultObj){
            while($row = $resultObj->fetch_array()){
                if($row['cod_horario'] == $servico_horario){
                    if($row['qtde_horario'] > 0){
                        $qtde_horario = --$row['qtde_horario'];
                         $query = "UPDATE servico_horario SET qtde_horario = '$qtde_horario'
                            where cod_horario = '$servico_horario'";
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