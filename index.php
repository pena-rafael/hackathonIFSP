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
			
		?>
	
		<div class="container">
	
			<?php
			
				filtros();
				
				body_chart();
			
			?>
			
			<div class="row">
				<div class="input-field col s12">
					
					<table class="striped">
						<thead>
							<tr>
								<th>Recurso</th>
								<th>Significado</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td>ACESSIBILIDADE</td>
								<td>Acessibilidade adequada a alunos com deficiência ou mobilidade reduzida</td>
							</tr>
							<tr>
								<td>SANITARIO_PNE</td>
								<td>Sanitário adequado a alunos com deficiência ou mobilidade reduzida</td>
							</tr>
							<tr>
								<td>SECRETARIA</td>
								<td>Secretaria para auxílio da escola</td>
							</tr>
							<tr>
								<td>REFEITORIO</td>
								<td>Refeitório dentro da escola</td>
							</tr>
							<tr>
								<td>LABORATORIO_CIENCIAS</td>
								<td>Laboratório de ciências dentro da escola para estudos práticos</td>
							</tr>
							<tr>
								<td>COZINHA</td>
								<td>Cozinha dentro da escola</td>
							</tr>
							<tr>
								<td>BIBLIOTECA</td>
								<td>Biblioteca dentro da escola com acesso à livros didáticos e literatura</td>
							</tr>
							<tr>
								<td>SANITARIO_DENTRO_PREDIO</td>
								<td>Sanitário localizado dentro do prédio</td>
							</tr> 	
							<tr>
								<td>SANITARIO_FORA_PREDIO</td>
								<td>Sanitário localizado fora do prédio</td>
							</tr>
							<tr>
								<td>SANITARIO_EI</td>
								<td>Sanitário adequado à Educação Infantil</td>
							</tr>
							<tr>
								<td>ALIMENTACAO</td>
								<td>Alimentação Escolar para os alunos (merenda)</td>
							</tr>
						</tbody>
					</table>
					
				</div>
			</div>
			
			
			
		</div>
	
	</body>

</html>