<?php

function formatarDataBR($d) {
    return implode('/', array_reverse(explode('-', $d)));
}

function formatarDataEN($d) {
    return implode('-', array_reverse(explode('/', $d)));
}

function formatarCPFCNPJ($d) {
    return preg_replace('/[^0-9]/i', '', $d);
}

function formatarCPFCNPJCaracter($doc) {

	$doc = preg_replace("/[^0-9]/", "", $doc);
	$qtd = strlen($doc);

	if($qtd >= 11) {

		if($qtd === 11 ) {

			$docFormatado = substr($doc, 0, 3) . '.' .
							substr($doc, 3, 3) . '.' .
							substr($doc, 6, 3) . '.' .
							substr($doc, 9, 2);
		} else {
			$docFormatado = substr($doc, 0, 2) . '.' .
							substr($doc, 2, 3) . '.' .
							substr($doc, 5, 3) . '/' .
							substr($doc, 8, 4) . '-' .
							substr($doc, -2);
		}

		return $docFormatado;

	} else {
		return 'Documento invalido';
	}
}

function formatarMoedaBanco($d) {
    return preg_replace('/[^0-9]/i', '', $d);
}

function formatarMoedaReal($d) {
    return number_format($d/100,2,",",".");
}