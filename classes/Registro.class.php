<?php

class Registro extends Base {

	function __construct( $array = array() ) {

		Banco::instancia();
		$this->tabela = "registro";
		$this->campopk = "id";
		if (sizeof($array) <= 0) {

			$this->array_campo_valores = array(

			"nome"             => NULL,
			"numero_registro"  => NULL,
			"data_nascimento"  => NULL,
			"endereco"         => NULL,
			"descricao_titulo" => NULL,
			"valor"            => NULL,
			"data_vencimento"  => NULL,
			"updated"          => NULL,

			);

		}

	}

}