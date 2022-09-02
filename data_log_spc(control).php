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
	<table width="1880px" style="text-align: center;">
		<form method="post" name="graph" action="/action_php/setcookie.php" target="_blank">
			<tr>
				<th class="alert-primary vorder border-secondary text-dark" style='color:white;' width="150px" height="25px">호기 구분</th>
				<th width="100px" class="alert-primary vorder border-secondary text-dark" style='color:white;'>품목 구분</th>
				<th width="120px" class="alert-primary vorder border-secondary text-dark" style='color:white;'>일 자</th>
				<th width="120px" class="alert-primary vorder border-secondary text-dark" style='color:white;'>기준 시간 </th>
				<th class="alert-primary vorder border-secondary text-dark"></th>
				<!-- <input type="button" value="조회하기" onClick="sendProcess(f, j)"></th> -->
			</tr>
			<tr>
				<th width="150px"><label for="machineNo"></label>
					<select name="machine_no" id="machineNo">
						<option value="1" selected>검사1호기</option>
					</select>
				</th>
				<th width="200px"><select name="item_sel" id="item_select">
						<option value="0">0) OCV</option>
						<!-- <option value="1">1) UCA</option>
                  <option value="2">2) RADIUS</option>
                  <option value="3">3) 아이템4</option> -->
						<!-- <option value="5" id="item_no">5) item 6</option>  -->
				</th>
				<th width="160px"><input type="date" name="date_call" value="<?php echo date("Y-m-d"); ?>"></th>
				<th width="160px"><input type="time" name="time_call" value="<?php echo date("H:i"); ?>"></th>
				</th>
				<th width="160px"><input type="submit" id="submit" class="btn btn-secondary" value="조회하기"></th>

			</tr>
		</form>
	</table>
	</div>
	<iframe frameborder="0" name="i_010" style="width: 33%; height: 380px; position:relative;" src="action_php/spc_graph/spc_graph0.php">
	</iframe>
	<iframe frameborder="0" name="i_011" style="width: 33%; height: 380px; position:relative;" src="action_php/spc_graph/spc_graph1.php">
	</iframe>
	<iframe frameborder="0" name="i_012" style="width: 33%; height: 380px; position:relative;" src="action_php/spc_graph/spc_graph2.php">
	</iframe>
	<iframe frameborder="0" name="i_013" style="width: 33%; height: 380px; position:relative;" src="action_php/spc_graph/spc_graph3.php">
	</iframe>
	<iframe frameborder="0" name="i_014" style="width: 33%; height: 380px; position:relative;" src="action_php/spc_graph/spc_graph4.php">
	</iframe>
	<iframe frameborder="0" name="i_015" style="width: 33%; height: 380px; position:relative;" src="action_php/spc_graph/spc_graph5.php">
	</iframe>
	<iframe frameborder="0" name="i_016" style="width: 33%; height: 380px; position:relative;" src="action_php/spc_graph/spc_graph6.php">
	</iframe>
	<!-- <iframe frameborder="0" name="i_017" style="width: 33%; height: 357px; position:relative;" src="action_php/spc_graph/spc_graph7.php">
   </iframe> -->

</body>

</html>