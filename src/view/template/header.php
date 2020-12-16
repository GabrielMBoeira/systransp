<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="../../../public/css/template.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <title>Systranp</title>
</head>

<body class="body">
  <header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Systransp</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-collapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="nav-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../rot003/criar_frete.php">Novo frete</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../rot001/fretes_em_aberto.php">Fretes pendentes</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Filtros</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../rot002/cadastro_veiculo.php">Cadastro de veículo</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../../../index.php">Sair</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar carga" />
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
            Pesquisar
          </button>
        </form>
      </div>
    </nav>
  </header>