<?php
    require "../conexao.php";
    if(isset($_POST['atualizar'])){
        // echo "oi";

        if (
            isset($_POST['id']) && !empty($_POST['id']) &&
            isset($_POST['atualizamarca']) && !empty($_POST['atualizamarca'])) {
            
    
            $id = $_POST['id'];
            $marca = $_POST['atualizamarca'];

            // var_dump($id);
            // var_dump($marca);

            $sql = "UPDATE marcas SET marca = :marca WHERE id_marca = :id";
            $resultado = $pdo->prepare($sql);
            $resultado->bindValue(":id", $id);
            $resultado->bindValue(":marca", $marca);
            $resultado->execute();

            header("Location:../read/readmarcas.php?atualizado");
            }
    }