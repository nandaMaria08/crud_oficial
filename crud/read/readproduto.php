<?php
session_start();
require "../conexao.php";
if (!isset($_SESSION['id'])) {
  header('Location: ../login.php');
}

$sql = "SELECT p.produto, p.descricao,p.preco, p.validade, p.quantidade, m.id_marca, m.marca as marcas from produtos as p join marcas as m on p.id_marca = m.id_marca order by p.produto ASC;";
$resultado = $pdo->prepare($sql);
$resultado->execute();
$produtos = $resultado->fetchAll(PDO::FETCH_ASSOC);
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
    height: 60px;
    width: 80px;
  }
  #user{
    height: 30px;
    width: 30px;

  }
  /* #tabela{
    width:800px ;
  } */
  #sair{
    height: 20px;
    width: 20px;
  }
</style>

<body>
<nav id="nav" class="container-fluid navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand" href="../index.php"><img id="logo" src="../img/logoalargada.png" alt=""></a>
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
        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalSair" >Sair <img id="sair" src="../img/sair.png" alt=""></a></li>
      </ul>
      <div class="modal" id="modalSair">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
              Você realmente deseja sair dessa página?
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
              <form action="../BD/logout.php" method="post">
                <button type="submit" class="btn btn-danger" >Sair</button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</nav>


<div class="d-flex justify-content-center py-5 mb-5 table-responsive-md">
    <?php
    if(count($produtos) > 0){
    ?>

    <table id="tabela" class="table table-hover ">
        <thead>
          <tr>
            
            <th>Produto</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Validade</th>
            <th>Quantidade</th>
            <th>Marca</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($produtos as $produto){
              echo "<tr>";
              // echo "<td>" . $produto['id_produto'] . "</td>";
              echo "<td>" . $produto['produto'] . "</td>";
              echo "<td>" . $produto['descricao'] . "</td>";
              echo "<td>". 'R$'. $produto['preco'] . "</td>";
              echo "<td>" . $produto['validade'] . "</td>";
              echo "<td>" . $produto['quantidade'] . "</td>";
              echo "<td>" . $produto['marcas'] . "</td>";
            }

          ?>

        </tbody>
    </table>

    <?php
      }else{
        echo "<h3> Não existe nenhum produto cadastrada!<h3>" ;
      }
      ?>
</div>    

<footer class="footer fixed-bottom">
    <div class="text-center text-white p-3" style="background-color: brown;">
          © 2024 Sistemas 2
    </div>
  </footer>

</body>
</html>