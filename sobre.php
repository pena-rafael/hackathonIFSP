<?php

	include "funcoes.php";

?>

<!DOCTYPE html>

<html>

	<head>
	
		<meta charset="UTF-8" />
		<title>O que é</title>
		
		<?php bibliotecas(); ?>
	
	</head>
	
	<body>
	
		<?php links(); ?>
		
		<style>
			h1{
				text-align: center;
			}
		</style>
		
		<div class="container" style = "margin: 0 20px;">
		
			<p><h1><i>O que é o nosso projeto?</i></h1></p>
			
			<p>
			
				Após análisar os diversos conjuntos de dados disponíveis no <a href="http://dados.gov.br/dataset" target="_blank" >PORTAL BRASILEIRO DE DADOS ABERTOS</a>, optamos pelo tema <i>Educação</i>. Para desenvolver 
				o projeto, selecionamos as bases de dados: <a href="http://dados.gov.br/dataset/instituicoes-de-ensino-basico" target="_blank">Lista de Instituições de Ensino Básico</a> e
				<a href="http://dados.gov.br/dataset/taxas-de-rendimento-escolar-na-educacao-basica" target="_blank">Taxas de Rendimento Escolar na Educação Básica</a>. 
			</p>
			
			<p>
				Nossa aplicação analisa os dados a fim de os relacionar e exibir em gráficos. Com isso, pode-se apontar relações entre os recursos das instituições
				(como existência de sanitários, livros didáticos e quantidade de salas por intituição) e as taxas de aprovação (em porcentagem) dos alunos de cada escola durante o ano letivo.
			</p>
		
		<div>
	
	</body>

</html>