<?php

class Base extends Banco {

	protected $tabela = NULL;

	protected $array_campo_valores = array();

	protected $campopk = NULl;

	public $valorpk = NULL;

	public $linhasAfetadas = -1;

	public $extrasSelect = NULL;
	
	public function addCampo($campo = NULL, $valor = NULL) {
		
		if (!is_null($campo) && !is_null($valor)) {
			
			$this->array_campo_valores[$campo] = $valor;
			
		}
		
	} 

	public function delCampo($campo = NULL) {
		
		if (!is_null($campo)) {
			
			unset($this->array_campo_valores[$campo]);
			
		}
		
	}

	public function setValor($campo = NULL, $valor = NULL) {
		
		if (!is_null($campo) && !is_null($valor) && array_key_exists($campo, $this->array_campo_valores)) {
			
			$this->array_campo_valores[$campo] = $valor;
			
		}
		
	} 

	public function getValor($campo = NULL) {
		
		if (!is_null($campo) && array_key_exists($campo, $this->array_campo_valores)) {
			
			return $this->array_campo_valores[$campo];
			
		}
		
	}
	
}