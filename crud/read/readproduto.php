<?php
session_start();
require "../conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>template</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
  #nav{
    background-color: brown;
  }
  #logo{
    height: 50px;
    width: 50px;
  }
  #user{
    height: 30px;
    width: 30px;

  }
</style>

<body>
<nav id="nav" class="container-fluid navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand" href="../index.php"><img id="logo" src="../img/logo.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse d-flex justify-content-between " id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link text-white" href="./readproduto.php">Estoque <span class="sr-only">(Meus produtos)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="./readmarcas.php">Marcas</a>
      </li>
    </ul>
  </div>
  <div class="dropdown px-3">
    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown">
    <?php
          echo "<div class='px-2'></div>" . $_SESSION['nome'];
        ?>
        <img src="../img/usuario.avif" class="rounded-circle " id="user" alt="">
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="">Excluir conta</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="../BD/logout.php">Sair</a></li>
    </ul>
  </div>
</nav>

</body>
</html>