<?php 
session_start();
require_once('../../db/conexao.php');
require_once('func_000.php');

if (isset($_POST['entrar'])) {

    $conn = novaConexao();

    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $usuario = htmlspecialchars($usuario);
    $senha = htmlspecialchars($senha);

    $idUsuario = existLogin($usuario, $senha);


    if ($idUsuario > 0 ) {
        $_SESSION['idUsuario'] = $idUsuario;
        header("location: ../rot001/fretes_em_aberto.php");
    } else {
        header("location: ../../../index.php");
        $_SESSION['msg-login'] = "<div class='alert alert-danger' role='alert'>Senha ou login inválido</div>";
    }

    $conn->close();
}
