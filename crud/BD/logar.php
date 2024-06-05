<?php
session_start();
require "../conexao.php";

if(isset($_POST["btn"]) && !empty($_POST["email"]) && isset($_POST["email"]) && !empty($_POST["senha"]) && isset($_POST["senha"])){
   
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    $sql = "SELECT * FROM users WHERE email = :email AND senha = :senha";

    $resultado = $pdo->prepare($sql);
    $resultado->bindValue("email", $email);
    $resultado->bindValue("senha", $senha);
    $resultado->execute();

    if($resultado->rowCount() > 0){
        $dado = $resultado->fetch();

        $_SESSION['id'] = $dado['id'];
        $_SESSION['email'] = $dado['email'];
        $_SESSION['nome'] = $dado['nome'];
        $_SESSION['usuario'] = $dado['usuario'];
        $_SESSION['telefone'] = $dado['telefone'];


        header('Location: ../index.php');
    }

    else{
      echo  "Usuário, não cadastrado!";
    }

}
?>