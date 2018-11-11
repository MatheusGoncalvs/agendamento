<?php include_once 'layout/painel-administrador.php' ?>
    <form action="admin-cadastrar-dia.php" method="POST">
        <div class="row">
            <label>Qual o dia da semana?</label>
        </div>
        <div class="row">
            <input type="text" name="dia_da_semana" placeholder="Segunda">
        </div>
        <div class="row">
            <label>Qual a data?</label>
        </div>
        <div class="row">
            <input type="text" name="dia_data" placeholder="00/00/0000">
        </div>
        <div class="row">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
<?php include_once 'layout/painel-administrador-rodape.php' ?>