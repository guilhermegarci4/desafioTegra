<?php 
    session_start();
    
    foreach($_SESSION['dados'] as $livros)
    {
        $conexaoPDO = new PDO('mysql:host=localhost;dbname=trabalhenategra',"root","");
        $insert = $conexaoPDO->prepare("
        INSERT INTO tbl_pedidos () VALUES (NULL, ?, ?, ?, ?) ");
        $insert->bindParam(1, $livros['id_livro']);
        $insert->bindParam(2, $livros['quantidade']);
        $insert->bindParam(3, $livros['preco']);
        $insert->bindParam(4, $livros['total']);
        $insert->execute();

        $sql = "UPDATE tbl_livros SET qtdEstoque=qtdEstoque - ? WHERE id_livro=?";
        $stmt= $conexaoPDO->prepare($sql);
        $stmt->execute([$livros['quantidade'], $livros['id_livro']]);
        
        $idLivro = $_GET['id'];
        unset($_SESSION['itens'][$livros['id_livro']]);
        unset($_SESSION['dados']);


        header('Location: ../finalizado.php');   
    }

?>