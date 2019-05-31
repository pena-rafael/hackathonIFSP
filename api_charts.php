<?php

	function head_chart(){
		
		?>
		
		<script type="text/javascript" src="js/charts.js"></script>
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript">
		
			var result;
			document.addEventListener('DOMContentLoaded', function() {
				var elems = document.querySelectorAll('select');
				var instances = M.FormSelect.init(elems, 'options');
			});
			var dados =[['Tipo', 'Porcentagem']];
			$(document).ready(function() {
				$("#aplicar_tx").click(function() {
					
					$("#chart_div").hide();
					$("#loading").show();
					var tx_min = slider.noUiSlider.get()[0];
					var tx_max = slider.noUiSlider.get()[1];
					var estados = $("#estados").val();
					var request = $.ajax({
						url: "dados.php",
						method: "POST",
						dataType: "json",
						data: {tx_min: tx_min, tx_max: tx_max, estados: estados},
						success: function(data) {
							if(data=="abaixo") {
								$("#chart_div").hide();
								$("#abaixo").show();
							} else {
								$("#chart_div").show();
								$("#abaixo").hide();
							}
							var keys = Object.keys(data);
							var values = Object.values(data);
							for(var i=0; i<keys.length;i++) {
								dados[i+1] = [keys[i], values[i]];
							}
							google.charts.setOnLoadCallback(drawVisualization);
							$("#chart_div").show();
							$("#loading").hide();
						}
					});
				});
				
				var slider = document.getElementById('range-aprovados');
				noUiSlider.create(slider, {
					start: [70, 100],
					connect: true,
					step: 1,
					orientation: 'horizontal', // 'horizontal' or 'vertical'
					range: {
						'min': 70,
						'max': 100
					},
					format: wNumb({
						decimals: 0
					})
				});
				$("#chart_div").hide();
				$("#loading").show();
				var request = $.ajax({
					url: "dados.php",
					method: "POST",
					dataType: "json",
					success: function(data) {
						var keys = Object.keys(data);
						var values = Object.values(data);
						for(var i=0; i<keys.length;i++) {
							dados[i+1] = [keys[i], values[i]];
						}
						google.charts.setOnLoadCallback(drawVisualization);
						$("#chart_div").show();
						$("#loading").hide();
					}
				});
				google.charts.load('current', {'packages':['corechart']});

				function drawVisualization() {
					// Some raw data (not necessarily accurate)
					var data = google.visualization.arrayToDataTable(dados);

					var options = {
						title : '',
						vAxis: {title: 'Porcentagem(%)'},
						hAxis: {title: 'Recurso'},
						seriesType: 'bars',
						series: {5: {type: 'line'}}
					};

					var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
					chart.draw(data, options);
				}
			});
		</script>
	
		<?php
	
	}
  
	function body_chart(){
	
		?>
		<div id="abaixo" style="display: none;">Nenhum dado encontrado</div>
		<div id="loading">carregando...</div>
		<div id="chart_div" style="width: 100%; height: 500px;"></div>
		
		<?php
		
	}
		
?>