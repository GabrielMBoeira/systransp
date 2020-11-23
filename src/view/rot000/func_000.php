<?php
session_start();
require_once('../../db/conexao.php');

function existLogin($login, $senha)
{

    $conn = novaConexao();

    $sql = "SELECT * FROM login WHERE login = ? AND senha = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('ss', $login, $senha);

    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        return true;
    } else {
        return  false;
    }
    $conn->close();
}
