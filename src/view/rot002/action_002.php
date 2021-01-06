<?php
session_start();

require_once('func_002.php');
require_once(dirname(__FILE__, 3) . '/db/conexao.php');

$conn = novaConexao();

if (isset($_POST['salvar-placa'])) {

    $idUsuario = $_POST['idUsuario'];
    $placa = mysqli_real_escape_string($conn, trim($_POST['placa']));
    $categoria = mysqli_real_escape_string($conn, trim($_POST['categoria']));

    $placa = strtoupper($placa);

    if (existePlaca($placa) || $placa == '' || $categoria === 'selecione') {

        $_SESSION['msg-placa-salva'] = "<div class='alert alert-danger' role='alert'>Placa já cadastrada ou campos não preenchidos!</div>";
        header('location: cadastro_veiculo.php');

    } else {
        $sql = "INSERT INTO veiculo (placa, categoria, id_login) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssi', $placa, $categoria, $idUsuario);

        if ($stmt->execute()) {
            $_SESSION['msg-placa-salva'] = "<div class='alert alert-primary' role='alert'>Placa cadastrada com sucesso!</div>";
            header('location: cadastro_veiculo.php');
        } else {
            $_SESSION['msg-placa-salva'] = "<div class='alert alert-danger' role='alert'>Erro ao salvar placa!</div>";
            header('location: cadastro_veiculo.php');
        }
    }
}

$conn->close();