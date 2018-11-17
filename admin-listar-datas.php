<?php 
    include_once 'layout/painel-administrador.php';
    include('PDO/connection.php');
?>
<div class="row linha-horizontal-banner"></div>
<div class="row listar-servicos-titulo">
    <h1><strong>Abaixo estão todos os dias cadastrados</strong></h1>
</div>
<div class="row">
    <?php
        try {
            $query = "SELECT * FROM dia ORDER BY dia_data";
            $resultObj = $db->query($query);
            $quantidade_linhas_usuario = 0;
            if($resultObj ->num_rows > 0){
                while($row = $resultObj->fetch_array()){
                    $dia_id = $row['dia_id'];
    ?>
                <div class="col-md-6 borda-listas">
                    <!--Dados dos blocos-->
                        <div class="row alinha-dados-blocos">
                            <div class="col-md-1">
                                <img src="imagens/servico.png">
                            </div>
                            <div class="col-md-9 txt-horario-align">
                                <h4><?php echo $row['dia_id'],". ", $row['dia_da_semana']," ",$row['dia_data']?></h4>
                            </div>
                            <div class="col-md-1">
                                <?php
                                    echo"
                                        <a href='admin-excluir-data.php?id=$dia_id'>
                                            <img src='imagens/trash.png' title='Excluir dia'>
                                        </a>
                                    ";
                                ?>
                            </div>
                        </div>
                </div>
            <?php
                $quantidade_linhas_usuario = ++$quantidade_linhas_usuario;
            }
        }
        //Testa se tem serviço cadastrado para o cliente logado. Se não, apresenta a mensagem NSC.
        if($quantidade_linhas_usuario == 0){?> 
            <tr><th><h5>Nenhum serviço encontrado :/</h5></tr></th> <?php
        }
      }
      catch (PDOException $e) {
        printf("We had a problem: %s\n", $e->getMessage());
      }
  $resultObj->close();
  $db->close();
?>
</div>
<?php include_once 'layout/painel-administrador-rodape.php'?>