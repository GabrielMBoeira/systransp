<?php
require_once('../template/header.php');
?>

<link rel="stylesheet" href="../../../public/css/fretes_em_aberto.css" />
<main class="main">
  <div class="content">
    <div class="box">
      <div class="header-box">
        <span>Fretes abertos</span>
      </div>
      <div class="body-box">
        <div class="table-responsive-md">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Data</th>
                <th scope="col">Carga</th>
                <th scope="col">Destino</th>
                <th scope="col" class="text-truncate">Valor tabela</th>
                <th scope="col" class="text-truncate">Valor Aceito</th>
                <th scope="col" class="text-truncate">Divergências</th>
                <th scope="col">Ação</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>02/05/2020</td>
                <td>2135454</td>
                <td class="text-truncate">Florianopolis</td>
                <td>1000,00</td>
                <td>1000,00</td>
                <td>0,00</td>
                <td>
                  <a href="#" class="btn btn-primary btn-sm">
                    Editar
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="footer-box">ChargeLog</div>
    </div>
  </div>
</main>

<?php
require_once('../template/footer.php');
?>
