<?php
    session_start();

    if(isset($_GET['remover']) && $_GET['remover'] == "carrinho")
    {
        $idLivro = $_GET['id'];
        unset($_SESSION['itens'][$idLivro]);
        header('Location: ../carrinho.php');
    }


?>