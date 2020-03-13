<?php
    include 'header.php'; //header
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
      					<h5 class="card-title">Cadastrar cupom</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="php/crud.php?action=cadastrarCupom" enctype="multipart/form-data">
                        <br>
                        <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="form-group">
                                <h6 align=left>*Selecione livro ou o autor para aplicar o desconto</h5>
                                    <select name="livroOuAutor" id="livroOuAutor" class="form-control" required>
                                        <option value=""></option>
                                        <option value="1">Livro</option>
                                        <option value="2">Autor</option>
                                    </select>    								
                            </div>
                        </div>
                        </div>
                        <div class="row" id="livros">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Livro</label>
                                          <select name="livro" id="livro" class="form-control">                
                                            <option value="">--Selecione o livro --</option>
                                            <?php
												$query = SelectLivroOption();
												foreach($query as $fetch) { //loop the array
											?>
                                                <option value="<?php echo $fetch['id_livro']?>"><?php echo $fetch['titulo']?></option>";
                                            <?php } ?>                                                
                                            </select>      								
                                    </div>
      							</div>
                        </div>
                            <div class="row" id="autor">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Autor</label>
                                          <select name="autor" id="autor" class="form-control">                
                                            <option value="">--Selecione o autor(es) --</option>
                                            <?php
                                                $query = SelectAutorOption();
												foreach($query as $fetch) { //loop the array
											?>
													<option value="<?php echo $fetch['autor']?>"><?php echo $fetch['autor']?></option>";
                                            <?php } ?>
                                                
                                            </select>      								
                                    </div>
      							</div>
      						</div>
      						<div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Desconto em %</label>
      									<input type="number" min=0 name="desconto" class="form-control" placeholder="10 %" required>
      								</div>
      							</div>
      						</div>
      						<div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Cupom</label>
      									<input type="text" name="cupom" class="form-control" placeholder="Ex. TrabalheNaTegra" required>
      								</div>
      							</div>
                              </div>
                              <div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Data de expiração do cupom</label>
      									<input type="date" name="dataExpCup" id="qtdEstoque" class="form-control" placeholder="Ex." required> 
      								</div>
      							</div>
      						</div>
      						</div><br><br>
							
      						<div class="row">
      							<div class="update ml-auto mr-auto">
      								<button type="submit" class="btn btn-primary btn-round">Cadastrar</button>
									<a href="cupons.php" class="btn btn-primary btn-round">Voltar</a>
      							</div>
      						</div>
      					</form>
      				</div>
      			</div>
      		</div>
      	</div>
    
        <?php include 'footer.php' ?>
      <script>
        $(function() {
            $('#livroOuAutor').change(function() {
                if ($('#livroOuAutor').val() == 1) {
                    $('#livros').show();
                    $('#autor').hide();
                } else {
                    $('#livros').hide();
                    $('#autor').show();
                }
            });
            $('#livroOuAutor').change();
        });
    </script>