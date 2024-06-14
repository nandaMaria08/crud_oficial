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
     <div >
        <div  class="vh-100 d-flex justify-content-center align-items-center  ">
        
          <form action="BD/logar.php" method="POST" class="needs-validation" novalidate>

          <?php
              if(isset($_GET['sucesso'])){
                 echo "<div class='alert alert-success alert-dismissible'>
                 <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                 <strong>Usuário cadastrado com sucesso!</strong> 
                 </div>";
              }
              if(isset($_GET['erro'])){
               echo  "<div class='alert alert-danger alert-dismissible'>
               <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
               <strong>Usuário e/ou senha incorreto(s)!</strong> Tente novamente.
             </div>";
              }
          ?>

            <div id="card" class=" bg-white container rounded shadow col col-lg-4 col-md-6 col-sm-8 ">
              
              <div class=" d-flex flex-column justify-content-center align-items-center" >
                <img class="logo" src="./img/logoalargada.png" alt="">
              </div>
              <?php
              if(isset($_GET['camposvazios'])){
                echo "<div class='text-center text-danger'> Preencha todos os campos!</div>";
              }
              ?>
              <div class="px-5">
                <label class="form-label" for="">Email</label>
                <input class="border border-dark rounded form-control " type="text" name="email" placeholder="E-mail*" required > 
                <p class="invalid-feedback m-0">
                  Este campo é obrigatório!
                </p> <br>
                <label class="form-label" for="">Senha</label>
                <input class="border border-dark rounded form-control " type="password" name="senha" placeholder="Senha*" required> 
                <p class="invalid-feedback m-0">
                  Este campo é obrigatório!
                </p> 
              </div>
              <div class="py-3 d-flex justify-content-center align-items-center ">
                <button name="btn" type="submit" class="btn btn-danger">Enviar</button>
              </div>
              <div class="py-1" >
                <p class="py-2 text-center" >Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
              </div>
            </div>

          </form>
        </div>
     </div> 

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