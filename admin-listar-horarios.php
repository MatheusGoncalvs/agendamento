<?php 
    include_once 'layout/painel-administrador.php';
    include('PDO/connection.php');

    $dia_id = $_POST['dia_id'];
    
    //Verifica se o usuário selecionou algum dia. Se não redireciona para a página de erro.
    if($dia_id <= 0){
        header("Location:services/msg-selecione-dia.php");
        exit();
    }
?>
<div class="row linha-horizontal-banner"></div>
<div class="row listar-horarios-titulo">
    <h1><strong>Abaixo estão todos os horários cadastrados</strong></h1>
</div>
<div class="row">
    <?php
        try {
            include("PDO/get_horario_dia.php");
            $resultObj = $db->query($query);
            $quantidade_linhas_usuario = 0;
            if($resultObj ->num_rows > 0){
                $quantidade_linhas = 1;//Conta os resultados positivos da busca
                while($row = $resultObj->fetch_array()){
                    if($row['dia_id_horario'] == $dia_id){
                        $horario_id = $row['horario_id'];
                        //Exibe o dia referente ao escolhido abaixo do título somente uma vez.
                        if($row['dia_id'] == $dia_id && $quantidade_linhas <= 1){
                            ?>
                            <div class="row listar-horarios-titulo-data">
                                <h4><?php echo $row['dia_da_semana'],", ",$row['dia_data']?></h4>
                            </div>
                            <?php
                            $quantidade_linhas++;
                        }
    ?>
                        <div class="col-md-6 borda-listas">
                        <!--Dados dos blocos-->
                            <div class="row alinha-dados-blocos">
                                <div class="col-md-1">
                                    <img src="imagens/clock.png">
                                </div>
                                <div class="col-md-9 txt-horario-align">
                                    <h4><?php echo $row['horario_id'],".   <strong>", $row['horario'],"</strong>" ?></h4>
                                </div>
                                <div class="col-md-1">
                                    <?php
                                        echo"
                                            <a href='admin-excluir-horario.php?id=$horario_id'>
                                                <img src='imagens/trash.png' title='Excluir horário'>
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
        }
        //Testa se tem serviço cadastrado para o cliente logado. Se não, apresenta a mensagem NSC.
        if($quantidade_linhas_usuario == 0){?> 
            <tr><th><h5>Nenhum horário encontrado :/</h5></tr></th> <?php
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