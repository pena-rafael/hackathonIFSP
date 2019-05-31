<?php

	include "conexao.php";
	include "funcoes.php";
	include "api_charts.php";

?>

<!DOCTYPE html>

<html>

	<head>
	
		<meta charset="UTF-8" />
		<title>Página Inicial</title>
		
		<?php bibliotecas(); ?>
		
		<?php head_chart(); ?>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	</head>
	
	<body>
	
		<?php
		
			links();
		
			filtros();
			
			body_chart();
		
		?>
	
	</body>

</html>