<?php

	function links(){
		
		?>
		
		<nav>
		
			<ul>
			
				<li><a href="index.php">Página inicial</a></li>
				<li><a href="sobre.php">O que é?</a></li>
			
			</ul>
		
		</nav>
		
		<?php
		
	}
	
	function filtros(){
	
		?>
		
		
		
		<?php
	
	}
	
	function dadosDif() {
		$dadosDif = [];
		
		$dadosDif[0] = 'AEE';
		$dadosDif[1] = 'NUM_FUNCIONARIOS';
		$dadosDif[2] = 'NUM_SALAS_EXISTENTES';
		$dadosDif[3] = 'AGUA_FILTRADA';
		$dadosDif[4] = 'NUM_COMPUTADORES';
		
		$resulDif = [];
		
		/* AEE */
		$data1 = "SELECT count(*) as 'cont' FROM escolas WHERE Cod_Municipio = ".$filtros['municipio']." AND ".$dadosDif[0]." LIKE '%oferece%';";
		$data2 = "SELECT count(*) as 'cont' FROM escolas WHERE Cod_Municipio = ".$filtros['municipio']." AND ".$dadosDif[0]." LIKE '%exclusivamente%';";
		$data3 = "SELECT count(*) as 'cont' FROM escolas WHERE Cod_Municipio = ".$filtros['municipio']." AND ".$dadosDif[0]." = '';";
	
		$resultado1 = mysqli_query($link, $data1);
		$resultado2 = mysqli_query($link, $data2);
		$resultado3 = mysqli_query($link, $data3);
		
		$resul1 = mysqli_fetch_array($resultado1)['cont'];
		$resul2 = mysqli_fetch_array($resultado2)['cont'];
		$resul3 = mysqli_fetch_array($resultado3)['cont'];
		
		/* NUM_FUNCIONARIOS */
		$data = "SELECT avg(num_funcionarios) as 'media' FROM escolas WHERE Cod_Municipio = ".$filtros['municipio']."";
	
		$resultado = mysqli_query($link, $data);
		
		$resul = mysqli_fetch_array($resultado)['media'];
		
		
		/* NUM_SALAS_EXISTENTES */
		$data = "SELECT avg(num_salas_existentes) as 'media' FROM escolas WHERE Cod_Municipio = ".$filtros['municipio']."";
	
		$resultado = mysqli_query($link, $data);
		
		$resul = mysqli_fetch_array($resultado)['media'];
		
		
		/* AGUA_FILTRADA */
		$data1 = "SELECT count(*) as 'cont' FROM escolas WHERE Cod_Municipio = ".$filtros['municipio']." AND ".$dadosDif[3]." LIKE 'Filtrada';";
		$data2 = "SELECT count(*) as 'cont' FROM escolas WHERE Cod_Municipio = ".$filtros['municipio']." AND ".$dadosDif[3]." LIKE '%Não%';";
		$data3 = "SELECT count(*) as 'cont' FROM escolas WHERE Cod_Municipio = ".$filtros['municipio']." AND ".$dadosDif[3]." = '';";
	
		$resultado1 = mysqli_query($link, $data1);
		$resultado2 = mysqli_query($link, $data2);
		$resultado3 = mysqli_query($link, $data3);
		
		$resul1 = mysqli_fetch_array($resultado1)['cont'];
		$resul2 = mysqli_fetch_array($resultado2)['cont'];
		$resul3 = mysqli_fetch_array($resultado3)['cont'];
		
		
		/* NUM_COMPUTADORES */
		$data = "SELECT avg(num_computadores) as 'media' FROM escolas WHERE Cod_Municipio = 3500105";
	
		$resultado = mysqli_query($link, $data);
		
		$resul = mysqli_fetch_array($resultado)['media'];
	}
	
	function dados($filtros) {
		include "conexao.php";
		
		
		$dados = [];
		$dados[0] = 'ACESSIBILIDADE';
		$dados[1] = 'SANITARIO_PNE';
		$dados[3] = 'SECRETARIA';
		$dados[4] = 'REFEITORIO';
		$dados[5] = 'LABORATORIO_CIENCIAS';
		$dados[6] = 'COZINHA';
		$dados[7] = 'BIBLIOTECA';
		$dados[8] = 'SANITARIO_DENTRO_PREDIO';
		$dados[9] = 'SANITARIO_FORA_PREDIO';
		$dados[10] = 'SANITARIO_EI';
		$dados[11] = 'ALIMENTACAO';
		
		$resul = [];
		
		$cidades = '(';
		
		foreach($filtros['municipio'] as $i=>$v) {
			if($i==0) {
				$cidades.="$v";
			} else {
				$cidades.=",$v";
			}
		}
		
		$cidades.=')';
		
		foreach($dados as $i=>$v) {
			$dataT = "SELECT count(*) as 'total' FROM escolas WHERE Cod_Municipio IN ".$cidades;
			$dataS = "SELECT count(*) as 'cont' FROM escolas WHERE Cod_Municipio IN ".$cidades." AND ".$v." LIKE '%S%';";
		
			$resultadoT = mysqli_query($link, $dataT);
			$resultadoS = mysqli_query($link, $dataS);
			
			$porcentagem = (mysqli_fetch_array($resultadoS)['cont']*100)/mysqli_fetch_array($resultadoT)['total'];
			
			$resul[$v] = $porcentagem;
		}
		
		$data = "SELECT * FROM tx_rendimento WHERE Cod_Municipio IN ".$cidades;
		
		$resultado = mysqli_query($link, $data);
		$aprovados = mysqli_fetch_array($resultado)['ap_ef']; // $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
		$resul["Aprovados"] = $aprovados;
		
		
		$json = json_encode($resul);
		
		return $json;
	}

?>