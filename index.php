	<?php 

		include 'header.php'; 
		include 'adm/php/utils.php';
	
	?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Livros</h2>
						<?php 
							$selectLivros = Livros(); //Retorna todos os livros
							foreach($selectLivros as $dadosLivros) { //loop the array 
						?> 
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<br>
											<img style="width: 45%; height: 15em" src="adm/uploads/<?php echo $dadosLivros['image']?>" alt="" />
											<h2>R$<?php echo $dadosLivros['preco']?></h2>
											<p><?php echo substr( $dadosLivros['titulo'], 0, 49)."...<br>".$dadosLivros['autor']?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Comprar</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>R$<?php echo $dadosLivros['preco']?></h2>
												<p><?php echo $dadosLivros['titulo']."<br>".$dadosLivros['autor']?></p>
												<a href="livros-detalhes.php?id=<?php echo $dadosLivros['id_livro']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Comprar</a>
											</div>
										</div>
								</div>
							</div>
						</div>
						<?php } ?>		
					</div><!--features_items-->
					
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
													<a href="livros-detalhes.php?id=<?php echo $dadosLivros['id_livro']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Comprar</a>
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

	<?php include 'footer.php '; //footer?>