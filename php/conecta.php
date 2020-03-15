<?php
// Programa para a realização da conexão com o banco de dados mySQL
// Professor Renato Luiz Cardoso
// Set/2018
// Conexão com o banco de dados

// Dados necessários para conexão
// Servidor, usuário, senha e nome do banco de dados
  
$servidor="localhost";  	// Endereço do servidor mySQL
$udb="root";				// Usuário do banco de dados (fornecido pelo provedor)
$senha="";				// Senha de acesso ao mySQL
$bdados="trabalhenategra";		// Nome do banco de dados que se deseja acessar

//Conexão PDO para fazer a logica do carrinho
$conexaoPDO = new PDO('mysql:host=localhost;dbname=trabalhenategra',"root","");
/*
  Define o número de segundos durante os quais é permitido a execução do script. 
  Se este limite é atingido, o script retorna um erro fatal.
  O limite padrão é de 30 segundos, ou se existir o valor definido o valor max_execution_time definido no php.ini. 
  Se seconds for definido como zero, não é imposto nenhum limite. 
  Quando utilizada, set_time_limit() reinicia o contador do limite do tempo a partir de zero. 
  Em outras palavras, se o limite for 30 segundos, e 25 segundos depois 
  do inicio da execução do script for utilizada a função com por exemplo, set_time_limit(20), 
  o script será executado por 45 segundos até acabar o tempo.
  
*/
  
set_time_limit(60);
  
// Criando a conexão com a base de dados
$con = mysqli_connect($servidor,$udb,$senha,$bdados);

// Define a acentuação/tabela de caracteres na origem dos dados
mysqli_query($con,"SET NAMES utf8");


// Caso ocorra um erro, emite uma mensagem de falha
if (mysqli_connect_errno()) {
  echo "Falha na conexão com o mySQL: " . mysqli_connect_error();
}
    
// FIM

//echo "<b>ok</b>";
?>