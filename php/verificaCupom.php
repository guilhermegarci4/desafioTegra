<?php 

include 'conecta.php';

$cupom = $_POST['cupom'];
$idLivro = $_POST['idLivro'];
$select = mysqli_query($con, "SELECT * FROM tbl_cupons WHERE cupom = '$cupom' AND id_livro=$idLivro");
while($dados=mysqli_fetch_array($select))
{
    $tem = 1;
    $desconto = $dados['desconto'];
}

if($tem == 1)
    header("Location: ../carrinho.php?add=carrinho&id=$idLivro&desconto=$desconto");
else
    header("Location: ../carrinho.php?add=carrinho&id=$idLivro");

?>