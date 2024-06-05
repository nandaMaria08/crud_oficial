<?php
if(isset($_POST['cadastrar'])){
    if(isset($_POST['marca']) && !empty($_POST['marca']) ){
       require "../conexao.php";
        $marca = $_POST['marca'];
    
        $sql = "INSERT INTO marcas(marca) VALUES(:marca)";
        $resultado = $pdo->prepare($sql);
        $resultado->bindValue("marca", $marca);
        $resultado->execute();
        header('Location: ../index.php?cadastrado');
    }
}