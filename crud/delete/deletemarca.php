<?php
    require "../conexao.php";
    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $sql = "DELETE FROM marcas WHERE id_marca = :id";
        $resultado = $pdo->prepare($sql);
        $resultado->bindValue(":id", $id);
        $resultado->execute(); 

        header("Location: ../read/readmarcas.php?marcadeletada");
    }