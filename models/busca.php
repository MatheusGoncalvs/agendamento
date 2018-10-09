<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>Book Search Results</title>
</head>
<body>
<h3>Book Search Results</h3>
<hr>
<?php
include('../PDO/connection.php');

$pesquisa_servicos = trim($_POST['pesquisa-servicos']);

try {
    $query = "SELECT * FROM servico";
    $resultObj = $db->query($query);

    if($resultObj){
        while($row = $resultObj->fetch_array()){
          $linha = $row['tipo_servico'];
            echo "Tipo de serviço: ".$linha.PHP_EOL;
        }
    }
  
  }
  catch (PDOException $e) {
    printf("We had a problem: %s\n", $e->getMessage());
  }

  $resultObj->close();
  $db->close();

?>
</body>
</html>
