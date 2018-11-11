<?php 
    include_once 'layout/painel-administrador.php';
    include('PDO/connection.php');  
?>
    <form action="admin-cadastrar-horario.php" method="POST">
        <div class="row">
            <label>Qual o horário desejado?</label>
        </div>
        <div class="row">
            <input type="text" name="horario" placeholder="08:00">
        </div>
        <div class="row">
            <label>Selecione um dia</label>
        </div>
        <!-- Busca todos os dias cadastrados e exibe num select -->
        <div class="row">
            <select name="dia_id">
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
        <div class="row">
            <label>Qual a quantidade máxima de atendimento?</label>
        </div>
        <div class="row">
            <input type="text" name="quantidade_max_vagas" placeholder="3" size="1">
        </div>
        <div class="row">
            <input type="submit" class="btn btn-success" value="Salvar">
        </div>
    </form>
<?php include_once 'layout/painel-administrador-rodape.php' ?>