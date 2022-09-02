<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");

setcookie('date_c', $_POST["date_c"], time() + 10, '/');    //일자 쿠키 받음
setcookie('item_no', $_POST["item_no"], time() + 10, '/');  //아이템 구분 쿠키 받음

$quDate = $_POST["date_c"];
$Qdate = preg_replace("/[^0-9]*/s", "", $quDate);

if ($Qdate >= 1) {
	$changeDate = $_POST["date_c"];
	$i_no = $_POST["item_no"];
} else {
	$changeDate = date("Y-m");
	$i_no = 6;
}

//$changeDate = $_POST["date_count"];


$cDate =  preg_replace("/[^0-9]*/s", "", $changeDate);

$yDate = substr($cDate, 2, 2);
$mDate = substr($cDate, 4, 2);
$sDate = substr($cDate, 0, 6);


?>

<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="chrome">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/css/table line hidden.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/css/그래프.css" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="/css/NG of daily.css" rel="stylesheet" type="text/css">
	<script src="/js/graph.js"></script>
	<title>그래프 페이지</title>
</head>

<body>
	<!-- <?php echo $changeDate; ?> -->

	<div calss="container" style="width: 100%;">
		<canvas id="myChart" style="width:99.5vw; height:73vh; margin-left:3px;"></canvas>
	</div>
	<script>
		var 일별불량수량 = 0;
		var ctx = document.getElementById('myChart');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['일평균', '01일', '02일', '03일', '04일', '05일', '06일', '07일', '08일', '09일', '10일', '11일', '12일', '13일', '14일', '15일', '16일', '17일', '18일', '19일', '20일', '21일', '22일', '23일', '24일', '25일', '26일', '27일', '28일', '29일', '30일', '31일'],
				datasets: [{
					label: '일별 불량 합계',
					data: [<?php if ($i_no <= 5) {
								$sql00 = "select * from result1 where date >= '" . $sDate . "01' and date <= '" . $sDate . "31' and index1 ='" . $i_no . "' and conclusion1 >=2 order by id";
							} else {
								$sql00 = "select * from result1 where date >= '" . $sDate . "01' and date <= '" . $sDate . "31' and conclusion1 >=20 order by id";
							}
							$res00 = mysqli_query($conn, $sql00);
							for ($countT = 0; $row = mysqli_fetch_array($res00); $countT++) {
							}
							$avemonth = $countT / 31;
							echo number_format($avemonth, 2); ?>, //불량 총 합계수량
						<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date= '" . $sDate . "01' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "01' and conclusion1 >=2 order by id";
						}
						$res01 = mysqli_query($conn, $sql01);
						for ($count01 = 0; $row01 = mysqli_fetch_array($res01); $count01++) {
						}
						echo $count01; ?>, // 01일
						<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date= '" . $sDate . "02' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $cDate . "02' and conclusion1 >=2 order by id";
						}
						$res02 = mysqli_query($conn, $sql02);
						for ($count02 = 0; $row02 = mysqli_fetch_array($res02); $count02++) {
						}
						echo $count02; ?>, // 02일
						<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date= '" . $sDate . "03' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $cDate . "03' and conclusion1 >=2 order by id";
						}
						$res03 = mysqli_query($conn, $sql03);
						for ($count03 = 0; $row03 = mysqli_fetch_array($res03); $count03++) {
						}
						echo $count03; ?>, // 03일
						<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date= '" . $sDate . "04' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $cDate . "04' and conclusion1 >=2 order by id";
						}
						$res04 = mysqli_query($conn, $sql04);
						for ($count04 = 0; $row04 = mysqli_fetch_array($res04); $count04++) {
						}
						echo $count04; ?>, // 04일
						<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date= '" . $sDate . "05' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $cDate . "05' and conclusion1 >=2 order by id";
						}
						$res05 = mysqli_query($conn, $sql05);
						for ($count05 = 0; $row05 = mysqli_fetch_array($res05); $count05++) {
						}
						echo $count05; ?>, // 05일
						<?php if ($i_no <= 5) {
							$sql06 = "select * from result1 where date= '" . $sDate . "06' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql06 = "select * from result1 where date = '" . $cDate . "06' and conclusion1 >=2 order by id";
						}
						$res06 = mysqli_query($conn, $sql06);
						for ($count06 = 0; $row06 = mysqli_fetch_array($res06); $count06++) {
						}
						echo $count06; ?>, // 06일
						<?php if ($i_no <= 5) {
							$sql07 = "select * from result1 where date= '" . $sDate . "07' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql07 = "select * from result1 where date = '" . $cDate . "07' and conclusion1 >=2 order by id";
						}
						$res07 = mysqli_query($conn, $sql07);
						for ($count07 = 0; $row07 = mysqli_fetch_array($res07); $count07++) {
						}
						echo $count07; ?>, // 07일
						<?php if ($i_no <= 5) {
							$sql08 = "select * from result1 where date= '" . $sDate . "08' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql08 = "select * from result1 where date = '" . $cDate . "08' and conclusion1 >=2 order by id";
						}
						$res08 = mysqli_query($conn, $sql08);
						for ($count08 = 0; $row08 = mysqli_fetch_array($res08); $count08++) {
						}
						echo $count08; ?>, // 08일
						<?php if ($i_no <= 5) {
							$sql09 = "select * from result1 where date= '" . $sDate . "09' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql09 = "select * from result1 where date = '" . $cDate . "09' and conclusion1 >=2 order by id";
						}
						$res09 = mysqli_query($conn, $sql09);
						for ($count09 = 0; $row09 = mysqli_fetch_array($res09); $count09++) {
						}
						echo $count09; ?>, // 09일
						<?php if ($i_no <= 5) {
							$sql10 = "select * from result1 where date= '" . $sDate . "10' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql10 = "select * from result1 where date = '" . $cDate . "10' and conclusion1 >=2 order by id";
						}
						$res10 = mysqli_query($conn, $sql10);
						for ($count10 = 0; $row10 = mysqli_fetch_array($res10); $count10++) {
						}
						echo $count10; ?>, // 10일
						<?php if ($i_no <= 5) {
							$sql11 = "select * from result1 where date= '" . $sDate . "11' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql11 = "select * from result1 where date = '" . $cDate . "11' and conclusion1 >=2 order by id";
						}
						$res11 = mysqli_query($conn, $sql11);
						for ($count11 = 0; $row11 = mysqli_fetch_array($res11); $count11++) {
						}
						echo $count11; ?>, // 11일
						<?php if ($i_no <= 5) {
							$sql12 = "select * from result1 where date= '" . $sDate . "12' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql12 = "select * from result1 where date = '" . $cDate . "12' and conclusion1 >=2 order by id";
						}
						$res12 = mysqli_query($conn, $sql12);
						for ($count12 = 0; $row12 = mysqli_fetch_array($res12); $count12++) {
						}
						echo $count12; ?>, // 12일
						<?php if ($i_no <= 5) {
							$sql13 = "select * from result1 where date= '" . $sDate . "13' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql13 = "select * from result1 where date = '" . $cDate . "13' and conclusion1 >=2 order by id";
						}
						$res13 = mysqli_query($conn, $sql13);
						for ($count13 = 0; $row13 = mysqli_fetch_array($res13); $count13++) {
						}
						echo $count13; ?>, // 13일
						<?php if ($i_no <= 5) {
							$sql14 = "select * from result1 where date= '" . $sDate . "14' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql14 = "select * from result1 where date = '" . $cDate . "14' and conclusion1 >=2 order by id";
						}
						$res14 = mysqli_query($conn, $sql14);
						for ($count14 = 0; $row14 = mysqli_fetch_array($res14); $count14++) {
						}
						echo $count14; ?>, // 14일
						<?php if ($i_no <= 5) {
							$sql15 = "select * from result1 where date= '" . $sDate . "15' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql15 = "select * from result1 where date = '" . $cDate . "15' and conclusion1 >=2 order by id";
						}
						$res15 = mysqli_query($conn, $sql15);
						for ($count15 = 0; $row15 = mysqli_fetch_array($res15); $count15++) {
						}
						echo $count15; ?>, // 15일
						<?php if ($i_no <= 5) {
							$sql16 = "select * from result1 where date= '" . $sDate . "16' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql16 = "select * from result1 where date = '" . $cDate . "16' and conclusion1 >=2 order by id";
						}
						$res16 = mysqli_query($conn, $sql16);
						for ($count16 = 0; $row16 = mysqli_fetch_array($res16); $count16++) {
						}
						echo $count16; ?>, // 16일
						<?php if ($i_no <= 5) {
							$sql17 = "select * from result1 where date= '" . $sDate . "17' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql17 = "select * from result1 where date = '" . $cDate . "17' and conclusion1 >=2 order by id";
						}
						$res17 = mysqli_query($conn, $sql17);
						for ($count17 = 0; $row17 = mysqli_fetch_array($res17); $count17++) {
						}
						echo $count17; ?>, // 17일
						<?php if ($i_no <= 5) {
							$sql18 = "select * from result1 where date= '" . $sDate . "18' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql18 = "select * from result1 where date = '" . $cDate . "18' and conclusion1 >=2 order by id";
						}
						$res18 = mysqli_query($conn, $sql18);
						for ($count18 = 0; $row18 = mysqli_fetch_array($res18); $count18++) {
						}
						echo $count18; ?>, // 18일
						<?php if ($i_no <= 5) {
							$sql19 = "select * from result1 where date= '" . $sDate . "19' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql19 = "select * from result1 where date = '" . $cDate . "19' and conclusion1 >=2 order by id";
						}
						$res19 = mysqli_query($conn, $sql19);
						for ($count19 = 0; $row19 = mysqli_fetch_array($res19); $count19++) {
						}
						echo $count19; ?>, // 19일
						<?php if ($i_no <= 5) {
							$sql20 = "select * from result1 where date= '" . $sDate . "20' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql20 = "select * from result1 where date = '" . $cDate . "20' and conclusion1 >=2 order by id";
						}
						$res20 = mysqli_query($conn, $sql20);
						for ($count20 = 0; $row20 = mysqli_fetch_array($res20); $count20++) {
						}
						echo $count20; ?>, // 20일
						<?php if ($i_no <= 5) {
							$sql21 = "select * from result1 where date= '" . $sDate . "21' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql21 = "select * from result1 where date = '" . $cDate . "21' and conclusion1 >=2 order by id";
						}
						$res21 = mysqli_query($conn, $sql21);
						for ($count21 = 0; $row21 = mysqli_fetch_array($res21); $count21++) {
						}
						echo $count21; ?>, // 21일
						<?php if ($i_no <= 5) {
							$sql22 = "select * from result1 where date= '" . $sDate . "22' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql22 = "select * from result1 where date = '" . $cDate . "22' and conclusion1 >=2 order by id";
						}
						$res22 = mysqli_query($conn, $sql22);
						for ($count22 = 0; $row22 = mysqli_fetch_array($res22); $count22++) {
						}
						echo $count22; ?>, // 22일
						<?php if ($i_no <= 5) {
							$sql23 = "select * from result1 where date= '" . $sDate . "23' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql23 = "select * from result1 where date = '" . $cDate . "23' and conclusion1 >=2 order by id";
						}
						$res23 = mysqli_query($conn, $sql23);
						for ($count23 = 0; $row23 = mysqli_fetch_array($res23); $count23++) {
						}
						echo $count23; ?>, // 23일
						<?php if ($i_no <= 5) {
							$sql24 = "select * from result1 where date= '" . $sDate . "24' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql24 = "select * from result1 where date = '" . $cDate . "24' and conclusion1 >=2 order by id";
						}
						$res24 = mysqli_query($conn, $sql24);
						for ($count24 = 0; $row24 = mysqli_fetch_array($res24); $count24++) {
						}
						echo $count24; ?>, // 24일
						<?php if ($i_no <= 5) {
							$sql25 = "select * from result1 where date= '" . $sDate . "25' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql25 = "select * from result1 where date = '" . $cDate . "25' and conclusion1 >=2 order by id";
						}
						$res25 = mysqli_query($conn, $sql25);
						for ($count25 = 0; $row25 = mysqli_fetch_array($res25); $count25++) {
						}
						echo $count25; ?>, // 25일
						<?php if ($i_no <= 5) {
							$sql26 = "select * from result1 where date= '" . $sDate . "26' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql26 = "select * from result1 where date = '" . $cDate . "26' and conclusion1 >=2 order by id";
						}
						$res26 = mysqli_query($conn, $sql26);
						for ($count26 = 0; $row26 = mysqli_fetch_array($res26); $count26++) {
						}
						echo $count26; ?>, // 26일
						<?php if ($i_no <= 5) {
							$sql27 = "select * from result1 where date= '" . $sDate . "27' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql27 = "select * from result1 where date = '" . $cDate . "27' and conclusion1 >=2 order by id";
						}
						$res27 = mysqli_query($conn, $sql27);
						for ($count27 = 0; $row27 = mysqli_fetch_array($res27); $count27++) {
						}
						echo $count27; ?>, // 27일
						<?php if ($i_no <= 5) {
							$sql28 = "select * from result1 where date= '" . $sDate . "28' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql28 = "select * from result1 where date = '" . $cDate . "28' and conclusion1 >=2 order by id";
						}
						$res28 = mysqli_query($conn, $sql28);
						for ($count28 = 0; $row28 = mysqli_fetch_array($res28); $count28++) {
						}
						echo $count28; ?>, // 28일
						<?php if ($i_no <= 5) {
							$sql29 = "select * from result1 where date= '" . $sDate . "29' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql29 = "select * from result1 where date = '" . $cDate . "29' and conclusion1 >=2 order by id";
						}
						$res29 = mysqli_query($conn, $sql29);
						for ($count29 = 0; $row29 = mysqli_fetch_array($res29); $count29++) {
						}
						echo $count29; ?>, // 29일
						<?php if ($i_no <= 5) {
							$sql30 = "select * from result1 where date= '" . $sDate . "30' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql30 = "select * from result1 where date = '" . $cDate . "30' and conclusion1 >=2 order by id";
						}
						$res30 = mysqli_query($conn, $sql30);
						for ($count30 = 0; $row30 = mysqli_fetch_array($res30); $count30++) {
						}
						echo $count30; ?>, // 30일
						<?php if ($i_no <= 5) {
							$sql31 = "select * from result1 where date= '" . $sDate . "31' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql31 = "select * from result1 where date = '" . $cDate . "31' and conclusion1 >=2 order by id";
						}
						$res31 = mysqli_query($conn, $sql31);
						for ($count31 = 0; $row31 = mysqli_fetch_array($res31); $count31++) {
						}
						echo $count31; ?> // 31일
					],
					backgroundColor: ['rgba(255, 100, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)', /* 여기서 부터 */
						'rgba(75, 192, 192, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 159, 164, 0.2)', 'rgba(255, 159, 164, 0.2)', 'rgba(255, 159, 164, 0.2)', 'rgba(255, 159, 164, 0.2)', 'rgba(255, 159, 164, 0.2)', 'rgba(255, 159, 164, 0.2)'
					],
					/* 색상 놀이 */
					borderColor: ['rgba(255, 100, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', /* 어따~~~ */
						'rgba(75, 192, 192, 1)', 'rgba(75, 192, 192, 1)', 'rgba(75, 192, 192, 1)', 'rgba(75, 192, 192, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', /* 길다~~~ */
						'rgba(255, 159, 64, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255, 159, 164, 1)', 'rgba(255, 159, 164, 1)', 'rgba(255, 159, 164, 1)', 'rgba(255, 159, 164, 1)', 'rgba(255, 159, 164, 1)', 'rgba(255, 159, 164, 1)'
					],
					/* 여기까지 */
					borderWidth: 1
				}]
			},
			options: {
				responsive: false,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	</script>

	<table class="main-table">
		<thead>
			<tr class="alert-primary text-dark border border-secondary">
				<th style="position: sticky; left: 0;" class="alert-primary text-dark border border-secondary">구 분</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 1, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>01일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 2, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>02일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 3, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>03일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 4, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>04일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 5, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>05일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 6, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>06일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 7, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>07일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 8, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>08일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 9, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>09일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 10, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>10일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 11, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>11일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 12, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>12일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 13, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>13일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 14, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>14일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 15, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>15일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 16, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>16일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 17, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>17일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 18, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>18일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 19, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>19일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 20, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>20일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 21, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>21일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 22, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>22일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 23, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>23일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 24, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>24일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 25, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>25일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 26, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>26일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 27, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>27일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 28, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>28일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 29, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>29일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 30, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>30일</th>
				<th><?php $dayOfTheWeek = date("w", mktime(0, 0, 0, $mDate, 31, $yDate));
					if ($dayOfTheWeek >= 1 && $dayOfTheWeek <= 5) {
						echo "<font color='black'>";
					} else if ($dayOfTheWeek == 6) {
						echo "<font color='#4169E1'>";
					} else {
						echo "<font color='#DC143C'>";
					} ?>31일</th>
				<th class="bg-warning border border-secondary text-dark">일평균</th>
				<th class="bg-warning border border-secondary text-dark">합 계</th>
			</tr>
			<tr>
				<th style="position: sticky; left: 0;" class="alert-secondary border border-secondary">총 검사수량</th>
				<td>
					<div id="01일 countALL"></div>
				</td>
				<td>
					<div id="02일 countALL"></div>
				</td>
				<td>
					<div id="03일 countALL"></div>
				</td>
				<td>
					<div id="04일 countALL"></div>
				</td>
				<td>
					<div id="05일 countALL"></div>
				</td>
				<td>
					<div id="06일 countALL"></div>
				</td>
				<td>
					<div id="07일 countALL"></div>
				</td>
				<td>
					<div id="08일 countALL"></div>
				</td>
				<td>
					<div id="09일 countALL"></div>
				</td>
				<td>
					<div id="10일 countALL"></div>
				</td>
				<td>
					<div id="11일 countALL"></div>
				</td>
				<td>
					<div id="12일 countALL"></div>
				</td>
				<td>
					<div id="13일 countALL"></div>
				</td>
				<td>
					<div id="14일 countALL"></div>
				</td>
				<td>
					<div id="15일 countALL"></div>
				</td>
				<td>
					<div id="16일 countALL"></div>
				</td>
				<td>
					<div id="17일 countALL"></div>
				</td>
				<td>
					<div id="18일 countALL"></div>
				</td>
				<td>
					<div id="19일 countALL"></div>
				</td>
				<td>
					<div id="20일 countALL"></div>
				</td>
				<td>
					<div id="21일 countALL"></div>
				</td>
				<td>
					<div id="22일 countALL"></div>
				</td>
				<td>
					<div id="23일 countALL"></div>
				</td>
				<td>
					<div id="24일 countALL"></div>
				</td>
				<td>
					<div id="25일 countALL"></div>
				</td>
				<td>
					<div id="26일 countALL"></div>
				</td>
				<td>
					<div id="27일 countALL"></div>
				</td>
				<td>
					<div id="28일 countALL"></div>
				</td>
				<td>
					<div id="29일 countALL"></div>
				</td>
				<td>
					<div id="30일 countALL"></div>
				</td>
				<td>
					<div id="31일 countALL"></div>
				</td>
				<th class="alert-warning border border-secondary text-dark">
					<div id="countALL 일평균"></div>
				</th>
				<th class="alert-warning border border-secondary text-dark">
					<div id="countALL 합계"></div>
				</th>
			</tr>
			<tr>
				<th style="position: sticky; left: 0;" class="alert-secondary border border-secondary">불량수량</th>
				<td>
					<div id="01일 count ng"></div>
				</td>
				<td>
					<div id="02일 count ng"></div>
				</td>
				<td>
					<div id="03일 count ng"></div>
				</td>
				<td>
					<div id="04일 count ng"></div>
				</td>
				<td>
					<div id="05일 count ng"></div>
				</td>
				<td>
					<div id="06일 count ng"></div>
				</td>
				<td>
					<div id="07일 count ng"></div>
				</td>
				<td>
					<div id="08일 count ng"></div>
				</td>
				<td>
					<div id="09일 count ng"></div>
				</td>
				<td>
					<div id="10일 count ng"></div>
				</td>
				<td>
					<div id="11일 count ng"></div>
				</td>
				<td>
					<div id="12일 count ng"></div>
				</td>
				<td>
					<div id="13일 count ng"></div>
				</td>
				<td>
					<div id="14일 count ng"></div>
				</td>
				<td>
					<div id="15일 count ng"></div>
				</td>
				<td>
					<div id="16일 count ng"></div>
				</td>
				<td>
					<div id="17일 count ng"></div>
				</td>
				<td>
					<div id="18일 count ng"></div>
				</td>
				<td>
					<div id="19일 count ng"></div>
				</td>
				<td>
					<div id="20일 count ng"></div>
				</td>
				<td>
					<div id="21일 count ng"></div>
				</td>
				<td>
					<div id="22일 count ng"></div>
				</td>
				<td>
					<div id="23일 count ng"></div>
				</td>
				<td>
					<div id="24일 count ng"></div>
				</td>
				<td>
					<div id="25일 count ng"></div>
				</td>
				<td>
					<div id="26일 count ng"></div>
				</td>
				<td>
					<div id="27일 count ng"></div>
				</td>
				<td>
					<div id="28일 count ng"></div>
				</td>
				<td>
					<div id="29일 count ng"></div>
				</td>
				<td>
					<div id="30일 count ng"></div>
				</td>
				<td>
					<div id="31일 count ng"></div>
				</td>
				<th class="alert-warning border border-secondary text-dark">
					<div id="count ng 일평균"></div>
				</th>
				<th class="alert-warning border border-secondary text-dark">
					<div id="count ng 합계"></div>
				</th>
			</tr>
			<tr>
				<th style="position: sticky; left: 0;" class="alert-secondary border border-secondary">불량률</th>
				<td>
					<div id="01일 불량률"></div>
				</td>
				<td>
					<div id="02일 불량률"></div>
				</td>
				<td>
					<div id="03일 불량률"></div>
				</td>
				<td>
					<div id="04일 불량률"></div>
				</td>
				<td>
					<div id="05일 불량률"></div>
				</td>
				<td>
					<div id="06일 불량률"></div>
				</td>
				<td>
					<div id="07일 불량률"></div>
				</td>
				<td>
					<div id="08일 불량률"></div>
				</td>
				<td>
					<div id="09일 불량률"></div>
				</td>
				<td>
					<div id="10일 불량률"></div>
				</td>
				<td>
					<div id="11일 불량률"></div>
				</td>
				<td>
					<div id="12일 불량률"></div>
				</td>
				<td>
					<div id="13일 불량률"></div>
				</td>
				<td>
					<div id="14일 불량률"></div>
				</td>
				<td>
					<div id="15일 불량률"></div>
				</td>
				<td>
					<div id="16일 불량률"></div>
				</td>
				<td>
					<div id="17일 불량률"></div>
				</td>
				<td>
					<div id="18일 불량률"></div>
				</td>
				<td>
					<div id="19일 불량률"></div>
				</td>
				<td>
					<div id="20일 불량률"></div>
				</td>
				<td>
					<div id="21일 불량률"></div>
				</td>
				<td>
					<div id="22일 불량률"></div>
				</td>
				<td>
					<div id="23일 불량률"></div>
				</td>
				<td>
					<div id="24일 불량률"></div>
				</td>
				<td>
					<div id="25일 불량률"></div>
				</td>
				<td>
					<div id="26일 불량률"></div>
				</td>
				<td>
					<div id="27일 불량률"></div>
				</td>
				<td>
					<div id="28일 불량률"></div>
				</td>
				<td>
					<div id="29일 불량률"></div>
				</td>
				<td>
					<div id="30일 불량률"></div>
				</td>
				<td>
					<div id="31일 불량률"></div>
				</td>
				<th class="alert-warning border border-secondary text-dark">
					<div id="일평균 불량률"></div>
				</th>
				<th class="alert-warning border border-secondary text-dark">
					<div id="합계 불량률"></div>
				</th>
			</tr>
			<tr>
				<th style="position: sticky; left: 0;" class="alert-secondary border border-secondary">LVDT 불량</th>
				<td>
					<div id="01일 LVDT ng"></div>
				</td>
				<td>
					<div id="02일 LVDT ng"></div>
				</td>
				<td>
					<div id="03일 LVDT ng"></div>
				</td>
				<td>
					<div id="04일 LVDT ng"></div>
				</td>
				<td>
					<div id="05일 LVDT ng"></div>
				</td>
				<td>
					<div id="06일 LVDT ng"></div>
				</td>
				<td>
					<div id="07일 LVDT ng"></div>
				</td>
				<td>
					<div id="08일 LVDT ng"></div>
				</td>
				<td>
					<div id="09일 LVDT ng"></div>
				</td>
				<td>
					<div id="10일 LVDT ng"></div>
				</td>
				<td>
					<div id="11일 LVDT ng"></div>
				</td>
				<td>
					<div id="12일 LVDT ng"></div>
				</td>
				<td>
					<div id="13일 LVDT ng"></div>
				</td>
				<td>
					<div id="14일 LVDT ng"></div>
				</td>
				<td>
					<div id="15일 LVDT ng"></div>
				</td>
				<td>
					<div id="16일 LVDT ng"></div>
				</td>
				<td>
					<div id="17일 LVDT ng"></div>
				</td>
				<td>
					<div id="18일 LVDT ng"></div>
				</td>
				<td>
					<div id="19일 LVDT ng"></div>
				</td>
				<td>
					<div id="20일 LVDT ng"></div>
				</td>
				<td>
					<div id="21일 LVDT ng"></div>
				</td>
				<td>
					<div id="22일 LVDT ng"></div>
				</td>
				<td>
					<div id="23일 LVDT ng"></div>
				</td>
				<td>
					<div id="24일 LVDT ng"></div>
				</td>
				<td>
					<div id="25일 LVDT ng"></div>
				</td>
				<td>
					<div id="26일 LVDT ng"></div>
				</td>
				<td>
					<div id="27일 LVDT ng"></div>
				</td>
				<td>
					<div id="28일 LVDT ng"></div>
				</td>
				<td>
					<div id="29일 LVDT ng"></div>
				</td>
				<td>
					<div id="30일 LVDT ng"></div>
				</td>
				<td>
					<div id="31일 LVDT ng"></div>
				</td>
				<th class="alert-warning border border-secondary text-dark">
					<div id="LVDT ng 일평균"></div>
				</th>
				<th class="alert-warning border border-secondary text-dark">
					<div id="LVDT ng 합계"></div>
				</th>
			</tr>
			<tr>
				<th style="position: sticky; left: 0;" class="alert-secondary border border-secondary">동심 불량</th>
				<td>
					<div id="01일 circle ng"></div>
				</td>
				<td>
					<div id="02일 circle ng"></div>
				</td>
				<td>
					<div id="03일 circle ng"></div>
				</td>
				<td>
					<div id="04일 circle ng"></div>
				</td>
				<td>
					<div id="05일 circle ng"></div>
				</td>
				<td>
					<div id="06일 circle ng"></div>
				</td>
				<td>
					<div id="07일 circle ng"></div>
				</td>
				<td>
					<div id="08일 circle ng"></div>
				</td>
				<td>
					<div id="09일 circle ng"></div>
				</td>
				<td>
					<div id="10일 circle ng"></div>
				</td>
				<td>
					<div id="11일 circle ng"></div>
				</td>
				<td>
					<div id="12일 circle ng"></div>
				</td>
				<td>
					<div id="13일 circle ng"></div>
				</td>
				<td>
					<div id="14일 circle ng"></div>
				</td>
				<td>
					<div id="15일 circle ng"></div>
				</td>
				<td>
					<div id="16일 circle ng"></div>
				</td>
				<td>
					<div id="17일 circle ng"></div>
				</td>
				<td>
					<div id="18일 circle ng"></div>
				</td>
				<td>
					<div id="19일 circle ng"></div>
				</td>
				<td>
					<div id="20일 circle ng"></div>
				</td>
				<td>
					<div id="21일 circle ng"></div>
				</td>
				<td>
					<div id="22일 circle ng"></div>
				</td>
				<td>
					<div id="23일 circle ng"></div>
				</td>
				<td>
					<div id="24일 circle ng"></div>
				</td>
				<td>
					<div id="25일 circle ng"></div>
				</td>
				<td>
					<div id="26일 circle ng"></div>
				</td>
				<td>
					<div id="27일 circle ng"></div>
				</td>
				<td>
					<div id="28일 circle ng"></div>
				</td>
				<td>
					<div id="29일 circle ng"></div>
				</td>
				<td>
					<div id="30일 circle ng"></div>
				</td>
				<td>
					<div id="31일 circle ng"></div>
				</td>
				<th class="alert-warning border border-secondary text-dark">
					<div id="circle ng 일평균"></div>
				</th>
				<th class="alert-warning border border-secondary text-dark">
					<div id="circle ng 합계"></div>
				</th>
			</tr>
			<tr>
				<th style="position: sticky; left: 0;" class="alert-secondary border border-secondary">조도 불량</th>
				<td>
					<div id="01일 light ng"></div>
				</td>
				<td>
					<div id="02일 light ng"></div>
				</td>
				<td>
					<div id="03일 light ng"></div>
				</td>
				<td>
					<div id="04일 light ng"></div>
				</td>
				<td>
					<div id="05일 light ng"></div>
				</td>
				<td>
					<div id="06일 light ng"></div>
				</td>
				<td>
					<div id="07일 light ng"></div>
				</td>
				<td>
					<div id="08일 light ng"></div>
				</td>
				<td>
					<div id="09일 light ng"></div>
				</td>
				<td>
					<div id="10일 light ng"></div>
				</td>
				<td>
					<div id="11일 light ng"></div>
				</td>
				<td>
					<div id="12일 light ng"></div>
				</td>
				<td>
					<div id="13일 light ng"></div>
				</td>
				<td>
					<div id="14일 light ng"></div>
				</td>
				<td>
					<div id="15일 light ng"></div>
				</td>
				<td>
					<div id="16일 light ng"></div>
				</td>
				<td>
					<div id="17일 light ng"></div>
				</td>
				<td>
					<div id="18일 light ng"></div>
				</td>
				<td>
					<div id="19일 light ng"></div>
				</td>
				<td>
					<div id="20일 light ng"></div>
				</td>
				<td>
					<div id="21일 light ng"></div>
				</td>
				<td>
					<div id="22일 light ng"></div>
				</td>
				<td>
					<div id="23일 light ng"></div>
				</td>
				<td>
					<div id="24일 light ng"></div>
				</td>
				<td>
					<div id="25일 light ng"></div>
				</td>
				<td>
					<div id="26일 light ng"></div>
				</td>
				<td>
					<div id="27일 light ng"></div>
				</td>
				<td>
					<div id="28일 light ng"></div>
				</td>
				<td>
					<div id="29일 light ng"></div>
				</td>
				<td>
					<div id="30일 light ng"></div>
				</td>
				<td>
					<div id="31일 light ng"></div>
				</td>
				<th class="alert-warning border border-secondary text-dark">
					<div id="light ng 일평균"></div>
				</th>
				<th class="alert-warning border border-secondary text-dark">
					<div id="light ng 합계"></div>
				</th>
			</tr>
			<!-- <tr>
        <th style="position: sticky; left: 0;" class="alert-secondary border border-secondary">플로우 마크</th>
        <td><div id="01일 FW ng"></div></td>
        <td><div id="02일 FW ng"></div></td>
        <td><div id="03일 FW ng"></div></td>
        <td><div id="04일 FW ng"></div></td>
        <td><div id="05일 FW ng"></div></td>
        <td><div id="06일 FW ng"></div></td>
        <td><div id="07일 FW ng"></div></td>
        <td><div id="08일 FW ng"></div></td>
        <td><div id="09일 FW ng"></div></td>
        <td><div id="10일 FW ng"></div></td>
        <td><div id="11일 FW ng"></div></td>
        <td><div id="12일 FW ng"></div></td>
        <td><div id="13일 FW ng"></div></td>
        <td><div id="14일 FW ng"></div></td>
        <td><div id="15일 FW ng"></div></td>
        <td><div id="16일 FW ng"></div></td>
        <td><div id="17일 FW ng"></div></td>
        <td><div id="18일 FW ng"></div></td>
        <td><div id="19일 FW ng"></div></td>
        <td><div id="20일 FW ng"></div></td>
        <td><div id="21일 FW ng"></div></td>
        <td><div id="22일 FW ng"></div></td>
        <td><div id="23일 FW ng"></div></td>
        <td><div id="24일 FW ng"></div></td>
        <td><div id="25일 FW ng"></div></td>
        <td><div id="26일 FW ng"></div></td>
        <td><div id="27일 FW ng"></div></td>
        <td><div id="28일 FW ng"></div></td>
        <td><div id="29일 FW ng"></div></td>
        <td><div id="30일 FW ng"></div></td>
        <td><div id="31일 FW ng"></div></td>
        <th class="alert-warning border border-secondary text-dark"><div id="FW ng 일평균"></div></th>
        <th class="alert-warning border border-secondary text-dark"><div id="FW ng 합계"></div></th>
      </tr>
      <tr>
        <th style="position: sticky; left: 0;" class="alert-secondary border border-secondary">싱크 마크</th>
        <td><div id="01일 SINK ng"></div></td>
        <td><div id="02일 SINK ng"></div></td>
        <td><div id="03일 SINK ng"></div></td>
        <td><div id="04일 SINK ng"></div></td>
        <td><div id="05일 SINK ng"></div></td>
        <td><div id="06일 SINK ng"></div></td>
        <td><div id="07일 SINK ng"></div></td>
        <td><div id="08일 SINK ng"></div></td>
        <td><div id="09일 SINK ng"></div></td>
        <td><div id="10일 SINK ng"></div></td>
        <td><div id="11일 SINK ng"></div></td>
        <td><div id="12일 SINK ng"></div></td>
        <td><div id="13일 SINK ng"></div></td>
        <td><div id="14일 SINK ng"></div></td>
        <td><div id="15일 SINK ng"></div></td>
        <td><div id="16일 SINK ng"></div></td>
        <td><div id="17일 SINK ng"></div></td>
        <td><div id="18일 SINK ng"></div></td>
        <td><div id="19일 SINK ng"></div></td>
        <td><div id="20일 SINK ng"></div></td>
        <td><div id="21일 SINK ng"></div></td>
        <td><div id="22일 SINK ng"></div></td>
        <td><div id="23일 SINK ng"></div></td>
        <td><div id="24일 SINK ng"></div></td>
        <td><div id="25일 SINK ng"></div></td>
        <td><div id="26일 SINK ng"></div></td>
        <td><div id="27일 SINK ng"></div></td>
        <td><div id="28일 SINK ng"></div></td>
        <td><div id="29일 SINK ng"></div></td>
        <td><div id="30일 SINK ng"></div></td>
        <td><div id="31일 SINK ng"></div></td>
        <th class="alert-warning border border-secondary text-dark"><div id="SINK ng 일평균"></div></th>
        <th class="alert-warning border border-secondary text-dark"><div id="SINK ng 합계"></div></th>
      </tr>
      <tr>
        <th style="position: sticky; left: 0;" class="alert-secondary border border-secondary">휨/변형</th>
        <td><div id="01일 휨ng"></div></td>
        <td><div id="02일 휨ng"></div></td>
        <td><div id="03일 휨ng"></div></td>
        <td><div id="04일 휨ng"></div></td>
        <td><div id="05일 휨ng"></div></td>
        <td><div id="06일 휨ng"></div></td>
        <td><div id="07일 휨ng"></div></td>
        <td><div id="08일 휨ng"></div></td>
        <td><div id="09일 휨ng"></div></td>
        <td><div id="10일 휨ng"></div></td>
        <td><div id="11일 휨ng"></div></td>
        <td><div id="12일 휨ng"></div></td>
        <td><div id="13일 휨ng"></div></td>
        <td><div id="14일 휨ng"></div></td>
        <td><div id="15일 휨ng"></div></td>
        <td><div id="16일 휨ng"></div></td>
        <td><div id="17일 휨ng"></div></td>
        <td><div id="18일 휨ng"></div></td>
        <td><div id="19일 휨ng"></div></td>
        <td><div id="20일 휨ng"></div></td>
        <td><div id="21일 휨ng"></div></td>
        <td><div id="22일 휨ng"></div></td>
        <td><div id="23일 휨ng"></div></td>
        <td><div id="24일 휨ng"></div></td>
        <td><div id="25일 휨ng"></div></td>
        <td><div id="26일 휨ng"></div></td>
        <td><div id="27일 휨ng"></div></td>
        <td><div id="28일 휨ng"></div></td>
        <td><div id="29일 휨ng"></div></td>
        <td><div id="30일 휨ng"></div></td>
        <td><div id="31일 휨ng"></div></td>
        <th class="alert-warning border border-secondary text-dark"><div id="휨ng 일평균"></div></th>
        <th class="alert-warning border border-secondary text-dark"><div id="휨ng 합계"></div></th>
      </tr>
      <tr>
        <th style="position: sticky; left: 0;" class="alert-secondary border border-secondary">웰드라인</th>
        <td><div id="01일 weld ng"></div></td>
        <td><div id="02일 weld ng"></div></td>
        <td><div id="03일 weld ng"></div></td>
        <td><div id="04일 weld ng"></div></td>
        <td><div id="05일 weld ng"></div></td>
        <td><div id="06일 weld ng"></div></td>
        <td><div id="07일 weld ng"></div></td>
        <td><div id="08일 weld ng"></div></td>
        <td><div id="09일 weld ng"></div></td>
        <td><div id="10일 weld ng"></div></td>
        <td><div id="11일 weld ng"></div></td>
        <td><div id="12일 weld ng"></div></td>
        <td><div id="13일 weld ng"></div></td>
        <td><div id="14일 weld ng"></div></td>
        <td><div id="15일 weld ng"></div></td>
        <td><div id="16일 weld ng"></div></td>
        <td><div id="17일 weld ng"></div></td>
        <td><div id="18일 weld ng"></div></td>
        <td><div id="19일 weld ng"></div></td>
        <td><div id="20일 weld ng"></div></td>
        <td><div id="21일 weld ng"></div></td>
        <td><div id="22일 weld ng"></div></td>
        <td><div id="23일 weld ng"></div></td>
        <td><div id="24일 weld ng"></div></td>
        <td><div id="25일 weld ng"></div></td>
        <td><div id="26일 weld ng"></div></td>
        <td><div id="27일 weld ng"></div></td>
        <td><div id="28일 weld ng"></div></td>
        <td><div id="29일 weld ng"></div></td>
        <td><div id="30일 weld ng"></div></td>
        <td><div id="31일 weld ng"></div></td>
        <th class="alert-warning border border-secondary text-dark"><div id="weld ng 일평균"></div></th>
        <th class="alert-warning border border-secondary text-dark"><div id="weld ng 합계"></div></th>
      </tr>
      <tr>
        <th style="position: sticky; left: 0;" class="alert-secondary border border-secondary">기타불량</th>
        <td><div id="01일 etc ng"></div></td>
        <td><div id="02일 etc ng"></div></td>
        <td><div id="03일 etc ng"></div></td>
        <td><div id="04일 etc ng"></div></td>
        <td><div id="05일 etc ng"></div></td>
        <td><div id="06일 etc ng"></div></td>
        <td><div id="07일 etc ng"></div></td>
        <td><div id="08일 etc ng"></div></td>
        <td><div id="09일 etc ng"></div></td>
        <td><div id="10일 etc ng"></div></td>
        <td><div id="11일 etc ng"></div></td>
        <td><div id="12일 etc ng"></div></td>
        <td><div id="13일 etc ng"></div></td>
        <td><div id="14일 etc ng"></div></td>
        <td><div id="15일 etc ng"></div></td>
        <td><div id="16일 etc ng"></div></td>
        <td><div id="17일 etc ng"></div></td>
        <td><div id="18일 etc ng"></div></td>
        <td><div id="19일 etc ng"></div></td>
        <td><div id="20일 etc ng"></div></td>
        <td><div id="21일 etc ng"></div></td>
        <td><div id="22일 etc ng"></div></td>
        <td><div id="23일 etc ng"></div></td>
        <td><div id="24일 etc ng"></div></td>
        <td><div id="25일 etc ng"></div></td>
        <td><div id="26일 etc ng"></div></td>
        <td><div id="27일 etc ng"></div></td>
        <td><div id="28일 etc ng"></div></td>
        <td><div id="29일 etc ng"></div></td>
        <td><div id="30일 etc ng"></div></td>
        <td><div id="31일 etc ng"></div></td>
        <th class="alert-warning border border-secondary text-dark"><div id="etc ng 일평균"></div></th>
        <th class="alert-warning border border-secondary text-dark"><div id="etc ng 합계"></div></th>
      </tr>
      <tr>
        <th style="position: sticky; left: 0;" class="alert-secondary border border-secondary" >불량 합계</th>
        <td><div id="01일 daily ng"></div></td>
        <td><div id="02일 daily ng"></div></td>
        <td><div id="03일 daily ng"></div></td>
        <td><div id="04일 daily ng"></div></td>
        <td><div id="05일 daily ng"></div></td>
        <td><div id="06일 daily ng"></div></td>
        <td><div id="07일 daily ng"></div></td>
        <td><div id="08일 daily ng"></div></td>
        <td><div id="09일 daily ng"></div></td>
        <td><div id="10일 daily ng"></div></td>
        <td><div id="11일 daily ng"></div></td>
        <td><div id="12일 daily ng"></div></td>
        <td><div id="13일 daily ng"></div></td>
        <td><div id="14일 daily ng"></div></td>
        <td><div id="15일 daily ng"></div></td>
        <td><div id="16일 daily ng"></div></td>
        <td><div id="17일 daily ng"></div></td>
        <td><div id="18일 daily ng"></div></td>
        <td><div id="19일 daily ng"></div></td>
        <td><div id="20일 daily ng"></div></td>
        <td><div id="21일 daily ng"></div></td>
        <td><div id="22일 daily ng"></div></td>
        <td><div id="23일 daily ng"></div></td>
        <td><div id="24일 daily ng"></div></td>
        <td><div id="25일 daily ng"></div></td>
        <td><div id="26일 daily ng"></div></td>
        <td><div id="27일 daily ng"></div></td>
        <td><div id="28일 daily ng"></div></td>
        <td><div id="29일 daily ng"></div></td>
        <td><div id="30일 daily ng"></div></td>
        <td><div id="31일 daily ng"></div></td>
        <th class="alert-warning border border-secondary text-dark"><div id="daily ng 일평균"></div></th>
        <th class="alert-warning border border-secondary text-dark"><div id="total ng"></div></th>
      </tr> -->
		</thead>
	</table>
	<script>
		var i1
		var 불량수량 = i1

		i1 = document.getElementById('01일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "01' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "01' and conclusion1 >=1 order by id";
						}
						$res01 = mysqli_query($conn, $sql01);
						for ($countALL01 = 0; $row01 = mysqli_fetch_array($res01); $countALL01++) {
						}
						echo number_format($countALL01, 0); ?>'; //1일 치수불량 call
		i1 = document.getElementById('02일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "02' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "02' and conclusion1 >=1 order by id";
						}
						$res02 = mysqli_query($conn, $sql01);
						for ($countALL02 = 0; $row02 = mysqli_fetch_array($res02); $countALL02++) {
						}
						echo number_format($countALL02, 0); ?>'; //2일 치수불량 call
		i1 = document.getElementById('03일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "03' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "03' and conclusion1 >=1 order by id";
						}
						$res03 = mysqli_query($conn, $sql01);
						for ($countALL03 = 0; $row03 = mysqli_fetch_array($res03); $countALL03++) {
						}
						echo number_format($countALL03, 0); ?>'; //3일 치수불량 call
		i1 = document.getElementById('04일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "04' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "04' and conclusion1 >=1 order by id";
						}
						$res04 = mysqli_query($conn, $sql01);
						for ($countALL04 = 0; $row04 = mysqli_fetch_array($res04); $countALL04++) {
						}
						echo number_format($countALL04, 0); ?>'; //4일 치수불량 call
		i1 = document.getElementById('05일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "05' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "05' and conclusion1 >=1 order by id";
						}
						$res05 = mysqli_query($conn, $sql01);
						for ($countALL05 = 0; $row05 = mysqli_fetch_array($res05); $countALL05++) {
						}
						echo number_format($countALL05, 0); ?>'; //5일 치수불량 call
		i1 = document.getElementById('06일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "06' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "06' and conclusion1 >=1 order by id";
						}
						$res06 = mysqli_query($conn, $sql01);
						for ($countALL06 = 0; $row06 = mysqli_fetch_array($res06); $countALL06++) {
						}
						echo number_format($countALL06, 0); ?>'; //6일 치수불량 call
		i1 = document.getElementById('07일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "07' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "07' and conclusion1 >=1 order by id";
						}
						$res07 = mysqli_query($conn, $sql01);
						for ($countALL07 = 0; $row07 = mysqli_fetch_array($res07); $countALL07++) {
						}
						echo number_format($countALL07, 0); ?>'; //7일 치수불량 call
		i1 = document.getElementById('08일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "08' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "08' and conclusion1 >=1 order by id";
						}
						$res08 = mysqli_query($conn, $sql01);
						for ($countALL08 = 0; $row08 = mysqli_fetch_array($res08); $countALL08++) {
						}
						echo number_format($countALL08, 0); ?>'; //8일 치수불량 call
		i1 = document.getElementById('09일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "09' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "09' and conclusion1 >=1 order by id";
						}
						$res09 = mysqli_query($conn, $sql01);
						for ($countALL09 = 0; $row09 = mysqli_fetch_array($res09); $countALL09++) {
						}
						echo number_format($countALL09, 0); ?>'; //9일 치수불량 call
		i1 = document.getElementById('10일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "10' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "10' and conclusion1 >=1 order by id";
						}
						$res10 = mysqli_query($conn, $sql01);
						for ($countALL10 = 0; $row10 = mysqli_fetch_array($res10); $countALL10++) {
						}
						echo number_format($countALL10, 0); ?>'; //10일 치수불량 call
		i1 = document.getElementById('11일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "11' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "11' and conclusion1 >=1 order by id";
						}
						$res11 = mysqli_query($conn, $sql01);
						for ($countALL11 = 0; $row11 = mysqli_fetch_array($res11); $countALL11++) {
						}
						echo number_format($countALL11, 0); ?>'; //11일 치수불량 call
		i1 = document.getElementById('12일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "12' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "12' and conclusion1 >=1 order by id";
						}
						$res12 = mysqli_query($conn, $sql01);
						for ($countALL12 = 0; $row12 = mysqli_fetch_array($res12); $countALL12++) {
						}
						echo number_format($countALL12, 0); ?>'; //12일 치수불량 call
		i1 = document.getElementById('13일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "13' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "13' and conclusion1 >=1 order by id";
						}
						$res13 = mysqli_query($conn, $sql01);
						for ($countALL13 = 0; $row13 = mysqli_fetch_array($res13); $countALL13++) {
						}
						echo number_format($countALL13, 0); ?>'; //13일 치수불량 call
		i1 = document.getElementById('14일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "14' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "14' and conclusion1 >=1 order by id";
						}
						$res14 = mysqli_query($conn, $sql01);
						for ($countALL14 = 0; $row14 = mysqli_fetch_array($res14); $countALL14++) {
						}
						echo number_format($countALL14, 0); ?>'; //14일 치수불량 call
		i1 = document.getElementById('15일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "15' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "15' and conclusion1 >=1 order by id";
						}
						$res15 = mysqli_query($conn, $sql01);
						for ($countALL15 = 0; $row15 = mysqli_fetch_array($res15); $countALL15++) {
						}
						echo number_format($countALL15, 0); ?>'; //15일 치수불량 call
		i1 = document.getElementById('16일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "16' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "16' and conclusion1 >=1 order by id";
						}
						$res16 = mysqli_query($conn, $sql01);
						for ($countALL16 = 0; $row16 = mysqli_fetch_array($res16); $countALL16++) {
						}
						echo number_format($countALL16, 0); ?>'; //16일 치수불량 call
		i1 = document.getElementById('17일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "17' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "17' and conclusion1 >=1 order by id";
						}
						$res17 = mysqli_query($conn, $sql01);
						for ($countALL17 = 0; $row17 = mysqli_fetch_array($res17); $countALL17++) {
						}
						echo number_format($countALL17, 0); ?>'; //17일 치수불량 call
		i1 = document.getElementById('18일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "18' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "18' and conclusion1 >=1 order by id";
						}
						$res18 = mysqli_query($conn, $sql01);
						for ($countALL18 = 0; $row18 = mysqli_fetch_array($res18); $countALL18++) {
						}
						echo number_format($countALL18, 0); ?>'; //18일 치수불량 call
		i1 = document.getElementById('19일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "19' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "19' and conclusion1 >=1 order by id";
						}
						$res19 = mysqli_query($conn, $sql01);
						for ($countALL19 = 0; $row19 = mysqli_fetch_array($res19); $countALL19++) {
						}
						echo number_format($countALL19, 0); ?>'; //19일 치수불량 call
		i1 = document.getElementById('20일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "20' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "20' and conclusion1 >=1 order by id";
						}
						$res20 = mysqli_query($conn, $sql01);
						for ($countALL20 = 0; $row20 = mysqli_fetch_array($res20); $countALL20++) {
						}
						echo number_format($countALL20, 0); ?>'; //20일 치수불량 call
		i1 = document.getElementById('21일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "21' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "21' and conclusion1 >=1 order by id";
						}
						$res21 = mysqli_query($conn, $sql01);
						for ($countALL21 = 0; $row21 = mysqli_fetch_array($res21); $countALL21++) {
						}
						echo number_format($countALL21, 0); ?>'; //21일 치수불량 call
		i1 = document.getElementById('22일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "22' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "22' and conclusion1 >=1 order by id";
						}
						$res22 = mysqli_query($conn, $sql01);
						for ($countALL22 = 0; $row22 = mysqli_fetch_array($res22); $countALL22++) {
						}
						echo number_format($countALL22, 0); ?>'; //22일 치수불량 call
		i1 = document.getElementById('23일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "23' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "23' and conclusion1 >=1 order by id";
						}
						$res23 = mysqli_query($conn, $sql01);
						for ($countALL23 = 0; $row23 = mysqli_fetch_array($res23); $countALL23++) {
						}
						echo number_format($countALL23, 0); ?>'; //23일 치수불량 call
		i1 = document.getElementById('24일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "24' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "24' and conclusion1 >=1 order by id";
						}
						$res24 = mysqli_query($conn, $sql01);
						for ($countALL24 = 0; $row24 = mysqli_fetch_array($res24); $countALL24++) {
						}
						echo number_format($countALL24, 0); ?>'; //24일 치수불량 call
		i1 = document.getElementById('25일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "25' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "25' and conclusion1 >=1 order by id";
						}
						$res25 = mysqli_query($conn, $sql01);
						for ($countALL25 = 0; $row25 = mysqli_fetch_array($res25); $countALL25++) {
						}
						echo number_format($countALL25, 0); ?>'; //25일 치수불량 call
		i1 = document.getElementById('26일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "26' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "26' and conclusion1 >=1 order by id";
						}
						$res26 = mysqli_query($conn, $sql01);
						for ($countALL26 = 0; $row26 = mysqli_fetch_array($res26); $countALL26++) {
						}
						echo number_format($countALL26, 0); ?>'; //26일 치수불량 call
		i1 = document.getElementById('27일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "27' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "27' and conclusion1 >=1 order by id";
						}
						$res27 = mysqli_query($conn, $sql01);
						for ($countALL27 = 0; $row27 = mysqli_fetch_array($res27); $countALL27++) {
						}
						echo number_format($countALL27, 0); ?>'; //27일 치수불량 call
		i1 = document.getElementById('28일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "28' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "28' and conclusion1 >=1 order by id";
						}
						$res28 = mysqli_query($conn, $sql01);
						for ($countALL28 = 0; $row28 = mysqli_fetch_array($res28); $countALL28++) {
						}
						echo number_format($countALL28, 0); ?>'; //28일 치수불량 call
		i1 = document.getElementById('29일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "29' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "29' and conclusion1 >=1 order by id";
						}
						$res29 = mysqli_query($conn, $sql01);
						for ($countALL29 = 0; $row29 = mysqli_fetch_array($res29); $countALL29++) {
						}
						echo number_format($countALL29, 0); ?>'; //29일 치수불량 call
		i1 = document.getElementById('30일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "30' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "30' and conclusion1 >=1 order by id";
						}
						$res30 = mysqli_query($conn, $sql01);
						for ($countALL30 = 0; $row30 = mysqli_fetch_array($res30); $countALL30++) {
						}
						echo number_format($countALL30, 0); ?>'; //30일 치수불량 call
		i1 = document.getElementById('31일 countALL');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date = '" . $sDate . "31' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date = '" . $cDate . "31' and conclusion1 >=1 order by id";
						}
						$res31 = mysqli_query($conn, $sql01);
						for ($countALL31 = 0; $row31 = mysqli_fetch_array($res31); $countALL31++) {
						}
						echo number_format($countALL31, 0); ?>'; //31일 치수불량 call
		i1 = document.getElementById('countALL 일평균');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql01 = "select * from result1 where date >= '" . $sDate . "01' and date <= '" . $sDate . "31' and index1 = '" . $i_no . "' and conclusion1 >=1 order by id";
						} else {
							$sql01 = "select * from result1 where date >= '" . $cDate . "01' and date <= '" . $sDate . "31' and conclusion1 >=1 order by id";
						}
						$res00 = mysqli_query($conn, $sql01);
						for ($countALLT = 0; $row00 = mysqli_fetch_array($res00); $countALLT++) {
						}
						$avecountALL = $countALLT / 31;
						echo number_format($avecountALL, 2); ?>';
		i1 = document.getElementById('countALL 합계');
		i1.innerText = '<?php echo number_format($countALLT, 0); ?>';

		i1 = document.getElementById('01일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "01' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "01' and conclusion1 = 30 order by id";
						}
						$res01 = mysqli_query($conn, $sql02);
						for ($countNG01 = 0; $row01 = mysqli_fetch_array($res01); $countNG01++) {
						}
						echo number_format($countNG01, 0); ?>'; //01일 count ng
		i1 = document.getElementById('02일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "02' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "02' and conclusion1 = 30 order by id";
						}
						$res02 = mysqli_query($conn, $sql02);
						for ($countNG02 = 0; $row02 = mysqli_fetch_array($res02); $countNG02++) {
						}
						echo number_format($countNG02, 0); ?>'; //02일 count ng
		i1 = document.getElementById('03일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "03' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "03' and conclusion1 = 30 order by id";
						}
						$res03 = mysqli_query($conn, $sql02);
						for ($countNG03 = 0; $row03 = mysqli_fetch_array($res03); $countNG03++) {
						}
						echo number_format($countNG03, 0); ?>'; //03일 count ng
		i1 = document.getElementById('04일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "04' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "04' and conclusion1 = 30 order by id";
						}
						$res04 = mysqli_query($conn, $sql02);
						for ($countNG04 = 0; $row04 = mysqli_fetch_array($res04); $countNG04++) {
						}
						echo number_format($countNG04, 0); ?>'; //04일 count ng
		i1 = document.getElementById('05일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "05' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "05' and conclusion1 = 30 order by id";
						}
						$res05 = mysqli_query($conn, $sql02);
						for ($countNG05 = 0; $row05 = mysqli_fetch_array($res05); $countNG05++) {
						}
						echo number_format($countNG05, 0); ?>'; //05일 count ng
		i1 = document.getElementById('06일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "06' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "06' and conclusion1 = 30 order by id";
						}
						$res06 = mysqli_query($conn, $sql02);
						for ($countNG06 = 0; $row06 = mysqli_fetch_array($res06); $countNG06++) {
						}
						echo number_format($countNG06, 0); ?>'; //06일 count ng
		i1 = document.getElementById('07일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "07' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "07' and conclusion1 = 30 order by id";
						}
						$res07 = mysqli_query($conn, $sql02);
						for ($countNG07 = 0; $row07 = mysqli_fetch_array($res07); $countNG07++) {
						}
						echo number_format($countNG07, 0); ?>'; //07일 count ng
		i1 = document.getElementById('08일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "08' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "08' and conclusion1 = 30 order by id";
						}
						$res08 = mysqli_query($conn, $sql02);
						for ($countNG08 = 0; $row08 = mysqli_fetch_array($res08); $countNG08++) {
						}
						echo number_format($countNG08, 0); ?>'; //08일 count ng
		i1 = document.getElementById('09일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "09' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "09' and conclusion1 = 30 order by id";
						}
						$res09 = mysqli_query($conn, $sql02);
						for ($countNG09 = 0; $row09 = mysqli_fetch_array($res09); $countNG09++) {
						}
						echo number_format($countNG09, 0); ?>'; //09일 count ng
		i1 = document.getElementById('10일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "10' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "10' and conclusion1 = 30 order by id";
						}
						$res10 = mysqli_query($conn, $sql02);
						for ($countNG10 = 0; $row10 = mysqli_fetch_array($res10); $countNG10++) {
						}
						echo number_format($countNG10, 0); ?>'; //10일 count ng
		i1 = document.getElementById('11일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "11' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "11' and conclusion1 = 30 order by id";
						}
						$res11 = mysqli_query($conn, $sql02);
						for ($countNG11 = 0; $row11 = mysqli_fetch_array($res11); $countNG11++) {
						}
						echo number_format($countNG11, 0); ?>'; //11일 count ng
		i1 = document.getElementById('12일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "12' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "12' and conclusion1 = 30 order by id";
						}
						$res12 = mysqli_query($conn, $sql02);
						for ($countNG12 = 0; $row12 = mysqli_fetch_array($res12); $countNG12++) {
						}
						echo number_format($countNG12, 0); ?>'; //12일 count ng
		i1 = document.getElementById('13일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "13' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "13' and conclusion1 = 30 order by id";
						}
						$res13 = mysqli_query($conn, $sql02);
						for ($countNG13 = 0; $row13 = mysqli_fetch_array($res13); $countNG13++) {
						}
						echo number_format($countNG13, 0); ?>'; //13일 count ng
		i1 = document.getElementById('14일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "14' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "14' and conclusion1 = 30 order by id";
						}
						$res14 = mysqli_query($conn, $sql02);
						for ($countNG14 = 0; $row14 = mysqli_fetch_array($res14); $countNG14++) {
						}
						echo number_format($countNG14, 0); ?>'; //14일 count ng
		i1 = document.getElementById('15일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "15' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "15' and conclusion1 = 30 order by id";
						}
						$res15 = mysqli_query($conn, $sql02);
						for ($countNG15 = 0; $row15 = mysqli_fetch_array($res15); $countNG15++) {
						}
						echo number_format($countNG15, 0); ?>'; //15일 count ng
		i1 = document.getElementById('16일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "16' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "16' and conclusion1 = 30 order by id";
						}
						$res16 = mysqli_query($conn, $sql02);
						for ($countNG16 = 0; $row16 = mysqli_fetch_array($res16); $countNG16++) {
						}
						echo number_format($countNG16, 0); ?>'; //16일 count ng
		i1 = document.getElementById('17일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "17' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "17' and conclusion1 = 30 order by id";
						}
						$res17 = mysqli_query($conn, $sql02);
						for ($countNG17 = 0; $row17 = mysqli_fetch_array($res17); $countNG17++) {
						}
						echo number_format($countNG17, 0); ?>'; //17일 count ng
		i1 = document.getElementById('18일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "18' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "18' and conclusion1 = 30 order by id";
						}
						$res18 = mysqli_query($conn, $sql02);
						for ($countNG18 = 0; $row18 = mysqli_fetch_array($res18); $countNG18++) {
						}
						echo number_format($countNG18, 0); ?>'; //18일 count ng
		i1 = document.getElementById('19일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "19' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "19' and conclusion1 = 30 order by id";
						}
						$res19 = mysqli_query($conn, $sql02);
						for ($countNG19 = 0; $row19 = mysqli_fetch_array($res19); $countNG19++) {
						}
						echo number_format($countNG19, 0); ?>'; //19일 count ng
		i1 = document.getElementById('20일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "20' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "20' and conclusion1 = 30 order by id";
						}
						$res20 = mysqli_query($conn, $sql02);
						for ($countNG20 = 0; $row20 = mysqli_fetch_array($res20); $countNG20++) {
						}
						echo number_format($countNG20, 0); ?>'; //20일 count ng
		i1 = document.getElementById('21일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "21' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "21' and conclusion1 = 30 order by id";
						}
						$res21 = mysqli_query($conn, $sql02);
						for ($countNG21 = 0; $row21 = mysqli_fetch_array($res21); $countNG21++) {
						}
						echo number_format($countNG21, 0); ?>'; //21일 count ng
		i1 = document.getElementById('22일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "22' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "22' and conclusion1 = 30 order by id";
						}
						$res22 = mysqli_query($conn, $sql02);
						for ($countNG22 = 0; $row22 = mysqli_fetch_array($res22); $countNG22++) {
						}
						echo number_format($countNG22, 0); ?>'; //22일 count ng
		i1 = document.getElementById('23일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "23' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "23' and conclusion1 = 30 order by id";
						}
						$res23 = mysqli_query($conn, $sql02);
						for ($countNG23 = 0; $row23 = mysqli_fetch_array($res23); $countNG23++) {
						}
						echo number_format($countNG23, 0); ?>'; //23일 count ng
		i1 = document.getElementById('24일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "24' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "24' and conclusion1 = 30 order by id";
						}
						$res24 = mysqli_query($conn, $sql02);
						for ($countNG24 = 0; $row24 = mysqli_fetch_array($res24); $countNG24++) {
						}
						echo number_format($countNG24, 0); ?>'; //24일 count ng
		i1 = document.getElementById('25일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "25' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "25' and conclusion1 = 30 order by id";
						}
						$res25 = mysqli_query($conn, $sql02);
						for ($countNG25 = 0; $row25 = mysqli_fetch_array($res25); $countNG25++) {
						}
						echo number_format($countNG25, 0); ?>'; //25일 count ng
		i1 = document.getElementById('26일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "26' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "26' and conclusion1 = 30 order by id";
						}
						$res26 = mysqli_query($conn, $sql02);
						for ($countNG26 = 0; $row26 = mysqli_fetch_array($res26); $countNG26++) {
						}
						echo number_format($countNG26, 0); ?>'; //26일 count ng
		i1 = document.getElementById('27일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "27' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "27' and conclusion1 = 30 order by id";
						}
						$res27 = mysqli_query($conn, $sql02);
						for ($countNG27 = 0; $row27 = mysqli_fetch_array($res27); $countNG27++) {
						}
						echo number_format($countNG27, 0); ?>'; //27일 count ng
		i1 = document.getElementById('28일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "28' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "28' and conclusion1 = 30 order by id";
						}
						$res28 = mysqli_query($conn, $sql02);
						for ($countNG28 = 0; $row28 = mysqli_fetch_array($res28); $countNG28++) {
						}
						echo number_format($countNG28, 0); ?>'; //28일 count ng
		i1 = document.getElementById('29일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "29' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "29' and conclusion1 = 30 order by id";
						}
						$res29 = mysqli_query($conn, $sql02);
						for ($countNG29 = 0; $row29 = mysqli_fetch_array($res29); $countNG29++) {
						}
						echo number_format($countNG29, 0); ?>'; //29일 count ng
		i1 = document.getElementById('30일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "30' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "30' and conclusion1 = 30 order by id";
						}
						$res30 = mysqli_query($conn, $sql02);
						for ($countNG30 = 0; $row30 = mysqli_fetch_array($res30); $countNG30++) {
						}
						echo number_format($countNG30, 0); ?>'; //30일 count ng
		i1 = document.getElementById('31일 count ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date = '" . $sDate . "31' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date = '" . $sDate . "31' and conclusion1 = 30 order by id";
						}
						$res31 = mysqli_query($conn, $sql02);
						for ($countNG31 = 0; $row31 = mysqli_fetch_array($res31); $countNG31++) {
						}
						echo number_format($countNG31, 0); ?>'; //31일 count ng
		i1 = document.getElementById('count ng 일평균');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql02 = "select * from result1 where date >= '" . $sDate . "01' and date <= '" . $sDate . "31' and index1 = '" . $i_no . "' and conclusion1 >=2 order by id";
						} else {
							$sql02 = "select * from result1 where date >= '" . $sDate . "01' and date <= '" . $sDate . "31' and conclusion1 = 30 order by id";
						}
						$res00 = mysqli_query($conn, $sql02);
						for ($countNGT = 0; $row00 = mysqli_fetch_array($res00); $countNGT++) {
						}
						$avecountNG = $countNGT / 31;
						echo number_format($avecountNG, 2); ?>';

		i1 = document.getElementById('count ng 합계');
		i1.innerText = '<?php echo number_format($countNGT, 0); ?>';

		i1 = document.getElementById('01일 불량률');
		i1.innerText = '<?php $ng01_percent = ($countNG01 / $countALL01) * 100;
						echo number_format($ng01_percent, 2); ?>';
		i1 = document.getElementById('02일 불량률');
		i1.innerText = '<?php $ng02_percent = ($countNG02 / $countALL02) * 100;
						echo number_format($ng02_percent, 2); ?>';
		i1 = document.getElementById('03일 불량률');
		i1.innerText = '<?php $ng03_percent = ($countNG03 / $countALL03) * 100;
						echo number_format($ng03_percent, 2); ?>';
		i1 = document.getElementById('04일 불량률');
		i1.innerText = '<?php $ng04_percent = ($countNG04 / $countALL04) * 100;
						echo number_format($ng04_percent, 2); ?>';
		i1 = document.getElementById('05일 불량률');
		i1.innerText = '<?php $ng05_percent = ($countNG05 / $countALL05) * 100;
						echo number_format($ng05_percent, 2); ?>';
		i1 = document.getElementById('06일 불량률');
		i1.innerText = '<?php $ng06_percent = ($countNG06 / $countALL06) * 100;
						echo number_format($ng06_percent, 2); ?>';
		i1 = document.getElementById('07일 불량률');
		i1.innerText = '<?php $ng07_percent = ($countNG07 / $countALL07) * 100;
						echo number_format($ng07_percent, 2); ?>';
		i1 = document.getElementById('08일 불량률');
		i1.innerText = '<?php $ng08_percent = ($countNG08 / $countALL08) * 100;
						echo number_format($ng08_percent, 2); ?>';
		i1 = document.getElementById('09일 불량률');
		i1.innerText = '<?php $ng09_percent = ($countNG09 / $countALL09) * 100;
						echo number_format($ng09_percent, 2); ?>';
		i1 = document.getElementById('10일 불량률');
		i1.innerText = '<?php $ng10_percent = ($countNG10 / $countALL10) * 100;
						echo number_format($ng10_percent, 2); ?>';
		i1 = document.getElementById('11일 불량률');
		i1.innerText = '<?php $ng11_percent = ($countNG11 / $countALL11) * 100;
						echo number_format($ng11_percent, 2); ?>';
		i1 = document.getElementById('12일 불량률');
		i1.innerText = '<?php $ng12_percent = ($countNG12 / $countALL12) * 100;
						echo number_format($ng12_percent, 2); ?>';
		i1 = document.getElementById('13일 불량률');
		i1.innerText = '<?php $ng13_percent = ($countNG13 / $countALL13) * 100;
						echo number_format($ng13_percent, 2); ?>';
		i1 = document.getElementById('14일 불량률');
		i1.innerText = '<?php $ng14_percent = ($countNG14 / $countALL14) * 100;
						echo number_format($ng14_percent, 2); ?>';
		i1 = document.getElementById('15일 불량률');
		i1.innerText = '<?php $ng15_percent = ($countNG15 / $countALL15) * 100;
						echo number_format($ng15_percent, 2); ?>';
		i1 = document.getElementById('16일 불량률');
		i1.innerText = '<?php $ng16_percent = ($countNG16 / $countALL16) * 100;
						echo number_format($ng16_percent, 2); ?>';
		i1 = document.getElementById('17일 불량률');
		i1.innerText = '<?php $ng17_percent = ($countNG17 / $countALL17) * 100;
						echo number_format($ng17_percent, 2); ?>';
		i1 = document.getElementById('18일 불량률');
		i1.innerText = '<?php $ng18_percent = ($countNG18 / $countALL18) * 100;
						echo number_format($ng18_percent, 2); ?>';
		i1 = document.getElementById('19일 불량률');
		i1.innerText = '<?php $ng19_percent = ($countNG19 / $countALL19) * 100;
						echo number_format($ng19_percent, 2); ?>';
		i1 = document.getElementById('20일 불량률');
		i1.innerText = '<?php $ng20_percent = ($countNG20 / $countALL20) * 100;
						echo number_format($ng20_percent, 2); ?>';
		i1 = document.getElementById('21일 불량률');
		i1.innerText = '<?php $ng21_percent = ($countNG21 / $countALL21) * 100;
						echo number_format($ng21_percent, 2); ?>';
		i1 = document.getElementById('22일 불량률');
		i1.innerText = '<?php $ng22_percent = ($countNG22 / $countALL22) * 100;
						echo number_format($ng22_percent, 2); ?>';
		i1 = document.getElementById('23일 불량률');
		i1.innerText = '<?php $ng23_percent = ($countNG23 / $countALL23) * 100;
						echo number_format($ng23_percent, 2); ?>';
		i1 = document.getElementById('24일 불량률');
		i1.innerText = '<?php $ng24_percent = ($countNG24 / $countALL24) * 100;
						echo number_format($ng24_percent, 2); ?>';
		i1 = document.getElementById('25일 불량률');
		i1.innerText = '<?php $ng25_percent = ($countNG25 / $countALL25) * 100;
						echo number_format($ng25_percent, 2); ?>';
		i1 = document.getElementById('26일 불량률');
		i1.innerText = '<?php $ng26_percent = ($countNG26 / $countALL26) * 100;
						echo number_format($ng26_percent, 2); ?>';
		i1 = document.getElementById('27일 불량률');
		i1.innerText = '<?php $ng27_percent = ($countNG27 / $countALL27) * 100;
						echo number_format($ng27_percent, 2); ?>';
		i1 = document.getElementById('28일 불량률');
		i1.innerText = '<?php $ng28_percent = ($countNG28 / $countALL28) * 100;
						echo number_format($ng28_percent, 2); ?>';
		i1 = document.getElementById('29일 불량률');
		i1.innerText = '<?php $ng29_percent = ($countNG29 / $countALL29) * 100;
						echo number_format($ng29_percent, 2); ?>';
		i1 = document.getElementById('30일 불량률');
		i1.innerText = '<?php $ng30_percent = ($countNG30 / $countALL30) * 100;
						echo number_format($ng30_percent, 2); ?>';
		i1 = document.getElementById('31일 불량률');
		i1.innerText = '<?php $ng31_percent = ($countNG31 / $countALL31) * 100;
						echo number_format($ng31_percent, 2); ?>';
		i1 = document.getElementById('일평균 불량률');
		i1.innerText = '<?php $sumNg = ($ng01_percent + $ng02_percent + $ng03_percent + $ng04_percent + $ng05_percent + $ng06_percent + $ng07_percent + $ng08_percent + $ng09_percent + $ng10_percent + $ng11_percent + $ng12_percent + $ng13_percent + $ng14_percent + $ng15_percent + $ng16_percent + $ng17_percent + $ng18_percent + $ng19_percent + $ng20_percent + $ng21_percent + $ng22_percent + $ng23_percent + $ng24_percent + $ng25_percent + $ng26_percent + $ng27_percent + $ng28_percent + $ng29_percent + $ng30_percent + $ng31_percent);
						echo number_format($sumNg / 31, 2); ?>';
		i1 = document.getElementById('합계 불량률');
		i1.innerText = '<?php echo number_format($sumNg, 2); ?>';

		i1 = document.getElementById('01일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "01' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "01' and conclusion1 = 20 order by id";
						}
						$res01 = mysqli_query($conn, $sql03);
						for ($LVDTNG01 = 0; $row01 = mysqli_fetch_array($res01); $LVDTNG01++) {
						}
						echo number_format($LVDTNG01, 0); ?>'; //01일 LVDT ng
		i1 = document.getElementById('02일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "02' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "02' and conclusion1 = 20 order by id";
						}
						$res02 = mysqli_query($conn, $sql03);
						for ($LVDTNG02 = 0; $row02 = mysqli_fetch_array($res02); $LVDTNG02++) {
						}
						echo number_format($LVDTNG02, 0); ?>'; //02일 LVDT ng
		i1 = document.getElementById('03일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "03' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "03' and conclusion1 = 20 order by id";
						}
						$res03 = mysqli_query($conn, $sql03);
						for ($LVDTNG03 = 0; $row03 = mysqli_fetch_array($res03); $LVDTNG03++) {
						}
						echo number_format($LVDTNG03, 0); ?>'; //03일 LVDT ng
		i1 = document.getElementById('04일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "04' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "04' and conclusion1 = 20 order by id";
						}
						$res04 = mysqli_query($conn, $sql03);
						for ($LVDTNG04 = 0; $row04 = mysqli_fetch_array($res04); $LVDTNG04++) {
						}
						echo number_format($LVDTNG04, 0); ?>'; //04일 LVDT ng
		i1 = document.getElementById('05일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "05' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "05' and conclusion1 = 20 order by id";
						}
						$res05 = mysqli_query($conn, $sql03);
						for ($LVDTNG05 = 0; $row05 = mysqli_fetch_array($res05); $LVDTNG05++) {
						}
						echo number_format($LVDTNG05, 0); ?>'; //05일 LVDT ng
		i1 = document.getElementById('06일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "06' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "06' and conclusion1 = 20 order by id";
						}
						$res06 = mysqli_query($conn, $sql03);
						for ($LVDTNG06 = 0; $row06 = mysqli_fetch_array($res06); $LVDTNG06++) {
						}
						echo number_format($LVDTNG06, 0); ?>'; //06일 LVDT ng
		i1 = document.getElementById('07일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "07' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "07' and conclusion1 = 20 order by id";
						}
						$res07 = mysqli_query($conn, $sql03);
						for ($LVDTNG07 = 0; $row07 = mysqli_fetch_array($res07); $LVDTNG07++) {
						}
						echo number_format($LVDTNG07, 0); ?>'; //07일 LVDT ng
		i1 = document.getElementById('08일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "08' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "08' and conclusion1 = 20 order by id";
						}
						$res08 = mysqli_query($conn, $sql03);
						for ($LVDTNG08 = 0; $row08 = mysqli_fetch_array($res08); $LVDTNG08++) {
						}
						echo number_format($LVDTNG08, 0); ?>'; //08일 LVDT ng
		i1 = document.getElementById('09일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "09' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "09' and conclusion1 = 20 order by id";
						}
						$res09 = mysqli_query($conn, $sql03);
						for ($LVDTNG09 = 0; $row09 = mysqli_fetch_array($res09); $LVDTNG09++) {
						}
						echo number_format($LVDTNG09, 0); ?>'; //09일 LVDT ng
		i1 = document.getElementById('10일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "10' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "10' and conclusion1 = 20 order by id";
						}
						$res10 = mysqli_query($conn, $sql03);
						for ($LVDTNG10 = 0; $row10 = mysqli_fetch_array($res10); $LVDTNG10++) {
						}
						echo number_format($LVDTNG10, 0); ?>'; //10일 LVDT ng
		i1 = document.getElementById('11일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "11' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "11' and conclusion1 = 20 order by id";
						}
						$res11 = mysqli_query($conn, $sql03);
						for ($LVDTNG11 = 0; $row11 = mysqli_fetch_array($res11); $LVDTNG11++) {
						}
						echo number_format($LVDTNG11, 0); ?>'; //11일 LVDT ng
		i1 = document.getElementById('12일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "12' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "12' and conclusion1 = 20 order by id";
						}
						$res12 = mysqli_query($conn, $sql03);
						for ($LVDTNG12 = 0; $row12 = mysqli_fetch_array($res12); $LVDTNG12++) {
						}
						echo number_format($LVDTNG12, 0); ?>'; //12일 LVDT ng
		i1 = document.getElementById('13일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "13' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "13' and conclusion1 = 20 order by id";
						}
						$res13 = mysqli_query($conn, $sql03);
						for ($LVDTNG13 = 0; $row13 = mysqli_fetch_array($res13); $LVDTNG13++) {
						}
						echo number_format($LVDTNG13, 0); ?>'; //13일 LVDT ng
		i1 = document.getElementById('14일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "14' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "14' and conclusion1 = 20 order by id";
						}
						$res14 = mysqli_query($conn, $sql03);
						for ($LVDTNG14 = 0; $row14 = mysqli_fetch_array($res14); $LVDTNG14++) {
						}
						echo number_format($LVDTNG14, 0); ?>'; //14일 LVDT ng
		i1 = document.getElementById('15일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "15' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "15' and conclusion1 = 20 order by id";
						}
						$res15 = mysqli_query($conn, $sql03);
						for ($LVDTNG15 = 0; $row15 = mysqli_fetch_array($res15); $LVDTNG15++) {
						}
						echo number_format($LVDTNG15, 0); ?>'; //15일 LVDT ng
		i1 = document.getElementById('16일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "16' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "16' and conclusion1 = 20 order by id";
						}
						$res16 = mysqli_query($conn, $sql03);
						for ($LVDTNG16 = 0; $row16 = mysqli_fetch_array($res16); $LVDTNG16++) {
						}
						echo number_format($LVDTNG16, 0); ?>'; //16일 LVDT ng
		i1 = document.getElementById('17일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "17' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "17' and conclusion1 = 20 order by id";
						}
						$res17 = mysqli_query($conn, $sql03);
						for ($LVDTNG17 = 0; $row17 = mysqli_fetch_array($res17); $LVDTNG17++) {
						}
						echo number_format($LVDTNG17, 0); ?>'; //17일 LVDT ng
		i1 = document.getElementById('18일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "18' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "18' and conclusion1 = 20 order by id";
						}
						$res18 = mysqli_query($conn, $sql03);
						for ($LVDTNG18 = 0; $row18 = mysqli_fetch_array($res18); $LVDTNG18++) {
						}
						echo number_format($LVDTNG18, 0); ?>'; //18일 LVDT ng
		i1 = document.getElementById('19일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "19' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "19' and conclusion1 = 20 order by id";
						}
						$res19 = mysqli_query($conn, $sql03);
						for ($LVDTNG19 = 0; $row19 = mysqli_fetch_array($res19); $LVDTNG19++) {
						}
						echo number_format($LVDTNG19, 0); ?>'; //19일 LVDT ng
		i1 = document.getElementById('20일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "20' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "20' and conclusion1 = 20 order by id";
						}
						$res20 = mysqli_query($conn, $sql03);
						for ($LVDTNG20 = 0; $row20 = mysqli_fetch_array($res20); $LVDTNG20++) {
						}
						echo number_format($LVDTNG20, 0); ?>'; //20일 LVDT ng
		i1 = document.getElementById('21일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "21' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "21' and conclusion1 = 20 order by id";
						}
						$res21 = mysqli_query($conn, $sql03);
						for ($LVDTNG21 = 0; $row21 = mysqli_fetch_array($res21); $LVDTNG21++) {
						}
						echo number_format($LVDTNG21, 0); ?>'; //21일 LVDT ng
		i1 = document.getElementById('22일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "22' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "22' and conclusion1 = 20 order by id";
						}
						$res22 = mysqli_query($conn, $sql03);
						for ($LVDTNG22 = 0; $row22 = mysqli_fetch_array($res22); $LVDTNG22++) {
						}
						echo number_format($LVDTNG22, 0); ?>'; //22일 LVDT ng
		i1 = document.getElementById('23일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "23' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "23' and conclusion1 = 20 order by id";
						}
						$res23 = mysqli_query($conn, $sql03);
						for ($LVDTNG23 = 0; $row23 = mysqli_fetch_array($res23); $LVDTNG23++) {
						}
						echo number_format($LVDTNG23, 0); ?>'; //23일 LVDT ng
		i1 = document.getElementById('24일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "24' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "24' and conclusion1 = 20 order by id";
						}
						$res24 = mysqli_query($conn, $sql03);
						for ($LVDTNG24 = 0; $row24 = mysqli_fetch_array($res24); $LVDTNG24++) {
						}
						echo number_format($LVDTNG24, 0); ?>'; //24일 LVDT ng
		i1 = document.getElementById('25일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "25' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "25' and conclusion1 = 20 order by id";
						}
						$res25 = mysqli_query($conn, $sql03);
						for ($LVDTNG25 = 0; $row25 = mysqli_fetch_array($res25); $LVDTNG25++) {
						}
						echo number_format($LVDTNG25, 0); ?>'; //25일 LVDT ng
		i1 = document.getElementById('26일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "26' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "26' and conclusion1 = 20 order by id";
						}
						$res26 = mysqli_query($conn, $sql03);
						for ($LVDTNG26 = 0; $row26 = mysqli_fetch_array($res26); $LVDTNG26++) {
						}
						echo number_format($LVDTNG26, 0); ?>'; //26일 LVDT ng
		i1 = document.getElementById('27일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "27' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "27' and conclusion1 = 20 order by id";
						}
						$res27 = mysqli_query($conn, $sql03);
						for ($LVDTNG27 = 0; $row27 = mysqli_fetch_array($res27); $LVDTNG27++) {
						}
						echo number_format($LVDTNG27, 0); ?>'; //27일 LVDT ng
		i1 = document.getElementById('28일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "28' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "28' and conclusion1 = 20 order by id";
						}
						$res28 = mysqli_query($conn, $sql03);
						for ($LVDTNG28 = 0; $row28 = mysqli_fetch_array($res28); $LVDTNG28++) {
						}
						echo number_format($LVDTNG28, 0); ?>'; //28일 LVDT ng
		i1 = document.getElementById('29일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "29' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "29' and conclusion1 = 20 order by id";
						}
						$res29 = mysqli_query($conn, $sql03);
						for ($LVDTNG29 = 0; $row29 = mysqli_fetch_array($res29); $LVDTNG29++) {
						}
						echo number_format($LVDTNG29, 0); ?>'; //29일 LVDT ng
		i1 = document.getElementById('30일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "30' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "30' and conclusion1 = 20 order by id";
						}
						$res30 = mysqli_query($conn, $sql03);
						for ($LVDTNG30 = 0; $row30 = mysqli_fetch_array($res30); $LVDTNG30++) {
						}
						echo number_format($LVDTNG30, 0); ?>'; //30일 LVDT ng
		i1 = document.getElementById('31일 LVDT ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date = '" . $sDate . "31' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date = '" . $sDate . "31' and conclusion1 = 20 order by id";
						}
						$res31 = mysqli_query($conn, $sql03);
						for ($LVDTNG31 = 0; $row31 = mysqli_fetch_array($res31); $LVDTNG31++) {
						}
						echo number_format($LVDTNG31, 0); ?>'; //31일 LVDT ng
		i1 = document.getElementById('LVDT ng 일평균');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql03 = "select * from result1 where date >= '" . $sDate . "01' and date <= '" . $sDate . "31' and index1 = '" . $i_no . "' and conclusion1 = 20 order by id";
						} else {
							$sql03 = "select * from result1 where date >= '" . $sDate . "01' and date <= '" . $sDate . "31' and conclusion1 = 20 order by id";
						}
						$res00 = mysqli_query($conn, $sql03);
						for ($LVDTNGT = 0; $row00 = mysqli_fetch_array($res00); $LVDTNGT++) {
						}
						$aveLVDTNG = $LVDTNGT / 31;
						echo number_format($aveLVDTNG, 2); ?>';

		i1 = document.getElementById('LVDT ng 합계');
		i1.innerText = '<?php echo number_format($LVDTNGT, 0); ?>';

		i1 = document.getElementById('01일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "01' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "01' and conclusion1 = 21 order by id";
						}
						$res01 = mysqli_query($conn, $sql04);
						for ($circleNG01 = 0; $row01 = mysqli_fetch_array($res01); $circleNG01++) {
						}
						echo number_format($circleNG01, 0); ?>'; //01일 circle ng
		i1 = document.getElementById('02일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "02' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "02' and conclusion1 = 21 order by id";
						}
						$res02 = mysqli_query($conn, $sql04);
						for ($circleNG02 = 0; $row02 = mysqli_fetch_array($res02); $circleNG02++) {
						}
						echo number_format($circleNG02, 0); ?>'; //02일 circle ng
		i1 = document.getElementById('03일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "03' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "03' and conclusion1 = 21 order by id";
						}
						$res03 = mysqli_query($conn, $sql04);
						for ($circleNG03 = 0; $row03 = mysqli_fetch_array($res03); $circleNG03++) {
						}
						echo number_format($circleNG03, 0); ?>'; //03일 circle ng
		i1 = document.getElementById('04일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "04' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "04' and conclusion1 = 21 order by id";
						}
						$res04 = mysqli_query($conn, $sql04);
						for ($circleNG04 = 0; $row04 = mysqli_fetch_array($res04); $circleNG04++) {
						}
						echo number_format($circleNG04, 0); ?>'; //04일 circle ng
		i1 = document.getElementById('05일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "05' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "05' and conclusion1 = 21 order by id";
						}
						$res05 = mysqli_query($conn, $sql04);
						for ($circleNG05 = 0; $row05 = mysqli_fetch_array($res05); $circleNG05++) {
						}
						echo number_format($circleNG05, 0); ?>'; //05일 circle ng
		i1 = document.getElementById('06일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "06' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "06' and conclusion1 = 21 order by id";
						}
						$res06 = mysqli_query($conn, $sql04);
						for ($circleNG06 = 0; $row06 = mysqli_fetch_array($res06); $circleNG06++) {
						}
						echo number_format($circleNG06, 0); ?>'; //06일 circle ng
		i1 = document.getElementById('07일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "07' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "07' and conclusion1 = 21 order by id";
						}
						$res07 = mysqli_query($conn, $sql04);
						for ($circleNG07 = 0; $row07 = mysqli_fetch_array($res07); $circleNG07++) {
						}
						echo number_format($circleNG07, 0); ?>'; //07일 circle ng
		i1 = document.getElementById('08일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "08' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "08' and conclusion1 = 21 order by id";
						}
						$res08 = mysqli_query($conn, $sql04);
						for ($circleNG08 = 0; $row08 = mysqli_fetch_array($res08); $circleNG08++) {
						}
						echo number_format($circleNG08, 0); ?>'; //08일 circle ng
		i1 = document.getElementById('09일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "09' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "09' and conclusion1 = 21 order by id";
						}
						$res09 = mysqli_query($conn, $sql04);
						for ($circleNG09 = 0; $row09 = mysqli_fetch_array($res09); $circleNG09++) {
						}
						echo number_format($circleNG09, 0); ?>'; //09일 circle ng
		i1 = document.getElementById('10일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "10' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "10' and conclusion1 = 21 order by id";
						}
						$res10 = mysqli_query($conn, $sql04);
						for ($circleNG10 = 0; $row10 = mysqli_fetch_array($res10); $circleNG10++) {
						}
						echo number_format($circleNG10, 0); ?>'; //10일 circle ng
		i1 = document.getElementById('11일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "11' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "11' and conclusion1 = 21 order by id";
						}
						$res11 = mysqli_query($conn, $sql04);
						for ($circleNG11 = 0; $row11 = mysqli_fetch_array($res11); $circleNG11++) {
						}
						echo number_format($circleNG11, 0); ?>'; //11일 circle ng
		i1 = document.getElementById('12일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "12' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "12' and conclusion1 = 21 order by id";
						}
						$res12 = mysqli_query($conn, $sql04);
						for ($circleNG12 = 0; $row12 = mysqli_fetch_array($res12); $circleNG12++) {
						}
						echo number_format($circleNG12, 0); ?>'; //12일 circle ng
		i1 = document.getElementById('13일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "13' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "13' and conclusion1 = 21 order by id";
						}
						$res13 = mysqli_query($conn, $sql04);
						for ($circleNG13 = 0; $row13 = mysqli_fetch_array($res13); $circleNG13++) {
						}
						echo number_format($circleNG13, 0); ?>'; //13일 circle ng
		i1 = document.getElementById('14일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "14' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "14' and conclusion1 = 21 order by id";
						}
						$res14 = mysqli_query($conn, $sql04);
						for ($circleNG14 = 0; $row14 = mysqli_fetch_array($res14); $circleNG14++) {
						}
						echo number_format($circleNG14, 0); ?>'; //14일 circle ng
		i1 = document.getElementById('15일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "15' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "15' and conclusion1 = 21 order by id";
						}
						$res15 = mysqli_query($conn, $sql04);
						for ($circleNG15 = 0; $row15 = mysqli_fetch_array($res15); $circleNG15++) {
						}
						echo number_format($circleNG15, 0); ?>'; //15일 circle ng
		i1 = document.getElementById('16일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "16' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "16' and conclusion1 = 21 order by id";
						}
						$res16 = mysqli_query($conn, $sql04);
						for ($circleNG16 = 0; $row16 = mysqli_fetch_array($res16); $circleNG16++) {
						}
						echo number_format($circleNG16, 0); ?>'; //16일 circle ng
		i1 = document.getElementById('17일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "17' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "17' and conclusion1 = 21 order by id";
						}
						$res17 = mysqli_query($conn, $sql04);
						for ($circleNG17 = 0; $row17 = mysqli_fetch_array($res17); $circleNG17++) {
						}
						echo number_format($circleNG17, 0); ?>'; //17일 circle ng
		i1 = document.getElementById('18일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "18' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "18' and conclusion1 = 21 order by id";
						}
						$res18 = mysqli_query($conn, $sql04);
						for ($circleNG18 = 0; $row18 = mysqli_fetch_array($res18); $circleNG18++) {
						}
						echo number_format($circleNG18, 0); ?>'; //18일 circle ng
		i1 = document.getElementById('19일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "19' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "19' and conclusion1 = 21 order by id";
						}
						$res19 = mysqli_query($conn, $sql04);
						for ($circleNG19 = 0; $row19 = mysqli_fetch_array($res19); $circleNG19++) {
						}
						echo number_format($circleNG19, 0); ?>'; //19일 circle ng
		i1 = document.getElementById('20일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "20' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "20' and conclusion1 = 21 order by id";
						}
						$res20 = mysqli_query($conn, $sql04);
						for ($circleNG20 = 0; $row20 = mysqli_fetch_array($res20); $circleNG20++) {
						}
						echo number_format($circleNG20, 0); ?>'; //20일 circle ng
		i1 = document.getElementById('21일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "21' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "21' and conclusion1 = 21 order by id";
						}
						$res21 = mysqli_query($conn, $sql04);
						for ($circleNG21 = 0; $row21 = mysqli_fetch_array($res21); $circleNG21++) {
						}
						echo number_format($circleNG21, 0); ?>'; //21일 circle ng
		i1 = document.getElementById('22일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "22' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "22' and conclusion1 = 21 order by id";
						}
						$res22 = mysqli_query($conn, $sql04);
						for ($circleNG22 = 0; $row22 = mysqli_fetch_array($res22); $circleNG22++) {
						}
						echo number_format($circleNG22, 0); ?>'; //22일 circle ng
		i1 = document.getElementById('23일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "23' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "23' and conclusion1 = 21 order by id";
						}
						$res23 = mysqli_query($conn, $sql04);
						for ($circleNG23 = 0; $row23 = mysqli_fetch_array($res23); $circleNG23++) {
						}
						echo number_format($circleNG23, 0); ?>'; //23일 circle ng
		i1 = document.getElementById('24일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "24' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "24' and conclusion1 = 21 order by id";
						}
						$res24 = mysqli_query($conn, $sql04);
						for ($circleNG24 = 0; $row24 = mysqli_fetch_array($res24); $circleNG24++) {
						}
						echo number_format($circleNG24, 0); ?>'; //24일 circle ng
		i1 = document.getElementById('25일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "25' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "25' and conclusion1 = 21 order by id";
						}
						$res25 = mysqli_query($conn, $sql04);
						for ($circleNG25 = 0; $row25 = mysqli_fetch_array($res25); $circleNG25++) {
						}
						echo number_format($circleNG25, 0); ?>'; //25일 circle ng
		i1 = document.getElementById('26일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "26' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "26' and conclusion1 = 21 order by id";
						}
						$res26 = mysqli_query($conn, $sql04);
						for ($circleNG26 = 0; $row26 = mysqli_fetch_array($res26); $circleNG26++) {
						}
						echo number_format($circleNG26, 0); ?>'; //26일 circle ng
		i1 = document.getElementById('27일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "27' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "27' and conclusion1 = 21 order by id";
						}
						$res27 = mysqli_query($conn, $sql04);
						for ($circleNG27 = 0; $row27 = mysqli_fetch_array($res27); $circleNG27++) {
						}
						echo number_format($circleNG27, 0); ?>'; //27일 circle ng
		i1 = document.getElementById('28일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "28' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "28' and conclusion1 = 21 order by id";
						}
						$res28 = mysqli_query($conn, $sql04);
						for ($circleNG28 = 0; $row28 = mysqli_fetch_array($res28); $circleNG28++) {
						}
						echo number_format($circleNG28, 0); ?>'; //28일 circle ng
		i1 = document.getElementById('29일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "29' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "29' and conclusion1 = 21 order by id";
						}
						$res29 = mysqli_query($conn, $sql04);
						for ($circleNG29 = 0; $row29 = mysqli_fetch_array($res29); $circleNG29++) {
						}
						echo number_format($circleNG29, 0); ?>'; //29일 circle ng
		i1 = document.getElementById('30일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "30' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "30' and conclusion1 = 21 order by id";
						}
						$res30 = mysqli_query($conn, $sql04);
						for ($circleNG30 = 0; $row30 = mysqli_fetch_array($res30); $circleNG30++) {
						}
						echo number_format($circleNG30, 0); ?>'; //30일 circle ng
		i1 = document.getElementById('31일 circle ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "31' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "31' and conclusion1 = 21 order by id";
						}
						$res31 = mysqli_query($conn, $sql04);
						for ($circleNG31 = 0; $row31 = mysqli_fetch_array($res31); $circleNG31++) {
						}
						echo number_format($circleNG31, 0); ?>'; //31일 circle ng
		i1 = document.getElementById('circle ng 일평균');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date >= '" . $sDate . "01' and date <= '" . $sDate . "31' and index1 = '" . $i_no . "' and conclusion1 = 21 order by id";
						} else {
							$sql04 = "select * from result1 where date >= '" . $sDate . "01' and date <= '" . $sDate . "31' and conclusion1 = 21 order by id";
						}
						$res00 = mysqli_query($conn, $sql04);
						for ($circleNGT = 0; $row00 = mysqli_fetch_array($res00); $circleNGT++) {
						}
						$avecircleNG = $circleNGT / 31;
						echo number_format($avecircleNG, 2); ?>';
		i1 = document.getElementById('circle ng 합계');
		i1.innerText = '<?php echo number_format($circleNGT, 0); ?>';

				i1 = document.getElementById('LVDT ng 합계');
		i1.innerText = '<?php echo number_format($LVDTNGT, 0); ?>';

		i1 = document.getElementById('01일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql04 = "select * from result1 where date = '" . $sDate . "01' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql04 = "select * from result1 where date = '" . $sDate . "01' and conclusion1 = 22 order by id";
						}
						$res01 = mysqli_query($conn, $sql04);
						for ($lightNG01 = 0; $row01 = mysqli_fetch_array($res01); $lightNG01++) {
						}
						echo number_format($lightNG01, 0); ?>'; //01일 light ng
		i1 = document.getElementById('02일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "02' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "02' and conclusion1 = 22 order by id";
						}
						$res02 = mysqli_query($conn, $sql05);
						for ($lightNG02 = 0; $row02 = mysqli_fetch_array($res02); $lightNG02++) {
						}
						echo number_format($lightNG02, 0); ?>'; //02일 light ng
		i1 = document.getElementById('03일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "03' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "03' and conclusion1 = 22 order by id";
						}
						$res03 = mysqli_query($conn, $sql05);
						for ($lightNG03 = 0; $row03 = mysqli_fetch_array($res03); $lightNG03++) {
						}
						echo number_format($lightNG03, 0); ?>'; //03일 light ng
		i1 = document.getElementById('04일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "04' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "04' and conclusion1 = 22 order by id";
						}
						$res04 = mysqli_query($conn, $sql05);
						for ($lightNG04 = 0; $row04 = mysqli_fetch_array($res04); $lightNG04++) {
						}
						echo number_format($lightNG04, 0); ?>'; //04일 light ng
		i1 = document.getElementById('05일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "05' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "05' and conclusion1 = 22 order by id";
						}
						$res05 = mysqli_query($conn, $sql05);
						for ($lightNG05 = 0; $row05 = mysqli_fetch_array($res05); $lightNG05++) {
						}
						echo number_format($lightNG05, 0); ?>'; //05일 light ng
		i1 = document.getElementById('06일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "06' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "06' and conclusion1 = 22 order by id";
						}
						$res06 = mysqli_query($conn, $sql05);
						for ($lightNG06 = 0; $row06 = mysqli_fetch_array($res06); $lightNG06++) {
						}
						echo number_format($lightNG06, 0); ?>'; //06일 light ng
		i1 = document.getElementById('07일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "07' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "07' and conclusion1 = 22 order by id";
						}
						$res07 = mysqli_query($conn, $sql05);
						for ($lightNG07 = 0; $row07 = mysqli_fetch_array($res07); $lightNG07++) {
						}
						echo number_format($lightNG07, 0); ?>'; //07일 light ng
		i1 = document.getElementById('08일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "08' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "08' and conclusion1 = 22 order by id";
						}
						$res08 = mysqli_query($conn, $sql05);
						for ($lightNG08 = 0; $row08 = mysqli_fetch_array($res08); $lightNG08++) {
						}
						echo number_format($lightNG08, 0); ?>'; //08일 light ng
		i1 = document.getElementById('09일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "09' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "09' and conclusion1 = 22 order by id";
						}
						$res09 = mysqli_query($conn, $sql05);
						for ($lightNG09 = 0; $row09 = mysqli_fetch_array($res09); $lightNG09++) {
						}
						echo number_format($lightNG09, 0); ?>'; //09일 light ng
		i1 = document.getElementById('10일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "10' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "10' and conclusion1 = 22 order by id";
						}
						$res10 = mysqli_query($conn, $sql05);
						for ($lightNG10 = 0; $row10 = mysqli_fetch_array($res10); $lightNG10++) {
						}
						echo number_format($lightNG10, 0); ?>'; //10일 light ng
		i1 = document.getElementById('11일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "11' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "11' and conclusion1 = 22 order by id";
						}
						$res11 = mysqli_query($conn, $sql05);
						for ($lightNG11 = 0; $row11 = mysqli_fetch_array($res11); $lightNG11++) {
						}
						echo number_format($lightNG11, 0); ?>'; //11일 light ng
		i1 = document.getElementById('12일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "12' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "12' and conclusion1 = 22 order by id";
						}
						$res12 = mysqli_query($conn, $sql05);
						for ($lightNG12 = 0; $row12 = mysqli_fetch_array($res12); $lightNG12++) {
						}
						echo number_format($lightNG12, 0); ?>'; //12일 light ng
		i1 = document.getElementById('13일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "13' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "13' and conclusion1 = 22 order by id";
						}
						$res13 = mysqli_query($conn, $sql05);
						for ($lightNG13 = 0; $row13 = mysqli_fetch_array($res13); $lightNG13++) {
						}
						echo number_format($lightNG13, 0); ?>'; //13일 light ng
		i1 = document.getElementById('14일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "14' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "14' and conclusion1 = 22 order by id";
						}
						$res14 = mysqli_query($conn, $sql05);
						for ($lightNG14 = 0; $row14 = mysqli_fetch_array($res14); $lightNG14++) {
						}
						echo number_format($lightNG14, 0); ?>'; //14일 light ng
		i1 = document.getElementById('15일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "15' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "15' and conclusion1 = 22 order by id";
						}
						$res15 = mysqli_query($conn, $sql05);
						for ($lightNG15 = 0; $row15 = mysqli_fetch_array($res15); $lightNG15++) {
						}
						echo number_format($lightNG15, 0); ?>'; //15일 light ng
		i1 = document.getElementById('16일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "16' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "16' and conclusion1 = 22 order by id";
						}
						$res16 = mysqli_query($conn, $sql05);
						for ($lightNG16 = 0; $row16 = mysqli_fetch_array($res16); $lightNG16++) {
						}
						echo number_format($lightNG16, 0); ?>'; //16일 light ng
		i1 = document.getElementById('17일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "17' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "17' and conclusion1 = 22 order by id";
						}
						$res17 = mysqli_query($conn, $sql05);
						for ($lightNG17 = 0; $row17 = mysqli_fetch_array($res17); $lightNG17++) {
						}
						echo number_format($lightNG17, 0); ?>'; //17일 light ng
		i1 = document.getElementById('18일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "18' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "18' and conclusion1 = 22 order by id";
						}
						$res18 = mysqli_query($conn, $sql05);
						for ($lightNG18 = 0; $row18 = mysqli_fetch_array($res18); $lightNG18++) {
						}
						echo number_format($lightNG18, 0); ?>'; //18일 light ng
		i1 = document.getElementById('19일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "19' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "19' and conclusion1 = 22 order by id";
						}
						$res19 = mysqli_query($conn, $sql05);
						for ($lightNG19 = 0; $row19 = mysqli_fetch_array($res19); $lightNG19++) {
						}
						echo number_format($lightNG19, 0); ?>'; //19일 light ng
		i1 = document.getElementById('20일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "20' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "20' and conclusion1 = 22 order by id";
						}
						$res20 = mysqli_query($conn, $sql05);
						for ($lightNG20 = 0; $row20 = mysqli_fetch_array($res20); $lightNG20++) {
						}
						echo number_format($lightNG20, 0); ?>'; //20일 light ng
		i1 = document.getElementById('21일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "21' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "21' and conclusion1 = 22 order by id";
						}
						$res21 = mysqli_query($conn, $sql05);
						for ($lightNG21 = 0; $row21 = mysqli_fetch_array($res21); $lightNG21++) {
						}
						echo number_format($lightNG21, 0); ?>'; //21일 light ng
		i1 = document.getElementById('22일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "22' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "22' and conclusion1 = 22 order by id";
						}
						$res22 = mysqli_query($conn, $sql05);
						for ($lightNG22 = 0; $row22 = mysqli_fetch_array($res22); $lightNG22++) {
						}
						echo number_format($lightNG22, 0); ?>'; //22일 light ng
		i1 = document.getElementById('23일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "23' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "23' and conclusion1 = 22 order by id";
						}
						$res23 = mysqli_query($conn, $sql05);
						for ($lightNG23 = 0; $row23 = mysqli_fetch_array($res23); $lightNG23++) {
						}
						echo number_format($lightNG23, 0); ?>'; //23일 light ng
		i1 = document.getElementById('24일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "24' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "24' and conclusion1 = 22 order by id";
						}
						$res24 = mysqli_query($conn, $sql05);
						for ($lightNG24 = 0; $row24 = mysqli_fetch_array($res24); $lightNG24++) {
						}
						echo number_format($lightNG24, 0); ?>'; //24일 light ng
		i1 = document.getElementById('25일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "25' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "25' and conclusion1 = 22 order by id";
						}
						$res25 = mysqli_query($conn, $sql05);
						for ($lightNG25 = 0; $row25 = mysqli_fetch_array($res25); $lightNG25++) {
						}
						echo number_format($lightNG25, 0); ?>'; //25일 light ng
		i1 = document.getElementById('26일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "26' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "26' and conclusion1 = 22 order by id";
						}
						$res26 = mysqli_query($conn, $sql05);
						for ($lightNG26 = 0; $row26 = mysqli_fetch_array($res26); $lightNG26++) {
						}
						echo number_format($lightNG26, 0); ?>'; //26일 light ng
		i1 = document.getElementById('27일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "27' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "27' and conclusion1 = 22 order by id";
						}
						$res27 = mysqli_query($conn, $sql05);
						for ($lightNG27 = 0; $row27 = mysqli_fetch_array($res27); $lightNG27++) {
						}
						echo number_format($lightNG27, 0); ?>'; //27일 light ng
		i1 = document.getElementById('28일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "28' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "28' and conclusion1 = 22 order by id";
						}
						$res28 = mysqli_query($conn, $sql05);
						for ($lightNG28 = 0; $row28 = mysqli_fetch_array($res28); $lightNG28++) {
						}
						echo number_format($lightNG28, 0); ?>'; //28일 light ng
		i1 = document.getElementById('29일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "29' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "29' and conclusion1 = 22 order by id";
						}
						$res29 = mysqli_query($conn, $sql05);
						for ($lightNG29 = 0; $row29 = mysqli_fetch_array($res29); $lightNG29++) {
						}
						echo number_format($lightNG29, 0); ?>'; //29일 light ng
		i1 = document.getElementById('30일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "30' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "30' and conclusion1 = 22 order by id";
						}
						$res30 = mysqli_query($conn, $sql05);
						for ($lightNG30 = 0; $row30 = mysqli_fetch_array($res30); $lightNG30++) {
						}
						echo number_format($lightNG30, 0); ?>'; //30일 light ng
		i1 = document.getElementById('31일 light ng');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date = '" . $sDate . "31' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date = '" . $sDate . "31' and conclusion1 = 22 order by id";
						}
						$res31 = mysqli_query($conn, $sql05);
						for ($lightNG31 = 0; $row31 = mysqli_fetch_array($res31); $lightNG31++) {
						}
						echo number_format($lightNG31, 0); ?>'; //31일 light ng
		i1 = document.getElementById('light ng 일평균');
		i1.innerText = '<?php if ($i_no <= 5) {
							$sql05 = "select * from result1 where date >= '" . $sDate . "01' and date <= '" . $sDate . "31' and index1 = '" . $i_no . "' and conclusion1 = 22 order by id";
						} else {
							$sql05 = "select * from result1 where date >= '" . $sDate . "01' and date <= '" . $sDate . "31' and conclusion1 = 22 order by id";
						}
						$res00 = mysqli_query($conn, $sql05);
						for ($lightNGT = 0; $row00 = mysqli_fetch_array($res00); $lightNGT++) {
						}
						$avelightNG = $lightNGT / 31;
						echo number_format($avelightNG, 2); ?>';
		i1 = document.getElementById('light ng 합계');
		i1.innerText = '<?php echo number_format($lightNGT, 0); ?>';


		i1 = document.getElementById('01일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('02일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('03일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('04일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('05일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('06일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('07일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('08일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('09일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('10일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('11일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('12일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('13일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('14일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('15일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('16일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('17일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('18일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('19일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('20일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('21일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('22일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('23일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('24일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('25일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('26일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('27일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('28일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('29일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('30일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('31일 FW ng');
		i1.innerText = '';
		i1 = document.getElementById('FW ng 일평균');
		i1.innerText = '';
		i1 = document.getElementById('FW ng 합계');
		i1.innerText = '';

		i1 = document.getElementById('01일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('02일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('03일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('04일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('05일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('06일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('07일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('08일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('09일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('10일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('11일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('12일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('13일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('14일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('15일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('16일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('17일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('18일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('19일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('20일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('21일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('22일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('23일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('24일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('25일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('26일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('27일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('28일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('29일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('30일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('31일 SINK ng');
		i1.innerText = '';
		i1 = document.getElementById('SINK ng 일평균');
		i1.innerText = '';
		i1 = document.getElementById('SINK ng 합계');
		i1.innerText = '';

		i1 = document.getElementById('01일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('02일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('03일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('04일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('05일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('06일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('07일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('08일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('09일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('10일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('11일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('12일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('13일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('14일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('15일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('16일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('17일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('18일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('19일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('20일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('21일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('22일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('23일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('24일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('25일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('26일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('27일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('28일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('29일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('30일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('31일 휨ng');
		i1.innerText = '';
		i1 = document.getElementById('휨ng 일평균');
		i1.innerText = '';
		i1 = document.getElementById('휨ng 합계');
		i1.innerText = '';

		i1 = document.getElementById('01일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('02일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('03일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('04일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('05일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('06일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('07일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('08일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('09일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('10일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('11일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('12일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('13일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('14일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('15일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('16일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('17일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('18일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('19일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('20일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('21일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('22일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('23일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('24일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('25일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('26일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('27일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('28일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('29일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('30일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('31일 weld ng');
		i1.innerText = '';
		i1 = document.getElementById('weld ng 일평균');
		i1.innerText = '';
		i1 = document.getElementById('weld ng 합계');
		i1.innerText = '';

		i1 = document.getElementById('01일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('02일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('03일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('04일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('05일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('06일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('07일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('08일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('09일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('10일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('11일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('12일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('13일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('14일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('15일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('16일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('17일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('18일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('19일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('20일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('21일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('22일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('23일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('24일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('25일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('26일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('27일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('28일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('29일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('30일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('31일 etc ng');
		i1.innerText = '';
		i1 = document.getElementById('etc ng 일평균');
		i1.innerText = '';
		i1 = document.getElementById('etc ng 합계');
		i1.innerText = '';

		i1 = document.getElementById('01일 daily ng');
		i1.innerText = '<?php echo number_format($count01, 0); ?>';
		i1 = document.getElementById('02일 daily ng');
		i1.innerText = '<?php echo number_format($count02, 0); ?>';
		i1 = document.getElementById('03일 daily ng');
		i1.innerText = '<?php echo number_format($count03, 0); ?>';
		i1 = document.getElementById('04일 daily ng');
		i1.innerText = '<?php echo number_format($count04, 0); ?>';
		i1 = document.getElementById('05일 daily ng');
		i1.innerText = '<?php echo number_format($count05, 0); ?>';
		i1 = document.getElementById('06일 daily ng');
		i1.innerText = '<?php echo number_format($count06, 0); ?>';
		i1 = document.getElementById('07일 daily ng');
		i1.innerText = '<?php echo number_format($count07, 0); ?>';
		i1 = document.getElementById('08일 daily ng');
		i1.innerText = '<?php echo number_format($count08, 0); ?>';
		i1 = document.getElementById('09일 daily ng');
		i1.innerText = '<?php echo number_format($count09, 0); ?>';
		i1 = document.getElementById('10일 daily ng');
		i1.innerText = '<?php echo number_format($count10, 0); ?>';
		i1 = document.getElementById('11일 daily ng');
		i1.innerText = '<?php echo number_format($count11, 0); ?>';
		i1 = document.getElementById('12일 daily ng');
		i1.innerText = '<?php echo number_format($count12, 0); ?>';
		i1 = document.getElementById('13일 daily ng');
		i1.innerText = '<?php echo number_format($count13, 0); ?>';
		i1 = document.getElementById('14일 daily ng');
		i1.innerText = '<?php echo number_format($count14, 0); ?>';
		i1 = document.getElementById('15일 daily ng');
		i1.innerText = '<?php echo number_format($count15, 0); ?>';
		i1 = document.getElementById('16일 daily ng');
		i1.innerText = '<?php echo number_format($count16, 0); ?>';
		i1 = document.getElementById('17일 daily ng');
		i1.innerText = '<?php echo number_format($count17, 0); ?>';
		i1 = document.getElementById('18일 daily ng');
		i1.innerText = '<?php echo number_format($count18, 0); ?>';
		i1 = document.getElementById('19일 daily ng');
		i1.innerText = '<?php echo number_format($count19, 0); ?>';
		i1 = document.getElementById('20일 daily ng');
		i1.innerText = '<?php echo number_format($count20, 0); ?>';
		i1 = document.getElementById('21일 daily ng');
		i1.innerText = '<?php echo number_format($count21, 0); ?>';
		i1 = document.getElementById('22일 daily ng');
		i1.innerText = '<?php echo number_format($count22, 0); ?>';
		i1 = document.getElementById('23일 daily ng');
		i1.innerText = '<?php echo number_format($count23, 0); ?>';
		i1 = document.getElementById('24일 daily ng');
		i1.innerText = '<?php echo number_format($count24, 0); ?>';
		i1 = document.getElementById('25일 daily ng');
		i1.innerText = '<?php echo number_format($count25, 0); ?>';
		i1 = document.getElementById('26일 daily ng');
		i1.innerText = '<?php echo number_format($count26, 0); ?>';
		i1 = document.getElementById('27일 daily ng');
		i1.innerText = '<?php echo number_format($count27, 0); ?>';
		i1 = document.getElementById('28일 daily ng');
		i1.innerText = '<?php echo number_format($count28, 0); ?>';
		i1 = document.getElementById('29일 daily ng');
		i1.innerText = '<?php echo number_format($count29, 0); ?>';
		i1 = document.getElementById('30일 daily ng');
		i1.innerText = '<?php echo number_format($count30, 0); ?>';
		i1 = document.getElementById('31일 daily ng');
		i1.innerText = '<?php echo number_format($count31, 0); ?>';
		i1 = document.getElementById('daily ng 일평균');
		i1.innerText = '<?php echo number_format($avemonth, 2); ?>';
		i1 = document.getElementById('total ng');
		i1.innerText = '<?php echo number_format($countT, 0); ?>';
	</script>
</body>

</html>

<?php mysqli_close($conn); // 종료
?>