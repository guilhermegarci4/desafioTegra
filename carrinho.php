<?php 
session_start();

include 'header.php';
include 'adm/php/utils.php';
include 'php/conecta.php';

$carrinho = 0;
$adicionar = 'false';

if(!isset($_SESSION['itens']))
{
	$_SESSION['itens'] = array();
}

// Adiciona ao carrinho
if(isset($_GET['add']) && $_GET['add'] == "carrinho")
{
	$idLivro = $_GET['id'];
	if(!isset($_SESSION['itens'][$idLivro]))
	{
		$_SESSION['itens'][$idLivro] = 1;
	} else {
		if(isset($_GET['adicionar']) == 'menos') {
			$_SESSION['itens'][$idLivro] -= 1;
		}
		else		
			$_SESSION['itens'][$idLivro] += 1;
	}
} 

//Exibir o carrinho
if(count($_SESSION['itens']) == 0) {
	$carrinho = 0;
} else {
	$_SESSION['dados'] = array();
	$carrinho = 1;
}
?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Loja</a></li>
				  <li class="active">Carrinho de compra</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Preço</td>
							<td class="quantity">Quantidade</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					if($carrinho == 0){
						echo "	<tr> 
									<td> Vazio </td>
									<td> </td>
									<td> Vazio </td>
									<td> Vazio </td>
									<td> <a href=\"index.php\">Voltar as compras </a></td>
								<tr>
							";
					} 
					
					if($carrinho == 1){
						foreach($_SESSION['itens'] as $idLivro => $quantidade)
						{	
							$select = $conexaoPDO ->prepare("SELECT * FROM tbl_livros WHERE id_livro=?");
							$select->bindParam(1, $idLivro);
							$select->execute();
							$MostrarLivros = $select->fetchAll();
							$total = $quantidade * $MostrarLivros[0]["preco"];
					?>
						<tr>
							<td class="cart_product">
								<a href=""><img style="width: 100px; height: 50%;" src="adm/uploads/<?php echo $MostrarLivros[0]["image"]?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $MostrarLivros[0]["titulo"]?></a></h4>
								<p><?php echo $MostrarLivros[0]["autor"]?></p>
							</td>
							<td class="cart_price">
								<p>R$<?php echo $MostrarLivros[0]["preco"]?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="carrinho.php?add=carrinho&id=<?php echo $MostrarLivros[0]["id_livro"]?>"> + </a>
									<input class="cart_quantity_input" type="text" min=0 name="quantity" value="<?php echo $quantidade?>" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="carrinho.php?add=carrinho&id=<?php echo $MostrarLivros[0]["id_livro"]?>&adicionar=menos"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">R$<?php echo number_format($total, 2, '.', '')?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="php/remover.php?remover=carrinho&id=<?php echo $idLivro?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php 
									array_push(
										$_SESSION['dados'], 
										array(
											'id_livro' => $idLivro,
											'quantidade' => $quantidade,
											'preco' => $MostrarLivros[0]["preco"],
											'total' => $total
											)							
									); //array push 
							} //foreach
						} //if
					?>

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>O que você deseja fazer?</h3>
				<p>Se tiver algum desconto, informe no campo abaixo!</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
					<form method="post" action="php/verificaCupom.php">
						<ul class="user_info">
							<li class="single_field zip-field">
								<label>Cupom:</label>
								<input type="hidden" name="idLivro" value="<?php echo $idLivro?>">
								<input type="text" name="cupom">
							</li>
						</ul>
						<a class="btn btn-default update" type="submit">Verificar cupom</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<?php 						
							$sum = 0;
							foreach ($_SESSION['dados'] as $key => $value){
								$sum += $value['total'];
							}
						?>
						<ul>
							<li>Carrinho sub total<span>R$<?php print_r($totalt = $_SESSION['dados'][0]["total"])?></span></li>
							<li>Desconto<span>0</span></li>
							<li>Total <span>R$<?php echo $sum; ?></li>
						</ul>
							<a class="btn btn-default update" href="php/finalizarPedido.php">Finalizar</a>
							<a class="btn btn-default check_out" href="">Voltar as compras</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

<?php include 'footer.php';?>