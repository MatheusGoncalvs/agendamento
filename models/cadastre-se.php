<?php
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordconfirmacao = $_POST["passwordconfirmacao"];
<<<<<<< HEAD

    $host = 'localhost';
    $user = 'sa';
    $password = 'sa';
    $banco = 'agendamento';

    $db = new mysqli('$host', '$user', '$password', '$banco');
    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        exit();
    }
=======
>>>>>>> 88ceb0d0f14b8b659e4922daa44bff60be885dc2
    
?>