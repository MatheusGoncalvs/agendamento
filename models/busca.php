<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <title>Book Search Results</title>
</head>
<body>
<h3>Book Search Results</h3>
<hr>
<?php
# This is the mysqli version
# Get data from form
$pesquisa_servicos = trim($_POST['pesquisa-servicos']);

/*if (!$pesquisa_servicos) {
  echo "Por favor insira um serviço";
  exit();
}

$pesquisa_servicos  = addslashes($pesquisa_servicos);*/

# Open the database
$db = new mysqli('localhost', 'sa', 'sa', 'agendamento');
if ($db->connect_error) {
	echo "could not connect: " . $db->connect_error;
	exit();
}

try {
    $query = "SELECT id, tipo_servico,dia,mes,ano,horario,cod_cliente FROM servico ORDER BY first_name";
    $resultObj = $db->query($query);

    if(!$resultObj){
        while($row = $resultObj->fetch_assoc()){
            echo "Tipo de serviço: ".$row['tipo_servico'].PHP_EOL;
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
