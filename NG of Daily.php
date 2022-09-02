<?php session_start();
$conn = new mysqli("localhost", "server", "00000000", "dataset");
?>
<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="chrome">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/NG of daily cover.css" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>일일 유형별 불량 집계</title>
</head>

<body>
	<div>
		<table width=1900px style="text-align: center;">
			<form method="post" action="/action_php/dailyNG_graph.php" target="i_003">
				<thead>
					<tr>
						<th class="alert-primary text-dark border border-secondary" colspan="6" height="30px" align="center">일별 유형별 불량 집계</th>
						<th rowspan="2" width="10%"><input type="submit" id="submit" class="btn btn-secondary" style="margin-top:5px;" value="조회하기"></th>
					</tr>
					<tr>
						<th class="alert-secondary border border-secondary" width="150px" height="25px">호기 구분</th>
						<th width="150px"><label for="machineNo"></label>
							<select id="machineNo">
								<option value="1호기" selected>검사1호기</option>
							</select>
						</th>
						<th class="alert-secondary border border-secondary" width="170px">품목 구분</th>
						<th width="220px"><select name="item_no" id="search">
								<option value='0'>==제품전체==</option>

								<?php
								$sql5 = "select * from item";
								$res5 = mysqli_query($conn, $sql5);

								for (; $row5 = mysqli_fetch_array($res5);) {
									if ($row00['selected_item'] == $row5['item_name']) {
										echo "<option value='" . $row5['item_name'] . "' selected>" . $row5['item_name'] . "</option>";
									} else {
										echo "<option value='" . $row5['item_name'] . "'>" . $row5['item_name'] . "</option>";
									}
								}
								?>
								</select>
						</th>
						<th width="150px" class="alert-secondary border border-secondary">년 월 </th>
						<th width="160px" class="border border-secondary"><input type="month" name="date_c" value="<?php echo date("Y-m") ?>"></th>
					</tr>
				</thead>
		</table>
	</div>
	<iframe frameborder="0" name="i_003" style="width: 1910px; height: 750px; position:absolute;" src="/action_php/dailyNG_graph.php" target="i_003">
	</iframe>
	<script>
		document.getElementById("submit").click();
	</script>
</body>

</html>