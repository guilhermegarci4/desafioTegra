<?php

include '../php/conecta.php'; //Conexão com o banco de dados
include 'php/cookieadm.php'; //Segurança por cookie para saber se realmente é o login
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
	  
<div class ="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
		<h4 class="card-title"> Início</h4>
		<div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Mudar as cores</i>
                  </div>
                  <p class="card-category">Mudar as cores</p>
                  <h3 class="card-title">$34,245</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">Mudar as cores</i> Mudar as cores
                  </div>
                </div>
              </div>
            </div>
		<div class="col-md-12">
			<div class="card">
				<!-- <img src="" alt="" style=""> -->
				<div class="container">
					<h4><b>John Doe</b></h4>
					<p>Architect & Engineer</p>
				</div>
			</div>
			<div class="card">
				<!-- <img src="img_avatar.png" alt="Avatar" style="width:100%"> -->
				<div class="container">
					<h4><b>John Doe</b></h4>
					<p>Architect & Engineer</p>
				</div>
			</div>
			<div class="card">
				<!-- <img src="img_avatar.png" alt="Avatar" style="width:100%"> -->
				<div class="container">
					<h4><b>John Doe</b></h4>
					<p>Architect & Engineer</p>
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