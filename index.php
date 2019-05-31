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
		
		<?php head_chart(); ?>
	
	</head>
	
	<body>
	
		<?php
		
			links();
			
			body_chart();
			
			$dadosDif = [];
			
			$dadosDif[0] = 'AEE';
			$dadosDif[1] = 'NUM_FUNCIONARIOS';
			$dadosDif[2] = 'NUM_SALAS_EXISTENTES';
			$dadosDif[3] = 'AGUA_FILTRADA';
			$dadosDif[4] = 'NUM_COMPUTADORES';
			
			$resulDif = [];
			
			/* AEE */
			$data1 = "SELECT count(*) as 'cont' FROM escolas WHERE Cod_Municipio = 3500105 AND ".$dadosDif[0]." LIKE '%oferece%';";
			$data2 = "SELECT count(*) as 'cont' FROM escolas WHERE Cod_Municipio = 3500105 AND ".$dadosDif[0]." LIKE '%exclusivamente%';";
			$data3 = "SELECT count(*) as 'cont' FROM escolas WHERE Cod_Municipio = 3500105 AND ".$dadosDif[0]." = '';";
		
			$resultado1 = mysqli_query($link, $data1);
			$resultado2 = mysqli_query($link, $data2);
			$resultado3 = mysqli_query($link, $data3);
			
			$resul1 = mysqli_fetch_array($resultado1)['cont'];
			$resul2 = mysqli_fetch_array($resultado2)['cont'];
			$resul3 = mysqli_fetch_array($resultado3)['cont'];
			
			var_dump($resul1);
			var_dump($resul2);
			var_dump($resul3);
			
			/* NUM_FUNCIONARIOS */
			
			
			
			/* NUM_SALAS_EXISTENTES */
			
			
			
			/* AGUA_FILTRADA */
			
			
			
			/* NUM_COMPUTADORES */
			
			$dados = [];
			$dados[0] = 'ACESSIBILIDADE';
			$dados[1] = 'SANITARIO_PNE';
			$dados[2] = 'MATERIAL_ESP_NAO_UTILIZA';
			$dados[3] = 'SECRETARIA';
			$dados[4] = 'REFEITORIO';
			$dados[5] = 'LABORATORIO_CIENCIAS';
			$dados[6] = 'COZINHA';
			$dados[7] = 'BIBLIOTECA';
			$dados[8] = 'SANITARIO_DENTRO_PREDIO';
			$dados[9] = 'SANITARIO_FORA_PREDIO';
			$dados[10] = 'SANITARIO_EI';
			$dados[13] = 'ALIMENTACAO';
			$dados[15] = 'AGUA_REDE_PUBLICA';
			$dados[16] = 'ENERGIA_REDE_PUBLICA';
			$dados[17] = 'ESGOTO_REDE_PUBLICA';
			$dados[18] = 'LIXO_COLETA_PERIODICA';
			$dados[19] = 'COMPUTADORES';
			$dados[20] = 'EQUIP_IMPRESSORA';
			
			$resulS = [];
			$resulN = [];
			
			foreach($dados as $i=>$v) {
				$dataS = "SELECT count(*) as 'cont' FROM escolas WHERE Cod_Municipio = 3500105 AND ".$v." LIKE '%S%';";
				$dataN = "SELECT count(*) as 'cont' FROM escolas WHERE Cod_Municipio = 3500105 AND (".$v." LIKE '%N%' OR ".$v." = '');";
			
				$resultadoS = mysqli_query($link, $dataS);
				$resultadoN = mysqli_query($link, $dataN);
				
				$resulS[$v] = mysqli_fetch_array($resultadoS)['cont'];
				$resulN[$v] = mysqli_fetch_array($resultadoN)['cont'];
			}
			
			var_dump($resulS);
			var_dump($resulN);
		
			filtros();
		
		?>
	
	</body>

</html>