<?php
include "Formatador.class.php";

class Validador 
{
	private $nivel;
	
	public function __construct($index = 0){
		session_start();
	}
	
	//VALIDA CPF
	public function validaCPF($cpf1) {
		$format = new Formatador();
		// Extrai somente os números
		$cpf1 = $format->formataSomenteNumeros($cpf1);
		 
		// Verifica se foi informado todos os digitos corretamente
		if (strlen($cpf1) != 11) {
			return false;
		}
		// Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
		if (preg_match('/(\d)\1{10}/', $cpf1)) {
			return false;
		}
		// Faz o calculo para validar o CPF
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf1{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf1{$c} != $d) {
				return false;
			}
		}
		return $cpf1;
	}

}