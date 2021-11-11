<?php

    $serverName = 'localhost';
    $username = 'root';
    $password = 'bcd127';
    $database = 'cadastro_crud';

    $connection = new mysqli($serverName, $username, $password, $database);

    // echo '<pre>';
    // var_dump($connection);
    // echo '</pre>';

    if ($connection->connect_error){
        die("Connection error:" . $connection->connect_error);
    }

    return $connection;

?>