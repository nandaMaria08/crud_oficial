<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylecadastro.css">
</head>
<style>
    #card{
        height: 550px;
    }
</style>
<body>


    <div  class="vh-100 d-flex justify-content-center align-items-center " >
        <form action="BD/cadastrar.php" method="post" class="needs-validation" novalidate>
            <?php
            if(isset($_GET['senhaincorreta'])){
                echo  "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>Senha incorreta!</strong> Tente novamente.
              </div>";
               }
            ?>
            <div id="card" class="rounded py-2 px-5 col col-lg-4 col-md-6 col-sm-8">
                <h1 style="text-align:center;">Cadastro de Usuário</h1>
                <?php
                    if(isset($_GET['camposvazios'])){
                        echo "<div class='text-center text-danger py-2 px-2'> Preencha todos os campos!</div>";
                    }
              ?>
                <div>
                    <label class="form-label" for="">Nome do usuario</label> 
                    <input class="border border-dark rounded form-control xl-6 " type="text" name="usuario" required>
                    <div class="invalid-feedback"> Este campo é obrigatório!</div>
                    <label class="form-label" for="">E-mail</label> 
                    <input class="border border-dark rounded form-control xl-6" type="text" name="email" required>
                    <div class="invalid-feedback"> Este campo é obrigatório!</div>
                </div>
                <div class="row">
                    <div class="col col-lg-6 col-md-12 col-sm-12">
                        <label class="form-label" for="">Nome Social</label>
                        <input type="text" class="form-control border border-dark rounded"  name="nome" required>
                        <div class="invalid-feedback"> Este campo é obrigatório!</div>
                     </div>
                    <div class="col col-lg-6 col-md-12 col-sm-12">
                        <label class="form-label" for="">Telefone</label>
                        <input type="tel" class="form-control border border-dark rounded" placeholder="(xx) xxxxx-xxxx" name="telefone" required>
                        <div class="invalid-feedback"> Este campo é obrigatório!</div>
                     </div>
                     
               </div>
               <div class="row">
                    <div class="col col-lg-6 col-md-12 col-sm-12">
                        <label class="form-label" for="">Senha</label>
                        <input type="text" class="form-control border border-dark rounded" id="senha" name="senha"  required>
                        <div class="invalid-feedback"> Este campo é obrigatório!</div>
                     </div>
                    <div class="col col-lg-6 col-md-12 col-sm-12">
                        <label class="form-label" for="">Confirmar senha</label>
                        <input type="password" class="form-control border border-dark rounded"  name="confirma_senha" required>
                        <div class="invalid-feedback"> Este campo é obrigatório!</div>
                     </div>
                     
               </div>

                <div class=" d-flex justify-content-end py-2" >
                    <button name="btn" type="submit" class="btn btn-danger">Cadastrar</button>
                </div> 
            </div>
            
            
        </form>
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