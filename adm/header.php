<?php

include 'php/cookieadm.php'; // sistema de segurança via cookie
include 'php/conecta.php'; //conexão com o banco de dados
include 'message.php'; //message de sucesso, error

include 'php/utils.php'; //utilidades ao sistemas, comoo funcões;

?>
<!DOCTYPE html>

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		Área do Administrador • Desafio Tegra - Loja de Livros
	</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<meta name="application-name" content="&nbsp;"/>
	<meta name="msapplication-TileColor" content="#FFFFFF" />
	<meta name="msapplication-TileImage" content="../img/fav/mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="../img/fav/mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="../img/fav/mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="../img/fav/mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="../img/fav/mstile-310x310.png" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
	<link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
	<div class="wrapper ">
		<div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
    	<a href="/" class="simple-text logo-normal">
    		<img src="images/tegra.png">
    	</a>
    </div>
    <div class="sidebar-wrapper">
    	<ul class="nav">

			<?php if($_SERVER["REQUEST_URI"] == '/trabalheNaTegra/adm/home.php')
    				echo "<li class=\"active\">";
			 else 
			 	echo "<li class=\"\">";
			 ?>
    			<a href="home.php">
    				<i class="nc-icon nc-single-02"></i>
    				<p>Início</p>
    			</a>
			</li>
			
			<?php if($_SERVER["REQUEST_URI"] === '/trabalheNaTegra/adm/livros.php' ||
						 $_SERVER["REQUEST_URI"] === '/trabalheNaTegra/adm/livros_cadastrar.php' ||
						 	$_SERVER["REQUEST_URI"] == '/trabalheNaTegra/adm/livros_editar.php'  )
				echo "<li class=\"active\">";
			else 
				echo "<li class=\"\">";
			?>

    			<a href="livros.php">
    				<i class="nc-icon nc-single-copy-04"></i>
    				<p>Livros</p>
    			</a>
			</li>
			
			<?php if($_SERVER["REQUEST_URI"] === '/trabalheNaTegra/adm/cupons.php' || 
						$_SERVER["REQUEST_URI"] === '/trabalheNaTegra/adm/cupons_cadastrar.php' ||
							$_SERVER["REQUEST_URI"] === '/trabalheNaTegra/adm/cupons_editar.php')
				echo "<li class=\"active\">";
			else 
				echo "<li class=\"\">";
			?>

    			<a href="cupons.php">
    				<i class="nc-icon nc-tag-content"></i>
    				<p>Cupom</p>
    			</a>
    		</li>

    		<li>
    			<a href="logout.php">
    				<i class="nc-icon nc-button-power"></i>
    				<p>Sair</p>
    			</a>
    		</li>
    	</ul>
    </div>
</div>