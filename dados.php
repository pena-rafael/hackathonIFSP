<?php
include "funcoes.php";
$dados = dados($_POST);
if($dados==3) {
	echo "abaixo";
} else {
	echo $dados;
}
?>