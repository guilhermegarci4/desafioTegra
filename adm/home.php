<?php

include '../php/conecta.php'; //Conexão com o banco de dados
include 'php/cookieadm.php'; //Segurança por cookie para saber se realmente é o login
include 'header.php'; //header

$sqlcount1 = mysqli_query($con, "SELECT count(*) as total1 from tbl_livros ");
$total1=mysqli_fetch_assoc($sqlcount1);

$sqlcount2 = mysqli_query($con, "SELECT count(*) as total2 from tbl_cupons ");
$total2=mysqli_fetch_assoc($sqlcount2);

$sqlcount3 = mysqli_query($con, "SELECT count(*) as total3 from tbl_pedidos ");
$total3=mysqli_fetch_assoc($sqlcount3);
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
	  
<div class ="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
		<h4 class="card-title"> Início</h4>
		<br>
		<div class="col-md-12">
			<div class="card">
				<!-- <img src="" alt="" style=""> -->
				<div class="container">
					<h4><b>Livros cadastrados:</b></h4>
					<p>Total: <?php echo $total1['total1']?></p>
				</div>
			</div>
			<div class="card">
				<!-- <img src="img_avatar.png" alt="Avatar" style="width:100%"> -->
				<div class="container">
					<h4><b>Cupom cadastrados</b></h4>
					<p>Total: <?php echo $total2['total2']?></p>
				</div>
			</div>
			<div class="card">
				<!-- <img src="img_avatar.png" alt="Avatar" style="width:100%"> -->
				<div class="container">
					<h4><b>Pedidos:</b></h4>
					<p>Totais: <?php echo $total3['total3']?></p>
				</div>
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