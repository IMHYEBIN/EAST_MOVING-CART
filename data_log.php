<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data log</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="/css/data_log.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php $conn = new mysqli("localhost", "server", "00000000", "dataset"); ?>

	<form method="post" target="i_005">
		<table width=99% style="text-align: center;">
			<tr>
				<th width="10%" class="alert-primary border border-secondary text-dark">호기 구분</th>

				<th width="10%" class="alert-primary border border-secondary text-dark" style='display:none;'>품목 구분</th>

				<th width="10%" class="alert-primary border border-secondary text-dark">날짜</th>
				<th width="10%" class="alert-primary border border-secondary text-dark">합격 구분</th>
				<th width="10%" class="alert-primary border border-secondary text-dark" colspan="3"></th>
			</tr>
			<tr>
				<th><label for="machineNo"></label>
					<select name="machine_no" id="machineNo"  style="width: 30%;">
						<option value="1" selected>검사1호기</option>
					</select>
				</th>
				<th><input type="date" name="date_call" value="<?php echo date("Y-m-d") ?>" required></th>

				<th style='display:none;'><select name="item_no" id="item_no">
						<option value="6" selected>--</option>
						<option value="0">0) LCA</option>
						<option value="1">1) UCA</option>
						<option value="2">2) RADIUS</option>
						<option value="3">3) 아이템4</option>

				</th>
				<th><select name="judgement" id="judgement" style="width: 30%;">
						<option value="0" id="judgement" selected>전체</option>
						<option value="1" id="judgement">OK</option>
						<option value="2" id="judgement">NG</option>
				</th>
				<th width="10%"><input type="submit" class="btn btn-secondary" value="조회하기" formaction="action_php/inspection_res.php" target="i_005"  style="width: 100%;"></th>
				<th width="10%"><input type="submit" class="btn btn-secondary" value="자료엑셀 변환" formaction="action_php/excelcon.php" target="_top"  style="width: 100%;"></th>
	</form>
	<th width="10%">
		<form method="post" action="/action_php/data_log_up.php" target="_blank">
			<?php
			$sql00 = "select * from check1";
			$res00 = mysqli_query($conn, $sql00);
			$row00 = mysqli_fetch_array($res00);

			//값을 data_log_up 으로 보내주기 위해 히든으로 숨기고 사용
			echo "
				<input type='hidden' name='refresh' value='" . $row00['refresh'] . "'>
				";

			if ($row00['refresh'] == '0') {
				$refresh_data = "자동새로고침OFF";
			} else if ($row00['refresh'] == '1') {
				$refresh_data = "자동새로고침ON";
				echo '
						<script type="text/JavaScript">
						setTimeout(function(){
							location.reload();
						},10000);
						</script>';
			}
			?>

			<!-- 새로고침데이터 보내는 버튼 -->
			<input type="submit" id="refresh_button" class="btn" value="<?php echo $refresh_data ?>" style="width: 100%; color:white;">

			<?php
			if ($row00['refresh'] == '0') {
				echo '
						<script type="text/JavaScript">
						document.getElementById("refresh_button").style.backgroundColor="rgb(232,124,135)";
						</script>';
			} else if ($row00['refresh'] == '1') {
				echo '
						<script type="text/JavaScript">
						document.getElementById("refresh_button").style.backgroundColor="rgb(116,198,135)";
						</script>';
			}
			?>
		</form>
	</th>
	</tr>

	</table>
	</div>
	<iframe frameborder="0" name="i_005" style="width: 100%; height: 720px; position:absolute;" src="action_php/inspection_res.php">
	</iframe>
</body>

</html>