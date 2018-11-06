    <?php include_once 'layout/header.inc.php' ?>
    <?php
        include('PDO/connection.php');

        $codigo_horario = $_GET['id'];
        $horario_tem_agendamento = false;

        try {

            $query = "SELECT * FROM usuario_agendamento 
                        WHERE cod_horario = '$codigo_horario'";
                $resultObj = $db->query($query);
                if($resultObj ->num_rows > 0){
                    $horario_tem_agendamento = true;
                }
            

            $query = "SELECT * FROM servico_horario 
                        INNER JOIN servico
                        ON servico_horario.cod_servico = servico.id";
                $resultObj = $db->query($query);
                if($resultObj ->num_rows > 0){
                    while($row = $resultObj->fetch_array()){
                       if($row['cod_horario'] == $codigo_horario){
                           $data_horario = $row['data_horario'];
                           $horario = $row['horario'];
                           $qtde_horario = $row['qtde_horario'];
                           $cod_servico = $row['cod_servico'];
                           if($row['id'] == $cod_servico){
                            $tipo_servico = $row['tipo_servico'];
                           }
                       }
                    }
                }
              }
              catch (PDOException $e) {
                printf("We had a problem: %s\n", $e->getMessage());
              }
          $resultObj->close();
          $db->close();
    ?>

    <?php
        if(!$horario_tem_agendamento){ 
     ?>
    <!--section-->
    <section>
        <form action="admin-update-servico-horario.php" method="post">

            <!-- DADOS PESSOAIS-->
            <fieldset>
                <legend>Novo horário de serviço</legend>
                <table cellspacing="10">
                    <tr>
                        <td>
                            <label for="tipo-servico">Código do serviço: </label>
                        </td>
                        <td align="left">
                            <input type="text" name="codigo_servico" size="1" value="<?php echo $cod_servico ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tipo-servico">Tipo de serviço: </label>
                        </td>
                        <td align="left">
                            <input type="text" name="tipo_servico" value="<?php echo $tipo_servico ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Data: </label>
                        </td>
                        <td align="left">
                            <input type="text" name="data_servico" size="6" maxlength="13" value="<?php echo $data_horario ?>">
                        </td>
                        <td>
                            <label for="horario">Horário: </label>
                        </td>
                        <td align="left">
                            <input type="text" name="horario" size="2" value="<?php echo $horario ?>">
                        </td>
                        <td>
                            <label for="qtde_horario">Vagas para o horário: </label>
                        </td>
                        <td align="left">
                            <input type="text" name="qtde_horario" size="1" value="<?php echo $qtde_horario ?>">
                        </td>
                    </tr>
                </table>
            </fieldset>
            <br />
            <input type="submit">
            <input type="reset" value="Limpar">
        </form>
    </section>
    <?php 
        }if($horario_tem_agendamento){
            echo "Horário não pode ser alterado/Excluído porque tem agendamento ativo.";
        }
    ?>