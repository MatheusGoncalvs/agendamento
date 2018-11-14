    <?php 
        include_once '../layout/usuario_logado.php';
        include('../PDO/connection.php');
        $email = $_SESSION['email'];
        $cliente_id = $_SESSION['cliente_id'];
    ?>
    <!--section-->
    <section>
        <div>
            <div class="seus-agendamentos">
                <h3>Seus agendamentos</h3>
            </div>
            <div class="mostrar-agendamentos">
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
                            <table>
                                <tr>
                                    <th><h5><?php echo $row['reserva_id'];?></h5></th>
                                    <th><h5><?php echo $row['nome'];?></h5></th><!--Nome do serviço-->
                                    <th><h5><?php echo $row['dia_da_semana'],", ",$row['dia_data'], " às ", $row['horario'];?></h5></th>
                                    <?php
                                        echo "<th><a href='../models/reagendamento_servico.php?id=$reserva_id'>
                                        <h5>Reagendar</h5></a></th>";
                                        echo "<th><a href='../models/cancelar_agendamento.php?id=$reserva_id'>
                                        <h5>Cancelar agendamento</h5></a></th>";
                                    ?>
                                </tr>
                            </table> 
                            <?php
                            $quantidade_linhas_usuario = ++$quantidade_linhas_usuario;
                        }
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
            <div class="fazer-um-novo-agendamento">
                <a href="../models/escolha-servico.php">
                    <h5>Fazer um novo agendamento</h5>
                </a>
            </div>
        </div>
    </section>