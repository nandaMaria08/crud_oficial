<?php
    require "../conexao.php";
    if(isset($_POST['atualizar'])){
        // echo "oi";

        if (
            isset($_POST['id']) && !empty($_POST['id']) &&
            isset($_POST['produto']) && !empty($_POST['produto']) &&
            isset($_POST['descricao']) && !empty($_POST['descricao']) &&
            isset($_POST['preco']) && !empty($_POST['preco']) && 
            isset($_POST['validade']) && !empty($_POST['validade']) &&
            isset($_POST['quantidade']) && !empty($_POST['quantidade']) &&
            isset($_POST['id_marca']) && !empty($_POST['id_marca']))
             {
            
    
            $id = $_POST['id'];
            $produto = $_POST['produto'];
            $descricao = $_POST['descricao'];
            $preco = $_POST['preco'];
            $validade = $_POST['validade'];
            $quantidade = $_POST['quantidade'];
            $id_marca = $_POST['id_marca'];

            //  var_dump($id);
            //  var_dump($produto);

             $sql = "UPDATE produtos SET produto = :produto, descricao = :descricao, preco = :preco, validade = :validade, quantidade = :quantidade, id_marca = :id_marca WHERE id_produto = :id";
             $resultado = $pdo->prepare($sql);
             $resultado->bindValue(":id", $id);
             $resultado->bindValue(":produto", $produto);
             $resultado->bindValue(":descricao", $descricao);
             $resultado->bindValue(":preco", $preco);
             $resultado->bindValue(":validade", $validade);
             $resultado->bindValue(":quantidade", $quantidade);
             $resultado->bindValue(":id_marca", $id_marca);
             $resultado->execute();
            // echo "Deu certo";
            header("Location:../read/readproduto.php?atualizado");
            }
    }