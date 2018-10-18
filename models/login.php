<?php
include('../PDO/connection.php');
session_start();

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: ../index-login.php');
	exit();
}

$usuario = mysqli_real_escape_string($db, $_POST['usuario']);
$senha = mysqli_real_escape_string($db, $_POST['senha']);

$query = "select usuario from usuario where usuario = '{$usuario}' and senha = ('{$senha}')";

$result = mysqli_query($db, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../index-login.php');
	exit();
}
?>
