<?php 
	include 'header.php'; 
	include 'adm/php/utils.php';

	$id = $_GET['id'];
	$selectLivros = LivrosEditar($id); //Retorna todos os livros
	foreach($selectLivros as $dadosLivros) { //loop the array 
		$foto 		= $dadosLivros['image'];
		$titulo 	= $dadosLivros['titulo'];
		$autor 		= $dadosLivros['autor'];
		$preco 		= $dadosLivros['preco'];
		$qtdEstoque = $dadosLivros['qtdEstoque'];
	}
?>


	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="adm/uploads/<?php echo $foto?>" alt="" />
								<h3>ZOOM</h3>
							</div>
							<br><br>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $titulo?></h2>
								<p><?php echo $autor?></p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>R$<?php echo $preco?></span>
									<label></label>
									<label></label>
									<?php if($qtdEstoque>0){ ?>
									<a href="carrinho.php?add=carrinho&id=<?php echo $id?>" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Carrinho
									</a>
									<?php } else {?>
										<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-lock"></i>
										Indisponível
									</button>
									<?php } ?>
								</span>
								<p><b>Disponibilidade:</b> <?php if($qtdEstoque>0) echo 'Em estoque'; else echo 'Indisponível'?></p>
								<p><b>Marca:</b> Tegra - Loja de livros</p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
				
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Livros recomendados</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
								<?php 
									$selectLivros = LivrosRecomendados(); //Retorna todos os livros
									foreach($selectLivros as $dadosLivros) { //loop the array 
								?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
												<img style="width:40%" src="adm/uploads/<?php echo $dadosLivros['image']?>" alt="" />
													<h2>R$<?php echo $dadosLivros['preco']?></h2>
													<p><?php echo $dadosLivros['titulo']."<br>".$dadosLivros['autor']?></p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar ao carrinho</a>
												</div>
												
											</div>
										</div>
									</div>
								<?php } ?>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
<?php include 'footer.php'; ?>