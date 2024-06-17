<?php
session_start();
require "../conexao.php";
if (!isset($_SESSION['id'])) {
  header('Location: ../login.php');
}

$sql = "SELECT * FROM marcas";
$resultado = $pdo->prepare($sql);
$resultado->execute();
$marcas = $resultado->fetchAll(PDO::FETCH_ASSOC);
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
  #tabela{
    width:800px ;
  }
  #sair{
    height: 20px;
    width: 20px;
  }
</style>

<body>
<nav id="nav" class="container-fluid navbar navbar-expand-lg navbar-light">
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
<div >
  <?php
    if(isset($_GET['marcadeletada'])){
      $nomeMarca = $_GET['nome_marca'];
      echo "<div class='d-flex justify-content-center mt-3 '>
      <div id='alert' class=' alert alert-danger alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
      <strong>Marca '$nomeMarca' deletada!</strong> </div> 
      </div>";
    }

    if(isset($_GET['atualizado'])){
      echo "<div class='d-flex justify-content-center mt-3 '>
      <div id='alert' class=' alert alert-success alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
      <strong>Marca atualizada com sucesso!</strong> </div> 
      </div>";
    }

    if(isset($_GET['npreenchidos'])){
      echo "<div class='d-flex justify-content-center mt-3 '>
      <div id='alert' class=' alert alert-danger alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
      <strong>Preencha os campos do formulário corretamente !</strong> </div> 
      </div>";
    }

  ?>

</div>


<div class="d-flex justify-content-center py-5 mb-5">
    <?php
    if(count($marcas) > 0){
    ?>

    <table id="tabela" class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Marca</th>
            <th>Ações</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($marcas as $marca){
              echo "<tr>";
              echo "<td>" . $marca['id_marca'] . "</td>";
              echo "<td>" . $marca['marca'] . "</td>";
              echo "<td> 
              <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#modalApagar" . $marca['id_marca'] . "'>
                  Deletar
              </button>
              <button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#modalAtualizar" . $marca['id_marca'] . "'>
                  Editar
              </button>
              </td>";
              echo "</tr>";
            
            }
          ?>
         
        </tbody>
      </table>
      <?php foreach($marcas as $marca) { ?>
      <div class="modal" id="modalApagar<?php echo ($marca['id_marca']);?>"  >
        <div class="modal-dialog modal-dialog">
          <div class="modal-content">

      
          <div class="modal-header">
            <h4 class="modal-title">Apagar marca</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <p>Você deseja realmente apagar esta marca? </p>
            <p>  (Todos os produtos referentes a essa marca seram excluídos juntamente com a mesma.)</p>

          <form method='post' action='../delete/deletemarca.php'>
                <input type='hidden' name='id' value='<?php echo ($marca['id_marca']); ?>'/>
                <input type='hidden' name='nome' value='<?php echo ($marca['marca']); ?>'/>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type='submit' class='btn btn-danger' >Deletar</button>
                </div>
          </form>
          </div>
    </div>
  </div>
</div>
<?php }?>


<?php foreach($marcas as $marca) { ?>
      <div class="modal" id="modalAtualizar<?php echo ($marca['id_marca']);?>"  >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

      
          <div class="modal-header">
            <h4 class="modal-title">Atualizar Marca</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
           <form action="../update/updatemarca.php" method="post" class="needs-validation" novalidate>
            <label class="form-label" for="">Marca <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id='<?php echo ($marca['id_marca']); ?>' value='<?php echo ($marca['marca']); ?>' name="atualizamarca" required>
            <div class="invalid-feedback"> Este campo é obrigatório!</div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <input type="hidden" name='id' value='<?php echo ($marca['id_marca']); ?>'>
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
        echo "<h3> Não existe nenhuma marca cadastrada!<h3>" ;
      }
      ?>
</div>
<footer class="footer fixed-bottom">
    <div class="text-center text-white p-3" style="background-color: brown;">
          © 2024 Sistemas 2
    </div>
  </footer>

<script>
  (() => {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation')

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
</body>
</html>