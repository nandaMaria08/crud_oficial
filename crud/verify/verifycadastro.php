<?php
if(isset($_POST['btn'])){
    if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['telefone']) && !empty($_POST['telefone'])  && isset($_POST['senha']) && !empty($_POST['senha'])  && isset($_POST['confirma_senha']) && !empty($_POST['confirma_senha']) ){
       require "../conexao.php";
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $confirma_senha = $_POST['confirma_senha'];
        
        if($senha == $confirma_senha){
        $sql = "INSERT INTO usuarios(email,usuario,telefone,nome,senha) VALUES(:email,:usuario, :telefone, :nome,:senha)";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue("email", $email);
        $resultado->bindValue("usuario", $usuario);
        $resultado->bindValue("telefone", $telefone);
        $resultado->bindValue("nome", $nome);
        $resultado->bindValue("senha", $senha);
        $resultado->execute();
        header('Location:../login.php?sucess');
    }
    else {
        header('Location:../cadastro.php?erro');
    }
        
}
}
?>