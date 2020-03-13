<?php
	unset($_COOKIE['login']);
	unset($_COOKIE['usuario']);
	unset($_COOKIE['id']);
	setcookie(session_name(), "", time() - 1, "/");
	setcookie ("login","user",time()-7000000, "/");
	setcookie ("usuario","visitante",time()-7000000, "/");
	
	header ("Location:index.php");
?>