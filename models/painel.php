    <?php 
        include_once '../layout/usuario_logado.php';
        include('../PDO/connection.php');
        $email = $_SESSION['email'];
        $cliente_id = $_SESSION['cliente_id'];
    ?>
    <div class="row linha-horizontal-banner"></div>
    <div class="row secao">
        <!--Bloco-->
        <div class="col-md-11 blocos-painel borda">
            <div class="row txt-titulos-painel">
                <h1><strong>Seus agendamentos</strong></h1>
            </div>
        <?php
            try {
                $query = "SELECT * FROM reserva 
                            INNER JOIN servico
                            ON reserva.servico_id_reserva = servico.servico_id
                            INNER JOIN horario
                            ON reserva.horario_id_reserva = horario.horario_id
                            INNER JOIN dia
                            ON horario.dia_id_horario = dia.dia_id";
                $resultObj = $db->query($query);
                $quantidade_linhas_usuario = 0;
                if($resultObj ->num_rows > 0){
                    while($row = $resultObj->fetch_array()){
                        if($row['cliente_id_reserva'] == $cliente_id){
                            $reserva_id = $row['reserva_id'];
        ?>
                                <!--Dados dos blocos-->
                                <div class="row alinha-dados-blocos">
                                <!--descrição do serviço + imagem de relógio-->
                                <div class="col-md-0">
                                    <img src="../imagens/clock.png">
                                </div>
                                <div class="col-md-10 txt-horario-align">
                                    <h4>
                                        <?php echo $row['reserva_id'], ". ",$row['nome']," | ",
                                            "<strong>",$row['dia_da_semana'],"</strong>, ", $row['dia_data']," às ",$row['horario']," hs."
                                        ;?>  
                                    </h4>
                                </div>
                                <!--Visualizar documentos-->
                                <div class="col-md-0 espacamento-icons-painel">
                                    <a href="painel.php">
                                        <img src="../imagens/docs.png" title="Visualizar documentos">
                                    </a>
                                </div>
                                <!--Reagendar-->
                                <div class="col-md-0 espacamento-icons-painel">
                                    <?php echo "<a href='../models/reagendamento_servico.php?id=$reserva_id'> "; ?>
                                        <img src="../imagens/edit.png" title="Reagendar">
                                    </a>
                                </div>
                                <!--Cancelar agendamento-->
                                <div class="col-md-0 espacamento-icons-painel">
                                    <?php echo "<a href='../models/cancelar_agendamento.php?id=$reserva_id'> ";?>
                                        <img src="../imagens/trash.png" title="Cancelar agendamento">
                                    </a>
                                </div>
                            </div>
                            <?php
                            $quantidade_linhas_usuario = ++$quantidade_linhas_usuario;
                        }
                    }
                }
                //Testa se tem serviço cadastrado para o cliente logado. Se não, apresenta a mensagem NSC.
                if($quantidade_linhas_usuario == 0){?> 
                   <!--Dados dos blocos-->
                   <div class="row alinha-dados-blocos">
                        <!--Mensagem que não tem agendamento + imagem de relógio apagado-->
                        <div class="col-md-0">
                            <img src="../imagens/clock-disable.png">
                        </div>
                        <div class="col-md-3 txt-horario-align">
                            <h4>
                                Você ainda não tem nenhum agendamento.  
                            </h4>
                        </div>
                        <!--Emoticon triste-->
                        <div class="col-md-0">
                            <img src="../imagens/sad-face.png">
                        </div>
                    </div> 
                <?php
                }
            }
            catch (PDOException $e) {
                printf("We had a problem: %s\n", $e->getMessage());
            }
            $resultObj->close();
            $db->close();
            ?>
            <!--Linha que exibe os atalhos cadastrar-novo e Listar-->    
            <div class="row borda txt-painel-fazer-novo-agendamento">
                <div class="col-md-10">
                    <a href="../models/escolha-servico.php">
                        <h4>Fazer um novo agendamento</h4>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="admin-listar-horarios-escolher-dia.php">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php include_once '../layout/rodape_usuario_logado.php'; ?>