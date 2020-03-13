<?php

include 'header.php';

?>

<div class="main-panel">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
		<div class="container-fluid">
			<div class="navbar-wrapper">
				<div class="navbar-toggle">
					<button type="button" class="navbar-toggler">
						<span class="navbar-toggler-bar bar1"></span>
						<span class="navbar-toggler-bar bar2"></span>
						<span class="navbar-toggler-bar bar3"></span>
					</button>
				</div>
				<a class="navbar-brand" href="index.php">Área do Administrador</a>
			</div>
			<div class="collapse navbar-collapse justify-content-end" id="navigation">
			</div>
		</div>
	</nav>
	<!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">


      </div> -->
      <div class="content">
      	<div class="row">
      		<div class="col-md-12">
      			<div class="card card-user">
      				<div class="card-header">
      					<h5 class="card-title">Cadastrar livro</h5>
      				</div>
      				<div class="card-body">
      					<form method="post" action="php/crud.php?action=cadastrarLivro" enctype="multipart/form-data">
						 
      						<div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Título</label>
      									<input type="text" name="titulo" class="form-control" placeholder="Ex. O Programador Pragmático: De Aprendiz a Mestre" required>
      								</div>
      							</div>
      						</div>
      						<div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Autor(es)</label>
      									<input type="text" name="autor" class="form-control" placeholder="Ex. Andrew Hunt, David Thomas" required>
      								</div>
      							</div>
      						</div>
      						<div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Preço</label>
      									<input type="text" name="preco" class="form-control" placeholder="Ex. 125,50" required>
      								</div>
      							</div>
                              </div>
                              <div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Quantidade em Estoque</label>
      									<input type="number" min=0 name="qtdEstoque" id="qtdEstoque" class="form-control" placeholder="Ex. 50" required> 
      								</div>
      							</div>
      						</div>
      						</div><br><br>
							
      						<div class="row">
      							<div class="update ml-auto mr-auto">
      								<button type="submit" class="btn btn-primary btn-round">Cadastrar</button>
									<a href="livros.php" class="btn btn-primary btn-round">Voltar</a>
      							</div>
      						</div>
      					</form>
      				</div>
      			</div>
      		</div>
      	</div>
    
      
      <?php include 'footer.php' ?>