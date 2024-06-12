<?php
session_start();
require "./conexao.php";
if (!isset($_SESSION['id'])) {
  header('Location: login.php');
}

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
  #nav {
    background-color: brown;
  }

  #logo {
    height: 60px;
    width: 80px;
  }
  
  #user {
    height: 30px;
    width: 30px;
  }
  #alert{
    width: 350px;
  }

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* ocultar botão de numero no firefox, mas está mostrando erro */
/* input[type=number] {
  -moz-appearance: textfield;
} */
  
</style>

<body>
  <nav id="nav" class="container-fluid navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="./index.php"><img id="logo" src="./img/logoalargada.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse d-flex justify-content-between " id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link text-white" href="./read/readproduto.php">Estoque <span class="sr-only">(Meus produtos)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./read/readmarcas.php">Marcas</a>
        </li>
      </ul>
    </div>
    <div class="dropdown px-4">
      <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown">
        <?php
        echo "<div class='px-2'></div>" . $_SESSION['nome'];
        ?>
        <img src="./img/usuario.avif" class="rounded-circle " id="user" alt="">
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="./BD/logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>
  <?php
    if(isset($_GET['cadastrado'])){
      echo "<div class='d-flex justify-content-center pt-4'>
      <div id='alert' class=' alert alert-success alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
      <strong>Marca cadastrada com sucesso!</strong> </div> 
      </div>";
    }
  
  ?>
  <div class="d-flex flex-row justify-content-center py-2">
    <div class="px-4 py-2">
      <div class="card" style="width:300px">
        <img class="card-img-top" src="./img/marcas.jpg" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title">Cadastrar Marcas</h4>
          <p class="card-text">Cadastre aqui as marcas que sua loja oferece!</p>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
            Cadastrar Marca
          </button>
        </div>
        <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Cadastrar marca</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <form action="./create/createmarca.php" method="post">
                 <label for="" class="label-control">Marca</label>
                 <input type="text" name="marca" class="form-control">
                 <div class="modal-footer">
                    <button name="cadastrar" type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cadastrar</button>
                 </div>
              </form>
            </div>
          </div>
        </div>
</div>

      </div>
    </div>
    
    <div class="px-4 py-2">
      <div class="card " style="width:300px">
        <img class="card-img-top" src="./img/cosmeticos.jpg" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title">Cadastrar Produtos</h4>
          <p class="card-text">Cadastre aqui os produtos disponíveis na sua loja!</p>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal2">
            Cadastrar produto
          </button>
        </div>
        <div class="modal" id="myModal2">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title">Cadastrar Produto</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <div class="modal-body">
                <form action="./create/createproduto.php" method="post">
                  
                  <div>
                    <label class="form-label" for="">Nome do produto</label> 
                    <input class="border border-dark rounded form-control xl-6 " type="text" name="produto" >
                    <!-- <div class="invalid-feedback"> Este campo é obrigatório!</div> -->
                    <label class="form-label" for="">Descrição</label> 
                    <input class="border border-dark rounded form-control xl-6" type="text" name="descricao" >
                    <!-- <div class="invalid-feedback"> Este campo é obrigatório!</div> -->
                 </div>
                 <div class="row">
                    <div class="col col-lg-6 col-md-12 col-sm-12">
                        <label class="form-label" for="">Preço</label>
                        <input type="number" id="preco" name="preco" class="preco form-control border border-dark rounded" >
                        <!-- <div class="invalid-feedback"> Este campo é obrigatório!</div> -->
                     </div>
                     <div class="col col-lg-6 col-md-12 col-sm-12">
                        <label class="form-label" for="">Data de validade</label>
                        <input type="date" class="form-control border border-dark rounded" name="validade" >
                        <!-- <div class="invalid-feedback"> Este campo é obrigatório!</div> -->
                     </div> 

                 </div>
                 <div class="row">
                    <div class="col col-lg-6 col-md-12 col-sm-12">
                        <label class="form-label" for="">Quantidade</label>
                        <input type="number" class="form-control border border-dark rounded"  name="quantidade" >
                        <!-- <div class="invalid-feedback"> Este campo é obrigatório!</div> -->
                     </div>
                     <div class="col col-lg-6 col-md-12 col-sm-12">
                        <label class="form-label" for="">Marca</label>
                        <select class="form-select border border-dark rounded" name="marca">
                          <option disabled selected value="">Selecione a Marca</option>
                            <?php
                              $sql = "SELECT * FROM marcas";
                              $resultado = $pdo->prepare($sql);
                              $resultado->execute();
                              $marcas = $resultado->fetchAll(PDO::FETCH_ASSOC);
                              if(count($marcas) > 0){
                                foreach($marcas as $marca){
                                    echo "<option value='" . $marca['id'] . "'>". $marca['id'] . " - " . $marca['marca'] . "</    option>";
                                  }
                             }
                            ?>
                        </select>
                        <!-- <div class="invalid-feedback"> Este campo é obrigatório!</div> -->
                     </div>

                 </div>
                <div class="modal-footer">
                    <button name="cadastrar_produto" type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cadastrar produto</button>
                </div>
                </form>
              </div>

              
              

            </div>
          </div>
        </div>


      </div>
    </div>


    <div class="px-4 py-2">
      <div class="card " style="width:300px">
        <img class="card-img-top" src="./img/relatorio.jpg" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title">Relatório</h4>
          <p class="card-text">Confira aqui, qual a marca dominante do seu estoque!</p>
          <button type="button" class="btn btn-danger"  >
            Confira o relatório
          </button>
        </div>
        

      </div>
    </div>

  </div>
    
  <footer class="footer fixed-bottom">
    <div class="text-center text-white p-3" style="background-color: brown;">
          © 2024 Sistemas 2
    </div>
  </footer>


</body>

</html>