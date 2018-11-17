<?php 
    include_once 'layout/painel-administrador.php';
    include('PDO/connection.php');
?>
<div class="row linha-horizontal-banner"></div>
<div class="row listar-servicos-titulo">
    <h1><strong>Selecione o dia que o horário está cadastrado</strong></h1>
</div>
<div class="row alinhamento-listar-escolher-dia">
    <form action="admin-listar-horarios.php" method="POST">
        <!-- Busca todos os dias cadastrados e exibe num select -->
        <div class="row espacamento-formulario">
            <select name="dia_id" required>
                <option value="0">Selecione</option>
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
            <input type="submit" class="btn btn-success" value="Mostrar horários">
        </div>
    </form>
</div>
<?php include_once 'layout/painel-administrador-rodape.php' ?>