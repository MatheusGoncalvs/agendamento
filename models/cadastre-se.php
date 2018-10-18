<?php
    include('../PDO/connection.php');

    $usuario= $_POST["usuario"];
    $senha= $_POST["senha"];

    try {
         $query = "INSERT INTO usuario (usuario_id, usuario, senha) VALUES ('NULL','$usuario','$senha')";
         $db->query($query);
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
    <a href="../index.html">Voltar para a pagina inicial</a>
</body>
</html>