<?php
// Verifica o nível de acesso e o usuário logado 
//

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
	if ($login!="adm")
	{

		header ("Location:index.php");
		
	}
	

?>