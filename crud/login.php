<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="css/stylelogin.css">
</head>
<body >
<div class="d-flex justify-content-center">

</div>
      
  <div  class="vh-100 d-flex justify-content-center align-items-center">
  
    <form action="./verify/verifylogin.php" method="POST" class="needs-validation" novalidate>
    <?php
       if(isset($_GET['sucess'])){
        echo "Usuário cadastrado com sucesso!";
      
      //   echo "<div class='alert alert-success alert-dismissible fade in'>
      //   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      //   <strong>Success!</strong> Usuário cadastrado com sucesso!
      // </div>";
       }
      
    ?>
      <div id="card" class=" bg-white container-fluid rounded shadow col-lg-6 col-md-8 col-sm-10">
        <div class=" d-flex flex-column justify-content-center align-items-center" >
          <img class="logo" src=".//img/logo_alargada.png" alt="">
        </div>
        <div class=" px-5">
          <input class="border border-dark rounded form-control " type="text" name="email" placeholder="E-mail*" required> 
          <p class="invalid-feedback m-0">
            Este campo é obrigatório!
          </p> <br>
          <input id="password" type="password" class="border border-dark rounded form-control"  name="password" placeholder="Senha*" required>
          <p class="invalid-feedback">
            Este campo é obrigatório!
          </p>
        </div>
        <div class="py-1 d-flex justify-content-center align-items-center ">
          <button type="submit" class="btn btn-danger">Enviar</button>
        </div>
        <div class="py-1" >
          <p class="py-2 text-center" >Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
        </div>
        
      </div>
    </form>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="script.js"></script>
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