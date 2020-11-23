<?php
require_once('../../db/conexao.php');
require_once('func_000.php');

if (isset($_POST['entrar'])) {

    $conn = novaConexao();

    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $login = htmlspecialchars($login);
    $senha = htmlspecialchars($senha);

    if (existLogin($login, $senha)) {
        header("location: ../rot001/fretes_em_aberto.php");
        $_SESSION['login'] = $login;
    } else {
        header("location: ../../../index.php");
        $_SESSION['msg-login'] = "<div class='alert alert-danger' role='alert'>Senha ou login inválido</div>";
    }

    $conn->close();
}
