<?php
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordconfirmacao = $_POST["passwordconfirmacao"];

    $host = 'localhost';
    $user = 'sa';
    $password = 'sa';
    $banco = 'agendamento';

    $db = new mysqli('$host', '$user', '$password', '$banco');
    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        exit();
    }
    
?>