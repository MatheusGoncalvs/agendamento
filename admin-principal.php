<?php include_once 'layout/header.inc.php' ?>
    <!--section-->
    <section>
        <div>
            <div class="seus-agendamentos">
                <h3>Todos os serviços/horários</h3>
            </div>
            <div class="mostrar-agendamentos">
                <?php
    include('PDO/connection.php');
  try {

    $query = "SELECT * FROM servico_horario 
                INNER JOIN servico
                ON servico_horario.cod_servico = servico.id";
                
        $resultObj = $db->query($query);
        $quantidade_linhas_usuario = 0;
        if($resultObj ->num_rows > 0){
            while($row = $resultObj->fetch_array()){
                    $code = $row['cod_horario'];
                ?>
                    <table>
                        <tr>
                            <th><h5><?php echo $row['tipo_servico'];?></h5></th>
                            <th><h5><?php echo $row['data_horario'], " às ", $row['horario'];?></h5></th>
                            <?php
                            echo "<th><a href='admin-alterar-servico-horario.php?id=$code'>
                                <h5>Alterar</h5></a></th>";
                            echo "<th><a href='admin-excluir-horario.php?id=$code'>
                                <h5>Excluir serviço/horário</h5></a></th>";
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