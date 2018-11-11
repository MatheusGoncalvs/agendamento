<?php include_once 'layout/header.inc.php' ?>
    <form action="admin-cadastrar-cliente.php" method="POST">
        <div class="row">
            <label>Qual o seu nome?</label>
        </div>
        <div class="row">
            <input type="text" name="nome_cliente" placeholder="Seu nome">
        </div>
        <div class="row">
            <label>Qual o seu CPF?</label>
        </div>
        <div class="row">
            <input type="text" name="cpf" placeholder="000-000-000-00">
        </div>
        <div class="row">
            <label>Qual o seu email?</label>
        </div>
        <div class="row">
            <input type="text" name="email" placeholder="">
        </div>
        <div class="row">
            <label>Defina uma senha</label>
        </div>
        <div class="row">
            <input type="password" name="senha" placeholder="">
        </div>
        <div class="row">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
<?php include_once 'layout/rodape.php' ?>