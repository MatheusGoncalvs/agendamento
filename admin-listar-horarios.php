<?php 
    include_once 'layout/painel-administrador.php';
    include('PDO/connection.php');
?>
 <!--section-->
 <section>
        <div>
            <div class="seus-agendamentos">
                <h3>Aqui estão todos os horários cadastrados</h3>
            </div>
            <div class="mostrar-agendamentos">
    <?php
  try {
    $query = "SELECT * FROM horario ORDER BY horario_id";
    $resultObj = $db->query($query);
    $quantidade_linhas_usuario = 0;
    if($resultObj ->num_rows > 0){
        while($row = $resultObj->fetch_array()){
            $horario_id = $row['horario_id'];
    ?>
            <table>
                <tr>
                    <th><h5><?php echo $row['horario_id'];?></h5></th>
                    <th><h5><?php echo $row['horario'];?></h5></th>
                    <?php
                        echo "<th><a href='admin-alterar-servico-horario.php?id=$horario_id'>
                                <h5>Alterar</h5></a></th>";
                        echo "<th><a href='admin-excluir-horario.php?id=$horario_id'>
                                <h5>Excluir</h5></a></th>";
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
                <a href="admin-principal.php">
                    <h5>Principal</h5>
                </a>
            </div>
        </div>
</section>
<?php include_once 'layout/painel-administrador-rodape.php'?>