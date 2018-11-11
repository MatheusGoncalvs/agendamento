<?php 
     include_once 'layout/header.inc.php';
     include('PDO/connection.php');

     $nome_cliente = $_POST['nome_cliente'];
     $email = $_POST['email'];
     $cpf = $_POST['cpf'];
     $senha = $_POST['senha'];

     try{
        $query = "INSERT INTO cliente (id, nome, cpf, email, senha )
            VALUES ('NULL', '$nome_cliente', '$cpf',  '$email', '$senha')";
        $db->query($query);

        printf("Dados inseridos com sucesso!");
        $db->close();
    }catch (PDOException $e){
        printf("Fique tranquilo, resolveremos este erro: %s\n", $e->getMessage());
    }
?>