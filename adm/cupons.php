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
				<a class="navbar-brand" href="#pablo">Área do Administrador</a>
			</div>
			<div class="collapse navbar-collapse justify-content-end" id="navigation">
			</div>
		</div>
	</nav>
	<!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">


	  </div> -->
	<div class ="content">
	<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
		<h4 class="card-title"> Cupom</h4>
		<div class="card-body">
            <h5><a href="cupons_cadastrar.php"><i class="nc-icon nc-tap-01"></i> Cadastrar cupom</a></h5>
			<?php  
				// Mostrar a mensagem na tela, pode colocar essa variavel em qualquer lugar 
				$msg->display();
			?>
        <div class="table-responsive text-center">
          <table class="table">
            <thead class=" text-primary">
              <th> Livro</th>
              <th> Autor</th>
              <th> Desconto </th>
              <th> Cupom </th>
              <th> Data expiração do cupom </th>
              <th> Ação </th>
            </thead>
            <tbody>
		
			  <?php 
			  	 $selectCupom = Cupom();
				 foreach($selectCupom as $dadosCupom) { //loop the array{ 
                  $id = $dadosCupom['id_cupom'];
                  $id_livro = $dadosCupom['id_livro'];
				
				//Pegar o titulo do livro
				$tituloLivro = TituloLivro($id_livro);
			  ?>
              <tr>
                <td><?php if($dadosCupom['id_livro'] != 0) echo $tituloLivro; else echo 'Não especificado para o desconto'?></td>
                <td><?php if($dadosCupom['autor'] != '') echo $dadosCupom['autor']; else echo 'Não especificado para o desconto'?></td>
                <td><?php echo $dadosCupom['desconto']." %"?></td>
                <td><?php echo $dadosCupom['cupom']?></td>
                <td><?php echo inverteData($dadosCupom['dataExpiracao'])?></td>
				<td style="cursor: hand;">
                    <a href="cupons_editar.php?id=<?php echo $id?>" class="botaoedit">
							<i class="fa fa-edit"aria-hidden="true"></i>
					</a>
					&nbsp;&nbsp;
					<a href="php/crud.php?action=deletarCupons&id=<?php echo $id?>" onclick="return confirm('Deseja realmente excluir?');" class="botaored"><i
							class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
			  <?php } ?>
			  
            </tbody>
		  </table>

        </div>
      </div>
      </div>

    </div>
  </div>

</div>

	</div>
 


<?php 
	include '../scripts.php'; //scripts
	include 'footer.php'; //footer
?>
</body>