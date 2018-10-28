    <?php include_once '../layout/usuario_logado.php' ?>
    <!--section-->
    <section>
        <div>
            <div class="seus-agendamentos">
                <h3>Seus agendamentos</h3>
            </div>
            <div class="mostrar-agendamentos">
                <?php
    include('../PDO/connection.php');
    $usuario = $_SESSION['usuario'];
  try {

    $query = "SELECT usuario_agendamento.cod_servico, 
                servico.id, 
                servico.tipo_servico, 
                usuario_agendamento.cod_usuario,
                usuario_agendamento.cod_agendamento
	            FROM usuario_agendamento 
                INNER JOIN servico
                ON usuario_agendamento.cod_servico = servico.id ";
        $resultObj = $db->query($query);
        $quantidade_linhas_usuario = 0;
        if($resultObj ->num_rows > 0){
            while($row = $resultObj->fetch_array()){
                if($row['cod_usuario'] == $usuario){
                    $code = $row['cod_agendamento'];
                ?>
                    <table>
                        <tr>
                            <th><h5><?php echo $row['tipo_servico'];?></h5></th>
                            <?php
                            echo "<th><a href='../models/reagendamento_servico.php?id=$code'>
                                <h5>Reagendar</h5></a></th>";
                            echo "<th><a href='../models/cancelar_agendamento.php?id=$code'>
                                <h5>Cancelar agendamento</h5></a></th>";
                            ?>
                        </tr>
                    </table> 
                <?php
                $quantidade_linhas_usuario = ++$quantidade_linhas_usuario;
                }
            }
            //Testa se tem serviço cadastrado para o cliente logado. Se não, apresenta a mensagem NSC.
            if($quantidade_linhas_usuario == 0){?> 
                <tr><th><h5>Nenhum serviço encontrado :/</h5></tr></th> <?php
            }
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
                <a href="../models/busca.php">
                    <h5>Fazer um novo agendamento</h5>
                </a>
            </div>
        </div>
    </section>