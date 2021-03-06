<?php

include 'header.php';

if(isset($_GET['id']) ? $id = $_GET['id'] : $id = ''); 

if($id != '')
{
	$selectLivros = LivrosEditar($id);; //get the result array
	foreach($selectLivros as $dadosLivros) { //loop the array
		$titulo = $dadosLivros['titulo'];
        $autor = $dadosLivros['autor'];
        $preco = $dadosLivros['preco'];
		$qtdEstoque = $dadosLivros['qtdEstoque'];
		$image = $dadosLivros['image'];
	}
}

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
      					<h5 class="card-title">Editar livro</h5>
      				</div>
      				<div class="card-body">
      					<form method="post" action="php/crud.php?action=editarLivro" enctype="multipart/form-data">
						  <?php  
								// Mostrar a mensagem na tela, pode colocar essa variavel em qualquer lugar 
                                $msg->display();
							?>
                            <input type="hidden" name="id" value="<?php echo $id ?>">
      						<div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Título</label>
      									<input type="text" name="titulo" class="form-control" placeholder="Ex. O Programador Pragmático: De Aprendiz a Mestre" value="<?php echo $titulo?>">
      								</div>
      							</div>
      						</div>
      						<div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Autor</label>
      									<input type="text" name="autor" class="form-control" placeholder="Ex. Andrew Hunt, David Thomas" value="<?php echo $autor?>">
      								</div>
      							</div>
      						</div>
      						<div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Preço</label>
      									<input type="text" name="preco" class="form-control" placeholder="Ex. 125,50" value="<?php echo $preco?>">
      								</div>
      							</div>
                              </div>
                              <div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Quantidade em Estoque</label>
      									<input type="number" min=0 name="qtdEstoque" id="qtdEstoque" class="form-control" placeholder="Ex. 50" value="<?php echo $qtdEstoque?>"> 
      								</div>
      							</div>
      						</div>
							  <div class="row">
      							<div class="col-md-6 mx-auto">
									  <label for='selecao-arquivo'>Selecionar um arquivo &#187;</label>
										<input id='selecao-arquivo' name="arquivo" type='file'>	
										<img style="width:80px;" src="uploads/<?php echo $image?>" alt="Foto livro">
      							</div>
      						</div>
      						</div><br><br>
							
      						<div class="row">
      							<div class="update ml-auto mr-auto">
      								<button type="submit" class="btn btn-primary btn-round">Editar</button>
                                    <a href="livros.php" class="btn btn-primary btn-round">Voltar</a>
      							</div>
      						</div>
      					</form>
      				</div>
      			</div>
      		</div>
      	</div>
    
      
      <?php include 'footer.php' ?>