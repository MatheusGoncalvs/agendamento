<?php
    $host = 'localhost';
    $user = 'sa';
    $password = 'sa';
    $banco = 'naf_db';

    $db = new mysqli($host, $user, $password, $banco);
    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        exit();
    }

    ?>