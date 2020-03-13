<?php
if (isset($_COOKIE['login']))
{
	if (isset($_COOKIE['usuario']))
		{
			$login=$_COOKIE['login'];
			$usuario=$_COOKIE['usuario'];
			$id=$_COOKIE['id'];
		}
	else
	{
		$login="user";
		$usuario="visitante";	
	}
}
else
{
	$login="user";
	$usuario="visitante";
}

if ($login=="adm")
{

header ("Location: home.php");

}
//Requer a class FlashMessages para que mostre as mensagens de retorno para o usuário
require '../php/FlashMessages.php';

// Session é requirido
if (!session_id()) @session_start();
 
// Instanciando a classe
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

// Verificando se existe id via GET
if(isset($_COOKIE['msgcookie']))
{
	$id = $_COOKIE['msgcookie'];

// Se ID for 1 mostra menssagem de erro de CPF cadastrado
if ($id == 1)
	$msg->error('Email ou Senha inválido.');  

if ($id == 2)
	$msg->success('Faça o login para continuar');  

if ($id == 3)
	$msg->success('Nova senha enviada para o email informado'); 

if ($id == 4)
	$msg->error('Não foi possivel mandar o email, tente novamente'); 

if ($id == 5)
	$msg->error('Email informado não existe no nosso banco de dados'); 
}
?>


<!DOCTYPE html>
<head>
	<title>Login • Prêmio Inovação de Sorocaba</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1">
	<meta name="robots" content="index, follow">
	<meta name="description" content=""/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="../img/fav/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/fav/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/fav/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../img/fav/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="../img/fav/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="../img/fav/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="../img/fav/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="../img/fav/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="../img/fav/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="../img/fav/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="../img/fav/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="../img/fav/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="../img/fav/favicon-128.png" sizes="128x128" />
	<meta name="application-name" content="&nbsp;"/>
	<meta name="msapplication-TileColor" content="#FFFFFF" />
	<meta name="msapplication-TileImage" content="../img/fav/mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="../img/fav/mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="../img/fav/mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="../img/fav/mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="../img/fav/mstile-310x310.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/tegra.png" alt="Logo da empresa Tegra" draggable="false" onmousedown="return false">
				</div>
				<form action="php/login.php" class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Área do administrador
					</span>
					<?php  
						// Mostrar a mensagem na tela, pode colocar essa variavel em qualquer lugar 
						$msg->display();
					?>
					<div class="wrap-input100 validate-input" data-validate = "Insira um email válido.">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Insira a sua senha.">
						<input class="input100" type="password" name="senha" placeholder="Senha">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">				
						<input type="submit" name="Enviar" value="Acessar" class="login100-form-btn">						
					</div>

					<div class="text-center p-t-136">
					</div>
				</form>
			</div>
		</div>
	</div>
	
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Esqueceu a senha?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../php/esqueceuSenha.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="email" name="email" class="form-control" id="recipient-name">
          </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			<input type="submit" name="Enviar" value="Enviar" class="btn btn-primary">				
	      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>

	
	<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>