<?php

if(isset($_COOKIE['login']))
{
	$id=$_COOKIE['id'];
}

include 'header.php'; //error

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
		<h4 class="card-title"> Livros</h4>
		<div class="card-body">
            <h5><a href="livros_cadastrar.php"><i class="nc-icon nc-tap-01"></i> Cadastrar livros</a></h5>
			<?php  
				// Mostrar a mensagem na tela, pode colocar essa variavel em qualquer lugar 
				$msg->display();
			?>
        <div class="table-responsive text-center">
          <table class="table">
            <thead class=" text-primary">
              <th> Título </th>
              <th> Autor </th>
              <th> Preço </th>
              <th> Quantidade em Estoque </th>
              <th> Ação </th>
            </thead>
            <tbody>
		
			  <?php 
				$selectLivros = Livros(); //Retorna todos os livros
				foreach($selectLivros as $dadosLivros) { //loop the array{ 
				  $id = $dadosLivros['id_livro'];
			  ?>
              <tr>
                <td><?php echo $dadosLivros['titulo']?></td>
                <td><?php echo $dadosLivros['autor']?></td>
                <td>R$<?php echo $dadosLivros['preco']?></td>
                <td><?php echo $dadosLivros['qtdEstoque']?></td>
				<td style="cursor: hand;">
                    <a href="livros_editar.php?id=<?php echo $id?>" class="botaoedit">
							<i class="fa fa-edit"aria-hidden="true"></i>
					</a>
					&nbsp;&nbsp;
					<a href="php/crud.php?action=deletarLivros&id=<?php echo $id?>" onclick="return confirm('Deseja realmente excluir?');" class="botaored"><i
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
 


<?php include '../scripts.php' ?>
<?php include 'footer.php' ?>
</body>