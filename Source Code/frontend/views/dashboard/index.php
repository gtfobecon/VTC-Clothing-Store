<?php
$dataPoints = array();
foreach ($money as $key => $value) {
	$dataPoint = array("y" => $money[$key]['price'], "label" => $money[$key]['name']);
	array_push($dataPoints, $dataPoint);
}
$dataMoneys = array();
foreach ($money_by_month as $key => $value) {
	$data = array("y" => $money_by_month[$key]['sum(price)'], "label" => $money_by_month[$key]['month']);
	array_push($dataMoneys, $data);
}

?>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<br><br>
<div id="chartContainer1" style="height: 370px; width: 100%;"></div>
<br><br>
<div id="chartContainer2" style="height: 300px; width: 100%;"></div>
<script>
	window.onload = function() {
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light2",
			title: {
				text: "Doanh thu theo loại"
			},
			axisY: {
				title: "VNĐ"
			},
			data: [{
				type: "column",
				yValueFormatString: "#,##0.## VNĐ",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK) ?>
			}]
		});
		chart.render();
		var chart1 = new CanvasJS.Chart("chartContainer1", {
			animationEnabled: true,
			theme: "light2",
			title: {
				text: "Doanh thu theo tháng"
			},
			axisY: {
				title: "VNĐ"
			},
			data: [{
				type: "line",
				yValueFormatString: "#,##0.## VNĐ",
				dataPoints: <?php echo json_encode($dataMoneys, JSON_NUMERIC_CHECK) ?>
			}]
		});
		chart1.render();
	}
</script>