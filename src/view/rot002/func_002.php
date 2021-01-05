<?php

require_once(dirname(__FILE__, 3) . '/db/conexao.php');

function existePlaca($placa)
{
    $conn = novaConexao();

    $sql = "SELECT * FROM veiculo WHERE placa = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $placa);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $check = true;
    } else {
        $check = false;
    }
    return $check;
}
