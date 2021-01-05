<?php
session_start();

require_once(dirname(__FILE__, 3) . '/db/conexao.php');

$conn = novaConexao();

if (isset($_POST['salvar-placa'])) {

    $placa = mysqli_real_escape_string($conn, trim($_POST['placa']));
    $categoria = mysqli_real_escape_string($conn, trim($_POST['categoria']));


    $sql = "INSERT INTO veiculo (placa, categoria) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $placa, $categoria);
    
    if ($stmt->execute()) {
        $_SESSION['msg-placa-salva'] = "<div class='alert alert-primary' role='alert'>Placa cadastrada com sucesso!</div>";
        header('location: cadastro_veiculo.php');
    } else {
        $_SESSION['msg-placa-salva'] = "<div class='alert alert-danger' role='alert'>Erro ao salvar placa!</div>";
        header('location: cadastro_veiculo.php');
    }
}

$conn->close();