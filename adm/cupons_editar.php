<?php
    include 'header.php'; //header

    if(isset($_GET['id']) ? $id = $_GET['id'] : $id = ''); 

    if($id != '')
    {
        $sqlCupom = CupomEditar($id);
		foreach($sqlCupom as $dadosCupom) { //loop the array{
            $id_livro = $dadosCupom['id_livro'];
            $autor = $dadosCupom['autor'];
            $desconto = $dadosCupom['desconto'];
            $cupom = $dadosCupom['cupom'];
            $dataExpiracao = $dadosCupom['dataExpiracao'];
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
      					<h5 class="card-title">Editar cupom</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="php/crud.php?action=editarCupom" enctype="multipart/form-data">
                        <?php  
                            // Mostrar a mensagem na tela, pode colocar essa variavel em qualquer lugar 
                            $msg->display();
                        ?>
                        <br>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <?php if($id_livro != 0 || $id_livro != '0') {?>
                        <div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Livro</label>


                                          <select name="livro" id="livro" class="form-control">                
                                            <option value="">--Selecione o livro --</option>
											<?php
												$query = SelectLivroOption();
												foreach($query as $fetch) { //loop the array
											?>
                                                <option value="<?php echo $fetch['id_livro']?>" <?php echo $id_livro == $fetch['id_livro'] ? 'selected' : '';?>><?php echo $fetch['titulo']?></option>";
                                            <?php } ?>
                                                
                                            </select>      								
                                    </div>
      							</div>
                        </div>
                        <?php } if($autor != '' || $autor != '') {?>
                            <div class="row" id="autor">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Autor</label>
                                          <select name="autor" id="autor" class="form-control">                
                                            <option value="">--Selecione o autor(es) --</option>
                                            <?php
                                                $query = SelectAutorOption();
												foreach($query as $fetch) { 
											?>
                                                <option value="<?php echo $fetch['autor']?>" <?php echo $autor == $fetch['autor'] ? 'selected' : '';?>><?php echo $fetch['autor']?></option>";
                                            <?php } ?>
                                                
                                            </select>      								
                                    </div>
      							</div>
      						</div>
                        <?php }?>
      						<div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Desconto em %</label>
      									<input type="number" min=0 name="desconto" class="form-control" placeholder="10 %" value="<?php echo $desconto?>">
      								</div>
      							</div>
      						</div>
      						<div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Cupom</label>
      									<input type="text" name="cupom" class="form-control" placeholder="Ex. TrabalheNaTegra" value="<?php echo $cupom?>">
      								</div>
      							</div>
                              </div>
                              <div class="row">
      							<div class="col-md-6 mx-auto">
      								<div class="form-group">
      									<label class="pl-1">Data de expiração do cupom</label>
      									<input type="date" name="dataExpCup" id="qtdEstoque" class="form-control" placeholder="Ex." value="<?php echo $dataExpiracao?>"> 
      								</div>
      							</div>
      						</div>
      						</div><br><br>
							
      						<div class="row">
      							<div class="update ml-auto mr-auto">
      								<button type="submit" class="btn btn-primary btn-round">Editar</button>
									<a href="cupons.php" class="btn btn-primary btn-round">Voltar</a>
      							</div>
      						</div>
      					</form>
      				</div>
      			</div>
      		</div>
      	</div>
    
        <?php include 'footer.php' ?>