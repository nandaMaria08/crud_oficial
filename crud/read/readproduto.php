<?php
session_start();
require "../conexao.php";
if (!isset($_SESSION['id'])) {
  header('Location: ../login.php');
}

$sql = "SELECT p.id_produto, p.produto, p.descricao,p.preco, p.validade, p.quantidade, m.id_marca, m.marca as marcas from produtos as p join marcas as m on p.id_marca = m.id_marca order by p.produto ASC;";
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
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
   margin: 0;
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

<?php
    if(isset($_GET['produtodeletado'])){
      $nomeProduto = $_GET['nome_produto'];
      echo "<div class='d-flex justify-content-center mt-3 '>
      <div id='alert' class=' alert alert-danger alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
      <strong>Produto '$nomeProduto' deletado!</strong> </div> 
      </div>";
    }

    if(isset($_GET['atualizado'])){
      echo "<div class='d-flex justify-content-center mt-3 '>
      <div id='alert' class=' alert alert-success alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
      <strong>Produto atualizado com sucesso!</strong> </div> 
      </div>";
    }

  ?>


<div class="d-flex justify-content-center py-5 mb-5 mx-5 table-responsive-md">
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
              echo "<td> 
              <form method='post' action='../delete/deleteproduto.php'>
                <input type='hidden' name='id' value='" .$produto['id_produto'] ."'/>
                <input type='hidden' name='nome' value='" .$produto['produto'] ."'/>
                <button type='submit' class='btn btn-danger my-1' >Deletar</button>
              </form>
              <button type='button' class='btn btn-secondary ' data-bs-toggle='modal' data-bs-target='#modalAtualizar" . $produto['id_produto'] . "'>
                  Editar
              </button>
              </td>";
            }

          ?>

        </tbody>
    </table>
    <?php foreach($produtos as $produto) { ?>
      <div class="modal" id="modalAtualizar<?php echo ($produto['id_produto']);?>"  >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

      
          <div class="modal-header">
            <h4 class="modal-title">Atualizar Produto</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
          <form action="../update/updateproduto.php" method="post" >
                  
                  <div>
                    <label class="form-label" for="">Nome do produto</label> 
                    <input class="border border-dark rounded form-control xl-6 " type="text" name="produto" id='<?php echo ($produto['id_produto']); ?>' value='<?php echo ($produto['produto']); ?>' required>
                     <div class="invalid-feedback"> Este campo é obrigatório!</div> 
                    <label class="form-label" for="">Descrição</label> 
                    <input class="border border-dark rounded form-control xl-6" type="text" name="descricao" id='<?php echo ($produto['id_produto']); ?>' value='<?php echo ($produto['descricao']); ?>' required>
                    <div class="invalid-feedback"> Este campo é obrigatório!</div> 
                 </div>
                 <div class="row">
                    <div class="col col-lg-6 col-md-12 col-sm-12">
                        <label class="form-label" for="">Preço</label>
                        <input type="number" id="preco" name="preco" class="preco form-control border border-dark rounded" id='<?php echo ($produto['id_produto']); ?>' value='<?php echo ($produto['preco']); ?>' required>
                        <div class="invalid-feedback"> Este campo é obrigatório!</div> 
                     </div>
                     <div class="col col-lg-6 col-md-12 col-sm-12">
                        <label class="form-label" for="">Data de validade</label>
                        <input type="date" class="form-control border border-dark rounded" name="validade" id='<?php echo ($produto['id_produto']); ?>' value='<?php echo ($produto['validade']); ?>' required >
                        <div class="invalid-feedback"> Este campo é obrigatório!</div> 
                     </div> 

                 </div>
                 <div class="row">
                    <div class="col col-lg-6 col-md-12 col-sm-12">
                        <label class="form-label" for="">Quantidade</label>
                        <input type="number" class="form-control border border-dark rounded"  name="quantidade" id='<?php echo ($produto['id_produto']); ?>' value='<?php echo ($produto['quantidade']); ?>' required >
                        <div class="invalid-feedback"> Este campo é obrigatório!</div> 
                     </div>
                     <div class="col col-lg-6 col-md-12 col-sm-12">
                        <label class="form-label" for="">Marca</label>
                        <select class="form-select border border-dark rounded" name="id_marca" id='<?php echo ($produto['id_produto']); ?>' value='<?php echo ($produto['id_marca']); ?>' required>
                          <option disabled selected value="">Selecione a Marca</option>
                            <?php
                              $sql = "SELECT * FROM marcas";
                              $resultado = $pdo->prepare($sql);
                              $resultado->execute();
                              $marcas = $resultado->fetchAll(PDO::FETCH_ASSOC);
                              if(count($marcas) > 0){
                                foreach($marcas as $marca){
                                    echo "<option value='" . $marca['id_marca'] . "'>" . $marca['marca'] . "</    option>";
                                  }
                             }
                            ?>
                        </select>
                        <div class="invalid-feedback"> Este campo é obrigatório!</div> 
                     </div>
                 </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="hidden" name='id' value='<?php echo ($produto['id_produto']); ?>'>
                    <button type="submit" name="atualizar" class="btn btn-danger" >Atualizar</button>
                  </div>
                </form>
           
          </div>

    </div>
  </div>
</div>
<?php }?>

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