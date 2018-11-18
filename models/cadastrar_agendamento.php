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
        ?>
        <div class="row linha-horizontal-banner"></div>
        <div class="row secao-cadastro-agendamento">
        <!--Bloco-->
            <div class="col-md-11 blocos-ecolha-servico borda">
            <!--Exibe em qual seção o cliente está-->    
                <div class="row bottom-border txt-escolher-servico">
                    <div class="col-md-0 right-border alinhamento-info">
                        <a href="../models/escolha-servico.php">
                            <h6><strong>AGENDAMENTO</strong></h6>
                        </a>
                    </div>
                    <div class="col-md-0 left-border alinhamento-info">
                        <a>
                            <h4>Escolha o serviço desejado</h4>
                        </a>
                    </div>
                    <div class="col-md-0 left-border alinhamento-info">
                        <a>
                            <h4>Escolha o horário desejado</h4>
                        </a>
                    </div>
                    <div class="col-md-0 left-border right-border alinhamento-info info-active">
                        <a>
                            <h4>Agendamento concluido</h4>
                        </a>
                    </div>
                </div>
                <div class="row txt-confirmacao-agendamento">
                    <h6><strong>Atendimento agendado com sucesso!</strong></h6>
                </div>
                <div class="row txt-informacao-agendamento">
                    <h4>Por favor, retorne ao seu <a href="../models/painel.php"> <strong>resumo</strong></a> e verifique os documentos que serão necessários apresentar 
                    no dia do seu atendimento.
                    </h4>
                </div>
            </div>
        </div>

         <?php
       }
       catch (PDOException $e) {
         printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
       }

       $db->close();
?>
<?php include_once '../layout/rodape_usuario_logado.php'; ?>