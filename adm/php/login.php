<?php
	// Esta linha inclui o arquivo que realiza a conexão com o banco de dados.
	//
	include '../../php/conecta.php';

	// Verifica se um e-mail foi enviado pelo método POST
	//

	if(isset($_POST['email']))
	{
		// Se sim, irá obter os dados (e-mail e senha)
		//Preg replace para evitar php injection
		$email = preg_replace("/(from|FROM|select|SELECT|insert|INSERT|delete|DELETE|where|WHERE|drop table|DROP TABLE|show tables|SHOW TABLES|#|\*|--|\\\\)/i","", $_POST['email']);
		$senha = preg_replace("/(from|FROM|select|SELECT|insert|INSERT|delete|DELETE|where|WHERE|drop table|DROP TABLE|show tables|SHOW TABLES|#|\*|--|\\\\)/i","", $_POST['senha']);
        $senhamd5 = sha1(md5($senha));
		$usuario="";
	
			// Realiza um select na tabela de administradores para verificar se existe o admin
			// 
		    $sql="SELECT * FROM tbl_admin WHERE email='".$email."' AND password='".$senhamd5."'";
			$resultado=mysqli_query($con,$sql);
			// Define a variável resposta

			$resposta=0;
			while ($dados=mysqli_fetch_array($resultado))
			{
				$resposta=1;
                $usuario=$dados['nome'];
                $id=$dados['id'];
            }

			// Verifica se foi encontrado um administrador, se sim, grava o cookie com o nível correto
			if ($resposta==1)
			{
				setcookie ("login","adm",time()+3600, "/");
                setcookie ("usuario",$usuario,time()+3600, "/");
                setcookie ("id",$id,time()+3600, "/");
                header("Location: ../home.php");
                exit();
			}

			// Se a resposta permanece 0, não há login
			elseif ($resposta==0)
			{
                setcookie('msgcookie', 1, time()+2, "/");
				header("Location: ../index.php");
				exit;
			}
		
	}
	
	header ("Location: ../index.php");
?>
