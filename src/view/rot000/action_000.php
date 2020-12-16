<?php
require_once('../../db/conexao.php');
require_once('func_000.php');

if (isset($_POST['entrar'])) {

    $conn = novaConexao();

    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $usuario = htmlspecialchars($usuario);
    $senha = htmlspecialchars($senha);

    if (existLogin($usuario, $senha)) {
        header("location: ../rot001/fretes_em_aberto.php");
        $_SESSION['usuario'] = $usuario;
    } else {
        header("location: ../../../index.php");
        $_SESSION['msg-login'] = "<div class='alert alert-danger' role='alert'>Senha ou login inválido</div>";
    }

    $conn->close();
}
