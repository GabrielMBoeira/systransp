<?php
require_once('../../db/conexao.php');
require_once('func_003.php');

$conn = novaConexao();

$data = $_POST['data'];
$numCarga = $_POST['numCarga'];
$placa = $_POST['placa'];
$destino = $_POST['destino'];
$km1 = $_POST['km1'];
$km2 = $_POST['km2'];
$kmTotal = $_POST['kmTotal'];    
$pesoBruto = $_POST['pesoBruto'];
$pesoBrutoReentrega = $_POST['pesoBrutoReentrega'];
$notasReentrega = $_POST['notasReentrega'];
$pernoite = $_POST['pernoite'];
$descarga = $_POST['descarga'];
$pedagio = $_POST['pedagio'];
$complementos = $_POST['complementos'];
$observacao = $_POST['observacao'];





// echo json_encode($result);

