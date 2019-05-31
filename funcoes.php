<?php

	function links(){
		
		?>
		
		<nav class="blue">
		
			<ul>
			
				<li><a href="index.php">Página inicial</a></li>
				<li><a href="sobre.php">O que é?</a></li>
			
			</ul>
		
		</nav>
		
		<?php
		
	}
	
	function bibliotecas(){
	
		?>
		
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="materialize/css/materialize.min.css">
		<link rel="stylesheet" href="nouislider/nouislider.css">

		<!-- Compiled and minified JavaScript -->
		<script src="materialize/js/materialize.min.js"></script>
		<script src="nouislider/nouislider.js"></script>
		
		<?php
	
	}
	
	function filtros(){
	
		?>
		<form>
			<div class="row">
				<div class="input-field col s12">
					<h5 class="text-center">Taxa de aprovação</h5>
					<div id="range-aprovados"></div>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<select id="estados" name="estados[]" multiple>
						<option value="" disabled>Selecione estado(s)</option>
						<option value="AC">Acre</option>
						<option value="AL">Alagoas</option>
						<option value="AP">Amapá</option>
						<option value="AM">Amazonas</option>
						<option value="BA">Bahia</option>
						<option value="CE">Ceará</option>
						<option value="DF">Distrito Federal</option>
						<option value="ES">Espírito Santo</option>
						<option value="GO">Goiás</option>
						<option value="MA">Maranhão</option>
						<option value="MT">Mato Grosso</option>
						<option value="MS">Mato Grosso do Sul</option>
						<option value="MG">Minas Gerais</option>
						<option value="PA">Pará</option>
						<option value="PB">Paraíba</option>
						<option value="PR">Paraná</option>
						<option value="PE">Pernambuco</option>
						<option value="PI">Piauí</option>
						<option value="RJ">Rio de Janeiro</option>
						<option value="RS">Rio Grande do Sul</option>
						<option value="RN">Rio Grando do Norte</option>
						<option value="RO">Rondônia</option>
						<option value="RR">Roraima</option>
						<option value="SC">Santa Catarina</option>
						<option value="SP">São Paulo</option>
						<option value="SE">Sergipe</option>
						<option value="TO">Tocantins</option>
					</select>
					<label>Estados</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<button type="button" id="aplicar_tx" class="waves-effect waves-light btn blue">Aplicar</button>
				</div>
			</div>
		</form>
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
		
		if(!isset($filtros['tx_min'])&&!isset($filtros['tx_min'])) {
			$filtros['tx_min'] = 0;
			$filtros['tx_max'] = 100;
		}
		if(isset($filtros['estados'])) {
			$estados = '(';
			
			foreach($filtros['estados'] as $i=>$v) {
				if($i==0) {
					$estados.="'$v'";
				} else {
					$estados.=",'$v'";
				}
			}
			
			$estados.=')';
		}
		
		if(isset($estados)) {
			$sql_tx = "SELECT * FROM tx_rendimento WHERE UF IN $estados AND ap_ef BETWEEN ".$filtros['tx_min']." AND ".$filtros['tx_max'];
		} else {
			$sql_tx = "SELECT * FROM tx_rendimento WHERE ap_ef BETWEEN ".$filtros['tx_min']." AND ".$filtros['tx_max'];
		}
		//echo $sql_tx;
		$resultado_tx = mysqli_query($link, $sql_tx);
		
		if(mysqli_num_rows($resultado_tx)>0) { 
			$cidades = '(';
			
			foreach($resultado_tx as $i=>$v) {
				$cidade = $v['cod_mun'];
				if($i==0) {
					$cidades.="$cidade";
				} else {
					$cidades.=",$cidade";
				}
			}
		
			$cidades.=')';
		
			foreach($dados as $i=>$v) {
				$where = '';
				
				if(isset($cidades)) {
					$where .= "Cod_Municipio IN ".$cidades;
				}
				
				if($where == '') {
					$dataT = "SELECT count(*) as 'total' FROM escolas";
					$dataS = "SELECT count(*) as 'cont' FROM escolas WHERE ".$v." LIKE '%S%';";
				} else {
					$dataT = "SELECT count(*) as 'total' FROM escolas WHERE $where";
					$dataS = "SELECT count(*) as 'cont' FROM escolas WHERE $where AND ".$v." LIKE '%S%';";
				}
			
				$resultadoT = mysqli_query($link, $dataT);
				$resultadoS = mysqli_query($link, $dataS);
				
				$porcentagem = (mysqli_fetch_array($resultadoS)['cont']*100)/mysqli_fetch_array($resultadoT)['total'];
				
				$resul[$v] = $porcentagem;
			}
			
			//$data = "SELECT * FROM tx_rendimento WHERE Cod_Municipio IN ".$cidades;
			
			//$resultado = mysqli_query($link, $data);
			//$aprovados = mysqli_fetch_array($resultado)['ap_ef'];
			//$resul["Aprovados"] = $aprovados;
			
			
			$json = json_encode($resul);
			
			return $json;
		} else {
			return 3;
		}
	}

?>