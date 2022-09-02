<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="/css/data_log.css" rel="stylesheet" type="text/css">
	<title>Document</title>
</head>

<body>
	<?php

	$conn = new mysqli("localhost", "server", "00000000", "dataset");


	$sql = "select * from main_viewer order by id desc";

	setcookie('machine_no', $_POST["machine_no"], time() + 10, '/');
	setcookie('item_no', $_POST["item_no"], time() + 10, '/');
	setcookie('date_call', $_POST["date_call"], time() + 10, '/');
	setcookie('judgement', $_POST["judgement"], time() + 10, '/');

	$qiDate = $_POST["date_call"];
	$iDate = preg_replace("/[^0-9]*/s", "", $qiDate);

	if ($iDate >= 1) {
		$cDate = $_POST['date_call'];
		$i_no = $_POST['item_no'];
	} else {
		$cDate = date("Y-m-d");
		$i_no = 6;
	}

	//$cDate = $_POST['date_call'];
	$d_call =  preg_replace("/[^0-9]*/s", "", $cDate);
	$m_no = $_POST['machine_no'];


	$ju = $_POST['judgement'];


	//   <th width='80px'>검사 05</th>
	//   <th width='80px'>검사 06</th>
	//   <th width='80px'>검사 07</th>
	//   <th width='80px'>검사 08</th>
	//   <th width='80px'>검사 09</th>
	//   <th width='80px'>검사 10</th>

	echo "<table border='1' width=99% style='text-align:center;'>";
	echo "<tr class='alert-primary border border-secondary text-dark'>";
	echo "<th width='70px'>구분</th>
      <th width='80px'>호기 구분</th>
      <th width='150px'>Contents</th>
      <th width='80px'>LVDT1</th>
      <th width='80px'>LVDT2</th>
      <th width='80px'>동심 A</th>
      <th width='80px'>동심 B</th>
      <th width='80px'>동심 C</th>
      <th width='80px'>동심 D</th>
      <th width='80px'>조도</th>

      <th width='100px'>검사 여부</th>
      <th width='90px'>발생 일자</th>
      <th width='90px'>발생 시간</th></tr>";
	//기본 형태 갖추기

	if ($i_no <= 4) {
		$sql = "select * from main_viewer where item_id_num = '" . $i_no . "' order by id desc";
		$res = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($res);
		if ($row[1] == 0) {
			$item0 = "LCA";
		} else if ($row[1] == 1) {
			$item0 = "UCA";
		} else if ($row[1] == 2) {
			$item0 = "RADIUS";
		} else {
			$item0 = "아이템 4";
		}
		//아이템 정렬


		if ($row[20] == 1) {
			$shape1check = "유검사";
		} else {
			$shape1check = "무검사";
		}
		//외관 검사 1 유/무검사 확인
		if ($row[21] == 1) {
			$shape2check = "유검사";
		} else {
			$shape2check = "무검사";
		}
		//외관 검사 2 유/무검사 확인
		if ($row[22] == 1) {
			$shape3check = "유검사";
		} else {
			$shape3check = "무검사";
		}
		//외관 검사 3 유/무검사 확인

		// <th>".$row[20]."~".$row[21]."</th>
		// <th>".$row[22]."~".$row[23]."</th>
		// <th>".$row[24]."~".$row[25]."</th>

		echo "<tr bgcolor='#EAEAEA'>";
		echo "<th colspan='2'>기준값</th>
         <th>" . $item0 . "</th>
         <th>" . $row[6] . "~" . $row[7] . "</th>
         <th>" . $row[8] . "~" . $row[9] . "</th>
         <th>" . $row[10] . "~" . $row[11] . "</th>
         <th>" . $row[12] . "~" . $row[13] . "</th>
         <th>" . $row[14] . "~" . $row[15] . "</th>
         <th>" . $row[16] . "~" . $row[17] . "</th>
         <th>" . $row[18] . "~" . $row[19] . "</th>

         <th colspan='3'>개정이력 :" . $row[28] . "</th>
   </tr>";
	} else {
		echo "<tr class='alert-primary border border-secondary text-dark'>";
		echo "<th colspan='16'>전체 아이템 조회시 기준값 출력 불가</th></tr>";
	}



	if ($i_no <= 5 && $ju == 0) {
		$sql2 = "select * from result1 where date = '" . $cDate . "' and index1 ='" . $i_no . "' and conclusion1 >= 2 order by id desc";
	} else if ($i_no <= 5 && $ju == 1) {
		$sql2 = "select * from result1 where date = '" . $cDate . "' and index1 ='" . $i_no . "' and conclusion1 = 1 order by id desc";
	} else if ($i_no <= 5 && $ju == 2) {
		$sql2 = "select * from result1 where date = '" . $cDate . "' and index1 ='" . $i_no . "' order by id desc";
	} else if ($i_no == 6 && $ju == 0) { //전체
		$sql2 = "select * from result1 where date = '" . $cDate . "' order by id desc";
	} else if ($i_no == 6 && $ju == 1) { //OK
		$sql2 = "select * from result1 where date = '" . $cDate . "' and conclusion1 = 1 order by id desc";
	} else { //NG
		$sql2 = "select * from result1 where date = '" . $cDate . "' and conclusion1 >= 2 order by id desc";
	}

	$res2 = mysqli_query($conn, $sql2);

	for ($countline2 = 1; $row2 = mysqli_fetch_array($res2); $countline2++) {

		$sdate = date('Y.m.d', strtotime($row2[1]));          //날짜 데이터 변환
		$ssdate = date('H:i:s', strtotime($row2[2]));           //시간 데이터 변환
		if ($row2[20] == 1) {
			$conclusion = "양품";
		} else if($row2[20] == 20){
			$conclusion = "LVDT 불량";
		} else if($row2[20] == 21){
			$conclusion = "동심 불량";
		} else if($row2[20] == 22){
			$conclusion = "조도 불량";
		}else{
			$conclusion = "UNKNOWN";
		}

		//검사1호기 밑에
		// <td>".$item0."</td>


		//   <td>".number_format($row2[13],3)."</td>
		//            <td>".number_format($row2[14],3)."</td>
		//            <td>".number_format($row2[15],3)."</td>
		//            <td>".number_format($row2[9],3)."</td>
		//            <td>".number_format($row2[10],3)."</td>
		//            <td>".$row2[18]."</td>
	
		$sql03 = "SELECT * FROM cr1 WHERE id = '1'";
		$res03 = mysqli_query($conn, $sql03);
		$row03 = mysqli_fetch_array($res03);
	
		$sql04 = "SELECT * FROM cr1 WHERE id = '2'";
		$res04 = mysqli_query($conn, $sql04);
		$row04 = mysqli_fetch_array($res04);

	?>

		<tr class='data_list'>
			<td><?php echo $countline2 ?></td>
			<td>검사1호기</td>
			<td><?php echo $row2[8] ?></td>
			<td style='background-color:<?php echo (str_replace('.','',$row2[9]) >= $row03['a0'] && $row2[9] <= $row04['a0']) ? '#CEF6CE':'#F6CECE'; ?>;'><?php echo number_format($row2[9], 3) ?></td>
			<td style='background-color:<?php echo (str_replace('.','',$row2[10]) >= $row03['a1'] && $row2[10] <= $row04['a1']) ? '#CEF6CE':'#F6CECE'; ?>;'><?php echo number_format($row2[10], 3) ?></td>
			<td style='background-color:<?php echo (str_replace('.','',$row2[11]*1000) >= $row03['a2'] && $row2[11]*1000 <= $row04['a2']) ? '#CEF6CE':'#F6CECE'; ?>;'><?php echo number_format($row2[11], 3) ?></td>
			<td style='background-color:<?php echo (str_replace('.','',$row2[12]*1000) >= $row03['a3'] && $row2[12]*1000 <= $row04['a3']) ? '#CEF6CE':'#F6CECE'; ?>;'><?php echo number_format($row2[12], 3) ?></td>
			<td style='background-color:<?php echo (str_replace('.','',$row2[13]*1000) >= $row03['a4'] && $row2[13]*1000 <= $row04['a4']) ? '#CEF6CE':'#F6CECE'; ?>;'><?php echo number_format($row2[13], 3) ?></td>
			<td style='background-color:<?php echo (str_replace('.','',$row2[14]*1000) >= $row03['a5'] && $row2[14]*1000 <= $row04['a5']) ? '#CEF6CE':'#F6CECE'; ?>;'><?php echo number_format($row2[14], 3) ?></td>
			<td style='background-color:<?php echo (str_replace('.','',$row2[15]) >= $row03['a6'] && $row2[15] <= $row04['a6']) ? '#CEF6CE':'#F6CECE'; ?>;'><?php echo number_format($row2[15]*1000, 0) ?></td>

			<td style='background-color:<?php echo $row2['conclusion1'] == "1" ? '#CEF6CE':'#F6CECE'; ?>;'><?php echo $conclusion ?></td>
			<td><?php echo $sdate ?></td>
			<td><?php echo $ssdate ?></td>
		</tr>

	<?php
		if (fmod($countline2, 100) == 0) {
			echo "
                  <tr>
                  <td colspan='13' bgcolor='grey' height='20px'></td>
                  </tr>";
		}
	}                                           // 테이블 형식에 맞춰서 반복으로 출력하기 

	echo "</table>";

	mysqli_close($conn);    // 종료
	?>

	<script>
		function color_change() {
			if (<?php echo number_format($row2[16], 3) ?> > <?php echo $row03['a0'] ?> && <?php echo number_format($row2[16], 3) ?> < <?php echo $row04['a0'] ?>) {
				document.getElementsByClassName("data_list").style.backgroundColor = '#FFEFD5';
			} else {
				document.getElementsByClassName("data_list").style.backgroundColor = 'red';
			}
		}
	</script>
</body>

</html>