<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="public/css/style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <title>Systransp</title>
</head>

<body class="body">
  <div class="box">
    <form action="src/view/rot000/action_000.php" method="post">
      <?php
      if (isset($_SESSION['msg-login'])) {
        print_r($_SESSION['msg-login']);
        unset($_SESSION['msg-login']);
      }
      ?>
      <div class="form-group">
        <label for="login" class="text-box">Login:</label>
        <input type="text" name="usuario" class="form-control" />
      </div>
      <div class="form-group">
        <label for="password" class="text-box ">Senha:</label>
        <input type="password" name="senha" class="form-control" />
        <div class="d-flex justify-content-end mt-2">
          <button type="submit" name="entrar" class="btn btn-primary btn-sm">
            Entrar
          </button>
        </div>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>