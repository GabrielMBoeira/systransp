<?php
session_start();

require_once(dirname(__FILE__, 3) . '/db/conexao.php');
require_once(dirname(__FILE__, 3) . '/model/Veiculo.php');

$idUsuario = $_SESSION['idUsuario'];

function pegarCategoria($placa)
{
    $conn = novaConexao();

    $sql = 'SELECT categoria FROM veiculo WHERE placa = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $placa);
    $stmt->execute();
 
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        print_r($row);
    } else {
        echo 'Não foi possível pegar categoria do veículo na base de dados';
    }

    $conn->close();
}


function pegarPesoTotalCarga($pesoBruto, $pesoBrutoReentrega)
{

    $pesoCarga = $pesoBruto + $pesoBrutoReentrega;

    return $pesoCarga;
}

function existICMSUsuario($usuario)
{
    $conn = novaConexao();

    $sql = 'SELECT icms FROM login WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        if($row['icms'] === 'sim') {
            return true;
        } elseif($row['icms'] === 'nao') {
            return false;
        }

    } else {
        echo 'Não houve retorno de consulta de ICMS da base de dados';
    }

    $conn->close();
}


function calcularFrete($usuario, $placa, $pesoBruto, $destino, $pesoBrutoReentrega, $pernoite = 0, $descarga = 0, $complementos = 0)
{

var_dump($complementos);
    $categoria = pegarCategoria($placa);
    $pesoTotalCarga = pegarPesoTotalCarga($pesoBruto, $pesoBrutoReentrega);

    if ($destino <= 100) {
        $valorFrete = 'ok';
    }


    if ($destino <= 100 && $categoria === 'utilitario_peq' && $pesoTotalCarga < 1040 && !existICMSUsuario($usuario)) {
        $valorFrete = 310.47 + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 150 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && !existICMSUsuario($usuario)) {
        $valorFrete = 340.94 + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 200 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && !existICMSUsuario($usuario)) {
        $valorFrete = 368.54 + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 250 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && !existICMSUsuario($usuario)) {
        $valorFrete = 460.96 + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 300 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && !existICMSUsuario($usuario)) {
        $valorFrete = 505.02 + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 350 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && !existICMSUsuario($usuario)) {
        $valorFrete = 559.06 + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 400 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && !existICMSUsuario($usuario)) {
        $valorFrete = 621.92 + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 450 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && !existICMSUsuario($usuario)) {
        $valorFrete = 655.52 + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 500 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && !existICMSUsuario($usuario)) {
        $valorFrete = 712.37 + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 550 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && !existICMSUsuario($usuario)) {
        $valorFrete = 783.61 + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 600 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && !existICMSUsuario($usuario)) {
        $valorFrete = 854.84 + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 650 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && !existICMSUsuario($usuario)) {
        $valorFrete = 'Tabela não cadastrada - KM excedido';
    } elseif ($destino <= 100 && $categoria === 'utilitario_peq' && $pesoTotalCarga < 1040 && existICMSUsuario($usuario)) {
        $valorFrete = 298.53 * $pesoTotalCarga + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 150 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && existICMSUsuario($usuario)) {
        $valorFrete = 327.83 * $pesoTotalCarga + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 200 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && existICMSUsuario($usuario)) {
        $valorFrete = 354.37 * $pesoTotalCarga + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 250 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && existICMSUsuario($usuario)) {
        $valorFrete = 442.97 * $pesoTotalCarga + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 300 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && existICMSUsuario($usuario)) {
        $valorFrete = 485.60 * $pesoTotalCarga + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 350 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && existICMSUsuario($usuario)) {
        $valorFrete = 537.56 * $pesoTotalCarga + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 400 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && existICMSUsuario($usuario)) {
        $valorFrete = 598.00 * $pesoTotalCarga + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 450 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && existICMSUsuario($usuario)) {
        $valorFrete = 630.31 * $pesoTotalCarga + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 500 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && existICMSUsuario($usuario)) {
        $valorFrete = 684.97 * $pesoTotalCarga + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 550 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && existICMSUsuario($usuario)) {
        $valorFrete = 753.47 * $pesoTotalCarga + $pernoite + $descarga + $complementos;
    } elseif ($destino <= 600 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && existICMSUsuario($usuario)) {
        $valorFrete = 821.96 * $pesoTotalCarga + $pernoite + $descarga + $complementos; 
    } elseif ($destino <= 650 && $categoria === 'utilitario_peq' && $pesoTotalCarga <= 1040 && existICMSUsuario($usuario)) {
        $valorFrete = 'Tabela não cadastrada - KM excedido';
    }

    // print_r($valorFrete);
    
}
