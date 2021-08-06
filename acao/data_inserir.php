<?php

require_once '../classes/autoload.php';
require_once '../functions.php';

$registro = new Registro();


$registro->setValor("nome",             $_POST["nome"] );
$registro->setValor("numero_registro",  formatarCPFCNPJ( $_POST["numero_registro"] ));
$registro->setValor("data_nascimento",  formatarDataEN( $_POST["data_nascimento"] ));
$registro->setValor("endereco",         $_POST["endereco"]);
$registro->setValor("descricao_titulo", $_POST["descricao_titulo"]);
$registro->setValor("valor",            formatarMoedaBanco( $_POST["valor"] ));
$registro->setValor("data_vencimento" , formatarDataEN( $_POST["data_vencimento"] ));

$registro->insert();


