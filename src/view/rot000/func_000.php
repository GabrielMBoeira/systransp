<?php
// session_start();
require_once('../../db/conexao.php');

function existLogin($usuario, $senha)
{

    $conn = novaConexao();

    $sql = "SELECT * FROM login WHERE usuario = ? AND senha = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('ss', $usuario, $senha);

    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $idUsuario = $row['id'];
        return $idUsuario;
    } else {
        return  false;
    }
    $conn->close();
}
