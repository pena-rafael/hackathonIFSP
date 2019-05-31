<?php

	function head_chart(){
		
		?>
		
		<script type="text/javascript" src="js/charts.js"></script>
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript">
		
			var result;
			
			var dados =[['Tipo', 'Porcentagem']];
			$(document).ready(function() {
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
					}
				});
				google.charts.load('current', {'packages':['corechart']});

				function drawVisualization() {
					// Some raw data (not necessarily accurate)
					var data = google.visualization.arrayToDataTable(dados);

					var options = {
						title : 'Monthly Coffee Production by Country',
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
	
		<div id="chart_div" style="width: 900px; height: 500px;"></div>
		
		<?php
		
	}
		
?>