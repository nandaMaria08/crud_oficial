<?php
if(isset($_POST['cadastrar_produto'])){
    if(isset($_POST['produto']) && !empty($_POST['produto']) && isset($_POST['descricao']) && !empty($_POST['descricao']) && isset($_POST['preco']) && !empty($_POST['preco']) && isset($_POST['validade']) && !empty($_POST['validade'])  && isset($_POST['quantidade']) && !empty($_POST['quantidade'])  && isset($_POST['id_marca']) && !empty($_POST['id_marca']) ){
       require "../conexao.php";
        $produto = $_POST['produto'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $validade = $_POST['validade'];
        $quantidade = $_POST['quantidade'];
        $id_marca = $_POST['id_marca'];
         

        
        $sql =  "INSERT INTO produtos( produto, descricao, preco, validade, quantidade, id_marca) VALUES (:produto, :descricao, :preco, :validade, :quantidade, :id_marca)";

        $resultado = $pdo->prepare($sql);
        $resultado->bindValue("produto", $produto);
        $resultado->bindValue("descricao", $descricao);
        $resultado->bindValue("preco", $preco);
        $resultado->bindValue("validade", $validade);
        $resultado->bindValue("quantidade", $quantidade);
        $resultado->bindValue("id_marca", $id_marca);
        $resultado->execute();
        header('Location: ../index.php?produtocadastrado');

      
    }
}

?>