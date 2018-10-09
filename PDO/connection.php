<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $banco = 'agendamento';

    $db = new mysqli($host, $user, $password, $banco);
    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        exit();
    }

    ?>