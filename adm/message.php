<?php 

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
if ($id == 0)
        $msg->error('Erro.');
          
if ($id == 1)
	$msg->success('Cadastrado com sucesso.'); 
	
if ($id == 2)
	$msg->success('Editado com sucesso.'); 

if ($id == 3)
	$msg->error('Excluido com sucesso.'); 

}

?>