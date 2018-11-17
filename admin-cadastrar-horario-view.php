<?php 
    include_once 'layout/painel-administrador.php';
    include('PDO/connection.php');  
?>
    <div class="row linha-horizontal-banner"></div>
    <div class="row titulo-cadastrar-horario">
        <h1><strong>Cadastrar um novo horário</strong></h1>
    </div>
    <div class="row alinhamento-cadastrar-horario">
    <form action="admin-cadastrar-horario.php" method="POST">
        <div class="row espacamento-formulario">
            <label>Qual o horário desejado?</label>
        </div>
        <div class="row espacamento-formulario">
            <input type="text" name="horario" size="4" required>
        </div>
        <div class="row espacamento-formulario">
            <label>Selecione um dia</label>
        </div>
        <!-- Busca todos os dias cadastrados e exibe num select -->
        <div class="row espacamento-formulario">
            <select name="dia_id" required>
                <option>Selecione</option>
                <?php
                     try{
                        $query = "SELECT * FROM dia order by dia_data";
                        $resultObj = $db->query($query);
                        if($resultObj){
                            while($row = $resultObj->fetch_array()){?>
                                <option value="<?php echo $row['dia_id']; ?>">
                                    <?php echo $row['dia_da_semana'], ", ",$row['dia_data'];?>
                                </option>
                                <?php 
                            }
                        }
                        printf("Dados inseridos com sucesso!");
                        $db->close();
                    }catch (PDOException $e){
                        printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
                    }
                ?>
            </select>
        </div>
        <div class="row espacamento-formulario">
            <label>Qual a quantidade máxima de atendimento?</label>
        </div>
        <div class="row espacamento-formulario">
            <input type="text" name="quantidade_max_vagas" size="1" required>
        </div>
        <div class="row espacamento-formulario">
            <input type="submit" class="btn btn-success" value="Cadastrar horario">
        </div>
    </form>
    </div>
<?php include_once 'layout/painel-administrador-rodape.php' ?>