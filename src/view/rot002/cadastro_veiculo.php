<?php
session_start();

require_once('../template/header.php');
require_once('func_002.php');
require_once(dirname(__FILE__, 3) . '/db/conexao.php');

if (!isset($_POST['placa'])) {
  $_POST['placa'] = '';
}

$conn = novaConexao();

if (isset($_POST['salvar-placa'])) {

    $placa = mysqli_real_escape_string($conn, trim($_POST['placa']));
    $categoria = mysqli_real_escape_string($conn, trim($_POST['categoria']));

    if (existePlaca($placa) || $placa == '' || $categoria === 'selecione') {

        $_SESSION['msg-placa-salva'] = "<div class='alert alert-danger' role='alert'>Placa já cadastrada ou campos não preenchidos!</div>";
        header('location: cadastro_veiculo.php');

    } else {
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
}

$conn->close();

?>

<link rel="stylesheet" href="../../../public/css/cadastro_veiculo.css" />
<main class="main">
  <div class="content">
    <div class="box">
      <div class="header-box">
        <span>Cadastro</span>
      </div>
      <div class="body-box">
        <form action="#" method="post">
          <?php
            if (isset($_SESSION['msg-placa-salva'])) {
              print_r($_SESSION['msg-placa-salva']);
              unset($_SESSION['msg-placa-salva']);
            }
          ?>
          <div class="row">
            <div class="col-md-6 mt-2">
              <label for="">Placa</label>
              <input type="text" class="form-control" id=placa name="placa" style="text-transform: uppercase" value="<?= $_POST['placa'] ?>"/>
            </div>
            <div class="col-md-6 mt-2">
              <label for="">Categoria</label>
              <select name="categoria" id="categoria" class="form-control">
                <option value="selecione">Selecione</option>
                <option value="HR">HR</option>
                <option value="Van">Van</option>
                <option value="3/4">3/4</option>
                <option value="Toco">Toco</option>
                <option value="Truck">Truck</option>
              </select>
            </div>
          </div>
          <div class="d-flex justify-content-end mt-2">
            <button class="btn btn-outline-primary mt-2" name="salvar-placa">
              Salvar
            </button>
          </div>
        </form>
      </div>
      <div class="footer-box">ChargeLog</div>
    </div>
  </div>
</main>

<script src="002.js"></script>

<?php
require_once('../template/footer.php');
?>