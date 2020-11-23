<?php

function novaConexao($db = 'systransp')
{

    $server = 'localhost';
    $db = 'systransp';
    $password = '';
    $username = 'root';

    $conn = new mysqli($server, $username, $password, $db);

    if ($conn->connect_error) {
         die('Error: ' . $conn->connect_error);
    }
    return $conn;
}
