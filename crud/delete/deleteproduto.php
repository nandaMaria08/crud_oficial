<?php
    require "../conexao.php";
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $nome = $_POST['nome'];

        $sql = "DELETE FROM produtos WHERE id_produto = :id";
        $resultado = $pdo->prepare($sql);
        $resultado->bindValue(":id", $id);
        $resultado->execute(); 

        header("Location: ../read/readproduto.php?nome_produto=$nome&produtodeletado");
    }