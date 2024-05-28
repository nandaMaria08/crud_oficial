<?php
session_start();
if(isset($_POST['btn'])){
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha']) ){
        
        require "../conexao.php";
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue("email", $email);
        $resultado->bindValue("senha", $senha);
        $resultado->execute();

        if($resultado->rowCount() > 0){
            $dado = $resultado-> fetch();

            $_SESSION['id'] = $dado['email'];
            
            header('Location: ../index.php');
        }
    else{
      echo "Usuário não existe" ;
    }
    }
}
?>