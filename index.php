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
	
	</head>
	
	<body>
	
		<?php
		
			links();
			
			body_chart();
		
			filtros();
		
		?>
	
	</body>

</html>